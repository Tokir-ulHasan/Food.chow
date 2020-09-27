<?php 
include_once '../lib/Database.php';

$db = new Database();
?>
<?php
/*$databaseHost='localhost';
$databaseName='foodchow';
$databaseUsername='root';
$databasePassword='';
$cont=mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
if(!$cont){
	die("Connection failed: ".mysqli_connect_error());
}
else{
 echo"Connected Successfully";
}*/
/*if(isset($_POST['signup'])){
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPhone = $_POST['userNum'];
    $userAddress = $_POST['nameAdd'];
    $userPass = $_POST['userpass'];
}
echo "yes";*/
if(isset($_POST['signup'])){
	$name=$_POST['userName'];
	$email=$_POST['userEmail'];
	$address=$_POST['userAdd'];
	$mobile=$_POST['userNum'];
	$pass=$_POST['userpass'];
	if($name=="" || $email=="" || $mobile=="" || $address=="" || $pass==""){
	//	echo "<script>alert('All fields should be filled.Either one or many fields are empty.');</script>";
		}
	else{

		$inst="INSERT INTO tbl_user(name,email,phoneNo,address,password) VALUES('$name','$email','$mobile','$address','$pass')"; 
		//$data=mysqli_query($cont,$inst);
		$res = $db->QueryExcute($inst);
		if($res == TRUE)
            {
              //  echo "<script>alert('Your Registration Successful..!');window.location='';</script>";   
            }
		//else{echo mysqli_error($db);}
	}
}
?>
