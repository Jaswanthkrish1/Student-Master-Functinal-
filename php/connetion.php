<?php
$servername="localhost";
$dbname="login_details";
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
}
else{
  echo" connetion faild".mysqli_connect_error();
}
return $conn;

?>
