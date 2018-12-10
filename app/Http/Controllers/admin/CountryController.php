<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('admin.country.country', compact('countries'));
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
        $country = new Country();
        if($request->file('flag')) {
            $flag = $request->file('flag');
            $newName =date('Y_m_d_H_i_s').'_'.$request->country.".".$flag->getClientOriginalExtension();
            $newpath = 'images/country/';
            $flag->move($newpath, $newName);

            $country->name = $request->country;
            $country->country_code = $request->country_code;
            $country->x_location = '98876.76';
            $country->y_location = '98675.86';
            $country->flag = $newpath.$newName;
            $country->save();
        }
        else{
            return $request->file('flag');
        }
        return back();
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
      $country = Country::find($id);
      return view('admin.country.edit-country', compact('country'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        $country->name = $request->country;
        $country->country_code = $request->country_code;
        $country->x_location = '98876.76';
        $country->y_location = '98675.86';
        if ($request->file('flag')) {
            $flag = $request->file('flag');
            $newName = date('Y_m_d_H_i_s') . '_' . $request->country . "." . $flag->getClientOriginalExtension();
            $newpath = 'images/country/';
            $flag->move($newpath, $newName);
            if (file_exists($country->flag))
                unlink(public_path($country->flag));
            $country->flag = $newpath . $newName;
        }
        $country->save();
        return redirect()->route('country');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return back();
    }

    public function province($id)
    {
        $country = Country::find($id);
        return view('admin.country.province', compact('country'));
    }

    public function storeProvince($id, Request $request)
    {
        $province = new Province;
        $province->name = $request->province;
        $province->country_id = $id;
        $province->save();
        return back();
    }

    public function editProvince($id)
    {
        $countries = Country::all();
        $province = Province::find($id);
        return view('admin.country.edit-province', compact('countries', 'province'));
    }

    public function updateProvince($id, Request $request)
    {
        $province = Province::find($id);
        $province->name = $request->province;
        $province->country_id = $request->country;
        $province->save();
        return redirect()->route('province', $request->country);
    }

    public function provinceDestroy($id)
    {
        $province = Province::find($id);
        $province->delete();
        return back();
    }
    
    public function city($id)
    {
        $province = Province::find($id);
        return view('admin.country.city', compact('province'));
    }

    public function storeCity($id, Request $request)
    {
        $city = new City;
        $city->name = $request->city;
        $city->province_id = $id;
        $country_id = Province::find($id)->country_id;
        $city->country_id = $country_id;
        $city->x_location = 43656.43;
        $city->y_location = 45636.54;
        $city->save();
        return back();
    }

    public function editCity($id)
    {
        $countries = Country::all();
        $provinces = Province::all();
        $city = City::find($id);
        return view('admin.country.edit-city', compact('countries', 'provinces', 'city'));
    }

    public function updateCity($id, Request $request)
    {
        $city = City::find($id);
        $city->name = $request->city;
        $city->province_id = $request->province;
        $city->country_id = $request->country;
        $city->save();
        return redirect()->route('city', $request->province);
    }

    public function cityDestroy($id)
    {
        $city = City::find($id);
        $city->delete();
        return back();
    }

}
