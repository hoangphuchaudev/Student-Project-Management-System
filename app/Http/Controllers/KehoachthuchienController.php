<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\stdClass;
// session_start();


class KehoachthuchienController extends Controller{
	
//insert, update, delete
	public function insertSP(Request $request){
		$Ten=$request->Mota1;
		$MaKHTH=$request->MaKHTH;
		$Mota = $request->Mota;
		$get_file = $request->file('file'.$MaKHTH);
		if($get_file){
			$get_name_file = $get_file->getClientOriginalName();
			$name_file = current(explode('.',$get_name_file));
			$new_file =  $name_file.rand(0,99).'.'.$get_file->getClientOriginalExtension();
			$get_file->move('public/fil',$new_file);
			$a = array("Sanpham"=>$new_file,"TenSP"=>$Ten,"MaKHTH"=>$MaKHTH,"MotaSP"=>$Mota,"Danhgia"=>"0","Chuthich"=>" ");
			$all = DB::table('sanpham')->insert($a); 
		}

		if($all){
			echo "<script> alert('Cập nhật thành công!')</script>";
			return Redirect()->back();

		}
		else{
			echo "<script> alert('Cập nhật không thành công!')</script>";
			return Redirect()->back();
		}

	}
	public function updateSP($MaDT,$MaKHTH,Request $request){
		$Ten=$request->Mota1;
		$Mota = $request->Mota;
		$get_file = $request->file('file'.$MaKHTH);
		if($get_file){
			$get_name_file = $get_file->getClientOriginalName();
			$name_file = current(explode('.',$get_name_file));
			$new_file =  $name_file.rand(0,99).'.'.$get_file->getClientOriginalExtension();
			$get_file->move('public/fil',$new_file);
			$a = array("Sanpham"=>$new_file,"TenSP"=>$Ten,"MaKHTH"=>$MaKHTH,"MotaSP"=>$Mota,"Danhgia"=>"0","Chuthich"=>" ");
			$all=DB::table('sanpham')->where('MaKHTH',$MaKHTH)->update($a);
		}
		if($all){
			echo "<script> alert('Cập nhật thành công!')</script>";
			return Redirect()->back();
		}
		else{
			echo "<script> alert('Cập nhật không thành công!')</script>";
			return Redirect()->back();
		}

	}
	public function testupfile(Request $request){
		$get_file = $request->file('file');
		if($get_file){
			$get_name_file = $get_file->getClientOriginalName();
			$name_file = current(explode('.',$get_name_file));
			$new_file =  $name_file.rand(0,99).'.'.$get_file->getClientOriginalExtension();
			$get_file->move('public/fil',$new_file);
			$a=array("Sanpham"=>$new_file,"TenSP"=>"Hau_Hau","MaKHTH"=>"2","MotaSP"=>$request->Mota,"Danhgia"=>"0","Chuthich"=>" ");
			DB::table('sanpham')->insert($a); 
		}
		else
		{

		}

		// return view('testacv');
	}
	public function action_KHTH(Request $request){
		$MaGV = GVController::getMaGV();
		$MaHK = DetaiController::getMaHocKy_now();
		if($request->ajax())
		{
			if($request->type == 'insert')
			{

				$data = array();
				$MaDT = $request->MaDT;
				$data['Noidungthuchien'] = $request->Noidungthuchien;
				$data['NgayBD'] = $request->NgayBD;
				$data['NgayKT'] = $request->NgayKT;
				$data['MaDT'] = $MaDT;
				$result = DB::table('kehoachthuchien')->insert($data);
				return response()->json($data);
			}
			else
			if($request->type == 'updateSP'){
				$data = array();
				$MaKHTH = $request->MaKHTH;
				$data['Danhgia'] = $request->Danhgia;
				$data['Chuthich'] = $request->Chuthich;
				
				$result = DB::table('sanpham')->where('MaKHTH',$MaKHTH)->update($data);
				return response()->json($data);
			}
			else if($request->type == 'update_dataKHTH'){

				$data = array();
				$MaKHTH = $request->MaKHTH;
				$data['Noidungthuchien'] = $request->Noidungthuchien;
				$data['NgayBD'] = $request->NgayBD;
				$data['NgayKT'] = $request->NgayKT;
				$result = DB::table('kehoachthuchien')->where('MaKHTH',$MaKHTH)->update($data);
				return response()->json($data);

			}
	 
		}
	}	
//getdata
	public static function getMaKHTH_tuan($NgayBD){
		try{
			$all = DB::table('kehoachthuchien')->where('NgayBD',$NgayBD)->value('MaKHTH');
		}catch(Exception $e){
			$all="";
		}

		return $all;
	}
	public static function getSanPham_MaKHTH($MaKHTH){
		try{
			$all = DB::table('sanpham')->where('MaKHTH',$MaKHTH)->value('Sanpham');
		}catch(Exception $e){
			$all="";
		}
		return $all;
	}
	public static function getDanhgia_MaKHTH($MaKHTH){
		try{
			$all = DB::table('sanpham')->where('MaKHTH',$MaKHTH)->value('Danhgia');
		}catch(Exception $e){
			$all="";
		}
		return $all;
	}
	public static function getMoTa_MaKHTH($MaKHTH){ 
		try{ 
			$all = DB::table('sanpham')->where('MaKHTH',$MaKHTH)->value('MotaSP');
		}catch(Exception $e){
			$all="";
		}
		return $all;
	}
	public static function getNoidung_tuan($NgayBD,$MaDT){
		try{
			$all = DB::table('kehoachthuchien')->where('NgayBD',$NgayBD)->where('MaDT',$MaDT)->value('Noidungthuchien');
		}catch(Exception $e){
			$all="";
		}
		return $all;
	}
	public static function getTenSP_MaKHTH($MaKHTH){
		try{
			$all = DB::table('sanpham')->where('MaKHTH',$MaKHTH)->value('TenSP');
		}catch(Exception $e){
			$all="";
		}
		return $all;
	}
	public static function getModal_Co_SanPham1($TenSP, $Tuan, $MaKHTH, $TenDA, $TenDT, $Noidungthuchien, $MotaSPi, $Sanphami){

		$temple = "<div class='modal fade' id='kehoachthuchien".$Tuan."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
		. "<div class='modal-dialog' role='document'>"
		. "<div class='modal-content'>"
		."<div class='modal-header'>"
		. "<h5 class='modal-title' id='exampleModalLabel'>Kế hoạch thực hiện</h5>"
		. "<button class='close' type='button' data-dismiss='modal' aria-label='Close'>"
		. "<span aria-hidden='true'>×</span>"
		. "</button>"
		. "</div>";

		return $temple;
		

	}
	public static function getModal_Co_SanPham2($TenSP, $Tuan, $MaKHTH, $TenDA, $TenDT, $Noidungthuchien, $MotaSPi, $Sanphami){


		$temple =  "<div class='modal-body'>Đồ án:<b> " .$TenDA ."</b></div>"
		. "<div class='modal-body'>Nội dung thực hiện:<b> " .$Noidungthuchien ."</b></div>"
		. "<hr>"
		. "<div class='modal-body' style='text-align:center;font-size:20px'><b> Upload sản phẩm của tuần</b></div>"
		. "<div class='modal-body'>Mô tả:<input id='title".$MaKHTH."'  class='form-control' value='".$MotaSPi."' name='Mota'>"."</input></div>"
		. "<div class='modal-body'>Tên sản phẩm:<input id='slug".$MaKHTH."' value='".$TenSP."' class='form-control' name='Mota1'>"."</input></div>"
		."<input type='hidden' name='MaKHTH' value='".$MaKHTH."'></input>"
		. "<div class='modal-body' style='color:red'>Lưu ý nén thành file zip trước khi upload</div>"
		. "<div class='modal-body'>Thay đổi file:
		<div class='row uploadDoc'>
		<div class='col-sm-3'>
		<div class='docErr'>Vui lòng tải lên tệp hợp lệ</div>
		<div class='fileUpload btn btn-orange'>
		<span class='upl' id='upload'><i class='fas fa-upload'> Tải lên</i></span>
		<input type='file' class='upload up' id='up".$MaKHTH."' name='file".$MaKHTH."' onchange='readURL(this,".$MaKHTH.");'>
		<img src='https://image.flaticon.com/icons/svg/136/136549.svg' class='icon'>
		</input>
		</div>
		</div>

		</div>

		</div>"
		."<div class='modal-body'>Đã up load:<b> " .$Sanphami ."</b></div>"
		. "<div class='modal-footer'>"
		. "<button class='btn btn-secondary' type='button' data-dismiss='modal'>Ok</button>
		<button display=none type='submit' id='saveButton' name='saveButton' class='btn btn-primary'>Save changes</button>
		</div>
		</form> 
		</div>
		</div>
		</div> 
		";
		return $temple;

	}
	public static function getModal_Ko_SanPham1($Tuan, $MaKHTH, $TenDA, $TenDT, $Noidungthuchien){

		$temple = "<div class='modal fade' id='kehoachthuchien".$Tuan."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
		. "<div class='modal-dialog' role='document'>"
		. "<div class='modal-content'>"
		."<div class='modal-header'>"
		. "<h5 class='modal-title' id='exampleModalLabel'>Kế hoạch thực hiện</h5>"
		. "<button class='close' type='button' data-dismiss='modal' aria-label='Close'>"
		. "<span aria-hidden='true'>×</span>"
		. "</button>"
		. "</div>";
		return $temple;
	}

