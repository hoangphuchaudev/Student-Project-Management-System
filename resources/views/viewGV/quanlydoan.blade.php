<?php 
  use App\Http\Controllers\DetaiController;
?>
@include('view/adminleftgv')
@include('view/topcontengv')
<link rel="stylesheet" type="text/css" href="{{asset('public/FE/css/custom_KHTH.css')}}">
<div class="container-fluid">

  <!-- Page Heading -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('giangvien') }}">Trang chủ</a></li>&nbsp>&nbsp
      <li class="breadcrumb-item active" aria-current="page">Quản lý đồ án</li>
    </ol>
  </nav>

  <div class="row">

  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3" id="title">
      <h6 class="m-0 font-weight-bold text-primary">Danh sách đồ án</h6>
      <button type='submit' id='open_modal_insertfile' name='saveButton' class='btn btn-primary' data-toggle='modal' data-target='#modal' style="float: right;">Thêm danh sách sinh viên đăng ký đồ án</button>

    </div>  
    <div class="col-xl-auto col-md-auto mb-auto">
      <div class="card border-bottom-success shadow h-100 py-2">

       <div class="form-group col-xl-auto col-md-auto mb-auto " style="width: 100%; " id="select_box">
        <div class="row">
          <label for="">Học kỳ: </label>
          <select class="form-control col-sm-3" id="brand" name="brand">
            <option value="null">--Chọn học kỳ--</option>
            @for($i=0;$i<count(DetaiController::getallHK());$i++)
            <option value="{{ DetaiController::getallHK()[$i]->MaHK }}">{{ DetaiController::getallHK()[$i]->TenHK }}, {{ DetaiController::getallHK()[$i]->NienkhoaHK }}</option>
            @endfor
          </select>
           <label for="">Giảng viên: </label>
          <select class="form-control col-sm-3" id="brand" name="brand">
            <option value="null">--Chọn giảng viên--</option>
            @for($i=0;$i<count(DetaiController::getallHK());$i++)
            <option value="{{ DetaiController::getallHK()[$i]->MaHK }}">{{ DetaiController::getallHK()[$i]->TenHK }}, {{ DetaiController::getallHK()[$i]->NienkhoaHK }}</option>
            @endfor
          </select>
          <label for="">Loại đồ án: </label>
          <select class="form-control col-sm-3" id="brand" name="brand">
            <option value="null">--Chọn đồ án--</option>
            @for($i=0;$i<count(DetaiController::getallHK());$i++)
            <option value="{{ DetaiController::getallHK()[$i]->MaHK }}">{{ DetaiController::getallHK()[$i]->TenHK }}, {{ DetaiController::getallHK()[$i]->NienkhoaHK }}</option>
            @endfor
          </select>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          {{-- <table class="table table-bordered table" id="dataaa" width="100%" cellspacing="0" > --}}
            <table class="table table-striped table-hover table-bordered" id="dataaa" width="100%" cellspacing="0">
              <thead style="background-color: #2D4154FF; color: white;" >
                <tr>
                  <th width="5%">STT</th>
                  <th width="20%">Tên sinh viên</th>
                  <th width="10%">Đồ án</th>
                  <th width="20%">Tên Giảng viên</th>
                  <th width="10%">Học kỳ</th>
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
    <div class="modal fade" id="modal_insertfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class='modal-content'>
          <form id="modal_form" enctype="multipart/form-data">
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>Thêm danh sách đăng ký đồ án</h5>
              <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>×</span>
              </button>
            </div>

            <div class='modal-body'>file:<b>
             <div id="uploader">
              <div class="row uploadDoc">
                <div class="col-sm-3">
                  <div class="docErr">Please upload valid file</div><!--error-->
                  <div class="fileUpload btn btn-orange">
                    <span class='upl' id='upload'><i class='fas fa-upload'> Tải lên</i></span>
                    <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">
                    <input type="file" class="upload up" id="up" onchange="readURL(this);" />
                  </div><!-- btn-orange -->
                </div><!-- col-3 -->
                <div class="col-sm-9 card bg-secondary text-white shadow">
                  <div class="card-body">
                    Vui lòng up file excel ( file có định dạng <b style="color:red">.xlxs</b> ở phần mở rộng)
                  </div>
                </div>
              </div>
            </div>

          </b>
        </div>
      </form>
      <div class='modal-footer'>
        <button class='btn btn-secondary'type='button' data-dismiss='modal'>Thoát</button>
        <button type='submit' id='insert_file' name='saveButton' class='btn btn-primary'>Thêm mới</button>
      </div>
    </div>     
  </div>
