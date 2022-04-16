<?php 
include('../cauhinh/Busines.php');
$DB = new xuly();
// error_reporting(0);
if((isset($_GET['MaDT'])))
{
    echo "<script>
                    var MaDT='".$_GET['MaDT']."';
                  var result = confirm('Bạn có muốn xóa đề tài này?');
                  if (result == true) {
                   alert('Đồng ý');
                   window.location='xulyxoadetai.php?MaDT='+MaDT; 
                   


              } else {
                   alert('Bạn không xóa');
                    window.location='index.php';
                }
              
     </script>";
}
else
{
echo "<script> alert('Bạn chưa thêm file!')</script>";
echo "<script>window.location='index.php'; </script>";
}


?>