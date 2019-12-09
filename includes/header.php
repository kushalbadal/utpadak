<?php

session_start();

include("includes/db.php");
include("functions/functions.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Utpadak</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div id="top" style="background-color: #4a9a1e">
        <!-- Top Begin -->
        <div class="container">
            <!-- container Begin -->

            <div class="col-md-6 offer">
                <!-- col-md-6 offer Begin -->

                <a href="#" class="btn btn-success btn-sm">

                    <?php

                    if (!isset($_SESSION['customer_email'])) {

                        echo "Welcome: Guest";
                    } else {

                        echo "Welcome: " . $_SESSION['customer_email'] . "";
                    }

                    ?>

                </a>&nbsp&nbsp&nbsp&nbsp
                <a href="cart.php"><?php items(); ?> Items In Your Cart &nbsp | &nbsp Total Price: <?php total_price(); ?> </a>

            </div><!-- col-md-6 offer Finish -->

            <div class="col-md-6">
                <!-- col-md-6 Begin -->

                <ul class="menu">
                    <!-- cmenu Begin -->

                    <li>
                        <a href="customer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="customer/my_account.php?my_orders">My Account</a>
                    </li>
                    <li>
                        <a href="cart.php">Go To Cart</a>
                    </li>
                    <li>
                        <a href="checkout.php">

                            <?php

                            if (!isset($_SESSION['customer_email'])) {

                                echo "<a href='checkout.php'> Login </a>";
                            } else {

                                echo " <a href='logout.php'> Log Out </a> ";
                            }

                            ?>

                        </a>
                    </li>

                </ul><!-- menu Finish -->

            </div><!-- col-md-6 Finish -->

        </div><!-- container Finish -->
    </div><!-- Top Finish -->
    <div class="container-fluid" style="background-color:white;">
        <div class="col-md-4 left">
            <a href="index.php" class="navbar-brand home">
                <!-- navbar-brand home Begin -->

                <img src="images/utpadak.png" alt="Utpadak Logo" class="hidden-xs" style="margin-top: -7.5vh;width: 145px;margin-left:5.5em;">
                <img src="images/utpadak-mobile.png" alt="Utpadak Logo Mobile" class="visible-xs">

            </a><!-- navbar-brand home Finish -->
        </div>
        <div class="col-md-8 right">
            <img src="images/paypall_img.png" style="width: 180px;" alt="offers">
        </div>
    </div>

    <div id="navbar" class="navbar navbar-default bg-success">
        <!-- navbar navbar-default Begin -->

        <div class="container">
            <!-- container Begin -->

            <div class="navbar-header">
                <!-- navbar-header Begin -->
                <!-- 
                <a href="index.php" class="navbar-brand home"> -->
                <!-- navbar-brand home Begin -->
                <!-- 
                    <img src="images/utpadak.png" alt="Utpadak Logo" class="hidden-xs" style="margin-top: -7.5vh;width: 145px;">
                    <img src="images/utpadak-mobile.png" alt="Utpadak Logo Mobile" class="visible-xs">

                </a> -->
                <!-- navbar-brand home Finish -->

                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                    <span class="sr-only">Toggle Navigation</span>

                    <i class="fa fa-align-justify"></i>

                </button>

                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                    <span class="sr-only">Toggle Search</span>

                    <i class="fa fa-search"></i>

                </button>

            </div><!-- navbar-header Finish -->

            <div class="navbar-collapse collapse" id="navigation">
                <!-- navbar-collapse collapse Begin -->

                <div class="padding-nav">
                    <!-- padding-nav Begin -->

                    <ul class="nav nav-tabs navbar-nav left">
                        <!-- nav navbar-nav left Begin -->

                        <li class="<?php if ($active == 'Home') echo "active"; ?>">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="<?php if ($active == 'Shop') echo "active"; ?>">
                            <a href="shop.php">Shop</a>
                        </li>
                        <li class="<?php if ($active == 'Account') echo "active"; ?>">

                            <?php

                            if (!isset($_SESSION['customer_email'])) {

                                echo "<a href='checkout.php'>My Account</a>";
                            } else {

                                echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                            }

                            ?>

                        </li>
                        <li class="<?php if ($active == 'Cart') echo "active"; ?>">
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li class="<?php if ($active == 'Contact') echo "active"; ?>">
                            <a href="contact.php">Contact Us</a>
                        </li>

                    </ul><!-- nav navbar-nav left Finish -->

                </div><!-- padding-nav Finish -->

                <a href="cart.php" class="btn navbar-btn btn-success right">
                    <!-- btn navbar-btn btn-success Begin -->

                    <i class="fa fa-shopping-cart"></i>

                    <span><?php items(); ?> Items In Your Cart</span>

                </a><!-- btn navbar-btn btn-success Finish -->

                <div class="navbar-collapse collapse right">
                    <!-- navbar-collapse collapse right Begin -->

                    <button class="btn btn-success navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                        <!-- btn btn-success navbar-btn Begin -->

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                    </button><!-- btn btn-success navbar-btn Finish -->

                </div><!-- navbar-collapse collapse right Finish -->

                <div class="collapse clearfix" id="search">
                    <!-- collapse clearfix Begin -->

                    <form method="get" action="results.php" class="navbar-form">
                        <!-- navbar-form Begin -->

                        <div class="input-group">
                            <!-- input-group Begin -->

                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>

                            <span class="input-group-btn">
                                <!-- input-group-btn Begin -->

                                <button type="submit" name="search" value="Search" class="btn btn-success">
                                    <!-- btn btn-success Begin -->

                                    <i class="fa fa-search"></i>

                                </button><!-- btn btn-success Finish -->

                            </span><!-- input-group-btn Finish -->

                        </div><!-- input-group Finish -->

                    </form><!-- navbar-form Finish -->

                </div><!-- collapse clearfix Finish -->

            </div><!-- navbar-collapse collapse Finish -->

        </div><!-- container Finish -->

    </div><!-- navbar navbar-default Finish -->