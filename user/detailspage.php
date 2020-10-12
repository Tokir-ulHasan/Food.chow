<!----Header Section---->
<?php 
  include_once 'includesUser/header.php' ;
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
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addtocart'])){
    if(!empty($userId)){
       $quantity = $_POST['quantity'];
       $addcart  = $cart->addtocart($quantity,$id);
       //echo "<br><br>sdf";
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
      <div class="row mx-3 pt-5">
        <div class="col-2 mr-4" style="border: 1px solid #e8cece;box-shadow: 1px 12px 13px 2px #d7cece;">
            <ul class="list-unstyled catod">
                <h6 class="font-bold mt-2">Categories</h6>
                <?php
                 //  echo $_GET['ratedIndex'];
                 //  echo json_encode($contents);
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
                              <h6 class="float-left text-dark"><?php echo "$name"; ?></h6>
                              <h6 class="float-right">$<?php echo "$price"; ?></h6>
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
                          <?php
                             
                             /***=========Find rating avrage============ */
                             $rat_q_fid = "SELECT SUM(`rating`) as totalrate, AVG(`rating`) as avgrate ,count(`rating`) as conutrate FROM ` ratingfood` WHERE `fd_id`= '$id' ";
                             $rat_res_fid = $db->SelectData($rat_q_fid);
                             $total_rate  = 0;
                             $avg_rat     = 0;
                             $count_rat   = 0;
                             if($rat_res_fid){
                              $data = mysqli_fetch_array($rat_res_fid);
                              $total_rate =  $data['totalrate'];
                              $count_rat  =  $data['conutrate'];
                              $avg_rat    =  $data['avgrate'];
                              $avg_rat    = round($avg_rat,2);
                             }
                           
                          ?>
                          <!--===============Take avg rat and total rate================-->
                          <span id="totalrate" data-index="<?php echo $total_rate;?>"></span>
                          <span id="avgrate" data-index="<?php echo $avg_rat;?>"></span>
                          <span id="countrate" data-index="<?php echo $count_rat;?>"></span>
                           <!--===============Take avg rat and total rate================-->
                          <div class="clearfix mt-4">
                                <div class="float-left" id="food">
                                    <span class="d-flex text-secondary"><div class="outer-love">
                                       <div class="inner-love" id="in_rate" ></div>
                                    </div><strong id="ttlrate" style="font-size:18px;margin-top: 5px;"></strong></span>
                                </div>
                                <div class="float-right text-secondary ">
                                   <h6 style="font-size:20px" >Order <span class="mb-2"><i class="fa fa-cart-arrow-down" ></i> 200</span></h6>
                                   
                                </div>
                           </div>
                           <?php 
                              if($userId != ""){
                           ?>
                          <div class="d-flex justify-content-end mt-5">
                              <button name="addtocart" type="submit"  class="btn btn-outline-danger btn-sm " type="button" >Add to Cart   <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                          </div>
                          <?php } ?>
                      </div>
                  </div>
                </div>
                <div class="my-5">
                    <p><?php echo "$des"; ?></p>
                </div>
                <hr>
                <!--==============Rating Food ========================-->
               <div class="mx-4 my-2" id="ratingSection" >
                 <!--=============Take user id and food id====================-->
                 <?php 
                    $rat_q = "SELECT * FROM ` ratingfood` WHERE `fd_id` = '$id' and `user_id` = '$userId' ";
                    $rat_res = $db->SelectData($rat_q);
                    $rat_fd = 0 ;
                    if($rat_res && $rat_res->num_rows > 0){
                      $rat_data = mysqli_fetch_array($rat_res); 
                      $rat_fd = $rat_data['rating'];
                    }
                 ?>
                    <span id="rating" data-index="<?php echo $rat_fd;?>"></span>
                    <span id="fdid" data-index="<?php echo $id;?>"></span>
                    <span id="userid" data-index="<?php echo $userId;?>"></span>
                 <!--=============end====================-->
               <?php 
             
                  if($userId != ""){
               ?>  
                  <h6 class=" my-1">Review of This food</h6>
                  <div class="ratting d-flex" id="lovefood">
                    <div class=" rating" >
                      <span class="star mr-2" ><i class="fa fa-heart fa-2x" data-index="0"></i></span>
                      <span class="star mr-2" ><i class="fa fa-heart fa-2x" data-index="1"></i></span>
                      <span class="star mr-2" ><i class="fa fa-heart fa-2x" data-index="2"></i></span>
                      <span class="star mr-2" ><i class="fa fa-heart fa-2x" data-index="3"></i></span>
                      <span class="star mr-2" ><i class="fa fa-heart fa-2x" data-index="4"></i></span>
                    </div>
                    <div id='rating_count'>
                    </div>
                  </div>
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
                <?php } ?>
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
   