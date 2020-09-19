<?php
session_start();
?>
<section>
        <div class="modal fade " id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog mt-5 pt-5" role="document">
                <div class="modal-content boxlogin">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center boxuser"><i class="fa fa-user"></i></div>
                         <form action="index.php" method="post" >
                         <div class="container box ">
                            <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">User Login</p></div>
                            <div class="my-1 boxinfo">
                                <input type="text"  placeholder="Enter Your Email" id="loginEmail" name="loginEmail">
                                <span id="loginEmailMess" class="text-danger"></span>
                            </div>
                            <div class="my-1  boxinfo">
                                <input type="Password" placeholder="Enter Your Password" id="loginpass" name="loginpass">
                                <span id="" class="text-danger"></span>
                            </div>
                            <div class="my-3 d-flex justify-content-center">
                                <input type="submit" class="btn btn-sm btn-outline-danger px-5 font-weight-bolder mt-3" value="Login" name="login">
                            </div>
                            <div class="container my-5 clearfix Loginuserfooter">
                                <p class="float-left "> No Account? Please </p>
                                <p class="float-right"><a class="text-danger" href="#regitration" data-toggle="modal" data-dismiss="modal" aria-label="Close">Registration</a></p>
                            </div>
                        </div>
                         </form>
                    </div>
                </div>
            
            </div>
        </div>
    </section>
   <?php

include_once '../lib/Database.php';

$db = new Database();
if(isset($_POST['login']))
{
	$email=$_POST['loginEmail'];
	$pass=$_POST['loginpass'];

	$sql="select id,email,password from tbl_user where email='$email' and password='$pass'";
            $r=$db->SelectData($sql);
			$row=mysqli_fetch_assoc($r);
			$id=$row['id'];
            if(mysqli_num_rows($r)>0)
            {
                $_SESSION['user_id']=$id;
                $_SESSION['customer_login_status']="loged in";
                //header("Location:index.php");
                //echo "<script>alert('Logged in successfully..!');window.location='index.php';</script>";
            }
            else
            {
                
                echo "<div class='alert alert-primary|secondary|success|danger|warning|info|light|dark alert-dismissible fade show' role='alert'>
                  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>";
            }
	
}
?>