<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
// session_start();

class GVController extends Controller
{
    //insert, update, delete
    public function action_quanlydoan(Request $request){
        if($request->ajax())
        {
            if($request->type == 'add_dotxuat')
            {
                
            }
        }
    }
    //getdata
    public static function getMaGV(){
        $a=Session::get('MaUS');
        $all = DB::table('gvhd')->where('MaUS',$a)->first()->MaGV;
        return $all;

    }
    //important
    public static function getMaDA_MaGV($MaGV){
        $MaHK = DetaiController::getMaHocKy_now();
        try{
            $all=DB::table('dangkidoan')->where('MaGV',$MaGV)->where('MaHK',$MaHK)->groupBy('MaDA')->get();
            return $all;
        } 
        catch (Exception $e){    

            return "";
        }
        
        
    }
    public function getdataqldoan(){
        $all = DB::table('dangkidoan')->where('dangkidoan.MaHK',DetaiController::getMaHocKy_now())->join('sinhvien','sinhvien.MaSV','=','dangkidoan.MaSV')->join('gvhd','gvhd.MaGV','=','dangkidoan.MaGV')->join('doan','doan.MaDA','=','dangkidoan.MaDA')->join('hocky','hocky.MaHK','=','dangkidoan.MaHK')->get();
        for($i=0;$i<count($all);$i++){
            $all[$i]->STT = $i+1;
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
    public function getdataqldoan_MaHK(Request $request){
        $all = DB::table('dangkidoan')->where('dangkidoan.MaHK',$request->MaHK)->join('sinhvien','sinhvien.MaSV','=','dangkidoan.MaSV')->join('gvhd','gvhd.MaGV','=','dangkidoan.MaGV')->join('doan','doan.MaDA','=','dangkidoan.MaDA')->join('hocky','hocky.MaHK','=','dangkidoan.MaHK')->get();
        for($i=0;$i<count($all);$i++){
            $all[$i]->STT = $i+1;
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
    public function trangchugiangvien(){
        return view('viewGV.index');
    }

     public function quanlydoan(){
        return view('viewGV.quanlydoan');
    }
    //func
   
    
   
    
}
