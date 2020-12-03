<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\User;
use App\Area;
use App\Room;
use App\RoomRequest;
use App\Notification;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //sua lai, khoang cach ra, group by Model
        // status them cac trang thai: don dat phong, don huy phong
        /*
        1 - chua chap nhan - don dat phong
        2 - da chap nhan - don dat phong
        3 - don huy phong - chua chap nhan
        4 - don huy phong - da chap nhan
        5 -
        6 -
        */
        $orders = Order::all();
        $users = User::all();
        $in = [1,2];

        if($request->has('slStatus')){
            $status = $request->slStatus;
            if($status != 0){
                $in = [$status];
            }
        }

        $orderDetail = OrderDetail::whereIn('status',$in)
                                    ->orderBy('status', 'asc')
                                    ->orderBy('id', 'desc')
                                    ->get(); 

        return view('admin.booking.index', compact('orders','orderDetail','users'));
    }

    public function show($id)
    {
        $orderDetail = OrderDetail::find($id);
        $order = Order::find($orderDetail->order_id);
        $user = User::find($order->user_id);
        $room = Room::find($orderDetail->room_id);
        return view('admin.booking.showbooking', compact('orderDetail', 'order', 'user', 'room'));   
    }

    public function update(Request $request, $id)
    {
        //
        $orderDetail = OrderDetail::find($id);
        $orderDetail->status = 2;
        $orderDetail->save();

        $order = Order::find($orderDetail->order_id);
        if($order->status == 1){
            $order->status = 2;
            $order->note   = 'Đã thanh toán - QLPHONG xác nhận';
            $order->save();
            
        }
        Notification::where('order_id',$orderDetail->order_id)->update(['status' => 3]);

        return redirect()->back()->with(['flag'=>'success','message'=>'Thay trạng thái thành công. Đã thông báo đến khách hàng']);
    }

    public function indexCancel(Request $request)
    {
        //sua lai, khoang cach ra, group by Model
        // status them cac trang thai: don dat phong, don huy phong
        /*
        1 - chua chap nhan - don dat phong
        2 - da chap nhan - don dat phong
        3 - don huy phong - chua chap nhan
        4 - don huy phong - da chap nhan
        5 -
        6 -
        */
        $orders = Order::all();
        $users = User::all();
        $in = [3,4];

        if($request->has('slStatus')){
            $status = $request->slStatus;
            if($status != 0){
                $in = [$status];
            }
        }

        $orderDetail = OrderDetail::whereIn('status',$in)
                                    ->orderBy('status', 'asc')
                                    ->orderBy('id', 'desc')
                                    ->get(); 

        return view('admin.booking.cancelroom', compact('orders','orderDetail','users'));
    }

    public function updateCancel(Request $request, $id)
    {
        //
        $orderDetail = OrderDetail::find($id);
        $orderDetail->status = 4;
        $orderDetail->save();

        Notification::where('order_id',$orderDetail->order_id)->update(['status' => 3]);

        return redirect()->back()->with(['flag'=>'success','message'=>'Đã chấp nhận đơn trả phòng sớm. Hệ thống đã thông báo đến khách hàng.']);
    }

    public function indexRequest(Request $request)
    {
        /*
        1 - chua chap nhan
        2 - da chap nhan 
        */
        $users = User::all();
        $in = [1,2];

        if($request->has('slStatus')){
            $status = $request->slStatus;
            if($status != 0){
                $in = [$status];
            }
        }

        $requests = RoomRequest::whereIn('status',$in)
                                    ->orderBy('status', 'asc')
                                    ->orderBy('id', 'desc')
                                    ->get(); 
        return view('admin.booking.requestroom', compact('users', 'requests'));
    }

    public function showRequest($id){
        $request = RoomRequest::find($id);
        return view('admin.booking.showrequest', compact('request'));
    }

    public function updateRequest($id)
    {
        $request = RoomRequest::find($id);
        $request->status = 2;
        $request->save();
        Notification::where('request_id',$request->id)->update(['status' => 3]);

        return redirect()->back()->with(['flag'=>'success','message'=>'Đã chấp nhận đơn yêu cầu. Hệ thống đã gửi thông báo đến người dùng.']);
    }
}
