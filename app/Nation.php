<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    //Dân tộc
    protected $table = 'nations';
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
