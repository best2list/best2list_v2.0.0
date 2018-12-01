<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketSubject extends Model
{
    protected $table = 'ticket_subjects';

    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'subject_id','id');
    }

    public function hasCategory($id)
    {
        return TicketCategory::find($id)->name;
    }
}
