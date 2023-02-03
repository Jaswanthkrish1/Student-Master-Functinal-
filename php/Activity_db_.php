<?php
$servername="localhost";
$dbname="activity_log";
$username="root";
$password="";
$consbt=mysqli_connect($servername,$username,$password,$dbname);
if($consbt){
}
else{
  echo" connetion faild".mysqli_connect_error();
}
return $consbt;

?>
 