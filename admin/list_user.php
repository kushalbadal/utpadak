<!-- <?php 
//session_start();

//if ( !isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true ) {
  //  header('Location: login.php');

?> -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kdf";

session_start();
$_SESSION['userdetails'] = 0;

if( !isset($_SESSION['userdetails']) ) {
    die("No kiddies please");
}

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `user` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
// $data = mysqli_num_rows($result);
// echo "<pre>"; print_r($result); exit();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>CMS Dashboard</title>
	<script type="text/javascript">
		var x = ["Dashboard", "Add User", "List User"];
		// for (var i =0; i <= 4; i++) {
			document.getElementById("menuheading").innerHTML = x;
		// }
// 		<div id="topBar">
//     <a href ="#" id="load_home"> HOME </a>
// </div>
// <div id ="innerwrapper">        
// </div>

$(document).ready( function() {
	$("#innerwrapper").on("click", function() {
		$("#innerwrapper").load("add_user.html");
	});
});
</script>
</script>
</head>
<body style="background-color:#606abe">
	<div class="body_wrapper">
		<div class="innerwrapper" onclick="">		
<!-- 			<div class="header">
			<h1 style="color: #F00;">School Management Information System (SMIS)</h1>
		</div> -->

		
		<div class="sidebar">
			<div class="tsbar">
				<div style="padding-top: 10px !important;font-size: 15.5px;position: relative;border-radius: 5px 0px 0px 0px;"><b><a href="#" style="text-decoration: none;color: white;">Khwopa Discussion Forum CMS</a></b></div>
			</div>
			<div class="dsbar">
<!-- 				<?php for ($i=0; $i < 5; $i++) { 
					?>
						<div class="menu">
							<p style="color: white;background-color: blue;" id="menuheading"></p>
							Dashboard
						</div>
						<hr>
						<?php }?> -->
						<div class="menubg">
							<div class="menu">
                            <p style="color: white;background-color: blue;" id="menuheading"></p>
                            <i  class="fa fa-dashboard" style="color: white;"></i>
                           <a class="menulink" href="index.php">Dashboard</a>
                    </div>
                    <div class="menu">
                            <p style="color: white;background-color: blue;" id="menuheading"></p>
                            <i class="fa fa-bar-chart"></i>
                             <a style="margin-bottom:14px;" class="menulink" href="list_user.php" >List User</a>
                    </div>
                    <div class="menu">
                            <p style="color: white;background-color: blue;" id="menuheading"></p>
                            
                          <i class="fa fa-plus-square"></i><a style="margin-bottom:14px;" class="menulink" href="add_user.php" >Add User</a>
                    </div>

                    <div class="menu">
                            <p style="color: white;background-color: blue;" id="menuheading"></p>
                            <i class="fa fa-book"></i><a class="menulink" href="edit_user.php">Edit User</a>
                    </div>
                    <div class="menu">

                            <p style="color: white;background-color: blue;" id="menuheading"></p>
                                <i class="fa fa-minus-square"></i> <a style="margin-bottom:14px;" class="menulink" href="delete_user.php" >Delete User</a>
                    </div>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="dimg"><span style="font-size: 30px;margin: 15px;margin-top: 15px;">Users</span>

                        <div id="userdetail">
                <b style="float: right;"> Logged in as <mark> <?php echo $_SESSION['username']; ?></mark></b>
                </div>

						<p><a href="index.php" style="text-decoration: none; padding-left: 10px;color: black;">Home</a> &raquo; Dashboard</p>
