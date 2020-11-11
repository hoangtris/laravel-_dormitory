<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeRoom;
use Illuminate\Support\Str;

class TypeRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $typesRoom = TypeRoom::all();
        return view('admin.typesroom.index',compact('typesRoom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $type = new TypeRoom;
        $type->name = $request->name;
        $type->slug = Str::slug($request->name, '-');
        $type->description = $request->description;

        $typeExist = TypeRoom::where('slug',$type->slug)->first();

        if($typeExist == null){
            $type->save();
            \Session::flash('add_typeroom_success_flash_message', 'Thêm loại phòng thành công'); 
            return redirect()->route('typesroom.index');
        }else{
            \Session::flash('add_typeroom_error_flash_message', 'Thêm loại phòng thất bại'); 
            return redirect()->route('typesroom.index');
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
        $type = TypeRoom::find($id);
        return view('admin.typesroom.edit', compact('type'));
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
        $type = TypeRoom::find($id);

        $type->name = $request->name;
        $type->slug = Str::slug($request->name, '-');
        $type->description = $request->description;

        $type->save();

        \Session::flash('update_typeroom_success_flash_message', 'Sửa loại phòng thành công.');
        return redirect()->route('typesroom.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        TypeRoom::where('id',$id)->delete();
        \Session::flash('delete_typeroom_success_flash_message', 'Xóa loại phòng thành công.');
        return redirect()->route('typesroom.index');
    }
}
