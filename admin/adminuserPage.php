<?php include_once "adminincludes/header.php" ?>
<?php 
$db = new Database();
$fm = new Formate();
$userId = Session::getSession('userId');
?>
<?php
$no_img =  "../asset/UploadFile/Addmin/noImage.jpg";
$image  =  $no_img;
$getMessage = "";
if(isset($_POST['changeProfile'])){
    
    $name      = mysqli_real_escape_string($db->link,$fm->validation($_POST['Name']));
    $email     = mysqli_real_escape_string($db->link,$fm->validation($_POST['email']));
    $changePass    = mysqli_real_escape_string($db->link,$fm->validation($_POST['pass']));
   
    date_default_timezone_set("Asia/Dhaka");
    $update   =  date('j F Y, g:i a');

      $getMessage = "<p></p>";
    
       /**===========Image Upload============**/
       $img = 'img';
       $uploadFolder = '../asset/UploadFile/Addmin/';
       $uploadImg    = $fm->ImageSetup($img,$uploadFolder);
 
 
    if( $name == "" || $email == "" ){
       $getMessage = '<div class="alert alert-danger alert-dismissible fade show">
       <strong>Error!</strong> Fill is empty !.
       <button type="button" class="close" data-dismiss="alert">&times;</button>
       </div>';
       return false;
    }
    if(empty($uploadImg) && $changePass == ""){
        $query  = "UPDATE `chowadmin` SET 
        `name`  = '$name',
        `email` = '$email',
        `update`= '$update'  WHERE `id` = '$userId' ";
        $result = $db->QueryExcute($query);
    }
    elseif(empty($uploadImg)){
        $query  = "UPDATE `chowadmin` SET 
        `name`  = '$name',
        `email` = '$email',
        `update`= '$update',
        `pass`  = '$changePass' WHERE `id` = '$userId' ";
         $result = $db->QueryExcute($query);
    }
    elseif($changePass == ""){
        $query  = " UPDATE `chowadmin` SET 
        `name`  = '$name',
        `email` = '$email',
        `img`   = '$uploadImg',
        `update`= '$update'
         WHERE `id` = $userId ";
         $result = $db->QueryExcute($query);
         if($result){
            unlink($image);
            $fm->MoveFile($img,$uploadImg);
         }
    }
    else{
        $query  = " UPDATE `chowadmin` SET 
        `name`  = '$name',
        `email` = '$email',
        `img`   = '$uploadImg',
        `update`= '$update'
        `pass`  = '$changePass' WHERE `id` = '$userId' ";
         $result = $db->QueryExcute($query);
         if($image){
            unlink($fdimge);
            $fm->MoveFile($img,$uploadImg);
        }
   
    }
 }

?>
<div id="content" class="wrappwer">
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
    <div class="container-fluid">
        <?php
        $querY  =  "SELECT * FROM `chowadmin` where id = $userId ";
        $data   =  $db->SelectData($querY);
        if($data){
            $Admin_data =  $data->fetch_assoc();
            if($Admin_data['img']  != "" ){
                $image = $Admin_data['img'];
              }
        ?>
        <h3 class="h4 m-2"><?php echo $Admin_data['name'];?></h3>
        <?php echo $getMessage; ?>
        <div class="my-5 mx-3">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="usr">Name</label>
                    <input type="text" class="form-control" id="fdinput" name="Name" value="<?php echo $Admin_data['name'];?>">
                </div>
                <div class="form-group">
                    <label for="fdcat">User Name</label>
                    <input type="text" class="form-control" id="fdinput" name="username" value="<?php echo $Admin_data['userName'];?>" readonly>
                </div>
                <div class="form-group">
                    <label for="fdcat">ID</label>
                    <input type="text" class="form-control" id="fdinput" name="id" value="<?php echo $Admin_data['user_card_id'];?>" readonly>
                </div>
                <div class="form-group">
                    <label for="fdcat">Email</label>
                    <input type="text" class="form-control" id="fdinput" name="email" value="<?php echo $Admin_data['email'];?>">
                </div>
                <div class="form-group">
                    <label for="fdcat">Password Change</label>
                    <input type="text" class="form-control" id="fdinput" name="pass" value="">
                </div>
                <div class="containerr">
                    <input type="file" id="input-file" name="img" onchange={handleChange()} hidden value="<?php echo $image;?>">
                    <label class="btn-upload" for="input-file" role="button"> Change Photo</label>
                    <div class="preview-box">
                    <img class="preview-content" src="<?php echo $image;?>">
                    </div>  
                </div>
                <button type="submit" class="btn btn-success" name="changeProfile">Change</button>
            </form>
        </div>
        <?php } ?>
    </div>
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
