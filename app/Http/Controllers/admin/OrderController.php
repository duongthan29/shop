<?php

namespace App\Http\Controllers\admin;

use App\Bill;
use App\BillDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class OrderController extends Controller
{
    public function get()
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        $datas = Bill::join('customer', 'bills.id_customer', '=', 'customer.id')
            ->select('bills.*', 'customer.name as customerName')->get();
        return view('admin/order/get', ['datas' => $datas]);
    }

    public function edit($id)
    {
        if (!Session::has('statusLogin'))
            return redirect('/login')->with('notification', 'Phiên đăng nhập của bạn đã hết');
        $data = Bill::join('customer', 'bills.id_customer', '=', 'customer.id')
            ->select('bills.*', 'customer.name as customerName')
            ->where("bills.id", "=", $id)
            ->first();

        $billDetail = BillDetail::join('products', 'bill_detail.id_product', '=', 'products.id')
            ->select('bill_detail.*', 'products.name as productName')
            ->where("bill_detail.id_bill", "=", $id)
            ->get();
        return view('admin/order/edit', ['data' => $data], ['billDetail' => $billDetail]);
    }
}
