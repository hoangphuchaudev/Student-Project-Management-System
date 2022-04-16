<?php 
use App\Http\Controllers\DetaiController;
?>
@include('view/adminleftgv')
@include('view/topcontengv')

<div class="container-fluid">

  <!-- Page Heading -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('giangvien') }}">Đồ án</a></li>&nbsp>&nbsp
      <li aria-current="page"><a href="{{ URL::to('qldoan/'.$MaDA) }}">{{ $TenDA }}</a></li>&nbsp>&nbsp
      <li class="breadcrumb-item active" aria-current="page">Quản lý đề tài</li>
    </ol>
  </nav>
<!-- <iframe src="https://danso.org/bdds/?country=an-do" frameborder="0" scrolling="no" width="800" height="400"></iframe><p>Nguồn: <a href="https://danso.org/an-do/">https://danso.org/an-do/</a></p> -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng số lượng đề tài</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $Soluong }}</div>
              <hr>
               <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Số lượng đề tài đang thực hiện</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $SoluongSVDK }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calculator fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Học kỳ hiện tại</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $Hocky->TenHK }}, {{ $Hocky->NienkhoaHK }}</div>
              <hr>
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Thời gian</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">{{ date('d/m/Y', strtotime($Hocky->ThoigianBDHK)) }} - {{ date('d/m/Y', strtotime($Hocky->ThoigianKTHK)) }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clock fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4" id="task_dexuat"> 
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Đề tài đề xuất</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $SoluongDX }}<sub style="font-size: 12px;">(Đề xuất của sinh viên)</sub></div>
              <hr>
              <a  href="javascript:void(0)" id="dexuat">Xem chi tiết</a>
            </div>
            <div class="col-auto">
              <i class="fas fa-folder-open  fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4" id="task_dsdetai"> 
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Danh sách  đề tài</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $TongsoluongDT }}<sub style="font-size: 12px;">(Tổng số đề tài các học kỳ)</sub></div>
              <hr>
              <a  href="javascript:void(0)" id="dsdetai">Xem chi tiết</a>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3" id="title">
      <h6 class="m-0 font-weight-bold text-primary">Danh sách đề tài</h6>
      <button type='submit' id='insert' name='saveButton' class='btn btn-primary' data-toggle='modal' data-target='#modal' style="float: right;">Thêm đề tài</button>

    </div>  
    <div class="col-xl-auto col-md-auto mb-auto">
      <div class="card border-bottom-success shadow h-100 py-2">

       <div class="form-group col-xl-auto col-md-auto mb-auto " style="width: 50%; " id="select_box">
        <select class="form-control" id="brand" name="brand">
          <option value="null">--Chọn học kỳ--</option>
          @for($i=0;$i<count(DetaiController::getallHK());$i++)
          <option value="{{ DetaiController::getallHK()[$i]->MaHK }}">{{ DetaiController::getallHK()[$i]->TenHK }}, {{ DetaiController::getallHK()[$i]->NienkhoaHK }}</option>
          @endfor
        </select>
        <input type="hidden" name="MaDA" value="{{ $MaDA }}">
      </div>

      <div class="card-body">
        <div class="table-responsive">
          {{-- <table class="table table-bordered table" id="dataaa" width="100%" cellspacing="0" > --}}
            <table class="table table-striped table-hover table-bordered" id="dataaa" width="100%" cellspacing="0">
            <thead style="background-color: #2D4154FF; color: white;" >
              <tr>
                <th width="5%">STT</th>
                <th width="20%">Tên đề tài</th>
                <th width="15%">Thời hạn</th>
                <th width="20%">Sinh viên thực hiện</th>
                <th width="20%">Lĩnh vực nghiên cứu</th>
                <th width="10%">Đồ án</th>
                <th width="5%">Xóa</th>
                <th width="5%">Sửa</th>
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

