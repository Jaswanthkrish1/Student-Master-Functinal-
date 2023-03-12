<?php

session_start();
if(isset($_SESSION["Identity_number"])){
    $variable;
   $mysqli=require __DIR__ ."/php/connetion.php";
   $sql="SELECT * FROM userreg
         WHERE Rollnumber={$_SESSION["Identity_number"]}";
         $result =$mysqli->query($sql);
         $user =$result->fetch_assoc();
         if($user){
           $variable=$_SESSION["Identity_number"];
         }

         $consbt=require __DIR__."/php/Activity_db_.php";
$actsql="INSERT INTO activity(value1,oparation,value2,result,rollnumber) VALUES(?,?,?,?,?)";
$actstb=$consbt->stmt_init();
       if(! $actstb->prepare($actsql))
       {
        die("SQL erroe:".$consbt->error);
       }else if($_POST["n1"]==null||$_POST["n2"]==null){
         return false ;
       }else{
       isset($user);
    $actstb->bind_param(("ssssi"),
    $_POST["n1"],
    $_POST["oper"],
    $_POST["n2"],
    $_POST["val"],
    $variable
);}
  
if($actstb->execute())
{  die($consbt->error."".$consbt->errno);}      
}       
?>