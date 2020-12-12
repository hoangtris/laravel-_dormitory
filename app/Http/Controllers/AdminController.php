<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Review;
use DB;
use App\Notification;
use App\Feedback;

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
		return redirect()->back()->with(['flag'=>'success','message'=>'Xóa đánh giá thành công.']);
	}

	public function indexNotification(){
		$notifyBooking = Notification::where('type', 'Đặt phòng')->orderby('id','desc')->get();
		$notifyCancel  = Notification::where('type', 'Trả phòng')->orderby('id','desc')->get();
		$notifyRequest = Notification::where('type', 'Yêu cầu')->orderby('id','desc')->get();

		return view('admin.notification.index', compact('notifyBooking', 'notifyCancel', 'notifyRequest'));
	}

	public function updateNotification(Request $request){
		$idNotify = $request->get('idNotify');
		Notification::where('id',$idNotify)->update(['status' => 2]);
		$idNotify = Notification::find($idNotify);
		//dd($idNotify);
		//return response()->json($idNotify);
		if($idNotify->order_id == null){
			return route('request.show', $idNotify->request_id);
		}else{
			if($idNotify->type == 'Đặt phòng'){
				return route('booking.show', $idNotify->order_id);
			}else{
				return route('cancel.index');
			}
		}
	}

	public function indexFeedback()
	{
		$feedbacks = Feedback::all();
		return view('admin.feedback', compact('feedbacks'));
	}

	public function truncateFeedback()
	{
		Feedback::truncate();
		return redirect()->back()->with(['flag'=>'success','message'=>'Xóa hết phản hồi thành công']);
	}

	public function updateFeedback(Request $request)
	{
		$id = $request->get('id');
		Feedback::where('id',$id)->update(['status' => 1]);
	}
}
