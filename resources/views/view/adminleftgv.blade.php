<?php 
use App\Http\Controllers\GVController;
use App\Http\Controllers\DetaiController;
$MaGV = GVController::getMaGV();
$DA = GVController::getMaDA_MaGV($MaGV);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script type="text/javascript" src="{{ URL::asset('public/BE/ckeditor/ckeditor.js') }}"></script>
  <title>HỆ THỐNG QUẢN LÝ ĐỒ ÁN</title>
   <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/FE/img/logo.png')}}" alt="Logo">

  <!-- Custom fonts for this template-->
  <link href="{{ asset('public/BE/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <link rel="stylesheet" type="text/css" href="{{ asset('public/BE/css/csslichbaocao.css') }}">

  <!-- Custom styles for this template-->
  <link href="{{ asset('public/BE/css/AUTH.css') }}" rel="stylesheet">
  <link href="{{ asset('public/BE/css/custom_css.css') }}" rel="stylesheet">

  <!--  datatable -->
  <link rel="stylesheet" href="{{asset('public/BE/vendor/datatables/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

  <!--   Full calendar -->
    <link rel="stylesheet" href="{{asset('public/BE/css/fullcalendar.css')}}">



  

</head>
{{-- <div class="andro_preloader">
    <div class="loader">
      <span></span>
      <span></span>
      <span></span>
    </div>
</div> --}}
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ URL::to('giangvien') }}">
        <div class="sidebar-brand-icon">
         <img src="{{ asset('public/FE/img/logo.png') }}" width="50" height="50">
       </div>
       @if(session::get('LoaiUS') == 1)
        <div class="sidebar-brand-text mx-3">Đồ án <sup>GV</sup></div>
        @else
        <div class="sidebar-brand-text mx-3">Admin</div>
        @endif
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('giangvien') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Trang chủ</span></a>
      </li>
       @if(session::get('LoaiUS') == 3)
       <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        đồ án
      </div>

      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('quanlydoan')}}">
        <i class="fas fa-bookmark"></i>
          <span>Quản lý đồ án</span></a>
      </li>
      @endif
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        THÔNG TIN
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        @if(session::get('LoaiUS') == 1)
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-briefcase"></i>
          <span>Đồ án</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Đồ án Components:</h6>
            @for($i=0;$i<count($DA);$i++)
            <a class='collapse-item' href="{{URL::to('qldoan/'.$DA[$i]->MaDA)}}">{{ DetaiController::getTenDA_MaDA($DA[$i]->MaDA)  }}</a>
            @endfor
            
          </div>
        </div>
        @else
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-address-card"></i>
          <span>Quản lý thông tin</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Thông tin Components:</h6>
           
            <a class='collapse-item' href="javascript:void(0)">Quản lý sinh viên</a>
            <a class='collapse-item' href="javascript:void(0)">Quản lý giảng viên</a>
    
            
          </div>
        </div>
        @endif
      </li>
       @if(session::get('LoaiUS') == 3)
       <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Học kỳ
      </div>

      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)">
         <i class="fas fa-calendar-week"></i>
          <span>Quản lý học kỳ</span></a>
      </li>
      @endif
     

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
      custom theme 
      </div>
  

     


     <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Cài đặt</span>
        </a>  
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cài đặt giao diện:</h6>
           <!--  <button id="dark" onclick="myfun()"> -->
              <a class="collapse-item" id="dark" onclick="myfun1()">
            Dark
          </a>
        <!-- </button> -->
            <a class="collapse-item" id="light" onclick="myfun2()">Light</a>
          <!--   <a class="collapse-item active" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a> -->
          </div>
        </div>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
         <i class="fas fa-info-circle"></i>
          <span>Thông tin</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

   

     <script type="text/javascript">
    function myfun1() {
      // alert('Hello');
  /* Act on the event */
  document.getElementById('accordionSidebar').className = "navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion";
  
  
  }
   function myfun2() {
      // alert('Hello');
  /* Act on the event */
  document.getElementById('accordionSidebar').className = "navbar-nav bg-gradient-success sidebar sidebar-dark accordion";
  
  
  }
    </script>