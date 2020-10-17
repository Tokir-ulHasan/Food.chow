<?php

            include_once '../lib/Database.php'; 
            $db = new Database();
              

           
          if(isset($_POST['ratedIndex'])){
         
     
           
            $ratedIndex = $_POST['ratedIndex'];
             $fid = $_POST['fd_id'];
             $uId = $_POST['user_id'];
             $ratedIndex++;
            
             $s_rating_query = "SELECT * FROM ` ratingfood` WHERE `fd_id` = '$fid' and `user_id` = '$uId' ";
             $s_rating_res = $db->SelectData($s_rating_query);

            
             if($s_rating_res->num_rows > 0){
               
               $u_rating_q = "UPDATE ` ratingfood` SET `rating`='$ratedIndex' WHERE `user_id` = '$uId' and `fd_id` = '$fid' ";
               $u_rating_res = $db->QueryExcute($u_rating_q);
               if( $u_rating_res){
                upFoodrate($ratedIndex,$fid,$db);
               }
             }
             else{
                
               $in_rating_q = "INSERT INTO ` ratingfood`(`fd_id`, `user_id`, `rating`) VALUES ($fid,$uId,$ratedIndex)";
               $in_rating_res = $db->QueryExcute($in_rating_q);
               upFoodrate($ratedIndex,$fid,$db);
             }
           
            }
             
            // rating update of food details table
            function upFoodrate($rat,$id,$db){
               $avgrat = 0;
               $s_rat = "SELECT avg(`rating`) as rat FROM ` ratingfood` WHERE `fd_id` = '$id' ";
               $s_rat = $db->QueryExcute($s_rat);
               if($s_rat &&  $s_rat->num_rows > 0){
                 $data =  mysqli_fetch_array($s_rat);
                 $avgrat = $data['rat'];
               }
               
              $up_fd_rat = "UPDATE `tbl_fooddetails` SET `fd_rating`= '$avgrat' WHERE `id` = '$id' ";
              $up_res = $db->QueryExcute($up_fd_rat);
            }
            ?>