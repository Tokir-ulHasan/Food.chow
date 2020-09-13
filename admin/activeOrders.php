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
  
    <div class="container-fluid">
      <h3 class="h4 m-2">Active Orders</h3>
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
  
</div>

<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
