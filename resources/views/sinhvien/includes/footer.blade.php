<?php
$MaSV=Session::get('MaSV');
 $HotenSV=Session::get('HotenSV');
$Tenlop=Session::get('Tenlop');
$Khoahoc=Session::get('Khoahoc');
$SdtSV=Session::get('SdtSV');
$EmailSV=Session::get('EmailSV');


?>
 

  <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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
 
@include('sinhvien/includes/library')
</body>


</html>