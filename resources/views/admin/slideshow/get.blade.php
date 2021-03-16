@extends('admin.layout.admin_template')
@section('title', 'Quản lý slide ảnh')

@section("content")
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-video-camera"></i>
                    <h3 class="box-title">&nbsp Quản lý slide ảnh</h3>
                    <a href='slideshow/add' class="btn btn-primary btn-sm" style="float:right">Thêm slide ảnh</a>
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
                                        <th>Hình ảnh</th>
                                        <th style="width:150px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datas as $item)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">
                                            <img src="/plugin/images/{{$item->image}}" alt="">
                                        </td>
                                        <td class="text-center">
                                            <a href="/admin/slideshow/edit/{{$item->id}}" class="btn btn-primary btn-sm">Chỉnh
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
                    <h4 class="modal-title">Xác nhận xóa slide ảnh</h4>
                </div>
                <div class="modal-body">
                    <p>Xác nhận xóa slide ảnh này?</p>
                </div>
                <div class="modal-footer">
                    <a id="linkDelete" type="button" class="btn btn-danger">Xóa</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function confirmDelete(id) {
            $("#myModal").modal()
            $("#linkDelete").attr("href", '/admin/slideshow/delete/' + id)
        }
    </script>
</section>
@endsection