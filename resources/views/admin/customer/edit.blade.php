@extends('admin.layout.admin_template')
@section('title', 'Thông tin khách hàng')

@section("content")
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title">&nbsp Thông tin khách hàng</h3>
                </div>
                <div class="box-list">
                    <div class="col-md-12">
                        @if(session('notification'))
                        <div class="alert alert-success">
                            {{session('notification')}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <input value="{{$data->name}}" type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <input value="{{$data->gender}}" type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="{{$data->email}}" type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input value="{{$data->phone_number}}" type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input value="{{$data->address}}" type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea name="name" rows="3" class="form-control">{{$data->note}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="/admin/customer" class="btn btn-default">Trở về danh sách khách hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection