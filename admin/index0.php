<?php include_once "adminincludes/header.php" ?>
<?php
  $userId = Session::getSession('userId');
  $db = new Database();
  $fm = new Formate();

  $penRow = 0;
  $actRow = 0;
  $delRow = 0;
  $rejRow = 0;
  $fodRow = 0;
  $catRow = 0;

  $query    = "SELECT * FROM `tbl_orders` where `od_type` = 1 GROUP BY `orderCustomId`";
  $res_pen  = $db->SelectData($query);
  if($res_pen){
    $penRow = $res_pen->num_rows ;
  }

  $query    = "SELECT * FROM `tbl_orders` where `od_type` = 2 GROUP BY `orderCustomId` ";
  $res_act  = $db->SelectData($query);
  if($res_act){
    $actRow = $res_act->num_rows ;
  }

  $query    = "SELECT * FROM `tbl_orders` where `od_type` = 3 GROUP BY `orderCustomId` ";
  $res_dele = $db->SelectData($query);
  if($res_dele){
    $delRow = $res_dele->num_rows ;
  }

  $query    = "SELECT * FROM `tbl_orders` where `od_type` = 4 GROUP BY `orderCustomId`";
  $res1_rej = $db->SelectData($query);
  if($res1_rej){
    $rejRow = $res1_rej->num_rows ;
  }
  $query    = "SELECT * FROM `tbl_fooddetails`";
  $res_food = $db->SelectData($query);
  if($res_food){
    $fodRow = $res_food->num_rows ;
  }
  $query    = "SELECT * FROM `tbl_cat`";
  $res_cat  = $db->SelectData($query);
  if($res_cat){
    $catRow = $res_cat->num_rows ;
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
                   
                    <p class="navcard-br1" >Panding Orders<span><br><?php echo $penRow;?></span></p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 col-xs-12" id="itemnav">
                    <a href="activeOrders.php" id="navcard">
                    <p class="navcard-br2">Active Orders<span><br><?php echo $actRow;?></span></p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 col-xs-12" id="itemnav">
                    <a href="deleveryOrders.php" id="navcard">
                    <p class="navcard-br3">Delivered Orders<span><br><?php echo $delRow;?></span></p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 col-xs-12" id="itemnav">
                    <a href="reject.php" id="navcard">
                    <p class="navcard-br4">Reject Orders<span><br><?php echo $rejRow;?></span></p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 col-xs-12" id="itemnav">
                    <a href="catlis.php" id="navcard">
                    <p class="navcard-br6">Catagories <span><br><?php echo $catRow;?></span></p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 col-xs-12" id="itemnav">
                    <a href="foodlist.php" id="navcard">
                    <p class="navcard-br7">Food Items <span><br><?php echo $fodRow;?></span></p>
                    </a>
                </div>
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
                    <?php include_once "pendingOrder_single.php" ?>
                </div>
                <div class="tab-pane " id="active_order">
                    <br>
                    <?php include_once "activeOrders_single.php" ?>
                </div> 
            </div>
        </section>
  </div>
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 

