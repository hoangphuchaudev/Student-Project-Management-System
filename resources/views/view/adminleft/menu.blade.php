<?php
use App\Http\Controllers\SinhVienController; 
$doan = SinhVienController::getMaDA_MaSV(Session::get('MaSV'));
$HotenSV = Session::get('HotenSV');

?>


<div class="andro_aside-overlay aside-trigger-right"></div>

<!-- Aside (Mobile Navigation) -->
<aside class="andro_aside andro_aside-left">
 <a class="navbar-brand" href="index.html"> <img src="{{asset('public/FE/img/logo.png')}}" alt="logo"> </a>

 <ul>
  <li class="menu-item">
    <a href="{{URL::to('sinhvien')}}">Trang chủ</a>
  </li>
  @if(sizeof($doan)>0)
  <li class="menu-item menu-item-has-children">
    <a href="#">Đồ án</a>
    <ul class="sub-menu">
      @for($i=0;$i<sizeof($doan);$i++)
      <li class="menu-item"> <a href="{{URL::to('doan/'.$doan[$i]->MaDA)}}">{{ $doan[$i]->TenDA }}</a> </li>
      @endfor
    </ul>
  </li>
  @else
  @endif
  <li class="menu-item">
    <a href="{{URL::to('diem')}}">Bảng điểm đồ án</a>
  </li>
  <li class="menu-item menu-item-has-children">
    <a href="#">Tài khoản</a>
    <ul class="sub-menu">
      <li class="menu-item"><a class="dropdown-item" href="" data-toggle="modal" data-target="#profileModal">Thông tin cá nhân</a> </li>
      <li class="menu-item"><a href="login.html">Thay đổi mật khẩu</a> </li>
      <li class="menu-item"><a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">Đăng xuất</a> </li>
    </ul>
  </li>
  <li class="menu-item"> <a href="http://vlute.edu.vn/vi/">Thông tin</a> </li>
</ul>

</aside>
<div class="andro_aside-overlay aside-trigger-left"></div>

<!-- Header Start -->
<header class="andro_header header-3 can-sticky">

  <!-- Topheader Start -->
  <div class="andro_header-top">
    <div class="container">
      <div class="andro_header-top-inner">
        <ul class="andro_header-top-sm andro_sm">
          <li> <a href="https://www.facebook.com/this.value.replace"> <i class="fab fa-facebook-f"></i> </a> </li>
          <li> <a href="https://www.youtube.com/channel/UCGXKGukt6_nnzqudjTdmBSA"> <i class="fab fa-youtube"></i> </a> </li>
        </ul>
        <ul class="andro_header-top-links">
          <li class="menu-item menu-item-has-children">
            <a href="#"><i class="fas fa-user"></i>       <span class="andro_current-currency-text">{{ $HotenSV }}</span></a>
            <ul class="sub-menu sub-menu-left">
              <li> <a href="{{URL::to('logout')}}">Đăng xuất</a> </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Topheader End -->

  <!-- Middle Header Start -->
  <div class="andro_header-middle">
    <div class="container">
      <nav class="navbar">
        <!-- Logo -->
        <a class="navbar-brand" href="index.html"><img src="{{asset('public/FE/img/logo.png')}}" alt="logo"> </a>
        <h4 style="color: white">HỆ THỐNG QUẢN LÝ ĐỀ TÀI SINH VIÊN KHOA CNTT</h4>

        <div class="andro_header-controls">


          <!-- Toggler -->
          <div class="aside-toggler aside-trigger-left">
            <span></span>
            <span></span>
            <span></span>
          </div>

        </div>
      </nav>
    </div>
  </div>
  <!-- Middle Header End -->

  <!-- Menu web-->
  <div class="andro_header-bottom">
    <div class="container">

      <div class="andro_header-bottom-inner">


        <!-- Menu -->
        <ul class="navbar-nav">
          <li class="menu-item">
            <a href="{{URL::to('sinhvien')}}">Trang chủ</a>
          </li>
          @if(sizeof($doan)>0)
          <li class="menu-item menu-item-has-children">
            <a href="#">Đồ án</a>
            <ul class="sub-menu">
              @for($i=0;$i<sizeof($doan);$i++)
              <li class="menu-item"> <a href="{{URL::to('doan/'.$doan[$i]->MaDA)}}">{{ $doan[$i]->TenDA }}</a> </li>
              @endfor
            </ul>
          </li>
          @else
          @endif
          <li class="menu-item menu-item-has-children">
            <a href="{{URL::to('diem')}}">Bảng điểm đồ án</a>
          </li>
          <li class="menu-item menu-item-has-children">
            <a href="#">Tài khoản</a>
            <ul class="sub-menu">
              <li class="menu-item"><a class="dropdown-item" href="" data-toggle="modal" data-target="#profileModal">Thông tin cá nhân</a> </li>
              <li class="menu-item"><a href="login.html">Thay đổi mật khẩu</a> </li>
              <li class="menu-item"><a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">Đăng xuất</a> </li>
            </ul>
          </li>
          <li class="menu-item"> <a href="http://vlute.edu.vn/vi/">Thông tin</a> </li>
        </ul>

        <!-- Side navigation toggle -->
        {{--   <div class="aside-toggler aside-trigger-right desktop-toggler">
            <span></span>
            <span></span>
            <span></span>
          </div> --}}

        </div>

      </div>
    </div>
    <!-- Bottom Header End -->

  </header>