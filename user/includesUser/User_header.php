<?php

include_once "../config/connect.php";



   if($_SESSION['customer_login_status']=="loged in" and isset($_SESSION['user_id']) )
    {
        $id=$_SESSION['user_id'];
        $sql="select * from tbl_user where id='$id' ";
            $r=mysqli_query($cont,$sql);
            $row=mysqli_fetch_assoc($r);
            $name=$row['name'];
            $email=$row['email'];
            $phone=$row['phoneNo'];
            $address=$row['address'];
            $joinDate=$row['joinDate'];
			
    }
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['customer_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:index.php");    
   }


?>





<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Food.Chow</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../asset/css/bootstrap.min.css'>
    <link href="../asset/css/animate.min.css" rel="stylesheet">
    <link href="../asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="../asset/css/owl.carousel.min.css" rel="stylesheet">
    <link href="../asset/css/owl.theme.default.css" rel="stylesheet">
    <link href="../asset/css/style.css" rel="stylesheet">
    <link href="../asset/css/responsiveUser.css" rel="stylesheet">
    <link href="../asset/css/profile_css.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <!---Header Section--->
    <header id="headerSection">
        <nav class="navbar navbar-expand-lg navbar-danger text-danger bg-light  fixed-top navhead">
            <a class="navbar-brand pb-3" href="#"><img src="../asset/images/logo2.png"></a>
            <button class="navbar-toggler navbar-light align-self-start" type="button" >
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse d-flex flex-column flex-lg-row  flex-xl-row justify-content-lg-end  bg-light text-danger p-sm-3 p-lg-0 mt-lg-0 mt-sm-5 mobileMenu" id="navbarSupportedContent">
                
                <ul class="navbar-nav  " id="navitem">
                    <li class="nav-item mr-3">
                        <form class="form-inline my-2 my-lg-0">
                            <div class="input-group">
                                <div class="input-group-prepend" >
                                    <a class="btn search text-danger" href=""><span class="fa fa-search"></span></a>
                                   
                                </div>
                                <input class="form-control searchbox  pb-1" type="text" placeholder="Search" aria-label="Search">
                            </div>
                        </form>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link active"   href="#">Home</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link " href="#">About</a>
                    </li>
                    
                    <li class="nav-item mr-3">
                        <a class="nav-link " href="#">Blog</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link " href="#">Contact</a>
                    </li>
                    <li class="nav-item dropdown  mr-3">
                        <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" onclick="myFun()" aria-expanded="true">
                            <span   ><?php echo "$name"; ?><i class="fa fa-plus  pl-2 pr-1" style="font-size: small" id="iconChange"></i></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropcol">
                            <a class="dropdown-item" href="../user/user_profile.php">View Profile</a>
                            <a class="dropdown-item" href="#">View Order</a>
                            <a class="dropdown-item" href="#">My Cart</a>
                            <a class="dropdown-item" href="?sign=out">LogOut</a>
                        
                        </div>
                    </li>
                </ul>
            </div>
        
        </nav>
        <div class="overlay"></div>
    </header>
   