@include('view/adminleft')
{{-- @include('view/topcontent') --}}
<?php 
use App\Http\Controllers\DetaiController;
use App\Http\Controllers\SinhVienController;
?>
<script type="text/javascript">

function load(a,b)
{
             var result = confirm('Bạn có muốn đăng ký đề tài này?');

                  if (result == true) {
                   alert('Đồng ý');
                   window.location="{{ URL::to('/dangkydetai/') }}"+'/'+a+'/'+b; 
                   


              } else {
                   alert('Bạn không đăng ký');
                }
}


</script>
 <div id="content-wrapper" class="d-flex flex-column">
  <div class="andro_subheader pattern-bg primary-bg">
    <div class="container">
      <div class="andro_subheader-inner">
        <h1>Đăng ký đề tài</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('sinhvien')}}">{{ DetaiController::getTenDA_MaDA($MaDA) }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đăng ký đề tài</li>
          </ol>
        </nav>
      </div>
    </div>
    <input type="hidden" id="MaDA" value="{{ $MaDA }}">
  </div>

      <!-- Main Content -->
  <div id="content">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Danh sách đề tài</h6>
    <button type='submit' id='saveButton' name='saveButton' class='btn btn-primary' data-toggle='modal' data-target='' style="float: right;"><a href="#ex1" rel='modal:open' style="color:white">Đề xuất đề tài</a></button>
  </div>
  <div class="card-body">
    <div class="table-responsive" >
      <div style="display: flex">
        <table class="table table-striped  table-hover" id="dataTable_detai" width="100%" cellspacing="0" >                     
          


        </table>

      </div>
    </div>
  </div>
</div>

          <div id='ex1' class='modal'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                 <form method="post" action="{{route('dexuatdetai')}}" enctype="multipart/form-data" class="box">
                    @csrf
                    <div class='modal-header'>
                      <h5 class='modal-title' id='exampleModalLabel'>Đề xuất đề tài</h5>
                      <button class='close' type='button' data-dismiss='modal' aria-label='Close' ref='modal:close'>
                        <span><a href='#' rel='modal:close'>×</a></span>
                      </button>
                    </div>
                    
               
                    <input type="hidden" name="MaHK" value="<?php echo DetaiController::getMaHocKy_now() ?>">
                    <input type="hidden" name="MaDA" value="{{ $MaDA }}">
                    <div class='modal-body'><p><b>Tên đề tài: </b></p>
                    <input id='title'  class='form-control' value='' name='Tendetai'></input>
                    </div>
                    <div class='modal-body'><p><b>Lĩnh vực nghiên cứu: </b></p>
                    <select class="custom-select" name="MaLVNC">
                      <?php
                      
                        $all = DetaiController::getallLVNC();
                        
                        $n=count($all);
            
                        for($i=0;$i<$n;$i++)
                        {
                        ?>
                            <option value="<?php echo $all[$i]->MaLVNC ?> ">
                              <?php  echo $all[$i]->TenLVNC ?>
                            </option>
                            <?php
                          }
                        
                      ?>
                    </select>
                    </div>
                    <div class='modal-body'><p><b>Số lượng thành viên: </b></p>
                    <input id='title'  class='form-control' value='' name='SoluongSV'></input>
                    </div>
                    <div class='modal-body'><p><b>Tên giáo viên:</b>
                    <select class="custom-select" name="MaGV">               
                            <option value="{{ $MaGV }}">
                             {{ $TenGV }}
                            </option>

                    </select>

                    </div><div class='modal-footer'>

                      <button class='btn btn-primary'type='button' data-dismiss='modal'><a href='#' style='color:white'rel='modal:close'>Thoát</a></button>
                      <button type="submit" class="btn btn-primary" name="submit" onclick="kt()" ><a style="color: white">Đề xuất</a></button>
                    </div>
                 
                </div>   
                </form>  
              </div>
            </div>
          </div>





@include('view/footer')
<script src='{{URL::asset('public/FE/js/jquery.modal.js')}}'></script>
{{-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css' /> --}}
<script type="text/javascript">
const MaDA = document.getElementById('MaDA').value;
// var loaddetai = '{{ URL::to('/load_detai/') }}';
// var checksoluongSV = '{{ URL::to('/checksoluongSV') }}';
 // var config = {
 //        routes: {
 //            zone: "{{ URL::to('/load_detai') }}"
 //        },
 //        routes2: {
 //            zone2: "{{ URL::to('/checksoluongSV') }}"
 //        }
 //  };
  $(document).ready(function(){
  $("#saveButton").click(function(){
    $("#Table").css({"width": "200px","display": "block"});
  });

  loaddetai();
});


function soluong(){
   var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
   document.getElementById("soluong2").value = this.responseText;
 }
};

xhttp.open("GET", "{{ URL::to('/checksoluongSV') }}", true);
xhttp.send();
}

function loaddetai(){
 var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
   document.getElementById("dataTable_detai").innerHTML = this.responseText;
 }
};
xhttp.open("GET", "{{ URL::to('/load_detai') }}"+'/'+MaDA, true);
xhttp.send();
}


setInterval(function(){
soluong();
var soluong1 =document.getElementById('soluong').value;
var soluong2 =document.getElementById('soluong2').value;
if(soluong1!=soluong2)
{
  loaddetai();
}
else
{

}

},5000); 

</script>