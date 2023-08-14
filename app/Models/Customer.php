<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function increaseBalance($value)
    {
        $this->increment('balance', $value);
    }

    public function scopeInteractWithStore($query, $store_id){
        $customer_ids = Point::query()
            ->where('store_id', $store_id)
            ->pluck('customer_id')
            ->toArray();

        $created_customer_ids = Customer::query()
            ->where('created_by_store_id', $store_id)
            ->pluck('id')
            ->toArray();

        $ids = array_merge($customer_ids, $created_customer_ids);

        return $query->whereIn('id', $ids);
    }
}
