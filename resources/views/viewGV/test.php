<?php 
include('../view/adminleftgv.php');
include('../view/topcontengv.php');
?>


           
                <h3>  
                     <select name="brand" id="brand">  
                          <option value="">Show All Product</option>  
                           <option value="">Show All Product</option>  
                     </select>  
                     <br /><br />  
                     <div class="row" id="show_product">  
                         sdsd
                     </div>  
                </h3>  
           
  
 

<?php
include('../view/footergv.php');
 ?>
<script>  
 $(document).ready(function(){  
      $('#brand').change(function(){  
           var brand_id = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{brand_id:brand_id},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
 });  
 </script>  