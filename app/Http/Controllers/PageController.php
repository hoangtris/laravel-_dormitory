<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;
use App\TypeRoom;
use App\Area;
use Str;
use Auth;
use Hash;
use App\User;
use App\Review;
use App\Order;
use App\OrderDetail;

class PageController extends Controller
{
    //
    public function index()
    {
    	# code...
    	return view('pages.index');
    }

    public function about()
    {
    	# code...
    	return view('pages.about');
    }

    public function contact()
    {
    	# code...
    	return view('pages.index');
    }

    public function term() #điều khoản & dịch vụ
    {
    	# code...
    	return view('pages.term');
    }

    public function roomsAll() 
    {
        # code...
        $rooms = Room::whereBetween('status',[1,2])->orderBy('id','desc')->paginate(15);
        $typesRoom = TypeRoom::all();
        $areas = Area::all();

        return view('pages.rooms', compact('rooms','typesRoom','areas'));
    }

    public function roomsArea() 
    {
        # code...
        $url = request()->path();
        $slug = Str::of($url)->explode('/');
        //echo $slug[2];
        
        $idArea = Area::where('slug',$slug[2])->first(); #lấy ID Khu vực

        $rooms = Room::where('id_area',$idArea->id)->orderBy('id','desc')->paginate(15);
        $typesRoom = TypeRoom::all();
        $areas = Area::all();
        //dd($rooms);
        return view('pages.rooms', compact('rooms','typesRoom','areas'));
    }

    public function roomsType() 
    {
        # code...
        $url = request()->path();
        $slug = Str::of($url)->explode('/');
        //echo $slug[2];
        
        $idType = TypeRoom::where('slug',$slug[2])->first(); #lấy ID Khu vực

        $rooms = Room::where('id_type',$idType->id)->orderBy('id','desc')->paginate(15);
        $typesRoom = TypeRoom::all();
        $areas = Area::all();
        //dd($rooms);
        return view('pages.rooms', compact('rooms','typesRoom','areas'));
    }

    public function roomsPrice() 
    {
        # code...
        $url = request()->path();
        $slug = Str::of($url)->explode('/');
        $slug = urldecode($slug[2]);

        switch ($slug) {
            case '<1tr':
                # code...
                $typesRoom = TypeRoom::all();
                $areas = Area::all();
                $rooms = Room::where('price','<','1000000')->orderBy('id','desc')->paginate(15);
                return view('pages.rooms',compact('rooms','areas','typesRoom'));
                break;
            case '1-2tr':
                # code...
                $typesRoom = TypeRoom::all();
                $areas = Area::all();
                $rooms = Room::whereBetween('price',[1000000,2000000])->orderBy('id','desc')->paginate(15);
                return view('pages.rooms',compact('rooms','areas','typesRoom'));
                break;
            case '2-3tr':
                # code...
                $typesRoom = TypeRoom::all();
                $areas = Area::all();
                $rooms = Room::whereBetween('price',[2000000,3000000])->orderBy('id','desc')->paginate(15);
                return view('pages.rooms',compact('rooms','areas','typesRoom'));
                break;
            case '3-4tr':
                # code...
                $typesRoom = TypeRoom::all();
                $areas = Area::all();
                $rooms = Room::whereBetween('price',[3000000,4000000])->orderBy('id','desc')->paginate(15);
                return view('pages.rooms',compact('rooms','areas','typesRoom'));
                break;
            default:
                # code...
                $typesRoom = TypeRoom::all();
                $areas = Area::all();
                $rooms = Room::where('price','>','4000000')->orderBy('id','desc')->paginate(15);
                return view('pages.rooms',compact('rooms','areas','typesRoom'));
                break;
        }
    }

    public function roomsSearch(Request $request)
    {
        # code...
        $typesRoom = TypeRoom::all();
        $areas = Area::all();
        $rooms = Room::where('price','like','%'.$request->key.'%')
                        ->orWhere('id','like','%'.$request->key.'%')
                        ->orWhere('short_description','like','%'.$request->key.'%')
                        ->orWhere('long_description','like','%'.$request->key.'%')
                        ->orWhere('note','like','%'.$request->key.'%')
                        ->paginate(15);
        $roomFull = OrderDetail::where('note','like','%Đơn đặt phòng%')
                                   ->get();
        return view('pages.rooms',compact('rooms','areas','typesRoom'));
    }

