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
      <div class="clearfix">
            <div class="float-left w-50" >
                <form class="form-inline ">
                <input class="form-control mr-sm-1 " id="frmW" type="search" placeholder="Search by name/email/phone/address" aria-label="Search" >
                <button class="btn btn-sm my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="float-right">
                 <a href=""><span><i class="fa fa-download mr-1"></i>Download File</span></a>
            </div>
        </div>
        <br>
        <div >
                <select class="float-left" name="" id="">
                    <option value="">10</option>
                    <option value="">20</option>
                    <option value="">30</option>
                    <option value="">50</option>
                    <option value="">50</option>
               </select>
        </div>
        
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
                $query   = "SELECT * FROM `tbl_cat`";
                $res  = $db->SelectData($query);
                $i=0;
                while($cat_data = $res->fetch_assoc()){
                    $catId = $cat_data['cat_id'];
                    $queryFd  = "SELECT * FROM `tbl_fooddetails` WHERE `fd_catagoery` =  $catId";
                    $result  = $db->SelectData($queryFd);
                    $len =   $result->num_rows;
                    $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $cat_data['cat_name']; ?></td>
                    <td><?php echo $len; ?></td>
                    <td><?php echo $cat_data['cat_add_date']; ?></td>
                    <td><a href="dish_type.php?discat=<?php echo $cat_data['cat_id']; ?>">Edit</a></td>
                </tr>
            <?php }?>
            </tbody>
            </table>
        </div>
    </div>
  
</div>

<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
