<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductType;
use Session;

class ProductController extends Controller
{
    public function get()
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        $datas = Product::join('type_products', 'products.id_type', '=', 'type_products.id')
            ->select('products.*', 'type_products.name as productType')->get();
        return view('admin/product/get', ['datas' => $datas]);
    }
    public function add()
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        $productTypes = ProductType::all();
        return view('admin/product/add', ['productTypes' => $productTypes]);
    }

    public function edit($id)
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        $data = Product::find($id);
        $productTypes = ProductType::all();
        return view('admin/product/edit', ['data' => $data], ['productTypes' => $productTypes]);
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
        $data = new Product();
        $data->image = $name;
        $data->name = $request->name;
        $data->id_type = $request->id_type;
        $data->description = $request->description;
        $data->unit_price = $request->unit_price;
        $data->promotion_price = $request->promotion_price;
        $data->unit = $request->unit;
        $data->save();
        return redirect('admin/product/add')->with('notification', 'Thêm thành công');
    }
    public function put($id, Request $request)
    {
        $data = Product::find($id);
        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name = time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('/plugin/images');
            $image->move($destinationPath, $name);
            $data->image = $name;
        }
        $data->save();
        return redirect('admin/product/edit/' . $id)->with('notification', 'Cập nhật thành công');
    }
    public function delete($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect('admin/product')->with('notification', 'Xóa thành công');
    }
}
