<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialSale extends Model {
    use SoftDeletes;

    protected $guarded = [];

    public function storeLevel () {
        return $this->belongsTo(StoreLevel::class);
    }

    public function store () {
        return $this->belongsTo(Store::class);
    }

    public function scopeLive ( $query ) {
        return $query->where('started_at' , '<=' , now())
                     ->where('ended_at' , '>=' , now());
    }
}
