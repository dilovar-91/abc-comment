<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class City extends Model
{
    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
