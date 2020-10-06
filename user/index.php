<?php include 'includesUser/header.php' ; ?>    
    
    <section class="mt-2 SearchHead" >
        <div class="container py-5 px-5 w-40">
            <div id="SearchConten">
            <?php
                if(isset($_GET['regmsg']) && $_GET['regmsg'] == 0){
                        echo ' <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Warning!</strong>  Registration Failed Your email already exits or Somting was wrong.
                        </div>';
                
                }
                elseif(isset($_GET['regmsg']) && $_GET['regmsg'] == 1){
                        echo '  <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>  Registration Successfully.
                    </div>';
                
                }
                elseif(isset($_GET['regmsg']) && $_GET['regmsg'] == 2){
                    echo '  <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning!</strong>  Registration Failed.
                </div>';
                }
                elseif(isset($_GET['logmsg']) && $_GET['logmsg'] == 3){
                    echo '  <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong>  Login Successfully.
                </div>';
            
                }
                elseif(isset($_GET['logmsg']) && $_GET['logmsg'] == 4){
                    echo '  <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning!</strong>  Invalid Password or Email.
                </div>';
                }
                
            ?>
           
                <h3 class="text-center txt h4 py-4">Unique Food Network...</h3>
                <form class="form-inline my-2 my-lg-0 justify-content-center search-box">
                    <div class="input-group ">
                        <input class="form-control search-box-info my-0 py-0" type="text" placeholder="Search" aria-label="Search">
                        <div class="input-group-prepend search-box-btnn">
                            <a class="btn search-box-btn text-info" href=""><span class="fa fa-search"></span></a>
                        </div>
                    </div>
                </form>
                <h6 class="text-center font-weight-light  py-4"><span class="fa fa-check-circle-o px-1"></span>69000+ People Served</h6>
            </div>
        </div>
    </section>
    <!---Slider Catagory---->
    <section class="py-5" id="slideCatagoryFood">
     <div class="container ">
        <div class="card " id="sliderSize">
            <div class="mt-4" >
               <h1 class="h3 text-center">Browse Food Catagory</h1>
                <p class="text-center font-weight-sm cat-font">Complete Network impactful users whereas next-generation application engage out thinking vai tactical action </p>
            </div>
            
            <div class="container mt-4">
                 <div class="owl-carousel owl-theme">
                     <?php
                       $cat_q = "SELECT * FROM `tbl_cat`"; 
                       $cat_r = $db->SelectData($cat_q);
                       if($cat_r){
                           while($cat_d =mysqli_fetch_array($cat_r)){
                       
                     
                     ?>
                     <div class="ml-2 mr-2 slidcat">
                        <a href="catagoryfoodlist.php?catid=<?php echo $cat_d['cat_id']?>">
                            <div class="card slidecard ">
                                <img id="slideImg" class="img-fluid" src="<?php echo $cat_d['cat_logo']?>">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font"><?php echo $cat_d['cat_name']?></div>
                            </div>
                        </a>
                     </div>
                     <?php }}?>
                     <!-- <div class="ml-2 mr-2 slidcat">
                       <a href="catagoryfoodlist.php?catname=Lunch">
                            <div class="card slidecard">
                                <img id="slideImg" class="img-fluid" src="../asset/images/02.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">LUNCH</div>
                            </div>
                        </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                        <a href="catagoryfoodlist.php?catname=Diner">
                            <div class="card slidecard">
                                <img id="slideImg" class="img-fluid" src="../asset/images/03.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">DINNER</div>
                            </div>
                        </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                        <a href="catagoryfoodlist.php?catname=Drink">
                            <div class="card slidecard">
                                <img class="img-fluid" id="slideImg" src="../asset/images/04.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">DRINK</div>
                            </div>
                        </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                        <a href="catagoryfoodlist.php?catname=Juices">
                            <div class="card slidecard">
                                <img class="img-fluid font-weight-bold cat-font"  id="slideImg" src="../asset/images/05.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">JUICE</div>
                            </div>
                        </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                        <a href="catagoryfoodlist.php">
                            <div class="card slidecard">
                                <img class="img-fluid " id="slideImg" src="../asset/images/06.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">COFFEE</div>
                            </div>
                        </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                        <a href="catagoryfoodlist.php">
                            <div class="card slidecard">
                                <img class="img-fluid " id="slideImg" src="../asset/images/07.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">Tea</div>
                            </div>
                         </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                     <a href="catagoryfoodlist.php">
                         <div class="card slidecard">
                             <img class="img-fluid " id="slideImg" src="../asset/images/08.png">
                         </div>
                         <div class="card-body">
                             <div class="card-title font-weight-bold cat-font">BEFF ROAST</div>
                         </div>
                         </a>
                     </div>-->
                </div>
            </div>
        </div>
     </div>
      
    </section>
    <!---How it Works---->
    <section>
      <div class="container">
          <div class="card-title">
              <div class="mt-4" >
                  <h1 class="h3 text-center">How it Works</h1>
                  <p class="text-center font-weight-sm cat-font">Complete Network impactful users whereas next-generation application engage out thinking vai tactical action </p>
              </div>
          </div>
          <div class="card-body">
            <div class="row">
                <div class=" col-md-6 col-lg-3 col-xl-3 ">
                    <div class="d-block justify-content-center" id="howWorked">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="howWork" class="d-inline-block"><img  src="../asset/images/01.jpg"><span>01<br>STEP</span>
                            </div>
                        </div>
                        <p class="cat-font font-weight-bold">Choose Your Food and Click on Order</p>
                    </div>
                </div>
                <div class=" col-md-6 col-lg-3 col-xl-3 ">
                    <div class="d-block justify-content-center" id="howWorked">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="howWork" class="d-inline-block"><img  src="../asset/images/02.jpg"><span>02<br>STEP</span>
                            </div>
                        </div>
                        <p class="cat-font font-weight-bold">We Deliver Your Meals</p>
                    </div>
                </div>
                <div class=" col-md-6 col-lg-3 col-xl-3 ">
                    <div class="d-block justify-content-center" id="howWorked">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="howWork" class="d-inline-block"><img  src="../asset/images/03.jpg"><span>03<br>STEP</span>
                            </div>
                        </div>
                        <p class="cat-font font-weight-bold">Cash on Delivery</p>
                    </div>
                </div>
                <div class=" col-md-6 col-lg-3 col-xl-3 ">
                    <div class="d-block justify-content-center" id="howWorked">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="howWork" class="d-inline-block"><img  src="../asset/images/04.jpg"><span>04<br>STEP</span>
                            </div>
                        </div>
                        <p class="cat-font font-weight-bold">Eat and Enjoy</p>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </section>
    <!----Most Popular foods---->
    <?php include 'popular_food.php' ?>
    <!----Footer Section---->
    <?php include 'includesUser/footer.php' ?>
  