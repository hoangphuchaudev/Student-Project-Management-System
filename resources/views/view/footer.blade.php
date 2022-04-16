<?php
$MaSV=Session::get('MaSV');
 $HotenSV=Session::get('HotenSV');
$Tenlop=Session::get('Tenlop');
$Khoahoc=Session::get('Khoahoc');
$SdtSV=Session::get('SdtSV');
$EmailSV=Session::get('EmailSV');


?>
 

    <footer class="andro_footer andro_footer-dark">
    <!-- Top Footer -->
    <div class="container">
      <div class="andro_footer-top">
        <div class="andro_footer-logo">
         {{--  <img src="public/FE/img/logo.png" width="50" height="50" alt="logo"> --}}
        </div>
        {{-- <div class="andro_footer-buttons">
          <a href="#"> <img src="public/FE/img/android.png" alt="download it on the app store"></a>
        </div> --}}
      </div>
    </div>

    <!-- Middle Footer -->
    <div class="andro_footer-middle">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-widget">
            <h6 class="widget-title">DANH MỤC KHÁC</h6>
            <ul>
              <li> <a href="index.html">Trang chủ</a> </li>
             
              <li><a href="" data-toggle="modal" data-target="#profileModal">Thông tin cá nhân</a> </li>
              <li><a href="login.html">Thay đổi mật khẩu</a> </li>
              <li><a href="" data-toggle="modal" data-target="#logoutModal">Đăng xuất</a> </li>
           
          </li>
              <li> <a href="contact-us.html">Thông tin</a> </li>
            </ul>
          </div>
         <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 footer-widget">
            <h6  class="widget-title">TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT VĨNH LONG</h6>
            <ul class="social-media">
              <li> Điện thoại: (+84) 02703.822141</li>
              <li> Fax: (+84) 02703.821003</li>
              <li> Email: spktvl@vlute.edu.vn</li>
              <li> Địa chỉ: 73 Nguyễn Huệ, phường 2, thành phố Vĩnh Long, tỉnh Vĩnh Long </li>
            </ul>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 footer-widget">

            <ul class="social-media">
              <li> <a href="#" class="facebook"> <i class="fab fa-facebook-f"></i> </a> </li>
              <li> <a href="#" class="youtube"> <i class="fab fa-youtube"></i> </a> </li>
            </ul>
           <div class="andro_footer-buttons">
          <a href="#"> <img src="{{asset('public/FE/img/android.png')}}" alt="download it on the app store"></a>
        </div>
          </div>


        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="andro_footer-bottom">
      <div class="container">
        <ul>
        </ul>
        <div class="andro_footer-copyright">
          <p> Copyright © 2020 <a href="http://vlute.edu.vn/vi/">VLUTE</a></p>
          <p> Email: 17004060@student.vlute.edu.vn</p>
          <a href="#" class="andro_back-to-top">Đầu trang <i class="fas fa-chevron-up"></i> </a>
        </div>
      </div>
    </div>

  </footer>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn thoát ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Chọn <b style="color: red">"Đăng xuất"</b> để đăng xuất tài khoản</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
          <a class="btn btn-primary" href="{{URL::to('/logout')}}">Đăng xuất</a>
        </div>
      </div>
    </div>
  </div>
 
   <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông tin cá nhân</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <?php
        echo "<div class='modal-body'>MSSV: ".$MaSV."</div>";
        echo "<div class='modal-body'>Họ và tên: " .$HotenSV."</div>";
         echo "<div class='modal-body'>Lớp: ".$Tenlop  ."</div>";
        echo "<div class='modal-body'>Khóa: ".$Khoahoc   ."</div>";
        echo "<div class='modal-body'>Email: ".$EmailSV   ."</div>";
        echo "<div class='modal-body'>Số điện thoại: 0".$SdtSV  ."</div>";
        ?>  
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times"></i> Thoát</button>
          <!-- <a class="btn btn-primary" href="http://localhost:8888/QLDA-NV/logout.php">Logout</a> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
 
@include('view/library')
</body>
 <script type="text/javascript">
 

      
 </script>
 
</html>