<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;
use App\TypeRoom;
use App\Area;
use Str;
use Auth;
use App\User;

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
        $rooms = Room::orderBy('id','desc')->paginate(15);
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
                        ->orWhere('security','like','%'.$request->key.'%')
                        ->orWhere('convenient','like','%'.$request->key.'%')
                        ->orWhere('note','like','%'.$request->key.'%')
                        ->paginate(15);
        return view('pages.rooms',compact('rooms','areas','typesRoom'));
    }

    public function roomsDetail($id)
    {
        # code...
        $typesRoom = TypeRoom::all();
        $areas = Area::all();
        $room = Room::where('id',$id)->first();
        return view('pages.room',compact('room','areas','typesRoom'));
    }

    public function login()
    {
        # code...
        return view('pages.login');
    }

    public function postlogin(Request $request)
    {
        # code...
        $credentials = array('email'=>$request->email, 'password'=>$request->password);
        if(Auth::attempt($credentials)){
            //echo 'Thanh cong';
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
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
        print_r($request->all());
        if(User::create($request->all())){
            //return redirect()->back()->with(['flag'=>'success','message'=>'Đăng kí thành công']);
        }else{
            echo 'that bai';
            //return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng kí thất bại']);
        }
    }
}
