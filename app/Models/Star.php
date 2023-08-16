<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    protected $table = 'stars';
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
