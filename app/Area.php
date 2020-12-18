<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //Khu vuc
    protected $table = "areas";
    
    public function rooms()
    {
        return $this->hasMany('App\Room','id_area');
    }
}
