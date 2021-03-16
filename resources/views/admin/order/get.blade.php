@extends('admin.layout.admin_template')
@section('title', 'Danh sách đơn hàng')

@section("content")
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-database"></i>
                    <h3 class="box-title">&nbsp Danh sách đơn hàng</h3>
                </div>
                <div class="box-list">
                    <div class="col-md-12">
                        @if(session('notification'))
                        <div class="alert alert-success">
                            {{session('notification')}}
                        </div>
                        @endif
                        <div>
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:30px">#</th>
                                        <th>Tên khách hàng</th>
                                        <th>Ngày đặt đơn</th>
                                        <th>Hình thức thanh toán</th>
                                        <th>Tổng tiền</th>
                                        <th style="width:150px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datas as $item)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{$item->customerName}}</td>
                                        <td>{{$item->date_order}}</td>
                                        <td>{{$item->payment}}</td>
                                        <td>{{number_format($item-> total)}}</td>
                                        <td class="text-center">
                                            <a href="/admin/order/edit/{{$item->id}}" class="btn btn-primary btn-sm">
                                                Xem thông tin
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection