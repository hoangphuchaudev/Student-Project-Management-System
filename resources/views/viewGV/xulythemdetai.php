<?php 
include('../cauhinh/Busines.php');
$DB=new xuly();

if(isset($_POST['saveButton'])&&$_POST['TenDT']!="")
{

       
       $a=array('TenDT' =>$_POST['TenDT'],'SoluongSV' =>$_POST['SoluongSV'],'MaLVNC' =>$_POST['MaLVNC'],'MaDA' =>$_POST['MaDA'],'MaHK' =>$_POST['MaHK'],'MaGV' =>$_POST['MaGV']);
        $k=$DB->insertDB($a,"detai");
        if($k){
                echo "<script> alert('Thêm thành công!')</script>";
                 echo "<script>window.location='index.php'; </script>";
              

       
            }
            else{
                echo "<script>alert('Thêm thất bại');</script>";
            }
}
else
{
echo "<script> alert('Bạn chưa nhập đủ thông tin!')</script>";
echo "<script>window.location='index.php'; </script>";
}


?>