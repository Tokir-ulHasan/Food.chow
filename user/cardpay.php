
<?php 
  include_once '../user/includesUser/header.php' ;
  include_once '../user/cartclass.php';

  $customer_id = $_SESSION['userId'];
  $cart = new Cart();
 

  
  if(isset($_GET['payment_Sta']) && $_GET['payment_Sta'] == '2' ){
    
    $payment_status = $_GET['payment_Sta'];
    $txid = $_GET['tx'];
    $order_food     = $cart->orederFood($customer_id, $payment_status, $txid);

  }

  

  

?>


<?php
require('payment/config.php');

if(isset($_POST['stripeToken']))
{
    \Stripe\Stripe::setVerifySslcerts(false);

    $token= $_POST['stripeToken'];
    $data = \Stripe\charge::create(array(
        "amount"=>10000,
        "currency"=>"BDT",
        "description"=>"Payment With Stripe",
        "source"=>$token,


    ));

    //echo"<pre>";
    //print_r($data);

    $tx_id= $data['id'];
    $status= $data['status'];
}

if(!empty($tx_id) &&  $status=='succeeded')
{
    //include'../user/cash_hand.php'; 
?>
    
<section id="cash_hand" class="my-5">
    <div class="container-fluid" >
        <div class="row" >
            <div class="col-6">
            <section id="cashtbl" class="my-3" style="border: 1px solid #decdcd;padding: 8px;border-radius: 2px;box-shadow: 4px 4px 24px 1px #e4c8c8;">
                <h5 class="text-secondary ml-1 mt-1">Your Details</h5>
                <?php

                    $query_U = "SELECT * FROM `tbl_user` WHERE `id` = $customer_id ";
                    $res = $db->SelectData($query_U);
                    if($res){
                    $data = mysqli_fetch_assoc($res);
                ?>
                <form action="">
                    <table class="table  table-sm " >
                        <tbody>
                            <tr>
                                <td >Name</td>
                                <td >:</td>
                                <td >
                                    <div >
                                        <input type="text" class="form-control" value = "<?php echo $data['name']?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >Phone</td>
                                <td >:</td>
                                <td >
                                    <div >
                                        <input type="text" class="form-control" value = "<?php echo $data['phoneNo']?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >Email</td>
                                <td >:</td>
                                <td >
                                    <div >
                                        <input type="text" class="form-control" value = "<?php echo $data['email']?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >Address</td>
                                <td >:</td>
                                <td >
                                    <div >
                                        <input type="text" class="form-control" value = "<?php echo $data['address']?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >City</td>
                                <td >:</td>
                                <td >
                                    <div >
                                        <input type="text" class="form-control" value = "<?php echo $data['city']?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >Zipcode</td>
                                <td >:</td>
                                <td >
                                
                                        <input type="text" class="form-control" value = "<?php echo $data['post_code']?>">
                                
                                </td>
                            </tr>
                            <tr>
                                <td ></td>
                                <td ></td>
                                <td >
                                    <div >
                                        <input type="submit" class="form-control btn btn-primary" value="Update Details">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php } ?>
            </section>
            </div>
            <!--=================pay with card===================--->
            <div class="col-6" id="cash_hand">
                <section id="cart" class="my-3" style="border: 1px solid #decdcd;padding: 8px;border-radius: 2px;box-shadow: 4px 4px 24px 1px #e4c8c8;">
                    <div class="container">
                        <h5 class="text-secondary ml-1 mt-1">Your Order Details</h5>
                        <?php
                        $query = "SELECT * FROM `tbl_cart` WHERE `customer_id` = '$customer_id'  ";
                        $result = $db->SelectData($query);
                        if($result){
                        ?>
                        <table class="table table-bordered text-center mt-2">
                        <thead>
                            <tr>
                            <th>SL</th>
                            <th>Food Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            
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
                            <td ><?php echo $i++ ;?></td>
                            <td><?php echo $cart_data['product_name'];?></td>
                            <td ><?php echo $cart_data['price'] ;?>$</td>
                            <td ><?php echo $cart_data['quantity'] ;?></td>
                            <td ><?php echo $total_price;?>$</td>
                            
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
                                <tr>
                                    <td class="px-5">Payment </td>
                                    <td class="px-5"><?php echo  $status;?></td>
                                </tr>
                                <tr>
                                    <td class="px-5">Trans ID</td>
                                    <td class="px-5"><?php echo  $tx_id;?></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <?php }?>
                    </div>
                </section>
        </div>
        <div class="d-block m-auto">
            <!--=============Payment Status Id=================-->
            <a href="?payment_Sta=2&&tx=<?php echo  $tx_id;?>" class="btn btn-lg btn-danger">Order Now</a>
        </div>
    </div>
</section>

<?php
}

/*elseif(empty($tx_id)){

    header("Location:../user/mycart.php");
}*/
?>

<!----Footer Section---->
<?php include '../user/includesUser/footer.php'; ?>







