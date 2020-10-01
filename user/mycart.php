
<?php 
  include_once 'includesUser/header.php' ;
  include_once 'cartclass.php';


  $customer_id = $_SESSION['userId'];
  $cart = new Cart();
 

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upcart'])){
       $quantity = $_POST['quantity'];
       $foodid = $_POST['foodid'];
       $addcart  = $cart->updatecart($quantity,$foodid);
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['removecart'])){
 
    $cartid = $_POST['cart_id'];
    $removecart  = $cart->removecart($cartid);
}

  

?>

<section id="cart" class="my-5">

<div class="container">
  <h2 class="text-dark mt-3">Your Cart</h2>
    <?php
      $query = "SELECT * FROM `tbl_cart` WHERE `customer_id` = '$customer_id'  ";
      $result = $db->SelectData($query);
      if($result){
    ?>
    <table class="table table-bordered text-center mt-5">
      <thead>
        <tr>
          <th>SL</th>
          <th>Food Name</th>
          <th>Image</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
          $i = 1;
          $subTotal = 0;
          while($cart_data = $result->fetch_assoc()){
            $total_price = $cart_data['quantity']*$cart_data['price'];
            $subTotal +=  $total_price;
      ?>
        <tr>
          <td class="py-5"><?php echo $i++ ;?></td>
          <td class="py-5"><?php echo $cart_data['product_name'];?></td>
          <td>
            <div style="width: 85px;height: 83px;align-items: center;margin: 0 auto;border: 2px solid #d2c3c3;padding: 1px 4px;" >
                <img class="img-fluid mt-1" src="<?php echo $cart_data['image'] ;?>" alt="" style="height: 70px;width:100%">
            </div>
          </td>
          <td class="py-5"><?php echo $cart_data['price'] ;?>$</td>
          <td >
            <form action="#" method = "post" class="my-4 ">
              <div class="d-flex justify-content-center">
                <input type="text" name="foodid" value="<?php echo $cart_data['product_id'] ;?>" hidden>

                <input  type="number" class="text-center btn-outline-secondary pt-1" name='quantity' value="<?php echo $cart_data['quantity'] ;?>" min="1" max="10" step="1"  style="border-radius: 3px;"/>

                <button type="submit" name = "upcart" class=" btn btn-info btn-sm">Update</button>
              </div>
            </form>
          </td>
          <td class="py-5"><?php echo $total_price;?>$</td>
          <td>
          <form action="" method = "post" class="my-4 ">
              <div>
                <input type="text" name="cart_id" value="<?php echo $cart_data['c_id'] ;?>" hidden>
              
                <button type="submit" name = "removecart" class=" btn btn-danger btn-sm">Remove</button>
              </div>
            </form>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <div >
      <table class="table table-borderedless table-secondary text-center  ">
       <tbody>
         <tr>
            <td class="px-5">Sub Total</td>
            <td class="px-5"><?php echo  $subTotal;?>$</td>
         </tr>
         <tr>
            <td class="px-5">Vat</td>
            <td class="px-5">10%</td>
         </tr>
         <tr>
            <td class="px-5">Grand Total</td>
            <td class="px-5"><?php echo  $subTotal+($subTotal*(10/100));?>$</td>
         </tr>
       </tbody>
      </table>
    </div>
    <?php }else{  ?>
    <p class="text-center">Your Cart is Empty</p>
   <?php } ?>

  <div class="clearfix">
    <button class="btn btn-primary btn-lg float-left ">Continue To Order</button>
    <button type="button" class="btn btn-info btn-lg float-right " data-toggle="modal" data-target="#myModal">checkout</button>
     <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div style="margin: 0 24%;"> 
             <h4 class="">Payment Option</h4>
          </div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body pt-3 mb-3 pb-5">
           <h5 class="text-center">Choose Your Payment Option</h5>
           <div class="d-flex justify-content-center mt-5">
              <a class="btn btn-info btn-sm mr-1" href="cash_hand.php">Cash On Hand</a> 
              <a class="btn btn-primary btn-sm mr-1" href="">Payment With Bekash</a>
              <a class="btn btn-secondary  btn-sm" href="">Payment With Other</a> 
           </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
    </div>
    <!-- Modal end -->
  </div>

</div>
</section>

<!----Footer Section---->
<?php include 'includesUser/footer.php' ?>


