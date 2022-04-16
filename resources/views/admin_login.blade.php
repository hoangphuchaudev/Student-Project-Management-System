<!DOCTYPE html>
<html lang="en">
<?php 
error_reporting()
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HỆ THỐNG QUẢN LÝ ĐỒ ÁN</title>

  <!-- Vendor Stylesheets -->
  <link rel="stylesheet" href="{{('public/FE/css/plugins/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{('public/FE/css/plugins/animate.min.css')}}">
  <link rel="stylesheet" href="{{('public/FE/css/plugins/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{('public/FE/css/plugins/slick.css')}}">
  <link rel="stylesheet" href="{{('public/FE/css/plugins/slick-theme.css')}}">
  <link rel="stylesheet" href="{{('public/FE/css/plugins/ion.rangeSlider.min.css')}}">

  <!-- Icon Fonts -->
  <link rel="stylesheet" href="{{('public/FE/fonts/flaticon/flaticon.css')}}">
  <link rel="stylesheet" href="{{('public/FE/fonts/font-awesome/css/all.min.css')}}">

  <!-- Coffeez Style sheet -->
  <link rel="stylesheet" href="{{('public/FE/css/style.css')}}">
  <link rel="stylesheet" href="{{('public/FE/css/custom_css.css')}}">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="public/FE/img/logo.png">

</head>

<body>
 <section>
   <div class="section">
    <div class="imgs-wrapper">
      <img src="assets/img/products/1.png" alt="veg" class="d-none d-lg-block">
      <img src="assets/img/products/14.png" alt="veg" class="d-none d-lg-block">
    </div>
    <div class="container">
      <div class="andro_auth-wrapper">

        <div class="andro_auth-description bg-cover bg-center dark-overlay dark-overlay-2" style="background-image: url('public/FE/img/banner.jpg')">
          <div class="andro_auth-description-inner">
            <h2>HỆ THỐNG<br> QUẢN LÝ ĐỀ TÀI</h2>
            <i class="fas fa-book-open"></i>
            <h3>KHOA CÔNG NGHỆ THÔNG TIN</h3>

          </div>
        </div>
        <div class="andro_auth-form">

          <h2>Đăng nhập</h2>

          <form method="post" action="{{URL::to('/login')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <input type="email" name="user" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Tên đăng nhập..." required>
            </div>
            <div class="form-group">
              <input name="pass" type="password" class="form-control form-control-user" id="password-field" placeholder="Mật khẩu" minlength="3" required>
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" id="customCheck">
                <label class="custom-control-label" for="customCheck">Ghi nhớ đăng nhập</label>
              </div>
            </div>
            
            <?php 
            $Mess = Session::get('Mess');
            if($Mess)
            {
              echo $Mess;
            }
            
            Session::put('Mess',null);


          ?>
            <div class="form-group">
            <button type="submit" class="andro_btn-custom primary">Đăng nhập</button>
            </div>

           {{--  <a href="#" class="pass_fog">Quên mật khẩu ?</a> --}}
            <div class="andro_auth-seperator">
              <span>Liên quan</span>
            </div>

            <div class="andro_social-login">
              <button type="button" class="andro_social-login-btn facebook"><a href="http://elearning.vlute.edu.vn/"><img src="public/FE/img/logo.png" alt="placeholder+image" width="20" height="20">  Hệ thống E-learning</a></button>
              <button type="button" class="andro_social-login-btn google"><a href="https://ems.vlute.edu.vn/"><img src="public/FE/img/logo.png" alt="placeholder+image" width="20" height="20">  Hệ thống EMS</a></button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

</section>
<style type="text/css">
.field-icon {
  float: right;
  margin-right: 20px;
  /*  margin-left: -1100px;*/
  margin-top: -35px;
  position: relative;
  z-index: 2;
}



</style>
<script src="{{URL::asset('public/FE/js/plugins/jquery-3.4.1.min.js')}}"></script>


<script>
  $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });

</script>


<!-- Bootstrap core JavaScript-->

</body>

</html>