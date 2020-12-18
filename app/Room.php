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

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function typeRoom()
    {
    	# code...
    	return $this->belongsTo('App\TypeRoom','id_type');
    }

    public function area()
    {
    	# code...
    	return $this->belongsTo('App\Area','id_area');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
