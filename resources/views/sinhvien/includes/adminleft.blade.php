<?php 
use App\Http\Controllers\DetaiController;
$KT = DetaiController::checkDKDA();
$kt = DetaiController::checkDKDT(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">

  <title>Quản lý đồ án</title>

  <!-- Custom fonts for this template-->
  

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://vlute.edu.vn/vi/">
        <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-user-graduate"></i>
       </div>
       <div class="sidebar-brand-text mx-3">Đồ án <sup>SV</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
      <a class="nav-link" href="{{URL::to('sinhvien')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Trang chủ</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        THÔNG TIN
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-briefcase"></i>
          <span>Đồ án</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Đồ án Components:</h6>

            @if ($KT==true and $kt==true)
            <a class='collapse-item' href="{{URL::to('dangkydoan')}}">Đăng ký đề tài</a>
            @elseif($kt==true and $KT==false)
            <a class='collapse-item' href="{{URL::to('dangkydetai')}}">Đăng ký đề tài</a>
            @else
            <a class='collapse-item' href="{{URL::to('lichbaocao')}}">Lịch báo cáo</a>
            <a class='collapse-item' href="{{URL::to('kehoachthuchien')}}">Nộp sản phẩm tuần</a>
            <a class='collapse-item' href="{{URL::to('tailieuthamkhao')}}">Tài liệu tham khảo</a>
            @endif  



            
            
            
          </div>
        </div>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        BÁO CÁO 
      </div>


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Tiến độ</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header" >Nộp file tiến độ thực hiện</h6>
             @if ($KT==true && $kt=true)

             @else
            <a class="collapse-item" data-toggle="modal" data-target="#upfiletiendo">Upload file tiến độ</a>
            <a class="collapse-item" data-toggle="modal" data-target="#taothucong">Tạo tiến độ thủ công</a>
            <a class="collapse-item" href="tiendo.php">Tiến độ thực hiện</a>
            @endif

          </div>
        </div>
      </li>




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

    <div class="modal fade" id="upfiletiendo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class='modal-content'>
          <form id="FORM1" method="POST" action="uploadfiletiendo.php" enctype="multipart/form-data">
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>Tải lên file tiến độ</h5>
              <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>×</span>
              </button>
            </div>
            
            <div class='modal-body' style='text-align:center;font-size: :20px'><b> Lưu ý file tiến độ chỉ up được bằng file excel .xlsx</b></div>

            <div class='modal-body'>Upload file:<input type='file' name='filetiendo'></div>



            <div class='modal-footer'>

              <button class='btn btn-secondary'type='button' data-dismiss='modal'>Ok</button>
              <button type='submit' id='saveButton' name='saveButton' class='btn btn-primary'>Save changes</button>
            </div>
          </form>
        </div>     
      </div>
    </div>


    <div class="modal fade" id="taothucong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class='modal-content'>
          <form id="FORM1" method="POST" action="taotiendothucong.php" enctype="multipart/form-data">
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>Tạo tiến độ</h5>
              <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>×</span>
              </button>
            </div>
            


            <div class='modal-body'>Nội dung:<b>
             <textarea class='ckeditor' name='Noidung'></textarea>
           </b></div>


           <div class='modal-body'>Tuần:<b>
            <input name="Tuan" class="form-control" type="text" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="myId"/>
          </b></div>


          <div class='modal-footer'>

            <button class='btn btn-secondary'type='button' data-dismiss='modal'>Ok</button>
            <button type='submit' id='saveButton' name='saveButton' class='btn btn-primary'>Save changes</button>
          </div>
        </form>
      </div>     
    </div>
  </div>

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