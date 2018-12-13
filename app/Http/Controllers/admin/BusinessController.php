<?php

namespace App\Http\Controllers\admin;

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
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses= Business::paginate(10);
        return view('admin.business.index',compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business = Business::find($id);
        $categories = Category::all();
        $countries = Country::all();
        $provinces = Province::all();
        $cities = City::all();
        $businessImages = BusinessImage::where('business_id', $id)->get();
        return view('admin.business.edit', compact('business', 'categories','countries', 'businessImages', 'provinces', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('adminBusiness');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeAdminStatus($id)
    {
        $business = Business::find($id);
        if($business->admin_status == 'passive'){
            $business->admin_status = 'active';
        }
        else{
            $business->admin_status = 'passive';
        }
        $business->save();
        return back();
    }

    public function adminBusinessDestroy($id)
    {
        $business = Business::find($id);
        $business->delete();
        return back();
    }
}




