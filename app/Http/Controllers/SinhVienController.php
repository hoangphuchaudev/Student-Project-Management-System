<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
// error_reporting(0);
// use App\Classes\xuly;

class SinhVienController extends Controller{

//getdata
    public static function error(){
        return "ABC";
    }
    public static  function getMaSV(){
        // $DB = new xuly();
        $a=Session::get('MaUS');
        // $MaSV=implode(" ",($DB->getlist("SELECT MaSV FROM sinhvien WHERE MaUS='$a'"))[0]);
        $all = DB::table('sinhvien')->where('MaUS',$a)->first()->MaSV;
        return $all;

    }
    //important
    public static function getMaDA_MaSV($MaSV){
        $MaHK = DetaiController::getMaHocKy_now();
        try{
            $all=DB::table('dangkidoan')->where('MaSV',$MaSV)->where('MaHK',$MaHK)->join('doan','dangkidoan.MaDA','=','doan.MaDA')->select('dangkidoan.MaDA','doan.TenDA')->get();
            return $all;
        } 
        catch (Exception $e){    

            return " ";
        }
        
    }

//view
    public function tailieuthamkhao($MaDT){
        $MaSV=$this->getMaSV();
        $MaDA=DetaiController::getMaDA_MaDT($MaDT);

        // $TenTL=$DB->getlist("SELECT TenTL FROM tailieuthamkhao WHERE MaDT ='$MaDT'");
        // $FileTL=$DB->getlist("SELECT FileTL FROM tailieuthamkhao WHERE MaDT='$MaDT'");
        // $MaTL=$DB->getlist("SELECT MaTL FROM tailieuthamkhao WHERE MaDT ='$MaDT'");

        // $TenDA=$DB->getlist("SELECT TenDA FROM doan WHERE MaDA='$MaDA'");
        $tailieuthamkhao = DB::table('tailieuthamkhao')->where('MaDT',$MaDT)->get();
        $TenDA = DB::table('doan')->where('MaDA',$MaDA)->first()->TenDA;
        return view('viewSV.tailieuthamkhao' ,compact('MaDA','TenDA','tailieuthamkhao','MaDT'));
    }
    public function trangchusinhvien(){        
        return view('viewSV.index');
    }
    public function diem(){
        $MaSV=$this->getMaSV();
        $all = DB::table('diem')->where('MaSV',$MaSV)->get();
        return view('viewSV.diem',compact('all'));
    }
//func

}
