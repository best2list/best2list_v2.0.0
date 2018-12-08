<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;



class Business extends Model
{


    use SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['businessImage','comments','businessToCategories','branches','emails','contactNumbers','keywords','socialNetworks','websites','videos','images','favorites'];
    protected $dates = ['deleted_at'];

    public function businessImage()
    {
        return $this->hasMany(BusinessImage::class, 'business_id', 'id');
    }

    public function businessToCategories()
    {
        return $this->hasMany(BusinessToCategory::class, 'business_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'businesses_to_categories');
    }

    public function branches()
    {
        return $this->hasMany('App\BusinessBranch', 'business_id', 'id');
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

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function hasCategory($id)
    {
        return in_array($id, $this->categories()->pluck('category_id')->toArray());
    }

    public function hasCountry($id)
    {
        return Country::find($id);
    }
    public function favorites()
    {
        return $this->hasMany(Favorites::class);
    }

    public function countFavorite($id)
    {
        return Favorites::where('business_id',$id)->where('user_id', Auth::user()->id)->count();
    }

}
