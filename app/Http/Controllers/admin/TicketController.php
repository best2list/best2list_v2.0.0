<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\TicketSubject;
use App\TicketCategory;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketSubjects = TicketSubject::all();
        return view('admin.ticket.ticket', compact('ticketSubjects'));
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
    public function store($subject_id, Request $request)
    {
        //change unseen tickets to replied
        $seenTickets = Ticket::where('subject_id', $subject_id)->whereNotNull('user_id')->get();
        foreach ($seenTickets as $seenTicket) {
            $seenTicket->message_status = 'replied';
            $seenTicket->save();
        }

        $ticket = new Ticket;
        $ticket->message = $request->message;
        $ticket->subject_id = $subject_id;
        $ticket->admin_id = Auth::user()->id;
        $ticket->save();
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
        //
    }

    /**
     * @param $subject_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ticketSubject($subject_id)
    {
        //change unseen tickets to seen
        $seenTickets = Ticket::where('subject_id', $subject_id)->where('message_status', 'unseen')->whereNotNull('user_id')->get();
        foreach ($seenTickets as $seenTicket) {
            $seenTicket->message_status = 'seen';
            $seenTicket->save();
        }

        $tickets = TicketSubject::find($subject_id)->tickets()->get();
        $ticketSubject = TicketSubject::find($subject_id);

        return view('admin.ticket.send-ticket', compact('tickets', 'ticketSubject'));
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
}
