<?php include_once "../config/connect.php"; ?>
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
		echo "All fields should be filled.Either one or many fields are empty.";
		}
	else{

	$inst="INSERT INTO tbl_user(name,email,phoneNo,address,password) VALUES('$name','$email','$mobile','$address','$pass')"; 
	$data=mysqli_query($cont,$inst);
	if($data == TRUE)
            {
                echo "<script>alert('Data updated successfully..!');window.location='';</script>";   
            }
	else{echo mysqli_error($cont);}
	}
}
?>
