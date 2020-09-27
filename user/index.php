    <!----Header Section---->
    <?php include 'includesUser/header.php' ?>
    <!----Login Section------>
    <?php include 'login.php' ?>
    <!----Registration Section------>
    <?php include 'registration.php' ?>
    <!---Search Section--->
  
   
    <section class="mt-5 SearchHead" >
        <div class="container py-5 px-5 w-40">
            <div id="SearchConten">
            <?php
    $modelClass = "class='modal fade modll '";
    if(isset($_GET['sdf']))
    {
        echo $_GET['sdf'];
        echo $userId;
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
                     
                     <div class="ml-2 mr-2 slidcat">
                        <a href="">
                            <div class="card slidecard ">
                                <img id="slideImg" class="img-fluid" src="../asset/images/01.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">BREAKFAST</div>
                            </div>
                        </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                       <a href="">
                            <div class="card slidecard">
                                <img id="slideImg" class="img-fluid" src="../asset/images/02.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">LUNCH</div>
                            </div>
                        </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                        <a href="">
                            <div class="card slidecard">
                                <img id="slideImg" class="img-fluid" src="../asset/images/03.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">DINNER</div>
                            </div>
                        </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                        <a href="">
                            <div class="card slidecard">
                                <img class="img-fluid" id="slideImg" src="../asset/images/04.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">DRINK</div>
                            </div>
                        </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                        <a href="">
                            <div class="card slidecard">
                                <img class="img-fluid font-weight-bold cat-font"  id="slideImg" src="../asset/images/05.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">JUICE</div>
                            </div>
                        </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                        <a href="">
                            <div class="card slidecard">
                                <img class="img-fluid " id="slideImg" src="../asset/images/06.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">COFFEE</div>
                            </div>
                        </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                        <a href="">
                            <div class="card slidecard">
                                <img class="img-fluid " id="slideImg" src="../asset/images/07.png">
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold cat-font">Tea</div>
                            </div>
                         </a>
                     </div>
                     <div class="ml-2 mr-2 slidcat">
                     <a href="">
                         <div class="card slidecard">
                             <img class="img-fluid " id="slideImg" src="../asset/images/08.png">
                         </div>
                         <div class="card-body">
                             <div class="card-title font-weight-bold cat-font">BEFF ROAST</div>
                         </div>
                         </a>
                     </div>
                     
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
  