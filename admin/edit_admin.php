<?php include_once "adminincludes/header.php" ?>

<?php 
$db = new Database();
$fm = new Formate();
$userId = Session::getSession('userId');

$uID = 0;

if(isset($_GET['admin'])){
    $uID = $_GET['admin'];
    
 }
 $query   = "SELECT * FROM `chowadmin` WHERE `id` = '$uID' ";
 $res     = $db->SelectData($query);
 $admin   = $res->fetch_assoc();
 
?>


<div id="content" class="wrappwer">
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
    <div class="container-fluid">
    <h3 class="h4 m-2">Edit Admin</h3>
        <div class="my-5 mx-3">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="usr">Name :</label>
                    <input type="text" class="form-control" id="fdinput" name="fdName" value="<?php echo $admin['name'];?>"">
                </div>
                <div class="form-group">
                    <label for="usr">User Name :</label>
                    <input type="text" class="form-control" id="fdinput" name="fdName" value="<?php echo $admin['userName'];?>" readonly>
                </div>
                <div class="form-group">
                    <label for="usr">Id  :</label>
                    <input type="text" class="form-control" id="fdinput" name="fdName" value="<?php echo $admin['user_card_id'];?>" readonly>
                </div>
                <div class="form-group">
                    <label for="usr">Email :</label>
                    <input type="Email" class="form-control" id="fdinput" name="fdName" value="<?php echo $admin['email'];?>"">
                </div>
              
                <div class="containerr">
                    <input type="file" id="input-file" name="imgFd" onchange={handleChange()} hidden value="<?php echo $admin['img']; ?>">
                    <input type="text" name="imgFd_I" hidden value="<?php echo $admin['img']; ?>">
                    <label class="btn-upload" for="input-file" role="button"> Upload Photo</label>
                    <div class="preview-box">
                    <img class="preview-content" src="<?php echo $admin['img']; ?>">
                    </div>  
                </div>
                <button type="" class="btn btn-success" name="updatedish">Change</button>
                <button type="" class="btn btn-danger" name="deletedish">Delete</button>
            </form>
        </div>
    </div>
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
