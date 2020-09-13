<?php include_once "adminincludes/header.php" ?>
<?php
 $db = new Database();
?>
<div id="content" class="wrappwer">
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
  
    <div class="container-fluid mr-4">
      <h3 class="h4 m-2">Delevery Orders</h3>
      <div class="clearfix">
            <div class="float-left w-50" >
                <form class="form-inline ">
                <input class="form-control mr-sm-1 " id="frmW" type="search" placeholder="Search by name/email/phone/address" aria-label="Search" >
                <button class="btn btn-sm my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="float-right mr-5">
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
            <table class="table   table-bordered table-md" id="tbl-user">
            <caption>List of Delevers</caption>
            <thead class="thead-dark" style="display=flex" id="tbl-user-head">
                <tr>
                <th scope="col" width="5%" class="text-center">No.</th>
                <th scope="col" width="8%" class="text-center">Delevery Location</th>
                <th scope="col" width="8%" class="text-center">Receiver EMAIL</th>
                <th scope="col" width="5%" class="text-center">Receiver PHONE</th>
                <th scope="col" width="7%" class="text-center">Delevery Boy Name</th>
                <th scope="col" width="7%" class="text-center">Delevery Boy PHONE</th>
                <th scope="col" width="7%" class="text-center">Delevery Boy EMAIL</th>
                <th scope="col" width="10%" class="text-center">Delevery Date</th>
                <th scope="col" width="5%" class="text-center">Delevery Id</th>
                </tr>
            </thead>
            <tbody id="tbl-user-body">
            
            <?php
                   $query = " SELECT * FROM `tbl_orders` 
                   INNER JOIN tbl_delevery_boy ON tbl_orders.delvery_boy_id = tbl_delevery_boy.dlb_id 
                   INNER JOIN tbl_user ON tbl_orders.customer_id = tbl_user.id where `od_type` = 3";
                   $res = $db->SelectData($query);
                   $i=0;
                   while($delevaty_data = $res->fetch_assoc()){
                       $i++;
            ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $delevaty_data['od_Loction'];?></td>
                    <td><?php echo $delevaty_data['emai'];?></td>
                    <td><?php echo $delevaty_data['phoneNo'];?></td>
                    <td><?php echo $delevaty_data['dlb_name'];?></td>
                    <td><?php echo $delevaty_data['dlb_phone'];?></td>
                    <td><?php echo $delevaty_data['dlb_mail'];?></td>
                    <td><?php echo $delevaty_data['delever_date'];?></td>
                    <td><a  href=""><?php echo $delevaty_data['od_id'];?></a></td>
                </tr>
                   <?php }?>
            </tbody>
            </table>
        </div>
    </div>
  
</div>

<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