	public static function getModal_Ko_SanPham2($Tuan, $MaKHTH, $TenDA, $TenDT, $Noidungthuchien){

		
		$temple =  "<div class='modal-body'>Đồ án:<b> " .$TenDA ."</b></div>"
		. "<div class='modal-body'>Nội dung thực hiện:<b> " .$Noidungthuchien ."</b></div>"
		. "<hr>"
		. "<div class='modal-body'>Lưu ý nén thành file zip trước khi upload</div>"
		. "<div class='modal-body'>Mô tả:<input id='title".$MaKHTH."'  class='form-control' value='' name='Mota'>"."</input></div>"
		. "<div class='modal-body'>Tên sản phẩm:<input id='slug".$MaKHTH."' class='form-control' name='Mota1'>"."</input></div>"
		."<input type='hidden' name='MaKHTH' value='".$MaKHTH."'></input>"
		. "<div class='modal-body' style='color:red'>Lưu ý nén thành file zip trước khi upload</div>"
		. "<div class='modal-body'>Upload file:
		<div class='row uploadDoc'>
		<div class='col-sm-3'>
		<div class='docErr'>Vui lòng tải lên tệp hợp lệ</div>
		<div class='fileUpload btn btn-orange'>
		<span class='upl' id='upload'><i class='fas fa-upload'> Tải lên</i></span>
		<input type='file' class='upload up' id='up".$MaKHTH."' name='file".$MaKHTH."' onchange='readURL(this,".$MaKHTH.");'>
		<img src='https://image.flaticon.com/icons/svg/136/136549.svg' class='icon'>
		</input>
		</div>
		</div>

		</div>

		</div>"

		. "<div class='modal-footer'>"
		. "<button class='btn btn-secondary' type='button' data-dismiss='modal'>Ok</button>
		<button display=none type='submit' id='saveButton' name='saveButton' class='btn btn-primary'>Save changes</button>
		</div>
		</form> 
		</div>
		</div>
		</div> 
		";
		return $temple;

	}
	public static function getdata_quanlykehoach($MaDA){
		$MaGV = GVController::getMaGV();
		$MaHK = DetaiController::getMaHocKy_now();
		$all = DB::table('detai')->where('detai.MaDA',$MaDA)->where('detai.MaGV',$MaGV)->where('detai.MaHK',$MaHK)->select('detai.MaDT','TenDT','SoluongSV','linhvucnghiencuu.TenLVNC','doan.TenDA')->join('linhvucnghiencuu','detai.MaLVNC','=','linhvucnghiencuu.MaLVNC')->join('gvhd','gvhd.MaGV','=','detai.MaGV')->join('doan','doan.MaDA','=','detai.MaDA')->join('dangkidetai','dangkidetai.MaDT','=','detai.MaDT')->orderBy('detai.MaDT','DESC')->distinct()->get();

		for($i=0;$i<count($all);$i++){
			$countKHTH = DB::table('kehoachthuchien')->where('MaDT',$all[$i]->MaDT)->count('MaKHTH');
			$countSP = DB::table('sanpham')->where('MaDT',$all[$i]->MaDT)->join('kehoachthuchien','kehoachthuchien.MaKHTH','=','sanpham.MaKHTH')->count('sanpham.MaKHTH');
			$countDG = DB::table('sanpham')->where('Danhgia','1')->where('MaDT',$all[$i]->MaDT)->join('kehoachthuchien','kehoachthuchien.MaKHTH','=','sanpham.MaKHTH')->count('sanpham.MaKHTH');
			$teample= DB::table('dangkidetai')->where('MaDT',$all[$i]->MaDT)->count('MaSV');
			$sinhvienthuchien = DB::table('dangkidetai')->where('MaDT',$all[$i]->MaDT)->select('HotenSV')->join('sinhvien','sinhvien.MaSV','=','dangkidetai.MaSV')->get();
			$all[$i]->countKHTH = $countKHTH;
			$all[$i]->countSP = $countSP;	
			$all[$i]->countDG = $countDG;						
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
	public static function getdata_quanlykehoach2(Request $request){
		$MaDT = $request->MaDT;
		$countKHTH=DB::table('kehoachthuchien')->where('MaDT',$MaDT)->count('MaKHTH');
		$a = array();
		//có kế hoạch thực hiện
		if($countKHTH>0){
			$all = DB::table('kehoachthuchien')->where('MaDT',$MaDT)->get();

			$HK = DB::table('hocky')->where('MaHK',DetaiController::getMaHocKy_now())->first();
			$data = new \stdClass();
			$NgayBDtuan = date('Y-m-d',strtotime('+ 0 days',strtotime($HK->ThoigianBDHK)));
			for($i=0;$i<15;$i++){	
				$NgayBDtuan=date('Y-m-d',strtotime('+ 7 day' ,strtotime($NgayBDtuan)));
				$NgayKTtuan=date('Y-m-d',strtotime('+ 7 day' ,strtotime($NgayBDtuan)));
			//var :))
				$Noidungthuchien = '';
				$Thoihan = '';
				$MaKHTH = '';
				$Sanpham = '';
				$Danhgia = '';
				$Chuthich = '';

				for($j=0;$j<count($all);$j++){
					if(((strtotime($all[$j]->NgayBD) >= strtotime($NgayBDtuan))&&(strtotime($all[$j]->NgayBD) < strtotime($NgayKTtuan)))||((strtotime($all[$j]->NgayKT) > strtotime($NgayBDtuan))&&(strtotime($all[$j]->NgayKT) <= strtotime($NgayKTtuan)))){
						// dd($all[$j]->Noidungthuchien);
						$Noidungthuchien=$all[$j]->Noidungthuchien;
						$Thoihan=date('d/m',strtotime($all[$j]->NgayBD))." - ".date('d/m',strtotime($all[$j]->NgayKT));
						$MaKHTH = $all[$j]->MaKHTH;
						
					}
					else{
						$data->Noidungthuchien=$data->Thoihan=$data->Sanpham=$data->Chuthich='';
						$data->Danhgia='false';

					}
				}
				$countSP = DB::table('sanpham')->where('MaKHTH',$MaKHTH)->count('MaSP');
						//có sản phẩm
				if($countSP>0){
					$Sanpham = DB::table('sanpham')->where('MaKHTH',$MaKHTH)->first();							
					$data->Sanpham = $Sanpham->TenSP;
					$data->Danhgia=$Sanpham->Danhgia;
					$data->Chuthich=$Sanpham->Chuthich;
					$data->MotaSP=$Sanpham->MotaSP;
				}
						//chưa nộp sản phẩm
				else{
					$data->Sanpham ='Chưa nộp sản phẩm';
					$data->Danhgia='false';
					$data->Chuthich='';
					$data->MotaSP='';
				}
				$data->MaKHTH = $MaKHTH;		
				$data->Noidungthuchien = $Noidungthuchien;
				$data->Thoihan = $Thoihan;
				$data->Tuan = ($HK->Tuanhoc+$i).' ('.date('d/m',strtotime($NgayBDtuan)).' - '.date('d/m',strtotime($NgayKTtuan)).' )';	
				$data->NgayBD = $NgayBDtuan;
				$data->NgayKT = $NgayKTtuan;
				$a[$i] = json_decode(json_encode($data),true);

			}
		}
		//không có kế hoạch
		else{
			$HK = DB::table('hocky')->where('MaHK',DetaiController::getMaHocKy_now())->first();
			$data = new \stdClass();
			$NgayBDtuan = date('Y-m-d',strtotime('- 7 days',strtotime($HK->ThoigianBDHK)));
			for($i=0;$i<15;$i++){	
				$NgayBDtuan=date('Y-m-d',strtotime('+ 7 day' ,strtotime($NgayBDtuan)));
				$NgayKTtuan=date('Y-m-d',strtotime('+ 7 day' ,strtotime($NgayBDtuan)));
				$data->MaKHTH='';
				$data->Noidungthuchien=$data->Thoihan=$data->Sanpham=$data->Chuthich='';
				$data->Danhgia='false';
				$data->Tuan = ($HK->Tuanhoc+$i).' ('.date('d/m',strtotime($NgayBDtuan)).' - '.date('d/m',strtotime($NgayKTtuan)).' )';
				$data->NgayBD = $NgayBDtuan;
				$data->NgayKT = $NgayKTtuan;
				$a[$i] = json_decode(json_encode($data),true);
			}		
			

		}

		if($a){
			return response()->json([
				'message' => "Data Found",
				"code"    => 200,
				"data"  => $a         

			]);
		}
		else{
			return response()->json([
				'message' => "Internal Server Error",
				"code"    => 500
			]);
		}

	}
	public static function getdata_quanlykehoach3(Request $request){
		if($request->ajax())
		{
			if($request->type == 'getdata')
			{
				$all=DB::table('kehoachthuchien')->where('MaKHTH',$request->MaKHTH)->first();
				$data = new \stdClass();
				$countSP = DB::table('sanpham')->where('MaKHTH',$request->MaKHTH)->count('MaSP');
				//có sản phẩm
				if($countSP>0){
					$Sanpham = DB::table('sanpham')->where('MaKHTH',$request->MaKHTH)->first();							
					$all->Sanpham = $Sanpham->Sanpham;
					$all->Danhgia=$Sanpham->Danhgia;
					$all->Chuthich=$Sanpham->Chuthich;
					$all->MotaSP=$Sanpham->MotaSP;
					
				}
				//chưa nộp sản phẩm
				else{
					$all->Sanpham ='Chưa nộp sản phẩm';
					$all->Danhgia='false';
					$all->Chuthich='';
					$all->MotaSP='';
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
			else if($request->type == 'getdata_update'){
				$all = DB::table('kehoachthuchien')->where('MaKHTH',$request->MaKHTH)->first();
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
		
		}

	}
//view
	public  function kehoachthuchien($MaDT){
		$MaSV = SinhVienController::getMaSV();
		$MaDA = DetaiController::getMaDA_MaDT($MaDT);
		$TenDA = DB::table('doan')->where('MaDA',$MaDA)->value('TenDA');
		$DT = DB::table('detai')->where('MaDT',$MaDT)->first();
		$TenDT = $DT->TenDT;
		$MaHK = $DT->MaHK;
		$HK = DB::table('hocky')->where('MaHK',$DT->MaHK)->first();
		$ThoigianBDH = $HK->ThoigianBDHK;
		$TuanBD= $HK->Tuanhoc;
		$NgayBDtuan=$HK->ThoigianBDHK;     
		$KHTH = DB::table('kehoachthuchien')->where('MaDT',$MaDT)->get();
		return view('viewSV.kehoachthuchien', compact('MaDA','KHTH','NgayBDtuan','TenDA','TenDT','MaHK','TuanBD','NgayBDtuan','MaDT'));
	}
	public function quanlykehoach($MaDA){
		$TenDA = DB::table('doan')->where('MaDA',$MaDA)->value('TenDA');
		return view('viewGV.quanlykehoach',compact('MaDA','TenDA'));	
	}
//func
	public static function checkday($day){
		$now=date("Y-m-d");
		if(strtotime($day)>=strtotime($now)){
			return 1;
		}
		else{
			return 0;
		}   
	}


}
