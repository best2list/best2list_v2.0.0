<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;



class Business extends Model
{


    use SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['businessImage','comments','favorites'];
    protected $dates = ['deleted_at'];

    public function businessImage()
    {
        return $this->hasMany(BusinessImage::class, 'business_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'businesses_to_categories');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function hasCategory($id)
    {
        return in_array($id, $this->categories()->pluck('id')->toArray());
    }

    public function hasCountry($id)
    {
        return Country::find($id);
    }
    public function favorites()
    {
        return $this->belongsToMany(Favorites::class);
    }

    public function countFavorite($id)
    {
        return Favorites::where('business_id',$id)->where('user_id', Auth::user()->id)->count();
    }

}
