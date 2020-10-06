<!----Header Section---->
<?php 
  include_once '../lib/Session.php'; 
  include_once '../lib/Database.php'; 
  include_once '../lib/formatData.php';
  include_once 'includesUser/header.php' ;
  include_once 'cartclass.php';
  $userId = Session::getSession('userId');
  $userEmail = Session::getSession('userEmail');
?>
<?php
  
  $cart = new Cart();
  $id = "" ;



  if(!isset($_GET['catid']) && $_GET['catid'] == NULL){
    echo "<script>window.location = '404.php'</script>";
  }else{
    $id=$_GET['catid'];
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($userId)){
       $quantity = $_POST['quantity'];
       $addcart  = $cart->addtocart($quantity,$id);
    }
    else{
      echo" <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    <span class='sr-only'>Close</span>
                </button><br>
                <strong>Not Logged In!</strong> Please Login to Order Food. 
            </div> ";
    }
  }

  $sql2="select * from tbl_fooddetails where id='$id' ";
  $r2=$db->SelectData($sql2);
  $row=mysqli_fetch_assoc($r2);
  $name=$row['fd_name'];
  $des=$row['fd_description'];
  $price=$row['fd_price'];
  $image=$row['fd_image'];

?>



   <section class="pt-1" style="background: rgba(0, 123, 255, 0.06);">
      <div class="row mx-3 pt-3">
            <div class="col-2 " >
                <ul class="list-unstyled catod  mt-4">
                    <h6 class="font-bold mt-4">Categories</h6>
                    <?php
                    include_once '../lib/Database.php';
                    $db = new Database();
                    $sql="select distinct cat_name from tbl_cat";
                    $r=$db->SelectData($sql);
                    
                    while($row=mysqli_fetch_array($r))
                        {
                            $type=$row['cat_name'];
                            
                            echo "<li class='list-item mt-3 listA'><a href='' > $type </a></li>";
                        }
                    ?>
                </ul>
            </div>
            <div class="col-10 " >
                <div class="card-body">
                    <h4>Barger</h4>
                    <div class="row">
                    <?php
                    $query = "SELECT * FROM `tbl_fooddetails` where `fd_cat_id` =  $id ";
                    $res = $db->SelectData($query);
                    if($res && $res->num_rows > 0){
                        while($fdData = $res->fetch_assoc()){
                        
                    ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mt-4">
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
       
      </div>
     
   </section>
  
    <!----Footer Section---->
<?php include 'includesUser/footer.php' ?>
   