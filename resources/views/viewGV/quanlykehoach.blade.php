<?php 
  use App\Http\Controllers\KehoachthuchienController;
  use App\Http\Controllers\DetaiController;

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
			<li class="breadcrumb-item active" aria-current="page">Kế hoạch thực hiện</li>
		</ol>
	</nav>
	<div class="row">

	</div>
	<div class="card shadow mb-4">
		<div class="card-header py-3" id="title">

			<h6 class="m-0 font-weight-bold text-primary">Danh sách đề tài</h6>
			<br>
		</div>  
		<div class="col-xl-auto col-md-auto mb-auto">
			<div class="card border-bottom-success shadow h-100 py-2">
				<div class="card-body">
					<div class="table-responsive">
            <table class="table  table-hover table-bordered" id="dataaa" width="100%" cellspacing="0">
              <thead style="background-color: #2D4154FF; color: white;" >
                <tr>
                  <th width="5%">STT</th>
                  <th width="35%">Tên đề tài</th>
                  <th width="15%">Sinh viên thực hiện</th>
                  <th width="20%">Tiến độ</th>
                  <th width="20%">Đánh giá</th>
                  <th width="5%">#</th>
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
<!-- Modal them KHTH -->
  <div class="modal fade" id="modal_addKHTH" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class='modal-content'>
        <form id="modal_form" enctype="multipart/form-data">
          <!-- csrf_token -->
          <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
        <!--   hidden KHTH -->
       
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Thêm kế hoạch thực hiện</h5>
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

          <div class='modal-body'>Nội dung thực hiện: <b>
            <textarea class="form-control" name='Noidungthuchien_addKHTH' value='' id='Noidungthuchien_addKHTH' required></textarea>
          </b></div>
          <div class="modal-body">
            <div class="form-group">
              Ngày bắt đầu:
              <input type="date" class="form-control" id="NgayBD_addKHTH" name="NgayBD_addKHTH">
            </div>
          </div> 
          <div class="modal-body">
            <div class="form-group">
              Ngày bắt đầu:
              <input type="date" class="form-control" id="NgayKT_addKHTH" name="NgayKT_addKHTH">
            </div>
          </div>  
        </form>
        <div class='modal-footer'>
          <button class='btn btn-secondary'type='button' data-dismiss='modal'>Thoát</button>
          <button type='submit' id='insert_KHTH' data-id='' name='saveButton' class='btn btn-primary'>Thêm</button>
        </div>
      </div>     
    </div>
  </div>
<!--   Modal edit KHTH -->
  <div class="modal fade" id="modal_editKHTH" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class='modal-content'>
        <form id="modal_form" enctype="multipart/form-data">
          <!-- csrf_token -->
          <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
        <!--   hidden KHTH -->
       
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Chỉnh sửa kế hoạch thực hiện</h5>
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

          <div class='modal-body'>Nội dung thực hiện: <b>
            <textarea class="form-control" name='Noidungthuchien_editKHTH' value='' id='Noidungthuchien_editKHTH' required></textarea>
          </b></div>
          <div class="modal-body">
            <div class="form-group">
              Ngày bắt đầu:
              <input type="date" class="form-control" id="NgayBD_editKHTH" name="NgayBD_editKHTH">
            </div>
          </div> 
          <div class="modal-body">
            <div class="form-group">
              Ngày bắt đầu:
              <input type="date" class="form-control" id="NgayKT_editKHTH" name="NgayKT_editKHTH">
            </div>
          </div>  
        </form>
        <div class='modal-footer'>
          <button class='btn btn-secondary'type='button' data-dismiss='modal'>Thoát</button>
          <button type='submit' id='update_KHTH' data-id='' name='saveButton' class='btn btn-primary'>Cập nhật</button>
        </div>
      </div>     
    </div>
  </div>
