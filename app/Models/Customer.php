<?php

namespace App\Models;

use App\Events\CustomerJoinedStoreEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class Customer extends Authenticatable implements HasMedia {
    use Notifiable , HasRoles , InteractsWithMedia;

    protected $guarded = [];

    protected static function booted () {
        static::created(function ( Customer $customer ) {
            if ( $customer->created_by_store_id ) {
                $store = Store::find($customer->created_by_store_id);
                CustomerJoinedStoreEvent::dispatch($customer , $store);
            }
        });
    }

    public function registerMediaCollections (): void {
        $this->addMediaCollection('avatar')
             ->useFallbackUrl(asset('global-assets/media/avatars/blank.png'))
             ->singleFile();
    }

    public function registerMediaConversions ( Media $media = null ): void {
        $this->addMediaConversion('thumb')
             ->width(300)
             ->quality(80);
    }

    public function getFullNameAttribute () {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function points () {
        return $this->hasMany(Point::class);
    }

    public function consumeLogs () {
        return $this->hasMany(ConsumeLog::class);
    }

    public function stars () {
        return $this->hasMany(Star::class);
    }

    public function storeProfiles () {
        return $this->hasMany(CustomerStore::class);
    }

    public function storeProfile ( $store_id ) {
        return $this->storeProfiles()
                    ->firstOrCreate([ 'store_id' => $store_id ]);
    }

    public function increaseBalance ( $value ) {
        $this->increment('balance' , $value);
    }

    public function scopeInteractWithStore ( $query , $store_id ) {
        $customer_ids = Point::query()
                             ->where('store_id' , $store_id)
                             ->pluck('customer_id')
                             ->toArray();
        $created_customer_ids = Customer::query()
                                        ->where('created_by_store_id' , $store_id)
                                        ->pluck('id')
                                        ->toArray();
        $ids = array_merge($customer_ids , $created_customer_ids);

        return $query->whereIn('customers.id' , $ids);
    }

    /* مشتریان پر مراجعه */
    public function scopeLoyal ( $query , $store_id , $from_date = null , $to_date = null ) {
        $customer_ids = Customer::query()
                                ->interactWithStore($store_id)
                                ->pluck('id');
    }

    public function getLevel ( Store $store ) {
        $customer_stars = $this->storeProfile($store->id)->stars;

        return StoreLevel::where('store_id' , $store->id)
                         ->where('min_stars_count' , '<=' , $customer_stars)
                         ->where('max_stars_count' , '>=' , $customer_stars)
                         ->first();
    }

    public function totalReceivedPoints () {
        return $this->points->sum('point');
    }

    public function totalConsumedPoints () {
        return $this->consumeLogs->sum('point');
    }

    public function consume ( $store_id , $point , $type ) {
        if ($this->balance >= $point){
            $this->balance = $this->balance - $point;
            $this->save();
            ConsumeLog::query()
                      ->create([
                                   'store_id' => $store_id ,
                                   'point' => $point ,
                                   'type' => $type ,
                                   'customer_id' => $this->id  ,
                               ]);
        }

    }
}