    public function roomsDetail($id)
    {
        # code...
        $users = User::all();
        $reviews = Review::where('room_id',$id)->get();
        $typesRoom = TypeRoom::all();
        $areas = Area::all();
        $room = Room::where('id',$id)->first();

        if(Auth::check()){
            $orderOfCustomer = Order::where('user_id',Auth::user()->id)
                                        ->orderBy('id','desc')
                                        ->first();
            if($orderOfCustomer == null){
                $roomOfCustomer = null;
                return view('pages.room',compact('room','areas','typesRoom','users','reviews','roomOfCustomer'));                              
            }else{
                $orderID = $orderOfCustomer->id;
                $roomOfCustomer = OrderDetail::where('order_id',$orderID)
                                               ->where('note','like','%Đơn đặt phòng%')
                                               ->first();
                return view('pages.room',compact('room','areas','typesRoom','users','reviews','roomOfCustomer'));  
            }
        }else{
            //dd($roomFull);
            return view('pages.room',compact('room','areas','typesRoom','users','reviews'));
        }

    }

    public function checkout(Request $request, $id)
    {
        # code...
        if(isset($_POST['book'])){
            $users = User::all();
            $typesRoom = TypeRoom::all();
            $areas = Area::all();
            $room = Room::where('id',$id)->first();
            return view('pages.checkout',compact('room','areas','typesRoom','users'));   
            //echo 'co nhan';         
        }else{
            abort(404);
        }
    }

    public function payment(Request $request)
    {
        # code...
        echo '<pre>';
        print_r($request->all());

        $date_move_in = $request->date_move_in;
        echo $date_move_in;
        switch($request->duration){
            case 1:
                $date=date_create("$date_move_in");
                date_modify($date, "+1 month");
                $expiration_date=date_format($date, "Y-m-d");
                break;
            case 3:
                $date=date_create("$date_move_in");
                date_modify($date, "+3 months");
                $expiration_date=date_format($date, "Y-m-d");
                break;
            case 6:
                $date=date_create("$date_move_in");
                date_modify($date, "+6 months");
                $expiration_date=date_format($date, "Y-m-d");
                break;
            case 9:
                $date=date_create("$date_move_in");
                date_modify($date, "+9 months");
                $expiration_date=date_format($date, "Y-m-d");
                break;
            case 12:
                $date=date_create("$date_move_in");
                date_modify($date, "+1 year");
                $expiration_date=date_format($date, "Y-m-d");
                break;
        }
        echo '<br>';
        echo $expiration_date;
        echo '<br>';

        #xử lý định dạng tiền
        echo $request->inputTotal;
        echo '<br>';
        $inputTotal = str_replace(",","",$request->inputTotal);
        $inputTotal = str_replace(" VNĐ","",$inputTotal);
        
        echo $inputTotal.'<br>';

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->payment_method = $request->radioPayment;
        $order->total = $inputTotal;
        if($request->radioPayment == 'COD'){
            $order->status = 0;
            $order->note = 'Hóa đơn chưa thanh toán, vui lòng đến quầy thu ngân thanh toán';
        }else{
            $order->status = 1;
            $order->note = 'Đã thanh toán qua VNPAY';
        }

        $order->save();

        $order_detail = new OrderDetail;
        $order_detail->order_id = $order->id;
        $order_detail->room_id = $request->idRoom;
        $order_detail->date_move_in = $request->date_move_in;
        $order_detail->expiration_date = $expiration_date;
        $order_detail->note = "Đơn đặt phòng";
        $order_detail->status = 0;
        $order_detail->save();

        $room = Room::find($request->idRoom);
        $room->status = 2;
        $room->save();

        return redirect()->route('checkout.success');
    }

    public function checkoutsuccess()
    {
        # code...
        return view('pages.checkoutsuccess');
    }
    
    // Login - Register - Logout
    public function login()
    {
        # code...
        return view('pages.login');
    }

    public function postlogin(Request $request)
    {
        # code...
        $urlRef = $request->url_ref;
        $credentials = array('email'=>$request->email, 'password'=>$request->password);
        if(Auth::attempt($credentials)){
            //echo 'Thanh cong';
            return redirect($urlRef)->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập thất bại']);
            //echo 'thatbai';
        }
    }

    public function register()
    {
        # code...
        return view('pages.register');
    }

    public function postregister(Request $request)
    {
        # code...
        echo('<pre>');
        $file = $request->file('avatar');
        $name = Str::random(5).'_'.$file->getClientOriginalName();

        if($user = User::create($request->all())){
            $insertedId = $user->id;

            $user = User::find($insertedId);
            $user->avatar = $name;
            $user->password = Hash::make($request->password);
            $user->save();

            $file->move('upload/avatar/',$name);
            return redirect('login')->with(['flag'=>'success','message'=>'Đăng kí thành công, vui lòng đăng nhập lại.']);
        }else{
            echo 'that bai';
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng kí thất bại']);
        }
    }

    public function logout()
    {
        # code...
        Auth::logout();
        return redirect()->route('login')->with(['flag'=>'success','message'=>'Đăng xuất thành công.']);
    }
    // --------------Login - Register - Logout
}

