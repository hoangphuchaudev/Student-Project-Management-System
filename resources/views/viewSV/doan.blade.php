@include('view/adminleft')
@include('view/topcontent')
<?php 
use App\Http\Controllers\DetaiController;
$checkDKDT = DetaiController::checkDKDT($MaDA);
$DT = DetaiController::getDT($MaDA);
{{-- dd($DT); --}}
?>
<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6"></script>

<div class="andro_subheader pattern-bg primary-bg">
	<div class="container">
		<div class="andro_subheader-inner">
			<h1><?php echo $TenDA ?></h1>		
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{URL::to('sinhvien')}}">Đồ án</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{ $TenDA }}</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
</div>
<div class="container">

	<div class="row">
		<div class="col-lg-12">
			@if($checkDKDT==false)
			<div class="andro_shop-global">
				<h5>Bạn chưa đăng ký đề tài !</h5>
			</div>
			@else
			<div class="andro_shop-global">
				<h5>Tên đề tài:  {{ $DT->TenDT }}</h5>
			</div>
			@endif
			<div class="row masonry">

				<!-- Product Start -->
				@if($checkDKDT==false)
				<div class="col-sm-4 masonry-item">
					<div class="andro_product">
						<div class="andro_product-thumb">
							<a href="{{URL::to('dangkydetai/'.$MaDA)}}"><img src="{{asset('public/FE/img/dangky.png')}}"></a>
						</div>
						<div class="andro_product-body">
							<h5 class="andro_product-title"> <a href="{{URL::to('dangkydetai/'.$MaDA)}}">Đăng ký đề tài</a> </h5>
							<p>Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
						</div>
					</div>
				</div>
				@else
				<!-- Product Start -->
				<div class="col-sm-4 masonry-item">
					<div class="andro_product">
						<div class="andro_product-thumb">
							<a href="{{URL::to('lichbaocao/'.$DT->MaDT)}}"><img src="{{asset('public/FE/img/xeplichbaocao.png')}}"></a>
						</div>
						<div class="andro_product-body">
							<h5 class="andro_product-title"> <a href="{{URL::to('lichbaocao/'.$DT->MaDT)}}">Lịch báo cáo</a> </h5>
							<p>Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
						</div>
					</div>
				</div>
				<!-- Product End -->
				<!-- Product Start -->
				<div class="col-sm-4 masonry-item">
					<div class="andro_product">
						<div class="andro_product-thumb">
							<a href="{{URL::to('kehoachthuchien/'.$DT->MaDT)}}"><img src="{{asset('public/FE/img/sanpham.png')}}"></a>
						</div>
						<div class="andro_product-body">
							<h5 class="andro_product-title"> <a href="{{URL::to('kehoachthuchien'.$DT->MaDT)}}">Nộp sản phẩm tuần</a> </h5>
							<p>Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
						</div>
					</div>
				</div>
				<!-- Product End -->

				<!-- Product Start -->
				<div class="col-sm-4 masonry-item">
					<div class="andro_product">
						<div class="andro_product-thumb">
							<a href="{{URL::to('tailieuthamkhao/'.$DT->MaDT)}}"><img src="{{asset('public/FE/img/tailieu.png')}}"></a>
						</div>
						<div class="andro_product-body">
							<h5 class="andro_product-title"> <a href="{{URL::to('tailieuthamkhao'.$DT->MaDT)}}">Tài liệu tham khảo</a> </h5>
							<p>Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
						</div>
					</div>
				</div>
				<!-- Product End -->
				@endif
				<!-- Product End -->
				


			</div>

		</div>


	</div>

</div>
  <div class="container"> 
  Bình luận     
        <div class="fb-comment-embed"
   data-href="{{URL::to('doan/'."1")}}"
   data-width="500"></div>
  </div>
  <br>
  <br>
  <br> 


@include('view/footer')