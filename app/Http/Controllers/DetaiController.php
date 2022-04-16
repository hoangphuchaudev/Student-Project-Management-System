<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
// error_reporting(0);
// use App\Classes\xuly;


class DetaiController extends Controller{

//insert,update,delete
	public function dangkyDT($MaDT,$MaSV){
		$data=array("MaDT"=>$MaDT,"MaSV"=>$MaSV);
		$a=DB::table('dangkidetai')->insert($data);
		if($a){
			echo "<script> alert('Đăng ký thành công!')</script>";
			return Redirect::to('/sinhvien');

		}
		else{
			echo "<script>alert('Đăng ký thất bai');</script>";
		}

	}
	public function dangkyDX(Request $request){
		$data = array();
		$data['TenDT'] = $request->Tendetai;
		$data['MaLVNC'] = $request->MaLVNC;
		$data['MaDA'] = $request->MaDA;
		$data['MaHK'] = $request->MaHK;
		$data['MaGV'] = $request->MaGV;
		$data['MaSV'] = SinhVienController::getMaSV();
		$data['SoluongSV'] = $request->SoluongSV;
		DB::table('dexuatdetai')->insert($data);
		return Redirect::to('/dangkydetai'.'/'.$request->MaDA);
	}
	public function updateDT(Request $request){
		$data = array();
		$data['TenDT'] = $request->TenDT;
		$data['MaLVNC'] = $request->MaLVNC;
		$data['SoluongSV'] = $request->SoluongSV;
		$data['NgayBD'] = $request->NgayBD; 
		$data['NgayKT'] = $request->NgayKT; 
		$result =	DB::table('detai')->where('MaDT',$request->MaDT)->update($data);
		if($result) {
			return response()->json([
				'message' => "Data Inserted Successfully",
				"code"    => 200,

			]);
		} else  {
			return response()->json([
				'message' => "Internal Server Error",
				"code"    => 500
			]);
		}
	}
	public function insertDT($MaDA,Request $request){
		$data = array();
		$data['TenDT'] = $request->TenDT;
		$data['MaLVNC'] = $request->MaLVNC;
		$data['MaDA'] = $MaDA;
		$data['MaHK'] = DetaiController::getMaHocKy_now();
		$data['MaGV'] = GVController::getMaGV();
		$data['SoluongSV'] = $request->SoluongSV;
		$data['NgayBD'] = $request->NgayBD; 
		$data['NgayKT'] = $request->NgayKT; 
		DB::table('detai')->insert($data);
		if($request) {
			return response()->json([
				'message' => "Data Inserted Successfully",
				"code"    => 200,
				"data"		=> $data
			]);
		} else  {
			return response()->json([
				'message' => "Internal Server Error",
				"code"    => 500
			]);
		}
	}
	public function deleteDT(Request $request){
		$data = array();
		$data['MaDT'] = $request->MaDT;
		$result = DB::table('detai')->where('MaDT', $request->MaDT)->delete();
		if($result) {
			return response()->json([
				'message' => "Data Inserted Successfully",
				"code"    => 200,
				"data"		=> $request->all()
			]);
		} else  {
			return response()->json([
				'message' => "Internal Server Error",
				"code"    => 500
			]);
		}
	}
	public function insertDX(Request $request){
		$data = array();
		$all = DB::table('dexuatdetai')->where('id',$request->id)->first();
		$data['TenDT'] = $all->TenDT;
		$data['MaLVNC'] = $all->MaLVNC;
		$data['MaDA'] = $all->MaDA;
		$data['MaHK'] = DetaiController::getMaHocKy_now();
		$data['MaGV'] = GVController::getMaGV();
		$data['SoluongSV'] = $all->SoluongSV;
		$result = DB::table('detai')->insert($data);
		$delete = DB::table('dexuatdetai')->where('id',$request->id)->delete();
		if($result) {
			return response()->json([
				'message' => "Data Inserted Successfully",
				"code"    => 200,
              	// "data"		=> $all
			]);
		} else  {
			return response()->json([
				'message' => "Internal Server Error",
				"code"    => 500
			]);
		}
	}
	public function deleteDX(Request $request){
		$delete = DB::table('dexuatdetai')->where('id',$request->id)->delete();
		if($delete) {
			return response()->json([
				'message' => "Data Inserted Successfully",
				"code"    => 200,
              	// "data"		=> $all
			]);
		} else  {
			return response()->json([
				'message' => "Internal Server Error",
				"code"    => 500
			]);
		}
	}
	public function action_chamdiem(Request $request){

		if($request->ajax())
		{
			if($request->type == 'insert')
			{
				$data = array();
				if($request->Diem==''||$request->Diem==0){
					$data['Diem'] = 0.0;
				}
				else{
					$data['Diem'] = $request->Diem;
				}
				$data['MaSV'] = $request->MaSV;
				$data['MaDT'] = $request->MaDT;
				
				$a = DB::table('diem')->insert($data); 	
				if($a) {
					return response()->json([
						'message' => "Data Inserted Successfully",
						"code"    => 200,
						"data"		=> $data
					]);
				} else  {
					return response()->json([
						'message' => "Internal Server Error",
						"code"    => 500
					]);
				}
			}
			else 
			if($request->type == 'update')
			{
				$data = array();
				if($request->Diem==''||$request->Diem==0){
					$data['Diem'] = 0.0;
				}
				else{
					$data['Diem'] = $request->Diem;
				}
				$data['MaSV'] = $request->MaSV;
				$data['MaDT'] = $request->MaDT;
				
				$a = DB::table('diem')->where('MaD',$request->MaD)->update($data); 	
				if($a) {
					return response()->json([
						'message' => "Data Inserted Successfully",
						"code"    => 200,
						"data"		=> $data
					]);
				} else  {
					return response()->json([
						'message' => "Internal Server Error",
						"code"    => 500
					]);
				}
			}
		}
	}
//getdata
	public static function getTenDT_MaDT($MaDT){
		$all=DB::table('detai')->where('MaDT',$MaDT)->value('TenDT');
		return $all;
	}
	public static function getTenDA_MaDA($MaDA){
		$all=DB::table('doan')->where('MaDA',$MaDA)->value('TenDA');
		return $all;
	}
	public static function getTenLVNC_MaLVNC($MaLVNC){
		$all = DB::table('linhvucnghiencuu')->where('MaLVNC',$MaLVNC)->value('TenLVNC');
		return $all;
	}	
	public static function getallLVNC(){
		$all=DB::table('linhvucnghiencuu')->get();
		return $all;
	}
	public static function getallGV(){
		$all=DB::table('gvhd')->get();
		return $all;
	}
	public function getallDT($MaDA){
		$MaSV=SinhVienController::getMaSV();
		$MaHKnow=DetaiController::getMaHocKy_now();
		$MaGV=DetaiController::getMaGV_MaDA($MaDA);
		$all=DB::table('detai')->where('MaHK',$MaHKnow)->where('MaDA',$MaDA)->where('MaGV',$MaGV)->orderBy('MaDT','ASC')->get();
		try{

			return $all;
		} 
		catch (Exception $e){    

			return " ";
		}
	}
	public static function getMaHocKy_now(){

		$all = DB::table('hocky')->get();
		$now=date('Y-m-d');
		$n=sizeof($all);
		$found = 0;
		for($i=0;$i<$n;$i++){


			if((strtotime($now)>=(strtotime($all[$i]->ThoigianBDHK))&&(strtotime($now)<=(strtotime($all[$i]->ThoigianKTHK))))&&$found==0){
				$MaHKnow=$all[$i]->MaHK;
				$found++;
			}
			else
				if($found > 1){
					break;
				}
			}

			if(	$found == 0){
				$max = DB::table('hocky')->max('MaHK');
				$MaHKnow =$max;
			}

			return $MaHKnow;
		}
		public static function getMaDA_MaDT($MaDT){
			$all= DB::table('detai')->where('MaDT',$MaDT)->value('MaDA');
			return $all;
		}
		public static function getMaGV_MaDA($MaDA){
			$MaSV=SinhVienController::getMaSV();
			$MaHKnow=DetaiController::getMaHocKy_now();
			$all=DB::table('dangkidoan')->where('MaDA',$MaDA)->where('MaSV',$MaSV)->where('MaHK',$MaHKnow)->value('MaGV');
			return $all;

		}

		public static function getDT($MaDA){
			$MaSV=SinhVienController::getMaSV();
			$MaHK=DetaiController::getMaHocKy_now();
			try{
				$all= DB::table('detai')->where('detai.MaDA',$MaDA)->where('dangkidetai.MaSV',$MaSV)->where('MaHK',$MaHK)->join('dangkidetai','detai.MaDT','=','dangkidetai.MaDT')->first();
				return $all;
			} catch(Exception $e){
				return " ";

			}


		}

		public static function getallHK(){
			$all = DB::table('hocky')->get();
			return $all;
		}
		public static function getdata_quanlydetai($MaDA){
			$MaGV = GVController::getMaGV();
			$MaHK = DetaiController::getMaHocKy_now();
			$all = DB::table('detai')->where('detai.MaDA',$MaDA)->where('detai.MaGV',$MaGV)->where('detai.MaHK',$MaHK)->select('detai.MaDT','TenDT','SoluongSV','linhvucnghiencuu.TenLVNC','doan.TenDA','detai.NgayBD','detai.NgayKT')->join('linhvucnghiencuu','detai.MaLVNC','=','linhvucnghiencuu.MaLVNC')->join('gvhd','gvhd.MaGV','=','detai.MaGV')->join('doan','doan.MaDA','=','detai.MaDA')->orderBy('detai.MaDT','DESC')->get();
			for($i=0;$i<count($all);$i++){
				$teample= DB::table('dangkidetai')->where('MaDT',$all[$i]->MaDT)->count('MaSV');
				$sinhvienthuchien = DB::table('dangkidetai')->where('MaDT',$all[$i]->MaDT)->select('HotenSV')->join('sinhvien','sinhvien.MaSV','=','dangkidetai.MaSV')->get();

				$all[$i]->sinhvienthuchien = $sinhvienthuchien;
				$all[$i]->soluong = $teample;
				$all[$i]->STT=$i+1;
			}


			if($all){
				return response()->json([
					'message' => "Data Found",
					"code"    => 200,
					"data"  => $all         

				]);
			}
			else{
				return response()->json([
					'message' => "Internal Server Error",
					"code"    => 500
				]);
			}

		}

