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

use App\Http\Controllers\NL_Checkout;

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

    public function pageNotFound()
    {
        # code...
        return view('pages.404');
    }
    
    public function roomsAll() 
    {
        $areas = Area::all();
        $types = TypeRoom::all();
        $rooms = Room::where('status',1)->orderBy('id','desc')->paginate(15);
        return view('pages.rooms', compact('rooms', 'types', 'areas'));
    }

    public function roomsArea($slug) 
    {
        $areas = Area::all();
        $types = TypeRoom::all();

        $area = Area::where('slug',$slug)->first(); 

        if($area == null){
            return view('pages.404');
        }else{
            $rooms = Room::where('status',1)
                     ->where('id_area',$area->id)
                     ->orderBy('id','desc')
                     ->paginate(15);
            return view('pages.rooms', compact('rooms', 'types', 'areas'));
        }
    }

    public function roomsType($slug) 
    {
        $areas = Area::all();
        $types = TypeRoom::all();

        $type = TypeRoom::where('slug',$slug)->first(); 

        if($type == null){
            return view('pages.404');
        }else{
            $rooms = Room::where('status',1)
                     ->where('id_type',$type->id)
                     ->orderBy('id','desc')
                     ->paginate(15);
            return view('pages.rooms', compact('rooms', 'types', 'areas'));
        }
    }

    public function roomsPrice($price) 
    {
        $areas = Area::all();
        $types = TypeRoom::all();

        switch ($price) {
            case '<1tr':
                $in = [0,999999];
                break;
            case '1-2tr':
                $in = [1000000,1999999];
                break;
            case '2-3tr':
                $in = [2000000,2999999];
                break;
            case '3-4tr':
                $in = [3000000,3999999];
                break;
            case '>4tr':
                $in = [4000000,999999999];
                break;
            default:
                $in = null;
                break;
        }
        if($in == null){
            return view('pages.404');
        }else{
            $rooms = Room::where('status',1)
                           ->whereBetween('price',$in)
                           ->orderBy('id','desc')
                           ->paginate(15);
            return view('pages.rooms', compact('rooms', 'types', 'areas'));
        }
    }

    public function roomsSearch(Request $request)
    {
        $key = $request->key;
        $areas = Area::all();
        $types = TypeRoom::all();
        $rooms = Room::where('price','like','%'.$key.'%')
                       ->orWhere('short_description','like','%'.$key.'%')
                       ->orWhere('long_description','like','%'.$key.'%')
                       ->orWhere('note','like','%'.$key.'%')
                       ->orWhere('id','like','%'.$key.'%')
                       ->where('status',1)
                       ->orderBy('id','desc')
                       ->paginate(15);
        return view('pages.rooms', compact('rooms', 'types', 'areas'));
    }

    public function roomsDetail($id)
    {
        # code...
        $room    = Room::find($id);
        $reviews = $room->reviews;

        return view('pages.room', compact('room', 'reviews'));
    }

    public function checkout(Request $request, $id)
    {
        $room = Room::where('id',$id)->first();
        return view('pages.checkout',compact('room')); 
    }

    public function payment(Request $request)
    {
        $date_move_in = $request->date_move_in;
        
        switch($request->duration){
            case 1:
                $date = date_create("$date_move_in");
                date_modify($date, "+1 month");
                $expiration_date = date_format($date, "Y-m-d");
                break;
            case 3:
                $date = date_create("$date_move_in");
                date_modify($date, "+3 months");
                $expiration_date = date_format($date, "Y-m-d");
                break;
            case 6:
                $date = date_create("$date_move_in");
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

        $inputPrice = str_replace(",", "", $request->inputPrice);
        $inputPrice = str_replace(" VNĐ", "", $inputPrice);

        $inputVAT   = str_replace(",", "", $request->inputVAT);
        $inputVAT   = str_replace(" VNĐ", "", $inputVAT);

        $inputTotal = str_replace(",", "", $request->inputTotal);
        $inputTotal = str_replace(" VNĐ", "", $inputTotal);
        
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->payment_method = $request->radioPayment;
        $order->price   = $inputPrice;
        $order->vat     = $inputVAT;
        $order->total   = $inputTotal;
        $order->status  = 1;
        $order->note    = 'Hóa đơn chưa thanh toán, vui lòng đến quầy thu ngân thanh toán';
        $order->save();

        if($request->radioPayment != 'COD'){
            include(app_path() . '/NganLuong/config.php');
            // Lấy các tham số để chuyển sang Ngânlượng thanh toán:
            //$ten= $_POST["txt_test"];
            $receiver=RECEIVER;
            //Mã đơn hàng 
            $order_code=$order->id;
            //Khai báo url trả về 
            $return_url= route('checkout.success');
            // Link nut hủy đơn hàng
            $cancel_url= route('rooms.detail', $request->idRoom);  
            $notify_url= route('checkout.success');
            //Giá của cả giỏ hàng 
            $txh_name  = $request->name;  
            $txt_email = $request->email;    
            $txt_phone = $request->phone;    
            $price     = $inputTotal;     
            //Thông tin giao dịch
            $transaction_info="Thong tin giao dich";
            $currency= "vnd";
            $quantity=1;
            $tax=0;
            $discount=0;
            $fee_cal=0;
            $fee_shipping=0;
            $order_description="Thong tin don hang: ".$order_code;
            $buyer_info=$txh_name."*|*".$txt_email."*|*".$txt_phone;
            $affiliate_code="";
            //Khai báo đối tượng của lớp NL_Checkout
            $nl= new NL_Checkout();
            $nl->nganluong_url = NGANLUONG_URL;
            $nl->merchant_site_code = MERCHANT_ID;
            $nl->secure_pass = MERCHANT_PASS;
            //Tạo link thanh toán đến nganluong.vn
            $url= $nl->buildCheckoutUrlExpand($return_url, $receiver, $transaction_info, $order_code, $price, $currency, $quantity, $tax, $discount , $fee_cal,    $fee_shipping, $order_description, $buyer_info , $affiliate_code);
            //$url= $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $price);
            
            //echo $url; die;
            if ($order_code != "") {
                //một số tham số lưu ý
                //&cancel_url=http://yourdomain.com --> Link bấm nút hủy giao dịch
                //&option_payment=bank_online --> Mặc định forcus vào phương thức Ngân Hàng
                $url .='&cancel_url='. $cancel_url . '&notify_url='.$notify_url;
                //$url .='&option_payment=bank_online';
                
                echo '<meta http-equiv="refresh" content="0; url='.$url.'" >';
                //&lang=en --> Ngôn ngữ hiển thị google translate
            }
        }

        $order_detail = new OrderDetail;
        $order_detail->order_id = $order->id;
        $order_detail->room_id = $request->idRoom;
        $order_detail->date_move_in = $request->date_move_in;
        $order_detail->expiration_date = $expiration_date;
        $order_detail->note = "note note note note note"; //sua lai
        $order_detail->status = 1;
        $order_detail->save();

        $room = Room::find($request->idRoom);
        $room->status = 2;
        $room->save();

        //transaction Laravel

        if($request->radioPayment == 'COD'){
            return redirect()->route('checkout.success');
        }
    }

    public function checkoutsuccess()
    {
        # code...
        $url = url()->full(); // test
        if(strstr($url, 'transaction_info')){
            include(app_path() . '/NganLuong/config.php');
            $transaction_info =$_GET['transaction_info'];
            $order_code =$_GET['order_code'];
            $price =$_GET['price'];
            $payment_id =$_GET['payment_id'];
            $payment_type =$_GET['payment_type'];
            $error_text =$_GET['error_text'];
            $secure_code =$_GET['secure_code'];
            
            $nl= new NL_Checkout();
            $nl->merchant_site_code = MERCHANT_ID;
            $nl->secure_pass = MERCHANT_PASS;
            //Tạo link thanh toán đến nganluong.vn
            $checkpay= $nl->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);
            
            if ($checkpay) {    
                $order = Order::find($order_code);
                $order->status = 3;
                $order->note   = 'Đã thanh toán qua Ngân Lượng';

                $message = "Thanh toán thành công";
                $order->save();
            }else{
                $message = "Thanh toán thất bại";
            }
        }       

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

