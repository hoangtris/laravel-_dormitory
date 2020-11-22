<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\OrderDetail;

class ClientController extends Controller
{
    //
    public function dashboard()
    {
    	return view('client.index');
    }

    public function information()
    {
    	$user = User::find(1);
    	$role = $user->role;
    	$orderLast = $user->orders->sortByDesc('id')->first();
    	$room = OrderDetail::find($orderLast->id);
    	$reviews = $user->reviews;
    	
    	return view('client.information', compact('user', 'role', 'room', 'reviews'));
    }
}
