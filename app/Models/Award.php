<?php

namespace App\Models;

use App\Models\Enums\AwardTypeEnums;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use ReflectionClass;

class Award extends Model {
    use SoftDeletes;

    protected $guarded = [];

    protected static function booted () {
        static::creating(function ( Award $award ) {
            $award->code = self::generateCode();
        });
    }

    public static function getTypes () {
        $reflector = new ReflectionClass(AwardTypeEnums::class);
        return array_values($reflector->getConstants());
    }

    public function customer () {
        return $this->belongsTo(Customer::class , 'purchased_by_customer_id');
    }

    public function store () {
        return $this->belongsTo(Store::class);
    }

    public static function generateCode () {
        $code = strtoupper(Str::random(8));
        if ( Coupon::whereCode($code)
                   ->exists() ) {
            return self::generateCode();
        }

        return $code;
    }
}
