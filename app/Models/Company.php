<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Metro;
use App\Models\City;

class Company extends Model
{
    public function scopeTitle($query,$keyword)
    {        
        return $query->where('title', 'LIKE', '%' . $keyword . '%');        
    }

    public function scopeMetro($query,$metro)
    {
        if(!Empty($metro)){
            return $query->where('metro_id',$metro);
        }
        return $query;
    }

    public function scopeCity($query,$city)
    {
        if(!Empty($city)){
            return $query->where('city_id',$city);
        }
        return $query;
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    } 

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    
    public function metro()
    {
        return $this->belongsTo(Metro::class, 'metro_id');
    }


    public function setPicturesAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['pictures'] = json_encode($pictures);
        }
    }

    public function getPicturesAttribute($pictures)
    {
        return json_decode($pictures, true);
    }
}
