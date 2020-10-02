<?php
$db = new Database();
$fm = new Formate();
 /** Reject Order By Admin */
 if(isset($_GET['rej'])){
    $rejectID = "a,".$userId;
    $odtype = $_GET['rej'];
    $queryUp   = "UPDATE `tbl_orders` SET  `od_type` = 4 ,  `delevery_reject_by`  = '$rejectID' ,`delever_date` = now() WHERE `od_id` = $odtype ";
    $result  = $db->QueryExcute($queryUp);        
  }

  /** Confirm to active Order By Admin */
  if(isset($_GET['con'])){
    $trans_id = $_GET['con'];
    $queryUp = "UPDATE `tbl_orders` SET `od_type` = 2 WHERE `orderCustomId` = $trans_id ";
    $result  = $db->QueryExcute($queryUp);        
  }

?>

<!----=================Pending Order Single Page=========================----->
<div class="row mb-2" id="penOd">
    <?php 
        $rowperpage = 11;
        $row = 0;
        if(isset($_GET['seemore'])){
           $page =  $_GET['seemore'];
           $rowperpage = $page;
        }
        $path = $_SERVER['SCRIPT_FILENAME'];
        $current_page = basename($path,'.php');
        $query   = "SELECT *, COUNT(*) as `Same_CUS_OD` FROM `tbl_orders` INNER JOIN tbl_user ON tbl_orders.`customer_id` = tbl_user.id  WHERE  `od_type` = 1 GROUP BY `orderCustomId` order by `orderCustomId` DESC limit $row,$rowperpage ";
        $res  = $db->SelectData($query);
    
        if($res){
        while($od_data = $res->fetch_assoc()){
        
        
    ?>
    <div class="col-md-6 ">
        <div class="row">
            <div class="col-6 " id="penord">
                <p>Oreder ID -<span><a href=""><?php echo $od_data['orderCustomId']; ?></a></span></p>
                <div id="penordimg">
                    <img class="img-fluid" src="<?php echo $od_data['od_image']; ?>" alt="">
                    <?php 
                        if($od_data['Same_CUS_OD'] == 1){
                    ?>
                    <span> <?php echo $od_data['od_items_name']; ?><strong class="ml-1"> Only</strong></span>
                    <?php }else{?>
                    <span> <?php echo $od_data['od_items_name']; ?> x <?php echo $od_data['Same_CUS_OD']; ?> <strong>More</strong></span>
                    <?php }?>
                </div>
                <div id="penorduser">
                    <p class="font-weight-bold">Order Price -<strong>$<?php echo $od_data['od_price']; ?></strong> <br><span>Contact User -<strong><?php echo $od_data['phoneNo']; ?></strong></span>
                    </p>
                </div>
            </div>
            <div class="col-6 " id="pendetal">
                <p class="mt-1">Oreder Date -<span><?php echo $fm->FormateDate($od_data['od_date']); ?></span></p>

                <h6 class="ml-4">Payment-<?php echo $fm->PaymentMethod( $od_data['od_paymentStatus']); ?></h6>
                <div id="penbtn" class="ml-4">
                    
                    <a href="#reject<?php echo $od_data['orderCustomId'];?>" data-toggle="modal" class="btn btn-secondary  btn-sm" ><span class="glyphicon glyphicon-trash"></span>Reject</a>

                    <a href="#confirm<?php echo $od_data['orderCustomId'];?>" data-toggle="modal" class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-trash"></span> Confirm</a>
                    
                    <!--===================Reject Model======================-->
                    <div class="modal fade" id="reject<?php echo $od_data['orderCustomId'];?>"  role="dialog" >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="text-center">Are you sure to Reject this order id <span style="color:blue"><?php echo $od_data['orderCustomId'];?></span></h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>

                                    <a href="<?php echo $current_page.'.php';?>?rej=<?php echo $od_data['orderCustomId'];?>" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span> Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--===================Confirm Model======================-->
                    <div class="modal fade" id="confirm<?php echo $od_data['orderCustomId'];?>"  role="dialog" >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="text-center">Are you sure to confirme to delevery this order id <span style="color:blue"><?php echo $od_data['orderCustomId'];?></span></h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>

                                    <a href="<?php echo $current_page.'.php';?>?con=<?php echo $od_data['orderCustomId'];?>" class="btn btn-info"><span class="glyphicon glyphicon-trash"></span> Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> 
        </div>
    </div>
    <?php }}?>
</div>

