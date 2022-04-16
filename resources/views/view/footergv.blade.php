 <br><br><br>
 <br><br><br>
 <footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2019</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn thoát ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Chọn "Đăng xuất" để đăng xuất tài khoản</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
        <a class="btn btn-primary" href="{{ URL::to('logout') }}">Đăng xuất</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin cá nhân</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--  Thông tin -->
      <div class="modal-body">Họ tên: {{ session::get('HotenGV') }}</div>
      <div class="modal-body">Số điện thoại: {{ session::get('SdtGV') }}</div>
      <div class="modal-body">Email: {{ session::get('Email') }}</div>
      <div class="modal-body">Học vị: {{ session::get('Hocvi') }}</div>
      <div class="modal-body">Chuyên môn: {{ session::get('Chuyenmon') }}</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Ok</button>

      </div>
    </div>
  </div>
</div>

</body>
<script src="{{ URL::asset('public/BE/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('public/BE/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL::asset('public/BE/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ URL::asset('public/BE/js/sb-admin-2.min.js') }}"></script>
<script src="{{ URL::asset('public/BE/js/custom_js.js') }}"></script>

{{-- datatable --}}
<script src="{{URL::asset('public/BE/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('public/BE/vendor/datatables/dataTables.bootstrap4.js')}}"></script> 
{{-- excel, pdf ,... --}}
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>  


{{-- full calendar   --}}
<script src="{{URL::to('public/BE/js/moment.min.js')}}"></script>
<script src="{{URL::to('public/BE/js/fullcalendar.js')}}"></script>

<script type="text/javascript">
    !function(t,n){"object"==typeof exports&&"object"==typeof module?module.exports=n(require("moment"),require("fullcalendar")):"function"==typeof define&&define.amd?define(["moment","fullcalendar"],n):"object"==typeof exports?n(require("moment"),require("fullcalendar")):n(t.moment,t.FullCalendar)}("undefined"!=typeof self?self:this,function(t,n){return function(t){function n(h){if(e[h])return e[h].exports;var r=e[h]={i:h,l:!1,exports:{}};return t[h].call(r.exports,r,r.exports,n),r.l=!0,r.exports}var e={};return n.m=t,n.c=e,n.d=function(t,e,h){n.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:h})},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},n.p="",n(n.s=201)}({0:function(n,e){n.exports=t},1:function(t,e){t.exports=n},201:function(t,n,e){Object.defineProperty(n,"__esModule",{value:!0}),e(202);var h=e(1);h.datepickerLocale("vi","vi",{closeText:"Đóng",prevText:"&#x3C;Trước",nextText:"Tiếp&#x3E;",currentText:"Hôm nay",monthNames:["Tháng Một","Tháng Hai","Tháng Ba","Tháng Tư","Tháng Năm","Tháng Sáu","Tháng Bảy","Tháng Tám","Tháng Chín","Tháng Mười","Tháng Mười Một","Tháng Mười Hai"],monthNamesShort:["Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"],dayNames:["Chủ Nhật","Thứ Hai","Thứ Ba","Thứ Tư","Thứ Năm","Thứ Sáu","Thứ Bảy"],dayNamesShort:["CN","T2","T3","T4","T5","T6","T7"],dayNamesMin:["CN","T2","T3","T4","T5","T6","T7"],weekHeader:"Tu",dateFormat:"dd/mm/yy",firstDay:0,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""}),h.locale("vi",{buttonText:{month:"Tháng",week:"Tuần",day:"Ngày",list:"Lịch biểu"},allDayText:"Trong ngày",eventLimitText:function(t){return"+ thêm "+t},noEventsMessage:"Không có sự kiện để hiển thị"})},202:function(t,n,e){!function(t,n){n(e(0))}(0,function(t){return t.defineLocale("vi",{months:"tháng 1_tháng 2_tháng 3_tháng 4_tháng 5_tháng 6_tháng 7_tháng 8_tháng 9_tháng 10_tháng 11_tháng 12".split("_"),monthsShort:"Th01_Th02_Th03_Th04_Th05_Th06_Th07_Th08_Th09_Th10_Th11_Th12".split("_"),monthsParseExact:!0,weekdays:"chủ nhật_thứ hai_thứ ba_thứ tư_thứ năm_thứ sáu_thứ bảy".split("_"),weekdaysShort:"CN_T2_T3_T4_T5_T6_T7".split("_"),weekdaysMin:"CN_T2_T3_T4_T5_T6_T7".split("_"),weekdaysParseExact:!0,meridiemParse:/sa|ch/i,isPM:function(t){return/^ch$/i.test(t)},meridiem:function(t,n,e){return t<12?e?"sa":"SA":e?"ch":"CH"},longDateFormat:{LT:"HH:mm",LTS:"HH:mm:ss",L:"DD/MM/YYYY",LL:"D MMMM [năm] YYYY",LLL:"D MMMM [năm] YYYY HH:mm",LLLL:"dddd, D MMMM [năm] YYYY HH:mm",l:"DD/M/YYYY",ll:"D MMM YYYY",lll:"D MMM YYYY HH:mm",llll:"ddd, D MMM YYYY HH:mm"},calendar:{sameDay:"[Hôm nay lúc] LT",nextDay:"[Ngày mai lúc] LT",nextWeek:"dddd [tuần tới lúc] LT",lastDay:"[Hôm qua lúc] LT",lastWeek:"dddd [tuần rồi lúc] LT",sameElse:"L"},relativeTime:{future:"%s tới",past:"%s trước",s:"vài giây",ss:"%d giây",m:"một phút",mm:"%d phút",h:"một giờ",hh:"%d giờ",d:"một ngày",dd:"%d ngày",M:"một tháng",MM:"%d tháng",y:"một năm",yy:"%d năm"},dayOfMonthOrdinalParse:/\d{1,2}/,ordinal:function(t){return t},week:{dow:1,doy:4}})})}})});
