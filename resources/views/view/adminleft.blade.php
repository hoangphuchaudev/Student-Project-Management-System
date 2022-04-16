<?php 
?>
<!DOCTYPE html>
<html lang="en">

<head>

 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HỆ THỐNG QUẢN LÝ ĐỒ ÁN</title>

  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/FE/img/logo.png')}}">


  <!-- Custom fonts for this template-->
 <link rel="stylesheet" href="{{asset('public/FE/css/plugins/bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{asset('public/FE/css/plugins/animate.min.css')}}">
 <link rel="stylesheet" href="{{asset('public/FE/css/plugins/magnific-popup.css')}}">
 <link rel="stylesheet" href="{{asset('public/FE/css/plugins/slick.css')}}">
 <link rel="stylesheet" href="{{asset('public/FE/css/plugins/slick-theme.css')}}">
 <link rel="stylesheet" href="{{asset('public/FE/css/plugins/ion.rangeSlider.min.css')}}">

 <!-- Icon Fonts -->
 <link rel="stylesheet" href="{{asset('public/FE/fonts/flaticon/flaticon.css')}}">
 <link rel="stylesheet" href="{{asset('public/FE/fonts/font-awesome/css/all.min.css')}}">

 <!-- Style sheet -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('public/FE/css/style.css')}}">
 <link rel="stylesheet" href="{{asset('public/FE/css/custom_css.css')}}">



</head>

<body>
 <div class="andro_preloader">
    {{-- <div class="spinner">
      <div class="dot1" style="background-color: #0073A5"></div>
      <div class="dot2"style="background-color: #0073A5" ></div>
    </div> --}}
    <div class="loader">
  <span></span>
  <span></span>
  <span></span>
</div>
</div>
 <div class="andro_aside-overlay aside-trigger-right"></div>

@include('view/adminleft/menu')

