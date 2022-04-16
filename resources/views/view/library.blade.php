

 <!-- Favicon -->

{{-- js vendor --}}
  <script src="{{URL::asset('public/FE/js/plugins/jquery-3.4.1.min.js')}}"></script>
  <script src="{{URL::asset('public/FE/js/plugins/popper.min.js')}}"></script>
  <script src="{{URL::asset('public/FE/js/plugins/waypoint.js')}}"></script>
  <script src="{{URL::asset('public/FE/js/plugins/bootstrap.min.js')}}"></script>
  {{-- <script src="{{URL::asset('public/FE/js/bootstrap.js')}}"></script> --}}
  <script src="{{URL::asset('public/FE/js/plugins/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{URL::asset('public/FE/js/plugins/jquery.slimScroll.min.js')}}"></script>
  <script src="{{URL::asset('public/FE/js/plugins/imagesloaded.min.js')}}"></script>
  <script src="{{URL::asset('public/FE/js/plugins/jquery.steps.min.js')}}"></script>
  <script src="{{URL::asset('public/FE/js/plugins/jquery.countdown.min.js')}}"></script>
  <script src="{{URL::asset('public/FE/js/plugins/isotope.pkgd.min.js')}}"></script>
  <script src="{{URL::asset('public/FE/js/plugins/slick.min.j')}}s"></script>
  <script src="{{URL::asset('public/FE/js/plugins/ion.rangeSlider.min.js')}}"></script>
  <script src="{{URL::asset('public/FE/js/plugins/jquery.zoom.min.js')}}"></script>


  <!-- Scripts -->
  <script src="{{URL::asset('public/FE/js/main.js')}}"></script>
{{--   Datatable --}}
    

 <script src="{{URL::asset('public/FE/js/jquery.dataTables.js')}}"></script>
 <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script> 



 <!--   Link ckeditor -->
 <script type="text/javascript" src="{{URL::asset('public/FE/ckeditor/ckeditor.js')}}"></script>



 <script type="text/javascript">
    $(document).ready(function() {
        $('#dataaa').DataTable({
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
} );
</script>