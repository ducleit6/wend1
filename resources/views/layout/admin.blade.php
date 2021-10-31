<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-@yield('title')</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{url('public/admin')}}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{url('public/admin')}}/plugins/toastr/toastr.css">
    <link rel="stylesheet" href="{{url('public/admin')}}/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="{{url('public/admin')}}/dist/css/adminlte.min.css">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"
                style="display: none;">
        </div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('admin.index')}}" class="nav-link">Trang chủ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('category.index')}}" class="nav-link">Danh mục</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('destination.index')}}" class="nav-link">Điểm đến</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('hotel.index')}}" class="nav-link">Khách sạn</a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar" style="overflow-y: revert">

                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    <img src="" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                    <a href="#" class="d-block"></a>
                    <a href="">LogOut</a>
                    </div>
                </div> -->

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{url('public/admin/assets')}}/dist/img/user2-160x160.jpg"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin LTE</a>
                        <a href="">Đăng xuất</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('admin.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>

                                <p>
                                    Trang chủ

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Quản Trị Viên
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item pl-2">
                                    <a href="" class="nav-link">

                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon  fas fa-users"></i>
                                <p>
                                    Quản Lý Người Dùng
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item pl-2">
                                    <a href="" class="nav-link">

                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Quản Lý Danh mục
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item pl-2">
                                    <a href="{{route('category.index')}}" class="nav-link">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                <li class="nav-item pl-2">
                                    <a href="{{route('category.trashed')}}" class="nav-link">
                                        <i class="fas fa-trash nav-icon"></i>
                                        <p>Thùng rác</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-map-marked"></i>

                                <p>
                                    Quản Lý Điểm Đến
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item pl-2">
                                    <a href="{{route('destination.index')}}" class="nav-link">

                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                <li class="nav-item pl-2">
                                    <a href="{{route('destination.trashed')}}" class="nav-link">
                                        <i class="fas fa-trash nav-icon"></i>
                                        <p>Thùng rác</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">                                
                                <i class="nav-icon fas fa-hotel"></i>
                                <p>
                                    Quản Lý Khách sạn
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item pl-2">
                                    <a href="{{route('hotel.index')}}" class="nav-link">

                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                <li class="nav-item pl-2">
                                    <a href="{{route('hotel.trashed')}}" class="nav-link">
                                        <i class="fas fa-trash nav-icon"></i>
                                        <p>Thùng rác</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">

                                <i class="nav-icon fas fa-plane-departure"></i>
                                <p>
                                    Quản Lý Chuyến đi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item pl-2">
                                    <a href="" class="nav-link">

                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                <li class="nav-item pl-2">
                                    <a href="" class="nav-link">
                                        <i class="fas fa-trash nav-icon"></i>
                                        <p>Thùng rác</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">

                                <i class="nav-icon fas fa-concierge-bell"></i>
                                <p>
                                    Chi tiết dịch vụ
                                    
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-paste"></i>

                                <p>
                                    Quản lý Bài Đăng
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item pl-2">
                                    <a href="" class="nav-link">

                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-question-circle"></i>

                                <p>
                                    Câu hỏi thường gặp
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item pl-2">
                                    <a href="" class="nav-link">

                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list-ol"></i>

                                <p>
                                    Danh mục câu hỏi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item pl-2">
                                    <a href="" class="nav-link">

                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="pl-2 mt-2 mb-2">@yield('title')</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                @yield('main')
            </section>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 </strong> All rights reserved.
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script src="{{url('public/admin')}}//plugins/jquery/jquery.min.js"></script>
                                        <script
                                            src="{{url('public/admin')}}//plugins/bootstrap/js/bootstrap.bundle.min.js">
                                        </script>
                                        <script src="{{url('public/admin')}}//plugins/summernote/summernote-bs4.min.js">
                                        </script>
                                        <script src="{{url('public/admin')}}//plugins/toastr/toastr.min.js"></script>
                                        <script src="{{url('public/admin')}}//dist/js/adminlte.min.js"></script>
                                        <script src="{{url('public/admin')}}//dist/js/demo.js"></script>
                                        @yield('js')
                                        <script>
                                        toastr.options = {
                                            "closeButton": false,
                                            "debug": true,
                                            "newestOnTop": false,
                                            "progressBar": false,
                                            "positionClass": "toast-top-center",
                                            "preventDuplicates": false,
                                            "onclick": null,
                                            "showDuration": "300",
                                            "hideDuration": "1000",
                                            "timeOut": "5000",
                                            "extendedTimeOut": "1000",
                                            "showEasing": "swing",
                                            "hideEasing": "linear",
                                            "showMethod": "fadeIn",
                                            "hideMethod": "fadeOut"
                                        }
                                        </script>
                                        @if(Session::has('yes'))
                                        <script>
                                        toastr["success"]("{{Session::get('yes')}}")
                                        </script>
                                        @endif
                                        @if(Session::has('no'))
                                        <script>
                                        toastr["error"]("{{Session::get('no')}}")
                                        </script>
                                        @endif
</body>

</html>