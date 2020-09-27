<?php include_once "adminincludes/header.php" ?>
<?php 
$db = new Database();
$fm = new Formate();

/** ===============Get Value For Change=================*/
$catname = '';
$catid   = '';
if(isset($_GET['discat'])){
    $catid = $_GET['discat'];
    $query = "SELECT * FROM `tbl_cat` where cat_id = '$catid' ";
    $res   = $db->SelectData($query);
    $fdData = $res->fetch_assoc();
    $catname = $fdData['cat_name'];
}

/** ===============Add Catagory=================*/
$error = -1;
if(isset($_POST['addCat'])){

  $addDishcat = $fm->validation($_POST['add_cat']);
  date_default_timezone_set("Asia/Dhaka");
  $cat_date   =  date('j F Y, g:i a');
  if($addDishcat == "")
  { $error = 0;}
  else{
    $query    = " INSERT INTO `tbl_cat`(`cat_name`, `cat_add_date`) VALUES ('$addDishcat','$cat_date')";
    $result   = $db->QueryExcute($query);
    if($result){
        $error = 1 ;
    }
  }
}

/** ===============Change Catagory=================*/

if(isset($_POST['editcat'])){
   
  $ChangeDishcat = $fm->validation($_POST['changeCat']);
  if($ChangeDishcat == "")
  { $error = 0;}
  else{
    $query    = " UPDATE `tbl_cat` SET `cat_name` = '$ChangeDishcat' WHERE `cat_id` = $catid ";
    $result   = $db->QueryExcute($query);
    if($result){
        $error = 1 ;
    }
  }
}

/** ===============Delete Catagory=================*/

if(isset($_GET['delcat'])){
    $del = $_GET['delcat'] ;
    $query    = " DELETE FROM `tbl_cat` WHERE `cat_id` =  $del ";
    $result   = $db->QueryExcute($query);
    header('Location:menu.php');
}
?>
<div id="content" class="wrappwer">

    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
    <div class=" top-content container-fluid" >
       <?php 
         if(isset($_GET['addcat'])){
       ?>

        <!--=================Add Dish Catagory======================-->
        <h3 class="h4 m-2">Add Catagory</h3>

        <?php    
          if( $error == 0 ){ ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Error!</strong> Fill is empty !.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
          <?php } elseif( $error == 1 ) { ?>
            <div class="alert alert-success alert-dismissible fade show">     <strong>Success!</strong> Add  successfully.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
          <?php } ?>
      
        <div class="justify-content-center  mt-5 pt-5 d-flex">
            <form class="form-inline " action="#" method="post">
                <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Add Catagory</label>
                <input type="text" class="form-control distcat" name="add_cat" id="distcat" placeholder="Add Dish Catagory">
                </div>
                <button type="submit" name="addCat" class="btn btn-primary mb-2">Add</button>
            </form>
        </div>
         <?php  }else{?>
           

          <!--=================Edit Dish Catagory======================-->
        <h3 class="h4 m-2">Edit Catagory</h3>
       
        <?php    
          if( $error == 0 ){ ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Error!</strong> Fill is empty !.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
          <?php } elseif( $error == 1 ) { ?>
            <div class="alert alert-success alert-dismissible fade show">     <strong>Success!</strong> Update  successfully.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
          <?php } ?>
        <div class="justify-content-center d-flex my-5 py-5">
            <form class="form-inline" action="#" method="post">
                <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Change Catagory</label>
                <input type="text" class="form-control" name="changeCat" id="distcat" value="<?php echo  $catname; ?>">
                </div>
                <button type="submit" name="editcat" class="btn btn-warning mb-2">Change</button>
                <a href="?delcat=<?php echo $catid; ?>" onclick="confirm('Are You Sure to Delete <?php echo  $catname; ?> click ok')" class="btn btn-danger ml-2 mb-2">Delete</a>
            </form>
        </div>
         <?php } ?>
       
    </div>
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
