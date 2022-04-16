@extends('sinhvien.sinhvien_layout')
@section('content')
<style>
  .hided{
    display: none;

  }
</style>
<div class="pricing-section" style="margin-bottom: 60px;margin-top: 4px;">
  <div class="background-image-pricing">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
            <!-- <div class="section-heading">
              <h2>Cloud Hosting Plans</h2>
              <p>Lorem ipsum dolor amet taxidermy sriracha cardigan salvia actually vice migas enamel pin sustainable carry scenester lomo hot chicken farm table actually kinfolk.</p>
            </div> -->
          </div>
          @foreach($all as $key => $all_DA)
          
          {{ csrf_field() }}
          <div class="col-md-4 col-sm-6 col-xs-12" style="padding-bottom: 100px">
            <div class="pricing-item">
             <!--  <h4>XXX</h4> -->
             <div class="price">
              <h6>{{ $all_DA->TenDA }}</h6>
              <span>Đồ án cơ sở nghành</span>
            </div>
            <p id="mota{{$all_DA->MaDA}}">{{ substr(($all_DA->Mota),0,62) }} ...<a  href="#"  onclick="load('#mota{{$all_DA->MaDA}}','#mota2{{$all_DA->MaDA}}')">Xem thêm</a></p>
            <p class="hided" id="mota2{{$all_DA->MaDA}}">{{ $all_DA->Mota }}<a  href="#"  onclick="load('#mota2{{$all_DA->MaDA}}','#mota{{$all_DA->MaDA}}')">Ẩn bớt</a> </p>
            
            <div class="dev"></div>
            <ul>
              <li><i class="fa fa-check"></i>Đăng ký đồ án</li>
              <li><i class="fa fa-check"></i>Chọn GVHD</li>
              <li><i class="fa fa-check"></i>Nhận đề tài</li>
              <li><i class="fa fa-check"></i>Xem lịch báo cáo - gặp gỡ trao đổi</li>
              <li><i class="fa fa-check"></i>Nộp sản phẩm tuần</li>
              <li><i class="fa fa-check"></i>Báo cáo kết thúc đồ án</li>
              </ul>
              <a data-toggle="modal" data-target="#showmodal{{$all_DA->MaDA}}" href="#" class="main-button">Đăng ký</a>
            </div>
          </div>


          <div class="modal fade" id="showmodal{{$all_DA->MaDA}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class='modal-content'>
                <form id="FORM1" method="POST" action="{{URL::to('/dangkydoan/'.$all_DA->MaDA)}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Xác nhận đăng ký</h5>
                    <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>×</span>
                    </button>
                  </div>
                  
                  <div class='modal-body'>Chọn <b style="color:red">"Đăng ký"</b> để xác nhận đăng ký đồ án</div>

                  <div class='modal-footer'>

                    <button class='btn btn-secondary'type='button' data-dismiss='modal'>Hủy</button>
                    <button type='submit' id='saveButton' name='saveButton' class='btn btn-primary'>Đăng ký</button>
                  </div>
                </form>
              </div>     
            </div>
          </div>


          @endforeach
        </div>
      </div>
    </div>
    @endsection()
