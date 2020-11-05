<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class AjaxController extends Controller
{
    //
    public function total(Request $request)
    {
    	# code...
    	$idRoom = $request->get('idRoom');
    	$duration = $request->get('duration');
    	$room = Room::where('id',$idRoom)->first();
    	$price = $room->price;
    	$provisionalMoney = $duration * $price;
    	$vat = $provisionalMoney * 0.05;
    	$total = $provisionalMoney + $vat;

    	echo json_encode(array("ProvisionalMoney" => number_format($provisionalMoney).' VNĐ', "VAT" => number_format($vat).' VNĐ', "Total" => number_format($total).' VNĐ'));
    	//dd($request->all());
    }
}
