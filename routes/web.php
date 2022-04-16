<?php

use Illuminate\Support\Facades\Route;

//role SinhVien
Route::group(['middleware' => ['SinhVien']],function(){

     Route::get('/lichbaocao/{MaDT}','LichbaocaoController@lichbaocao');
     Route::get('/diem','SinhVienController@diem');

     // kehoachthuchien
     Route::get('/kehoachthuchien/{MaDT}','KehoachthuchienController@kehoachthuchien');
     Route::post('/updatesanpham/{MaDT}/{MaKHTH}','KehoachthuchienController@updateSp')->name('updatesanpham');
     Route::post('/insertsanpham','KehoachthuchienController@insertSP')->name('insertsanpham');
     Route::post('/testupfile','KehoachthuchienController@testupfile');


     Route::get('/tailieuthamkhao/{MaDT}','SinhVienController@tailieuthamkhao');
     Route::get('/sinhvien','SinhVienController@trangchusinhvien');
     Route::post('/get_all_mota','SinhVienController@get_all_mota');
     // Route::post('/updatesanpham/{MaDT}/{MaKHTH}','SinhVienController@update_sanpham')->name('updatesanpham');

     Route::get('/dangkydetai/{MaDA}','DetaiController@index');
     Route::get('/load_detai/{MaDA}','DetaiController@getdata');   
     Route::get('/checksoluongSV','DetaiController@checksoluongSV');
     Route::get('/dangkydetai/{MaDT}/{MaSV}','DetaiController@dangkyDT');
     Route::post('/dexuatdetai','DetaiController@dangkyDX')->name('dexuatdetai');


     // view menu doan
     Route::get('/doan/{MaDA}','DetaiController@doan');

     Route::get('/test/{MaKHTH}','KehoachthuchienController@test');

     Route::group(['prefix' => 'laravel-filemanager'], function () {
          \UniSharp\LaravelFilemanager\Lfm::routes();
      });


});

//role GiangVien
Route::group(['middleware' => ['GiangVien']], function() {  

     Route::get('/giangvien','GVController@trangchugiangvien');
     Route::get('/test1/{MaGV}','GVController@getMaDA_MaGV');
//Quản lý đề tài
     Route::get('/qldoan/{MaDA}','DetaiController@qldoan');
     Route::get('/quanlydetai/{MaDA}','DetaiController@qldetai');
     Route::get('/getdata_quanlydetai/{MaDA}','DetaiController@getdata_quanlydetai');
     Route::get('/getdata_quanlydetai/{MaHK}/{MaDA}','DetaiController@getdata_quanlydetai_MaHK');
     Route::post('/getdata_quanlydetai_editmodal','DetaiController@getdata_quanlydetai_editmodal');
     Route::get('/getdata_quanlydetai_dexuatdetai','DetaiController@getdata_quanlydetai_dexuatdetai');
     
     Route::post('/update_detai','DetaiController@updateDT');
     Route::post('/insert_detai/{MaDA}','DetaiController@insertDT');
     Route::post('/delete_detai/','DetaiController@deleteDT');

     Route::post('/insert_dexuat','DetaiController@insertDX');
     Route::post('/delete_dexuat','DetaiController@deleteDX');

//Quản lý lịch báo cáo
     Route::get('/quanlylichbaocao/{MaDA}','LichbaocaoController@qllichbaocao');
     Route::post('/action_LBC/','LichbaocaoController@action_LBC');
     Route::get('/getdata_LBC/','LichbaocaoController@getdata_LBC');
     
//Quản lý kế hoạch thực hiện
     Route::get('/quanlykehoach/{MaDA}','KehoachthuchienController@quanlykehoach');
     Route::get('/getdata_quanlykehoach/{MaDA}','KehoachthuchienController@getdata_quanlykehoach');
     Route::get('/getdata_quanlykehoach2','KehoachthuchienController@getdata_quanlykehoach2');
     Route::get('/getdata_quanlykehoach3','KehoachthuchienController@getdata_quanlykehoach3');
     Route::post('/action_KHTH','KehoachthuchienController@action_KHTH');
//Quản lý thông tin sinh viên
     Route::get('quanlysinhvien/{MaDA}','DetaiController@quanlysinhvien');
     Route::get('getdata_quanlysinhvien','DetaiController@getdata_quanlysinhvien');
     Route::get('getdata_chamdiem','DetaiController@getdata_chamdiem');
     Route::post('action_chamdiem','DetaiController@action_chamdiem');
//admin
     Route::get('/quanlydoan','GVController@quanlydoan');
     Route::get('/getdataqldoan','GVController@getdataqldoan');
     Route::get('/getdataqldoan_MaHK','GVController@getdataqldoan_MaHK');
     Route::get('/action_quanlydoan','GVController@action_quanlydoan');
});


//user
Route::get('/','AdminController@index')->name('trangchu');

Route::post('/login','AdminController@login')->name('login');

Route::get('/logout','AdminController@logout');

Route::get('/test3',function(){
     return view('testacv');
});


// Route::get('/login','AdminController@index');

