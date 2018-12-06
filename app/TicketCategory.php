<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TicketCategory extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table= 'ticket_categories';

    public function ticketSubjects()
    {
        return $this->hasMany(TicketSubject::class,'ticket_cat_id', 'id');
    }
}
