<?php include_once "adminincludes/header.php" ?>
<?php
$userId = Session::getSession('userId');
?>
<div id="content" class="wrappwer">
  <!--==========Sidebar Section============-->
  <?php include_once "adminincludes/sidebar.php" ?>
  <!--===============Main Content Section==================-->
  <div class="container-fluid">
    <h3 class="h4 m-2">Pending Orders</h3>
    <div class="tab-pane active" id="pending_order">
       <br>
       <?php include_once "pendingOrder_single.php" ?>
        <div class="d-flex justify-content-center pb-5 mr-3">
          <?php 
            $querY = " SELECT * FROM `tbl_orders` WHERE `od_type` = 1";
            $data =$db->SelectData($querY);
            if($data){
            $total_rows = mysqli_num_rows($data);
            if($total_rows >= $rowperpage){
          ?>
          <a class = "btn" href="?seemore=<?php echo (2*$rowperpage);?>">See More</a>
          <?php } }?>
        </div>
    </div>
  </div>
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
