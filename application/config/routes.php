<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//Hệ thống
$route['tracuudiem']		= 'Layout/Ctracuu';
$route['login']             = 'Clogin';
$route['hethong']           = 'Chethong';
$route['theloai']           = 'Danhmuc/Ctheloai';
$route['loaitin']           = 'Danhmuc/Cloaitin';
$route['hethong/canbo']     = 'Ccanbo';
$route['hethong/themcanbo'] = 'Ccanbo/themcb';
$route['danhsachtin']       = 'Danhmuc/Cdanhsachtin';
$route['themtin']           = 'Danhmuc/Cthemtin';
$route['banner']            = 'Danhmuc/Cbanner';
$route['bg']                = 'Danhmuc/Cbg';
$route['hinhanh']           = 'Danhmuc/Chinhanh';
$route['slide']             = 'Danhmuc/Cslide';
$route['sukien']            = 'Danhmuc/Cevent';
$route['sxtheloai']			= 'Danhmuc/Csxtheloai';
$route['sxmenucon']			= 'Danhmuc/Csxmenucon';
$route['sxloaitin']			= 'Danhmuc/Csxloaitin';
$route['sxtintuc']			= 'Danhmuc/Csxtincon';
$route['slide']			    = 'Danhmuc/Cslide';
$route['dscauhoi']			= 'Danhmuc/Cdscauhoi';
$route['ads']				= 'Danhmuc/Cquangcao';

//Layout
$route['dsloaitin']         = 'Layout/Cdstin';

$route['(:any).tag']			= 'Layout/CTags';
$route['(:any)_(:num).html']         = 'Layout/Cdstin';
$route['(:any)_(:num)']         = 'Layout/Cdstin/theloai';
$route['(:any)_[A-Z0-9a-z]+.html']         = 'Layout/Ctinchitiet';


$route['hinh-anh.html']           = 'Layout/Cdstin/Layanh';
$route['cau-hoi.html']			= 'Layout/Ccauhoi';
$route['feedrss']	='Cfeed';
//error
$route['loi']				= 'Ctrangchu/error';
$route['default_controller'] = 'Ctrangchu';
$route['/'] = 'Ctrangchu';
$route['404_override']       = 'Ctrangchu/error';
$route['translate_uri_dashes'] = FALSE;
//$route['403_Forbidden'] = 'C403';
