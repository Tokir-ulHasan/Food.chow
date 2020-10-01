<!----Header Section---->
<?php 
  include_once 'includesUser/header.php' ;
  include_once 'cartclass.php';
?>
<?php
  
  $cart = new Cart();
  $id = "" ;

  if(!isset($_GET['food_id']) && $_GET['food_id'] == NULL){
    echo "<script>window.location = '404.php'</script>";
  }else{
    $id=$_GET['food_id'];
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $quantity = $_POST['quantity'];
       $addcart  = $cart->addtocart($quantity,$id);
  }

  $sql2="select * from tbl_fooddetails where id='$id' ";
  $r2=$db->SelectData($sql2);
  $row=mysqli_fetch_assoc($r2);
  $name=$row['fd_name'];
  $des=$row['fd_description'];
  $price=$row['fd_price'];
  $image=$row['fd_image'];

?>

   <section class="mt-5 pt-5 mx-5" style="background: rgba(0, 123, 255, 0.06);">
      <div class="row mx-3">
        <div class="col-2">
            <ul class="list-unstyled catod">
                <h6 class="font-bold mt-2">Categories</h6>
                <?php
                include_once '../lib/Database.php';
                $db = new Database();
                $sql="select distinct cat_name from tbl_cat";
                $r=$db->SelectData($sql);
                
                while($row=mysqli_fetch_array($r))
                    {
                        $type=$row['cat_name'];
                        
                        echo "<li class='list-item mt-3 listA'><a href='' > $type </a></li>";
                    }
                ?>
            </ul>
        </div>
        <div class="col-10" style="border: 2px solid red;border-radius: 8px;margin-bottom: 147px;">
          <form action="" method="post">
          
               <div class="orderviwe mt-2">
                  <!-- <img src="../asset/images/blog-img-06.jpg" alt="">-->
                    <img src="<?php echo "$image"; ?>">
                    <div class="clearfix mt-2">
                        <h4 class="float-left text-dark"><?php echo "$name"; ?></h4>
                        <h4 class="float-right">$<?php echo "$price"; ?></h4>
                    </div>
                    <div class="mx-4 my-2" id="ratingSection" >
                      <h6 class=" my-1">Rating  Barger</h6>
                      <div class="ratting clearfix">
                        <div class="float-left rating" >
                          <span class="star mr-1"><i class="fa fa-star"></i></span>
                          <span class="star mr-1"><i class="fa fa-star"></i></span>
                          <span class="star mr-1"><i class="fa fa-star"></i></span>
                          <span class="star mr-1"><i class="fa fa-star"></i></span>
                          <span class="star mr-1"><i class="fa fa-star"></i></span>
                        </div>
                        <div class="float-right">
                          <span>5</span>
                        </div>
                      </div>
                    </div>
                    <div class="mx-4 my-2"> 
                      <h6 class=" my-1">Order Quantity</h6>
                      <div class="boxsppiner">
                        <input  type="number" name='quantity' id="spinner" value="1" min="1" max="10" step="1" />
                      </div>
                      <div class="clearfix">
                        <span class="float-left  mt-2  text-dark" id="minput">1</span>
                        <h6 class="float-right  mt-2  text-dark" >$1234</h6>
                      </div>
                    </div>
                </div>
                <div class="my-5">
                    <p><?php echo "$des"; ?></p>
                </div>
                <div class="d-flex justify-content-center ">
                    <input name="addtocart" type="submit"  class="btn btn-danger btn-large " type="button" value="Add to Cart" style="position: absolute;bottom: -18px;padding: 10px 20px;font-size: 21px;">
                </div>
          </form>
           
        </div>
      </div>
   </section>
  
    <!----Footer Section---->
<?php include 'includesUser/footer.php' ?>
  