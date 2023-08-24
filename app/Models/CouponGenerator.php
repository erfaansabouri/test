<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponGenerator extends Model {
    protected $guarded = [];
    protected $casts   = [
        'meta_data' => 'json',
    ];
    public function scopeOfType ( $query , $type ) {
        $query->where('type' , $type);
    }
}
