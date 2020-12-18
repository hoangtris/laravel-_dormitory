<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;
use App\TypeRoom;
use App\Area;
use Str;

class RoomController extends Controller
{
    public function index()
    {
        //
        $rooms = Room::orderBy('id','desc')->paginate(20);
        $types = TypeRoom::all();
        $areas = Area::all();

        return view('admin.rooms.index', compact('rooms','types','areas'));
    }

    public function create()
    {
        //
        $areas = Area::all();
        $types = TypeRoom::all();
        return view('admin.rooms.add', compact('areas', 'types'));
    }

    public function store(Request $request)
    {
        //
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $name = Str::random(5).'_'.$file->getClientOriginalName();
            $file->move('upload/room/',$name);
        }else{
            $name = "https://www.mandlpaints.com/wp-content/uploads/2018/09/Ash-Grey.jpg";
        }
        
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

            return redirect()->route('rooms.index')->with(['flag'=>'success','message'=>'Thêm phòng '.$room->id.' thành công.']);
        }else{
            return redirect()->route('rooms.index')->with(['flag'=>'success','message'=>'Thêm loại phòng thất bại.']);
        }
    }

    public function edit($id)
    {
        //
        $areas = Area::all();
        $types = TypeRoom::all();
        $room  = Room::find($id);
        return view('admin.rooms.edit', compact('areas', 'types', 'room'));
    }

    public function update(Request $request, $id)
    {
        //
        $room = Room::find($id);
        $room->update($request->all());

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $name = Str::random(5).'_'.$file->getClientOriginalName();
            $room->image = $name;
            $room->save();

            $file->move('upload/room/',$name);
        }else{
            $room->image = $request->oldImage;
            $room->save();
        }

        return redirect()->route('rooms.index')->with(['flag'=>'success','message'=>'Sửa phòng '.$room->id.' thành công.']);
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
        return redirect()->route('rooms.index')->with(['flag'=>'success','message'=>'Xóa phòng thành công.']);
    }
}
