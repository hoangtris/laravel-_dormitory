<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
    	# code...
    	return view('admin.dashboard');
    }

    public function permission()
    {
    	# code...
    	$users = User::paginate(20);
    	$roles = Role::all();
    	return view('admin.users.permission', compact('users','roles'));
    }
}
