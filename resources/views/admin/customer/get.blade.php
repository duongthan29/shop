@extends('admin.layout.admin_template')
@section('title', 'Danh sách khách hàng')

@section("content")
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title">&nbsp Danh sách khách hàng</h3>
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
                                        <th>Giới tính</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th style="width:150px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datas as $item)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->gender}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{$item->phone_number}}</td>
                                        <td class="text-center">
                                            <a href="/admin/customer/edit/{{$item->id}}" class="btn btn-primary btn-sm">
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