<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use Illuminate\Support\Str;

class AreaController extends Controller
{
    public function index()
    {
        //
        $areas = Area::all();
        return view('admin.areas.index', compact('areas'));
    }

    public function store(Request $request)
    {
        //
        $slug = Str::slug($request->name, '-');
        $areas = Area::where('slug', $slug)->first();

        if ($areas != null) {
            return redirect()->back()
                   ->with(['flag'=>'error','message'=>'Thêm khu vực '.$request->name.' thất bại. \n Tên khu vực bị trùng']);
        } else {
            $area = new Area;
            $area->name = $request->name;
            $area->slug = $slug;
            $area->description = $request->description;
            $area->save();

            return redirect()->back()
                   ->with(['flag'=>'success','message'=>'Thêm khu vực '.$area->name.' thành công.']);
        }
    }

    public function edit($id)
    {
        //
        $area = Area::find($id);
        return view('admin.areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        //
        $area = Area::find($id);
        $area->name = $request->name;
        $area->slug = Str::slug($request->name, '-');
        $area->description = $request->description;
        $area->save();
        return redirect()->route('areas.index')->with(['flag'=>'success','message'=>'Sửa khu vực '.$area->name.' thành công.']);
    }

    public function destroy($id)
    {
        //
        $check = Area::find($id)->rooms;
        if (count($check) == 0) {
            Area::where('id',$id)->delete();
            return redirect()->route('areas.index')->with(['flag'=>'success','message'=>'Xóa khu vực thành công.']);
        } else {
            return redirect()->route('areas.index')->with(['flag'=>'error','message'=>'Xóa khu vực thất bại do khu vực có phòng.']);
        }
    }
}
