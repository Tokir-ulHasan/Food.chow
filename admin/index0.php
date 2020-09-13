<?php include_once "adminincludes/header.php" ?>
<?php

$db = new Database();
$fm = new Formate();
function PaymentMethod($pay){
  if($pay == 1){
    return $pay = "Cash";
  }
  elseif($pay == 2)
  {
    return $pay = "bekash";
  }
}
function find_item($irems){
  $itemStr = explode(',',$irems);
  return $itemStr;
}

?>
   <div id="content" class="wrappwer">
     
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
      <!--===============Main Content Section==================-->
       <div class=" top-content container-fluid" >
      <section id="navitem" >
        
         <div class="row">
           <div class="col-md-4 col-sm-6 col-lg-4 col-xs-12" id="itemnav">
            <a href="pendingOrder.php" id="navcard">
             <p class="navcard-br1">Panding Orders<span><br>237</span></p>
            </a>
          </div>
          <div class="col-md-4 col-sm-6 col-lg-4 col-xs-12" id="itemnav">
            <a href="activeOrders.php" id="navcard">
             <p class="navcard-br2">Active Orders<span><br>237</span></p>
            </a>
          </div>
          <div class="col-md-4 col-sm-6 col-lg-4 col-xs-12" id="itemnav">
            <a href="deleveryOrders.php" id="navcard">
             <p class="navcard-br3">Delivered Orders<span><br>237</span></p>
            </a>
          </div>
          <div class="col-md-4 col-sm-6 col-lg-4 col-xs-12" id="itemnav">
            <a href="" id="navcard">
             <p class="navcard-br4">Customer Cancelled Orders<span><br>237</span></p>
            </a>
          </div>

          <!--<div class="col-md-3 col-sm-6 col-lg-3 col-xs-12" id="itemnav">
            <a href="" id="navcard">
             <p class="navcard-br5">ResTourants Orders<span><br>237</span></p>
            </a>
          </div>-->

          <div class="col-md-4 col-sm-6 col-lg-4 col-xs-12" id="itemnav">
            <a href="catlis.php" id="navcard">
             <p class="navcard-br6">Catagories <span><br>237</span></p>
            </a>
          </div>
          <div class="col-md-4 col-sm-6 col-lg-4 col-xs-12" id="itemnav">
            <a href="foodlist.php" id="navcard">
             <p class="navcard-br7">Food Items <span><br>237</span></p>
            </a>
          </div>
        <!--  <div class="col-md-3 col-sm-6 col-lg-3 col-xs-12" id="itemnav">
            <a href="" id="navcard">
             <p class="navcard-br8">Promotions <span><br>237</span></p>
            </a>
          </div>-->
         </div>        
      </section>

      <section id="order-pen-ac">
        <nav >
          <div class="nav nav-tabs " id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#pending_order" role="tab" aria-controls="nav-home" aria-selected="true">Pending</a>

            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#active_order" role="tab" aria-controls="nav-profile" aria-selected="false">Active</a>

          
          </div>
        </nav>
      <div class="tab-content">
        <div class="tab-pane active" id="pending_order">
            <br>
            <div class="row mb-2">
              <?php 
                 $query   = "SELECT * FROM `tbl_orders` 
                 INNER JOIN tbl_user ON tbl_orders.delvery_boy_id = tbl_user.id where `od_type` = 1";
                 $res  = $db->SelectData($query);
                 if($res){
                 while($od_data = $res->fetch_assoc()){
                   $fd_item = find_item($od_data['od_items']);
                   $fd_item_lenth = count($fd_item);
                   $fdProdId = $fd_item['0'] ;
                   $queryFd   = "SELECT * FROM `tbl_fooddetails` WHERE `fd_product` =  $fdProdId ";
                   $result  = $db->SelectData($queryFd);
                   $fd_data = $result->fetch_assoc();
              ?>
              <div class="col-md-6 ">
                <div class="row">
                  <div class="col-6 " id="penord">
                    <p>Oreder ID -<span><a href=""><?php echo $od_data['od_id']; ?></a></span></p>
                    <div id="penordimg">
                      <img class="img-fluid" src="<?php echo $fd_data['fd_image']; ?>" alt="">
                      <?php 
                        if($fd_item_lenth == 1){
                      ?>
                      <span> <?php echo $fd_data['fd_name']; ?><strong class="ml-1"> Only</strong></span>
                      <?php }else{?>
                      <span> <?php echo $fd_data['fd_name']; ?> x <?php echo $fd_item_lenth-1; ?> <strong>More</strong></span>
                      <?php }?>
                    </div>
                    <div id="penorduser">
                      <p class="font-weight-bold">Order Price -<strong>$<?php echo $od_data['od_price']; ?></strong> <br><span>Contact User -<strong><?php echo $od_data['phoneNo']; ?></strong></span>
                      </p>
                    </div>
                  </div>
                  <div class="col-6 " id="pendetal">
                    <p class="mt-1">Oreder Date -<span><?php echo $od_data['od_date']; ?></span></p>
                    
                    <h6 class="ml-4">Payment-<?php echo PaymentMethod($od_data['od_paymentStatus']); ?></h6>
                    <div id="penbtn" class="ml-4">
                    <button class="btn btn-secondary btn-sm">Reject</button>
                    <button class="btn btn-info btn-sm">Confirm</button>
                    </div>
                </div>
                </div>
              </div>
              <?php } }?>
          </div>
      
        </div>
        <div class="tab-pane " id="active_order">
          <br>
          <div class="row mb-2">
              <?php 
              $query   = "SELECT * FROM `tbl_orders` INNER JOIN tbl_user ON tbl_orders.`customer_id` = tbl_user.id where `od_type` = 2";
              $res  = $db->SelectData($query);
              if($res){
              while($od_data = $res->fetch_assoc()){
                $fd_item = find_item($od_data['od_items']);
                $fd_item_lenth = count($fd_item);
                $fdProdId = $fd_item['0'] ;
                $queryFd   = "SELECT * FROM `tbl_fooddetails` WHERE `fd_product` =  $fdProdId ";
                $result  = $db->SelectData($queryFd);
                $fd_data = $result->fetch_assoc();
              ?>
              <div class="col-md-6 ">
                <div class="row">
                  <div class="col-6 " id="penord">
                    <p>Oreder ID -<span><a href=""><?php echo $od_data['od_id']; ?></a></span></p>
                    <div id="penordimg">
                      <img class="img-fluid" src="<?php echo $fd_data['fd_image']; ?>" alt="">
                      <?php 
                        if($fd_item_lenth == 1){
                      ?>
                      <span> <?php echo $fd_data['fd_name']; ?><strong class="ml-1"> Only</strong></span>
                      <?php }else{?>
                      <span> <?php echo $fd_data['fd_name']; ?> x <?php echo $fd_item_lenth-1; ?> <strong>More</strong></span>
                      <?php }?>
                    </div>
                    <div id="penorduser">
                      <p class="font-weight-bold">Order Price -<strong>$<?php echo $od_data['od_price']; ?></strong> <br><span>Contact User -<strong><?php echo $od_data['phoneNo']; ?></strong></span>
                      </p>
                    </div>
                  </div>
                  <div class="col-6 " id="pendetal">
                    <p class="mt-1">Oreder Date -<span><?php echo $od_data['od_date']; ?></span></p>
                    
                    <h6 class="ml-4">Payment-<?php echo PaymentMethod($od_data['od_paymentStatus']); ?></h6>
                    <div id="penbtn" class="ml-1">
                    <div id="penbtn" class="">
                      <button class="btn btn-info btn-sm px-4">Confirmed</button>
                    </div>
                    </div>
                </div>
                </div>
              </div>
              <?php } }?>
          </div>
          
       </div> 
      
      </div>
     
      </section>
       </div>
    
   </div>
   <!--============Footer Section================-->
   <?php include_once "adminincludes/footer.php" ?> 