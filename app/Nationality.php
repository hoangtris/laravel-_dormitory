<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    //Quốc gia
    protected $table = 'nationalities';
    public $timestamps = false;

    public function users(){
    	return $this->hasMany('App\User');
    }
}
