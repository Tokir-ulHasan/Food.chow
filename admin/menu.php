<?php include_once "adminincludes/header.php" ?>
<?php 
$db = new Database();
 
?>
<?php

$query = "SELECT * FROM `tbl_cat`";
$res   = $db->SelectData($query);

$tab_menu    = "";
$tab_content = "";

$i = 0;
if($res){
  while($fdData = $res->fetch_assoc()){
      
    if($i == 0){

     $tab_menu .='<li class="nav-item clearfix active">
     <a class="nav-link float-left mt-2  " data-toggle="tab"  href="#cat'.$fdData['cat_id'].'"   role="tab" aria-controls="profile" aria-selected="false">'.$fdData['cat_name'].'</a>
     <span class="float-right mr-3 mt-1" id="menuitem"><a class="float-right mt-3" href="dish_type.php?discat='.$fdData['cat_id'].'" ><i class="fa fa-edit"></i></a></span> 
     </li>';

     $tab_content .=' <div class="tab-pane fade  show  active"   id="cat'.$fdData['cat_id'].'" role="tabpanel" aria-labelledby="nav-home-tab">
     <div class="scroll" id="scroll-style1">
         <ul class="nav nav-tabs flex-column " id="" role="tablist">';


    }else{
        $tab_menu .='<li class="nav-item clearfix ">
        <a class="nav-link float-left mt-2  " data-toggle="tab"  href="#cat'.$fdData['cat_id'].'"   role="tab" aria-controls="profile" aria-selected="false">'.$fdData['cat_name'].'</a>
        <span class="float-right mr-3 mt-1" id="menuitem"><a class="float-right mt-3" href="dish_type.php?discat='.$fdData['cat_id'].'" ><i class="fa fa-edit"></i></a></span> 
        </li>';
   
        $tab_content .=' <div class="tab-pane fade  show  "   id="cat'.$fdData['cat_id'].'" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="scroll" id="scroll-style1">
            <ul class="nav nav-tabs flex-column " id="" role="tablist">';
    }
   
    $tab_content .='<li class="nav-item clearfix">
     <span class="font-weight-bold float-left " >'.$fdData['cat_name'].'</span>
     <a class=" float-right mr-3 font-weight-bold" id="mainMenu-head" href="dish_item.php?dishitem='.$fdData['cat_id'].'"><i class="fa fa-plus "></i></a>
     </li>';

     $fdCtId  = $fdData['cat_id'] ;
     $queryFd = "SELECT * FROM `tbl_fooddetails` WHERE `fd_catagoery` = '$fdCtId' ";
     $result  = $db->SelectData($queryFd);
     if($result){
     while($fd_data = $result->fetch_assoc()){
        $tab_content .=' <li class="nav-item clearfix">
        <a class="nav-link float-left mt-2" id="profile-tab" data-toggle="tab" href="#Asian" role="tab" aria-controls="profile" aria-selected="false">'.$fd_data['fd_name'].'</a>

        <span class="float-right mr-3 mt-1" id="menuitem"><a class="float-right mt-3" href="edit_dish_item.php?chgdishitem='.$fd_data['fd_id'].'" ><i class="fa fa-edit"></i></a></span> 
        </li>';
     }}
     $tab_content .=' </ul> </div> </div>';
    $i++;

  }
}
?>
<div id="content" class="wrappwer">

    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
    <div class=" top-content container-fluid" >
        <h3 class="h4 m-2">Menu</h3>
        <div class="row mt-5 pt-5" id="menu"> 
            <div class="col-md-4">
               <div class="scroll" id="scroll-style1">
                 <ul class="nav nav-tabs flex-column " id="" role="tablist"> 
                    <li class="nav-item clearfix">
                       <span class="font-weight-bold float-left " >Catagory</span>
                        <a class=" float-right mr-3 font-weight-bold" id="mainMenu-head" href="dish_type.php?addcat"><i class="fa fa-plus "></i></a>
                    </li>
                    <?php echo $tab_menu; ?>
                </ul>
               </div>
            </div>
            <div class="tab-content col-md-4" id="nav-tabContent">
              <?php echo $tab_content; ?>
            </div>
        </div>
    </div>
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
