<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;



class Form extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['formItems'];
    protected $dates = ['deleted_at'];

    public function formItems()
    {
        return $this->hasMany('App\FormItem', 'form_id', 'id');
    }
}
