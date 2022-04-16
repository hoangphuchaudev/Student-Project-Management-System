<?php 
include('../view/adminleftgv.php');
include('../view/topcontengv.php');
?>
<?php
if(isset($_GET['doan']))
{
  $doan=$_GET['doan'];
}
else
{
  $doan="";
}
$TenDA=implode(" ",($DB->getlist("SELECT TenDA FROM doan WHERE MaDA='$doan'"))[0]);
$MaHKall=$DB->getlist("SELECT MaHK FROM hocky");
$TenHK=$DB->getlist("SELECT TenHK FROM hocky");
$NienkhoaHK=$DB->getlist("SELECT NienkhoaHK FROM hocky");
$ThoigianBDHK=$DB->getlist("SELECT ThoigianBDHK FROM hocky");
$ThoigianKTHK=$DB->getlist("SELECT ThoigianKTHK FROM hocky");
$nhk=count($MaHKall);
for($j=0;$j<$nhk;$j++)
{
  $now=date('Y-m-d')." ";
  if(strtotime($now)>strtotime(implode(" ",$ThoigianBDHK[$j]))&&strtotime($now)<strtotime(implode(" ",$ThoigianKTHK[$j])))
  {
    $MaHKnow=implode(" ",$MaHKall[$j]);
  }
}
?>
<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?php echo $TenDA;  ?></h1>
          </div>
<?php 
$MaDT=$DB->getlist("SELECT MaDT FROM detai WHERE MaGV ='$MaGV' AND MaDA='$doan' AND MaHK='$MaHKnow' ORDER BY MaDT ASC ");
$TenDT=$DB->getlist("SELECT TenDT FROM detai WHERE MaGV ='$MaGV' AND MaDA='$doan' AND MaHK='$MaHKnow' ORDER BY MaDT ASC");



$n=count($MaDT);

 ?>

         
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kế hoạch thực hiện</h6>
              
            </div>  
            <div class="col-xl-auto col-md-auto mb-auto">
              <div class="card border-bottom-success shadow h-100 py-2">

                <div class="form-group col-xl-auto col-md-auto mb-auto " style="width: 50%; ">
            
          <input type="hidden" name="MaGV" value="<?php echo $MaGV ?>">
          <input type="hidden" name="MaDA" value="<?php echo $doan ?>">
                  </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-light" id="dataTable" width="100%" cellspacing="0" >
                      <thead >
                        <tr>
                          <th>STT</th>
                          <th>Tên đề tài</th>
                          <th>Sinh viên thực hiện</th>
                          <th>Thời hạn</th>
                          <th>File sản phẩm</th>
                          <th>#</th>
                         
                        </tr>
                      </thead>
                     

