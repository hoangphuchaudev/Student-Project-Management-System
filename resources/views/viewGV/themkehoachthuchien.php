<?php 
include('../cauhinh/Busines.php');
$DB=new xuly();

if(isset($_POST['saveButton']))
{
    var_export($_POST);
	$MaDT=$_POST['MaDT'];
    $MaDA=$_POST['MaDA'];
     $a=array('MaDT' =>$MaDT,'Noidungthuchien' =>$_POST['Noidungthuchien'],'NgayBD' =>$_POST['NgayBD'],'NgayKT' =>$_POST['NgayKT']);
    $k=$DB->insertDB($a,"kehoachthuchien");	
    
        if($k){
                echo "<script> alert('Thêm thành công!')</script>";
                 echo "<script>
                 var a='".$MaDA."';
                 window.location='theodoitiendo.php?doan='+a; </script>";
              

       
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