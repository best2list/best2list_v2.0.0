<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;


class Country extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['businesses', 'provinces', 'cities'];
    protected $dates = ['deleted_at'];

    public function businesses()
    {
        return $this->hasMany('App\Business');
    }

    public function provinces()
    {
        return $this->hasMany('App\Province', 'country_id', 'id');
    }

    public function cities()
    {
        return $this->hasMany('App\City', 'country_id', 'id');
    }
}
