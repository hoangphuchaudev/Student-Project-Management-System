@include('view/adminleftgv')
@include('view/topcontengv')
 <div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li><a href="{{ URL::to('giangvien') }}">Trang chủ</a></li>&nbsp>&nbsp
        <li class="breadcrumb-item active" aria-current="page">{{ $TenDA }}</li>
      </ol>
  </nav>
@include('view/taskgv')
@include('view/footergv')
