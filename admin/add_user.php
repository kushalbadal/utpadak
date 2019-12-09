<?php

session_start();
$_SESSION['userdetails'] = 0;

if( !isset($_SESSION['userdetails']) ) {
    die("No kiddies please");
}


if (isset($_POST['add_user'])) {
	// echo "Nepal";exit();
	$n = $_POST['name'];
	$u = $_POST['username'];
	$e = $_POST['email'];
	$p = $_POST['password'];
	$re_p = $_POST['password-re'];
	// echo 'U: '.$u.', E: '.$e.', P: '.$p;exit;
	if ($p != $re_p) {
		echo '<script type="text/javascript">alert("Password & Confirm Password don\'t match.");</script>';
	}

	$sql = "";
	$sql = "INSERT INTO `user` (`name`,`username`, `email`,`password`) VALUES ('$n','$u', '$e', md5('$p'))";
//echo $sql;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kdf";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully.";
    header('Location: list_user.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
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
                             &nbsp &nbsp<a class="menulink" href="index.php">Dashboard</a>
                    </div>
                    <div class="menu">
                            <p style="color: white;background-color: blue;" id="menuheading"></p>
                            <i class="fa fa-bar-chart"></i>
                             &nbsp &nbsp<a style="margin-bottom:14px;" class="menulink" href="list_user.php" >List User</a>
                    </div>
                    <div class="menu">
                            <p style="color: white;background-color: blue;" id="menuheading"></p>
                            <i class="fa fa-plus-square"></i>
                             &nbsp &nbsp<a style="margin-bottom:14px;" class="menulink" href="add_user.php" >Add User</a>
                    </div>

                    <div class="menu">
                            <p style="color: white;background-color: blue;" id="menuheading"></p>
                            <i class="fa fa-book"></i><a class="menulink" href="edit_user.php">Edit User</a>
                    </div>
                    <div class="menu">

                            <p style="color: white;background-color: blue;" id="menuheading"></p>
                                <i class="fa fa-minus-square"></i> &nbsp &nbsp<a style="margin-bottom:14px;" class="menulink" href="delete_user.php" >Delete User</a>
                    </div>
				</div>
			</div>
		</div>
			<div class="content">
			<div id="dimg">	<span style="font-size: 30px;margin: 15px;margin-top: 15px;">Add User</span><br><br>

				<div id="userdetail">
				<b style="float: right;"> Logged in as <mark> <?php echo $_SESSION['username']; ?></mark></b>
				</div>
				<!-- <h1>Add User</h1> -->

<form action="" method="POST" name="user">
<table cellpadding="5">
	<tr>
		<td>Name:</td>
		<td><input type="text" name="name" placeholder="Name" required="required"></td>
	</tr>
	<tr>
		<td>Username:</td>
		<td><input type="text" name="username" placeholder="Enter Username" required="required"></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="email" name="email" value="" required="required" placeholder="Email"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" value="" name="password" required="required" placeholder="Password"></td>
	</tr>
	<tr>
		<td>Confirm Password:</td>
		<td><input type="password" value="" name="password-re" required="required" placeholder="Renter Password"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="add_user" value="ADD USER"></td>
	</tr>
</table>
</form>
</div>
		
		</div>

	</div>
</div>
	<style type="text/css">
		a:hover
		{
			color: red;
			background-color: white;
		}
		  i{
            float: left;
            margin-left:10px;
        }
			#dimg
		{
			height:100%; 
			width: 70%;
			background-image: linear-gradient(to bottom,#f5e7e7,#97a0e6);
			float: left;
			margin-top: 20px;
			position: relative;
			border-radius: 7px 7px 5px 5px;
			box-shadow: 0 3px 12px -2px rgba(0, 0, 0, 1);

		}

		input {
  /*width: 100%;*/
  position: relative;
  display: inline-block;
  box-sizing: border-box;
/*  padding: 12px;
  margin: 4px 2px;*/
  transition: .5s;
  box-sizing: border-box;

}
input[type = "text"]
{
	/*border: none;
	outline: none;*/
	background-color: #b7ecf3;
	padding: 8px 25px;
	height: 40px;
	border-radius: 25px 25px 25px  25px;
}
input[type = "password"]
{
	/*border: none;
	outline: none;*/
	background-color: #b7ecf3;
	padding: 8px 25px;
	height: 40px;
	border-radius: 25px 25px 25px  25px;
}
input[type = "email"]
{
	/*border: none;
	outline: none;*/
	background-color: #b7ecf3;
	padding: 8px 25px;
	height: 40px;
	border-radius: 25px 25px 25px  25px;
}
input[type = "submit"]
{
	/*border: none;
	outline: none;*/
	background-image: linear-gradient(to bottom,#3cc593,#2a8664);
	padding: 8px 25px;
	height: 40px;
	border-radius: 25px 25px 25px 25px;
	cursor: pointer;
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
			height: 70px;
			width: 100%;
			background-color: #ffffff;
			/*background-color: black;*/
			float: right;
			margin-top: 20px;

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
			margin-top: -40px;
		}
	</style>
</body>
</html>