<?php 
use App\Http\Controllers\LichbaocaoController;
use App\Http\Controllers\DetaiController;
 ?>
@include('view/adminleft')
@include('view/topcontent')
<div class="andro_subheader pattern-bg primary-bg">
    <div class="container">
        <div class="andro_subheader-inner">
            <h1>Lịch báo cáo</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('doan/'.$MaDA)}}">{{ $TenDA }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lịch báo cáo</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
 <div class="container">
      <div class="row">
        <div class="col-lg-12">
            @for($i=0;$i<count($LBC);$i++)
            <?php 
            $kt = LichbaocaoController::checkdayLBC($LBC[$i]->NgayBC,$ThoigianBDHK->ThoigianBDHK);
            ?>

            @if($kt==0)
          <!-- Product Count & Orderby Start -->
          <div class="andro_shop-global">
            <h5>Hôm nay</h5>
          </div>
          <!-- Product Count & Orderby End -->
          <!-- Product Start -->
          <div class="andro_product andro_product-list">
            <div class="andro_product-thumb">
              <a href="#"><img src="{{asset('public/FE/img/report.png')}}" alt="product"></a>
            </div>
            <div class="andro_product-body">
              <div class="andro_rating-wrapper">
                <div class="andro_rating">
                  Ngày: {{ date('d/m/Y',strtotime($LBC[$i]->NgayBC)) }}
                </div>
                <span>Hôm nay</span>
              </div>
              <h5 class="andro_product-title"> <a href="#"><b>Nội dung: </b>{{ $LBC[$i]->NoidungLBC }}</a> </h5>
              <h5 class="andro_product-title"> <a href="#"><b>GV: </b>{{ LichbaocaoController::getTenGV_MaGV($LBC[$i]->MaGV) }}</a> </h5>
               <h5 class="andro_product-title"> <a href="#"><b>Phòng: </b>{{ LichbaocaoController::getTenPhong_MaPhong($LBC[$i]->MaPhong) }}</a> </h5>
              <div class="andro_product-footer">
                <div class="andro_product-price">
              {{--     <span><h5><b>Ngày: </b>{{ date('d/m/Y',strtotime($LBC[$i]->NgayBC)) }}</h5></span> --}}
                </div>
              </div>
            </div>
          </div>
            @endif
            @endfor
          <!-- Product End -->

          <div class="andro_shop-global">
            <h5>Tuần này</h5>
          </div>
          @for($i=0;$i<count($LBC);$i++)
            <?php 
             $kt = LichbaocaoController::checkdayLBC($LBC[$i]->NgayBC,$ThoigianBDHK->ThoigianBDHK);
            ?>

            @if($kt==1)

          <!-- Product Start -->
          <div class="andro_product andro_product-list">
            <div class="andro_product-thumb">
              <a href="#"><img src="{{asset('public/FE/img/report.png')}}" alt="product"></a>
            </div>
            <div class="andro_product-body">
              <div class="andro_rating-wrapper">
                <div class="andro_rating">
                  Ngày: {{ date('d/m/Y',strtotime($LBC[$i]->NgayBC)) }}
                </div>
                {{-- <span>Hôm nay</span> --}}
              </div>
              <h5 class="andro_product-title"> <a href="#"><b>Nội dung: </b>{{ $LBC[$i]->NoidungLBC }}</a> </h5>
              <h5 class="andro_product-title"> <a href="#"><b>GV: </b>{{ LichbaocaoController::getTenGV_MaGV($LBC[$i]->MaGV) }}</a> </h5>
               <h5 class="andro_product-title"> <a href="#"><b>Phòng: </b>{{ LichbaocaoController::getTenPhong_MaPhong($LBC[$i]->MaPhong) }}</a> </h5>
              <div class="andro_product-footer">
                <div class="andro_product-price">
              {{--     <span><h5><b>Ngày: </b>{{ date('d/m/Y',strtotime($LBC[$i]->NgayBC)) }}</h5></span> --}}
                </div>
              </div>
            </div>
          </div>
            @endif
            @endfor 

          <div class="andro_shop-global">
            <h5>Tuần sau</h5>
          </div>
          @for($i=0;$i<count($LBC);$i++)
            <?php 
            $kt = LichbaocaoController::checkdayLBC($LBC[$i]->NgayBC,$ThoigianBDHK->ThoigianBDHK);
            ?>

            @if($kt==2)
          <!-- Product Start -->
          <div class="andro_product andro_product-list">
            <div class="andro_product-thumb">
              <a href="#"><img src="{{asset('public/FE/img/report.png')}}" alt="product"></a>
            </div>
            <div class="andro_product-body">
              <div class="andro_rating-wrapper">
                <div class="andro_rating">
                  Ngày: {{ date('d/m/Y',strtotime($LBC[$i]->NgayBC)) }}
                </div>
               {{--  <span>Hôm nay</span> --}}
              </div>
              <h5 class="andro_product-title"> <a href="#"><b>Nội dung: </b>{{ $LBC[$i]->NoidungLBC }}</a> </h5>
              <h5 class="andro_product-title"> <a href="#"><b>GV: </b>{{ LichbaocaoController::getTenGV_MaGV($LBC[$i]->MaGV) }}</a> </h5>
               <h5 class="andro_product-title"> <a href="#"><b>Phòng: </b>{{ LichbaocaoController::getTenPhong_MaPhong($LBC[$i]->MaPhong) }}</a> </h5>
              <div class="andro_product-footer">
                <div class="andro_product-price">
              {{--     <span><h5><b>Ngày: </b>{{ date('d/m/Y',strtotime($LBC[$i]->NgayBC)) }}</h5></span> --}}
                </div>
              </div>
            </div>
          </div>
            @endif
            @endfor
          <!-- Load More Start -->
         {{--  <a href="#" class="load-more">Xem thêm</a> --}}
          <hr>
          <!-- Load More End -->

        </div>
      </div>

    </div>
@include('view/footer') 
