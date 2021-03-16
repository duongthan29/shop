@extends('admin.layout.admin_template')
@section('title', 'Chỉnh sửa loại sản phẩm')

@section("content")
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-star"></i>
                    <h3 class="box-title">&nbsp Chỉnh sửa loại sản phẩm</h3>
                </div>
                <div class="box-list">
                    <div class="col-md-6">
                        @if($data == null)
                        <div class="alert alert-danger">
                            Loại sản phẩm không tồn tại
                        </div>
                        @else
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}} <br>
                            @endforeach
                        </div>
                        @endif
                        @if(session('notification'))
                        <div class="alert alert-success">
                            {{session('notification')}}
                        </div>
                        @endif
                        <div>
                            <form enctype="multipart/form-data" method="post" action="/admin/producttype/put/{{$data->id}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label>Tên loại sản phẩm</label>
                                    <input value="{{$data->name}}" require type="text" name="name" class="form-control" placeholder="Tên loại sản phẩm">
                                </div>
                                <div style="margin-bottom:50px">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <a href="/admin/producttype" class="btn btn-default">Trở về danh sách loại sản phẩm</a>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection