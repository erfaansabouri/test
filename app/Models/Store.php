<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded = [];
    public function calculatePoint($price){
        return (int)(($price * $this->point) / $this->price);
    }

    public function points(){
        return $this->hasMany(Point::class);
    }
}
