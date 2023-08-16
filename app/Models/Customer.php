<?php

namespace App\Models;

use App\Events\CustomerJoinedStoreEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::created(function (Customer $customer) {
            if ($customer->created_by_store_id) {
                $store = Store::find($customer->created_by_store_id);
                CustomerJoinedStoreEvent::dispatch($customer, $store);
            }
        });
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function stars()
    {
        return $this->hasMany(Star::class);
    }

    public function storeProfiles()
    {
        return $this->hasMany(CustomerStore::class);
    }

    public function storeProfile($store_id){
        return $this->storeProfiles()->firstOrCreate(['store_id' => $store_id]);
    }

    public function increaseBalance($value)
    {
        $this->increment('balance', $value);
    }

    public function scopeInteractWithStore($query, $store_id)
    {
        $customer_ids = Point::query()
            ->where('store_id', $store_id)
            ->pluck('customer_id')
            ->toArray();
        $created_customer_ids = Customer::query()
            ->where('created_by_store_id', $store_id)
            ->pluck('id')
            ->toArray();
        $ids = array_merge($customer_ids, $created_customer_ids);
        return $query->whereIn('customers.id', $ids);
    }

    /* مشتریان پر مراجعه */
    public function scopeLoyal($query, $store_id, $from_date = null, $to_date = null){
        $customer_ids = Customer::query()
            ->interactWithStore($store_id)
            ->pluck('id');
    }
}
