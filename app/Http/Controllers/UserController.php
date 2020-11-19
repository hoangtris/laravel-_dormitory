<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('id','desc')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        //
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.show', compact('user','roles'));
    }

    public function destroy($id)
    {
        //them xoa hinh, them status de an du lieu
        User::where('id',$id)->delete();
        return redirect()->route('users.index')->with(['flag'=>'success','message'=>'Xóa tài khoản thành công.']);
    }
}