</script>





<script type="text/javascript">
      $.extend($.fn.dataTable.defaults, {
  "language" :{
                "processing": "Đang xử lý...",
                "infoFiltered": "(được lọc từ _MAX_ mục)",
                "aria": {
                    "sortAscending": ": Sắp xếp thứ tự tăng dần",
                    "sortDescending": ": Sắp xếp thứ tự giảm dần"
                },
                "autoFill": {
                    "cancel": "Hủy",
                    "fill": "Điền tất cả ô với <i>%d<\/i>",
                    "fillHorizontal": "Điền theo hàng ngang",
                    "fillVertical": "Điền theo hàng dọc",
                    "info": "Mẫu thông tin tự động điền"
                },
                "buttons": {
                    "collection": "Chọn lọc <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                    "colvis": "Hiển thị theo cột",
                    "colvisRestore": "Khôi phục hiển thị",
                    "copy": "Sao chép",
                    "copyKeys": "Nhấn Ctrl hoặc u2318 + C để sao chép bảng dữ liệu vào clipboard.<br \/><br \/>Để hủy, click vào thông báo này hoặc nhấn ESC",
                    "copySuccess": {
                        "1": "Đã sao chép 1 dòng dữ liệu vào clipboard",
                        "_": "Đã sao chép %d dòng vào clipboard"
                    },
                    "copyTitle": "Sao chép vào clipboard",
                    "csv": "File CSV",
                    "excel": "File Excel",
                    "pageLength": {
                        "-1": "Xem tất cả các dòng",
                        "1": "Hiển thị 1 dòng",
                        "_": "Hiển thị %d dòng"
                    },
                    "pdf": "File PDF",
                    "print": "In ấn"
                },
    // "infoPostFix": "Đang hiển thị dòng _START_ tới dòng _END_ trong tổng số _TOTAL_ mục",
    "infoThousands": "`",
    "select": {
        "1": "%d dòng đang được chọn",
        "_": "%d dòng đang được chọn",
        "cells": {
            "1": "1 ô đang được chọn",
            "_": "%d ô đang được chọn"
        },
        "columns": {
            "1": "1 cột đang được chọn",
            "_": "%d cột đang được được chọn"
        },
        "rows": {
            "1": "1 dòng đang được chọn",
            "_": "%d dòng đang được chọn"
        }
    },
    "thousands": "`",
    "searchBuilder": {
        "title": {
            "_": "Thiết lập tìm kiếm (%d)",
            "0": "Thiết lập tìm kiếm"
        },
        "button": {
            "0": "Thiết lập tìm kiếm",
            "_": "Thiết lập tìm kiếm (%d)"
        },
        "value": "Giá trị",
        "clearAll": "Xóa hết",
        "condition": "Điều kiện",
        "conditions": {
            "date": {
                "after": "Sau",
                "before": "Trước",
                "between": "Nằm giữa",
                "empty": "Rỗng",
                "equals": "Bằng với",
                "not": "Không phải",
                "notBetween": "Không nằm giữa",
                "notEmpty": "Không rỗng"
            },
            "number": {
                "between": "Nằm giữa",
                "empty": "Rỗng",
                "equals": "Bằng với",
                "gt": "Lớn hơn",
                "gte": "Lớn hơn hoặc bằng",
                "lt": "Nhỏ hơn",
                "lte": "Nhỏ hơn hoặc bằng",
                "not": "Không phải",
                "notBetween": "Không nằm giữa",
                "notEmpty": "Không rỗng"
            },
            "string": {
                "contains": "Chứa",
                "empty": "Rỗng",
                "endsWith": "Kết thúc bằng",
                "equals": "Bằng",
                "not": "Không phải",
                "notEmpty": "Không rỗng",
                "startsWith": "Bắt đầu với"
            }
        },
        "logicAnd": "Và",
        "logicOr": "Hoặc",
        "add": "Thêm điều kiện",
        "data": "Dữ liệu",
        "deleteTitle": "Xóa quy tắc lọc"
    },
    "searchPanes": {
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Không có phần tìm kiếm",
        "clearMessage": "Xóa hết",
        "loadMessage": "Đang load phần tìm kiếm",
        "collapse": {
            "0": "Phần tìm kiếm",
            "_": "Phần tìm kiếm (%d)"
        },
        "title": "Bộ lọc đang hoạt động - %d",
        "count": "{total}"
    },
    "datetime": {
        "hours": "Giờ",
        "minutes": "Phút",
        "next": "Sau",
        "previous": "Trước",
        "seconds": "Giây"
    },
    "emptyTable": "Không có dữ liệu",
    "info": "Hiển thị _START_ tới _END_ của _TOTAL_ dữ liệu",
    "infoEmpty": "Hiển thị 0 tới 0 của 0 dữ liệu",
    "lengthMenu": "Hiển thị _MENU_ ",
    "loadingRecords": "Đang tải...",
    "paginate": {
        "first": "Đầu tiên",
        "last": "Cuối cùng",
        "next": "Sau",
        "previous": "Trước"
    },
    "search": "Tìm kiếm:",
    "zeroRecords": "Không tìm thấy kết quả"
}

  });
</script>
</html>