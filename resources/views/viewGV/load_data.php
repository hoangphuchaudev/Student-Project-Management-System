
<?php
include('../cauhinh/Busines.php');
$DB=new xuly();
// 
$doan=$_POST['MaDA'];
$MaGV=$_POST['MaGV'];
$Hocky=$_POST['brand_id'];

$MaDT=$DB->getlist("SELECT MaDT FROM detai WHERE MaGV ='$MaGV' AND MaDA='$doan' AND MaHK='$Hocky' ORDER BY MaDT ASC ");
$TenDT=$DB->getlist("SELECT TenDT FROM detai WHERE MaGV ='$MaGV' AND MaDA='$doan'  AND MaHK='$Hocky' ORDER BY MaDT ASC");
$SoluongSV=$DB->getlist("SELECT SoluongSV FROM detai WHERE MaGV ='$MaGV' AND MaDA='$doan'  AND MaHK='$Hocky' ORDER BY MaDT ASC ");
$MaLVNC=$DB->getlist("SELECT MaLVNC FROM detai WHERE MaGV ='$MaGV' AND MaDA='$doan'  AND MaHK='$Hocky' ORDER BY MaDT ASC ");
$MaDA=$DB->getlist("SELECT MaDA FROM detai WHERE MaGV ='$MaGV' AND MaDA='$doan'  AND MaHK='$Hocky' ORDER BY MaDT ASC ");
$MaHK=$DB->getlist("SELECT MaHK FROM detai WHERE MaGV ='$MaGV' AND MaDA='$doan'  AND MaHK='$Hocky' ORDER BY MaDT ASC ");

$n=count($MaDT);  
$data='<thead >
        <tr>
          <th>STT</th>
          <th>Tên đề tài</th>
          <th>Số lượng sinh viên</th>
          <th>Sinh viên thực hiện</th>
          <th>Lĩnh vực nghiên cứu</th>
          <th>Đồ án</th>
          <th>#</th>
         
        </tr>
      </thead>';
for($i=0;$i<$n;$i++)
{
  $MaDTi=implode(" ",$MaDT[$i]);
  $MaDAi=implode(" ",$MaDA[$i]);

  $MaLVNCi=implode(" ",$MaLVNC[$i]);
  $TenLVNC=$DB->getlist("SELECT TenLVNC FROM linhvucnghiencuu WHERE MaLVNC='$MaLVNCi'");
  $TenDA=$DB->getlist("SELECT TenDA FROM doan WHERE MaDA='$MaDAi'");
      
      $dem = $DB->getlist("SELECT COUNT(MaSV) FROM dangkidetai WHERE MaDT='$MaDTi'");
      $demi=implode(" ",$dem[0]);
      $SoluongSVi=implode(" ",$SoluongSV[$i]);

      $kk=round($demi*100/$SoluongSVi)."";
      
      $data.='<tbody>';

      

                  
                    $data.='<tr>
                    <td>'.($i+1).'</td>
                    <td style="max-width: 400px">' .implode(" ",$TenDT[$i]) .'</td>
                    <td>'. 
                     $demi." / ".implode(" ",$SoluongSV[$i]).'
                    <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width:'.$kk."%" .'" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                    </div>

                    </td>
                     <td>';
                     

                     $MaSV=$DB->getlist("SELECT MaSV FROM dangkidetai WHERE MaDT='$MaDTi'");

                     $soluongsv=count($MaSV);
                     for($ii=0;$ii<$soluongsv;$ii++)
                     {
                      $MaSVi=implode(" ",$MaSV[$ii]);
                      $TenSV=$DB->getlist("SELECT HotenSV FROM sinhvien WHERE MaSV='$MaSVi'");
                      $data .=implode(" ",$TenSV[0]).'<br>';
                     }
                     

                     
                    $data.='</td>
                    <td>'.implode(" ",$TenLVNC[0]).'</td>
                    <td>'.implode(" ",$TenDA[0]).'</td>';
                    
                     
                     if($demi=implode(" ",$dem[0])>0)
                     {
                      $data.='<td style="text-align:center" ><a><i class="fas fa-ban"></i></a>';
                       $data.='<td style="text-align:center"><a href="#" data-toggle="modal" data-target="#suadetai'.implode(" ",$MaDT[$i]).'"<i class="fas fa-edit"></i></a>';
                     }
                     else
                      {

                          
                        

                        $data.='<td style="text-align:center" ><a href="#" data-toggle="modal" data-target="#suadetai"><i class="fas fa-trash-alt"></i></a>';
                       $data.='<td style="text-align:center"><a href="#" data-toggle="modal" data-target="#suadetai'.implode(" ",$MaDT[$i]).'"<i class="fas fa-edit"></i></a>';

                        
                      }
                      
                $data.='</tr>';

            $data.='</tbody>';
  ?>

  <div class="modal fade" id="suadetai<?php echo implode(" ",$MaDT[$i]) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class='modal-content'>
        <form id="FORM1" method="POST" action="xulysuadetai.php?MaDT=<?php echo implode(" ",$MaDT[$i]) ?>" enctype="multipart/form-data">
          <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Thông tin đề tài</h5>
          <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
            </div>
            
                <div class='modal-body'>Tên đề tài:<b>
                <div  name='TenDT' required><?php echo implode(" ",$TenDT[$i]) ?></div>
              </b></div>
                <div class='modal-body'>Số lượng sinh viên
                  <div class="form-group">
                  <input type="text" class="form-control" id="MaDG"   name="SoluongSV" maxlength="2" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="<?php echo implode(" ",$SoluongSV[$i]) ?>" readonly>
                  </div>
                 
                </div>  

                  <div class='modal-body'>Lĩnh vực nghiên cứu
                  <div class="form-group">
                  <select class="custom-select" name="MaLVNC" readonly>
                    <option value="<?php echo $MaLVNCi ?>">
                        <?php  echo implode(" ",$TenLVNC[0]); ?>
            </option>
                <?php
                  $MaLVNCA=$DB->getlist("SELECT MaLVNC FROM linhvucnghiencuu ");
                  $TenLVNCA=$DB->getlist("SELECT TenLVNC FROM linhvucnghiencuu ");
                  
                  $mn=count($MaLVNCA);
                  
                  for($ki=0;$ki<$mn;$ki++)
                  {
                  ?>
                      <option value="<?php echo implode(" ",$MaLVNCA[$ki]); ?>">
                        <?php  echo implode(" ",$TenLVNCA[$ki]); ?>
                      </option>
                      <?php
                  }
                  
                ?>
          </select>
                  </div>
                 
                </div>  
              
        
                <div class='modal-footer'>

                <button class='btn btn-secondary'type='button' data-dismiss='modal'>Ok</button>
               
                </div>
                 </form>
              </div>     
       </div>
      </div>

  <?php
}
echo $data;    
 ?>     