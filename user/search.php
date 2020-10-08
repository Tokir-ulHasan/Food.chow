<?php include 'includesUser/header.php' ; ?> 
<?php

$msg_search = 0 ;
$catid ;
$fdid  ;
$txt ;
$catname;
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search1'] )){
   $catid = $_POST['catid'];
   $txt = $_POST['search1txt'];
   if($catid == -1){
    $msg_search = $catid;
   
    //header('Location:index.php?msgS='.$msg_search);
  //  exit();
   }
}
$cat_query = "SELECT * FROM `tbl_cat` WHERE `cat_id` = $catid";
$cat_res = $db->SelectData($cat_query);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'] )){
  
    $txt = $_POST['Search'];
    if($catid == -1){
     $msg_search = $catid;
    }
 }
 $cat_query1 = "SELECT * FROM `tbl_cat` WHERE `cat_id` = $catid";
 $cat_res1   = $db->SelectData($cat_query1);

?>
   
    
<section class="pt-1" >
      <div class="row mx-3 pt-3">
             
                <div class="card-body mt-4">
                    <?php
                        if($cat_res){
                        $cat_Data = $cat_res->fetch_assoc();
                        echo '<h4 style="padding: 2px;font-size: 2rem;
                        font-family: serif;font-weight: bolder;color: #ff0000;text-shadow: 14px 2px 17px #bf7a7a;">'.$cat_Data['cat_name'].'</h4>';
                        }
                    ?>
                    <div class="row">
                    <?php
                    $query = "SELECT * FROM `tbl_fooddetails` WHERE `fd_name` like '%$txt%' ";
                    $res = $db->SelectData($query);
                    if($res && $res->num_rows > 0){
                        while($fdData = $res->fetch_assoc()){
                    ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-4">
                            <div class="card" style="border: 1px solid rgba(0, 0, 0, 0.22);box-shadow: 1px 0px 20px 2px #a7c0d5;">
                                <div class="card">
                                    <div class="d-block" id="popularFoodimg" style="height: 180px;">
                                        <img src="<?php echo $fdData['fd_image']; ?>">
                                        <div class="d-flex">
                                        <span  id="popularFoodlogo">
                                        <img src="../asset/images/04.jpg">
                                        </span>
                                        </div>
                                        <span class="d-block" id="popularFoodprice"><p>$<?php echo $fdData['fd_price']; ?></p></span>
                                    </div>
                                </div>
                                <div class="d-block ">
                                    <p class=" text-center mt-4 font-weight-bold "><?php echo $fdData['fd_name']; ?></p>
                                    <p class=" text-center  "><span>Type of food:<?php echo $fdData['fd_catagoery_name']; ?></span></p>
                                    <div class="d-flex justify-content-center">
                                    <?php echo" <a class='btn btn-outline-danger' href='detailspage.php?food_id=".$fdData['id']."'>Details</a>"?></div>
                                </div>
                                <div class="mt-3">
                                    <div class="d-flex brd " >
                                        <div class=" brd-l py-3 px-3">
                                        <span class="popularFoodRating " style=" font-size: 14px;"><i class="fa fa-star-o"></i> <?php echo $fdData['fd_rating']; ?></span>
                                        
                                        </div>
                                        <div class="pl-3 py-3">
                                            <span class="popularFoodCat" style=" font-size: 14px;"><i class="fa fa-home"></i>Related Food</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    <?php  } }else{
                        echo "No Result Found";
                    }  ?> 
                    </div>
                </div>
            
            </div>
       
    
     
   </section>
<?php include 'includesUser/footer.php' ?>
  