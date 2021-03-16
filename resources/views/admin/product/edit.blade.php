@extends('admin.layout.admin_template')
@section('title', 'Chỉnh sửa sản phẩm')

@section("content")
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-database"></i>
                    <h3 class="box-title">&nbsp Chỉnh sửa sản phẩm</h3>
                </div>
                <div class="box-list">
                    <div class="col-md-12">
                        @if($data == null)
                        <div class="alert alert-danger">
                            sản phẩm không tồn tại
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
                            <form enctype="multipart/form-data" method="post" action="/admin/product/put/{{$data->id}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <img src="/plugin/images/{{$data->image}}" alt="" style="width: 100%;">
                                            </div>
                                            <div class="form-group">
                                                <label>Hình ảnh</label>
                                                <input require type="file" name="input_img" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Loại sản phẩm</label>
                                        <select name="id_type" class="form-control">
                                            <option value="">-- Chọn loại phòng --</option>
                                            @foreach($productTypes as $item)
                                            <option {{$data->id_type == $item->id?'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input value="{{$data->name}}" type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Đơn vị tính</label>
                                        <input value="{{$data->unit}}" type="text" name="unit" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Đơn giá bán</label>
                                        <input value="{{$data->unit_price}}" type="number" name="unit_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Giá khuyến mãi</label>
                                        <input value="{{$data->promotion_price}}" type="number" name="promotion_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="description" rows="3" class="form-control">{{$data->description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <a href="/admin/product" class="btn btn-default">Trở về danh sách sản phẩm</a>
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