<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function businesses()
    {
        return $this->hasMany('App\Business');
    }
}
