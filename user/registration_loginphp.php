<?php
include_once '../lib/Session.php';
Session::initializedSession();
include_once '../lib/Database.php';
include_once '../lib/formatData.php';

$db = new Database();
$fm = new Formate();


    ////================login=======================//
if(isset($_POST['login']))
{
	$email = $_POST['loginEmail'];
	$pass  = $_POST['loginpass'];
    $query = "SELECT `id`,  `email`, `password` FROM `tbl_user` WHERE `email` = '$email' and `password` = '$pass' ";
    $res = $db->SelectData($query);
    if ($res && $res->num_rows > 0){
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
        
        $name     =   mysqli_real_escape_string($db->link,$fm->validation($_POST['userName']));
       // $email    =   mysqli_real_escape_string($db->link,$fm->validation($_POST['userEmail']));
        $phone    =   mysqli_real_escape_string($db->link,$fm->validation($_POST['userNum']));
        $address  =   mysqli_real_escape_string($db->link,$fm->validation($_POST['nameAdd']));
        $name=trim($name);
        $email=$_POST['userEmail'];
        $phone=trim($phone);
        $address=trim($address);
        $password = $_POST['userpass'];
      
        ;
       
      
        

        date_default_timezone_set("Asia/Dhaka");
        $date   =  date('j F Y, g:i a');

        $queryE = "SELECT * FROM `tbl_user` WHERE `email` = '$email'";
        $resultE = $db->SelectData($queryE);
      

        if($name == "" || $email == "" || $phone == "" || $address == "" || $password == ""  &&  $resultE){
            header("Location:index.php?regmsg=0");
        }else{
            
            $queryI = "INSERT INTO `tbl_user`( `name`, `email`, `phoneNo`, `address`, `password`, `joinDate`) VALUES ('$name','$email','$phone', '$address','$password','$date')";
            $result = $db->QueryExcute($queryI);
            if($result){
                    Session::setSession('login',true);
                    Session::setSession('userEmail',$email);
                    reg_log($email,$password,$db);
                    
                   
                 
            }else{
                header("Location:index.php?regmsg=2");
            }
        }
    }

    function  reg_log($email,$password,$db){
            $queryR = "SELECT `id`,  `email`, `password` FROM `tbl_user` WHERE `email` = '$email' and `password` = '$password' ";
            $resR = $db->SelectData($queryR);
            if ($resR && $resR->num_rows > 0){
                $data = mysqli_fetch_assoc($resR);
                Session::setSession('login',true);
                Session::setSession('userEmail',$data['email']);
                Session::setSession('userId',$data['id']);
                echo ("<script>location.href='index.php?regmsg=1'</script>");
            }
            else{
                header("Location:index.php?regmsg=2");
            }
    }

   
?>
