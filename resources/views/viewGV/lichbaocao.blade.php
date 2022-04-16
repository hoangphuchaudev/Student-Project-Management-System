<?php 
	use App\Http\Controllers\LichbaocaoController;
?>
@include('view/adminleftgv')
@include('view/topcontengv')

<!-- global: $MaDA -->
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li><a href="{{ URL::to('giangvien') }}">Đồ án</a></li> &nbsp>&nbsp
			<li aria-current="page"><a href="{{ URL::to('qldoan/'.$MaDA) }}">{{ $TenDA }}</a></li>&nbsp>&nbsp
			<li class="breadcrumb-item active" aria-current="page">Xếp lịch báo cáo</li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card bg-primary text-white shadow">
					<div class="card-body">
						Xếp lịch báo cáo theo đồ án
						<a data-toggle='modal' data-target='#modal_all' href="javascript:void(0)"><div class="text-white-50 small">Xem chi tiết</div></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card bg-info text-white shadow">
					<div class="card-body">
						Xếp lịch báo cáo theo đề tài
						<a  href="javascript:void(0)" data-target='#modal_dt' data-toggle='modal'><div class="text-white-50 small">Xem chi tiết</div></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card shadow mb-4">
		<div class="card-header py-3" id="title">
			<h6 class="m-0 font-weight-bold text-primary">Lịch báo cáo tuần</h6>
			{{-- <button type='submit' id='insert' name='saveButton' class='btn btn-primary' data-toggle='modal' data-target='#modal' style="float: right;">Thêm lịch báo cáo</button> --}}

		</div>  
		<div class="col-xl-auto col-md-auto mb-auto">
			<div class="card border-bottom-success shadow h-100 py-2">
				<div class="card-body">
					<div id="calendar"></div>
				</div>
			</div>
		</div>
	</div>

	{{-- Modal thêm lịch báo cáo đột xuất --}}
	<div class="modal fade" id="modal_dotxuat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class='modal-content'>
				<form id="modal_form" enctype="multipart/form-data">
					{{-- csrf_token --}}
					<meta name="csrf-token" content="{{ csrf_token() }}">
					<div class='modal-header'>
						<h5 class='modal-title' id='exampleModalLabel'>Xếp lịch báo cáo</h5>
						<button class='close' type='button' data-dismiss='modal' aria-label='Close'>
							<span aria-hidden='true'>×</span>
						</button>
					</div>
					<div class='modal-body'>
						<div class="card bg-secondary text-white shadow">
							<div class="card-body">
								Mô tả: Xếp lịch báo cáo <b style="color:red">đột xuất</b> cho tất cả các tuần của tất cả các đề tài thuộc đồ án hiện tại.
							</div>
						</div>
					</div>
					<div class='modal-body'>Nội dung: <b>
						<textarea class="form-control" name='NoidungLBC_dotxuat' value='' id='NoidungLBC_dotxuat' required></textarea>
					</b></div>

					<div class='modal-body'>Phòng:
						<div class="form-group">
							<select class="custom-select" name="MaPhong_dotxuat" id="MaPhong_dotxuat">
								@for($i=0;$i<count(LichbaocaoController::getPhong());$i++)
								<option value="{{ LichbaocaoController::getPhong()[$i]->maphong }}">
									{{ LichbaocaoController::getPhong()[$i]->tenphong }}
								</option>
								@endfor
							</select>   
						</div>
					</div>
					<div class="modal-body">
						<div class="form-group">
							Ngày báo cáo:
							<input type="text" class="form-control" disabled id="NgayBC_dotxuat">
						</div>
					</div>	
				</form>
				<div class='modal-footer'>
					<button class='btn btn-secondary'type='button' data-dismiss='modal'>Thoát</button>
					<button type='submit' id='insert_lbcdotxuat' name='saveButton' class='btn btn-primary'>Thêm mới</button>
				</div>
			</div>     
		</div>
	</div>
