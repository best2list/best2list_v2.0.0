<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slideshow;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slideImages = Slideshow::all();
        return view('admin.slideshow.slideshow', compact('slideImages'));
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
        if($request->file('slideImage')) {
            $image = $request->file('slideImage');
            $newPath = 'images/slideImage/'.date('Y')."/".date('m')."/".date('d')."/";
            $newName = date('Y_m_d_H_i_s').'.'.$image->getClientOriginalExtension();
            $image->move($newPath, $newName);
            $slideImage = new Slideshow;
            $slideImage->altTag = $request->altTag;
            $slideImage->title = $request->title;
            $slideImage->image_path = '/'.$newPath . $newName;
            $slideImage->save();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slideImage = Slideshow::find($id);
        unlink(public_path($slideImage->image_path));
        $slideImage->delete();
        return back();
    }
}
