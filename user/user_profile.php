<?php
session_start();
include_once '../lib/Database.php';
$db = new Database();
$id=$_SESSION['user_id'];
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
        $sqlcp = "UPDATE tbl_user set image='$file' where id='$id'";
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
    <!----Login Section------>
    <?php include 'login.php' ?>
    <!----Registration Section------>
    <?php include 'registration.php' ?>
    <!---Search Section--->
    
<br>
<section>
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
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
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><?php echo "$name"; ?></h2>
                                    <h6 class="d-block"><a href="javascript:void(0)"><?php echo "$email"; ?></a></h6>
                                    <h6 class="d-block">Joined at <?php echo "$joinDate"; ?></h6>
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                    <input type="submit" class="btn btn-primary d-none" id="btnSave"name="save" value="Save Changes" />
                                    <a href="edit_profile.php?id=<?php echo $_SESSION['user_id'];?>" class="btn btn-info">Edit Profile</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="fulladdress-tab" data-toggle="tab" href="#fulladdress" role="tab" aria-controls="fulladdress" aria-selected="false">Full Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Connected Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="changepass-tab" data-toggle="tab" href="#changepass" role="tab" aria-controls="changepass" aria-selected="false">Change Password</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo "$name"; ?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Birth Date</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo "$dob"; 
                                            //echo date('D:M:Y');?>
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo "$email"; ?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Phone Number</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo "$phone"; ?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Gender</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo $row['gender']; ?>
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
                                            <?php echo "$address"; ?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Postal Code</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo $row['post_code']; ?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Upazilla</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo $row['upazilla']; ?>
                                            
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">City</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo $row['city']; ?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">District</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo $row['district']; ?>
                                            </div>
                                        </div>
                                        <hr />
                                        

                                    </div>
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="connectedServices-tab">
                                        Facebook, Google, Twitter Account that are connected to this account
                                    </div>
                                    <div class="tab-pane fade" id="changepass" role="tabpanel" aria-labelledby="changepass-tab">
                                        <?php include'includesUser/changepass.php' ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
	</section>	
	
<!----Footer Section---->
<?php include 'includesUser/footer.php' ?>