</div>
{{-- Modal thêm lịch báo cáo chung --}}
<div class="modal fade" id="modal_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class='modal-content'>
			<form id="modal_form" enctype="multipart/form-data">
				{{-- csrf_token --}}
				<meta name="csrf-token" content="{{ csrf_token() }}">
				{{-- hidden MaDT --}}
				<input type="hidden" name="MaDT">
				<input type="hidden" name="MaDA">
				<div class='modal-header'>
					<h5 class='modal-title' id='exampleModalLabel'>Xếp lịch báo cáo</h5>
					<button class='close' type='button' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>×</span>
					</button>
				</div>
				<div class='modal-body'>
					<div class="card bg-secondary text-white shadow">
						<div class="card-body">
							Mô tả: Xếp lịch báo cáo <b style="color:red">mặc định</b> cho tất cả các tuần của tất cả các đề tài thuộc đồ án hiện tại.
						</div>
					</div>
				</div>
				<div class="modal-body"><b>Nội dung:</b>
					<div class="row">
						<div class="col-lg-6 mb-4">
							<div class="card bg-success text-white shadow" onclick="getND('option1')">
								<div class="card-body">
									<div id="option1">Gặp gỡ trao đổi</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 mb-4">
							<div class="card bg-info text-white shadow" onclick="getND('option2')">
								<div class="card-body" id="ND">
									<div id="option2">Báo cáo tiến độ</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 mb-4">
							<div class="card bg-warning text-white shadow" onclick="getND('option3')">
								<div class="card-body" id="ND">
									<div id="option3">Báo cáo kết thúc</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 mb-4">
							<div class="card bg-danger text-white shadow" onclick="getND('option4')">
								<div class="card-body" id="ND">
									<div id="option4">Thông báo</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class='modal-body'><b>Nhập nội dung:
					<textarea class="form-control" name='NoidungLBC_all' value='' id='NoidungLBC_all' required></textarea>
				</b></div>

				<div class='modal-body'><b>Phòng:</b>
					<div class="form-group">
						<select class="custom-select" name="MaPhong_all" id="MaPhong_all">
							@for($i=0;$i<count(LichbaocaoController::getPhong());$i++)
							<option value="{{ LichbaocaoController::getPhong()[$i]->maphong }}">
								{{ LichbaocaoController::getPhong()[$i]->tenphong }}
							</option>
							@endfor
						</select>   
					</div>
				</div>
				<div class='modal-body'><b>Thứ hàng tuần:</b>
					<div class="form-group">
						<select class="custom-select" name="MaThu_all" id="MaThu_all">								
							<option value="1">
								Thứ 2
							</option>
							<option value="2">
								Thứ 3
							</option>
							<option value="3">
								Thứ 4
							</option>
							<option value="4">
								Thứ 5
							</option>
							<option value="5">
								Thứ 6
							</option>
							<option value="6">
								Thứ 7
							</option>
							<option value="7">
								Chủ Nhật
							</option>						
						</select>   
					</div>
				</div>
			</form>
			<div class='modal-footer'>
				<button class='btn btn-secondary' type='button' data-dismiss='modal'>Thoát</button>
				<button type='submit' id='insert_lbcall' name='saveButton' class='btn btn-primary'>Thêm mới</button>
			</div>
		</div>     
	</div>
