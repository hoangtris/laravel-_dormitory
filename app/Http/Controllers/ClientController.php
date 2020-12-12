<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File; 
use Str;
use Auth;
use Hash;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\OrderDetail;
use App\Province;
use App\Nation;
use App\Religious;
use App\Nationality;
use App\Room;
use App\RoomRequest;
use App\Notification;
use App\Review;

class ClientController extends Controller
{
	//
	public function dashboard()
	{
		$id = Auth::id();
		$user = User::find($id);
		$orderLast = $user->orders->sortByDesc('id')->first();
		if($orderLast == null){
			$od = null;
		}else{
			$od = OrderDetail::findOrFail($orderLast->id);
			if($od->status == 4){
				$od = null;
			}
		}
		#tổng tiền
		$total = Order::where('user_id',$id)
							->groupBy('user_id')
							->selectRaw('sum(total) as total')
							->first();
		#thông báo
		$notify = Notification::where('status', 3)->where('user_id', Auth::id())->get();
		#đơn yêu cầu
		$req = RoomRequest::where('user_id', Auth::id())->get();
		return view('client.index', compact('od', 'total', 'notify', 'req'));
	}
 
	public function information()
	{
		$id = Auth::id();
		$user = User::find($id);
		//dd($user);
		$orderLast = $user->orders->sortByDesc('id')->first();
		if($orderLast == null){
			$od = null;
		}else{
			$od = OrderDetail::findOrFail($orderLast->id);
			if($od->status == 4){
				$od = null;
			}
		}
		$reviews = $user->reviews;
		
		return view('client.information', compact('user', 'od', 'reviews'));
	}

	public function edit($id){
		$provinces = Province::orderBy('name')->get();
		$nations = Nation::all();
		$religiouses = Religious::all();
		$nationalities = Nationality::all();
		$user = User::find($id);
		return view('client.editInformation', compact('user', 'provinces', 'nations', 'religiouses', 'nationalities'));
	}

	public function update(Request $request, $id){
		if($request->editInfor){
			User::where('id',$id)->update($request->except('_token', 'editInfor', 'oldAvatar'));
			
			if($request->hasFile('avatar')){
					 #xoa anh cu
				$image_path = "upload/avatar/".$request->oldAvatar;
				File::delete($image_path);
					 #di chuyen anh moi vao
				$file = $request->file('avatar');
				$name = Str::random(8).'_'.$file->getClientOriginalName();
				$file->move('upload/avatar/',$name);
			}else{  
				$name = $request->oldAvatar;
			}

			$user = User::find($id);
			$user->avatar = $name;
			$user->save();

			return redirect()->route('client.information')
			->with(['flag'=>'success','message'=>'Sửa thông tin thành công.']);
		}elseif($request->cancel){
			return redirect()->route('client.information');
		}else{
			echo 'Loi khong xac dinh';
		}
	}

	public function editPassword(){
		$id = Auth::id();
		$user = User::find($id);
		return view('client.changePassword', compact('user'));
	}

	public function updatePassword(Request $request, $id){
		$current_password = Auth::User()->password;  

		if(Hash::check($request->input('oldPassword'), $current_password)){          
			if($request->confirmPassword == $request->newPassword){
				$user = User::find($id);
				$user->password = Hash::make($request->confirmPassword);
				$user->save();

				return redirect()->back()
				->with(['flag'=>'success','message'=>'Đổi mật khẩu thành công.']);
			}else{
				return redirect()->back()
				->with(['flag'=>'warning','message'=>'Hai mật khẩu phải trùng nhau.']);
			}
		}else{           
			return redirect()->back()
			->with(['flag'=>'error','message'=>'Mật khẩu cũ không đúng.']);
		}          
	}

	public function room(){
		$id   =  Auth::id();
		$user = User::find($id);
		$orderLast = $user->orders->sortByDesc('id')->first();
		if($orderLast == null){
			$od = null;
		}else{
			$od = OrderDetail::findOrFail($orderLast->id);
			if($od->status == 4){
				$od = null;
			}
		}

		$listRequest = User::find($id)->roomRequests;
		return view('client.room', compact('od', 'listRequest'));
	}

	//---------trả phòng sớm hơn dự kiến
    public function roomCancel(Request $request, $id){
        $od = OrderDetail::find($id);
        $od->early_checkout_date = now();
        $od->note = $request->note;
        $od->status = 3; #huy phong - cho xac nhan
        $od->save();

        $notify = new Notification;
        $notify->user_id = Auth::id();
        $notify->type 	 = 'Trả phòng';
        $notify->content = 'trả phòng '.$od->room_id;
        $notify->status  = 1;
        $notify->order_id= $od->order_id;
        $notify->save();

        return redirect()->back()->with(['flag'=>'success','message'=>'Hủy phòng thành công. Vui lòng chờ quản lý phong xác nhận']);
    }

	public function storeRequest(Request $request){
		$id   =  Auth::id();
		$user = User::find($id);
		$orderLast = $user->orders->sortByDesc('id')->first();
		$room = OrderDetail::find($orderLast->id);

		$req = new RoomRequest;
		$req->user_id = $user->id;
		$req->room_id = $room->room_id;
		$req->type = $request->type;
		$req->content = $request->content;
		$req->status = 1 ; #chua chap nhan
		$req->save();

		$notify = new Notification;
        $notify->user_id = $id;
        $notify->type 	 = 'Yêu cầu';
        $notify->content = 'yêu cầu phòng '.$room->room_id;
        $notify->status  = 1;
        $notify->request_id = $req->id;
        $notify->save();
		  
		return redirect()->back()->with(['flag'=>'success','message'=>'Gửi yêu cầu thành công.']);
	}

	//-------thong bao
	public function indexNotification(){
		$notify = Notification::where('user_id', Auth::id())->orderby('id','desc')->get();

		return view('client.notification', compact('notify'));
	}

	public function updateNotification(Request $request){
		$idNotify = $request->get('idNotify');
		Notification::where('id',$idNotify)->update(['status' => 4]);
		$idNotify = Notification::find($idNotify);
		
		return route('client.room');
	}

	public function updateAllNotification(){
		Notification::where('user_id', Auth::id())->update(['status' => 4]);
	}

	//------review
	public function storeReview(Request $request){
		$review = new Review;
		$review->user_id = Auth::id();
		$review->room_id = $request->room_id;
		$review->content = $request->content;
		$review->save();

		return redirect()->back()->with(['flag'=>'success','message'=>'Đánh giá thành công']);;
	}
}
