<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeRoom extends Model
{
    //loai phong
    protected $table = 'type_rooms';

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
}
