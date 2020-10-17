<?php include_once "adminincludes/header.php" ?>
<?php
    $db = new Database();
    $fm = new Formate();
?>
<div id="content" class="wrappwer">
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
    <div class="container-fluid mr-4">
      <h3 class="h4 m-2">Delevery Orders</h3>
      <div class="clearfix mt-5">
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
                         INNER JOIN tbl_delevery_boy as tb_dlb ON 
                         tb_od.delvery_boy_id = tb_dlb.dlb_id 
                         INNER JOIN tbl_user as tb_us ON 
                         tb_od.customer_id = tb_us.id
                         where `od_type` = 3 and  
                         ( od_Loction like '%$serchKey%' or
                          od_id like '%$serchKey%' or 
                          tb_dlb.dlb_name like '%$serchKey%' or 
                          tb_dlb.dlb_mail like '%$serchKey%' or 
                          tb_dlb.dlb_phone like '%$serchKey%'or
                          tb_us.phoneNo like '%$serchKey%' or 
                          tb_us.email like '%$serchKey%' ) GROUP BY `orderCustomId` order by  `od_id` DESC limit $row,$rowperpage ";
                          
                   }
                   else{
                    $serchKey ="" ;
                    $query = " SELECT * FROM `tbl_orders` 
                    INNER JOIN tbl_delevery_boy ON tbl_orders.delvery_boy_id = tbl_delevery_boy.dlb_id 
                    INNER JOIN tbl_user ON tbl_orders.customer_id = tbl_user.id where `od_type` = 3  GROUP BY `orderCustomId` order by  `od_id` DESC limit $row,$rowperpage ";
                   }
                   $res = $db->SelectData($query);
                   if($res){
                   $sno = $row + 1;
                   while($delevaty_data = $res->fetch_assoc()){
                       $i++;
                       $sno ++;
            ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $delevaty_data['od_Loction'];?></td>
                    <td><?php echo $delevaty_data['email'];?></td>
                    <td><?php echo $delevaty_data['phoneNo'];?></td>
                    <td><?php echo $delevaty_data['dlb_name'];?></td>
                    <td><?php echo $delevaty_data['dlb_phone'];?></td>
                    <td><?php echo $delevaty_data['dlb_mail'];?></td>
                    <td><?php echo $fm->FormateDate($delevaty_data['delever_date']);?></td>
                    <td><a  href="detailseOd.php?oddetails=<?php echo $delevaty_data['orderCustomId']; ?>"><?php echo $delevaty_data['orderCustomId'];?></a></td>
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
                 $querY = "SELECT * FROM `tbl_orders` WHERE `od_type` = 3 GROUP BY `orderCustomId`";
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
