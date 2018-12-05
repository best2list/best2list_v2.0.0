<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Favorites extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'favorites';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
//    public function business()
//    {
//        return $this->hasOne(Business::class, 'id', 'business_id');
//    }
    public function hasBusiness($business_id)
    {
        return Business::find($business_id);
    }
}
