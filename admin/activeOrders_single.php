<?php
$db = new Database();
$fm = new Formate();
$path = $_SERVER['SCRIPT_FILENAME'];
$current_page = basename($path,'.php');

/** Confirm  Order to delevery By Admin */
if(isset($_POST['confirmed'])){
    $deleveryID = "a,".$userId;
    $odid = $_POST['odid'];
    $d_boy = $_POST['d_boy'];
    $queryUp   = "UPDATE `tbl_orders` SET `od_type` = 3 ,`delevery_reject_by`  = '$deleveryID' , `delvery_boy_id` = '$d_boy', `delever_date` = now() WHERE `od_id` = '$odid' ";
    $result  = $db->QueryExcute($queryUp); 
  
  }

?>
<!----=================Active Order Single Page=========================----->
<div class="row mb-2">
    <?php 
        $rowperpage = 11;
        $row = 0;
        if(isset($_GET['seemore1'])){
           $page =  $_GET['seemore1'];
           $rowperpage = $page;
        }
        $query   = "SELECT * FROM `tbl_orders` INNER JOIN tbl_user ON tbl_orders.`customer_id` = tbl_user.id    where `od_type` = 2   order by od_id DESC limit $row,$rowperpage";
        $res  = $db->SelectData($query);
        if($res){
        while($od_data = $res->fetch_assoc()){
        $fd_item =  explode(',',$od_data['od_items']);
        $fd_item_lenth = count($fd_item);
        $fdProdId = $fd_item['0'] ;
        $queryFd   = "SELECT * FROM `tbl_fooddetails` where `id` = '$fdProdId'";
        $result  = $db->SelectData($queryFd);
        $fd_data = $result->fetch_assoc();
    ?>
    <div class="col-md-6">
        <div class="row">
            <div class="col-6 " id="penord">
                <p>Oreder ID -<span><a href=""><?php echo $od_data['orderCustomId']; ?></a></span></p>
                <div id="penordimg">
                    <img class="img-fluid" src="<?php echo $fd_data['fd_image']; ?>" alt="">
                    <?php 
                        if($fd_item_lenth == 1){
                    ?>
                    <span> <?php echo $fd_data['fd_name']; ?><strong class="ml-1"> Only</strong></span>
                    <?php }else{?>
                    <span> <?php echo $fd_data['fd_name']; ?> x <?php echo $fd_item_lenth-1; ?> <strong>More</strong></span>
                    <?php }?>
                </div>
                <div id="penorduser">
                    <p class="font-weight-bold">Order Price -<strong>$<?php echo $od_data['od_price']; ?></strong> <br><span>Contact User -<strong><?php echo $od_data['phoneNo']; ?></strong></span>
                    </p>
                </div>
            </div>
            <div class="col-6 " id="pendetal">
                <p class="mt-1">Oreder Date -<span><?php echo $fm->FormateDate($od_data['od_date']); ?></span></p>
                
                <h6 class="ml-4">Payment-<?php echo $fm->PaymentMethod($od_data['od_paymentStatus']); ?></h6>
                <div id="penbtn" class="">
                    <form action="<? echo $current_page.''?>" method="post">
                        <div class="form-group">
                            <select class="form-control px-1 btn-ms" id="exampleFormControlSelect1" name = "d_boy">
                                 <option value="0">Select</option>
                                <?php
                                    $querys   = "SELECT * FROM `tbl_delevery_boy` where dlb_id !=0 ";
                                    $ress  = $db->SelectData($querys);
                                    if($ress){
                                    while($dlb_data = $ress->fetch_assoc()){
                                ?>
                                <option title="<?php echo $dlb_data['dlb_mail'].' '.$dlb_data['dlb_phone'].' '.$dlb_data['dlb_address']?>" data-toggle="popover"  data-placement="top"  data-content="Content" value="<?php echo $dlb_data['dlb_id']; ?>"><?php echo $dlb_data['dlb_name']; ?></option>
                                    <?php }}?>
                            </select>
                            <input type="text" name="odid" hidden value="<?php echo $od_data['od_id']; ?>">
                            <button type="button"  class="btn btn-info btn-sm mt-1 mx-5 " name="confirmed" data-toggle="modal" data-target="#myModal">Open Modal</button>
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are Sure to delevered this order</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button  type="submit" class="btn btn-info btn-sm mt-1 mx-5 " name="confirmed">Confirmed</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } }else{echo '<h5 class="ml-5 text center">No Result Found</h5>';
        }?>
</div>