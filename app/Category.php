<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;




class Category extends Model
{

    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['children'];

    protected $dates = ['deleted_at'];





    public function businesses()
    {
        return $this->belongsToMany(Business::class,'businesses_to_categories');
    }


    //each category might have one parent
    public function parent() {
        return $this->belongsToOne(static::class, 'parent_id');
    }

    //each category might have multiple children
    public function children() {
        return $this->hasMany(static::class, 'parent_id')->orderBy('title', 'asc');
    }

}
