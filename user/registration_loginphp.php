<?php
include_once '../lib/Session.php';
Session::initializedSession();
include_once '../lib/Database.php';

$db = new Database();

if(isset($_POST['singin']))
{
    $userEmail = $_POST['userEmail'];
    $userPass  = $_POST['userpass'];
    $query = "SELECT `id`, `name`, `email`, `password` FROM `tbl_user` WHERE `email` = '$userEmail' and `password` = '$userPass' ";
    $res = $db->SelectData($query);
    if ($res){
        $data = mysqli_fetch_assoc($res);
        Session::setSession('login',true);
        Session::setSession('userEmail',$data['email']);
        Session::setSession('userId',$data['id']);
        header("Location:index.php");
    }
    else{
        echo $res;
        echo "<span style='color: red;font-size: 15px'>No result Such found!! </span>";
    }
}
?>