</div>
@include('view/footergv')
<script type="text/javascript">
    var fileTypes = ['pdf', 'docx', 'rtf', 'jpg', 'jpeg', 'png', 'txt','zip','xlsx'];  //acceptable file types
    function readURL(input) {
      if (input.files && input.files[0]) {
        var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
            isSuccess = fileTypes.indexOf(extension) > -1;  //is extension in acceptable types

        if (isSuccess) { //yes
          var reader = new FileReader();
          reader.onload = function (e) {
           if (extension == 'pdf'){
            $(input).closest('.fileUpload').find(".icon").attr('src','https://image.flaticon.com/icons/svg/179/179483.svg');

          }
          else if (extension == 'docx'){
            $(input).closest('.fileUpload').find(".icon").attr('src','https://image.flaticon.com/icons/svg/281/281760.svg');
          }
          else if (extension == 'rtf'){
            $(input).closest('.fileUpload').find(".icon").attr('src','https://image.flaticon.com/icons/svg/136/136539.svg');
          }
          else if (extension == 'png'){ $(input).closest('.fileUpload').find(".icon").attr('src','https://image.flaticon.com/icons/svg/136/136523.svg'); 
        }
        else if (extension == 'jpg' || extension == 'jpeg'){
          $(input).closest('.fileUpload').find(".icon").attr('src','https://image.flaticon.com/icons/svg/136/136524.svg');
        }
        else if (extension == 'txt'){
          $(input).closest('.fileUpload').find(".icon").attr('src','https://image.flaticon.com/icons/svg/136/136538.svg');
        }
        else if (extension == 'zip'){
          $(input).closest('.fileUpload').find(".icon").attr('src','{{URL::to('public/FE/img/zip.svg')}}');
        }
        else if (extension == 'xlsx'){
          $(input).closest('.fileUpload').find(".icon").attr('src','{{URL::to('public/FE/img/excel.svg')}}');
        }

        else {
                  //console.log('here=>'+$(input).closest('.uploadDoc').length);
                  $(input).closest('.uploadDoc').find(".docErr").slideUp('slow');
                }
              }

              reader.readAsDataURL(input.files[0]);
            }
            else {
            //console.log('here=>'+$(input).closest('.uploadDoc').find(".docErr").length);
            $(input).closest('.uploadDoc').find(".docErr").fadeIn();
            setTimeout(function() {
              $('.docErr').fadeOut('slow');
            }, 9000);
          }
        }
      }
      $(document).ready(function(){

        var MaDA = $("input[name='MaDA']").val();

//load table
var table = $('#dataaa').DataTable( {
  "dom" : 'Bfrtip',
  "buttons" : [
  'copy', 'csv', 'excel', 'pdf', 'print'
  ],
  destroy: true,
  "ajax": "{{ URL::to('getdataqldoan') }}",
  "columns": [
  {
   "title": "STT",
   "width": "5%",  
   "data": "STT" 
 },
 {
   "title": "Tên sinh viên", 
   "width": "20%", 
   "data": "HotenSV" 
 },
 {
  "title": "Đồ án", 
  "width": "10%",  
  "data": "TenDA",
},
{
 "title": "Tên giảng viên",
 "width": "20%",  
 "data": "HotenGV" 
},
{
 "title": "Học kỳ",
 "width": "10%",  
 "data": null,
 render: function(data, type, row){
  return `<td style='text-align:center'>${row.TenHK}, ${row.NienkhoaHK}
  </td>`;
} 
},
{
  "title": "Xóa",
  "width": "5%",   
  "data": null,
  render: function(data, type, row) {
   return `<td style='text-align:center'><button type="button" class="btn btn-danger" id='delete_dt' data-id="${row.MaDT}">
   <i class='fas fa-trash-alt'></i>
   </button>
   </td>`;


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
//Load data học kỳ
var tableselect;
function load_select(MaHK){
  return $.ajax({
    url: "{{ URL::to('getdataqldoan_MaHK') }}",
    type: "get",
    dataType: 'json',
    data: {
      "MaHK": MaHK,
    },
    success: function(data) {

      tableselect = $('#dataaa').DataTable( {
        "destroy":true,
        "data": data.data,
        "columns": [
        {
         "title": "STT",
         "width": "5%",  
         "data": "STT" 
       },
       {
         "title": "Tên sinh viên", 
         "width": "20%", 
         "data": "HotenSV" 
       },
       {
        "title": "Đồ án", 
        "width": "10%",  
        "data": "TenDA",
      },
      {
       "title": "Tên giảng viên",
       "width": "20%",  
       "data": "HotenGV" 
     },
     {
       "title": "Học kỳ",
       "width": "10%",  
       "data": null,
       render: function(data, type, row){
        return `<td style='text-align:center'>${row.TenHK}, ${row.NienkhoaHK}
        </td>`;
      } 
    },
    {
      "title": "Xóa",
      "width": "5%",   
      "data": null,
      render: function(data, type, row) {
       return `<td style='text-align:center'><button type="button" class="btn btn-danger" id='delete_dt' data-id="${row.MaDT}">
       <i class='fas fa-trash-alt'></i>
       </button>
       </td>`;


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
    }
  });
}
//select Học kỳ
$('#brand').change(function(){
 table.clear().draw();
 var brand_id = $(this).val();
 if(brand_id == "null")
  table.ajax.reload();
else{
  load_select(brand_id);
}
});
// show modal thêm danh sách
$(document).on('click','#open_modal_insertfile',function(){
  $('#modal_insertfile').modal('show');
});
$('#modal_insertfile').on('hidden.bs.modal', function (e) {
  $(this)
  .find("input,textarea,select")
  .val('')
  .end()
  .find("input[type=checkbox], input[type=radio]")
  .prop("checked", "")
  .end();
});
//Thêm danh sách sinh viên đăng ký đồ án
$(document).on('click','#insert_file',function(){
  $.ajax({
    url: "{{ URL::to('action_quanlydoan') }}",
    type: "post",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: 'json',
    data: {
      "MaHK": MaHK,
    },
    success: function(data) {

    }
  });
});

$(document).on('change','.up', function(){
  var id = $(this).attr('id'); /* gets the filepath and filename from the input */
  var profilePicValue = $(this).val();
  var fileNameStart = profilePicValue.lastIndexOf('\\'); /* finds the end of the filepath */
  profilePicValue = profilePicValue.substr(fileNameStart + 1).substring(0,20); /* isolates the filename */
     //var profilePicLabelText = $(".upl"); /* finds the label text */
     if (profilePicValue != '') {
      //console.log($(this).closest('.fileUpload').find('.upl').length);
      $(this).closest('.fileUpload').find('.upl').html(profilePicValue); /* changes the label text */
    }
  });

$(document).on("click", "a.btn-check" , function() {
 if($(".uploadDoc").length>1){
  $(this).closest(".uploadDoc").remove();
}else{
  alert("You have to upload at least one document.");
} 
});

});


</script>