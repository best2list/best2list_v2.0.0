<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;


class TicketSubject extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['tickets'];
    protected $dates = ['deleted_at'];

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
