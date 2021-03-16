<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset("/plugin/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/plugin/bower_components/font-awesome/css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/plugin/bower_components/Ionicons/css/ionicons.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/plugin/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/plugin/bower_components/admin-lte/dist/css/skins/skin-blue-light.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/plugin/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
    <link rel="stylesheet" href="{{ asset("/plugin/css/layout_admin.css")}}">
    <script src="{{ asset("/plugin/ckeditor/ckeditor.js")}}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="/admin" class="logo">
                <span class="logo-mini"><b>A</b></span>
                <span class="logo-lg"><b>Trang Quản Trị</b></span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/admin/logout"><i class="fa fa-power-off"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">TỔNG QUAN</li>
                    <li>
                        <a href="/admin"><i class="fa fa-dashboard"></i> <span>Tổng quan</span></a>
                    </li>
                    <li>
                        <a href="/admin/order"><i class="fa fa-database"></i> <span>Đơn hàng</span></a>
                    </li>
                    <li>
                        <a href="/admin/customer">
                            <i class="fa fa-user"></i> <span>Khách hàng</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/slideshow">
                            <i class="fa fa-video-camera"></i> <span>Slide ảnh</span>
                        </a>
                    </li>
                    <li class="treeview active">
                        <a>
                            <i class="fa fa-star"></i> <span>Sản phẩm</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/admin/producttype"><i class="fa fa-circle-o"></i>Loại sản phẩm</a></li>
                            <li><a href="/admin/product"><i class="fa fa-circle-o"></i>Danh sách sản phẩm</a></li>
                        </ul>
                    </li>
                    <li><a href="/admin/user"><i class="fa fa-group"></i> <span>Quản lý tài khoản</span></a></li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            @yield('content')
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                Shop túi xách
            </div>
            <strong>v.1.0.0</strong>
        </footer>
    </div>
    <script src="{{ asset("/plugin/bower_components/jquery/dist/jquery.min.js")}}"></script>
    <script src="{{ asset("/plugin/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
    <script src="{{ asset("/plugin/bower_components/admin-lte/dist/js/adminlte.min.js")}}"></script>
    <script src="{{ asset("/plugin/bower_components/admin-lte/plugins/datatables/jquery.dataTables.js")}}"></script>
    <script src="{{ asset("/plugin/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
</body>
<script>
    $(function() {
        $('#datatable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "order": []
        });
    });
</script>

</html>