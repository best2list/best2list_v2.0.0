<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;


class TicketCategory extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['ticketSubjects'];
    protected $dates = ['deleted_at'];

    protected $table= 'ticket_categories';

    public function ticketSubjects()
    {
        return $this->hasMany(TicketSubject::class,'ticket_cat_id', 'id');
    }
}
