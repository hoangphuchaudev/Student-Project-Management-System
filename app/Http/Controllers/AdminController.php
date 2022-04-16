<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Classes\xuly;


// use App\Http\Request;

use Session;
use Auth;
use Illuminate\Support\Facades\Redirect; 
use App\User;
session_start();


class AdminController extends Controller{
    public function username()
    {
        return 'Email';
    }
    public function index()
    {
    	return view('admin_login');
    }

    public function login(Request $request){
    	$user=$request->user;
    	$pass=$request->pass;
    	$result = DB::table('user')->where('Email',$user)->where('Matkhau',md5($pass))->first();

    	if($result)
    	{
            if($result->LoaiUS == 2)
            {
                $a=$result->MaUS;
                $username = DB::table('sinhvien')->where('MaUS',$a)->first();

                $tenlop = DB::table('lop')->where('Malop',$username->Malop)->first();


                Session::put('MaUS',$username->MaUS);
                Session::put('HotenSV',$username->HotenSV);
                Session::put('MaSV',$username->MaSV);
                Session::put('Khoahoc',$username->Khoahoc);
                Session::put('SdtSV',$username->SdtSV);
                Session::put('EmailSV',$username->EmailSV);
                Session::put('Tenlop',$tenlop->Tenlop);
                Session::put('LoaiUS',$result->LoaiUS);

                return Redirect::to('sinhvien');
            }
            else  
                if($result->LoaiUS == 1)
                {
                $a=$result->MaUS;
                $username = DB::table('gvhd')->where('MaUS',$a)->first();
                Session::put('MaUS',$username->MaUS);
                Session::put('HotenGV',$username->HotenGV);
                Session::put('SdtGV',$username->SdtGV);
                Session::put('Email',$username->Email);
                Session::put('Hocvi',$username->Hocvi);
                Session::put('Chuyenmon',$username->Chuyenmon);
                Session::put('LoaiUS',$result->LoaiUS);
                return Redirect::to('giangvien');
                }
            else  
                if($result->LoaiUS == 3)
                {
                $a=$result->MaUS;
                $username = DB::table('gvhd')->where('MaUS',$a)->first();
                Session::put('MaUS',$username->MaUS);
                Session::put('HotenGV',$username->HotenGV);
                Session::put('SdtGV',$username->SdtGV);
                Session::put('Email',$username->Email);
                Session::put('Hocvi',$username->Hocvi);
                Session::put('Chuyenmon',$username->Chuyenmon);
                Session::put('LoaiUS',$result->LoaiUS);
                return Redirect::to('giangvien');
                }
                else
                {
                   dd("Lỗi");
                }
           }
           else
           {

              Session::put('Mess','<div class="alert alert-danger" id="errormsg" style="margin-top: 10px;">
                <strong>Đăng nhập không thành công!</strong> Tài khoản hoặc mật khẩu không đúng
                </div>');
              return Redirect()->back()->withInput();


          }
    }

    public function logout(){
        
        Session::flush();
        return Redirect::to('/')->withInput();
    }
}
