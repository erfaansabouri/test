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
}