		public static function getdata_quanlydetai_MaHK($MaHK,$MaDA){
			$MaGV = GVController::getMaGV();
		// $MaHK = DetaiController::getMaHocKy_now();
			$all = DB::table('detai')->where('detai.MaDA',$MaDA)->where('detai.MaGV',$MaGV)->where('detai.MaHK',$MaHK)->select('detai.MaDT','TenDT','SoluongSV','linhvucnghiencuu.TenLVNC','doan.TenDA','detai.NgayBD','detai.NgayKT')->join('linhvucnghiencuu','detai.MaLVNC','=','linhvucnghiencuu.MaLVNC')->join('gvhd','gvhd.MaGV','=','detai.MaGV')->join('doan','doan.MaDA','=','detai.MaDA')->orderBy('detai.MaDT','DESC')->get();
			for($i=0;$i<count($all);$i++){
				$teample= DB::table('dangkidetai')->where('MaDT',$all[$i]->MaDT)->count('MaSV');
				$sinhvienthuchien = DB::table('dangkidetai')->where('MaDT',$all[$i]->MaDT)->select('HotenSV')->join('sinhvien','sinhvien.MaSV','=','dangkidetai.MaSV')->get();
				$all[$i]->sinhvienthuchien = $sinhvienthuchien;
				$all[$i]->soluong = $teample;
				$all[$i]->STT=$i+1;
			}
			if($all){
				return response()->json([
					'message' => "Data Found",
					"code"    => 200,
					"data"  => $all         

				]);
			}
			else{
				return response()->json([
					'message' => "Internal Server Error",
					"code"    => 500
				]);
			}

		}
		public static function getdata_quanlydetai_editmodal(Request $request){
			$MaGV = GVController::getMaGV();
			$MaDA = $request->MaDA;
			$MaDT = $request->id;
			$MaHK =  $request->MaHK;
			$all = DB::table('detai')->where('MaDT',$MaDT)->where('detai.MaDA',$MaDA)->where('detai.MaGV',$MaGV)->where('detai.MaHK',$MaHK)->select('detai.MaDA','detai.MaDT','TenDT','SoluongSV','linhvucnghiencuu.TenLVNC','doan.TenDA','detai.MaLVNC','detai.NgayBD','detai.NgayKT')->join('linhvucnghiencuu','detai.MaLVNC','=','linhvucnghiencuu.MaLVNC')->join('gvhd','gvhd.MaGV','=','detai.MaGV')->join('doan','doan.MaDA','=','detai.MaDA')->get();
			for($i=0;$i<count($all);$i++){
				$teample= DB::table('dangkidetai')->where('MaDT',$all[$i]->MaDT)->count('MaSV');
				$all[$i]->soluong = $teample;
				$all[$i]->STT=$i+1;
			}
			if($all){
				return response()->json([
					'message' => "Data Found",
					"code"    => 200,
					"data"  => $all         

				]);
			}
			else{
				return response()->json([
					'message' => "Internal Server Error",
					"code"    => 500
				]);
			}
		}
		public static function getdata_quanlydetai_dexuatdetai(Request $request){
			$MaGV = GVController::getMaGV();
			$MaDA = $request->MaDA;
			$MaHK = DetaiController::getMaHocKy_now();
			$all = DB::table('dexuatdetai')->where('dexuatdetai.MaDA',$MaDA)->where('dexuatdetai.MaGV',$MaGV)->where('dexuatdetai.MaHK',$MaHK)->select('sinhvien.HotenSV','id','TenDT','SoluongSV','linhvucnghiencuu.TenLVNC','doan.TenDA','dexuatdetai.MaLVNC')->join('linhvucnghiencuu','dexuatdetai.MaLVNC','=','linhvucnghiencuu.MaLVNC')->join('gvhd','gvhd.MaGV','=','dexuatdetai.MaGV')->join('doan','doan.MaDA','=','dexuatdetai.MaDA')->join('sinhvien','sinhvien.MaSV','=','dexuatdetai.MaSV')->get();
			for($i=0;$i<count($all);$i++){
				$all[$i]->STT=$i+1;
			}
			if($all){
				return response()->json([
					'message' => "Data Found",
					"code"    => 200,
					"data"  => $all         

				]);
			}
			else{
				return response()->json([
					'message' => "Internal Server Error",
					"code"    => 500
				]);
			}
		}
		public function getdata_quanlysinhvien(Request $request){
			$MaGV = GVController::getMaGV();
			$all = DB::table('sinhvien')->where('MaHK',DetaiController::getMaHocKy_now())->where('dangkidoan.MaDA',$request->MaDA)->where('dangkidoan.MaGV',$MaGV)->join('dangkidoan','dangkidoan.MaSV','=','sinhvien.MaSV')->join('gvhd','gvhd.MaGV','=','dangkidoan.MaGV')->join('lop','lop.Malop','=','sinhvien.Malop')->get();
			for($i=0;$i<count($all);$i++){
				$count = DB::table('dangkidetai')->where('MaSV',$all[$i]->MaSV)->where('detai.MaDA',$request->MaDA)->where('detai.MaHK',DetaiController::getMaHocKy_now())->join('detai','detai.MaDT','=','dangkidetai.MaDT')->count('MaDK');
				if($count>0){
					$TenDT = DB::table('dangkidetai')->where('MaSV',$all[$i]->MaSV)->where('detai.MaDA',$request->MaDA)->where('detai.MaHK',DetaiController::getMaHocKy_now())->join('detai','detai.MaDT','=','dangkidetai.MaDT')->first();
					$all[$i]->TenDT = $TenDT->TenDT;
				}
				else{
					$all[$i]->TenDT = 'Chưa đăng ký đề tài';
				}
			}
			if($all){
				return response()->json([
					'message' => "Data Found",
					"code"    => 200,
					"data"  => $all         

				]);
			}
			else{
				return response()->json([
					'message' => "Internal Server Error",
					"code"    => 500
				]);
			}

		}
		public function getdata_chamdiem(Request $request){
			$request->MaDA = 1;
			$MaGV = GVController::getMaGV();
			$all = DB::table('sinhvien')->where('MaHK',DetaiController::getMaHocKy_now())->where('dangkidoan.MaDA',$request->MaDA)->where('dangkidoan.MaGV',$MaGV)->join('dangkidoan','dangkidoan.MaSV','=','sinhvien.MaSV')->join('gvhd','gvhd.MaGV','=','dangkidoan.MaGV')->join('lop','lop.Malop','=','sinhvien.Malop')->get();
			for($i=0;$i<count($all);$i++){
				$count = DB::table('dangkidetai')->where('MaSV',$all[$i]->MaSV)->where('detai.MaDA',$request->MaDA)->where('detai.MaHK',DetaiController::getMaHocKy_now())->join('detai','detai.MaDT','=','dangkidetai.MaDT')->count('MaDK');
				if($count>0){
					$TenDT = DB::table('dangkidetai')->where('MaSV',$all[$i]->MaSV)->where('detai.MaDA',$request->MaDA)->where('detai.MaHK',DetaiController::getMaHocKy_now())->join('detai','detai.MaDT','=','dangkidetai.MaDT')->first();
					$countdiem = DB::table('diem')->where('MaSV',$all[$i]->MaSV)->where('MaDT',$TenDT->MaDT)->count('MaD');
					if($countdiem>0){
						$Diem = DB::table('diem')->where('MaSV',$all[$i]->MaSV)->where('MaDT',$TenDT->MaDT)->first();
						$all[$i]->Diem = $Diem->Diem;
						$all[$i]->Diemchu = DetaiController::getDiemchu($Diem->Diem);
						$all[$i]->MaDiem = $Diem->MaD;
					}
					else{
						$all[$i]->Diem ='Chưa chấm';
						$all[$i]->Diemchu ='Chưa chấm';
						$all[$i]->MaDiem ='';
					}					
					$all[$i]->TenDT = $TenDT->TenDT;
					$all[$i]->MaDT = $TenDT->MaDT;
				// $all[$i]->Diem = '';
				// $all[$i]->Diemchu = '';
				}
				else{
					$all[$i]->MaDT = '';
					$all[$i]->TenDT = 'Chưa đăng ký đề tài';
					$all[$i]->Diem = '';
					$all[$i]->Diemchu = '';
					$all[$i]->MaDiem ='';
				}
			}
			if($all){
				return response()->json([
					'message' => "Data Found",
					"code"    => 200,
					"data"  => $all         

				]);
			}
			else{
				return response()->json([
					'message' => "Internal Server Error",
					"code"    => 500
				]);
			}
		}

//view
		public function index($MaDA){
			$MaGV = DetaiController::getMaGV_MaDA($MaDA);
			$TenGV = DB::table('gvhd')->where('MaGV',$MaGV)->first('HotenGV')->HotenGV;
			return view('viewSV.dangkydetai',compact('MaDA','MaGV','TenGV'));
		}
		public function doan($MaDA){
			$TenDA = DB::table('doan')->where('MaDA',$MaDA)->value('TenDA');
			return view('viewSV.doan',compact('MaDA','TenDA'));
		}
		public function qldoan($MaDA){
			$TenDA = DB::table('doan')->where('MaDA',$MaDA)->value('TenDA');
			return view('viewGV.doan',compact('MaDA','TenDA'));
		}
		public function qldetai($MaDA){
			$TenDA = DB::table('doan')->where('MaDA',$MaDA)->value('TenDA');
			$MaHK = DetaiController::getMaHocKy_now();
			$MaGV = GVController::getMaGV();
			$Soluong = DB::table('detai')->where('MaGV',$MaGV)->where('MaDA',$MaDA)->where('MaHK',$MaHK)->count('MaDT');
			$TongsoluongDT = DB::table('detai')->where('MaGV',$MaGV)->where('MaDA',$MaDA)->count('MaDT');
			$SoluongDX = DB::table('dexuatdetai')->where('MaGV',$MaGV)->where('MaDA',$MaDA)->where('MaHK',$MaHK)->count('id');
			$Hocky = DB::table('hocky')->where('MaHK',$MaHK)->first();
			$SoluongSVDK = DB::table('dangkidetai')->where('MaGV',$MaGV)->where('MaDA',$MaDA)->where('MaHK',$MaHK)->join('detai','detai.MaDT','=','dangkidetai.MaDT')->distinct()->count('dangkidetai.MaDT');
			return view('viewGV.quanlydetai',compact('MaDA','TenDA','Soluong','Hocky','SoluongDX','TongsoluongDT','SoluongSVDK'));
		}
		public function quanlysinhvien($MaDA){
			$TenDA = DetaiController::getTenDA_MaDA($MaDA);
			return view('viewGV.quanlysinhvien',compact('MaDA','TenDA'));
		}
		public function getdata($MaDA){

			$kt = DetaiController::checkDKDT($MaDA);
			$MaSV=SinhVienController::getMaSV();


			$temple="";
			if($kt==false){
				$temple = "<input type='hidden' id='soluong' value='".DetaiController::checksoluongSV()."'>";
				$temple .= "<input type='hidden' id='soluong2' value='".DetaiController::checksoluongSV()."'>";
				$temple .= "<thead >
				<tr>
				<th>STT</th>
				<th>Tên đề tài</th>
				<th>Giảng viên</th>
				<th>Đồ án</th>
				<th>Lĩnh vực nghiên cứu</th>
				<th>Sĩ số</th>
				<th style='text-align: center;'>Đăng ký</th>
				<th></th>

				</tr>
				</thead>";

				$all=DetaiController::getallDT($MaDA);
				$n=count($all);

				for($i=0;$i<$n;$i++){
					$MaGV=$all[$i]->MaGV;
					$TenGV=DB::table("gvhd")->where('MaGV',$MaGV)->first();
					$TenLVNC=DB::table("linhvucnghiencuu")->where('MaLVNC',$all[$i]->MaLVNC)->first();

					$TenDA=DB::table("doan")->where('MaDA',$all[$i]->MaDA)->first();
					$temple=$temple ."<tbody>";
					$dem = DB::table("dangkidetai")->where('MaDT',$all[$i]->MaDT)->get()->count('MaSV');

					$kk=round($dem*100/$all[$i]->SoluongSV)."";



					$temple=$temple ."<tr>
					<td>" .($i+1) ."</td>
					<td style='max-width: 400px'>" .substr($all[$i]->TenDT,0,50).'...' ."</td>
					<td>" .$TenGV->HotenGV ."</td>
					<td>". $TenDA->TenDA ."</td>
					<td>" .$TenLVNC->TenLVNC ."</td>
					<td> 
					" .$dem ."/" .$all[$i]->SoluongSV ."
					<div class='progress mb-4'>
					<div class='progress-bar bg-danger' role='progressbar' style='width:"  .$kk ."%; ' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100'></div>

					</div>
					<input type='hidden' name='MaDT".$all[$i]->MaDT."' value='".$all[$i]->MaDT."'>
					<input type='hidden' name='MaSV".$all[$i]->MaDT."' value='".$MaSV."'>

					</td>

					";

					if($dem==$all[$i]->SoluongSV)
					{
						$temple.="<td style='text-align:center'><a><i class='fas fa-ban'></i></a>";
					}
					else
					{
						$temple.="<td style='text-align:center'><a id='DA' href='#' onclick='load(".$all[$i]->MaDT.",".$MaSV.")' ><i class='far fa-check-circle'></i></a></td>";
						$temple.="<td><p><a href='#ex1".$i."' rel='modal:open'>Xem thông tin
						</a></p></td>";
					}

					$temple=$temple ."</tr>";

					$temple=$temple ."</tbody>  
					<div id='ex1".$i."' class='modal'>

					<div class='modal-dialog' role='document'>
					<div class='modal-content'>

					<div class='modal-header'>
					<h5 class='modal-title' id='exampleModalLabel'>Thông tin</h5>
					<button class='close' type='button' data-dismiss='modal' aria-label='Close' ref='modal:close'>
					<span><a href='#' rel='modal:close'>×</a></span>
					</button>
					</div>



					<div class='modal-body'> <p><b>Tên đề tài: </b>".$all[$i]->TenDT ."</p></div>";
					$temple.= "<div class='modal-body'><p><b>Kế hoạch thực hiện:</b>";
					$Noidungthuchien = DB::table('kehoachthuchien')->where('MaDT',$all[$i]->MaDT)->get();
					$count=sizeof($Noidungthuchien);
					if($count>0){


						for($iii=0;$iii<$count;$iii++){

							$temple.= "<p>".$Noidungthuchien[$iii]->Noidungthuchien."</p>";
						// echo ($Noidungthuchien[$iii]->Noidungthuchien);
						}
					}
					else{
						$temple.="<p>Chưa có kế hoạch nào</p>";
					}

					$temple.="</div><div class='modal-footer'>

					<button class='btn btn-primary'type='button' data-dismiss='modal'><a href='#' style='color:white'rel='modal:close'>Thoát</a></button>

					</div>

					</div>     
					</div>
					</div>

					</div>";

				}
			}
			else 
			{
				$temple= "<h6 style='text-align:center'>Bạn đã đăng ký đề tài</h6>";
			}

			echo $temple;
		}

//func
		public function checksoluongSV(){
			$count=DB::table("dangkidetai")->get()->count('MaDK');
			return $count;

		}
		public static function checkDKDT($MaDA){
			$MaSV = SinhVienController::getMaSV();
			$MaHK = DetaiController::getMaHocKy_now();
			try{
		// $all=DB::table('dangkidetai')->where('detai.MaDA',$MaDA)->where('dangkidetai.MaSV',$MaSV)->join('detai','dangkidetai.MaDT','=','detai.MaDT')->get();
				$all= DB::table('detai')->where('detai.MaDA',$MaDA)->where('dangkidetai.MaSV',$MaSV)->where('MaHK',$MaHK)->join('dangkidetai','detai.MaDT','=','dangkidetai.MaDT')->first();
			} catch(Exception $e){
				return $all="";
			}
			if(count((array)$all)=='0'){
				return false;
			}
			else
				return true;
		}


