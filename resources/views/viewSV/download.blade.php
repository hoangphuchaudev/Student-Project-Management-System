<?php 
include('../cauhinh/Busines.php');
$DB=new xuly();

if(!empty($_GET['file']))
{
$a=$_GET['file'];
$TenTL=$DB->getlist("SELECT FileTL FROM tailieuthamkhao WHERE MaTL='$a'");
$t=implode(" ",$TenTL[0]);
echo $t."<br>";	
	$filename =	 basename($t);
	$filepath = '../fil/'.$filename;
	echo $filepath;
	if(!empty($filename) && file_exists($filepath)){

//Define Headers
		header("Cache-Control: public");
		header("Content-Description: FIle Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/zip");
		header("Content-Transfer-Emcoding: binary");

		readfile($filepath);
		exit;

	}
	else{
		echo "This File Does not exist.";
	}
}

?>