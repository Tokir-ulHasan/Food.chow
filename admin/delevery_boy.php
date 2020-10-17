<?php include_once "adminincludes/header.php" ?>
<?php 
    $db = new Database();
    $fm = new Formate();

    $Alertmess = "";
    $Max = "";
    $querMaxID      = "SELECT MAX(`dlb_curd_id`) as maxid FROM `tbl_delevery_boy`";
    $dataMaxID      = $db->SelectData($querMaxID);
    if($dataMaxID){
        $user_Max = $dataMaxID->fetch_assoc();
        $Max = $user_Max['maxid'];
        $Max += 1;
    }
    if(isset($_POST['addboy'])){
      $name  =  $_POST['name'];
      $add   =  $_POST['address'];
      $email = $_POST['Email'];
      $phone = $_POST['phone'];
      
      date_default_timezone_set("Asia/Dhaka");
      $date  =  date('j F Y, g:i a');
     
      $fd_img = 'img';
      $uploadFolder = '../asset/UploadFile/Deleveryboy/';
      $uploadImg = $fm->ImageSetup($fd_img,$uploadFolder);

      
    
        $Q = "INSERT INTO `tbl_delevery_boy`( `dlb_name`, `dlb_mail`, `dlb_phone`, `dlb_address`, `dlb_img`, `dlb_curd_id`, `dlb_joinDate`) VALUES ('$name','$email','$phone','$add','$uploadImg','$Max','$date')";
          $Q_R = $db->SelectData($Q);
          if($Q_R){
            $fm->MoveFile($fd_img,$uploadImg);
          }
     
    }



    

