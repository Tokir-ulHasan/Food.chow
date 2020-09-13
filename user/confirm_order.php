<!----Header Section---->
<?php include 'includesUser/header.php' ?>

   <section class="mt-5 pt-5">
      <div class="row">
        <div class="col-2">
            <ul class="list-unstyled catod">
                <h6 class="font-bold mt-2">Categories</h6>
                <li class="list-item mt-3 listA"><a href="" class="active"> Calzone </a>
                </li>
                <li class="list-item mt-3 listA"><a href="" > Garlic Bread </a>
                </li>
                <li class="list-item mt-3 listA"><a href=""> Kebabs </a>
                </li>
                <li class="list-item mt-3 listA"><a href="" > Burgers </a>
                </li>
                <li class="list-item mt-3 listA"><a href="" > Specials </a>
                </li>
                <li class="list-item mt-3 listA"><a href="" > Wraps </a>
                </li>
                <li class="list-item mt-3 listA"><a href="" > Chicken </a>
                </li>
                <li class="list-item mt-3 listA"><a href="" > Paninis </a>
                </li>
                <li class="list-item mt-3 listA"><a href="" > Jacket Potatoes </a>
                </li>
                <li class="list-item mt-3 listA"><a href="" > Starters </a>
                </li>
                <li class="list-item mt-3 listA"><a href="" > Traditional Curries </a>
                </li>
            </ul>
        </div>
        <div class="col-6">
         <div class="orderviwe mt-2">
            <img src="../asset/images/blog-img-06.jpg" alt="">
            <div class="clearfix mt-2">
                <h4 class="float-left text-dark">Barger</h4>
                <h4 class="float-right">$40</h4>
            </div>
         </div>
         <div class="my-2">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis alias sunt, deleniti nam reprehenderit autem in, porro quo, nostrum vitae nulla harum eum. Esse reiciendis eius eveniet qui, in nam!</p>
         </div>
        </div>
        <div class="col-4">
            <div class="orderConfirmlist">
                <h4 class="text-center font-weight-bold text-dark mt-3">Order Confirmation</h4>

                <div class="orderConfirm my-5">
                    <div class="orderImg clearfix ">
                       <p class="">1.<img  src="../asset/images/blog-img-06.jpg" alt=""></p>
                    </div>
                    <div class="clearfix mx-4 ordfoodnam">
                      <a class="float-left h6 font-weight-bold" href="">Brger</a>
                      <h5 class="float-right  h6 font-weight-bold">$45</h5>
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
                          <input  type="number" id="spinner" value="1" min="1" max="10" step="1" />
                      </div>
                      <div class="clearfix">
                        <span class="float-left  mt-2  text-dark" id="minput">1</span>
                        <h6 class="float-right  mt-2  text-dark" >$1234</h6>
                      </div>
                      
                    </div>
                </div>
                <div id="prices" >
                  <div class="clearfix">
                    <h6 class="float-left">Sub Total</h6>
                    <h6 class="float-right">$56</h6>
                  </div>
                  <div class="clearfix">
                    <h6 class="float-left">Delevery Fee</h6>
                    <h6 class="float-right">$56</h6>
                  </div>
                  <div class="clearfix">
                    <h6 class="float-left">Tex</h6>
                    <h6 class="float-right">56</h6>
                  </div>
                  <div class="clearfix">
                    <h6 class="float-left">Total Price</h6>
                    <h6 class="float-right">$125</h6>
                  </div>
                </div>
                <div id="parchesinfo">
                  <div id="locadd">
                    <h6>Order location Address:</h6>
                     <textarea name="" id="" cols="30" rows="2"></textarea>
                  </div>
                  <div id="paMeth">
                    <h6>Payment Method:</h6>
                    <input type="radio" >Cash
                    <input type="radio">Bekash
                  </div>
                  <div id="confirbtn">
                    <input name=""  class="btn btn-primary" type="button" value="Confirm">
                  </div>
                </div>
                
            </div>
        </div>
      </div>
   </section>
  
    <!----Footer Section---->
<?php include 'includesUser/footer.php' ?>
  