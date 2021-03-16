<?php

namespace App\Http\Controllers\admin;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class CustomerController extends Controller
{
    public function get()
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        $datas = Customer::all();
        return view('admin/customer/get', ['datas' => $datas]);
    }

    public function edit($id)
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        $data = Customer::find($id);
        return view('admin/customer/edit', ['data' => $data]);
    }
}
