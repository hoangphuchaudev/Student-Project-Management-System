  <style type="text/css">
      object
      {
        width: 100%;
        height: 100%;
        display: block;
      }
      .mySlides {display: none;}
      #siteloader
      {
         max-width: 100%;
         max-height: 100%;
        
        position: relative;
        margin: auto;
      }
      #siteloader img
      {
        background-size: 100% 100%;
       max-width: 100%;
         max-height: 100%;

        vertical-align: middle;
      }
     /* Next & previous buttons */
.slideshow-container {
  max-width: 700px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
  <?php 

// error_reporting(0);

// $MaSV=implode(" ",($DB->getlist("SELECT MaSV FROM sinhvien WHERE MaUS='$a'"))[0]);
// $MaDT=implode(" ",($DB->getlist("SELECT MaDT FROM dangkidetai WHERE MaSV='$MaSV'"))[0]);


$MaKHT=$DB->getlist("SELECT MaKHT FROM kehoachtuan WHERE MaDT='$MaDT' ORDER BY Tuan ASC ");

$soluongkehoachtuan=count($DB->getlist("SELECT MaKHT FROM kehoachtuan WHERE MaDT='$MaDT'"));
$soluongkehoachtuandalam=count($DB->getlist("SELECT MaKHT FROM kehoachtuan WHERE MaDT='$MaDT' and Tinhtrang='1'"));
if($soluongkehoachtuan==0)
{
  $tong="0";
}
else
$tong=round($soluongkehoachtuandalam*100/$soluongkehoachtuan)."";


if($MaDT=="")
{
?>
  <div class='container-fluid'>
  <div id='siteloader'>

     <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <img src="../img/vlute.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <img src="../img/hinh1.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 5</div>
  <img src="../img/hinh2.png" style="width:100%">
  <div class="text">Caption Three</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <img src="../img/hinh3.png" style="width:100%">
  <div class="text">Caption Three</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <img src="../img/hinh4.png" style="width:100%">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

      </div>
      <div style="height: 300px"></div>
     

    

 
<?php
}
else
{
  
$TenDT=implode(" ",($DB->getlist("SELECT TenDT FROM detai WHERE MaDT='$MaDT'"))[0]);
$TenGV=implode(" ",($DB->getlist("SELECT HotenGV FROM gvhd,detai WHERE gvhd.MaGV=detai.MaGV AND MaDT='$MaDT'"))[0]);
$NoidungLBC=$DB->getlist("SELECT NoidungLBC FROM lichbaocao WHERE MaDT='$MaDT'");
$NgayBC=$DB->getlist("SELECT NgayBC FROM lichbaocao  WHERE MaDT='$MaDT'");
$MaPhong=$DB->getlist("SELECT MaPhong FROM lichbaocao  WHERE MaDT='$MaDT'");
$n=count($NoidungLBC);
 ?>

  <div class="container-fluid">   

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $TenDT ?>   (GV:  <?php echo $TenGV ?>)</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="window.print()"><i class="fas fa-download fa-sm text-white-50"></i>Lưu trang</a>
          </div>

          <!-- Content Row -->
          <div class="row">
          <?php 
$MaDA=implode(" ",($DB->getlist("SELECT MaDA FROM detai WHERE MaDT='$MaDT'"))[0]);
$MaHK=implode(" ",($DB->getlist("SELECT MaHK FROM detai WHERE MaDT='$MaDT'"))[0]); 
$ThoigianBDHK=implode(" ",($DB->getlist("SELECT ThoigianBDHK FROM hocky WHERE MaHK='$MaHK'"))[0]);
$TuanBD=implode(" ",($DB->getlist("SELECT Tuanhoc FROM hocky WHERE MaHK='$MaHK'"))[0]);
            


//In ra tất cả 15 tuần làm đồ án

          for($i=0;$i<$n;$i++)
          {
            $NgayBDtuan=$ThoigianBDHK;     
            $ngay=implode(" ",$NgayBC[$i]);
            $start_week="";
            $end_week="";
            for ($j=0;$j<17;$j++)  
            {
            
             $NgayBDtuan=date('Y-m-d',strtotime('+ 7 day' ,strtotime($NgayBDtuan)));
           
            
           
             $NgayKTtuan=date('Y-m-d',strtotime('+ 7 day' ,strtotime($NgayBDtuan)));

              $NgayBDtuani=strtotime($NgayBDtuan);
             

               $NgayKTtuani=strtotime($NgayKTtuan);
              
              if((strtotime($ngay)>$NgayBDtuani) && (strtotime($ngay) <= $NgayKTtuani))
              {
                $start_week=date('Y-m-d',$NgayBDtuani);
                $end_week=date('Y-m-d',$NgayKTtuani);

              
              
              }
              else
              {

              }
             }

               if(date('d/m/Y',strtotime($ngay))==date("d/m/Y"))
              {
                $MaPhongi=implode(" ",$MaPhong[$i]);
                $TenPhong=$DB->getlist("SELECT TenPhong FROM phong WHERE MaPhong='$MaPhongi'");
                echo "<div class='col-xl-3 col-md-6 mb-4'>";
                  echo "<div class='card border-left-danger shadow h-100 py-2'>";
                   echo " <div class='card-body'>";
                     echo "<div class='row no-gutters align-items-center'>";
                        echo"<div class='col mr-2'>";
                          echo "<div class='text-xs font-weight-bold text-danger text-uppercase mb-1'>Thông báo</div>";
                          echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" .implode(" ",$NoidungLBC[$i]) ."</div>";
                          echo "<div class='h6 mb-0 '>Ngày: <span class='h6 mb-0 font-weight-bold text-gray-800'>" .date('d/m/Y',strtotime($ngay)) ."- (Hôm nay)</span> </div>";
                          // echo "<div class='h6 mb-0 '>Môn: <span class='h6 mb-0 font-weight-bold text-gray-800'>Đồ án 1</span> </div>";
                          echo "<div class='h6 mb-0 '>Giảng viên: <span class='h6 mb-0 font-weight-bold text-gray-800'>".$TenGV."</span></div>";
                          echo "<div class='h6 mb-0 '>Phòng: <span class='h6 mb-0 font-weight-bold text-gray-800'>" .implode(" ",$TenPhong[0]) ."</span></div>";
                        echo "</div>";
                        echo "<div class='col-auto'>";
                          echo"<i class='fas fa-bell fa-2x text-gray-300'></i>";
                        echo "</div>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              }

              else
             if((strtotime($ngay) > strtotime($start_week)) && (strtotime($ngay) <= strtotime($end_week)))
              {

                // $MaPhongi=implode(" ",$MaPhong[$i]);
                // $TenPhong=$DB->getlist("SELECT TenPhong FROM phong WHERE MaPhong='$MaPhongi'");
                // echo "<div class='col-xl-3 col-md-6 mb-4'>";
                //   echo "<div class='card border-left-primary shadow h-100 py-2'>";
                //    echo " <div class='card-body'>";
                //      echo "<div class='row no-gutters align-items-center'>";
                //         echo"<div class='col mr-2'>";
                //           echo "<div class='text-xs font-weight-bold text-primary text-uppercase mb-1'>Thông báo</div>";
                //           echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" .implode(" ",$NoidungLBC[$i]) ."</div>";
                //           echo "<div class='h6 mb-0 '>Ngày: <span class='h6 mb-0 font-weight-bold text-gray-800'>" .date('d/m/Y',strtotime($ngay)) ."- (Tuần này)</span> </div>";
                //           // echo "<div class='h6 mb-0 '>Môn: <span class='h6 mb-0 font-weight-bold text-gray-800'>Đồ án 1</span> </div>";
                //           echo "<div class='h6 mb-0 '>Giảng viên: <span class='h6 mb-0 font-weight-bold text-gray-800'>".$TenGV."</span></div>";
                //           echo "<div class='h6 mb-0 '>Phòng: <span class='h6 mb-0 font-weight-bold text-gray-800'>" .implode(" ",$TenPhong[0]) ."</span></div>";
                //         echo "</div>";
                //         echo "<div class='col-auto'>";
                //           echo"<i class='fas fa-bell fa-2x text-gray-300'></i>";
                //         echo "</div>";
                //       echo "</div>";
                //     echo "</div>";
                //   echo "</div>";
                // echo "</div>";
              }
              else{
                // $MaPhongi=implode(" ",$MaPhong[$i]);
                // $TenPhong=$DB->getlist("SELECT TenPhong FROM phong WHERE MaPhong='$MaPhongi'");
                // echo "<div class='col-xl-3 col-md-6 mb-4'>";
                //   echo "<div class='card border-left-primary shadow h-100 py-2'>";
                //    echo " <div class='card-body'>";
                //      echo "<div class='row no-gutters align-items-center'>";
                //         echo"<div class='col mr-2'>";
                //           echo "<div class='text-xs font-weight-bold text-primary text-uppercase mb-1'>Thông báo</div>";
                //           echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" .implode(" ",$NoidungLBC[$i]) ."</div>";
                //           echo "<div class='h6 mb-0 '>Ngày: <span class='h6 mb-0 font-weight-bold text-gray-800'>" .date('d/m/Y',strtotime($ngay)) ."- (Tuần sau)</span> </div>";
                //           // echo "<div class='h6 mb-0 '>Môn: <span class='h6 mb-0 font-weight-bold text-gray-800'>Đồ án 1</span> </div>";
                //           echo "<div class='h6 mb-0 '>Giảng viên: <span class='h6 mb-0 font-weight-bold text-gray-800'>".$TenGV."</span></div>";
                //           echo "<div class='h6 mb-0 '>Phòng: <span class='h6 mb-0 font-weight-bold text-gray-800'>" .implode(" ",$TenPhong[0]) ."</span></div>";
                //         echo "</div>";
                //         echo "<div class='col-auto'>";
                //           echo"<i class='fas fa-bell fa-2x text-gray-300'></i>";
                //         echo "</div>";
                //       echo "</div>";
                //     echo "</div>";
                //   echo "</div>";
                // echo "</div>";
              }

            }
            ?>


     
          <?php
          $MaDA=implode(" ",($DB->getlist("SELECT MaDA FROM detai WHERE MaDT='$a'"))[0]);
          $MaHK=implode(" ",($DB->getlist("SELECT MaHK FROM detai WHERE MaDT='$a'"))[0]); 
          $ThoigianBDHK=implode(" ",($DB->getlist("SELECT ThoigianBDHK FROM hocky WHERE MaHK='$MaHK'"))[0]);
           $TuanBD=implode(" ",($DB->getlist("SELECT Tuanhoc FROM hocky WHERE MaHK='$MaHK'"))[0]);
           $NgayKT=implode(" ",($DB->getlist("SELECT NgayKT FROM kehoachthuchien WHERE MaDT='$MaDT'"))[0]);

          // $first_date = strtotime($ThoigianBDHK);
          // $second_date = strtotime(date("Y-m-d"));
          // // echo $second_date;
          // $datediff = abs($first_date - $second_date);
          // $ngay= floor($datediff / (60*60*24));
          // $tuan=floor($ngay/7);
          // $tuan=$TuanBD+$tuan;

           date_default_timezone_set('Asia/Ho_Chi_Minh');
            $today = date("Y-m-d");
            $another_date = strtotime($NgayKT);
            if (strtotime($another_date) > strtotime($today)) {
            $NoidungTH.="Tuần này không có kế hoạch nào";
            } 
            else
            {
              
            
              $NoidungTH=substr(implode(" ",($DB->getlist("SELECT Noidungthuchien FROM kehoachthuchien WHERE NgayKT='$NgayKT' AND MaDT='$MaDT'"))[0]),0,70)."...";
           
            }
            if($NoidungTH=="")
              {
                $NoidungTH.="Không có kế hoạch";
              }
              else
              {
                
              }
                      
          


         //  $n=strlen($NoidungTH);
         //  $shorta=array();
         //  $i=0;
         //  do{
         //     mysqli_set_charset($NoidungTH[$i], 'UTF8'); 
         //   $shorta[$i]=$NoidungTH[$i];

         //   $i++;
         //  }while($NoidungTH[$i]!="\n" || $i>$n);
         // $kk=implode(" ",$shorta);


          // $nowtuan= $DB->getlist("")
            echo "<div class='col-xl-3 col-md-6 mb-4'>
              <div class='card border-left-success shadow h-100 py-2'>
                <div class='card-body'>
                  <div class='row no-gutters align-items-center'>
                    <div class='col mr-2'>
                      <div class='text-xs font-weight-bold text-success text-uppercase mb-1'>Công việc tuần này</div>";
                      echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" .$NoidungTH ."</div>";
                       echo "<div class='h5 mb-0 font-weight-bold text-gray-800'></div>
                       <div class='h5 mb-0 font-weight-bold text-gray-800'></div>

                    </div>
                    <div class='col-auto'>
                      <i class='fas fa-laptop-code fa-2x text-gray-300'></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>";
            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tiến độ</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $tong?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $tong?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Công việc đã làm</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $soluongkehoachtuandalam ?>/<?php echo $soluongkehoachtuan ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tasks fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Thông báo khác</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
<?php
for($i=0;$i<$n;$i++)
          {
            $NgayBDtuan=$ThoigianBDHK;     
            $ngay=implode(" ",$NgayBC[$i]);
            $start_week="";
            $end_week="";
            for ($j=0;$j<17;$j++)  
            {
            
             $NgayBDtuan=date('Y-m-d',strtotime('+ 7 day' ,strtotime($NgayBDtuan)));
           
            
           
             $NgayKTtuan=date('Y-m-d',strtotime('+ 7 day' ,strtotime($NgayBDtuan)));

              $NgayBDtuani=strtotime($NgayBDtuan);
             

               $NgayKTtuani=strtotime($NgayKTtuan);
              
              if((strtotime($ngay)>$NgayBDtuani) && (strtotime($ngay) <= $NgayKTtuani))
              {
                $start_week=date('Y-m-d',$NgayBDtuani);
                $end_week=date('Y-m-d',$NgayKTtuani);

              
              
              }
              else
              {

              }
             }

               if(date('d/m/Y',strtotime($ngay))==date("d/m/Y"))
              {
                $MaPhongi=implode(" ",$MaPhong[$i]);
                $TenPhong=$DB->getlist("SELECT TenPhong FROM phong WHERE MaPhong='$MaPhongi'");
              
              }

              else
             if((strtotime($ngay) > strtotime($start_week)) && (strtotime($ngay) <= strtotime($end_week)))
              {

                $MaPhongi=implode(" ",$MaPhong[$i]);
                $TenPhong=$DB->getlist("SELECT TenPhong FROM phong WHERE MaPhong='$MaPhongi'");
              
                          echo "<div class='h6 mb-0 font-weight-bold text-gray-800'><a href='#' data-toggle='modal' data-target='#noidung".implode(" ",$NoidungLBC[$i])."'>" .implode(" ",$NoidungLBC[$i]) ."</a></div>";
                          echo "<div class='h6 mb-0 '>Ngày: <span class='h6 mb-0 font-weight-bold text-gray-800'>" .date('d/m/Y',strtotime($ngay)) ."- (Tuần này)</span> </div>";
                          echo "<hr>";

                          // echo "<div class='h6 mb-0 '>Môn: <span class='h6 mb-0 font-weight-bold text-gray-800'>Đồ án 1</span> </div>";
                          // echo "<div class='h6 mb-0 '>Giảng viên: <span class='h6 mb-0 font-weight-bold text-gray-800'>".$TenGV."</span></div>";
                          // echo "<div class='h6 mb-0 '>Phòng: <span class='h6 mb-0 font-weight-bold text-gray-800'>" .implode(" ",$TenPhong[0]) ."</span></div>";
      
              }
              else{
                $MaPhongi=implode(" ",$MaPhong[$i]);
                $TenPhong=$DB->getlist("SELECT TenPhong FROM phong WHERE MaPhong='$MaPhongi'");
    
                           echo "<div class='h6 mb-0 font-weight-bold text-gray-800'><a href='#' data-toggle='modal' data-target='#noidung".implode(" ",$NoidungLBC[$i])."'>" .implode(" ",$NoidungLBC[$i]) ."</a></div>";
                          echo "<div class='h6 mb-0 '>Ngày: <span class='h6 mb-0 font-weight-bold text-gray-800'>" .date('d/m/Y',strtotime($ngay)) ."- (Tuần sau)</span> </div>";
                          echo "<hr>";
                          // echo "<div class='h6 mb-0 '>Môn: <span class='h6 mb-0 font-weight-bold text-gray-800'>Đồ án 1</span> </div>";
                          // echo "<div class='h6 mb-0 '>Giảng viên: <span class='h6 mb-0 font-weight-bold text-gray-800'>".$TenGV."</span></div>";
                          // echo "<div class='h6 mb-0 '>Phòng: <span class='h6 mb-0 font-weight-bold text-gray-800'>" .implode(" ",$TenPhong[0]) ."</span></div>";
        
              }
                echo "<div class='modal fade' id='noidung".implode(" ",$NoidungLBC[$i])."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
    echo "<div class='modal-dialog' role='document'>";
      echo "<div class='modal-content'>";
        echo"<div class='modal-header'>";
          echo "<h5 class='modal-title' id='exampleModalLabel'>Kế hoạch thực hiện</h5>";
          echo "<button class='close' type='button' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>×</span>";
          echo "</button>";
        echo "</div>";

        // echo "<div class='modal-body'>Tên đồ án:<b> " .$TenDA ."</b></div>";
        // echo "<div class='modal-body'>Tên đồ án:<b> " .$TenDT ."</b></div>";
        // echo "<div class='modal-body'>Nội dung thực hiện:<b> " .$Noidungthuchien ."</b></div>";

        echo "<hr>";
        echo "<div class='modal-body' style='text-align:center;font-size:20px'><b> Upload sản phẩm của tuần</b></div>";
        echo "<div class='modal-body'>Mô tả:<textarea class='ckeditor' name='Mota'></textarea></div>";
      

        echo "<div class='modal-body'>Upload file:<input type='file' name='filesp'></div>";
      
        
        echo "<div class='modal-footer'>";
          echo "<button class='btn btn-secondary' type='button' data-dismiss='modal'>Ok</button>
          <button type='submit' id='saveButton' name='saveButton' class='btn btn-primary'>Save changes</button>
        </div>
      </form> 
      </div>
    </div>
  </div>";
}

            
            

   ?>                       
                        </div>
                        <div class="col">
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          

          <!-- Chart -->

<div style="height: 500px"></div>
<?php 
}

 ?>

  <!-- <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script> -->
    <!--   <script>
      $("#siteloader").html('<object data="http://vlute.edu.vn/vi/">');
      
   
    </script> -->
     
  <script>
var slideIndex = 0;
showSlides();

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}



function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }

  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
    
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000);

  
 
}
</script>