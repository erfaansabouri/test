<?php

namespace App\Models;

use App\Events\CustomerDidAPurchasedFromStoreEvent;
use App\Events\CustomerPurchasedMoreThanAnAmountEvent;
use App\Events\CustomerReceivedNonPurchasePointEvent;
use App\Events\PointCreatedEvent;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::created(function (Point $point) {
            $point->customer->increaseBalance($point->point);
            if ($point->pointType->id == PointType::purchaseId()){
                CustomerDidAPurchasedFromStoreEvent::dispatch($point->customer, $point->store, $point->price);
                if ($point->store->storeSetting->customer_purchased_more_than_amount && $point->price >= $point->store->storeSetting->customer_purchased_more_than_amount){
                    CustomerPurchasedMoreThanAnAmountEvent::dispatch($point->customer, $point->store);
                }
            }
            if ($point->store && $point->pointType->id == PointType::nonPurchaseId()){
                CustomerReceivedNonPurchasePointEvent::dispatch($point->customer, $point->store);
            }
            if ($point->customer_id && $point->store_id){
                PointCreatedEvent::dispatch($point->id);
            }
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
