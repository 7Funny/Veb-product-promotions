<?php include("connection.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Box - Modern Magazine &amp; Newspaper HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="newsbox-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newsboxNav">

                        <!-- Nav brand -->
                        <a href="index.php" class="nav-brand"><img src="img/core-img/logo.jpg" alt=""></a>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul class="dropdown">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="promotions.php">Promotions</a></li>
                                    <?php if (!empty($_SESSION['user']['login']) and !empty($_SESSION['user']['admin'])) { ?> 
                                        <li><a href="promotion_add.php">Add promotion</a></li>
                                        <li><a href="new_add.php">Add news</a></li>
                                        <li><a href="prize_add.php">Add prize</a></li>
                                        <li><a href="results.php">Results</a></li>                        
                                    <?php } if(!empty($_SESSION['user']['login']) and empty($_SESSION['user']['admin'])) { ?>              
                                        <li><a href="prize_order.php">Ordered product</a></li>
                                        <li><a href="products.php">Products for points</a></li>
                                        <li><a href="promotion_register.php">Register promotion</a></li>
                                    <?php } if(!empty($_SESSION['user']['login'])) { ?> 
                                        <li><a href="food.php">Products</a></li>
                                        <li><a href="profile.php">Profile</a></li>
                                        <li><a href="logout.php">log out</a></li>
                                    <?php } if(empty($_SESSION['user']['login'])) { ?> 
                                        <li><a href="register.php">login</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->