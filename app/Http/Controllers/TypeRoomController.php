<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeRoom;
use Illuminate\Support\Str;

class TypeRoomController extends Controller
{
    public function index()
    {
        //
        $typesRoom = TypeRoom::all();
        return view('admin.typesroom.index',compact('typesRoom'));
    }

    public function store(Request $request)
    {
        //
        $slug = Str::slug($request->name, '-');
        $typeExist = TypeRoom::where('slug',$slug)->first();

        if($typeExist == null){
            $type = new TypeRoom;
            $type->name = $request->name;
            $type->slug = $slug;
            $type->description = $request->description;
            $type->save();

            return redirect()->back()->with(['flag'=>'success','message'=>'Thêm loại phòng '.$type->name.' thành công.']);
        }else{
            return redirect()->back()->with(['flag'=>'error','message'=>'Thêm loại phòng '.$request->name.' thất bại.']);
        }
    }

    public function edit($id)
    {
        //
        $type = TypeRoom::find($id);
        return view('admin.typesroom.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        //
        $slug = Str::slug($request->name, '-');
        $typeExist = TypeRoom::where('slug',$slug)->first();

        $type = TypeRoom::find($id);

        if($typeExist == null){
            $type->name = $request->name;
            $type->slug = $slug;
        }
        $type->description = $request->description;
        $type->save();
        return redirect()->route('typesroom.index')->with(['flag'=>'success','message'=>'Sửa loại phòng '.$type->name.' thành công.']);
    }

    public function destroy($id)
    {
        //
        $check = TypeRoom::find($id)->rooms;
        if (count($check) == 0) {
            TypeRoom::where('id',$id)->delete();
            return redirect()->route('typesroom.index')->with(['flag'=>'success','message'=>'Xóa loại phòng thành công.']);
        } else {
            return redirect()->route('typesroom.index')->with(['flag'=>'error','message'=>'Xóa loại phòng thất bại.']);
        }

    }
}
