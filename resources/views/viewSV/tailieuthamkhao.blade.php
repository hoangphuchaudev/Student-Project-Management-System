@include('view/adminleft')
@include('view/topcontent')
<div class="andro_subheader pattern-bg primary-bg">
  <div class="container">
    <div class="andro_subheader-inner">
      <h1>Tài liệu tham khảo</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{URL::to('doan/'.$MaDA)}}">{{$TenDA}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tài liệu tham khảo</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Hướng dẫn:<h6>- Sinh viên click <i class="fas fa-eye"></i> để xem trực tiếp tài liệu và có thể tải về</h6> </h6>
  </div>


  @if($MaDT=="")  

  <div style='text-align:center'>Bạn chưa đăng ký đề tài</div>
  <div style='height:600px'></div>

  @else
         
  <div class="col-xl-auto col-md-auto mb-auto">
    <div class="card border-bottom-success shadow h-100 py-2">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped  table-hover" id="dataaa" width="100%" cellspacing="0" >
            <thead >
              <tr>
                <th>STT</th>
                <th>Tên tài liệu</th>
                <th>Loại file</th>
                <th>Loại đồ án</th>
                <th style="text-align:center">Thao tác</th>

              </tr>
            </thead>
            <tbody>
            <?php
            $n=count($tailieuthamkhao);
            for($i=0;$i<$n;$i++)
            {
             ?>             
              <tr onclick="myFunction('{{ $tailieuthamkhao[$i]->FileTL }}')">
                <td><?php echo ($i+1) ?></td>
                <td>{{ $tailieuthamkhao[$i]->TenTL }}</td>
                <td>{{ substr($tailieuthamkhao[$i]->FileTL,3) }}</td>
                <td>{{ $TenDA }}</td>
                <td style="text-align:center"><a href="#"><i class="fas fa-eye"></i></a></td>
                <?php
                echo "</tr>";
              }
            ?>
          </tbody>
         
@endif



</table>
</div>
</div>
</div>
</div>
</div>




<style type="text/css">

  .table-dark td, .table-dark th {
    border: 2px solid #e3e6f0;
  }

</style>
<script type="text/javascript">
  function myFunction(a) 
  {
  // alert(a);
  var s="{{URL::to('public/fil/')}}";
  window.open(s+'/'+a);
  }
  
</script>
@include('view/footer')