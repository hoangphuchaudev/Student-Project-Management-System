<?php 
use App\Http\Controllers\DetaiController;

?>
@include('view/adminleftgv')
@include('view/topcontengv')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li><a href="{{ URL::to('giangvien') }}">Đồ án</a></li>&nbsp>&nbsp
			<li aria-current="page"><a href="{{ URL::to('qldoan/'.$MaDA) }}">{{ $TenDA }}</a></li>&nbsp>&nbsp
			<li class="breadcrumb-item active" aria-current="page">Xem thông tin sinh viên</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-xl-3 col-md-6 mb-4" id="xemdiem">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card bg-primary text-white shadow">
					<div class="card-body">
						Chấm điểm sinh viên
						<a id='chamdiem' data-toggle='modal' data-target='#modal_all' href="javascript:void(0)"><div class="text-white-50 small">Xem chi tiết</div></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3" id="title">
			<h6 class="m-0 font-weight-bold text-primary">Danh sách sinh viên</h6>

		</div>  
		<div class="col-xl-auto col-md-auto mb-auto">
			<div class="card border-bottom-success shadow h-100 py-2">

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover table-bordered" id="dataaa" width="100%" cellspacing="0">
							<thead style="background-color: #2D4154FF; color: white;" >
								<tr>
									<th width="10%">Mã sinh viên</th>
									<th width="20%">Tên sinh viên</th>
									<th width="10%">Lớp</th>
									<th width="5%">Khóa</th>
									<th width="10%">Số điện thoại</th>
									<th width="10%">Email</th>
									<th width="30%">Đề tài thực hiện</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
						<table class="table table-striped table-hover table-bordered" id="dataaa2" width="100%" cellspacing="0">
							<thead style="background-color: #2D4154FF; color: white;" >
							</table>  
						</div>
					</div>

				</div>

			</div>

		</div>
	</div>
<div class="modal fade" id="modal_chamdiem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class='modal-content'>
      <form id="modal_form" enctype="multipart/form-data">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <input type="hidden" name="MaD" id="MaD">
        <input type="hidden" name="MaDT" id="MaDT">
        <input type="hidden" name="MaSV" id="MaSV">

        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Chấm điểm</h5>
          <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>×</span>
          </button>
        </div>
       <div class='modal-body'>Tên sinh viên
        <div class="card bg-secondary text-white shadow">
              <div class="card-body" id="TenSV">
              </div>
        </div>

     </div>	
      <div class='modal-body'>Đề tài
         <div class="card bg-secondary text-white shadow">
              <div class="card-body" id="TenDT">
              </div>
        </div>

     </div>

     <div class='modal-body'>Chấm điểm
      <div class="form-group">
        <input type="number" class="form-control"  id="Diem" required>
      </div>
    </div>	
  </form>
  <div class='modal-footer'>
    <button class='btn btn-secondary'type='button' data-dismiss='modal'>Thoát</button>
    <button type='submit' id='update_d' name='saveButton' class='btn btn-primary'>Cập nhật</button>
    <button type='submit' id='insert_d' name='saveButton' class='btn btn-primary'>Thêm mới</button>
  </div>
