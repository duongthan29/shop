@extends('admin.layout.admin_template')
@section('title', 'Quản lý tài khoản')

@section("content")
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-group"></i>
                    <h3 class="box-title">&nbsp Người dùng</h3>
                    <a href='user/add' class="btn btn-primary btn-sm" style="float:right">Thêm tài khoản</a>
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
                                        <th>Email</th>
                                        <th>Họ tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th style="width:150px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datas as $item)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->full_name}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item-> address}}</td>
                                        <td class="text-center">
                                            <a href="/admin/user/edit/{{$item->id}}" class="btn btn-primary btn-sm">Chỉnh
                                                sửa</a>
                                            <button onclick="confirmDelete('{{$item->id}}')" class="btn btn-danger btn-sm">Xóa</button>
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
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xác nhận xóa tài khoản</h4>
                </div>
                <div class="modal-body">
                    <p>Xác nhận xóa tài khoản này?</p>
                </div>
                <div class="modal-footer">
                    <a id="linkDelete" type="button" class="btn btn-danger">Xóa</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function confirmDelete(userName) {
            $("#myModal").modal()
            $("#linkDelete").attr("href", '/admin/user/delete/' + userName)
        }
    </script>
</section>
@endsection