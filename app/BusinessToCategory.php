<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BusinessToCategory extends Model
{
    use SoftDeletes;
    protected $table = 'businesses_to_categories';
    protected $dates = ['deleted_at'];

}
