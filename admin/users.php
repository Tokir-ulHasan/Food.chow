<?php include_once "adminincludes/header.php" ?>
<?php
$db = new Database();
?>
<div id="content" class="wrappwer">

    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
    <div class=" top-content container-fluid" >
        <h3 class="h4 m-2">Users</h3>
        <hr>
        <div class="clearfix">
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
        <div >
        <form id="myForm" action="" method="post">
            <h6>Show
            <Select name="sel_name" onChange=selectChange(this.value)>
                 <?php
                     
                     $i = $row = 0;
                     // number of rows per page
                    $rowperpage = 10;
                    $numrows_arr = array("10","15","20","30","50","100");
                    foreach($numrows_arr as $nrow){
                        if(isset($_POST['sel_name']) && $_POST['sel_name'] == $nrow){
                            $rowperpage = $_POST['sel_name'];
                            $row = 0;
                            echo '<option value="'.$nrow.'" selected="selected">'.$nrow.'</option>';
                        }else{
                            echo '<option value="'.$nrow.'">'.$nrow.'</option>';
                        }
                    }
                ?>
            </select>Rows</h6>
        </form>
        </div>
        <div class="table-responsive " id="user-tbl">
            <table class="table   table-bordered table-sm" id="tbl-user">
            <caption>List of users</caption>
            <thead class="thead-dark" style="display=flex" id="tbl-user-head">
                <tr>
                <th scope="col" width="10%" class="text-center">No.</th>
                <th scope="col" width="15%" class="text-center">IMAGE</th>
                <th scope="col" width="15%" class="text-center">NAME</th>
                <th scope="col" width="15%" class="text-center">EMAIL</th>
                <th scope="col" width="10%" class="text-center">PHONE</th>
                <th scope="col" width="10%" class="text-center">ADDRESS</th>
                <th scope="col" width="15%" class="text-center">JOIN ON</th>
                <th scope="col" width="10%" class="text-center">ACTION</th>
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
                    $query = " SELECT * FROM `tbl_user` WHERE `email` like '%$serchKey%' or `name` like '%$serchKey%' or `phoneNo` like '%$serchKey%' or `address` like '%$serchKey%'  order by `id` limit $row ,$rowperpage";
                      
               }
               else{
                $query  = "SELECT * FROM `tbl_user` order by `id` limit $row ,$rowperpage";
               }
              $res    = $db->SelectData($query);
              
              while($user_data = $res->fetch_assoc()){
                  $i++;
              
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo"  <img src='data:image/jpeg;base64,".base64_encode($user_data['image'])."' alt='No Image' class='img-fluid' /> "; ?></td>
                    <td><?php echo $user_data['name']; ?></td>
                    <td><?php echo $user_data['email']; ?></td>
                    <td><?php echo $user_data['phoneNo']; ?></td>
                    <td><?php echo $user_data['address']; ?></td>
                    <td><?php echo $user_data['joinDate']; ?></td>
                    <td><a class="btn btn-danger" href="?del=<?php echo $user_data['id']; ?>">Remove</a></td>
                </tr>
            <?php }?>
            </tbody>
            </table>
            <div class="clearfix pb-5 mr-3">
              <?php 
                 $querY = "SELECT * FROM `tbl_user` ";
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
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
<?php
                   if(isset($_GET['del'])){
                    $d_id = $_GET['del'];
                
                    $d_Q = "DELETE FROM `tbl_user` WHERE `id` = '$d_id' ";
                    $d_res    = $db->SelectData($d_Q); 
                   
                }
                
 ?>