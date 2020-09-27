<?php 
$db = new Database();
$fm = new Formate();
$userId = Session::getSession('userId');
?>
<section id="navbarNavs" class="siderbar " > 
        <nav id="res">
          <div id="useradmin">
            <?php
                $no_img =  "../asset/UploadFile/Addmin/noImage.jpg";
                $image  =  $no_img;
                $querY  =  "SELECT * FROM `chowadmin` where id = $userId ";
                $data   =  $db->SelectData($querY);
                if($data){
                  $Admin_data =  $data->fetch_assoc();
                  if($Admin_data['img']  != "" ){
                    $image = $Admin_data['img'];
                  }
            ?>
            <div id="profileadmin">
              <a class="nav-brand" href="adminuserPage.php"><img class="img-fluid" src="<?php echo $image;?>" alt=""></a>
              <a href="adminuserPage.php"><i class="fa fa-cog"></i></a>
            </div>
            <p class="text-center"><?php echo $Admin_data['name'];?></p>
           <span>User ID:<?php echo $Admin_data['user_card_id'];?></span>
            <?php }?>
          </div>
          <?php
            $path = $_SERVER['SCRIPT_FILENAME'];
            $current_page = basename($path,'.php');
            
          ?>
       
          <div class="sidebar-sticky pt-3" >
            <ul class="nav flex-column text-light">
              <li class="nav-item  " <?php  if($current_page == 'index0'){ echo 'id="side-nav-item-active"';}?>>
                <a class="nav-link " href="index0.php">
                  <span data-feather="home"><i class="fa fa-tachometer"></i></span>
                  Dashboard 
                </a>
              </li>
              <li class="nav-item "  <?php  if($current_page == 'menu'){ echo 'id="side-nav-item-active"';}?>>
                <a class="nav-link" href="menu.php">
                  <span data-feather="file"><span data-feather="home"><i class="fa fa-braille"></i></span></span>
                  Menu
                </a>



              <!---Later We will Try it ---->
              <!--</li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"><i class="fa fa-bed"></i></span>
                  ResTourants
                </a>
              </li>-->

              
              <li class="nav-item" <?php  if($current_page == 'delevery_boy'){ echo 'id="side-nav-item-active"';}?>>
                <a class="nav-link" href="delevery_boy.php">
                  <span data-feather="users"><i class="fa fa-id-card-o"></i></span>
                  Delevery Boy
                </a>
              </li>
              <li class="nav-item" <?php  if($current_page == 'orders'){ echo 'id="side-nav-item-active"';}?>>
                <a class="nav-link" href="orders.php">
                  <span data-feather="bar-chart-2"><i class="fa fa-shopping-basket"></i></span>
                  Order
                </a>
              </li>


              <!---Later We will Try it ---->
             <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"><i class="fa fa-newspaper-o"></i></span>
                  Banners
                </a>
              </li>
            </ul>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"><i class="fa fa-building-o"></i></span>
                  Promotions
                </a>
              </li>-->


              <li class="nav-item" <?php  if($current_page == 'users'){ echo 'id="side-nav-item-active"';}?>>
                <a class="nav-link" href="users.php">
                  <span data-feather="file-text"><i class="fa fa-users"></i></span>
                  Users
                </a>
              </li>
              <li class="nav-item" <?php  if($current_page == 'Subadmins'){ echo 'id="side-nav-item-active"';}?>>
                <a class="nav-link" href="Subadmins.php">
                  <span data-feather="file-text"><i class="fa fa-user-secret"></i></span>
                  Sub Admins
                </a>
              </li>
             <li class="nav-item"  <?php  if($current_page == 'reports'){ echo 'id="side-nav-item-active"';}?>>
                <a class="nav-link" href="reports.php">
                  <span data-feather="file-text"><i class="fa fa-archive"></i></span>
                  Reports
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </section>  
