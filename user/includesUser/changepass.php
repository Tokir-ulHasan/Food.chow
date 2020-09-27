<?php
include_once '../lib/Database.php';
$db = new Database();
if(isset($_POST['submit']))
{

    $id=$_SESSION['user_id'];
    $opass=$_POST['opass'];
    $npass=$_POST['npass'];
	$cpass=$_POST['cpass'];
	if($npass==$cpass)
	{
        $sql="select password from tbl_user where password='$opass' and id='$id'";
        $r=$db->QueryExcute($sql);
        if(mysqli_num_rows($r)>0)
        {
            $sql1="update tbl_user set password='$npass' where id='$id'"; 
            if($db->QueryExcute($sql1))
            {
                echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    <span class='sr-only'>Close</span>
                </button>
                <strong>Password Changed Successfully!</strong> You should check in on some of those fields below.
            </div>";
            }  
        }
        else
        {
            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                <span class='sr-only'>Close</span>
            </button>
            <strong>Old password does not match!</strong> You should check in on some of those fields below.
        </div>";
        }
	}
    else
    {
        echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            <span class='sr-only'>Close</span>
        </button>
        <strong>New password does not match with Confirm password!</strong> You should check in on some of those fields below.
    </div>";
    }
}

?>
<!--<h2 align='center'>Change Your Password</h2> -->
  
  <form action="" method="post">
    <div class="row">
        <div class="col-sm-3 col-md-2 col-5">
        <label style="font-weight:bold;">Old Password</label>
        </div>
        <div class="col-md-8 col-6">
        <input type="password" id="pass" name="opass" placeholder="Your old password..">
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-sm-3 col-md-2 col-5">
        <label style="font-weight:bold;">New Password</label>
        </div>
        <div class="col-md-8 col-6">
        <input type="password" id="pass" name="npass" placeholder="Your new password..">
        </div>
    </div>
  <hr />
    <div class="row">
        <div class="col-sm-3 col-md-2 col-5">
        <label style="font-weight:bold;">Confirm Password</label>
        </div>
        <div class="col-md-8 col-6">
        <input type="password" id="pass" name="cpass" placeholder="Retype Your password..">
        </div>
    </div>
  <hr />
  <div class="row">
    <div class="col-sm-3 col-md-2 col-5">
        <input type="submit" class="btn btn-primary" value="Change Password" name="submit">
        <!-- <input type="button" class="btn btn-primary" name="submit" value="Change Password" /> -->
    </div>
  </div>
  </form>

