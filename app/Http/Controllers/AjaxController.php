<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\User;
use App\Role;
use App\Province;
use App\District;
use App\Ward;

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
        if($request->get('idRole'))
        {
            $idRole = $request->get('idRole');
            $roles = Role::all();
            $user = User::where('id',$idRole)->first();   
            
            foreach ($roles as $role) {
                $selected = '';
                if($role->id == $user->id_role){
                    $selected = 'selected';
                }
                echo "<option {$selected} value='{$role->id}'>{$role->name}</option>";
            }
        }
    }

    public function province(Request $request){
        if($request->get('province')){
            $idProvince = $request->get('province');
            $districts = District::where('province_id',$idProvince)->get();

            //echo json_encode($districts);
            return response()
                    ->json($districts);
        }
    }

    public function district(Request $request){
        if($request->get('district')){
            $idDistrict = $request->get('district');
            $wards = Ward::where('district_id',$idDistrict)->get();
            
            return response()
                    ->json($wards);
            //return respond json;
        }
    }
}
