<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\User;
use App\Area;
use App\Room;

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

        return redirect()->back()->with(['flag'=>'success','message'=>'Thay trạng thái thành công.']);
    }
}
