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
      <div class="clearfix mt-5">
            <div class="float-right w-50" >
                <form class="form-inline" action="" method="post">
                    <div class="input-group mb-3" style="width:80%">
                        <input type="text" class="form-control" name="search" placeholder="Search by Phone/Mail/ID/Location..." aria-label="Recipient's username" aria-describedby="basic-addon2" >
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
                    $query = " SELECT * FROM `tbl_orders` as tb_od
                      INNER JOIN tbl_user as tb_us ON 
                      tb_od.customer_id = tb_us.id
                      where od_Loction like '%$serchKey%' or
                       od_id like '%$serchKey%' or 
                       tb_us.phoneNo like '%$serchKey%' or 
                       tb_us.email like '%$serchKey%' order by  `od_id` DESC limit $row,$rowperpage ";
                       
                }
                else{
                 $serchKey ="" ;
                 $query = " SELECT * FROM `tbl_orders` INNER JOIN tbl_user ON tbl_orders.`customer_id` = tbl_user.id  order by  `od_id` DESC limit $row,$rowperpage ";
                }
               
                $res  = $db->SelectData($query);
                if($res){
                while($od_data = $res->fetch_assoc()){
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $od_data['email']; ?></td>
                    <td><?php echo $od_data['phoneNo']; ?></td>
                    <td><?php echo $od_data['od_Loction']; ?></td>
                    <td><?php echo  PaymentStatus($od_data['od_paymentStatus']); ?></td>
                    <td><a  href=""><?php echo $od_data['od_id']; ?></a></td>
                    <td><?php echo TrakOrder($od_data['od_type']); ?></td>
                    <td><?php echo $od_data['od_date']; ?></td>
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
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
