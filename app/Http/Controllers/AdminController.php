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
        if($request->has('slRole')){
            if($request->slRole == 0){
                $users = User::paginate(20);
                $roles = Role::all();
                $userAll = User::all();

                $count_user_of_role = DB::table('users')
                                        ->select('id_role', DB::raw('count(*) as total'))
                                        ->groupBy('id_role')
                                        ->get();

                //dd($count_user_of_role);
                return view('admin.users.permission', compact('users','roles','count_user_of_role','userAll'));
            }else{
                $users = User::where('id_role',$request->slRole)->paginate(20);
                $roles = Role::all();
                $userAll = User::all();

                $count_user_of_role = DB::table('users')
                                        ->select('id_role',DB::raw('count(*) as total'))
                                        ->groupBy('id_role')
                                        ->get();

                //dd($count_user_of_role);
                return view('admin.users.permission', compact('users','roles','count_user_of_role','userAll'));
            }
        }else{
        	$users = User::paginate(20);
        	$roles = Role::all();
            $userAll = User::all();

            $count_user_of_role = DB::table('users')
                                    ->select('id_role',DB::raw('count(*) as total'))
                                    ->groupBy('id_role')
                                    ->get();

            //dd($count_user_of_role);
        	return view('admin.users.permission', compact('users','roles','count_user_of_role','userAll'));
        }
    }

    public function roleStore(Request $request)
    {
        # code...
        $role = new Role;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        \Session::flash('add_role_success_flash_message', 'Thêm vai trò thành công.');
        return redirect()->route('admin.role');
    }

    public function roleDestroy($id)
    {
        # code...
        echo $id;
    }

    public function changeRoleUser(Request $request)
    {
        # code...
        $user = User::find($request->selectUser);
        $user->id_role = $request->selectRole;
        $user->save();

        \Session::flash('change_role_for_user_success_flash_message', 'Thay đổi vai trò cho người dùng thành công.');
        return redirect()->route('admin.role');
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
        \Session::flash('delete_review_success_flash_message', 'Xóa đánh giá thành công.');
        return redirect()->route('admin.review.index');
    }
}
