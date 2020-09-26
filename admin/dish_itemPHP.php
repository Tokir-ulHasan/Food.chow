<?php

$db = new Database();
$fm = new Formate();

/*============Add Dish Item==============*/
$fdCatId = "";
$catname = "";
if(isset($_GET['dishitem'])){
   $fdCatId = $_GET['dishitem'];
   $query  = "SELECT * FROM `tbl_cat` where cat_id =  '$fdCatId' ";
   $res    = $db->SelectData($query);
   $fdcat = $res->fetch_assoc();
   $catname = $fdcat['cat_name'];
}

if(isset($_POST['dishadd'])){

   $fd_name        = mysqli_real_escape_string($db->link,$fm->validation($_POST['fdName']));
   $fd_description = mysqli_real_escape_string($db->link,$fm->validation($_POST['fdDescription']));
   $fd_price       = mysqli_real_escape_string($db->link,$fm->validation($_POST['fdprice']));
   $fd_discount    = mysqli_real_escape_string($db->link,$fm->validation($_POST['fddiscount']));
   $fd_catagory_name   =  $catname;
   $fd_catagory_id     =  $fdCatId;
   $fd_product_id      =  substr($catname, 0,3).substr($fd_name, 0,3).rand(0,9);
   date_default_timezone_set("Asia/Dhaka");
   $fd_date            =  date('j F Y, g:i a');

   $getMessage = "<p></p>";

   /**===========Image Upload============**/
   $fd_img = 'imgFd';
   $uploadFolder = '../asset/UploadFile/FoodItemImg/';
   $uploadImg = $fm->ImageSetup($fd_img,$uploadFolder);
  
   if( $fd_name == "" || $fd_catagory_name == "" || $fd_price == "" ){
      $getMessage = '<div class="alert alert-danger alert-dismissible fade show">
      <strong>Error!</strong> Fill is empty !.
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>';
      return false;
   }
   if(empty($uploadImg)){
      $getMessage = '<div class="alert alert-danger alert-dismissible fade show">
      <strong>Error!</strong> Image is Required !.
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>';
      return false;
   }
   
   else{
      $query = "INSERT INTO `tbl_fooddetails`(  `fd_name`, `fd_description`, `fd_price`, `fd_discount`, `fd_image`, `fd_addDate`, `fd_catagoery_name`, `fd_cat_id`, `fd_rating`, `fd_id`)
      VALUES ('$fd_name','$fd_description','$fd_price','$fd_discount ','$uploadImg','$fd_date','$fd_catagory_name','$fd_catagory_id','2.5','$fd_product_id')";
      $result = $db->QueryExcute($query);
      if($result){
            $fm->MoveFile($fd_img,$uploadImg);
            header('Location:menu.php');
      }
      else{
         $getMessage = '<div class="alert alert-danger alert-dismissible fade show">
         <strong>Error!</strong>Error !.
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         </div>';
         return false;
      }
   }
}



/*============Get Dish Item==============*/
$fdname;
$fdDescription;
$fdprice;
$fdDiscount;
$fdimge ;
$fdCatID;
$fdId;
$fdCatName;
$fdcatnam = "" ;

if(isset($_GET['chgdishitem'])){

   $fdId = $_GET['chgdishitem']; 
   $query   = "SELECT * FROM `tbl_fooddetails` WHERE `id` = $fdId ";
   $result  = $db->SelectData($query);
   $fdData  = $result->fetch_assoc();

   $fdname        = $fdData['fd_name'];
   $fdDescription = $fdData['fd_description'];
   $fdprice       = $fdData['fd_price'];
   $fdDiscount    = $fdData['fd_discount'];
   $fdimge        = $fdData['fd_image'];
   $fdCatName     = $fdData['fd_catagoery_name'];
   $fdCatID       = $fdData['fd_cat_id'];
  
   $fdcatnam .= '<select class="form-control" id="fdinput" name="fdcatid">
   <option value="'.$fdData['fd_cat_id'].'">'.$fdCatName.'</option>';

   $query   = "SELECT * FROM `tbl_cat`";
   $res  = $db->SelectData($query);
   while($fdData = $res->fetch_assoc()){
   $fdCatName =   $fdData['cat_name'];
   $fdCatID   =   $fdData['cat_id'];
   $fdcatnam .= '<option value="'.$fdData['cat_id'].'">'.$fdData['cat_name'].'</option>';
     }
   $fdcatnam .= '</select>';
}

/*============Change Dish Item==============*/
if(isset($_POST['updatedish'])){
  
   $fd_name        = mysqli_real_escape_string($db->link,$fm->validation($_POST['fdName']));
   $fd_description = mysqli_real_escape_string($db->link,$fm->validation($_POST['fdDescription']));
   $fd_price       = mysqli_real_escape_string($db->link,$fm->validation($_POST['fdprice']));
   $fd_discount    = mysqli_real_escape_string($db->link,$fm->validation($_POST['fddiscount']));
   $fd_cat_ID    = $_POST['fdcatid'];
   $getMessage = "<p></p>";
   
      /**===========Image Upload============**/
      $fd_img = 'imgFd';
      $uploadFolder = '../asset/UploadFile/FoodItemImg/';
      $uploadImg    = $fm->ImageSetup($fd_img,$uploadFolder);


   if( $fd_name == "" || $fd_cat_ID == 0 || $fd_price == "" ){
      $getMessage = '<div class="alert alert-danger alert-dismissible fade show">
      <strong>Error!</strong> Fill is empty !.
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>';
      return false;
   }
   if(empty($uploadImg)){
     
     $query = "UPDATE `tbl_fooddetails` SET 
     `fd_name`                = '$fd_name ',
     `fd_description`         = '$fd_description',
     `fd_price`               = '$fd_price',
     `fd_discount`            = '$fd_discount',
     `fd_catagoery_name`      = '$fdCatName',
      `fd_cat_id`             =  '$fd_cat_ID'
      WHERE `id`   = '$fdId' ";
      $result = $db->QueryExcute($query);
   }
   else{
    
     $query = "UPDATE `tbl_fooddetails` SET 
     `fd_name`        = '$fd_name ',
     `fd_description` = '$fd_description',
     `fd_price`       = '$fd_price',
     `fd_discount`    = '$fd_discount',
     `fd_image`       = '$uploadImg',
     `fd_catagoery_name`      = '$fdCatName',
     `fd_cat_id`             =  '$fd_cat_ID'
      WHERE `fd_id`   = '$fdId' ";
      $result = $db->QueryExcute($query);
      if($result){
            unlink($fdimge);
            $fm->MoveFile($fd_img,$uploadImg);
      }
   }
}


/*============Delete Dish Item==============*/
if(isset($_POST['deletedish'])){
   $del_query   = "DELETE FROM `tbl_fooddetails` WHERE id = '$fdId'";
   $del_res     = $db->QueryExcute($del_query);
   if($del_res){
      unlink($fdimge);
      header('Location:menu.php');
   }

}
?>