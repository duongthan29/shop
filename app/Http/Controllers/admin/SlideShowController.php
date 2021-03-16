<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;
use Session;

class SlideShowController extends Controller
{
    public function get()
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        $datas = Slide::all();
        return view('admin/slideshow/get', ['datas' => $datas]);
    }
    public function add()
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        return view('admin/slideshow/add');
    }

    public function edit($id)
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        $data = Slide::find($id);
        return view('admin/slideshow/edit', ['data' => $data]);
    }

    public function post(Request $request)
    {
        $this->validate(
            $request,
            [
                'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'input_img.required' => 'Hình ảnh không được để trống',
            ]
        );
        $name = '';
        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name = time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('/plugin/images');
            $image->move($destinationPath, $name);
        }
        $data = new Slide();
        $data->image = $name;
        $data->link = '';
        $data->save();
        return redirect('admin/slideshow/add')->with('notification', 'Thêm thành công');
    }
    public function put($id, Request $request)
    {
        $data = Slide::find($id);
        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name = time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('/plugin/images');
            $image->move($destinationPath, $name);
            $data->image = $name;
        }
        $data->save();
        return redirect('admin/slideshow/edit/' . $id)->with('notification', 'Cập nhật thành công');
    }
    public function delete($id)
    {
        $data = Slide::find($id);
        $data->delete();
        return redirect('admin/slideshow')->with('notification', 'Xóa thành công');
    }
}
