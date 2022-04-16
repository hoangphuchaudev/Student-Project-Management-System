<?php 
include('../cauhinh/Busines.php');
$DB=new xuly();

if(isset($_POST['saveButton'])&&$_POST['NoidungLBC']!="")
{
	$MaDA=$_POST['MaDA'];
     $MaDT=$DB->getlist("SELECT MaDT FROM detai WHERE MaDA='$MaDA'");
     $n=count($MaDT);
    for($i=0;$i<$n;$i++)
    {
    $a=array('NoidungLBC' =>$_POST['NoidungLBC'],'NgayBC' =>$_POST['NgayBC'],'MaPhong' =>$_POST['MaPhong'],'MaDT' =>implode(" ",$MaDT[$i]),'MaGV' =>$_POST['MaGV']);
    $k=$DB->insertDB($a,"lichbaocao");	
    }
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