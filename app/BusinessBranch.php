<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;


class BusinessBranch extends Model
{
    use SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['businessImage','branches','emails','contactNumbers','keywords','socialNetworks','websites','videos','images'];
    protected $dates = ['deleted_at'];
    protected $table= 'business_branches';

    public function businessImage()
    {
        return $this->hasMany(BusinessImage::class, 'business_id', 'id');
    }

    public function emails()
    {
        return $this->hasMany('App\BusinessEmail', 'business_id', 'id');
    }

    public function contactNumbers()
    {
        return $this->hasMany('App\BusinessContactNumber', 'business_id', 'id');
    }

    public function keywords()
    {
        return $this->hasMany('App\BusinessKeyword', 'business_id', 'id');
    }

    public function socialNetworks()
    {
        return $this->hasMany('App\BusinessSocialNetwork', 'business_id', 'id');
    }

    public function websites()
    {
        return $this->hasMany('App\BusinessWebsite', 'business_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany('App\BusinessVideo', 'business_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\BusinessImage', 'business_id', 'id');
    }

    public function hasBusiness($id)
    {
        return Business::find($id);
    }
}