<!--   modal thong tin KHTH -->
  <div class="modal fade" id="modal_infoKHTH" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class='modal-content'>
        <!-- csrf_token -->
        <input type="hidden" id="MaKHTH">
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Thông tin kế hoạch thực hiện</h5>
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
        <div class='modal-body'>Mô tả: <b>
         <div class="form-group">
          <textarea class="form-control" id='Mota'  disabled name="Mota" value="filedasdsadasd.pdf"></textarea>
        </div>
      </b>
    </div>
    <div class='modal-body'>Sản phẩm: <b>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-8">
            <input class="form-control" id='Sanpham' type="text" disabled name="" >
          </div>
          <div class="col-sm-4">
            <div  id="download"> 
          </div>
          </div>
        </div>

      </div>
    </b></div>
    <div class='modal-body'>Chú thích: <b>
      <div class="form-group">
        <textarea class="form-control" id='Chuthich'  name="Chuthich"></textarea>
      </div>
    </b>
  </div>

  <div class='modal-body'>Đánh giá: <b>
    <div class="form-group">
      <select class="custom-select" name="Danhgia">
        <option value="0">Chưa đạt</option>
        <option value="1">Đạt</option>  
      </select>   
    </div>
  </b></div>
  <div class='modal-footer'>
    <button class='btn btn-secondary'type='button' data-dismiss='modal'>Thoát</button>
    <button type='submit' id='update_SP' data-id='' name='saveButton' class='btn btn-primary'>Đánh giá</button>
  </div>
</div>     
</div>
</div>

