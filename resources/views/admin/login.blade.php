<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset("/plugin/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/plugin/bower_components/font-awesome/css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/plugin/bower_components/Ionicons/css/ionicons.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/plugin/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/plugin/bower_components/admin-lte/plugins/iCheck/square/blue.css")}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a>Đăng nhập hệ thống</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Đăng nhập để bắt đầu phiên làm việc</p>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}} <br>
                @endforeach
            </div>
            @endif
            @if(session('notification'))
            <div class="alert alert-danger">
                {{session('notification')}}
            </div>
            @endif
            <form action="/admin/login" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group has-feedback">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>