<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;
use App\TypeRoom;
use App\Area;
use Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = Room::orderBy('id','desc')->paginate(20);
        $types = TypeRoom::all();
        $areas = Area::all();

        return view('admin.rooms.index', compact('rooms','types','areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $areas = Area::all();
        $types = TypeRoom::all();
        return view('admin.rooms.add', compact('areas', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('image');
        $name = Str::random(5).'_'.$file->getClientOriginalName();

        if($room = Room::create($request->except('_token'))){
            $insertedId = $room->id;

            $room = Room::find($insertedId);
            $room->image = $name;

            if($request->has('addRoomTemp')) {
                //
                $room->status = 0;
            }else{
                $room->status = 1;
            } 
                       
            $room->save();

            $file->move('upload/room/',$name);
            \Session::flash('add_room_success_flash_message', 'Thêm phòng thành công.');
            return redirect()->route('rooms.index');
        }else{
            \Session::flash('add_room_error_flash_message', 'Thêm phòng thất bại.');
            return redirect()->route('rooms.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $areas = Area::all();
        $types = TypeRoom::all();
        $room  = Room::find($id);
        return view('admin.rooms.edit', compact('areas', 'types', 'room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $room = Room::find($id);
        $room->update($request->all());

        if($request->hasFile('image')) {
            //
            //UUID Laravel
            $file = $request->file('image');
            $name = Str::random(5).'_'.$file->getClientOriginalName();
            $room->image = $name;
            $room->save();

            $file->move('upload/room/',$name);
        }else{
            $room->image = $request->oldImage;
            $room->save();
        }

        \Session::flash('update_room_success_flash_message', 'Sửa phòng thành công.');
        return redirect()->route('rooms.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //them xoa hinh
        Room::where('id',$id)->delete();
        \Session::flash('delete_room_success_flash_message', 'Xóa phòng thành công.');
        return redirect()->route('rooms.index');
    }
}