		public function checkDKDA(){

			$DB= new xuly();
			$MaSV = SinhVienController::getMaSV();
		// $MaDA=$DB->getlist("SELECT MaDA FROM dangkidoan WHERE MaSV='$MaSV'");
			$MaDA = DB::table('dangkidoan')->where('MaSV',$MaSV)->get();
			if(count((array)$MaDA)=='0'){
				return true;
			}
			else
				return false;
		}
		public static function getDiemchu($Diem){

			$diemchu="";
			switch ($Diem) {
				case $Diem>=8.5 and $Diem<=10:
				return  $diemchu = "A";
				break;
				case $Diem>=8.0 and $Diem<=8.4:
				return  $diemchu = "B+";
				break;
				case $Diem>=7.0 and $Diem<=7.9:
				return  $diemchu = "B";
				break;
				case $Diem>=6.5 and $Diem<=6.9:
				return  $diemchu = "C+";
				break;
				case $Diem>=5.5 and $Diem<=6.4:
				return  $diemchu = "C";
				break;
				case $Diem>=5.0 and $Diem<=5.4:
				return  $diemchu = "D+";
				break;
				case $Diem>=4.0 and $Diem<=4.9:
				return  $diemchu = "D";
				break;
				default:
				return  $diemchu = "F";
			}
		}
		public function test(Request $request){

			dd($request);
		}

		

	}
