<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function hasUsername($id)
    {
        return User::find($id)->username;
    }
}
