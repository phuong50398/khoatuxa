<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{$url}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hệ thống quản lý tin tức</title>
    <link rel="shortcut icon" type="image/x-icon" href="{$url}public/image/hou.png">

    <link href="{base_url('sourceadmin/vendor/bootstrap/dist/css/bootstrap.min.css')}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{base_url('sourceadmin/vendor/font-awesome/css/font-awesome.min.css')}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{base_url('sourceadmin/vendor/nprogress/nprogress.css')}" rel="stylesheet">

    <!-- start datatable -->
    <link href="{$url}assets/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{$url}assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{$url}assets/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{$url}assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{$url}assets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="{$url}assets/build/css/custom.min.css" rel="stylesheet">
    <!--  end datatable -->

    <link href="{$url}assets/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="{$url}assets/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <!-- iCheck -->
    <link href="{base_url('sourceadmin/vendor/iCheck/skins/flat/green.css')}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{base_url('sourceadmin/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{base_url('sourceadmin/vendor/jqvmap/dist/jqvmap.min.css')}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{base_url('sourceadmin/vendor/bootstrap-daterangepicker/daterangepicker.css')}" rel="stylesheet">
    <!-- PNotify -->
    <link href="{$url}sourceadmin/vendor/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="{$url}sourceadmin/vendor/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="{$url}sourceadmin/vendor/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->

    <link href="{base_url('sourceadmin/vendor/build/css/custom.min.css')}" rel="stylesheet">
    <script src="{base_url('sourceadmin/vendor/jquery/dist/jquery.min.js')}"></script>

    <!-- MY src -->
    <link href="{base_url('sourceadmin/toastr.css')}" rel="stylesheet">

    <script src="{base_url('sourceadmin/toastr.js')}" type="text/javascript" ></script>

    <script src="{base_url('sourceadmin/tuyensinh.js')}"></script>

    <link href="{$url}public/css/backend.css" rel="stylesheet">
    <script src="{$url}public/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="{$url}Nestable-master/jquery.nestable.css">
    <script src="{$url}Nestable-master/jquery.nestable.js"></script>
    <script src="{$url}public/js/tienganh.js"></script>
    <script src="{$url}public/js/backend.js"></script>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a target="_blank" href="{$url}" class="site_title"><i class="fa fa-home" aria-hidden="true"></i><span>Đào Tạo Từ Xa</span></a>
                </div>
                <div class="clearfix"></div>
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{$url}public/image/ad.ico" alt="" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome</span>
                        <h2>{$session['user']}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br />
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li>
                                <a><i class="fa fa-users"></i> Quản lý cán bộ <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{$url}hethong/canbo">Danh sách cán bộ</a></li>
                                    {if ($session['maquyen']==1)}
                                    <li><a href="{$url}hethong/themcanbo">Thêm cán bộ</a></li>
                                    {/if}
                                </ul>
                            </li>
                            <li>
                                <a><i class="fa fa-newspaper-o"></i> Quản lý tin tức <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    
                                    <li><a href="{$url}themtin">Thêm tin</a></li>
                                    <li><a href="{$url}danhsachtin">Danh sách tin tức</a></li>
                                    <li><a href="{$url}dscauhoi">Danh sách câu hỏi</a></li>
                                    <li><a href="{$url}ads">Quảng cáo</a></li>
                                        
                                </ul>
                            </li>
                            <li>
                                <a><i class="fa fa-th-large"></i> Quản lý danh mục <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{$url}theloai">Danh mục thể loại</a></li>
                                    <li><a href="{$url}loaitin">Danh mục loại tin</a></li>
                                    <li><a href="{$url}sukien">Danh mục sự kiện</a></li>
                                    <li><a href="{$url}hinhanh">Danh mục hình ảnh</a></li>
                                    <li><a href="{$url}slide">Danh mục slide</a></li>
                                    <li><a href="{$url}banner">Danh mục banner</a></li>
                                    <li><a href="{$url}bg">Danh mục background</a></li>
                                </ul>
                            </li>
                            <li>
                                <a><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Sắp xếp <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{$url}sxtheloai">Sắp xếp thể loại</a></li>
                                    <li><a href="{$url}sxmenucon">Sắp xếp menu con</a></li>
                                    <li><a href="{$url}sxloaitin">Sắp xếp loại tin</a></li>
                                    <li><a href="{$url}sxtintuc">Sắp xếp tin tức</a></li>
                                </ul>
                                

                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{$url}login">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{$url}public/image/ad.ico" alt="">{$session['user']}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{$url}hethong?doimk={$session['macb']}"> Đổi mật khẩu</a></li>
                                <li><a href="{$url}login"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
