<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table = 'order_details';
    public $timestamps = false;

    public function user()
    {
    	# code...
    	return $this->belongsTo('App\User','user_id');
    }

    public function order()
    {
    	# code...
    	return $this->belongsTo('App\Order');
    }
}