{{-- Modal insert update --}}
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class='modal-content'>
      <form id="modal_form" enctype="multipart/form-data">
        {{-- csrf_token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{--         hidden MaDT --}}
        <input type="hidden" name="MaDT">
        <input type="hidden" name="MaDA">
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Cập nhật đề tài</h5>
          <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>×</span>
          </button>
        </div>

        <div class='modal-body'>Tên đề tài:<b>
         <textarea class="form-control" name='TenDT' value='' id='TenDT' required></textarea>
       </b></div>
       <div class='modal-body'>Sinh viên thực hiện
        <div class="form-group">
         <input type="text" class="form-control"  name="SoluongSV" maxlength="2" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
       </div>

     </div>	
      <div class='modal-body'>Ngày bắt đầu
        <div class="form-group">
         <input type="date" class="form-control"  name="NgayBD" required>
       </div>

     </div>
      <div class='modal-body'>Ngày kết thúc
        <div class="form-group">
         <input type="date" class="form-control"  name="NgayKT" required>
       </div>

     </div>

     <div class='modal-body'>Lĩnh vực nghiên cứu
      <div class="form-group">
        <select class="custom-select" name="MaLVNC">
          @for($i=0;$i<count(DetaiController::getallLVNC());$i++)
          <option value="{{ DetaiController::getallLVNC()[$i]->MaLVNC }}">
            {{ DetaiController::getallLVNC()[$i]->TenLVNC }}
          </option>
          @endfor
        </select>   
      </div>
    </div>	
  </form>
  <div class='modal-footer'>
    <button class='btn btn-secondary'type='button' data-dismiss='modal'>Thoát</button>
    <button type='submit' id='update_dt' name='saveButton' class='btn btn-primary'>Cập nhật</button>
    <button type='submit' id='insert_dt' name='saveButton' class='btn btn-primary'>Thêm mới</button>
  </div>
</div>     
</div>
</div>
{{-- end modal --}}

{{-- modal thông báo --}}
<div id="success_tic" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <a class="close" href="#" data-dismiss="modal">&times;</a>
      <div class="page-body">
        <div class="head">  
          {{-- <h3 style="margin-top:5px;">Lorem ipsum dolor sit amet</h3> --}}
          <h4>Cập nhật thành công !!</h4>
        </div>

        <h1 style="text-align:center;"><div class="checkmark-circle">
          <div class="background"></div>
          <div class="checkmark draw"></div>
        </div><h1>

        </div>
      </div>
    </div>

  </div>

  {{-- end modal --}}


</div>

@include('view/footergv')

{{-- <script> 

  $(document).ready(function(){  
    $('#brand').change(function(){  
     var brand_id = $(this).val();
     var MaGV = $("input[name='MaGV']").val();
     var MaDA = $("input[name='MaDA']").val();  
     $.ajax({  
      url:"load_data.php",  
      method:"POST",  
      data:{brand_id:brand_id ,MaGV:MaGV,MaDA:MaDA},  
      success:function(data){  
       $('#dataTable').html(data);  
     }  
   });  
   });  
  });  

</script>
--}}
<script>

  $(document).ready(function(){

    var MaDA = $("input[name='MaDA']").val();
//hide task and hide button update
$('#task_dsdetai').hide(); 
$('#update_dt').hide(); 

var tableDX;
function load_dexuat(){
  return $.ajax({
    url: "{{ URL::to('getdata_quanlydetai_dexuatdetai') }}",
    type: "get",
    dataType: 'json',
    data: {
      "MaDA": MaDA,
    },
    success: function(data) {
      document.getElementById('title').innerHTML='<h6 class="m-0 font-weight-bold text-primary">Danh sách đề xuất đề tài của sinh viên</h6>';
      $('#select_box').hide();
      $('#task_dexuat').hide();   
      $('#task_dsdetai').show();

      tableDX = $('#dataaa2').DataTable( {
        "destroy":true,
        "data": data.data,
        "columns": [
        { 
          "width": "5%", 
          "title": "STT",
          "data": "STT" 
        },
        {
          "width": "20%", 
          "title": "Sinh viên đề xuất",
          "data": "HotenSV" 
        },  
        {
          "width": "20%", 
          "title": "Tên đề tài",
          "data": "TenDT" 
        },
        {
          "width": "10%", 
          "title": "Số lượng sinh viên",
          "data": "SoluongSV" 
        },
        {
          "width": "20%", 
          "title": "Lĩnh vực nghiên cứu",
          "data": "TenLVNC" 
        },
        {
          "width": "10%", 
          "title": "ĐA",
          "data": "TenDA" 
        },
        {
          "width": "5%", 
          "title": "Xóa", 
          "data": null,
          render: function(data, type, row) { 
           return `<td style='text-align:center'><button data-id="${row.id}" class="btn btn-sm btn-success" id="insert_dx">Duyệt</button></td>`;
         }
       },
       {
        "width": "5%", 
        "title": "Sửa", 
        "data": null,
        render: function(data, type, row) { 
         return `<td style='text-align:center'><button data-id="${row.id}" class="btn btn-sm btn-warning" id="delete_dx">Hủy</button> </td>`;
       }
     }

     ],

   }); 
    }
  })
}
//load table
var table = $('#dataaa').DataTable( {
  "dom" : 'Bfrtip',
  "buttons" : [
  'copy', 'csv', 'excel', 'pdf', 'print'
  ],
  destroy: true,
  "ajax": "{{ URL::to('getdata_quanlydetai/') }}"+"/"+MaDA,
  "columns": [
  {
   "title": "STT",
   "width": "5%",  
   "data": "STT" 
 },
 {
   "title": "Tên đề tài", 
   "width": "20%", 
   "data": "TenDT" 
 },
{
   "title": "Thời hạn", 
   "width": "15%", 
   "data": null,
    render: function(data, type, row) {
      if(row.NgayBD!=null&&row.NgayKT!=null){
      var NgayBD = moment(row.NgayBD).format('DD/MM');
      var NgayKT = moment(row.NgayKT).format('DD/MM');
      return `${NgayBD} - ${NgayKT}`;
      }
      else
        return ``;

    }
 },
 {
  "title": "Sinh viên thực hiện", 
  "width": "20%",  
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
    return `${sinhvienthuchien}
    <input type="hidden" id='MaHK' value="{{ DetaiController::getMaHocKy_now() }}">`;

  }
},
{
 "title": "Lĩnh vực nghiên cứu", 
 "width": "20%", 
 "data": "TenLVNC" 
},
{
 "title": "Đồ án",
 "width": "10%",  
 "data": "TenDA" 
},
{
  "title": "Xóa",
  "width": "5%",   
  "data": null,
  render: function(data, type, row) {

    if(row.soluong>0){
      return `<td style='text-align:center'><button type="button" class="btn btn-secondary disabled"><i class='fas fa-ban'></i></button></td>`;  
    }
    else{
     return `<td style='text-align:center'><button type="button" class="btn btn-danger" id='delete_dt' data-id="${row.MaDT}">
     <i class='fas fa-trash-alt'></i>
     </button>
     </td>`;
   }


 }
},
{
  "title": "Sửa",
  "width": "5%",   
  "data": null,
  render: function(data, type, row) {
   return `<td style='text-align:center'><button type="button" class="btn btn-primary" data-toggle='modal' data-target='#modal' id='edit' data-id="${row.MaDT}" ><i class='fas fa-edit'></i></button> </td>`;    
 }
}

],

});

//select table
$('#brand').change(function(){
  table.clear().draw();
  var brand_id = $(this).val();
  if(brand_id == "null")
    table.ajax.reload();
  else
    table = $('#dataaa').DataTable( {
      "dom" : 'Bfrtip',
      "buttons" : [
      'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      "destroy":true,
      "ajax": "{{ URL::to('getdata_quanlydetai/') }}"+"/"+brand_id+"/"+MaDA,
      "columns": [
  {
   "title": "STT",
   "width": "5%",  
   "data": "STT" 
 },
 {
   "title": "Tên đề tài", 
   "width": "20%", 
   "data": "TenDT" 
 },
 {
   "title": "Thời hạn", 
   "width": "15%", 
   "data": null,
    render: function(data, type, row) {
      if(row.NgayBD!=null&&row.NgayKT!=null){
      var NgayBD = moment(row.NgayBD).format('DD/MM');
      var NgayKT = moment(row.NgayKT).format('DD/MM');
      return `${NgayBD} - ${NgayKT}`;
      }
      else
        return ``;

    }
 },
 {
  "title": "Sinh viên thực hiện", 
  "width": "20%",  
  "data": null,
  render: function(data, type, row) {

    let c = Math.floor((row.soluong*100)/row.SoluongSV);
    let sinhvienthuchien ="";
    if(row.sinhvienthuchien.length>0){
      for(var i = 0; i < row.sinhvienthuchien.length; i ++)
      {
        sinhvienthuchien+=row.sinhvienthuchien[i].HotenSV+"<br>";
      }
    }
    else
    sinhvienthuchien = `${row.soluong}/${row.SoluongSV}
        <div class="progress mb-4">
        <div class="progress-bar bg-danger" role="progressbar" style="width:${c}%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>`;
    return `${sinhvienthuchien}
    <input type="hidden" id='MaHK' value="{{ DetaiController::getMaHocKy_now() }}">`;

  }
},
{
 "title": "Lĩnh vực nghiên cứu", 
 "width": "20%", 
 "data": "TenLVNC" 
},
{
 "title": "Đồ án",
 "width": "10%",  
 "data": "TenDA" 
},
{
  "title": "Xóa",
  "width": "5%",   
  "data": null,
  render: function(data, type, row) {

    if(row.soluong>0){
      return `<td style='text-align:center'><button type="button" class="btn btn-secondary disabled"><i class='fas fa-ban'></i></button></td>`;  
    }
    else{
     return `<td style='text-align:center'><button type="button" class="btn btn-danger" id='delete_dt' data-id="${row.MaDT}">
     <i class='fas fa-trash-alt'></i>
     </button>
     </td>`;
   }


 }
},
{
  "title": "Sửa",
  "width": "5%",   
  "data": null,
  render: function(data, type, row) {
   return `<td style='text-align:center'><button type="button" class="btn btn-primary" data-toggle='modal' data-target='#modal' id='edit' data-id="${row.MaDT}" ><i class='fas fa-edit'></i></button> </td>`;    
 }
}

],
});
});

//show danh sach de tai
$(document).on('click', '#dsdetai', function() {
 tableDX.clear().draw();
 $(table.table().container()).css( 'display','block'); 
 $(tableDX.table().container()).css( 'display','none'); 

 document.getElementById('title').innerHTML='<h6 class="m-0 font-weight-bold text-primary">Danh sách đề tài</h6> <button type="submit" id="insert" name="saveButton" class="btn btn-primary" data-toggle="modal" data-target="#modal" style="float: right;">Thêm đề tài</button>';
 $('#select_box').show();
 $('#task_dexuat').show();  
 $('#task_dsdetai').hide();
 table.ajax.reload();
});

//show de xuat
$(document).on('click', '#dexuat', function() { 
  table.clear().draw();
  $(table.table().container()).css( 'display','none'); 
  load_dexuat();  

}); 

//show modal edit   
$(document).on('click', '#edit', function() { 
  var MaHK = document.getElementById('MaHK').value;              
  $.ajax({
    url: "{{ URL::to('getdata_quanlydetai_editmodal') }}",
    type: "post",
    dataType: 'json',
    data: {
      "_token": "{{ csrf_token() }}",
      "id": $(this).data('id'),
      "MaDA": MaDA,
      "MaHK": MaHK,
    },
    success: function(data) {
      console.log(data);
      $('input[name="MaDT"]').val(data.data[0].MaDT);
      $('input[name="MaDA"]').val(data.data[0].MaDA);
      $('#TenDT').val(data.data[0].TenDT);
      $('input[name="SoluongSV"]').val(data.data[0].SoluongSV);
      $('input[name="NgayBD"]').val(data.data[0].NgayBD);
      $('input[name="NgayKT"]').val(data.data[0].NgayKT);
      $('select[name="MaLVNC"]').val(data.data[0].MaLVNC);
      $('#update_dt').show(); 
      $('#insert_dt').hide(); 
    }
  })
});

//show modal insert
$('#modal').on('hidden.bs.modal', function (e) {
  $(this)
  .find("input,textarea,select")
  .val('')
  .end()
  .find("input[type=checkbox], input[type=radio]")
  .prop("checked", "")
  .end();
  $('#update_dt').hide(); 
  $('#insert_dt').show();
});

//update de tai
$(document).on('click', '#update_dt', function() {
  if(confirm('Bạn có muốn cập nhật dữ liệu ?')) {
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "{{ URL::to('update_detai') }}",
    type: 'POST',
    dataType: 'json',
    data: $('#modal_form').serialize(),
    success: function(response) {
      console.log(response);
      $('#modal_form')[0].reset();
      table.ajax.reload();
      $('#modal').modal('hide');
      $('#success_tic').modal('show');

    }
  })
  }
}); 

//insert de tai
$(document).on('click', '#insert_dt', function() {

  if(confirm('Bạn có muốn cập nhật dữ liệu ?')) {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ URL::to('insert_detai') }}"+"/"+MaDA,
      type: 'POST',
      dataType: 'json',
      data: $('#modal_form').serialize(),
      success: function(response) {
        console.log(response);
        $('#modal_form')[0].reset();
        table.ajax.reload();
        $('#modal').modal('hide');
        $('#success_tic').modal('show');

      }
    })
  }
});

//delete de tai
$(document).on('click', '#delete_dt', function() {  
  if(confirm('Bạn có muốn cập nhật dữ liệu ?')) {     
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "{{ URL::to('delete_detai') }}",
    type: "POST",
    dataType: 'json',
    data: {
      "MaDT": $(this).data('id'),
    },
    success: function(data) {
      table.ajax.reload();
      $('#success_tic').modal('show');
    }
  });
  }
});

//insert de xuat
$(document).on('click', '#insert_dx', function() {

  if(confirm('Bạn có muốn cập nhật dữ liệu ?')) {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ URL::to('/insert_dexuat') }}",
      type: 'POST',
      dataType: 'json',
      data: {
        "id": $(this).data('id'),
      },
      success: function(response) {
        console.log(response);
        load_dexuat();


      }
    })
  }
});
// delete de xuat
$(document).on('click', '#delete_dx', function() {

  if(confirm('Bạn có muốn cập nhật dữ liệu ?')) {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ URL::to('/delete_dexuat') }}",
      type: 'POST',
      dataType: 'json',
      data: {
        "id": $(this).data('id'),
      },
      success: function(response) {
        console.log(response);
        load_dexuat();
        // tableDX.ajax.reload();


      }
    })
  }
});

});
</script>
