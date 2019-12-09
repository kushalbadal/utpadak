 <?php $customer_session = $_SESSION['customer_email'];

			$get_customer = "select * from customers where customer_email='$customer_session'";

			$run_customer = mysqli_query($con,$get_customer);

			$row_customer = mysqli_fetch_array($run_customer);

			$cu_id = $row_customer['customer_id']; 

			?>

<div class="row"><!-- row 2 begin -->
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		<div class="panel panel-default"><!-- panel panel-default begin -->
			<div class="panel-heading"><!-- panel-heading begin -->
				<h3 class="panel-title"><!-- panel-title begin -->

					<i class="fa fa-money fa-fw"></i> Become a Utpadak?

				</h3><!-- panel-title finish -->
			</div><!-- panel-heading finish -->

			<div class="panel-body"><!-- panel-body begin -->
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
					<div class="form-group"><!-- form-group 1 begin -->

						<label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

							Manufacturer Name 

						</label><!-- control-label col-md-3 finish --> 

						<div class="col-md-6"><!-- col-md-6 begin -->

							<input name="manufacturer_name" type="text" class="form-control" required="required">

						</div><!-- col-md-6 finish -->

					</div><!-- form-group 1 finish -->

					<div class="form-group"><!-- form-group 2 begin -->

						<label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

							Email 

						</label><!-- control-label col-md-3 finish --> 

						<div class="col-md-6"><!-- col-md-6 begin -->

							<input name="manufacturer_email" type="email" class="form-control" required>

						</div><!-- col-md-6 finish -->

					</div><!-- form-group 2 finish -->

					<div class="form-group"><!-- form-group 3 begin -->

						<label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

							Contact 

						</label><!-- control-label col-md-3 finish --> 

						<div class="col-md-6"><!-- col-md-6 begin -->

							<input name="manufacturer_contact" type="number" class="form-control" required>

						</div><!-- col-md-6 finish -->

					</div><!-- form-group 3 finish -->

					<div class="form-group"><!-- form-group 4 begin -->

						<label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

							Do you want a store?

						</label><!-- control-label col-md-3 finish --> 

						<div class="col-md-6"><!-- col-md-6 begin -->

							<input name="manufacturer_store" type="radio" value="yes" required>
							<label>Yes</label>

							<input name="manufacturer_store" type="radio" value="no" required>
							<label>No</label>

						</div><!-- col-md-6 finish -->

					</div><!-- form-group 4 finish -->
					<div class="form-group"><!-- form-group 5 begin -->

						<label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

							Manufacturer Image

						</label><!-- control-label col-md-3 finish --> 

						<div class="col-md-6"><!-- col-md-6 begin -->

							<input type="file" name="manufacturer_image" class="form-control" required>

						</div><!-- col-md-6 finish -->

					</div><!-- form-group 5 finish -->
					<div class="form-group"><!-- form-group 6 begin -->

						<label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 

						<div class="col-md-6"><!-- col-md-6 begin -->

							<input type="submit" name="submit" value="Submit " class="btn btn-primary form-control">

						</div><!-- col-md-6 finish -->

					</div><!-- form-group 6 finish -->
				</form><!-- form-horizontal finish -->
			</div><!-- panel-body finish -->
		</div><!-- panel panel-default finish -->
	</div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

if(isset($_POST['submit'])){

	$manufacturer_name = $_POST['manufacturer_name'];

	$manufacturer_store = $_POST['manufacturer_store'];

	$manufacturer_email = $_POST['manufacturer_email'];

	$manufacturer_contact = $_POST['manufacturer_contact'];

	$manufacturer_image = $_FILES['manufacturer_image']['name'];

	$temp_name = $_FILES['manufacturer_image']['tmp_name'];
	$get_ma = "select count(*) as total from manufacturers where manufacturer_title='$manufacturer_name'";
	 $num=mysqli_query($con,$get_ma);
	 $nm=mysqli_fetch_object($num);;
	if($nm->total>=1){
		echo "<script>alert('manufacturer name already exists.Change your name.')</script>";
		echo "<script>window.open('my_account.php?utpadakform','_self')";
	}
	else{
		move_uploaded_file($temp_name,"../admin/other_images/$manufacturer_image");
		          
		$update_customer = "update customers set is_manufacturer=1 where customer_id='$cu_id' ";
    
    $run_customer = mysqli_query($con,$update_customer);


		$insert_manufacturer = "insert into manufacturers (manufacturer_title,manufacturer_image,manufacturer_email,store_product,manufacturer_contact) values (
		'$manufacturer_name','$manufacturer_image','$manufacturer_email','$manufacturer_store','$manufacturer_contact')";
		$run_manufacturer = mysqli_query($con,$insert_manufacturer);
		if ($run_manufacturer) {

			echo "<script>alert('Your new manufacturer has been inserted')</script>";

			echo "<script>window.open('my_account.php?utpadakform','_self')</script>";
		}

	}

}

?>
