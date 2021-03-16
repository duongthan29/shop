<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;

class UserController extends Controller
{
    public function get()
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        $datas = User::all();
        return view('admin/user/get', ['datas' => $datas]);
    }

    public function add()
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        return view('admin/user/add');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin/user/edit', ['data' => $data]);
    }

    public function post(Request $request)
    {
        $this->validate(
            $request,
            [
                'full_name' => 'required:Users',
                'email' => 'required:Users',
                'password' => 'required:Users'
            ],
            [
                'full_name.required' => 'Tên không được để trống',
                'email.required' => 'Email không được để trống',
                'password.required' => 'Mật khẩu không được để trống',
            ]
        );
        $data = new User();
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->password = md5($request->password);
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->save();
        return redirect('admin/user/add')->with('notification', 'Thêm thành công');
    }
    public function put($id, Request $request)
    {
        $this->validate(
            $request,
            [
                'full_name' => 'required:Users',
                'email' => 'required:Users'
            ],
            [
                'full_name.required' => 'Tên không được để trống',
                'email.required' => 'Email không được để trống'
            ]
        );
        $data = User::find($id);
        if ($request->password != null && $request->password != '') {
            $data->password = md5($request->password);
        }
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->save();
        return redirect('admin/user/edit/' . $id)->with('notification', 'Cập nhật thành công');
    }
    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('admin/user')->with('notification', 'Xóa thành công');
    }
}
