<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Faq;
use App\slideshow;
use App\SocialNetwork;
use App\Ticket;
use App\TicketSubject;
use Illuminate\Http\Request;
use App\Country;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    // public function category()
    // {
    //     $categories = Category::all();
    //     return view('admin.category.category', compact('categories'));
    // }
    //
    // public function storeCategory(Request $request)
    // {
    //     $category = new Category();
    //     $category->title = $request->title;
    //     if($request->parent_id)
    //         $category->parent_id = $request->parent_id;
    //     $category->save();
    //     return back();
    // }
    //
    // public function categoryDestroy($category_id)
    // {
    //     $category = Category::find($category_id);
    //     $category->delete();
    //     return back();
    // }
    //
    // public function country()
    // {
    //     $countries = Country::all();
    //     return view('admin.country.country', compact('countries'));
    // }
    //
    // public function storeCountry(Request $request)
    // {
    //     $country = new Country();
    //     if($request->file('flag')) {
    //         $flag = $request->file('flag');
    //         $newName =date('Y_m_d_H_i_s').'_'.$request->country.".".$flag->getClientOriginalExtension();
    //         $newpath = 'images/country/';
    //         $flag->move($newpath, $newName);
    //
    //         $country->country = $request->country;
    //         $country->flag = $newpath.$newName;
    //         $country->save();
    //     }
    //     else{
    //         return $request->file('flag');
    //     }
    //     return back();
    // }
    //
    // public function countryDestroy($country_id)
    // {
    //     $country = Country::find($country_id);
    //     $country->delete();
    //     return back();
    // }
    //
    // public function comment()
    // {
    //     $comments = Comment::all();
    //     return view('admin.comment.comment', compact('comments'));
    // }
    //
    // public function commentStatus($comment_id)
    // {
    //     $comment = Comment::find($comment_id);
    //     if($comment->status == "passive")
    //         $comment->status = "active";
    //     else
    //         $comment->status = "passive";
    //     $comment->save();
    //     return back();
    // }
    //
    // public function commentDestroy($comment_id)
    // {
    //     $comment = Comment::find($comment_id);
    //     $comment->delete();
    //     return back();
    // }
    //
    // public function slideshow()
    // {
    //     $slideImages = Slideshow::all();
    //     return view('admin.slideshow.slideshow', compact('slideImages'));
    // }
    //
    // public function storeSlide(Request $request)
    // {
    //     if($request->file('slideImage')) {
    //         $image = $request->file('slideImage');
    //         $newPath = 'images/slideImage/'.date('Y')."/".date('m')."/".date('d')."/";
    //         $newName = date('Y_m_d_H_i_s').'.'.$image->getClientOriginalExtension();
    //         $image->move($newPath, $newName);
    //         $slideImage = new Slideshow;
    //         $slideImage->altTag = $request->altTag;
    //         $slideImage->title = $request->title;
    //         $slideImage->image_path = '/'.$newPath . $newName;
    //         $slideImage->save();
    //     }
    //     return back();
    // }
    //
    // public function destroySlide($id)
    // {
    //     $slideImage = Slideshow::find($id);
    //     unlink(public_path($slideImage->image_path));
    //     $slideImage->delete();
    //     return back();
    // }
    //
    // public function socialnetwork()
    // {
    //     $socialNetworks = SocialNetwork::all();
    //     return view('admin.socialnetwork.socialnetwork', compact("socialNetworks"));
    // }
    //
    // public function storeSocialNetwork(Request $request)
    // {
    //     $socialNetwork= new SocialNetwork;
    //     $socialNetwork->icon = $request->icon;
    //     $socialNetwork->color = $request->color;
    //     $socialNetwork->address = $request->address;
    //     $socialNetwork->save();
    //     return back();
    // }
    //
    // public function deleteSocialNetwork($id)
    // {
    //     $socialImage = SocialNetwork::find($id);
    //     $socialImage->delete();
    //     return back();
    // }
    //
    // public function FAQ()
    // {
    //     $faqs = Faq::all();
    //     return view("admin.faq.FAQ",compact("faqs"));
    // }
    //
    // public function storeFAQ(Request $request)
    // {
    //
    //     $faq= new Faq;
    //     $faq->question = $request->question;
    //     $faq->answer = $request->answer;
    //     $faq->save();
    //     return back();
    // }
    //
    // public function destroyFAQ($id)
    // {
    //     $faqitem = Faq::find($id);
    //     $faqitem->delete();
    //     return back();
    // }
    //
    // public function tickets()
    // {
    //     $ticketSubjects = TicketSubject::all();
    //     return view('admin.ticket.ticket', compact('ticketSubjects'));
    // }
    //
    // public function ticketSubject($subject_id)
    // {
    //     $tickets = Ticket::where('subject_id', $subject_id)->get();
    //     return view('admin.ticket.send-ticket', compact('tickets', 'subject_id'));
    // }
    //
    // public function storeTicket($subject_id, Request $request)
    // {
    //     $ticket = new Ticket;
    //     $ticket->message = $request->message;
    //     $ticket->subject_id = $subject_id;
    //     $ticket->admin_id = Auth::user()->id;
    //     $ticket->save();
    //     return back();
    // }
}
