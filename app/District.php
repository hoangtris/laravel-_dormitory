<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //Quận huyện
    protected $table = 'districts';
    public $timestamps = false;

    public function province()
    {
        return $this->belongsTo('App\Province','province_id');
    }

    public function users(){
    	return $this->hasMany('App\User');
    }
}
