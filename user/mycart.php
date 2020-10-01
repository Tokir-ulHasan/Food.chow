
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
 
    $foodid = $_POST['foodid'];
    $addcart  = $cart->removecart($foodid);
}

  

?>

<section id="cart" class="my-5">

<div class="container">
  <h2 class="text-dark mt-3">Your Cart</h2>
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
       
       $query = "SELECT * FROM `tbl_cart` WHERE `customer_id` = '$customer_id'  ";
       $result = $db->SelectData($query);
       if($result){
         $i = 1;
       

         while($cart_data = $result->fetch_assoc()){
          $total_price = $cart_data['quantity']*$cart_data['price'];
    ?>
      <tr>
        <td class="py-5"><?php echo $i++ ;?></td>
        <td class="py-5"><?php echo $cart_data['product_name'] ;?></td>
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
              <input type="text" name="foodid" value="<?php echo $cart_data['product_id'] ;?>" hidden>
            
              <button type="submit" name = "removecart" class=" btn btn-danger btn-sm">Remove</button>
            </div>
          </form>
        </td>
      </tr>
       <?php } }else{ ?>
        <tr>
         <td></td>
         <td></td>
         <td></td>
         <td> Your is Empty</td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
     <?php }?>
    </tbody>
  </table>
</div>


</section>



<!----Footer Section---->
<?php include 'includesUser/footer.php' ?>