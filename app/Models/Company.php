<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
