
<?php 
  include_once 'includesUser/header.php' ;
  include_once 'cartclass.php';


  $customer_id = $_SESSION['userId'];
  $cart = new Cart();



  if(isset($_GET['cancel']) ){
        
    $trans_id = $_GET['cancel'];
    $queryUp   = "UPDATE `tbl_orders` SET `od_type` = 4 , `delever_date` = now() WHERE `orderCustomId` = '$trans_id' ";
    $result  = $db->QueryExcute($queryUp); 
  }

  if(isset($_GET['confirm']) ){
        
    $trans_id = $_GET['confirm'];
    $queryUp   = "UPDATE `tbl_orders` SET `od_type` = 3 , `delever_date` = now() WHERE `orderCustomId` = '$trans_id' ";
    $result  = $db->QueryExcute($queryUp); 
  }

?>

<section id="order" class="my-5" style="min-height: 80vh;">

<div class="container">
  <h2 class="text-secondary mt-3">Your Order List</h2>
    <?php
       if(isset($_GET['msg']) && $_GET['msg'] == 1){
         echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
             <span aria-hidden='true'>&times;</span>
             <span class='sr-only'>Close</span>
         </button><br>
         <strong>Order Successfully </strong>
     </div> ";
       }

       

      $query_G = "SELECT `od_type`,`od_date`,`orderCustomId`,COUNT(*) as Same_CUS_OD  FROM `tbl_orders` where `customer_id` = 1 GROUP BY `orderCustomId`";
      $result = $db->SelectData($query_G);
      $i = 1;
      if($result && $result->num_rows > 0){
    ?>
    <table class="table table-bordered text-center mt-5">
      <thead>
        <tr>
         <th>SL</th>
         <th>Items</th>
         <th>Date</th>
         <th>Status</th>
         <th>Action</th>
        </tr>
      </thead>
      <tbody>
            <?php
              while($G_data = $result->fetch_assoc()){
            ?>
            <tr>
              <td >
               <span style="padding:10% 0">
                  <?php echo $i++; ?>
               </span>
              
               
               </td>
              <td >
                  <?php
                    $G_custom = $G_data['orderCustomId'];
                    $query = "SELECT * FROM `tbl_orders` WHERE `orderCustomId` = '$G_custom' ";
                    $resultOD = $db->SelectData($query);
                    if($resultOD){
                  ?>
                  <table class="table table-bordered text-center mt-3">
                    <thead>
                        <tr>
                          <th>Item No</th>
                          <th >Food Name</th>
                          <th>Image</th>
                          <th>Quantity</th>
                          <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                         $j = 1 ;
                        while($od_data = $resultOD->fetch_assoc()){
                         
                      ?>
                      <tr>
                        <td><?php echo $j++; ?></td>
                        <td><?php echo $od_data['od_items_name'];?></td>
                        <td>
                            <div style="width: 80px;height: 70px;align-items: center;margin: 0 auto;border: 1px solid #d2c3c3;padding: 1px 4px;" >
                                <img class="img-fluid mt-1" src="<?php echo $od_data['od_image'] ;?>" alt="" style="height: 58px;width:100%">
                            </div>
                        </td>
                        <td><?php echo $od_data['od_quantity'];?></td>
                        <td>$<?php echo $od_data['od_price'];?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <?php }?>
              </td>
              <td><?php echo $fm->FormateDate($G_data['od_date']);?></td>
              <td>
                  <?php 
                    if($G_data['od_type'] == 1){ 
                        echo $fm->TrakOrder($G_data['od_type']);
                    }elseif($G_data['od_type'] == 2){
                        echo "Shifted";
                    }elseif($G_data['od_type'] == 3){
                        echo "Confirm";
                    }
                    elseif($G_data['od_type'] == 4){
                      echo "Canceled";
                  }
                  ?>
              </td>
              <td>
                <?php
                  if($G_data['od_type'] == 1){
                ?>
                <a href="?cancel=<?php echo $G_data['orderCustomId'];?>" class="btn btn-danger btn-sm">Cancel</a>
                <?php }
                  elseif($G_data['od_type'] == 2){ 
                ?>
                  <a href="?confirm=<?php echo $G_data['orderCustomId'];?>" class="btn btn-info btn-sm">Confirm</a>
                <?php }else{ echo "N/A"; }?>
              </td>
            </tr>
            <?php } ?>
      </tbody>
    </table>
    <?php }else{ ?>
     <p class="text-center">No Reuslt found</p>
    <?php }?>

  

</div>
</section>

<!----Footer Section---->
<?php include 'includesUser/footer.php' ?>


