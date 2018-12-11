<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;


class Province extends Model
{
    protected $table = 'provinces';

    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['cities', 'branches'];
    protected $dates = ['deleted_at'];

    public function cities()
    {
        return $this->hasMany('App\City', 'province_id', 'id');
    }

    public function branches()
    {
        return $this->hasMany('App\BusinessBranch', 'province_id', 'id');
    }
}
