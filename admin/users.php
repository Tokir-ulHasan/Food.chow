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
              $query  = "SELECT * FROM `tbl_user`";
              $res    = $db->SelectData($query);
              $i      = 0;
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
                    <td><a class="btn btn-info" href="">Edit</a></td>
                </tr>
            <?php }?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 