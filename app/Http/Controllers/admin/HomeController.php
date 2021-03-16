<?php

namespace App\Http\Controllers\admin;

use App\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        if (!Session::has('statusLogin'))
            return redirect('admin/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        $countOrder = DB::table('bills')->count();
        $countCustomer = DB::table('customer')->count();
        $countProduct = DB::table('products')->count();
        return view(
            'admin/home/index',
            ['countOrder' => $countOrder],
            ['countCustomer' => $countCustomer]
        )->with('countProduct', $countProduct);
    }
    public function Login()
    {
        return view('admin/login');
    }
    public function Logout()
    {
        Session::forget('statusLogin');
        return redirect('/admin/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
    }

    public function postLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email không được để trống',
                'password.required' => 'Mật khẩu không được để trống'
            ]
        );
        $email = $request->email;
        $password = $request->password;
        $user = User::where("email", $email)
            ->where("password", md5($password))
            ->first();
        if ($user == null)
            return redirect('/admin/login')->with('notification', 'Tài khoản hoặc mật khẩu không đúng');
        else {
            Session::put('statusLogin', true);
            return redirect('/admin');
        }
    }
}
