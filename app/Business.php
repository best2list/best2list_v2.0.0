<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Business extends Model
{

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
