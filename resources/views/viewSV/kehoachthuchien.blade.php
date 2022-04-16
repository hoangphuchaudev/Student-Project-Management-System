<?php 
use App\Http\Controllers\KehoachthuchienController;
use App\Http\Controllers\SinhVienController;
// $a= KehoachthuchienController::error();
?>

@include('view/adminleft')
@include('view/topcontent')

<link rel="stylesheet" type="text/css" href="{{asset('public/FE/css/custom_KHTH.css')}}">

<div class="andro_subheader pattern-bg primary-bg">
  <div class="container">
    <div class="andro_subheader-inner">
      <h1>Kế hoạch thực hiện</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{URL::to('doan/'.$MaDA)}}">{{ $TenDA }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Kế hoạch thực hiện</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Hướng dẫn: <h6>- Sinh viên click <i class='fas fa-file-upload'></i> để upload file tiến độ từng tuần theo kế hoạch</h6><h6>- Và xem đánh giá của GVHD khi đã upload file sản phẩm</h6></h6>
  </div>
  <?php



  if($MaDT==""){
   echo "<div style='text-align:center'>Bạn chưa đăng ký đề tài</div>";
   echo "<div style='height:600px'></div>";
  }
  else{

?>

 <!-- <div class="right__title"> QUẢN LÝ ĐỒ ÁN </div> -->
 <div class="card border-bottom-success shadow h-100 py-2">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-hover" width="100%" cellspacing="0" id="dataaa" style="text-align: center;"  >
        <thead>
          <tr>
            <th>STT</th>
            <th>Tuần</th>
            <th>Thời hạn</th>
            <th>Tình trạng</th>
            <th>Upload file</th>
            <th>Đánh giá</th>    
          </tr>
        </thead>
        <tbody>
<?php
//In ra tất cả 15 tuần làm đồ án
          for ($i=0;$i<15;$i++){

            $Tuan=$TuanBD+$i;
            $NgayBDtuan=date('Y-m-d',strtotime('+ 7 day' ,strtotime($NgayBDtuan)));
            $NgayKTtuan=date('Y-m-d',strtotime('+ 7 day' ,strtotime($NgayBDtuan)));
            $start_week="";
            $finish_week="";
            $sanpham="";
            $check=0;
            $Noidungthuchien="";
            $MaKHTH="";
            $ngay_kt="";
            $TenSP="";

//Chạy tất cả các ngày bắt đầu để thực hiện kế hoạch
            for($j=0;$j<count($KHTH);$j++){
              $start_date = strtotime($NgayBDtuan);
              $finish_date = strtotime($NgayKTtuan);
              $NgayBD = $KHTH[$j]->NgayBD;
              $NgayKT = $KHTH[$j]->NgayKT;

//Kiểm tra ngày bắt đầu trong kế hoạch thuộc tuần nào
              if((strtotime($NgayBD) >= $start_date)&&(strtotime($NgayBD) < $finish_date)){

               $MaKHTH=KehoachthuchienController::getMaKHTH_tuan($NgayBD);

               $sanpham=KehoachthuchienController::getSanPham_MaKHTH($MaKHTH);
               $TenSP=KehoachthuchienController::getTenSP_MaKHTH($MaKHTH);
               $start_week= date('d/m',strtotime($NgayBD));
               $finish_week= date('d/m',strtotime($NgayKT));
               $ngay_kt=$NgayKT;


               $MaSV=SinhVienController::getMaSV();

               $Noidungthuchien=KehoachthuchienController::getNoidung_tuan($NgayBD,$MaDT);
               $check=1;
              }
                else{

                }



            } //end for
//kt nếu có kế hoạch thì hiển thị upload file
            if($check==1){

?>            
              <tr>
                <td><a><?php echo ($i+1) ?></a></td>
                <td><a><?php echo "Tuần ".$Tuan."<br>"; ?></a></td>
                <td><a><?php echo $start_week." - ".$finish_week ?></a></td>
                <td><a><?php
//kt sản phẩm
                if($sanpham!="")
                  echo "<div style='color:red'>Đã upload sản phẩm</div>";
                else
                  echo "Chưa upload sản phẩm";

                 ?></a></td>
                <?php
//kt ngày kết thúc, nếu quá hạn k được chỉnh sửa
                if(KehoachthuchienController::checkday($ngay_kt)==1)
                echo "<td><a href='#' data-toggle='modal' data-target='#kehoachthuchien".$Tuan."''><i class='fas fa-file-upload'></i></a></td>";
                else
                 echo "<td><a href='#'><i class='fas fa-ban'></i></a>";
                 

                if($sanpham!="")
                  {
                    $Danhgia = KehoachthuchienController::getDanhgia_MaKHTH($MaKHTH);
                  if($Danhgia == '1')
                   echo "<td>Đạt</td>"; 
                  else
                   echo "<td>Chưa đạt</td>";
                   } 
                else
                echo "<td></td>"; 
                ?>

              </tr>
<?php

            }

            else{

              ?>            
              <tr>
                <td><a data-toggle="modal" data-target="#kehoachthuchien<?php echo $Tuan?>"><?php echo ($i+1) ?></a></td>
                <td><a data-toggle="modal" data-target="#kehoachthuchien<?php echo $Tuan?>"><?php echo "Tuần ".$Tuan."<br>"; ?></a></td>
                <td><a data-toggle="modal" data-target="#kehoachthuchien<?php echo $Tuan?>"><?php echo $start_week." - ".$finish_week ?></a></td>
                <td><a data-toggle="modal" data-target="#kehoachthuchien<?php echo $Tuan?>"><?php 
                if($sanpham!="")
                  echo $sanpham;
                else
                  echo "Chưa upload sản phẩm";

              ?></a></td>
              <?php
              echo "<td><a href='#'><i class='fas fa-ban'></i></a>";
              ?>
              <td></td>
              </tr>
              <?php

            }

    $Sanphami=KehoachthuchienController::getSanPham_MaKHTH($MaKHTH);

    $MotaSPi=KehoachthuchienController::getMoTa_MaKHTH($MaKHTH);


//modal show
          if($Sanphami==""){ 
            echo KehoachthuchienController::getModal_Ko_SanPham1($Tuan, $MaKHTH, $TenDA, $TenDT, $Noidungthuchien);
            ?>
            <form method="POST" name="show<?php echo $MaKHTH ?>" action="{{route('insertsanpham')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <?php
            echo KehoachthuchienController::getModal_Ko_SanPham2($Tuan, $MaKHTH, $TenDA, $TenDT, $Noidungthuchien);
          }
          else
          {
            echo KehoachthuchienController::getModal_Co_SanPham1($TenSP,$Tuan, $MaKHTH, $TenDA, $TenDT, $Noidungthuchien, $MotaSPi, $Sanphami);
         ?>
            <form method="POST" name="show<?php echo $MaKHTH ?>" action="{{route('updatesanpham',['MaDT'=>$MaDT,'MaKHTH'=>$MaKHTH])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <?php
            echo KehoachthuchienController::getModal_Co_SanPham2($TenSP, $Tuan, $MaKHTH, $TenDA, $TenDT, $Noidungthuchien, $MotaSPi, $Sanphami);
          }

        } //end for
?>  

        </tbody>
      </table>
    </div>
  </div>
</div>
</div>



<?php
}

