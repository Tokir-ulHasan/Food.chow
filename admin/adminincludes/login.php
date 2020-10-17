<?php
include_once '../lib/Session.php';
Session::initializedSession();
include_once '../lib/Database.php';

$db = new Database();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $userName = $_POST['userName'];
    $userPass = $_POST['userPass'];
    $query = "SELECT * FROM `chowadmin` WHERE `userName` = '$userName' AND `pass`='$userPass'  ";
    $res = $db->SelectData($query);
    if ($res && $res->num_rows > 0){
        $data = mysqli_fetch_assoc($res);
        Session::setSession('login',true);
        Session::setSession('userName',$data['userName']);
        Session::setSession('userId',$data['id']);
        header("Location:index0.php?msg=1");
    }
    else{
        header("Location:adminlogin.php?msg=0");
    }
}
?>
