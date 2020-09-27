<?php
include_once '../lib/Database.php';

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
                    <li class="nav-item dropdown  mr-3">
                        <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" onclick="myFun()" aria-expanded="true">
                            <span   >Pages<i class="fa fa-plus  pl-2 pr-1" style="font-size: small" id="iconChange"></i></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropcol">
                            <a class="dropdown-item" href="#">Single Page</a>
                            <a class="dropdown-item" href="#">404 Pages</a>
                            <a class="dropdown-item" href="#">Catagory</a>
                        
                        </div>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link " href="#">Blog</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link " href="#">Contact</a>
                    </li>
                    <li class="nav-item mr-3">
                        <span class="nav-link log-res"> <a href="#login" data-toggle="modal" data-target="#login">Login</a>/<a href="#login" data-toggle="modal" data-target="#regitration">Registration</a></span>
                    </li>
                </ul>
            </div>
        
        </nav>
        <div class="overlay"></div>
    </header>
   