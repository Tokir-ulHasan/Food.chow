<div class="container">
  <h2 class="text-center txt h4 py-4">Track Your Order</h2>
  <form action="" method="post" class="form-inline my-2 my-lg-0 justify-content-center search-box">
                    <div class="input-group ">
                        <input class="form-control search-box-info my-0 py-0" type="text" name="order_no" placeholder="Enter Order No" aria-label="Search">
                        <div class="input-group-prepend search-box-btnn">
                            <button class="btn search-box-btn text-info" type="submit" name="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
  </form>
  <?php
          if(isset($_POST['submit'])){
            $on=$_POST['order_no'];
            $queryTrack = "SELECT * FROM tbl_orderdetails WHERE order_no= '$on' ";
            $resultTrack = $db->SelectData($queryTrack);
            if($resultTrack){
            $track_data = mysqli_fetch_assoc($resultTrack);
            
        ?>
    <table class="table table-bordered text-center mt-5">
      <thead>
        <tr>
          <th>Process</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
      
        <tr>
          <td class="py-5">Order Number</td>
          <td class="py-5"><?php echo $track_data['order_no'];?></td>
        </tr>
        <tr>
          <td class="py-5">Order Status</td>
          <td class="py-5"><?php echo $track_data['order_status'];?></td>
        </tr>
        <tr>
          <td class="py-5">Payment</td>
          <td class="py-5"><?php echo $track_data['payment'];?></td>
        </tr>
        <tr>
          <td class="py-5">Payment status</td>
          <td class="py-5"><?php echo $track_data['payment_status'];?></td>
        </tr>
        <tr>
          <td class="py-5">Payment Type</td>
          <td class="py-5"><?php echo $track_data['payment_type'];?></td>
        </tr>
        <tr>
          <td class="py-5">Trans ID</td>
          <td class="py-5"><?php echo $track_data['trans_id'];?></td>
        </tr>
        <tr>
          <td class="py-5">Packaging Status</td>
          <td class="py-5"><?php echo $track_data['packaging'];?></td>
        </tr>
        <tr>
          <td class="py-5">Shipping Status</td>
          <td class="py-5"><?php echo $track_data['shiping'];?></td>
        </tr>
        <tr>
          <td class="py-5">Tantative Delivery Date</td>
          <td class="py-5"><?php echo $track_data['t_daliv_date'];?></td>
        </tr>
        <tr>
          <td class="py-5">Delivery Status</td>
          <td class="py-5"><?php echo $track_data['delivery_status'];?></td>
        </tr>
      </tbody>
      <?php
      //  }
      ?>
    </table>
            <?php }
            else{  ?>
    <p class="text-center">NO Order Found!</p>
   <?php } 
   }
   ?>



</div>