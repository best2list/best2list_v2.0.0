<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $table = 'cities';

    protected $cascadeDeletes = ['branches'];
    protected $dates = ['deleted_at'];

    public function branches()
    {
        return $this->hasMany('App\Branch', 'city_id', 'id');
    }
}
