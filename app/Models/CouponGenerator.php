<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponGenerator extends Model {
    protected $guarded = [];

    public function scopeOfType ( $query , $type ) {
        $query->where('type' , $type);
    }
}
