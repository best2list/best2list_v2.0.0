<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;



class Ticket extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['ticketFiles'];
    protected $dates = ['deleted_at'];

    public function ticketFiles()
    {
        return $this->hasMany('App\TicketFiles', 'ticket_id', 'id');
    }

    public function hasUsername($id)
    {
        return User::find($id)->username;
    }
}
