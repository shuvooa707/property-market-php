<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAvgratingAttribute()
    {
        if ( !$this->reviews->count() ) return 0;
        $rating = $this->reviews->reduce(function ($left, $right){
            return $left + $right->rating;
        });
        return $rating / $this->reviews->count();
    }
}