@include('view/footergv')
<script type="text/javascript">

  $(document).ready(function(){
   var MaDA = {{$MaDA}};
   var table = $('#dataaa').DataTable( {
  // "dom" : 'Bfrtip',
  // "buttons" : [
  // 'copy', 'csv', 'excel', 'pdf', 'print'
  // ],
  destroy: true,
  "ajax": "{{ URL::to('getdata_quanlykehoach/') }}"+"/"+MaDA,
  "columns": [
  {
   "title": "STT",
   "width": "5%",  
   "data": "STT" 
 },
 {
   "title": "Tên đề tài", 
   "width": "35%", 
   "data": "TenDT" 
 },
 {
  "title": "Sinh viên thực hiện", 
  "width": "15%",  
  "data": null,
  render: function(data, type, row) {

    let c = Math.floor((row.soluong*100)/row.SoluongSV);
    let sinhvienthuchien ="";
    if(row.sinhvienthuchien.length>0){
      for(var i = 0; i < row.sinhvienthuchien.length; i ++)
      {
       if(i < row.sinhvienthuchien.length-1 ){

        sinhvienthuchien+="<b>"+row.sinhvienthuchien[i].HotenSV+"</b>, "+"<br>";

      }
      else{
        sinhvienthuchien+="<b>"+row.sinhvienthuchien[i].HotenSV+"</b>"; 
      }
    }
  }
  else
    sinhvienthuchien = `${row.soluong}/${row.SoluongSV}
  <div class="progress mb-4">
  <div class="progress-bar bg-danger" role="progressbar" style="width:${c}%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>`;
  return `${sinhvienthuchien}`;

}
},
{
 "title": "Tiến độ", 
 "width": "20%", 
 "data": null,
 render: function(data,type,row){
  let c = Math.floor((row.countSP*100)/row.countKHTH);
  return `${row.countSP}/${row.countKHTH}<div class="progress mb-4">
  <div class="progress-bar bg-danger" role="progressbar" style="width:${c}%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>`;
}  
},
{
 "title": "Mức độ hoàn thành",
 "width": "20%",  
 "data": null,
 render: function(data,type,row){
   let c = Math.floor((row.countDG*100)/row.countSP);
   return `${row.countDG}/${row.countSP}<div class="progress mb-4">
   <div class="progress-bar bg-danger" role="progressbar" style="width:${c}%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>`;
 } 
},
{
  "title": "#",
  "width": "5%",   
  "data": null,
  render: function(data, type, row) { 
   return `<td style='text-align:center'><button data-id2="${row.TenDT}" data-id="${row.MaDT}" class="btn btn-sm btn-success" id="KHTH_info">Xem</button></td>`;
 }
},

],

});

   var tableKHTH;
   function load_khth(MaDT){
    return $.ajax({
      url: "{{ URL::to('getdata_quanlykehoach2') }}",
      type: "get",
      dataType: 'json',
      data: {
        "MaDT": MaDT,
      },
      success: function(data) {
        tableKHTH = $('#dataaa2').DataTable( {
          "destroy":true,
          "data": data.data,
          "columns": [
          { 
            "width": "15%", 
            "title": "Tuần",
            "data": "Tuan",
          },  
          {
            "width": "20%", 
            "title": "Nội dung thực hiện",
            "data": "Noidungthuchien", 
          },
          {
            "width": "10%", 
            "title": "Thời hạn",
            "data": 'Thoihan' ,
          // render: function(data, type, row){

          // } 
        },
        {
          "width": "10%", 
          "title": "Sản phẩm",
          "data": "Sanpham", 
        },
        {
          "width": "10%", 
          "title": "Đánh giá",
          "data": null,
          render: function(data,type,row){
            if(row.Danhgia==0){
              return `<span class="btn btn-sm btn-danger" >Chưa đạt</span>`;
            }
            else if(row.Danhgia==1){
              return `<span class="btn btn-sm btn-success" >Đạt</span>`;
            }
            else if(row.Danhgia=='false'){
              return ``;
            }
            else {
              return `Chưa đánh giá`;
            }
          }
        },
        {
          "width": "10%", 
          "title": "Chú thích", 
          "data": "Chuthich",

        },
        {  
          "width": "5%", 
          "title": "#", 
          "data": null,
          render: function(data, type, row) { 
            if(row.MaKHTH=='')
              return `<td style='text-align:center'><button class="btn btn-sm btn-secondary"><i class="fas fa-ban"></i></i></button> </td>`; 
            else
              return `<td style='text-align:center'><button data-id2="${row.MotaSP}" data-id="${row.MaKHTH}" class="btn btn-sm btn-success" id="info_KHTH"><i class="fas fa-eye"></i></button> </td>`;
         }
       },
       {  
        "width": "5%", 
        "title": "#", 
        "data": null,
        render: function(data, type, row) {
        if(row.MaKHTH!='')
          return `<td style='text-align:center'><button data-id1="${row.NgayBD}" data-id2="${row.NgayKT}" data-id3="${row.MaKHTH}" class="btn btn-sm btn-primary" id="edit_KHTH"><i class="fas fa-edit"></i></button> </td>`;
        else 
          return `<td style='text-align:center'><button data-id1="${row.NgayBD}" data-id2="${row.NgayKT}" class="btn btn-sm btn-primary" id="add_KHTH"><i class="fas fa-plus-circle"></i></button> </td>`;
       }
     }

     ],

   }); 
      }
    })
  }
//show khth
$(document).on('click', '#KHTH_info', function() { 
	// alert('hello');
  var MaDT = $(this).data('id');
  var TenDT = $(this).data('id2');
  table.clear().draw();
  $(table.table().container()).css( 'display','none');
  document.getElementById('title').innerHTML=`<a id="back" href="javascript:void(0)" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-circle-left"></i></i></span><span class="text">Trở lại</span></a><hr>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  Đề tài : ${TenDT}
  </ol>
  </nav><h6 class="m-0 font-weight-bold text-primary">Kế hoạch thực hiện</h6>
  <input type="hidden" value="${MaDT}" id="MaDT">`;

  load_khth(MaDT);  

});
//back
$(document).on('click', '#back', function() {
 tableKHTH.clear().draw();
 $(table.table().container()).css( 'display','block'); 
 $(tableKHTH.table().container()).css( 'display','none'); 

 document.getElementById('title').innerHTML='<h6 class="m-0 font-weight-bold text-primary">Danh sách đề tài</h6><br>';
 table.ajax.reload();
});
//show modal addKHTH
$(document).on('click','#add_KHTH',function(){
  var NgayBD = $(this).data('id1');
  var NgayKT = $(this).data('id2');

  $('#NgayBD_addKHTH').attr('min',NgayBD);
  $('#NgayBD_addKHTH').attr('max',NgayKT);
  $('#NgayKT_addKHTH').attr('min',NgayBD);
  $('#NgayKT_addKHTH').attr('max',NgayKT);
  $('#modal_addKHTH').modal('show');
});
$('#modal_addKHTH').on('hidden.bs.modal', function (e) {
  $(this)
  .find("input,textarea,select")
  .val('')
  .end()
  .find("input[type=checkbox], input[type=radio]")
  .prop("checked", "")
  .end();
});
//insert KHTH
$(document).on('click','#insert_KHTH',function(){
  $.ajax({
    url:"{{ URL::to('action_KHTH') }}",
    type: "post",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: 'json',
    data:{
      "MaDT": $('#MaDT').val(),
      "Noidungthuchien": $('#Noidungthuchien_addKHTH').val(),
      "NgayBD": $('input[name="NgayBD_addKHTH"]').val(),
      "NgayKT": $('input[name="NgayKT_addKHTH"]').val(),
      "type": 'insert',
    },
    success: function(response) {
      console.log(response);
      load_khth($('#MaDT').val());
      $('#modal_addKHTH').modal('hide');
      // $('#success_tic').modal('show');

    }
  });
});
// show edit modal
$(document).on('click','#edit_KHTH',function(){
  var NgayBD = $(this).data('id1');
  var NgayKT = $(this).data('id2');
  var MaKHTH = $(this).data('id3');

  $('#NgayBD_editKHTH').attr('min',NgayBD);
  $('#NgayBD_editKHTH').attr('max',NgayKT);
  $('#NgayKT_editKHTH').attr('min',NgayBD);
  $('#NgayKT_editKHTH').attr('max',NgayKT);
  $.ajax({
    url:"{{ URL::to('getdata_quanlykehoach3') }}",
    type: "get",
    dataType: 'json',
    data:{
      "MaKHTH": $(this).data('id3'),
      "type": 'getdata_update',
    },
    success: function(response) {
      console.log(response);
      $('#update_KHTH').attr('data-id',response.data.MaKHTH);
      $('#Noidungthuchien_editKHTH').val(response.data.Noidungthuchien);
      $('#NgayBD_editKHTH').val(response.data.NgayBD);
      $('#NgayKT_editKHTH').val(response.data.NgayKT);
      $('#modal_editKHTH').modal('show');
      // $('#success_tic').modal('show');

    }
  });
  
});
$('#modal_editKHTH').on('hidden.bs.modal', function (e) {
  $(this)
  .find("input,textarea,select")
  .val('')
  .end()
  .find("input[type=checkbox], input[type=radio]")
  .prop("checked", "")
  .end();
});
// update KHTH
$(document).on('click','#update_KHTH',function(){
  $.ajax({
    url:"{{ URL::to('action_KHTH') }}",
    type: "post",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: 'json',
    data:{
      "MaKHTH": $(this).data('id'),
      "Noidungthuchien": $('#Noidungthuchien_editKHTH').val(),
      "NgayBD": $('input[name="NgayBD_editKHTH"]').val(),
      "NgayKT": $('input[name="NgayKT_editKHTH"]').val(),
      "type": 'update_dataKHTH',
    },
    success: function(response) {
      console.log(response);
      load_khth($('#MaDT').val());
      $('#modal_editKHTH').modal('hide');
      // $('#success_tic').modal('show');

    }
  });
});

//show modal info
$(document).on('click','#info_KHTH',function(){
  $.ajax({
    url:"{{ URL::to('getdata_quanlykehoach3') }}",
    type: "get",
    dataType: 'json',
    data:{
      "MaKHTH": $(this).data('id'),
      "type": "getdata",
    },
    success: function(response) {
      console.log(response.data.MaKHTH);

      $('#modal_infoKHTH').modal('show');
      $('textarea[name="Mota"]').val(response.data.MotaSP);
      $('#Sanpham').val(response.data.Sanpham);
      $('textarea[name="Chuthich"]').val(response.data.Chuthich);
      $('select[name="Danhgia"]').val(response.data.Danhgia);
      $('#MaKHTH').val(response.data.MaKHTH);

      if(response.data.Sanpham!='Chưa nộp sản phẩm')
      {
       document.getElementById('download').innerHTML=`<a data-id="${response.data.Sanpham}" id='dowload_file' href="javascript:void(0)" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-file-download"></i></span><span class="text">Tải xuống</span></a>`;
     }
     else{
      document.getElementById('download').innerHTML='';
    }

  }
});

});
$('#modal_infoKHTH').on('hidden.bs.modal', function (e) {
  $(this)
  .find("input,textarea,select")
  .val('')
  .end()
  .find("input[type=checkbox], input[type=radio]")
  .prop("checked", "")
  .end();
});

// đánh giá sản phẩm
$(document).on('click','#update_SP',function(){
   $.ajax({
    url:"{{ URL::to('action_KHTH') }}",
    type: "post",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: 'json',
    data:{
      "MaKHTH": $('#MaKHTH').val(),
      "Danhgia": $('select[name="Danhgia"]').val(),
      "Chuthich": $('textarea[name="Chuthich"]').val(),
      "type": 'updateSP',
    },
    success: function(response) {
      console.log(response);
      load_khth($('#MaDT').val());
      $('#modal_infoKHTH').modal('hide');
      // $('#success_tic').modal('show');

    }
  });
});
//Tải file
$(document).on('click','#dowload_file',function(){
var SP =  $(this).data('id');
  var URL = "{{URL::to('public/fil/')}}";
  window.open(URL+'/'+SP);

});


});
</script>