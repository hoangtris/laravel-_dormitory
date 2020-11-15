<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\User;
use App\Role;

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

        $res = [
            "ProvisionalMoney" => number_format($provisionalMoney).' VNĐ',
            "VAT" => number_format($vat).' VNĐ',
            "Total" => number_format($total).' VNĐ'
        ];
    	echo json_encode($res);
    	//dd($request->all());
        //return response json
    }

    public function changeRole(Request $request)
    {
        # code...
        if($request->get('query'))
        {
            $query = $request->get('query');
            $roles = Role::all();
            $user = User::where('id',$query)->first();   
            
            foreach ($roles as $role) {
                $selected = '';
                if($role->id == $user->id_role){
                    $selected = 'selected';
                }
                echo "<option {$selected} value='{$role->id}'>{$role->name}</option>";
            }
        }
    }
}
