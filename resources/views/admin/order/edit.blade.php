@extends('admin.layout.admin_template')
@section('title', 'Thông tin đơn hàng')

@section("content")
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-database"></i>
                    <h3 class="box-title">&nbsp Thông tin đơn hàng</h3>
                </div>
                <div class="box-list">
                    <div class="col-md-12">
                        @if(session('notification'))
                        <div class="alert alert-success">
                            {{session('notification')}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <input value="{{$data->customerName}}" disabled type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Ngày đặt đơn</label>
                                    <input value="{{$data->date_order}}" disabled type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Hình thức thanh toán</label>
                                    <input value="{{$data->payment}}" disabled type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Tổng tiền</label>
                                    <input value="{{$data->total}}" disabled type="text" name="name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Chi tiết đơn hàng</h4>
                                <div>
                                    <table id="datatable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width:30px">#</th>
                                                <th>Tên mặt hàng</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($billDetail as $item)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$item->productName}}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{number_format($item->unit_price)}}</td>
                                                <td>{{number_format($item->quantity * $item-> unit_price)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="/admin/order" class="btn btn-default">Trở về danh sách đơn hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection