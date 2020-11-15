<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\User;

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
        if($request->has('slStatus')){
            if($request->slStatus == 0){
                $orderDetail = OrderDetail::where('note','like','%Đơn đặt phòng%')
                                            ->orderBy('id','desc','status','asc')
                                            ->get();
                $order = Order::all();
                $users = User::all();
                return view('admin.booking.index', compact('order','orderDetail','users')); 
            }elseif($request->slStatus == 1){
                $orderDetail = OrderDetail::where('note','like','%Đơn đặt phòng%')->where('status',0)
                                            ->orderBy('id','desc','status','asc')
                                            ->get();
                $order = Order::all();
                $users = User::all();
                return view('admin.booking.index', compact('order','orderDetail','users')); 
            }else{
                $orderDetail = OrderDetail::where('note','like','%Đơn đặt phòng%')                       ->where('status',1)
                                            ->orderBy('id','desc','status','asc')
                                            ->get();
                $order = Order::all();
                $users = User::all();
                return view('admin.booking.index', compact('order','orderDetail','users')); 
            }
        }else{
            $orderDetail = OrderDetail::where('note','like','%Đơn đặt phòng%')
                                        ->orderBy('id','desc','status','asc')
                                        ->get();
            $order = Order::all();
            $users = User::all();
            return view('admin.booking.index', compact('order','orderDetail','users'));            
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo "string";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $orderDetail = OrderDetail::find($id);

        $orderDetail->status = 1;
        $orderDetail->save();

        \Session::flash('update_status_booking_success_flash_message', 'Thay đỏi trạng thái thành công.');
        return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
