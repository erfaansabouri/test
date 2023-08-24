<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Coupon extends Model {
    protected $guarded = [];

    public static function generateCode () {
        $code = strtoupper(Str::random(8));
        if ( Coupon::whereCode($code)
                   ->exists() ) {
            return self::generateCode();
        }
        return $code;
    }
}
