<?php include_once "adminincludes/header.php" ?>
<?php
$db = new Database();
$fm = new Formate();
?>

<div id="content" class="wrappwer">
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
   
    <div class="container-fluid">
      <h3 class="h4 m-2">Order Food List of Order No. <?php echo $_GET['oddetails']; ?></h3>
      <table class="table text-center table-bordered mt-5">
          <thead>
              <tr>
                  <th>Image</th>
                  <th>Food Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Total Price</th>
              </tr>
          </thead>
          <tbody>
          <?php 
  if(isset($_GET['oddetails'])){
      $odNO = $_GET['oddetails'];
      $od_q = "SELECT * FROM `tbl_orders` WHERE `orderCustomId` = '$odNO' ";
      $od_res  = $db->SelectData($od_q);
      if($od_res && $od_res->num_rows > 0){
        while($od_data = $od_res->fetch_assoc()){
              $food_id = $od_data['od_items'];
              
              $fd_q = "SELECT * FROM `tbl_fooddetails` WHERE `id` = '$food_id' ";
              $fd_res  = $db->SelectData($fd_q);
              if($fd_res && $od_res->num_rows > 0){
                $fd_data = $fd_res->fetch_assoc();
           

?>
        
              <tr>
                  <td>
                  <img src="<?php echo $fd_data['fd_image']; ?>" style="height: 100px;width: 150px;" class="img-fluid " alt="">
                  </td>
                  <td scope="row"><?php echo $fd_data['fd_name']; ?></td>
                  <td><?php echo $od_data['od_quantity']; ?></td>
                  <td><?php echo $fd_data['fd_price']; ?></td>
                  <td><?php echo ($fd_data['fd_price']*$od_data['od_quantity']); ?></td>
              </tr>
            
        
  <?php  
   } } } }
   ?>
        </tbody>
      </table>
      
    </div>
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
