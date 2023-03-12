<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

    $email='plese provide Valid email';
    echo ("<script>alert('$email');</script><a href='./regstudent.php'>Back Register</a>");

}
if (strlen($_POST["rollnumber"]) !=5) {
    die("rollnumber must contain 5 ");
    echo ("<script>alert('rollnumber must contain 5');</script><a href='./regstudent.php'>Back Register</a>");

}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}
if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}
$password_ha=password_hash($_POST["password"],PASSWORD_DEFAULT);
 
$conn=require __DIR__ ."/php/connetion.php";
$sql="INSERT INTO userreg(firstname,Rollnumber,email,Password)
       VALUES (?,?,?,?)";
$stmt=$conn->stmt_init();
       if(! $stmt->prepare($sql))
       {
        die("SQL erroe:".$conn->error);
       }
    $stmt->bind_param("siss",
    $_POST["name"],
    $_POST["rollnumber"],
    $_POST["email"],
    $password_ha);
     
    if($stmt->execute()){
        
  header("location:Sigh_scucces_.php");
  exit;

    }else{
        if($conn->errno ===1062)
        { $error=" Plese check UserId or Email is allready taken";
            
            echo ("<script>alert('$error');</script><a href='./regstudent.php'>Back Register</a>");
            exit(true);
           
        }else{
        die($conn->error."".$conn->errno);}
    }
    function function_alert($message) {
      
        // Display the alert box 
        echo "<script>alert('$message');</script>";
    }
    
?>