<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointType extends Model
{
    protected $guarded = [];

    public function scopePurchaseId($query)
    {
        return $query->where('type', 'purchase')->first()->id;
    }

    public function scopeNonPurchaseId($query)
    {
        return $query->where('type', 'non-purchase')->first()->id;
    }
}
