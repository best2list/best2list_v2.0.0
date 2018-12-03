<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Form extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function formItems()
    {
        return $this->hasMany('App\FormItem', 'form_id', 'id');
    }
}
