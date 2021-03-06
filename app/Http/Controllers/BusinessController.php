<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessBranch;
use App\BusinessContactNumber;
use App\BusinessEmail;
use App\BusinessImage;
use App\BusinessSocialNetwork;
use App\BusinessWebsite;
use App\Category;
use App\Country;
use App\Province;
use App\City;
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
        $provinces = Province::all();
        $cities = City::all();
        $businesses = Business::all()->where('user_id',Auth::id());
        return view('business.create', compact('categories','countries','businesses', 'provinces', 'cities'));
    }

    public function store(Request $request)
    {
        //insert business
        $business = new Business;
        $business->user_id= Auth::user()->id;
        $business->name = $request->name;
        $business->slug = str_slug( $request->name, '-' );
        $business->description = $request->description;
        $business->user_status = 'passive';
        if($request->file('logo')) {
            $image = $request->file('logo');
            $newPath = 'images/business/'.date('Y')."/".date('m')."/".date('d')."/";
            $newName = date('Y_m_d_H_i_s') .'_'. Auth::user()->username.'.'. $image->getClientOriginalExtension();
            $image->move($newPath, $newName);
            $business->logo = $newPath.$newName;
        }
        $business->save();
        $business->categories()->sync($request->categories);

        //inser branches
        $branch = new BusinessBranch;
        $branch->business_id = $business->id;
        $branch->branch = $request->branch;
        $branch->slug = str_slug( $request->branch, '-' );
        $branch->country_id = $request->country;
        $branch->province_id = $request->province;
        $branch->city_id = $request->city;
        $branch->location_x = 16564341;
        $branch->location_y = 16564646;
        $branch->address = $request->address;
        $branch->zip_code = $request->zip_code;
        $branch->save();

        //insert emails
        $email = new BusinessEmail;
        $email->business_id = $business->id;
        $email->branch_id = $branch->id;
        $email->email = $request->email;
        $email->save();

        //insert social networks
        $socialNetwork = new BusinessSocialNetwork;
        $socialNetwork->business_id = $business->id;
        $socialNetwork->branch_id = $branch->id;
        $socialNetwork->url = $request->social_network;
        $socialNetwork->save();

        //insert websites
        $website = new BusinessWebsite;
        $website->business_id = $business->id;
        $website->branch_id = $branch->id;
        $website->website = $request->website;
        $website->save();

        //insert contact numbers
        $contactNumber = new BusinessContactNumber;
        $contactNumber->business_id = $business->id;
        $contactNumber->branch_id = $branch->id;
        $contactNumber->number = $request->contact_number;
        $contactNumber->save();


        //insert images and videos

        return redirect()->route('index');
    }

    public function edit($business_id)
    {
        $business = Business::find($business_id);
        $businesses = Business::all()->where('user_id',Auth::id());
        $categories = Category::all();
        $countries = Country::all();
        $provinces = Province::all();
        $cities = City::all();
        $businessImages = BusinessImage::where('business_id', $business_id)->get();
        return view('business.edit', compact('business', 'businesses', 'categories','countries', 'businessImages', 'provinces', 'cities'));
    }

    public function update($business_id, Request $request)
    {
        $business = Business::find($business_id);
        $business->name = $request->name;
        $business->description = $request->description;
        $business->admin_status = 'passive';
        $business->user_status = 'active';
        if ($request->file('image_path')) {
            $image = $request->file('logo');
            $newPath = 'images/business/' . date('Y') . "/" . date('m') . "/" . date('d') . "/";
            $newName = date('Y_m_d_H_i_s') . '_' . Auth::user()->username . '.' . $image->getClientOriginalExtension();
            $image->move($newPath, $newName);
            if (file_exists($business->image_path))
                unlink(public_path($business->image_path));
            $business->logo = $newPath . $newName;
        }
        $business->save();
        $business->categories()->sync($request->categories);

        //insert branches
        $branches = BusinessBranch::where('business_id', $business_id)->get();
        foreach ($branches as $branch){
            $branch->business_id = $business->id;
            $branch->branch = $request->branch;
            $branch->slug = str_slug($request->branch, '-');
            $branch->country_id = $request->country;
            $branch->province_id = $request->province;
            $branch->city_id = $request->city;
            $branch->location_x = 16564341;
            $branch->location_y = 16564646;
            $branch->address = $request->address;
            $branch->zip_code = $request->zip_code;
            $branch->save();

            //insert emails
            $emails = BusinessEmail::where('branch_id', $branch->id)->get();
            foreach ($emails as $email) {
                $email->email = $request->email;
                $email->save();
            }


            //insert social networks

            $socialNetworks = BusinessSocialNetwork::where('branch_id', $branch->id)->get();
            foreach ($socialNetworks as $socialNetwork) {
                $socialNetwork->business_id = $business->id;
                $socialNetwork->branch_id = $branch->id;
                $socialNetwork->url = $request->social_network;
                $socialNetwork->save();
            }
            //insert websites
            $websites = BusinessWebsite::where('branch_id', $branch->id)->get();
            foreach ($websites as $website) {
                $website->business_id = $business->id;
                $website->branch_id = $branch->id;
                $website->website = $request->website;
                $website->save();
            }

            //insert contact numbers
            $contactNumbers = BusinessContactNumber::where('branch_id', $branch->id)->get();
            foreach ($contactNumbers as $contactNumber){
                $contactNumber->business_id = $business->id;
                $contactNumber->branch_id = $branch->id;
                $contactNumber->number = $request->contact_number;
                $contactNumber->save();
            }
        }

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
        if($business->user_status == 'passive')
            $business->user_status='active';
        else
            $business->user_status='passive';
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
        $favorites = Favorites::where('user_id', Auth::user()->id)->get();
        return view('business.favorite', compact('favorites'));
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
