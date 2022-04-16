<?php 
include('../cauhinh/Busines.php');
$DB = new xuly();
// error_reporting(0);
if((isset($_POST['saveButton']))&&(($_POST['MaLVNC'])!=""))
{
     $MaDT=$_GET['MaDT'];


        $a=array("TenDT"=>$_POST['TenDT'],"SoluongSV"=>$_POST['SoluongSV'],"MaLVNC"=>$_POST['MaLVNC']);
        
       

        $a=$DB->updateDB("detai",$a,"MaDT='$MaDT'");
        if($a)
        {
            echo "<script> alert('Cập nhật thành công!')</script>";
            echo "<script>window.location='index.php'; </script>";;

        }
        else
        {
            echo "<script> alert('Cập nhật không thành công!')</script>";
            echo "<script>window.location='index.php'; </script>";
        }
}
else
{
echo "<script> alert('Bạn chưa thêm file!')</script>";
echo "<script>window.location='index.php'; </script>";
}


?>