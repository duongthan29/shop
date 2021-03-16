<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductType;
use Session;

class ProductTypeController extends Controller
{
    public function get()
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        $datas = ProductType::all();
        return view('admin/producttype/get', ['datas' => $datas]);
    }

    public function add()
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        return view('admin/producttype/add');
    }

    public function edit($id)
    {
        $data = ProductType::find($id);
        return view('admin/producttype/edit', ['data' => $data]);
    }

    public function post(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required:Type_Products'
            ],
            [
                'name.required' => 'Tên loại sản phẩm không được để trống'
            ]
        );
        $data = new ProductType();
        $data->name = $request->name;
        $data->description = "";
        $data->image = "";
        $data->save();
        return redirect('admin/producttype/add')->with('notification', 'Thêm thành công');
    }
    public function put($id, Request $request)
    {
        $data = ProductType::find($id);
        $data->name = $request->name;
        $data->save();
        return redirect('admin/producttype/edit/' . $id)->with('notification', 'Cập nhật thành công');
    }
    public function delete($id)
    {
        $data = ProductType::find($id);
        $data->delete();
        return redirect('admin/producttype')->with('notification', 'Xóa thành công');
    }
}
