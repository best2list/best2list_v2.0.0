<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = 'favorites';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function business()
    {
        return $this->hasOne(Business::class, 'id', 'business_id');
    }
    public function hasBusiness($business_id)
    {
        return Business::find($business_id);
    }
}
