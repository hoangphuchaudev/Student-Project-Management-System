<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
// session_start();
// error_reporting(0);
use App\Classes\xuly;


class LichbaocaoController extends Controller{


//insert, update
	public function action_LBC(Request $request){
		$MaGV = GVController::getMaGV();
		$MaHK = DetaiController::getMaHocKy_now();
		if($request->ajax())
		{
			if($request->type == 'add_dotxuat')
			{

				$data = array();
				$MaDA = $request->MaDA;
				$MaDT = DB::table('detai')->where('MaDA',$MaDA)->where('MaHK',$MaHK)->where('MaGV',$MaGV)->get('MaDT');
				for($i=0;$i<count($MaDT);$i++){
					$data['NoidungLBC'] = $request->NoidungLBC;
					$data['NgayBC'] = $request->NgayBC;
					$data['MaPhong'] = $request->MaPhong;
					$data['MaGV'] = $MaGV;
					$data['Kt'] = '1';
					$data['MaDT'] = $MaDT[$i]->MaDT;
					$result = DB::table('lichbaocao')->insert($data);

				}
				return response()->json($data);
			}

			if($request->type == 'update')
			{
				$Kt = $request->Kt;
				$MaLBC = $request->id;
				$data = array();
				$data['NoidungLBC'] = $request->NoidungLBC;
				$data['NgayBC'] = $request->NgayBC;
				$data['MaPhong'] = $request->MaPhong;
				for($i=0;$i<count($MaLBC);$i++){
					$result = DB::table('lichbaocao')->where('MaLBC',$MaLBC[$i])->update($data);
				}	
				return response()->json($data);
			}

		if($request->type == 'delete')
		{
				$MaLBC = $request->id;
				$result = array();
				for($i = 0; $i < count($MaLBC); $i++){
					$result = DB::table('lichbaocao')->where('MaLBC',$MaLBC[$i])->delete();

				}
				if($result)
					return response()->json($result);


		}

		if($request->type == 'add_all')
		{
			$data = array();
			$ThoigianBDHK = DB::table('hocky')->where('MaHK',$MaHK)->first();
			$dayLBC = LichbaocaoController::getday($ThoigianBDHK->ThoigianBDHK,$request->MaThu);
			$MaDA = $request->MaDA;
			$MaDT = DB::table('detai')->where('MaDA',$MaDA)->where('MaHK',$MaHK)->where('MaGV',$MaGV)->get('MaDT');
			for($i=0;$i<count($MaDT);$i++){
				$NgayBC = $dayLBC;
				for($j=0;$j<14;$j++){
					$NgayBC = date('Y-m-d',strtotime($NgayBC. '+ 7 days'));
					$data['NoidungLBC'] = $request->NoidungLBC;
					$data['NgayBC'] = $NgayBC;
					$data['MaPhong'] = $request->MaPhong;
					$data['MaGV'] = $MaGV;
					$data['Kt'] = 0;
					$data['MaDT'] = $MaDT[$i]->MaDT;
					$result = DB::table('lichbaocao')->insert($data);
				} 				
			}
			return response()->json($data);
		}
	}
}
//getdata
public function getdata_LBC(Request $request){
	$MaGV = GVController::getMaGV();
	$MaDA = $request->MaDA;
	if($MaGV){
		$all = DB::table('lichbaocao')->where('lichbaocao.MaGV',$MaGV)->where('detai.MaDA',$MaDA)->join('phong','phong.MaPhong','=','lichbaocao.maphong')->join('detai','detai.MaDT','=','lichbaocao.MaDT')->groupBy('NgayBC')->get();
			// $data_MaDT = DB::table('lichbaocao')->where('lichbaocao.MaGV',$MaGV)->where('detai.MaDA',$MaDA)->join('phong','phong.MaPhong','=','lichbaocao.maphong')->join('detai','detai.MaDT','=','lichbaocao.MaDT')->groupBy('lichbaocao.MaDT')->get();
			// $MaDT = "";
			// for ($k=0; $k<count($data_MaDT);$k++){
			// 	$MaDT.= $data_MaDT[$k]->MaDT."  ";
			// }
		for($i = 0; $i < count($all); $i++){
			if($all[$i]->Kt == '1'){
				$data_MaLBC = DB::table('lichbaocao')->where('NgayBC',$all[$i]->NgayBC)->where('lichbaocao.MaGV',$MaGV)->where('detai.MaDA',$MaDA)->join('detai','detai.MaDT','=','lichbaocao.MaDT')->get('MaLBC');
				$MaLBC = array();
				for($j=0;$j<count($data_MaLBC);$j++){
					$MaLBC[$j] = $data_MaLBC[$j]->MaLBC;
				}
				$all[$i]->MaLBC = $MaLBC;	
				$all[$i]->title = "Nội dung: ".$all[$i]->NoidungLBC."\nPhòng: ".$all[$i]->tenphong."\nĐột xuất";
				$all[$i]->start = $all[$i]->NgayBC;
				$all[$i]->color = '#4E73DF';
			}
			else{
				$data_MaLBC = DB::table('lichbaocao')->where('NgayBC',$all[$i]->NgayBC)->where('lichbaocao.MaGV',$MaGV)->where('detai.MaDA',$MaDA)->join('detai','detai.MaDT','=','lichbaocao.MaDT')->get('MaLBC');
				$MaLBC = array();
				for($j=0;$j<count($data_MaLBC);$j++){
					$MaLBC[$j] = $data_MaLBC[$j]->MaLBC;
				}
				$all[$i]->MaLBC = $MaLBC;	
				$all[$i]->title = "Nội dung: ".$all[$i]->NoidungLBC."\nPhòng: ".$all[$i]->tenphong."\nMặc định";
				$all[$i]->start = $all[$i]->NgayBC;
				$all[$i]->color = '#4FB748';
					// dd($all);
			}

		}

		return response()->json($all);
	}

}
public function getKHTH($MaDT){

	$HK = DB::table('detai')->where('MaDT',$MaDT)->join('hocky','detai.MaHK','=','hocky.MaHK')->first();
	$KHTH = DB::table('kehoachthuchien')->where('MaDT',$MaDT)->first();
	$NoidungTH="";
	$kt = LichbaocaoController::checkdayLBC($KHTH->NgayBD,$HK->ThoigianBDHK);
	if ($kt==3 or $kt==2) {

		$NoidungTH="Tuần này không có kế hoạch nào";
	} 
	else
	{


		$NoidungTH=substr(implode(" ",($DB->getlist("SELECT Noidungthuchien FROM kehoachthuchien WHERE NgayBD='$NgayBD' AND MaDT='$MaDT'"))[0]),0,70)."...";

	}

	if($NoidungTH=="")
	{
		$NoidungTH="Không có kế hoạch";
	}
	else
	{

	}
	return $NoidungTH;

}
public static function getTenphong_MaPhong($MaPhong){
	$all = DB::table('phong')->where('maphong',$MaPhong)->value('tenphong');
	return $all;
}
public static function getPhong(){
	$all = DB::table('phong')->get();
	return $all;
}
public static function getTenGV_MaGV($MaGV){
	$all = DB::table('gvhd')->where('MaGV',$MaGV)->value('HotenGV');
	return $all;
}

//view
public function lichbaocao($MaDT){
	$MaDA = DetaiController::getMaDA_MaDT($MaDT);
	$TenDA = DB::table('doan')->where('MaDA',$MaDA)->value('TenDA');
	$LBC = DB::table('lichbaocao')->where('MaDT',$MaDT)->get();
	$MaHK = DetaiController::getMaHocKy_now();
	$ThoigianBDHK = DB::table('hocky')->where('MaHK',$MaHK)->first();

	return view('viewSV/lichbaocao',compact('MaDT','MaDA','TenDA','LBC','ThoigianBDHK'));
}
public function qllichbaocao($MaDA){
	$TenDA = DB::table('doan')->where('MaDA',$MaDA)->value('TenDA');
	return view('viewGV/lichbaocao',compact('TenDA','MaDA'));
}

//func

public static function checkdayLBC($NgayBC,$dayBDHK){
	$now = date('Y-m-d');
	$dayonweek = LichbaocaoController::checkdayinweek($dayBDHK,$now);
	$BC=strtotime($NgayBC);

			//Ngay hien tai
	if($BC==strtotime($now)){
		return 0;

	}
			//Ngay trong tuan
	else if($BC>=strtotime($dayonweek[1]) && $BC<=strtotime($dayonweek[2])){
		return 1;
	}
				//Ngay tuan sau
	else if($BC>strtotime($dayonweek[2])){
		return 2;

	}
					//
	else{
		return 3;
	}	

}

public static function checkdayinweek($dayBDHK,$day){
	$NgayBDTuan = $dayBDHK;
	$BD="";
	$KT="";
	$a=array();
	$day=strtotime($day);
	$NgayBDTuan=date('Y-m-d',strtotime('- 7 day' ,strtotime($NgayBDTuan)));
	for($i=0;$i<100;$i++){
		$NgayBDTuan=date('Y-m-d',strtotime('+ 7 day' ,strtotime($NgayBDTuan)));
		$NgayKTTuan=date('Y-m-d',strtotime('+ 6 day' ,strtotime($NgayBDTuan)));
		$x=strtotime($NgayBDTuan);
		$y=strtotime($NgayKTTuan);
		if($day>=$x && $day<=$y){
			$BD=$NgayBDTuan;
			$KT=$NgayKTTuan;

		}

	}
	$a[1]=$BD;
	$a[2]=$KT;
	return $a;
}
public static function getday($dayBDHK,$options){
	$NgayBDTuan = $dayBDHK;
	$NgayBDTuan=date('Y-m-d', strtotime($NgayBDTuan. ' + 7 days'));
	switch($options){
		case 1: 
		$NgayBDTuan=$NgayBDTuan;
		break;
		case 2:
		$NgayBDTuan=date('Y-m-d', strtotime($NgayBDTuan. ' + 1 days'));
		break;
		case 3:
		$NgayBDTuan=date('Y-m-d', strtotime($NgayBDTuan. ' + 2 days'));
		break;
		case 4:
		$NgayBDTuan=date('Y-m-d', strtotime($NgayBDTuan. ' + 3 days'));
		break;
		case 5:
		$NgayBDTuan=date('Y-m-d', strtotime($NgayBDTuan. ' + 4 days'));
		break;
		case 6:
		$NgayBDTuan=date('Y-m-d', strtotime($NgayBDTuan. ' + 5 days'));
		break;
		case 7:
		$NgayBDTuan=date('Y-m-d', strtotime($NgayBDTuan. ' + 6 days'));
		break;
		default:
		$NgayBDTuan=$NgayBDTuan;

	}
	return $NgayBDTuan;
}

}
