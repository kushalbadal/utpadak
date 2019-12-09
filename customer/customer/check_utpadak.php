<?php
$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$manufacturer = $row_customer['is_manufacturer'];

if ($manufacturer==0) {
	include("utpadakform.php");
}
elseif($manufacturer==1){

include("add_product.php");
}

?>