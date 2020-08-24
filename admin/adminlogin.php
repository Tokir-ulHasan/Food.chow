<?php include_once "adminincludes/login.php"; ?>
<!DOCTYPE html>
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
    <div class="container-fluid d-flex justify-content-center align-items-center adminlog ">
     <div class="boxs">
        <form action="" method="post">
            <div class="d-flex justify-content-center">
               <div class="d-block">
                   <h3 class="text-danger h2">Food<span class="text-primary">.chow</span></h3>
                   <h4 class="text-light text-center mt-4">Admin Login</h4>
               </div>
      
            </div>
            <div class="form-group boxifo mt-5 mx-2">
              <input type="text" class="form-control " id="exampleInputEmail1" name="userName" aria-describedby="emailHelp" placeholder="User Name">
            </div>
            <div class="form-group boxifo mt-5 mx-2">
              <input type="password" class="form-control" name="userPass" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-dark btn-sm px-5">Login</button>
            </div>
           
          </form>
     </div>
        
    </div>
</body>
</html>