</div>     
</div>
</div>
@include('view/footergv')
<script type="text/javascript">
$(document).ready(function(){
			var table;
			$.ajax({
				url: "{{ URL::to('getdata_quanlysinhvien') }}",
				type: "get",
				dataType: 'json',
				data: {
					"MaDA": {{ $MaDA }},
				},
				success: function(data) {
					table = $('#dataaa').DataTable({
						"dom" : 'Bfrtip',
						"buttons" : [
						'copy', 'csv', 'excel', 'pdf', 'print'
						],
						"destroy":true,
						"data": data.data,
						"columns": [
						{
							"title": "Mã sinh viên",
							"width": "10%",  
							"data": "MaSV" 
						},
						{
							"title": "Tên sinh viên", 
							"width": "20%", 
							"data": "HotenSV" 
						},
						{
							"title": "Lớp", 
							"width": "10%", 
							"data": "Tenlop",

						},
						{
							"title": "Khóa", 
							"width": "5%",  
							"data": 'Khoahoc',

						},
						{
							"title": "Số điện thoại", 
							"width": "10%", 
							"data": null,
							render: function(data,type,row){
								var Sdt = '0'+row.SdtSV
								return `${Sdt}`; 
							} 
						},
						{
							"title": "Email",
							"width": "10%",  
							"data": "EmailSV" 
						},
						{
							"title": "Đề tài thực hiện",
							"width": "30%",   
							"data": 'TenDT',
						},

						],

					}); 
				}
			});
			var tableCD;
			function load_chamdiem(){
				return $.ajax({
					url: "{{ URL::to('getdata_chamdiem') }}",
					type: "get",
					dataType: 'json',
					data: {
						"MaDA": {{ $MaDA }},
					},
					success: function(data) {

						tableCD = $('#dataaa2').DataTable( {
							"dom" : 'Bfrtip',
						"buttons" : [
						'copy', 'csv', 'excel', 'pdf', 'print'
						],
							"destroy":true,
							"data": data.data,
						"columns": [
						{
							"title": "Mã sinh viên",
							"width": "10%",  
							"data": "MaSV" 
						},
						{
							"title": "Tên sinh viên", 
							"width": "20%", 
							"data": "HotenSV" 
						},
						{
							"title": "Đề tài thực hiện",
							"width": "30%",   
							"data": 'TenDT',
						},
						{
							"title": "Điểm", 
							"width": "10%", 
							"data": "Diem",

						},
						{
							"title": "Điểm chữ", 
							"width": "10%",  
							"data": 'Diemchu',

						},
						{
							"title": "Chấm điểm", 
							"width": "10%",  
							"data": null,
							render: function(data, type, row){
								if(row.Diem =='Chưa chấm')
									return `<td style='text-align:center'><button data-id="${row.HotenSV}" data-id1="${row.TenDT}" data-id2="${row.MaSV}" data-id3="${row.MaDT}"class="btn btn-sm btn-success" id="insert_diem"><i class="fas fa-marker"></i></button></td>`;
								else
									return `<td style='text-align:center'><button data-id="${row.MaDiem}" data-id1="${row.HotenSV}" data-id2="${row.TenDT}" data-id3="${row.Diem}" data-id4="${row.MaSV}" data-id5="${row.MaDT}" class="btn btn-sm btn-success" id="update_diem"><i class="fas fa-marker"></i></button></td>`;
							}

						},

						

						],

						}); 
					}
				})
			}
function load_table(){
				return 	$.ajax({
				url: "{{ URL::to('getdata_quanlysinhvien') }}",
				type: "get",
				dataType: 'json',
				data: {
					"MaDA": {{ $MaDA }},
				},
				success: function(data) {
					table = $('#dataaa').DataTable({
						"dom" : 'Bfrtip',
						"buttons" : [
						'copy', 'csv', 'excel', 'pdf', 'print'
						],
						"destroy":true,
						"data": data.data,
						"columns": [
						{
							"title": "Mã sinh viên",
							"width": "10%",  
							"data": "MaSV" 
						},
						{
							"title": "Tên sinh viên", 
							"width": "20%", 
							"data": "HotenSV" 
						},
						{
							"title": "Lớp", 
							"width": "10%", 
							"data": "Tenlop",

						},
						{
							"title": "Khóa", 
							"width": "5%",  
							"data": 'Khoahoc',

						},
						{
							"title": "Số điện thoại", 
							"width": "10%", 
							"data": null,
							render: function(data,type,row){
								var Sdt = '0'+row.SdtSV
								return `${Sdt}`; 
							} 
						},
						{
							"title": "Email",
							"width": "10%",  
							"data": "EmailSV" 
						},
						{
							"title": "Đề tài thực hiện",
							"width": "30%",   
							"data": 'TenDT',
						},

						],

					}); 
				}
			});
			}
//load table cham diem
$(document).on('click','#chamdiem',function(){
 document.getElementById('title').innerHTML=`<a id="back" href="javascript:void(0)" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-circle-left"></i></i></span><span class="text">Trở lại</span></a><hr>
 <h6 class="m-0 font-weight-bold text-primary">Danh sách điểm</h6>`;
  table.clear().draw();
 $(table.table().container()).css( 'display','none'); 
 document.getElementById('xemdiem').innerHTML='';
 load_chamdiem(); 
});
//back
$(document).on('click', '#back', function() {
 tableCD.clear().draw();
 $(table.table().container()).css( 'display','block'); 
 $(tableCD.table().container()).css( 'display','none'); 
 document.getElementById('title').innerHTML='<h6 class="m-0 font-weight-bold text-primary">Danh sách sinh viên</h6><br>';
 document.getElementById('xemdiem').innerHTML=`<div class="card border-left-primary shadow h-100 py-2"><div class="card bg-primary text-white shadow"><div class="card-body">Chấm điểm sinh viên<a id='chamdiem' data-toggle='modal' data-target='#modal_all' href="javascript:void(0)"><div class="text-white-50 small">Xem chi tiết</div></a></div></div></div>`;
 load_table();
});
//show modal cham diem
$(document).on('click','#insert_diem',function(){
	$('#MaSV').val($(this).data('id2'));
	$('#MaDT').val($(this).data('id3'));
	document.getElementById('TenSV').innerHTML=$(this).data('id');
	document.getElementById('TenDT').innerHTML=$(this).data('id1');
	$('#update_d').hide();
	$('#insert_d').show();
	$('#Diem').val('');
	$('#modal_chamdiem').modal('show');
});
$(document).on('click','#update_diem',function(){
	$('#MaSV').val($(this).data('id4'));
	$('#MaDT').val($(this).data('id5'));
	$('#MaD').val($(this).data('id'));
	document.getElementById('TenSV').innerHTML=$(this).data('id1');
	document.getElementById('TenDT').innerHTML=$(this).data('id2');
	$('#update_d').show();
	$('#insert_d').hide();
	$('#Diem').val($(this).data('id3'));
	$('#modal_chamdiem').modal('show');
});
//insert diem
$(document).on('click','#insert_d',function(){
 $.ajax({
    url:"{{ URL::to('action_chamdiem') }}",
    type: "post",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: 'json',
    data:{
      "MaDT": $('#MaDT').val(),
      "MaSV": $('#MaSV').val(),
      "Diem": $('#Diem').val(),
      "type": 'insert',
    },
    success: function(response) {
      console.log(response);
      load_chamdiem(); 
      $('#modal_chamdiem').modal('hide');
      // $('#success_tic').modal('show');

    }
  });
});
$(document).on('click','#update_d',function(){
 $.ajax({
    url:"{{ URL::to('action_chamdiem') }}",
    type: "post",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: 'json',
    data:{
    	"MaD": $('#MaD').val(),
      "MaDT": $('#MaDT').val(),
      "MaSV": $('#MaSV').val(),
      "Diem": $('#Diem').val(),
      "type": 'update',
    },
    success: function(response) {
      console.log(response);
      load_chamdiem(); 
      $('#modal_chamdiem').modal('hide');
      // $('#success_tic').modal('show');

    }
  });
});




});
</script>
