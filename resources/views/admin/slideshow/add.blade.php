@extends('admin.layout.admin_template')
@section('title', 'Thêm slide ảnh')

@section("content")
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-video-camera"></i>
                    <h3 class="box-title">&nbsp Thêm slide ảnh</h3>
                </div>
                <div class="box-list">
                    <div class="col-md-6">
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
                            <form method="post" action="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input require type="file" name="input_img" class="form-control" accept="image/*">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                    <a href="/admin/slideshow" class="btn btn-default">Trở lại</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection