<?php include_once "adminincludes/header.php" ?>
<?php
$db = new Database();
$fm = new Formate();
$userId = Session::getSession('userId');
?>
<?php
 
 $Alertmess = "";
 $Max = "";
 $querMaxID      = "SELECT MAX(`user_card_id`) as maxid FROM `chowadmin`";
 $dataMaxID      = $db->SelectData($querMaxID);
 if($dataMaxID){
    $user_Max = $dataMaxID->fetch_assoc();
    $Max = $user_Max['maxid'];
    $Max += 1;
 }
 if(isset($_POST['addAdmine'])){
   $Name     = mysqli_real_escape_string($db->link,$fm->validation($_POST['name']));
   $UserName = mysqli_real_escape_string($db->link,$fm->validation($_POST['username']));
   $Email    = mysqli_real_escape_string($db->link,$fm->validation($_POST['Email']));
   date_default_timezone_set("Asia/Dhaka");
    $date  =  date('j F Y, g:i a');
    $pass  =  substr($Name, 0,3).rand(0,4);
  
   
   if($Name == "" || $UserName == "" || $Email == ""){
       return false;
   }
   else{
    $queradmin  = "INSERT INTO `chowadmin`( `userName`, `name`, `email`,`user_card_id`, `date`, `pass`) VALUES ('$UserName','$Name','$Email','$Max','$date','$pass')";
     $dataadmin = $db->QueryExcute($queradmin);
  
   }
 }

?>
<div id="content" class="wrappwer">

    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
    <div class=" top-content container-fluid" >
        <h3 class="h4 m-2">Admins</h3>
        <hr>
        <div class="clearfix mt-5">
            <div class="float-right w-50" >
                <form class="form-inline" action="" method="post">
                    <div class="input-group mb-3" style="width:80%">
                        <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" >
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
              <caption>List of users</caption>
              <thead class="thead-dark" style="display=flex" id="tbl-user-head">
                  <tr>
                  <th scope="col" width="10%" class="text-center">No.</th>
                  <th scope="col" width="15%" class="text-center">IMAGE</th>
                  <th scope="col" width="10%" class="text-center">ID</th>
                  <th scope="col" width="15%" class="text-center">NAME</th>
                  <th scope="col" width="15%" class="text-center">User Name</th>
                  <th scope="col" width="10%" class="text-center">Eamil</th> 
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
                $query = "SELECT * FROM `chowadmin` WHERE `userName` like '%$serchKey%' or`name` like '%$serchKey%' or `email` like '%$serchKey%' or `user_card_id` like '%$serchKey%'   order by id DESC limit $row,$rowperpage ";
                }
                else{
                  $serchKey ="" ;
                  $query = "SELECT * FROM `chowadmin` order by id DESC limit $row,$rowperpage ";
                }
                $res    = $db->SelectData($query);
               if($res){
                while($user_data = $res->fetch_assoc()){
                    if($user_data['img'] != "" ){
                        $img = $user_data['img'];
                    }
                    
                    $i++;
                
              ?>
                  <tr>
                      <td><?php echo $i; ?></td>
                      <td><img class="img-fluid" src="<?php echo $img; ?>" alt=""></td>
                      <td><?php echo $user_data['user_card_id']; ?></td>
                      <td><?php echo $user_data['name']; ?></td>
                      <td><?php echo $user_data['userName']; ?></td>
                      <td><?php echo $user_data['email']; ?></td>
                      <td><?php echo $fm->FormateDate($user_data['date']); ?></td>
                      <?php 
                       if($user_data['id'] == $userId || $userId == 1){
                      ?>
                      <td><a class="btn btn-info" href="edit_admin.php?admin=<?php echo $user_data['id']; ?>">Edit</a></td>
                       <?php }?>
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
                 $querY      = "SELECT * FROM `chowadmin`";
                 $data       = $db->SelectData($querY);
                 $total_rows = mysqli_num_rows($data);
                 $total_page = ceil($total_rows/$rowperpage);
              ?>
                <ul class="list-inline float-right">
                <?php 
                  if($page>1){
                ?>
                   <li class="list-inline-item"><a class = "btn" href="?pages=<?php echo ($page-1);?>">Previous</a></li>
                <?php 
                  }if($total_page>=$page && $total_page != 1){
                    
                ?>
                   <li class="list-inline-item"><a class = "btn" href="?pages=<?php echo ($page+1);?>">Next</a></li>
                <?php }
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
                    <h3>Add an Admine</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="" method="post" onsubmit="return Validation()">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text"  class="form-control" id="admime_name" name="name" Placeholder="Please Enter Full Name">
                            <span id="NameMess" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="Name">Username</label>
                            <input type="text" class="form-control" id="userName" name="username" Placeholder="Please Enter Username">
                            <span id="userNameMess" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="Name">Email</label>
                            <input type="Email" class="form-control" id="userEmail" name="Email" Placeholder="Please Enter an Email">
                            <span id="userEmail" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <input type="submit" class="btn btn-sm btn-outline-primary  px-5 font-weight-bolder mt-3" value="ADD" name="addAdmine" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
        function Validation(){
            
            var Name  = document.getElementById('admime_name').value.trim();
            var UserName  = document.getElementById('username').value.trim();
            var Email  = document.getElementById('userEmail').value.trim();
            if( Name == "" && UserName == "" && Email == ""){
                return false;
            }
            else{
                return false;
            }
            return false;
        }
    
</script>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
