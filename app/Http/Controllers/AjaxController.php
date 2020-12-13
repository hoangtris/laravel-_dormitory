<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\User;
use App\Role;
use App\Province;
use App\District;
use App\Ward;
use App\RoomRequest;

class AjaxController extends Controller
{
    public function ajaxRegister(Request $request){

        $identity_card_number = $request->get('identity_card_number');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $username = $request->get('username');

        if($identity_card_number != '') #cmnr
        {
            if(strlen($identity_card_number) == 9 || strlen($identity_card_number) == 12){
                $pattern = '/^[0-9]+$/'; # dáu ^ và $ dùng để so sánh giá trị tuyệt đối pattern
                if(preg_match($pattern, $identity_card_number)){
                    $data = User::where('identity_card_number', $identity_card_number)->get();
                    if(count($data) == null){
                       echo "<p class='text-success'>Hợp lệ</p>";
                    }else{
                       echo "CMND này đã được sử dụng";
                    }
                }else{
                    echo "CMND chỉ chấp nhận chữ số";
                }
            }else{
                echo "CMND bao gồm 9 hoặc 12 chữ số";
            }
        }

        if($phone != '')
        {
            $pattern = '/^[0-9]+$/'; # dáu ^ và $ dùng để so sánh giá trị tuyệt đối pattern
            if(preg_match($pattern, $phone)){
                if(strlen($phone) == 9 || strlen($phone) == 10){
                    $data = User::where('phone', $phone)->get();
                    if(count($data) == null){
                        echo "<label class='text-success'>Hợp lệ</label>";
                    }else{
                        echo "SDT này đã được sử dụng";
                    }
                }else{
                    echo "SDT bao gồm 9 hoặc 10 chữ số";
                }
            }else{
                echo "SDT chỉ chấp nhận chữ số";
            }
        }

        if($email != '')
        {
            $pattern = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]/"; #pattern của email
            if(preg_match($pattern, $email)){
                $data = User::where('email', $email)->get();
                if(count($data) !=1){
                    echo "<label class='text-success'>Hợp lệ</label>";
                }else{
                    echo "Email này đã được sử dụng";
                }
            }else{
                echo "Email không hợp lệ";
            }
        }

        if($username != '')
        {
            if(strlen($username) >= 6 && strlen($username) <= 32){
                $data = User::where('username', $username)->get();
                if(count($data) !=1){
                    echo "<label class='text-success'>Hợp lệ</label>";
                }else{
                    echo "Username này đã được sử dụng";
                }
            }else{
                echo "Username có độ dài 6-32 kí tự";
            }
        }
    }
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

    public function showRequest(Request $request)
    {
        if($request->get('idRequest')){
            $id = $request->get('idRequest');
            $request = RoomRequest::find($id);
            return response()
                    ->json($request);
        }
    }
}
