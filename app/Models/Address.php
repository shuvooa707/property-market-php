<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function getFullAttribute()
    {
        return $this->street . ", " . $this->city. ", " . $this->zip_code . ", " . $this->state . ", " . $this->country;
    }
}
