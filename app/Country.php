<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;


class Country extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['branches', 'provinces', 'cities'];
    protected $dates = ['deleted_at'];

    public function branches()
    {
        return $this->hasMany(BusinessBranch::class, 'country_id', 'id');
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
