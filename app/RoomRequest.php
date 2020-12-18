<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomRequest extends Model
{
    //
    protected $table = 'room_requests';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
