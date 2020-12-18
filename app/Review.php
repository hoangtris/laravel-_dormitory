<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //Đánh giá
    protected $table = "reviews";

    public function user()
    {
    	# code...
    	return $this->belongsTo('App\User','user_id');
    }

    public function room()
    {
    	# code...
    	return $this->belongsTo('App\Room');
    }
}
