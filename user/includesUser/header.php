<?php 

include_once '../lib/Session.php'; 
include_once '../lib/Database.php'; 
include_once '../lib/formatData.php';
Session::initializedSession(); 

$db = new Database();
$fm = new Formate();
$userId = Session::getSession('userId');
$userEmail = Session::getSession('userEmail');

//===================Logout===============
if (isset($_GET['logout'])&& $_GET['logout']='out'){
    Session::destroySession_user();
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
    <link href="../asset/css/jquery.rateyo.min.css" rel="stylesheet">
    <link href="../asset/css/owl.theme.default.css" rel="stylesheet">
    <link href="../asset/css/style.css" rel="stylesheet">
    <link href="../asset/css/responsiveUser.css" rel="stylesheet">
    <link href="../asset/css/profile_css.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <style>
    .rate_widget {
    border:     1px solid #CCC;
    overflow:   visible;
    padding:    10px;
    position:   relative;
    width:      180px;
    height:     32px;
}
.ratings_stars {
    background: url('star_empty.png') no-repeat;
    float:      left;
    height:     28px;
    padding:    2px;
    width:      32px;
}
.ratings_vote {
    background: url('star_full.png') no-repeat;
}
.ratings_over {
    background: url('star_highlight.png') no-repeat;
}
.total_votes {
    background: #eaeaea;
    top: 58px;
    left: 0;
    padding: 5px;
    position:   absolute;  
} 
.movie_choice {
    font: 10px verdana, sans-serif;
    margin: 0 auto 40px auto;
    width: 180px;
}
    
    </style>
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
                        <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend" >
                                    <button class="btn search text-danger" name="search"><span class="fa fa-search"></span></button>
                                   
                                </div>
                                <input class="form-control searchbox  pb-1" type="text" placeholder="Search" aria-label="Search" name="searchtxt">
                            </div>
                        </form>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link active" style="font-size:18px"  href="index.php">Home</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link " style="font-size:18px" href="#">About</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link " style="font-size:18px" href="#">Contact</a>
                    </li>
                    <?php
                       if($userId)
                       {
                           
                           $query = "SELECT * FROM `tbl_user` WHERE `id` = $userId ";
                           $res = $db->SelectData($query);
                           if($res){
                            $data = mysqli_fetch_assoc($res);
                    ?>
                     <li class="nav-item dropdown  mr-3">
                        <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" onclick="myFun()" aria-expanded="true">
                            <!--<span   style="font-size:12px"><?php //echo $data['name']; ?></i></span>-->
                            <span style="font-size:15px"><?php echo $data['name']; ?></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropcol" style="top: 64px;left: -40%;">
                            <a class="dropdown-item" href="../user/user_profile.php">View Profile</a>
                            <a class="dropdown-item" href="myorder.php">View Order</a>
                            <a class="dropdown-item" href="../user/mycart.php">My Cart</a>
                            <a class="dropdown-item" href="?logout=out">LogOut</a>
                        
                        </div>
                    </li>
                    <?php
                        }}else{ ?>
                        <li class="nav-item mr-3">
                            <span class="nav-link log-res"> <a href="#login" data-toggle="modal" data-target="#login">Login</a>/<a href="#login" data-toggle="modal" data-target="#regitration">Registration</a></span>
                        </li>
                   <?php }?>
                </ul>
            </div>
        
        </nav>
        <div class="overlay"></div>
    </header>
   <!----Login Section------>
   <?php include 'login.php' ?>
    <!----Registration Section------>
  <?php include 'registration.php' ?>
    <!---Search Section--->