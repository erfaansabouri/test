<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::created(function (Point $point) {
            $point->customer->increaseBalance($point->point);
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function pointType()
    {
        return $this->belongsTo(PointType::class);
    }

    public function scopePurchaseType($query)
    {
        return $query->where('point_type_id', PointType::purchaseId());
    }

    public function scopeNonPurchaseType($query)
    {
        return $query->where('point_type_id', PointType::nonPurchaseId());
    }

    public function scopeInteractWithStore($query, $store_id)
    {
        return $query->where('store_id', $store_id);
    }

}
