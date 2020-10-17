<?php include_once "adminincludes/header.php" ?>
<?php
$db = new Database();
$fm = new Formate();
?>
<div id="content" class="wrappwer">
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
  
    <div class="container-fluid">
      <h3 class="h4 m-2"> Food List</h3>
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
        <form id="myForm" action="" method="post">
            <h6>Show
            <Select name="sel_name" onChange=selectChange(this.value)>
                 <?php
                     
                     $i = $row = 0;
                     // number of rows per page
                    $rowperpage = 5;
                    $numrows_arr = array("5","10","25","50","100","250");
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
        <div class="table-responsive " id="user-tbl">
            <br>
            <table class="table   table-bordere  table-md" id="tbl-user">
            <caption>List of Food</caption>
            <thead class="thead-dark" style="display=flex" id="tbl-user-head">
                <tr>
                  <th scope="col" width="7%"  class="text-center">No.</th>
                  <th scope="col" width="10%" class="text-center">Name</th>
                  <th scope="col" width="15%" class="text-center">Description</th>
                  <th scope="col" width="7%"  class="text-center">Price</th>
                  <th scope="col" width="7%"  class="text-center">Discount</th>
                  <th scope="col" width="15%" class="text-center">Image</th>
                  <th scope="col" width="7%"  class="text-center">Food ID</th>
                  <th scope="col" width="10%" class="text-center">Catagory</th>
                  <th scope="col" width="5%"  class="text-center">Rating</th>
                  <th scope="col" width="10%" class="text-center">Add Date</th>
                  <th scope="col" width="7%"  class="text-center">Action</th>
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
                $query = " SELECT * FROM `tbl_fooddetails` WHERE  
                `fd_name`  like '%$serchKey%' or
                `fd_catagoery_name`  like '%$serchKey%' or
                `fd_description`  like '%$serchKey%' or
                `fd_price`  like '%$serchKey%' or
                `fd_discount`  like '%$serchKey%' or 
                `fd_addDate`  like '%$serchKey%' or
                `fd_rating`  like '%$serchKey%' or
                `fd_id`  like '%$serchKey%'
                order by id DESC ";
                }
                else{
                $serchKey ="" ;
                $query = "SELECT * FROM `tbl_fooddetails` order by id DESC limit $row,$rowperpage ";
                }
                $res  = $db->SelectData($query);
               
                if($res){
                while($fd_data = $res->fetch_assoc()){
                $i++;
             ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $fd_data['fd_name']; ?></td>
                    <td><?php echo $fm->textshort($fd_data['fd_description'],50); ?></td>
                    <td><?php echo $fd_data['fd_price']; ?></td>
                    <td><?php echo $fd_data['fd_discount']; ?></td>
                    <td><img src="<?php echo $fd_data['fd_image']; ?>" alt=""></td>
                    <td><?php echo $fd_data['fd_id']; ?></td>
                    <td><?php echo $fd_data['fd_catagoery_name']; ?></td>
                    <td><?php echo $fd_data['fd_rating']; ?></td>
                    <td><?php echo $fm->FormateDate($fd_data['fd_addDate']); ?></td>
                    <td><a  href="edit_dish_item.php?chgdishitem=<?php echo $fd_data['id']; ?>">Edit</a></td>
                    
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
                 $querY = " SELECT * FROM `tbl_fooddetails`";
                 $data =$db->SelectData($querY);
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
                <?php }
                ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
