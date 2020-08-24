<!DOCTYPE html>
<?php
include_once '../lib/Session.php';
Session::CheackSession();
include_once '../lib/Database.php';

?>
<?php

if (isset($_GET['action'])&&$_GET['action']='logout'){
Session::destroySession();
}

?>
<html lang="en">
<head>
  <!--=====Meta Information====-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Food Ordering</title>
  <!--=====Add Css======-->
  <!--======Bootstrap Core====-->
  <link rel='stylesheet' type='text/css' media='screen' href='../asset/css/bootstrap.min.css'>
  <!--====External Sytle Css====-->
  <link href="../asset/css/animate.min.css" rel="stylesheet">
  <link href="../asset/css/font-awesome.min.css" rel="stylesheet">
  <link href="../asset/css/bootstrap4-toggle.min.css" rel="stylesheet">

   <!--====Custom Sytle Css====-->
   <link href="../asset/css/admin_style.css" rel="stylesheet">
   <link href="../asset/css/responsiveaddmin.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid" id="respon">
 
    <!--==============Header Section===============-->
   <header id="header" style="">
      <!--Start Nav bar -->
      <div class="top-menu">
        <nav class="navbar navbar-expand-lg navbar-expand-md  navbar-dark bg-dark" id="nav_menu">
          <!--Side Bar Toggle-->
          <button class="fa fa-sliders" type="button" data-toggle="collapse" data-target="#navbarNavs" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation""  > 
          </button>
         
          
          <!--Nav Brand-->
          <a class="navbar-brand" href="#"><b>Food<span>.Chow</span></b></a>


          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">
              <li class="nav-item " id="navmenuitem">
                <a href="index.html#">
                  <i class="fa fa-desktop"></i>
                  <span class="badge bg-theme">Viste Site</span>
                </a>
             
              <li class="nav-item noyu" id="navmenuitem">
                <a href="index.html#">
                  <i class="fa fa-btc"></i>
                  <span class="badge ">Biling</span>
                </a>
              </li>
              <li class="nav-item " id="navmenuitem">
                <a href="index.html#">
                <i class="fa fa-bell-o"><sup>4</sup></i>
                </a>
              </li>
            </ul>
            <div class="logot justify-content-right ml-auto">
              <a class="btn btn-info" href="?action=logout">Logout</a>

            </div>
          </div>
        </nav>
      </div>
      <!--End Nav bar-->
   </header>