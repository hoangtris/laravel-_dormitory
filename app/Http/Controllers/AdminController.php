<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Review;
use DB;
use App\Notification;
use App\Feedback;
use App\OrderDetail;
use App\RoomRequest;
use App\Order;

class AdminController extends Controller
{
	 //
	public function dashboard()
	{
		#hoa don qua han
		$order = Order::where('status', 1)->get();
		$countOrderExpired = 0;
		foreach ($order as $o) {
			if (date('Y-m-d') > $o->created_at->addDays(3)) {
				$countOrderExpired++;
			}
		}
		#hoa don trong ngay
		$orderInDay = Order::whereDay('created_at', date('d'))->get();
		#don dat phong
		$booking = OrderDetail::where('status', 1)->get();
		#don tra phong som
		$cancel  = OrderDetail::where('status', 3)->get();
		#don yeu cau
		$request = RoomRequest::where('status', 1)->get();
		#phan hoi
		$feedback= Feedback::where('status', 0)->get();
		#danh gia phong
		$review  = Review::all();
		#khu vuc moi - limit 3
		$areas   = \App\Area::orderBy('id','desc')->limit(3)->get();
		#loai phong moi - limit 3
		$types   = \App\TypeRoom::orderBy('id','desc')->limit(3)->get();
		#phong moi - limit 3
		$rooms   = \App\Room::orderBy('id','desc')->limit(3)->get();
		//dd($areas);
		#danh gia 
		$reviews  = Review::orderBy('id','desc')->get();
		
		return view('admin.dashboard', compact('booking', 'cancel', 'request', 'feedback', 'order', 'review', 'countOrderExpired', 'orderInDay', 'areas', 'types', 'rooms', 'reviews'));
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

	//ajax
	public function reviewShow(Request $request)
	{
		$id = $request->get('id');
		$review = Review::find($id);
		return response()->json($review);
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
