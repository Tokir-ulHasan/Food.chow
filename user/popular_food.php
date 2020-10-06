<?php
$db = new Database();
?>

<section id="popularFoodsection">
        <div class="container">
            <div class="card" style="background:#0981e800;border:none">
                <div class="mt-4" >
                    <h1 class="h3 text-center">Most Popular Foods</h1>
                    <p class="text-center font-weight-sm cat-font">Complete Network impactful users whereas next-generation application engage out thinking vai tactical action </p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                <?php
                $query = "SELECT * FROM `tbl_fooddetails` ";
                $res = $db->SelectData($query);
                if($res){
                    while($fdData = $res->fetch_assoc()){
                    
                ?>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mt-4">
                        <div class="card fd_datails"  style="border: 1px solid rgba(0, 0, 0, 0.22);box-shadow: 1px 0px 20px 2px #a7c0d5;">
                            <div class="card ">
                                <div class="d-block " id="popularFoodimg">
                                    <img  class="img_1" src="<?php echo $fdData['fd_image']; ?> " data-zoom-img='<?php echo $fdData['fd_image']; ?> '>
                                    <div class="d-flex">
                                    <span  id="popularFoodlogo">
                                    <img src="../asset/images/04.jpg">
                                    </span>
                                    </div>
                                    <span class="d-block" id="popularFoodprice"><p>$<?php echo $fdData['fd_price']; ?></p></span>
                                </div>
                            </div>
                            <div class="d-block ">
                                <p class=" text-center mt-4 font-weight-bold "><?php echo $fdData['fd_name']; ?></p>
                                <p class=" text-center  "><span>Type of food:<?php echo $fdData['fd_catagoery_name']; ?></span></p>
                                <div class="d-flex justify-content-center">
                                <?php echo" <a class='btn btn-outline-danger' href='detailspage.php?food_id=".$fdData['id']."'>Details</a>"?></div>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex brd ">
                                    <div class=" brd-l py-3 px-3">
                                       <span class="popularFoodRating "><i class="fa fa-star-o"></i> <?php echo $fdData['fd_rating']; ?></span>
                                       
                                    </div>
                                    <div class="pl-5 py-3">
                                        <span class="popularFoodCat"><i class="fa fa-home"></i>Related Food</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                   <?php  } }  ?> 
                </div>
            </div>
        </div>
    </section>


  