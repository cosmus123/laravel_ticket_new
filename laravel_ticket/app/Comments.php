<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;

class Comments extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'ticket_id',
        'comment'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
