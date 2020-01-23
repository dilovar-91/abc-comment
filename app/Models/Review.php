<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Review extends Model
{
    protected $guarded = [];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
