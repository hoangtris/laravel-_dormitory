<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //Hóa đơn
    protected $table = 'orders';

    public function user()
    {
    	# code...
    	return $this->belongsTo('App\User','user_id');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
