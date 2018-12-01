<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessImage;
use App\Category;
use App\Country;
use App\Ticket;
use App\TicketCategory;
use App\TicketFiles;
use App\TicketSubject;
use App\User;
use App\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\crypto_box_publickey_from_secretkey;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $businesses = Business::all()->where('user_id',Auth::id());
        return view('business.index', compact('businesses'));
    }

    public function show($business_id)
    {
        $business = Business::find($business_id);
        return view('business.show', compact('business'));
    }

    public function create()
    {
        $categories = Category::all();
        $countries = Country::all();
        $businesses = Business::all()->where('user_id',Auth::id());
        return view('business.create', compact('categories','countries','businesses'));
    }

    public function store(Request $request)
    {
        $business = new Business;
        $business->user_id= Auth::user()->id;
        $business->title = $request->title;
        $business->summary = $request->summary;
        $business->description = $request->description;
        $business->email = $request->email;
        $business->zip_code = $request->zip_code;
        $business->phone = $request->fax;
        $business->website = $request->website;
        $business->address = $request->address;
        $business->fax = $request->fax;
        $business->status = 0;
        $business->city = $request->city;
        $business->location = $request->location;
        $business->type = $request->type;
        $business->country = $request->country;
        $business->parent_id = $request->parent_id;
        if($request->file('image_path')) {
            $image = $request->file('image_path');
            $newPath = 'images/business/'.date('Y')."/".date('m')."/".date('d')."/";
            $newName = date('Y_m_d_H_i_s') .'_'. Auth::user()->username.'.'. $image->getClientOriginalExtension();
            $image->move($newPath, $newName);
            $business->image_path = $newPath.$newName;
        }
        $business->save();
        $business->categories()->sync($request->categories);
        return redirect()->route('index');
    }

    public function edit($business_id)
    {
        $business = Business::find($business_id);
        $businesses = Business::all()->where('user_id',Auth::id());
        $categories = Category::all();
        $countries = Country::all();
        $businessImages = BusinessImage::where('business_id', $business_id)->get();
        return view('business.edit', compact('business', 'businesses', 'categories','countries', 'businessImages'));
    }

    public function update($business_id, Request $request)
    {
        $business = Business::find($business_id);
        $business->title = $request->title;
        $business->summary = $request->summary;
        $business->description = $request->description;
        $business->email = $request->email;
        $business->zip_code = $request->zip_code;
        $business->phone = $request->fax;
        $business->website = $request->website;
        $business->address = $request->address;
        $business->fax = $request->fax;
        $business->status = 0;
        $business->city = $request->city;
        $business->location = $request->location;
        $business->type = $request->type;
        $business->country = $request->country;
        $business->parent_id = $request->parent_id;
        if($request->file('image_path')) {
            $image = $request->file('image_path');
            $newPath = 'images/business/'.date('Y')."/".date('m')."/".date('d')."/";
            $newName = date('Y_m_d_H_i_s') .'_'. Auth::user()->username.'.'. $image->getClientOriginalExtension();
            $image->move($newPath, $newName);
            if(file_exists($business->image_path))
                unlink(public_path($business->image_path));
            $business->image_path = $newPath.$newName;
        }
        $business->save();
        $business->categories()->sync($request->categories);
        return redirect()->route('index');
    }

    public function destroy($business_id)
    {
        $business = Business::find($business_id);
        $business->delete();
        return back();
    }

    public function businessStatus($business_id)
    {
        $business = Business::find($business_id);
        if($business->type == 'passive')
            $business->type='active';
        else
            $business->type='passive';
        $business->save();
        return redirect()->route('index');
    }

    public function businessImageUpload($id, Request $request)
    {
        if($request->file('businessUploadImage')) {
            $image = $request->file('businessUploadImage');
            $newPath = 'images/businessImages/'.date('Y')."/".date('m')."/".date('d')."/";
            $newName = date('Y_m_d_H_i_s').'_'.$id.'.'.$image->getClientOriginalExtension();
            $image->move($newPath, $newName);
            $business_image = new BusinessImage;
            $business_image->business_id = $id;
            $business_image->image_path = '/'.$newPath . $newName;
            $business_image->save();
        }
        return back();
    }

    public function businessImageDestroy($business_image_id, Request $request)
    {
        $business_image = BusinessImage::find($business_image_id);
        unlink(public_path($business_image->image_path));
        $business_image->delete();
        return back();
    }

    public function showFavorite()
    {
       // return "hello";
//        $businesses = User::find(Auth::user()->id)->favorites()->business->get();
        //$businesses = User::find(Auth::user()->id)->favorites()->business()->get();
        //$businesses = Favorites::find(1)->business->get();
        //$favorites = User::find(Auth::user()->id)->favorites()->get();//->pluck('business_id');
        //$businesses = $businesses->get();
//        return $favorites->id->get();
        //$favorites = Favorites::where('user_id', Auth::user()->id)->business->get();
        $favorites = Favorites::where('user_id', Auth::user()->id)->get();
        //$favorites = Favorites::where('user_id', Auth::user()->id)->business()->get();
        //return $favorites;
        return view('business.favorite', compact('favorites'));
//        return view('business.favorite', compact('businesses'));
    }

    public function addToFavorite($business_id)
    {
        $business = Favorites::where('business_id',$business_id);
        if($business->count()){
            $business->delete();
        }
        else{
            $businessObject = new Favorites;
            $businessObject->user_id = Auth::user()->id;
            $businessObject->business_id = $business_id;
            $businessObject->save();
        }
        return back();
    }

    public function ticket()
    {
        $ticketCategories = TicketCategory::all();
        $ticketSubjects = TicketSubject::where('user_id', Auth::user()->id)->get();
        return view('business.ticket', compact('ticketCategories', 'ticketSubjects'));
    }

    public function storeTicketSubject(Request $request)
    {
        $ticketSubject = new TicketSubject;
        $ticketSubject->subject = $request->subject;
        $ticketSubject->description = $request->description;
        $ticketSubject->ticket_cat_id = $request->ticket_cat_id;
        $ticketSubject->user_id = Auth::user()->id;
        $ticketSubject->save();
        return back();
    }

    public function ticketSubject($subjectID)
    {
        //change unseen tickets to seen
        $seenTickets = Ticket::where('subject_id', $subjectID)->where('message_status', 'unseen')->whereNotNull('admin_id')->get();
        foreach ($seenTickets as $seenTicket) {
            $seenTicket->message_status = 'seen';
            $seenTicket->save();
        }

        $ticketSubjectStatus = TicketSubject::find($subjectID);
        $tickets = TicketSubject::where('user_id', Auth::user()->id)->find($subjectID)->tickets()->get();
        return view('business.sendticket', compact('tickets', 'ticketSubjectStatus'));
    }

    public function storeTicket($subjectID, Request $request)
    {
        //change unseen tickets to replied
        $seenTickets = Ticket::where('subject_id', $subjectID)->whereNotNull('admin_id')->get();
        foreach ($seenTickets as $seenTicket) {
            $seenTicket->message_status = 'replied';
            $seenTicket->save();
        }

        $ticket = new Ticket;
        $ticket->message = $request->message;
        $ticket->subject_id = $subjectID;
        $ticket->user_id = Auth::user()->id;
//        if($request->file('file_1')) {
//            $image = $request->file('file_1');
//            $newPath = 'images/tickets/'.date('Y')."/".date('m')."/".date('d')."/";
//            $newName = date('Y_m_d_H_i_s').'_'.$subjectID.'.'.$image->getClientOriginalExtension();
//            $image->move($newPath, $newName);
//            $business_image = new BusinessImage;
//            $business_image->business_id = $subjectID;
//            $business_image->image_path = '/'.$newPath . $newName;
//            $business_image->save();
//        }
        $ticket->save();
        return back();
    }

    public function changeTicketStatus($id)
    {
        $ticketSubject = TicketSubject::find($id);
        if($ticketSubject->status == 'open')
            $ticketSubject->status = 'close';
        else
            $ticketSubject->status = 'open';
        $ticketSubject->save();
        return back();
    }

    public function storeTicketFile($subject_id, Request $request)
    {
        $userLasteTicketID = Ticket::where('subject_id', $subject_id)->whereNotNull('user_id')->latest()->value('id');
        $ticketFile = new TicketFiles;
        $ticketFile->ticket_id = $userLasteTicketID;
        if($request->file('file')) {
            $file = $request->file('file');
            $newPath = 'images/tickets/'.date('Y')."/".date('m')."/".date('d')."/";
            $newName = date('Y_m_d_H_i_s').'_'.$userLasteTicketID.'.'.$file->getClientOriginalExtension();
            $file->move($newPath, $newName);
            $ticketFile->file_path = '/'.$newPath . $newName;
        }
        $ticketFile->save();
        return back();
    }
}
