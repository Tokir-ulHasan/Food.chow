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
            <caption>List of Food</caption>
            <thead class="thead-dark" style="display=flex" id="tbl-user-head">
                <tr>
                  <th scope="col" width="7%"  class="text-center">No.</th>
                  <th scope="col" width="10%" class="text-center">Name</th>
                  <th scope="col" width="10%" class="text-center">Description</th>
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
                $query   = "SELECT * FROM `tbl_fooddetails`";
                $res  = $db->SelectData($query);
                $i=0;
                while($fd_data = $res->fetch_assoc()){
                    $catid = $fd_data['fd_catagoery'];
                    $query_cat  = "SELECT * FROM `tbl_cat` WHERE `cat_id` = $catid";
                    $result  = $db->SelectData($query_cat);
                    $cat_data = $result->fetch_assoc();
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $fd_data['fd_name']; ?></td>
                    <td><?php echo $fm->textshort($fd_data['fd_description'],50); ?></td>
                    <td><?php echo $fd_data['fd_price']; ?></td>
                    <td><?php echo $fd_data['fd_discount']; ?></td>
                    <td><img src="<?php echo $fd_data['fd_image']; ?>" alt=""></td>
                    <td><?php echo $fd_data['fd_product']; ?></td>
                    <td><?php echo $cat_data['cat_name'];; ?></td>
                    <td><?php echo $fd_data['fd_rating']; ?></td>
                    <td><?php echo $fd_data['fd_addDate']; ?></td>
                    <td><a  href="edit_dish_item.php?chgdishitem=<?php echo $fd_data['fd_id']; ?>">Edit</a></td>
                    
                </tr>
            <?php }?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
