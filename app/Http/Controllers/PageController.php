<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;
use App\TypeRoom;
use App\Area;
use Str;

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

}
