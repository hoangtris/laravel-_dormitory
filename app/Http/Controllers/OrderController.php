<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;

class OrderController extends Controller
{
    public function index()
    {
    	$order = Order::all();
    	return view('admin.order.index', compact('order'));
    }

    public function show($id)
    {
    	$order = Order::find($id);
    	return view('admin.order.show', compact('order'));
    }

    public function update($id)
    {
    	$order = Order::find($id);
    	$order->status = 2;
    	$order->note = 'Đã thanh toán - THUNGAN xác nhận';
    	$order->save();
        return redirect()->back()->with(['flag'=>'success','message'=>'Thành công.']);
    }

    public function destroy($id)
    {
        OrderDetail::where('order_id',$id)->delete(); 
        Order::where('id',$id)->delete(); 
        
        return redirect()->back()->with(['flag'=>'success','message'=>'Thành công.']);
    }
}