?>
<div id="content" class="wrappwer">
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
    <div class=" top-content container-fluid" >
        <h3 class="h4 m-2">Delevery Boyes</h3>
        <hr>
        <div class="clearfix mt-5">
            <div class="float-right w-50" >
                <form class="form-inline" action="" method="post">
                    <div class="input-group mb-3" style="width:80%">
                        <input type="text" class="form-control" name="search" placeholder="Search " aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="clearfix">
          <form id="myForm" action="" method="post" class="float-left">
              <h6>Show
              <Select name="sel_name" onChange=selectChange(this.value)>
                  <?php
                     
                      $i = $row = 0;
                      // number of rows per page
                      $rowperpage = 10;
                      $numrows_arr = array("10","20","30","50","100");
                      foreach($numrows_arr as $nrow){
                          if(isset($_POST['sel_name']) && $_POST['sel_name'] == $nrow){
                              $rowperpage = $_POST['sel_name'];
                              echo '<option value="'.$nrow.'" selected="selected">'.$nrow.'</option>';
                          }else{
                              echo '<option value="'.$nrow.'">'.$nrow.'</option>';
                          }
                      }
                  ?>
              </select>Rows</h6>
          </form>
          <a class=" float-right mr-3 font-weight-normal btn btn-dark mb-2"  href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus "></i></a>
        </div>
        <div class="table-responsive " id="user-tbl">
            <table class="table   table-bordered table-sm" id="tbl-user">
            <br>
            <caption>List of users</caption>
            <thead class="thead-dark" style="display=flex" id="tbl-user-head">
                <tr>
                <th scope="col" width="7%" class="text-center">No.</th>
                <th scope="col" width="15%" class="text-center">IMAGE</th>
                <th scope="col" width="15%" class="text-center">ID</th>
                <th scope="col" width="15%" class="text-center">NAME</th>
                <th scope="col" width="15%" class="text-center">EMAIL</th>
                <th scope="col" width="10%" class="text-center">PHONE</th>
                <th scope="col" width="10%" class="text-center">Address</th>
                <th scope="col" width="15%" class="text-center">JOIN ON</th>
                <th scope="col" width="7%" class="text-center">ACTION</th>
                </tr>
            </thead>
                <tbody id="tbl-user-body">
                <?php
                    $page = 1;
                    if(isset($_GET['pages'])){
                        $page =  $_GET['pages'];
                        if($page > 1){
                            $i = $row = ($page-1)*$rowperpage ;
                        }
                        else{
                            $i = $row = 0;
                            $page = 1;
                        }
                    }
                   if(isset($_POST['search'])){
                       $serchKey = $_POST['search'];
                       $query = "SELECT * FROM `tbl_delevery_boy` WHERE dlb_id != 0 and ( `dlb_name` like '%$serchKey%' or 
                       `dlb_mail` like '%$serchKey%' or 
                       `dlb_phone` like '%$serchKey%' or 
                       `dlb_address` like '%$serchKey%' or 
                       `dlb_curd_id` like '%$serchKey%' or 
                       `dlb_joinDate` like '%$serchKey%' )
                        order by  `dlb_id` DESC limit $row,$rowperpage ";
                   }
                   else{
                         $query = " SELECT * FROM `tbl_delevery_boy` where dlb_id != 0   order by  `dlb_id` DESC limit $row,$rowperpage ";
                   }
                    $res = $db->SelectData($query);
                    if($res){
                    while($delevary_boy = $res->fetch_assoc()){
                        $i++;
                ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><img src="<?php echo $delevary_boy['dlb_img'];?>" alt=""></td>
                        <td><?php echo $delevary_boy['dlb_curd_id'];?></td>
                        <td><?php echo $delevary_boy['dlb_name'];?></td>
                        <td><?php echo $delevary_boy['dlb_mail'];?></td>
                        <td><?php echo $delevary_boy['dlb_phone'];?></td>
                        <td><?php echo $delevary_boy['dlb_address'];?></td>
                        <td><?php echo $fm->FormateDate($delevary_boy['dlb_joinDate']);?></td>
                        <td><a class="btn btn-danger" href="?del=<?php echo $delevary_boy['dlb_id'];?>">Remove</a></td>
                    </tr>
                    <?php }}else{?>
                        <tr width="10%">
                        <td></td>
                        <td></td>
                        <td>No result Found</td>

                        </tr>
                    <?php }?>
                </tbody>
            </table>
            <div class="clearfix pb-5 mr-3">
              <?php 
                 $querY = "SELECT * FROM `tbl_delevery_boy` where dlb_id != 0";
                 $data =$db->SelectData($querY);
                 if($data){
                 $total_rows = mysqli_num_rows($data);
                 $total_page = ceil($total_rows/$rowperpage);
              
              ?>
                <ul class="list-inline float-right">
                <?php 
                  if($page>1){
                ?>
                   <li class="list-inline-item"><a class = "btn" href="?pages=<?php echo ($page-1);?>">Previous</a></li>
                <?php 
                  }if($total_page>$page){
                ?>
                   <li class="list-inline-item"><a class = "btn" href="?pages=<?php echo ($page+1);?>">Next</a></li>
                <?php } }
                ?>
                </ul>
            </div>
        </div>
    </div>
     <!----==Add Admin Modal ==---->
     <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Add a Delevery Boy</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text"  class="form-control" id="admime_name" name="name" Placeholder="Please Enter Full Name">
                            <span id="NameMess" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="Name">Work Address</label>
                            <input type="text" class="form-control" id="userName" name="address" Placeholder="Please Enter Address">
                            <span id="userNameMess" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="Name">Email</label>
                            <input type="Email" class="form-control" id="userEmail" name="Email" Placeholder="Please Enter an Email">
                            <span id="userEmail" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="Name">Phone</label>
                            <input type="text" class="form-control" id="userEmail" name="phone" Placeholder="Please Enter Phone number">
                            <span id="userEmail" class="text-danger"></span>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <div class="containerr">
                                <input type="file" id="input-file" name="img"  onchange={handleChange()} hidden>
                                <label class="btn-upload" for="input-file" role="button"> Upload Photo</label>
                                <div class="preview-box"></div>  
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <input type="submit" class="btn btn-sm btn-outline-primary  px-5 font-weight-bolder mt-3" value="ADD" name="addboy" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
<?php
if($_GET['del']){
    $del = $_GET['del'];
    $d_Q = "DELETE FROM `tbl_delevery_boy` WHERE `dlb_id` = '$del' ";
    $d_R = $db->SelectData($d_Q);
}

?>