<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //thong bao
    protected $table = "notifications";

    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