?>


@include('view/footer')
<script type="text/javascript">
      function ChangeToSlug(a)
      {
      // alert('asas'+a);
      var title, slug;

        //Lấy text từ thẻ input title 
        // title = document.getElementById("up"+a).files[0].name;
       title = document.forms['show'+a]['file'+a].files[0].name;
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "_");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug'+a).value = slug;
      }

    //   function fun(a) {
    //    (function( $ ){

    //     $.fn.filemanager = function(type, options) {
    //       type = type || 'file';

    //       this.on('click', function(e) {
    //         var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
    //         var target_input = $('#' + $(this).data('input'));
    //         var target_preview = $('#' + $(this).data('preview'));
    //         window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
    //         window.SetUrl = function (items) {
    //           var file_path = items.map(function (item) {
    //             return item.name;
    //           }).join(',');

    //     // set the value of the desired input to image url
    //     target_input.val('').val(file_path).trigger('change');

    //     // clear previous preview
    //     target_preview.html('');

    //     // set or change the preview image src
    //     items.forEach(function (item) {
    //       target_preview.append(
    //         $('<img>').css('height', '5rem').attr('src', item.thumb_url)
    //         );
    //     });

    //     // trigger change event
    //     target_preview.trigger('change'); 
    //   };
    //   return false;
    // });
    //     }

    //   })(jQuery);

    //   $('#lfm'+a).filemanager('file');
    //   var route_prefix = "../laravel-filemanager";
    //   $('#lfm'+a).filemanager('file', {prefix: route_prefix});


    // }



var fileTypes = ['pdf', 'docx', 'rtf', 'jpg', 'jpeg', 'png', 'txt','zip'];  //acceptable file types
function readURL(input,a) {
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
                  $(input).closest('.fileUpload').find(".icon").attr('src','../public/FE/img/zip.svg');
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
    ChangeToSlug(a);
}
$(document).ready(function(){
   
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

   $(".btn-new").on('click',function(){
        $("#uploader").append('<div class="row uploadDoc"><div class="col-sm-3"><div class="docErr">Please upload valid file</div><!--error--><div class="fileUpload btn btn-orange"> <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon"><span class="upl" id="upload">Upload document</span><input type="file" class="upload up" id="up" onchange="readURL(this);" /></div></div><div class="col-sm-8"><input type="text" class="form-control" name="" placeholder="Note"></div><div class="col-sm-1"><a class="btn-check"><i class="fa fa-times"></i></a></div></div>');
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