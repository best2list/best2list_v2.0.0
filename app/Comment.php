<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function hasUsername($id)
    {
        return User::find($id)->username;
    }
}
