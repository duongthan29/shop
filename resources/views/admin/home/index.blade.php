@extends('admin.layout.admin_template')
@section('title', 'Trang quản trị')
@section("content")
<section class="content-header">
    <h1>
        Tổng quan
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$countOrder}}</h3>
                    <p>Tổng số đơn hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/admin/order" class="small-box-footer">Chi tiết
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$countCustomer}}</h3>
                    <p>Tổng số khách hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="/admin/customer" class="small-box-footer">Chi tiết
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$countProduct}}</h3>
                    <p>Tổng số sản phẩm</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/admin/product" class="small-box-footer">Chi tiết
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection