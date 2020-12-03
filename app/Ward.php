<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
	//Phường xã
    protected $table = 'wards';
    public $timestamps = false;

    public function users(){
    	return $this->hasMany('App\User');
    }
}
