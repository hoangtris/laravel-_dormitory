<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id_role','gender','date_of_birth','place_of_birth','phone','identity_card_number','issued_on','issued_at','address','avatar','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function role()
    {
        return $this->belongsTo('App\Role', 'id_role');
    }

    public function nation()
    {
        return $this->belongsTo('App\Nation');
    }

    public function issuedAt()
    {
        return $this->belongsTo('App\Province', 'issued_at');
    }

    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function ward()
    {
        return $this->belongsTo('App\Ward');
    }

    public function roomRequests()
    {
        return $this->hasMany('App\RoomRequest');
    }

    public function religious(){
        return $this->belongsTo('App\Religious');
    }

    public function nationality(){
        return $this->belongsTo('App\Nationality');
    }

    public function notifies()
    {
        return $this->hasMany('App\Notification');
    }
}