<?php 
for($i=0;$i<$n;$i++)
{
  $MaDTi=implode(" ",$MaDT[$i]);
  $MaDAi=implode(" ",$MaDA[$i]);

  $MaLVNCi=implode(" ",$MaLVNC[$i]);
  $TenLVNC=$DB->getlist("SELECT TenLVNC FROM linhvucnghiencuu WHERE MaLVNC='$MaLVNCi'");
  $TenDA=$DB->getlist("SELECT TenDA FROM doan WHERE MaDA='$MaDAi'");
      echo "<tbody>";
      

      ?>

                  
                    <tr>
                    <td><?php echo ($i+1) ?></td>
                    <td style="max-width: 400px"><?php echo implode(" ",$TenDT[$i]) ?></td>
                    <td> 

                     <?php 

                     $MaSV=$DB->getlist("SELECT MaSV FROM dangkidetai WHERE MaDT='$MaDTi'");

                     $soluongsv=count($MaSV);
                     for($ii=0;$ii<$soluongsv;$ii++)
                     {
                      $MaSVi=implode(" ",$MaSV[$ii]);
                      $TenSV=$DB->getlist("SELECT HotenSV FROM sinhvien WHERE MaSV='$MaSVi'");
                      echo implode(" ",$TenSV[0])."<br>";
                     }
                     

                     ?>
                   

                    </td>
                    <td>
                      <?php 

                     $NgayKT=$DB->getlist("SELECT NgayKT FROM kehoachthuchien WHERE MaDT='$MaDTi' ORDER BY MaKHTH ASC");
                      $MaKHTH=$DB->getlist("SELECT MaKHTH FROM kehoachthuchien WHERE MaDT='$MaDTi' ORDER BY MaKHTH ASC");

                     $soluongsv=count($MaKHTH);
                     $Mamin="";
                     $Ngaymin=0;
                     for($iii=0;$iii<$soluongsv;$iii++)
                     {
                      if(strtotime(implode(" ",$NgayKT[$iii]))<=strtotime(date('Y-m-d'))&&((strtotime(implode(" ",$NgayKT[$iii]))>$Ngaymin)))
                      {
                        $Mamin=implode(" ",$MaKHTH[$iii]);
                        $Ngaymin=strtotime(implode(" ",$NgayKT[$iii]));
                      // echo "<b style='color:red'>" .date("d/m",strtotime(implode(" ",$NgayKT[$iii])))."</b>"."<br>";
                      }
                      else
                      {

                      }
                      

                     }
                    $NgayBDi=implode(" ",($DB->getlist("SELECT NgayBD FROM kehoachthuchien WHERE MaKHTH='$Mamin'"))[0]);
                    $NgayKTi=implode(" ",($DB->getlist("SELECT NgayKT FROM kehoachthuchien WHERE MaKHTH='$Mamin'"))[0]);
                    if($NgayBDi!="")
                    echo date('d-m',strtotime($NgayBDi))." / ".date('d-m',strtotime($NgayKTi));
                    else
                    {
                      echo "Gần đây chưa có kế hoạch";
                    }

                     ?>
                    
                      
                    </td>
                    <td>
                    <?php 

                     $Sanpham=implode(" ",($DB->getlist("SELECT Sanpham FROM sanpham WHERE MaKHTH='$Mamin'"))[0]);

                     
                      if($Sanpham!="")
                      {
                      echo $Sanpham;
                      }
                      else
                      echo "Chưa nộp sản phẩm";

                     
                     

                     ?> 

                    </td>
                    
                     <?php
                        echo "<td style='text-align:center'> <a href='#' data-toggle='modal' data-target='#themlichbaocao".implode(" ",$MaDT[$i])."'<i class='fas fa-plus-square'></i></a>";
                        echo " ";
                        if($Sanpham!="")
                        {
                        ?>
                         <a href='#' onclick="myFunction('<?php echo $Sanpham ?>')"><i class="fas fa-search"></i></a>
                       <?php 
                        }
                        else
                        {
                          ?>
                          <a ><i class="fas fa-search"></i></a>
                          <?php
                        }
                      
                echo "</tr>";

            echo "</tbody>";
            $now=date('Y-m-d',strtotime('+0 day',strtotime(date("Y-m-d"))));
            $ThoigianKTHKi=implode(" ",($DB->getlist("SELECT ThoigianKTHK FROM hocky WHERE MaHK='$MaHKnow'"))[0]);
           

?>

<div class="modal fade" id="themlichbaocao<?php echo implode(" ",$MaDT[$i]) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class='modal-content'>
        <form id="FORM1" method="POST" action="themkehoachthuchien.php" enctype="multipart/form-data">
          <div class='modal-header'>
          <input type="hidden" name="MaDT" value="<?php echo implode(" ",$MaDT[$i]) ?>">
          <input type="hidden" name="MaDA" value="<?php echo $doan ?>">
          <h5 class='modal-title' id='exampleModalLabel'>Thêm kế hoạch thực hiện</h5>
          <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
            </div>
            
                <div class='modal-body'>Nội dung thực hiện:<b>
               <textarea class='ckeditor' name='Noidungthuchien' required></textarea>
              </b></div>
                <div class='modal-body'>Ngày bắt đầu <p style="color:red"></p>
                  <div class="form-group">
                  <input type="date" class="form-control" id="MaDG"  name="NgayBD"  value="" min='<?php echo $now ?>' max="<?php echo $ThoigianKTHKi ?>" required>
                  </div>
                 
                </div>  

                <div class='modal-body'>Ngày kết thúc <p style="color:red"></p>
                  <div class="form-group">
                  <input type="date" class="form-control" id="MaDG"  name="NgayKT"  value="" min='<?php echo $now ?>' max="<?php echo $ThoigianKTHKi ?>" required>
                  </div>
                 
                </div>  

                  
              
        
                <div class='modal-footer'>

                <button class='btn btn-secondary'type='button' data-dismiss='modal'>Ok</button>
                <button type='submit' id='saveButton' name='saveButton' class='btn btn-primary'>Save changes</button>
                </div>
                 </form>
              </div>     
       </div>
      </div>

 
<?php
}    
 ?>


                    </table>
                 </div>
                </div>
             </div>
          </div>
        </div>           
         
</div>
<?php 
include('../view/footergv.php');
 ?>
<script type="text/javascript">
function myFunction(a) 
{

// alert(a);
var s="../file/";
window.open(s+a);
}
</script>