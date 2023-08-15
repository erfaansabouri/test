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

    protected static function booted()
    {
        static::created(function (Store $store) {
            $store->storeSetting()->firstOrCreate();
        });
    }
}
