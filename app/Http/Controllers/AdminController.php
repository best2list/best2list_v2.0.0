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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}