<!-- 				<?php for ($i=0; $i < 10; $i++) { 
					?>
					<a href="add_user.php"><img id="im" src="images/add.png" width="80px" title="Add User"></a>
					<?php }?> -->
					<a href="add_user.php"><img src="images/add.png" height="30px"></a>
					<table border="0px" cellspacing="3" cellpadding="20" style="background-image: linear-gradient(to bottom,#f9f7f7,#b9b3b3);">
						<tr style="background-image: linear-gradient(to bottom,#45d8e8,#97a0e6);">
							<th>S.N.</th>
							<th>Username</th>
							<th>Email</th>
							<th>Action</th>
							<th>Update</th>
						</tr>
						<?php
						if (mysqli_num_rows($result)>0) {
    // output data of each row
    //$user_list = mysqli_fetch_assoc($result);
    // echo "<pre>"; print_r($user_list);exit;
							$i=0;
							while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";

								?>
								<tr>
									<td><?= ++$i;?></td>
									<td><?= $row["name"];?></td>
									<td><?= $row["username"];?></td>
									<td><?= $row["email"];?></td>
									<td><mark><a href="edit_user.php?id=<?= $row['id'];?>">Edit</a> | <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_user.php?id=<?= $row['id'];?>">Delete</a></td></mark>
								</tr>
								<?php
							}   
						} else {
							?>
							<tr>
								<td colspan="4">No Record(s) found.</td>
							</tr>
							<?php
						}
						?>
						<?php 
						mysqli_close($conn);
						?>
					</table>
				</div>
			</div>
		</div>
	</div>


	<style type="text/css">
        i{
            float: left;
            margin-left:10px;
        }
		a
		{
			text-decoration: none;
			color: black;
		}
		a:hover
		{
			color: red;
			background-color: white;
		}
		mark
		{
			background-color:#ffdad3;
		}

		.dimg2
	}
	{
		height:150px; !important 
		width: 100%;
		background-color:#e6e9ff;
		float: left;
		margin-top: 20px;
		position: relative;
		border-radius: 7px 7px 5px 5px;
		box-shadow: 0 3px 12px -2px rgba(0, 0, 0, 1);

	}

	.menulink
	{
		text-decoration: none;
		color: white;
		padding-top: 5px;

	}
	.body_wrapper{
		margin:-15px 0 0 -10px; 
		width:120%;
		height: 700px;
		background-color:#606abe;
		/*border: 2px solid #1362AD;*/
	}
	.innerwrapper
	{
		margin: 136px;
		margin-top: 40px;
		height: 78%;
		width: 70%;
		background-color:#546473;
		position: relative;
		border-radius: 7px 7px 5px 5px;
		box-shadow: 0 3px 12px -2px rgba(0, 0, 0, 1);

	}
	.menubg
	{
		background-color: #232b33;
		height: 102%;
		padding-top: 1px;
		position: relative;
		border-radius: 0px 0px 5px 5px;
		box-shadow: 0 3px 12px -2px rgba(0, 0, 0, 1);
	}
	.menu
	{
		height: 4%;
		width: 97%;
		margin-top: 8px;
		font-size: 17.5px;

		/*background-color: #34404c;*/

		/*}*/
	/*.header{
		margin: 5px;
		padding: 5px;#339ca8
		}*/
	}
	.menu:hover
	{
		background-color: #339ca8;
		height:4.2%; 
		width:100.5%;
		font-size: 110%;
		position: relative;
		box-shadow: 0 3px 12px -2px rgba(0, 0, 0, 1);
	}
	.sidebar
	{
		float: left;
		background-color: #435060;
		height: 100%;
		width: 17%;
		text-align: center;
		color: white;
		position: relative;
		border-radius: 0px 0px 5px 5px;
		box-shadow: 0 3px 12px -2px rgba(0, 0, 0, 1);
	}
	.tsbar
	{
		height: 9%;
		background-image: linear-gradient(to right,#7862a0,#8963ce);
		border-radius: 5px 0px 0px 0px;
	}
	.dsbar
	{
		height: 88%;
		background-image: linear-gradient(to bottom,#435060,#334254);

	}
	.content{
		margin-left: 228px;
		padding: 12px;	
	}
	.cimg
	{
		height: 70%;
		width: 100%;
		background-color: #ffffff;
		/*background-color: black;*/
		float: right;

	}
	.dimg
	{
		height:100% !important ;
		width: 85%;
		background-image: linear-gradient(to bottom,#f5e7e7,#97a0e6);
		float: left;
		margin-top: 20px;
		position: relative;
		border-radius: 7px 7px 5px 5px;
		box-shadow: 0 3px 12px -2px rgba(0, 0, 0, 1);
	}

	#im{
		border:1px solid #4282C4;
		border-top-right-radius: 15px;
		padding: 2px;
	}
    #userdetail
        {
            font-size: 18px;
            height: 30%;
            width: 17%;
            float: right;
        }
</style>
</body>
</html>