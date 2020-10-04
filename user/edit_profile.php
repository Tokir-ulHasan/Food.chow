<?php
include_once '../lib/Session.php';
   
Session::CheackSession_user();


include_once '../lib/Database.php';
$db = new Database();
$id=$_SESSION['userId'];
$email=$_SESSION['userEmail'];
if(isset($_POST['save']))
{
    $check = $_FILES["file"]["tmp_name"];
    if(!empty($check) && file_exists($check))
    {
        $file = addslashes(file_get_contents($check));
    /*}
    else
    {
        $file=$image;
    }*/
        $sqlcp = "UPDATE tbl_user set image='$file' where id='$id' or email = '$email'";
        $rcp= $db->QueryExcute($sqlcp);
        if($rcp)
        {
            echo" <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    <span class='sr-only'>Close</span>
                </button><br>
                <strong>Picture Uploaded!</strong>
            </div> ";
        }
    }
    
    
}

?>
   
<!----Header Section---->
<?php include 'includesUser/header.php' ?>
    
<br>
<section>
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <?php
                if($userId || $userEmail)
                  {
                      $query = "SELECT * FROM `tbl_user` WHERE `id` = $userId or `email` = '$userEmail'";
                      $res = $db->SelectData($query);
                      if($res){
                        $row = mysqli_fetch_assoc($res);
                    ?>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                  <?php echo"  <img src='data:image/jpeg;base64,".base64_encode($row['image'])."' alt='No Image' id='imgProfile' style='width: 150px; height: 150px' class='img-thumbnail' /> "; ?>
                                  <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                        <input type="file" style="display: none;" id="profilePicture" name="file" class="form-control" />
                                    </div>
                                </div>
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><?php echo $row['name'] ?></h2>
                                    <h6 class="d-block"><a href="javascript:void(0)"><?php echo $row['email'] ?></a></h6>
                                    <h6 class="d-block">Joined at <?php echo $row['joinDate'] ?></h6>
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                    <input type="submit" class="btn btn-primary d-none" id="btnSave"name="save" value="Save Changes" />
                                    
                                    <input type="submit" class="btn btn-primary" name="save" id="Save" value="Save" ></li>
                                    <input type="reset" class="btn btn-danger" name="" id="" value="Reset" ></li>
                                    
                                </div>
                            </div>
                        </div>
                        <?php 
                               $user_id=$_GET['id']; 
                                if(isset($_POST['save'])){
                                    $name=$_POST['name'];
                                    $email=$_POST['email'];
                                    $address=$_POST['add'];
                                    $mobile=$_POST['phone'];
                                    $dob=$_POST['dob'];
                                    $gender=$_POST['gender'];
                                    $pc=$_POST['pc'];
                                    $up=$_POST['up'];
                                    $city=$_POST['city'];
                                    $dist=$_POST['dist'];
                                    //$file = addslashes(file_get_contents("http://placehold.it/150x150"));
                                    if($name=="" || $email=="" || $mobile=="" || $address=="" || $dob=="" || $gender=="" || $pc=="" || $up=="" || $city=="" || $dist==""){
                                        echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                            <span class='sr-only'>Close</span>
                                        </button>
                                        <strong>All fields should be filled!</strong> You should check in on some of those fields below.
                                        </div>";
                                        }
                                    else{
                                
                                        $update1="UPDATE tbl_user set name='$name',dob='$dob',email='$email',phoneNo='$mobile',address='$address',gender='$gender',district='$dist',city='$city',post_code='$pc',upazilla='$up' where id='$user_id' "; 
                                        $res1 = $db->QueryExcute($update1);
                                        if($res1 == TRUE)
                                            {
                                                echo "<script>alert('Profile Updated Successful..!');window.location='user_profile.php';</script>";   
                                            }
                                        else{echo mysqli_error($db);}
                                    }
                                }
                                
                                
                                ?>
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="fulladdress-tab" data-toggle="tab" href="#fulladdress" role="tab" aria-controls="fulladdress" aria-selected="false">Full Address</a>
                                    </li>
                                    <!--<li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Connected Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="changepass-tab" data-toggle="tab" href="#changepass" role="tab" aria-controls="changepass" aria-selected="false">Change Password</a>
                                    </li>-->
                                </ul>
                                
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>">
                                            
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Birth Date</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="date" id="dob" name="dob" value="<?php $row['dob']; ?>">
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Phone Number</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="phone" id="phone" name="phone" value="<?php echo $row['phoneNo']; ?>">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Gender</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" id="gender" name="gender" value="<?php echo $row['gender']; ?>">
                                            </div>
                                        </div>
                                        <hr />

                                    </div>
                                    <div class="tab-pane fade " id="fulladdress" role="tabpanel" aria-labelledby="fulladdress-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Address</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" id="address" name="add" value="<?php echo $row['address']; ?>">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Postal Code</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" id="pc" name="pc" value="<?php echo $row['post_code']; ?>">
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Upazilla</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" id="up" name="up" value="<?php echo $row['upazilla']; ?>">
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">City</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" id="city" name="city" value="<?php echo $row['city']; ?>">
                                            
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">District</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" id="dist" name="dist" value="<?php echo $row['district']; ?>">
                                            
                                            </div>
                                        </div>
                                        <hr />
                                        

                                    </div>
                                    <!--<div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="connectedServices-tab">
                                        Facebook, Google, Twitter Account that are connected to this account
                                    </div>
                                    <div class="tab-pane fade" id="changepass" role="tabpanel" aria-labelledby="changepass-tab">
                                        <?php //include'includesUser/changepass.php' ?>
                                    </div>-->
                                </div>
                            </div>
                        </div>


                    </div>
                    </form>

                </div>
                <?php }}?>
            </div>
        </div>
    </div>
	</section>	
	
<!----Footer Section---->
<?php include 'includesUser/footer.php' ?>