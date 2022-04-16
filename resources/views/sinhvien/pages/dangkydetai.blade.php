@extends('sinhvien.sinhvien_layout')
@section('content')
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Danh sách đề tài</h6>
              <button type='submit' id='saveButton' name='saveButton' class='btn btn-primary' data-toggle='modal' data-target='' style="float: right;">Kết quả đăng ký</button>
            </div>
            <div class="card-body">
              <div class="table-responsive" >
                <div style="display: flex">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >                     
                


                  </table>
                  <table class="table table-bordered" id="Table" width="100%" cellspacing="0" style="width: 200px;display: none">                     
                


                  </table>
                  
                </div>
              </div>
            </div>
  </div>
    @endsection()
