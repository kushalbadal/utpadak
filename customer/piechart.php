<?php
include('includes/db.php');
$get_date="select * from pending_orders";
$run=mysqli_query($con, $get_date);
$count_c=array(0,0,0,0,0,0,0,0,0,0,0,0);
while($row=mysqli_fetch_array($run)){

	$g_date=$row['order_at'];
	$month=substr($g_date,5,2);
	for($i=1;$i<=12;$i++){
		if($month==$i){
			$count_c[$i-1]++;
			break;
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>JavaScript Bar Chart</title>
	<script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>
</head>
<body>
	<div id="container" style="height: 500px;"></div>
	<script>
		anychart.onDocumentReady(function() {

        // set the data
        var data = {
        	header: ["Month", "Total No. of Item Sold"],
        	rows: [
        	["Jan", <?php echo" $count_c[0]" ?>],
        	["Feb", <?php echo" $count_c[1]" ?>],
        	["Mar", <?php echo" $count_c[2]" ?>],
        	["Apr", <?php echo" $count_c[3]" ?>],
        	["May", <?php echo" $count_c[4]" ?>],
        	["Jun", <?php echo" $count_c[5]" ?>],
        	["Jul", <?php echo" $count_c[6]" ?>],
        	["Aug", <?php echo" $count_c[7]" ?>],
        	["Sep", <?php echo" $count_c[8]" ?>],
        	["Oct", <?php echo" $count_c[9]" ?>],
        	["Nov", <?php echo" $count_c[10]" ?>],
        	["Dec", <?php echo" $count_c[11]" ?>]
        	]};

        // create the chart

        var chart = anychart.pie();
 chart.radius("500");
        // add the data
        chart.data(data);

        // set the chart title
        chart.title("Total number of item sold/transaction(Monthly Basis).");

        // draw
        chart.container("container");
        chart.draw();
    });
</script>
</body>
</html>

<script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>