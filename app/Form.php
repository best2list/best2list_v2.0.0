<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function formItems()
    {
        return $this->hasMany('App\FormItem', 'form_id', 'id');
    }
}
