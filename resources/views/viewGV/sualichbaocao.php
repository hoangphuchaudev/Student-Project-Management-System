<?php 
include('../cauhinh/Busines.php');
$DB=new xuly();

if(isset($_POST['saveButton'])&&$_POST['NoidungLBC']!="")
{


	$MaDA=$_POST['MaDA'];
    $MaGVi=$_POST['MaGV'];
     $MaLBC=$_POST['MaLBC'];
     
    $ab=explode(' ', $MaLBC );
    $n=count($ab);
    
    for($i=0;$i<$n-1;$i++)
    {
        
        
    $a=array('NoidungLBC' =>$_POST['NoidungLBC'],'NgayBC'=>$_POST['NgayBC'],'MaPhong' =>$_POST['MaPhong']);
    $k=$DB->updateDB("lichbaocao",$a,"MaLBC='$ab[$i]'");	
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