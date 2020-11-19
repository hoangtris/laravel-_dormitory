<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Review;
use DB;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
    	# code...
    	return view('admin.dashboard');
    }

    public function role(Request $request)
    {
    	# code...
        $roles = Role::all();
        $userAll = User::all();

        if($request->has('slRole')){
            if($request->slRole == 0){
                $users = User::paginate(20);
                return view('admin.users.permission', compact('users','roles','userAll'));
            }else{
                $users = User::where('id_role',$request->slRole)->paginate(20);
                return view('admin.users.permission', compact('users','roles','userAll'));
            }
        }else{
        	$users = User::paginate(20);
        	return view('admin.users.permission', compact('users','roles','userAll'));
        }
    }

    public function roleStore(Request $request)
    {
        # code...
        $role = new Role;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        return redirect()->route('admin.role')
               ->with(['flag'=>'success','message'=>'Xóa vai trò '.$role->name.' thành công.']);
    }

    public function roleDestroy($id)
    {
        # code...
        echo $id; //Dang xay dung
    }

    public function changeRoleUser(Request $request)
    {
        # code...
        $user = User::find($request->selectUser);
        $user->id_role = $request->selectRole;
        $user->save();
        return redirect()->route('admin.role')->with(['flag'=>'success','message'=>'Thay đổi vai trò #'.$user->id.' - '.$user->name.' thành công.']);;
    }

    public function requestPage()
    {
        # code...
        return view('admin.users.request');
    }

    public function reviewIndex()
    {
        # code...
        $reviews = Review::paginate(25);
        $users = User::all();
        return view('admin.reviews.index', compact('reviews', 'users'));
    }

    public function reviewDestroy($id)
    {
        # code...
        Review::find($id)->delete();
        # \Session::flash('delete_review_success_flash_message', 'Xóa đánh giá thành công.');
        return redirect()->route('admin.review.index')->with(['flag'=>'success','message'=>'Xóa đánh giá thành công.']);
    }
}
