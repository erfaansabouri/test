<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded = [];
    public function calculatePoint($price){
        return (int)(($price * $this->point) / $this->price);
    }

    public function points(){
        return $this->hasMany(Point::class);
    }

    public function storeSetting(){
        return $this->hasOne(StoreSetting::class);
    }

    public function couponGenerators(){
        return $this->hasMany(CouponGenerator::class);
    }

    public function storeLevels(){
        return $this->hasMany(StoreLevel::class);
    }

    protected static function booted()
    {
        static::created(function (Store $store) {
            $store->storeSetting()->firstOrCreate();

            /*store levels*/
            for ($i = 1 ; $i <= 3 ; $i++){
                StoreLevel::query()
                    ->create([
                        'store_id' => $store->id,
                        'level_name' => "سطح $i",
                        'min_stars_count' => 0,
                        'max_stars_count' => 0,
                    ]);
            }
        });
    }
}
