<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SocialNetwork;

class SocialNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialNetworks = SocialNetwork::all();
        return view('admin.socialnetwork.socialnetwork', compact("socialNetworks"));
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
        $socialNetwork= new SocialNetwork;
        $socialNetwork->icon = $request->icon;
        $socialNetwork->color = $request->color;
        $socialNetwork->address = $request->address;
        $socialNetwork->save();
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
      $socialnetwork = SocialNetwork::find($id);
      return view('admin.socialnetwork.edit_socialnetwork', compact("socialnetwork"));

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
      $socialNetwork= SocialNetwork::find($id);
      $socialNetwork->icon = $request->icon;
      $socialNetwork->color = $request->color;
      $socialNetwork->address = $request->address;
      $socialNetwork->save();
      return redirect()->route('slideshow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socialImage = SocialNetwork::find($id);
        $socialImage->delete();
        return back();
    }
}
