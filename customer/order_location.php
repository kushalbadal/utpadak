 <?php $customer_session = $_SESSION['customer_email'];

      $get_customer = "select * from customers where customer_email='$customer_session'";

      $run_customer = mysqli_query($con,$get_customer);

      $row_customer = mysqli_fetch_array($run_customer);

      $c_id = $row_customer['customer_id'];
       

     

      

      ?>


      
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Delivery Information 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Your State </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="state" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Your District </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                         <input name="district" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Area </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="area" type="text" class="form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Contact </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="contact" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Submit" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
</body>
</html>


<?php 

if(isset($_POST['submit'])){
    
    $state = $_POST['state'];
    $district = $_POST['district'];
    $area = $_POST['area'];
    $contact = $_POST['contact'];
    
    $insert_location = "insert into order_location (state,district,area,contact,order_at) values ('$state',
    '$district','$area','$contact',NOW())";
    
    $run_product = mysqli_query($con,$insert_location);
   
    if($run_product){

       $get_order = "select * from cart where c_id='$c_id'";
   
      $run_order = mysqli_query($con,$get_order);
 while($row_order = mysqli_fetch_array($run_order)){

      $due_amount = $row_order['p_price']; 
       $qty = $row_order['qty']; 
        $size = $row_order['size']; 
        $p_id=$row_order['p_id'];
        $insert_order = "insert into customer_orders (customer_id,due_amount,qty,size,order_date,order_status) values ('$c_id','$due_amount','$qty','$size',NOW(),'pending')";
    
    $in_order = mysqli_query($con,$insert_order);
     $insert = "insert into pending_orders (customer_id,due_amount,product_id,qty,size,order_status,order_at,contact) values ('$c_id','$due_amount','$p_id','$qty','$size','pending',NOW(),'$contact')";
    
    $in = mysqli_query($con,$insert);
  }
  if($in){
        echo "<script>alert('Sucessfully Ordered')</script>";
        echo "<script>window.open('my_account.php,'_self'')</script>"; 
      }
     
    }
   
  }


?>

