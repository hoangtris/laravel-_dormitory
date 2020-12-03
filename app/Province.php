<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //Tỉnh thành
    protected $table = 'provinces';
    public $timestamps = false;

    public function districts(){
    	return $this->hasMany('App\District');
    }

    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
