<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //phong
    protected $table = 'rooms';
    protected $fillable = [
        'id_area', 'id_type', 'capacity', 'price', 'duration', 'image', 'short_description', 'long_description', 'note', 'status'
    ];
}
