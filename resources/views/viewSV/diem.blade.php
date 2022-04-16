<?php 
use App\Http\Controllers\DetaiController; 
?>
@include('view/adminleft')
@include('view/topcontent')
<div class="andro_subheader pattern-bg primary-bg">
  <div class="container">
    <div class="andro_subheader-inner">
      <h1>Bảng điểm đồ án</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

        </ol>
      </nav>
    </div>
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
   
  </div>
         
  <div class="col-xl-auto col-md-auto mb-auto">
    <div class="card border-bottom-success shadow h-100 py-2">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped  table-hover" id="dataaa" width="100%" cellspacing="0" style="text-align:center" >
            <thead >
              <tr>
                <th>STT</th>
                <th>Tên đề tài</th>
                <th>Loại đồ án</th>
                <th>Điểm số</th>
                <th style="text-align:center">Điểm chữ</th>

              </tr>
            </thead>
            <tbody>
            <?php
            $n=count($all);
            for($i=0;$i<$n;$i++)
            {
             ?>             
              <tr>
                <td><?php echo ($i+1) ?></td>
                <td>{{ DetaiController::getTenDT_MaDT($all[$i]->MaDT) }}</td>
                <td>{{ DetaiController::getTenDA_MaDA(DetaiController::getMaDA_MaDT($all[$i]->MaDT)) }}</td>
                <td>{{ $all[$i]->Diem }}</td>
                <td>{{ DetaiController::getDiemchu($all[$i]->Diem) }}</td>
                <?php
                echo "</tr>";
              }
            ?>
          </tbody>
         



</table>
</div>
</div>
</div>
</div>
</div>
@include('view/footer')