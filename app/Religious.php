<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religious extends Model
{
    //
    protected $table = 'religiouses';
    public $timestamps = false;

    public function users(){
    	return $this->hasMany('App\User');
    }
}
