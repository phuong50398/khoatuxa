<!DOCTYPE html>
<html lang="en">
<head>
    <title>{if (isset($tinleft.chitiet))}{$tinleft.chitiet.sTieude}{elseif (isset($tinleft.dstin[0].sTenloaitin))}{$tinleft.dstin[0].sTenloaitin}{elseif isset($tieude)}{$tieude}{elseif isset($tinleft.timkiem[0].sTieude)}{$tinleft.timkiem[0].sTieude}{else} Khoa Đào Tạo Từ Xa | Viện Đại học Mở Hà Nội {/if}</title>
    <base href="{$url}">
    <link rel="shortcut icon" type="image/x-icon" href="{$url}public/image/favicon.ico">
    <meta charset="utf-8">
    <meta name="description" content='{if isset($tinleft.chitiet.sMota) && !empty($tinleft.chitiet.sMota)}{$tinleft.chitiet.sMota}{elseif isset($tinleft.chitiet.sTomtatnoidung) && !empty($tinleft.chitiet.sTomtatnoidung)}(Khoa Đào Tạo Từ Xa - Viện Đại Học Mở Hà Nội) {$tinleft.chitiet.sTomtatnoidung}{elseif isset($tinleft.chitiet.sTieude)}(Khoa Đào Tạo Từ Xa - Viện Đại Học Mở Hà Nội) {$tinleft.chitiet.sTieude}{elseif (isset($tinleft.dstin[0].sTenloaitin))}(Khoa Đào Tạo Từ Xa - Viện Đại Học Mở Hà Nội) {$tinleft.dstin[0].sTenloaitin}{elseif isset($tieude)}(Khoa Đào Tạo Từ Xa - Viện Đại Học Mở Hà Nội) {$tieude}{elseif isset($tinleft.timkiem[0].sTieude)}(Khoa Đào Tạo Từ Xa - Viện Đại Học Mở Hà Nội) {$tinleft.timkiem[0].sTieude}{else}Khoa Đào Tạo Từ Xa | Viện Đại học Mở Hà Nội {/if}'/>
    <meta name="keywords" content="{if isset($tinleft.chitiet.sTags) && !empty($tinleft.chitiet.sTags.0)}{foreach $tinleft.chitiet.sTags as $key => $value}{if $key!=0},{/if}{$value}{/foreach}{else}viện mở, đại học, đào tạo từ xa, tin tức, hội thảo, hội nghị, sinh viên, tốt nghiệp{/if}" />
    <meta name="robots" content="index,follow,all" />
    <meta name='revisit-after' content='1 days' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="{$url}public/vendor/bootstrap.js"></script>
    <script type="text/javascript" src="{$url}public/js/index.js"></script>
    <script type="text/javascript" src="{$url}public/vendor/jquery.js"></script>
    <script type="text/javascript" src="{$url}public/js/jquery.easing.1.3.js"></script>

    <link rel="stylesheet" href="{$url}public/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{$url}public/css/font-awesome.css">
    <link rel="stylesheet" href="{$url}public/vendor/bootstrap.css">
    <link rel="stylesheet" href="{$url}public/css/index.css">
    <link rel="stylesheet" href="{$url}public/css/responsive.css">
    <!-- MY src -->
    <link href="{base_url('sourceadmin/toastr.css')}" rel="stylesheet">

    <script src="{base_url('sourceadmin/toastr.js')}" type="text/javascript" ></script>
    <script src="{base_url('sourceadmin/tuyensinh.js')}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:100,200,300,400,500,700,800,900|Raleway" rel="stylesheet">
    <script type="text/javascript" src="{$url}public/js/frontend.js"></script>

    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=596233164d286f00123b9298&product=inline-share-buttons"></script>
</head>
<body style="background: url('{$url}files/{$bg.sTenanh}') no-repeat center center fixed; background-size: cover;">
<div class="container khoi">
    <header id="header" class="header">
        <div class="col-md-12 col-xs-12 banner">
            <img src="{$url}files/{$banner.sTenanh}" width="100%" alt="">
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{$url}">
                        <hr class="do">
                        <i  class="fa fa-home fa-2x" aria-hidden="true"></i></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                {foreach $theloai as $key => $value}
                {$delay=$delay+0.4}
                {if $value.iTrangthai==1}
                    <ul class="nav navbar-nav">
                        <li class="xanhduong1">
                            <div class="xanhduong" style="background: {$value.sMau}; animation-delay: {$delay}s"></div>
                            {if $value.PK_iMatheloai==6}
                            <a href="{$url}hinh-anh.html"><b>{$value.sTentheloai}</b></a>
                            {else}
                            {if $value.PK_iMatheloai==8}
                            <a href="{$url}cau-hoi.html"><b>{$value.sTentheloai}</b></a>
                            {else}
                            <a href="{$url}{clean($value.sTentheloai)}_{$value.PK_iMatheloai}"><b>{$value.sTentheloai}</b></a>
                            {/if}
                            {/if}
                        </li>
                    </ul>
                {else} 
                    
                    <ul class="nav navbar-nav navbar-left xanhduong1 menuh">
                        <li  class="dropdown">
                            <div class="xanhduong" style="background: {$value.sMau}; animation-delay: {$delay}s "></div>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>{$value.sTentheloai}</b> <b><i class="fa fa-angle-down" aria-hidden="true"></i></b></a>

                            <ul class="dropdown-menu" style="transition: 1.5s">
                            {foreach $loaitin as $key1 =>$value1}
                            {if $value.PK_iMatheloai==$value1.FK_iMatheloai && $value1.sTrangthai==nav}
                                <li><a href="{$url}{clean($value1.sTenloaitin)}_{$value1.PK_iMaloaitin}.html"><b>{$value1.sTenloaitin}</b></a></li>
                            {/if}
                            {/foreach}
                            </ul>
                        </li>
                    </ul>
                    {/if}
                    {/foreach}
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </header><!-- /header -->
    <div class="col-md-12 col-xs-12 trang slider">
            <section>
                <div class="container srow">
                    <div class="col-md-8 col-xs-12 wrap1">