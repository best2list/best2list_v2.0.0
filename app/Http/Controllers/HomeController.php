<?php

namespace App\Http\Controllers;

use App\BusinessImage;
use App\Category;
use App\Comment;
use App\Country;
use App\Business;
use App\Faq;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::paginate(5);
        return view('home', compact('businesses'));
    }

    public function getCategory($id)
    {
        $businesses = Category::find($id)->businesses()->paginate(5);
        return view('category',compact('businesses'));
    }

    public function getCountry($id)
    {
        $businesses = Business::where('country',$id)->paginate(5);
        return view('country',compact('businesses'));
    }

    public function showBusiness($id)
    {
        $business = Business::find($id);
        $businessImages = BusinessImage::where('business_id', $id)->get();
        return view('show', compact('business','businessImages'));
    }

    public function addComment(Request $request, $id)
    {
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->business_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return back();
    }

    public function faq(){
        $faqs = Faq::paginate(10);
        return view('faq', compact('faqs'));
    }

    public function showMenu($id)
    {
        $menu = Menu::find($id);
        return view('show-menu', compact('menu'));
    }
}
