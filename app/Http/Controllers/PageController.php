<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