</div>
<!-- Modal thêm lịch báo cáo theo đề tài -->
<!-- <div class="modal fade" id="modal_dt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class='modal-content'>
			<form id="modal_form" enctype="multipart/form-data">
				{{-- csrf_token --}}
				<meta name="csrf-token" content="{{ csrf_token() }}">
				{{--         hidden MaDT --}}
				<input type="hidden" name="MaDT">
				<input type="hidden" name="MaDA">
				<div class='modal-header'>
					<h5 class='modal-title' id='exampleModalLabel'>Xếp lịch báo cáo</h5>
					<button class='close' type='button' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>×</span>
					</button>
				</div>
				<div class='modal-body'>
					<div class="card bg-secondary text-white shadow">
						<div class="card-body">
							Mô tả: Xếp lịch báo cáo <b style="color:red">mặc định</b> cho tất cả các tuần của tất cả các đề tài thuộc đồ án hiện tại
							{{-- 	<div class="text-black-50 small">#f8f9fc</div> --}}
						</div>
					</div>
				</div>
				<div class='modal-body'>Nội dung: <b>
					<textarea class="form-control" name='NoidungLBC' value='' id='NoidungLBC' required></textarea>
				</b></div>

				<div class='modal-body'>Phòng:
					<div class="form-group">
						<select class="custom-select" name="MaPhong">
							@for($i=0;$i<count(LichbaocaoController::getPhong());$i++)
							<option value="{{ LichbaocaoController::getPhong()[$i]->maphong }}">
								{{ LichbaocaoController::getPhong()[$i]->tenphong }}
							</option>
							@endfor
						</select>   
					</div>
				</div>
				<div class='modal-body'>Thứ hàng tuần:
					<div class="form-group">
						<select class="custom-select" name="MaThu">								
							<option value="1">
								Thứ 2
							</option>
							<option value="2">
								Thứ 3
							</option>
							<option value="3">
								Thứ 4
							</option>
							<option value="4">
								Thứ 5
							</option>
							<option value="5">
								Thứ 6
							</option>
							<option value="6">
								Thứ 7
							</option>
							<option value="7">
								Chủ Nhật
							</option>						
						</select>   
					</div>
				</div>
			</form>
			<div class='modal-footer'>
				<button class='btn btn-secondary'type='button' data-dismiss='modal'>Thoát</button>
				<button type='submit' id='insert_dt' name='saveButton' class='btn btn-primary'>Thêm mới</button>
			</div>
		</div>     
	</div>
</div> -->

<!-- Modal update -->
<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class='modal-content'>
				<form id="modal_form" enctype="multipart/form-data">
					<!-- csrf_token -->
					<meta name="csrf-token" content="{{ csrf_token() }}">
					<div class='modal-header'>
						<h5 class='modal-title' id='exampleModalLabel'>Chỉnh sửa lịch báo cáo</h5>
						<button class='close' type='button' data-dismiss='modal' aria-label='Close'>
							<span aria-hidden='true'>×</span>
						</button>
					</div>
					<div class='modal-body'>
						<div class="card bg-secondary text-white shadow">
							<div class="card-body">
								<!-- Mô tả: Xếp lịch báo cáo <b style="color:red">đột xuất</b> cho tất cả các tuần của tất cả các đề tài thuộc đồ án hiện tại. -->
							</div>
						</div>
					</div>
					<div class='modal-body'>Nội dung: <b>
						<textarea class="form-control" name='NoidungLBC_update' value='' id='NoidungLBC_update' required></textarea>
					</b></div>

					<div class='modal-body'>Phòng:
						<div class="form-group">
							<select class="custom-select" name="MaPhong_update" id="MaPhong_update">
								@for($i=0;$i<count(LichbaocaoController::getPhong());$i++)
								<option value="{{ LichbaocaoController::getPhong()[$i]->maphong }}">
									{{ LichbaocaoController::getPhong()[$i]->tenphong }}
								</option>
								@endfor
							</select>   
						</div>
					</div>
					<div class="modal-body">
						<div class="form-group">
							Ngày báo cáo:
							<input type="date" class="form-control" id="NgayBC_update">
						</div>
					</div>	
				</form>
				<div class='modal-footer'>
					<button class='btn btn-secondary'type='button' data-dismiss='modal'>Thoát</button>
					<button type='submit' id='update_lbc1' data-id='' name='saveButton' class='btn btn-primary'>Cập nhật</button>
				</div>
			</div>     
		</div>
</div>

<!-- Modal question -->
<div class="modal fade" id="modal_question" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class='modal-content'>
		<div class='modal-header'>
			<!-- hidden MaLBC -->
				<input type="hidden" id="KtLBC">			
					<h5 class='modal-title' id='exampleModalLabel'>Thông tin lịch báo cáo</h5>
					<button class='close' type='button' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>×</span>
					</button>
				</div>
				<div class='modal-body'>
						<div class="card bg-light text-black shadow">
						<div class="card-body" id='NoidungLBC_info'>
						</div>	
						</div>
						<hr>
						<div class="card bg-secondary text-white shadow">
						<button type='submit' id='update_lbc' name='saveButton' class='btn btn-primary'>Chỉnh sửa</button>
						<button data-id="" class='btn btn-danger' id="del_lbc" type='button' data-dismiss='modal'>Xóa</button>
						</div>

				</div>
			<div class='modal-footer'>
				<!-- <button class='btn btn-secondary' type='button' data-dismiss='modal'>Thoát</button>
				<button type='submit' id='insert_lbcall' name='saveButton' class='btn btn-primary'>Thêm mới</button> -->
			</div>
		</div>     
	</div>
</div>

</div>
@include('view/footergv')
<script type="application/javascript">

		// Lấy nội dung HTML
		function getND(a) {
		document.getElementById('NoidungLBC_all').value='';
		var ND = document.getElementById(a).innerHTML;
		document.getElementById('NoidungLBC_all').value=ND;
	}
	const MaDA = {{ $MaDA }};
	$(document).ready(function () {
		// Ẩn modal sự kiện
		$('#modal').on('hidden.bs.modal', function (e) {
			$(this).find("input,textarea,select").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
		});
		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
			}
		});
		//Thêm lịch báo cáo all
		$('#insert_lbcall').on('click',function(){
			var NoidungLBC = $('#NoidungLBC_all').val();
			var MaPhong = $('#MaPhong_all').val();
			var MaThu = $('#MaThu_all').val();
			$.ajax({
				url: "{{URL::to('/action_LBC')}}",
				type: "POST",
				data: {
					type: "add_all",
					NoidungLBC: NoidungLBC,
					MaPhong: MaPhong,
					MaThu: MaThu,
					MaDA: MaDA,
					
				},
				success:function(data){
					calendar.fullCalendar('refetchEvents');
					$('#modal_all').modal('hide');
					console.log(data);
					
				}

			});

		});
		//Thêm lịch báo cáo đột xuất
		$('#insert_lbcdotxuat').on('click',function(){
			var NoidungLBC = $('#NoidungLBC_dotxuat').val();
			var MaPhong = $('#MaPhong_dotxuat').val();
			var NgayBC = $('#NgayBC_dotxuat').val();
			$.ajax({
				url: "{{URL::to('/action_LBC')}}",
				type: "POST",
				data: {
					type: "add_dotxuat",
					NoidungLBC: NoidungLBC,
					MaPhong: MaPhong,
					NgayBC: NgayBC,
					MaDA: MaDA,
					
				},
				success:function(data){
					calendar.fullCalendar('refetchEvents');
					$('#modal_dotxuat').modal('hide');
					console.log(data);
				}

			});

		});


		$(document).on('click','#insert_lbc',function(){

			var NoidungLBC = $('#NoidungLBC').val();
			var Phong = $('select[name="MaPhong"]').val();
			var NgayBC = $('#NgayBC').val();

			$.ajax({
				url: "{{ URL::to('/action_LBC') }}",
				type: "POST",
				data:{
					NoidungLBC: NoidungLBC,
					NgayBC: NgayBC,
					Phong: Phong,
					type: 'add'
				},
				success:function(data)
				{
					$('#modal').modal('hide');
					console.log(data);
					calendar.fullCalendar('refetchEvents');
					// alert("Event Created Successfully");
				}
			})
		});
		//Xóa lịch báo cáo
		$('#del_lbc').click(function(){
						var eventDelete = confirm("Đồng ý xóa ?");

						var id = $(this).data('id');
						console.log(id);
					
						if(eventDelete){
							// console.log(id);
							$.ajax({
							url:"{{ URL::to('/action_LBC') }}",
							type:"POST",
							data:{
								id:id,							
								type:"delete"
							},
							success:function(response)
							{
								console.log(response);
								calendar.fullCalendar('refetchEvents');
								$('#modal_question').modal('hide');
								alert("Xóa thành công");
							}
							});
						}
					});
		//Chỉnh sửa lịch báo cáo
		$('#update_lbc').click(function(){
			$('#modal_question').modal('hide');	
			$('#modal_update').modal('show');
		});
		$('#update_lbc1').click(function(){

			var eventDelete = confirm("Cập nhật ?");
						var id = $(this).data('id');
						console.log(id);
						var Kt = $('#KtLBC').val();
						var NoidungLBC = $('#NoidungLBC_update').val();
						var MaPhong = $('select[name="MaPhong_update"]').val();
						var NgayBC = $('#NgayBC_update').val();
						if(eventDelete){
							// console.log(id);
							$.ajax({
							url:"{{ URL::to('/action_LBC') }}",
							type:"POST",
							data:{
								id:id,
								Kt:Kt,
								NoidungLBC: NoidungLBC,
								MaPhong: MaPhong,
								NgayBC: NgayBC,
								type:"update"
							},
							success:function(response)
							{
								console.log(response);
								calendar.fullCalendar('refetchEvents');
								$('#modal_update').modal('hide');
								alert("Cập nhật thành công");
							}
							});
						}
		});

		// declare calendar
		var site = "{{URL::to('/')}}";
		var calendar = $('#calendar').fullCalendar({
			timezone: 'Asian/Ho_Chi_Minh',
			locale: 'vi',
			themeSystem: 'bootstrap4',
			// editable:true,			
			header:{
				left:'prev,next today',
				center:'title',
				right:'month,agendaWeek,agendaDay'
			},
			events: site + "/getdata_LBC",
			selectable:true,
			selectHelper: true,
			eventSources: [{
				url: site + "/getdata_LBC",				
				data:{
					MaDA: MaDA,
				}
			}],
			select:function(start, end, allDay)
			{
				
				var start = $.fullCalendar.formatDate(start, 'Y-MM-DD');
				$('#modal_dotxuat').on('shown.bs.modal', function (e) {					
					$('#NgayBC_dotxuat').val(start);
				});	
				$('#modal_dotxuat').modal('show');
				
				// var end = $.fullCalendar.formatDate(end, 'Y-MM-DD');
			},
			
			eventClick:function(event)
			{
				
					var id = event.MaLBC;
					var Kt = event.Kt;
					var type ='';
					if(Kt == '1')
						type = 'Đột xuất';
					else
						type = 'Hàng tuần';
					var Nd = 'Nội dung: '+ event.NoidungLBC +'<hr>'+'Phòng: '+event.tenphong+'<hr>'+'Ngày: '+event.NgayBC+'<hr>'+'Loại: '+type;
					$('#del_lbc').data('id',id);
					$('#update_lbc1').data('id',id);
					$('#KtLBC').val(Kt);

					// set value update
					$('#NoidungLBC_update').val(event.NoidungLBC);
					$('select[name="MaPhong_update"]').val(event.maphong);
					$('#NgayBC_update').val(event.NgayBC);

					$('#NoidungLBC_info').html(Nd);
					$('#modal_question').modal('show');
					
				
			}
		});
	});

</script>