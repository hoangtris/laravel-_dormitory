<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $table = "feedback";
    
    protected $fillable = [
    	'name', 'email', 'subject', 'content'
    ];
}