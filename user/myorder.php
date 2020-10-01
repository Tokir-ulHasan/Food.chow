
<?php 
  include_once 'includesUser/header.php' ;
  include_once 'cartclass.php';


  $customer_id = $_SESSION['userId'];
  $cart = new Cart();

?>

<section id="cart" class="my-5">

<div class="container">
  <h2 class="text-dark mt-3">Your Cart</h2>
    <?php
      $query = "SELECT * FROM `tbl_orders` WHERE `customer_id` = '$customer_id'  ";
      $result = $db->SelectData($query);
     
      if($result && $result->num_rows > 0){
    ?>
    <table class="table table-bordered text-center mt-5">
      <thead>
        <tr>
          <th>SL</th>
          <th>Food Name</th>
          <th>Image</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Date</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
          $i = 1;
          $subTotal = 0;
          while($od_data = $result->fetch_assoc()){
          
      ?>
        <tr>
          <td class="py-5"><?php echo $i++ ;?></td>
          <td class="py-5"><?php echo $od_data['od_items_name'];?></td>
          <td>
            <div style="width: 85px;height: 83px;align-items: center;margin: 0 auto;border: 2px solid #d2c3c3;padding: 1px 4px;" >
                <img class="img-fluid mt-1" src="<?php echo $od_data['od_image'] ;?>" alt="" style="height: 70px;width:100%">
            </div>
          </td>
          <td class="py-5"><?php echo $od_data['od_quantity'];?></td>
          <td class="py-5">$<?php echo $od_data['od_price'];?></td>
          <td class="py-5"><?php echo $od_data['od_date'];?></td>
          <td class="py-5">
              <?php 
                if($od_data['od_type'] == 1){ 
                    echo $fm->TrakOrder($od_data['od_type']);
                }elseif($od_data['od_type'] == 2){
                    echo "Shifted";
                }elseif($od_data['od_type'] == 3){
                    echo "Confirm";
                }
              ?>
              
          </td>
          <td class="py-5">
          <?php
            if($od_data['od_type'] == 1){
          ?>
           <a href="" class="btn btn-danger btn-sm">Cancel</a>
         <?php }
           elseif($od_data['od_type'] == 2){ ?>
            <a href="" class="btn btn-info btn-sm">Confirm</a>
          <?php }else{ echo "N/A"; }?>
          </td>

          
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php } else {  ?>
    <p class="text-center">No Reuslt found</p>
   <?php } ?>

  

</div>
</section>

<!----Footer Section---->
<?php include 'includesUser/footer.php' ?>


