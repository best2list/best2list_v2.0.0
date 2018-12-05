<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;


class Country extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['businesses'];
    protected $dates = ['deleted_at'];

    public function businesses()
    {
        return $this->hasMany('App\Business');
    }
}
