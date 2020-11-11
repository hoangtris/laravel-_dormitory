<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use Illuminate\Support\Str;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $areas = Area::all();
        return view('admin.areas.index', compact('areas'));
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
        $area = new Area;
        $area->name = $request->name;
        $area->slug = Str::slug($request->name, '-');
        $area->description = $request->description;
        
        $areas = Area::where('slug',$area->slug)->first();

        if($areas != null){
            \Session::flash('error_flash_message', 'Thêm khu vực thất bại'); 
            return redirect()->route('areas.index');
        }else{
            $area->save();
            \Session::flash('success_flash_message', 'Thêm khu vực thành công'); 
            return redirect()->route('areas.index');
        }
        //
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
        $area = Area::find($id);
        return view('admin.areas.edit', compact('area'));
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
        $area = Area::find($id);

        $area->name = $request->name;
        $area->slug = Str::slug($request->name, '-');
        $area->description = $request->description;

        $area->save();

        \Session::flash('update_success_flash_message', 'Sửa khu vực thành công.');
        return redirect()->route('areas.index');
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
        Area::where('id',$id)->delete();
        \Session::flash('delete_success_flash_message', 'Xóa khu vực thành công.');
        return redirect()->route('areas.index');
    }
}
