<?php include_once "adminincludes/header.php" ?>
<?php
$db = new Database();
$fm = new Formate();
function TrakOrder($odTrack){

    if($odTrack == 1 ){
        return $odTrack = "Pending";
    }
    elseif($odTrack == 2 ){
        return $odTrack = "Active";
    }
    elseif($odTrack == 3 ){
        return $odTrack = "Rejected";
    }
    elseif($odTrack == 4 ){
        return $odTrack = "Customer Rejected";
    }
}
function PaymentStatus($payment)
{
   if($payment == 1){
    return $payment = "Cash";
   }
   elseif($payment == 2){
    return $payment = "bekash";
   }
}
?>
<div id="content" class="wrappwer">
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
  
    <div class="container-fluid">
      <h3 class="h4 m-2"> Order List</h3>
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
            <caption>List of Delevers</caption>
            <thead class="thead-dark" style="display=flex" id="tbl-user-head">
                <tr>
                  <th scope="col" width="7%" class="text-center">No.</th>
                  <th scope="col" width="15%" class="text-center">Order EMAIL</th>
                  <th scope="col" width="10%" class="text-center">Order PHONE</th>
                  <th scope="col" width="15%" class="text-center">Order Location</th>
                  <th scope="col" width="12%" class="text-center">Payment Status</th>
                  <th scope="col" width="10%" class="text-center">Oreder ID</th>
                  <th scope="col" width="10%" class="text-center">Oreder Type</th>
                  <th scope="col" width="12%" class="text-center">Oreder Date</th>
                </tr>
            </thead>
            <tbody id="tbl-user-body">
            <?php
                $query   = "SELECT * FROM `tbl_orders` INNER JOIN tbl_user ON tbl_orders.`customer_id` = tbl_user.id ";
                $res  = $db->SelectData($query);
                $i=0;
                while($od_data = $res->fetch_assoc()){
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $od_data['emai']; ?></td>
                    <td><?php echo $od_data['phoneNo']; ?></td>
                    <td><?php echo $od_data['od_Loction']; ?></td>
                    <td><?php echo  PaymentStatus($od_data['od_paymentStatus']); ?></td>
                    <td><a  href=""><?php echo $od_data['od_id']; ?></a></td>
                    <td><?php echo TrakOrder($od_data['od_type']); ?></td>
                    <td><?php echo $od_data['od_date']; ?></td>
                </tr>
            <?php }?>
            </tbody>
            </table>
        </div>
    </div>
  
</div>

<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
