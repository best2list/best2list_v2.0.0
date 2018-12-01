<?php

namespace App\Http\Controllers\admin;

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

            $country->country = $request->country;
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
      return view('admin.country.edit_country', compact('country'));

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
        $country->country = $request->country;
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
}
