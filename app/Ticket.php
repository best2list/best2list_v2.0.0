<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function ticketFiles()
    {
        return $this->hasMany('App\TicketFiles', 'ticket_id', 'id');
    }

    public function hasUsername($id)
    {
        return User::find($id)->username;
    }
}
