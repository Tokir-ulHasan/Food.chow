<?php
include_once '../lib/Session.php';
Session::initializedSession();
include_once '../lib/Database.php';

$db = new Database();


    ////================login=======================//
if(isset($_POST['login']))
{
	$email=$_POST['loginEmail'];
	$pass=$_POST['loginpass'];
    $query = "SELECT `id`,  `email`, `password` FROM `tbl_user` WHERE `email` = '$email' and `password` = '$pass' ";
    $res = $db->SelectData($query);
    if ($res){
        $data = mysqli_fetch_assoc($res);
        Session::setSession('login',true);
        Session::setSession('userEmail',$data['email']);
        Session::setSession('userId',$data['id']);
        header("Location:index.php?logmsg=3");
    }
    else{
        header("Location:index.php?logmsg=4");
    }
	
}



    ////================Registration=======================//
    if(isset($_POST['singup'])){
        
        $name     = $_POST['userName'];
        $email    = $_POST['userEmail'];
        $phone    = $_POST['userNum'];
        $address  = $_POST['nameAdd'];
        $password = $_POST['userpass'];
        
        date_default_timezone_set("Asia/Dhaka");
        $date   =  date('j F Y, g:i a');

        $queryE = "SELECT * FROM `tbl_user` WHERE `email` = '$email'";
        $resultE = $db->SelectData($queryE);
      

        if($name == "" || $email == "" || $phone == "" || $address == "" || $password == ""  &&  $resultE){
            header("Location:index.php?regmsg=0");
        }else{
            
            $query = "INSERT INTO `tbl_user`( `name`, `email`, `phoneNo`, `address`, `password`, `joinDate`) VALUES ('$name',' $email','$phone', '$address','$password','$date')";
            $result = $db->QueryExcute($query);
            if($result){
                    Session::setSession('login',true);
                    Session::setSession('userEmail',$email);
                    header("Location:index.php?regmsg=1");
                 
            }else{
                header("Location:index.php?regmsg=2");
            }
        }
    }
?>
