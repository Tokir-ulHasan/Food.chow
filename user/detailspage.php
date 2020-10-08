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



  if(!isset($_GET['food_id']) && $_GET['food_id'] == NULL){
    echo "<script>window.location = '404.php'</script>";
  }else{
    $id=$_GET['food_id'];
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

<?php
           
           /*if(isset($_POST['ratedIndex'])){
         
            
             header("Location:404.php");
            $ratedIndex = $_POST['ratedIndex'];
             $fid = $id;
             $uId = $userId;
             $ratedIndex++;
          
             $s_rating_query = "SELECT * FROM ` ratingfood` WHERE `fd_id` = '$fid' and `user_id` = '$uId' ";
             $s_rating_res = $db->SelectData($s_rating_query);
             if($s_rating_res->num_rows > 0){
               $u_rating_q = "UPDATE ` ratingfood` SET `fd_id`=[value-2] WHERE `user_id` = '$uId' and `fd_id` = '$fid' ";
               $u_rating_res = $db->QueryExcute($u_rating_q);
             }
             else{
               $in_rating_q = "INSERT INTO ` ratingfood`(`fd_id`, `user_id`, `rating`) VALUES ($fid,$uId,$ratedIndex)";
               $in_rating_res = $db->QueryExcute($in_rating_q);
             }
             //exit(json_encode(array('user_id' => $uId)));
            }*/
             
            ?>

   <section class="pt-1" style="background: rgba(0, 123, 255, 0.06);">
      <div class="row mx-3 pt-5">
        <div class="col-2 mr-4" style="border: 1px solid #e8cece;box-shadow: 1px 12px 13px 2px #d7cece;">
            <ul class="list-unstyled catod">
                <h6 class="font-bold mt-2">Categories</h6>
                <?php
                include_once '../lib/Database.php';
                $db = new Database();
                $sql="select distinct cat_name,cat_id from tbl_cat";
                $r=$db->SelectData($sql);
                
                while($row=mysqli_fetch_array($r))
                    {
                        $type=$row['cat_name'];
                        $ci=$row['cat_id'];
                        echo "<li class='list-item mt-3 listA'><a href='catagoryfoodlist.php?catid=$ci' > $type </a></li>";
                    }
                ?>
            </ul>
        </div>
        <div class="col-9 " style="border: 1px solid #e8cece;box-shadow: 1px 12px 13px 2px #d7cece;">
          <form action="" method="post">
         
               <div class="orderviwe mt-4 mx-2">
                  <!-- <img src="../asset/images/blog-img-06.jpg" alt="">-->
                  <div class="row">
                      <div class="col-7">
                          <img src="<?php echo "$image"; ?>">
                      </div>
                      <div class="col-5">
                          <div class="clearfix mt-2">
                              <h4 class="float-left text-dark"><?php echo "$name"; ?></h4>
                              <h4 class="float-right">$<?php echo "$price"; ?></h4>
                          </div>
                          <div class="clearfix mt-4">
                              <h6 class="float-left my-1 text-secondary">Order Quantity</h6>
                              <div class="boxsppiner float-right " style="width:120px">
                              <input  type="number" name='quantity' id="spinner" value="1" min="1" max="10" step="1" />
                              </div>
                          </div>
                          <div class="clearfix mt-4">
                              <h6 class="float-left  mt-2  text-secondary">Total Quantity 
                              <span class=" text-danger font-weight-bold" id="minput">1</span>
                              </h6>

                              <input  type="number" name='price' id="price" value="<?php echo $price?>" hidden/>
                              <h6 class="float-right  mt-2  text-secondary" id="totalprice" >Total Price <strong class=" text-danger">$</strong><span  class=" text-danger font-weight-bold"><?php echo $price?></span></h6>
                          </div>
                          <div class="clearfix mt-4">
                                <div class="float-left" id="food">
                                    <span class="text-secondary"><i class="fa fa-heart-o fa-2x mt-1 text-secondary" style="font-size:25px"></i><strong style="font-size:20px"> 400.5</strong> </span>
                                </div>
                                <div class="float-right text-secondary ">
                                   <h6 style="font-size:20px" >Order <span class="mb-2"><i class="fa fa-cart-arrow-down" ></i> 200</span></h6>
                                   
                                </div>
                           </div>
                          <div class="d-flex justify-content-end mt-5">
                              <button name="addtocart" type="submit"  class="btn btn-outline-danger btn-sm " type="button" >Add to Cart   <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                          </div>
                          
                      </div>
                  </div>
                </div>
                <div class="my-5">
                    <p><?php echo "$des"; ?></p>
                </div>
                <hr>
                <!--==============Rating Food ========================-->
               <div class="mx-4 my-2" id="ratingSection" >
                  <h6 class=" my-1">Rating  Barger</h6>
                  <div class="mt-1">
                    <div id="rateYo"></div> <span class='result'>0</span>
                </div>
                  <!-- <div class="ratting clearfix" id="lovefood">
                    <div class="float-left rating" >
                      <span class="star mr-1" ><i class="fa fa-heart fa-2x" data-index="0"></i></span>
                      <span class="star mr-1" ><i class="fa fa-heart fa-2x" data-index="1"></i></span>
                      <span class="star mr-1" ><i class="fa fa-heart fa-2x" data-index="2"></i></span>
                      <span class="star mr-1" ><i class="fa fa-heart fa-2x" data-index="3"></i></span>
                      <span class="star mr-1" ><i class="fa fa-heart fa-2x" data-index="4"></i></span>
                    </div>
                    <div class="float-right">
                      <span>5</span>
                    </div>
                  </div>-->
              </div>
            </form>
              <!--=================Rating Food end========================-->
               <!--=================comment box========================-->
              <div id=comment>
                <form action="">
                    <div class = "form-group py-1 mt-4">
                        <textarea class = "form-control" rows = "3" placeholder = "Comment on this food" style="border: none;box-shadow: 1px 0px 2px 0px #e2c2c2;"></textarea>
                        <div class="d-flex justify-content-end  mt-1">
                            <input type="submit" class="btn btn-secondary btn-sm" name="" id="" value="Sent">
                        </div>
                    </div>
                </form>
              </div>
                <!--=================comment box end========================-->
              <hr>
              
        </div>
      </div>
      <div class="row">
         <div class="col-2">
         </div>
         <div class="col-10">
               <div id="allcomment" class="mt-4 mx-4">
                  <div class="card">
                    <div class="card-body">
                       <section class="d-flex mb-3">
                          <div><img src="../asset/images/profile-7.jpg" alt="" style="height: 91px;width: 90px;border-radius: 50%;"></div>
                          <div class="clearfix ml-4 mt-1">
                          <h5 class="">Arifur Rahman</h5>
                          <div class="">
                              <div class="fa outer-love">
                                  <div class="inner-love">
                                  </div>
                              </div>
                          </div>
                       </section>
                       <p class="my-3 text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quaerat perferendis placeat repellendus consequuntur beatae veritatis ut, iure dolor! Iure ipsa blanditiis facilis vel quasi consequuntur, ad nulla dolore quas?</p>
                  </div>
              </div>
         </div>
      </div>
   </section>
  
    <!----Footer Section---->
<?php include 'includesUser/footer.php' ?>
   