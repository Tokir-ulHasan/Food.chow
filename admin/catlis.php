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
      <h3 class="h4 m-2">Catagory List</h3>
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
            <caption>List of Catagory</caption>
            <thead class="thead-dark" style="display=flex" id="tbl-user-head">
                <tr>
                  <th scope="col" width="10%" class="text-center">No.</th>
                  <th scope="col" width="25%" class="text-center">Catagory Name</th>
                  <th scope="col" width="20%" class="text-center">Items Of Catagory</th>
                  <th scope="col" width="25%" class="text-center">Create Date</th>
                  <th scope="col" width="20%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="tbl-user-body">
            <?php
             
             
                if(isset($_POST['sel_name'])){
                    $rowperpage = $_POST['sel_name'];
                }

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
                $query = " SELECT * FROM `tbl_cat` WHERE  
                `cat_name`  like '%$serchKey%' or
                `cat_add_date`  like '%$serchKey%' 
                order by cat_id DESC limit $row,$rowperpage ";
                
                }
                else{
                $serchKey = "" ;
                $query = " SELECT * FROM `tbl_cat` order by cat_id DESC limit $row,$rowperpage ";
                }
                
               

                $res  = $db->SelectData($query);
                $len = 0;
                if($res){
                while($cat_data = $res->fetch_assoc()){
                    $catId = $cat_data['cat_id'];
                    $querY = " SELECT * FROM `tbl_fooddetails` where fd_cat_id = $catId";
                    $data =$db->SelectData($querY);
                    if($data){
                        if( $data->num_rows>0){
                            $len = $data->num_rows ;
                        }
                        
                    }
                 
                    $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $cat_data['cat_name']; ?></td>
                    <td><?php echo $len; ?> Items</td>
                    <td><?php echo $fm->FormateDate($cat_data['cat_add_date']); ?></td>
                    <td><a href="dish_type.php?discat=<?php echo $cat_data['cat_id']; ?>">Edit</a></td>
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
                 $querY = " SELECT *
                 FROM `tbl_cat`";
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
                  }if($total_page>=$page){
                ?>
                   <li class="list-inline-item"><a class = "btn" href="?pages=<?php echo ($page+1);?>">Next</a></li>
                <?php }
                ?>
                </ul>
            </div>
        </div>
    </div>
  
</div>
<script>
</script>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
