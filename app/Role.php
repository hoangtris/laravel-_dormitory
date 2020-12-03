<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //Phan quyen - Vai trò
    protected $table = "roles";

    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
