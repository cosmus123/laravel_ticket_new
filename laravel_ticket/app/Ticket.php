<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comments;

class Ticket extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'number',
        'department',
        'created_at',
        'email',
        'subject',
        'message',
        'state'
    ];

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function status()
    {
        return $this->hasMany(Status::class);
    }
}
