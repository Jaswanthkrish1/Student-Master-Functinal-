<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<?php

$is_valid=false;
if($_SERVER["REQUEST_METHOD"] ==="POST")
{
	$con= require __DIR__."/php/connetion.php";
	$sql =sprintf("SELECT * FROM userreg 
	               WHERE Rollnumber=%s",
				   $con->real_escape_string($_POST["id"]));
	$result = $con->query($sql);
	$user =$result->fetch_assoc();
	
	if($user)
	{
      if( password_verify($_POST["password"],$user["Password"])){
		
		session_start();
		$_SESSION["Identity_number"]=$user["Rollnumber"];
		header("location:studentside.php");
	    exit(true);
	  }
	  
	  $is_valid=true;
    }
}
?>


<nav class="nav justify-content-center" style=" background-color: aliceblue;   background:transparent;">
<a class="nav-link active" href="./regstudent.php" >Home</a> 
    </nav>
<div class="box">
	<form method="post" name="stuform" onsubmit="return validateform()" id="for" > 
	
		<span class="text-center">Student login</span>
		
	<div class="input-container">
		<input type="number" min="5" required='' name="id" id="id" value=""/>
		<label>ID</label>
		<small id="error1"></small>	
	</div>
	<div class="input-container">		
		<input type="password" min='8' required='' name="password" id="password" value=""/>
		<label>Password</label>
		<?php if($is_valid):?>
         <em style="color: #e74c3c;">invalid Password</em>
		<?php endif;?>	
	</div>
		<button type="submit" id="submit" name="submit" class="btn">Login</button>
</form>	
</div>


<style>
    @import url('https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&subset=greek-ext');
	input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
body{
	background-image: url("assets/background.jpg");
	background-position: center;
    background-origin: content-box;
    background-repeat: no-repeat;
    background-size: cover;
	min-height:100vh;
	font-family: 'Noto Sans', sans-serif;
}
.text-center{
	color:#fff;	
	text-transform:uppercase;
    font-size: 23px;
    margin: -50px 0 80px 0;
    display: block;
    text-align: center;
}
.box{
	position:absolute;
	left:50%;
	top:50%;
	transform: translate(-50%,-50%);
    background-color: rgba(0, 0, 0, 0.89);
	border-radius:3px;
	padding:70px 100px;
}
.input-container{
	position:relative;
	margin-bottom:25px;
}
.input-container label{
	position:absolute;
	top:0px;
	left:0px;
	font-size:16px;
	color:#fff;	
   
	transition: all 0.5s ease-in-out;
}
.input-container input{ 
  border:0;
  border-bottom:1px solid #555;  
  background:transparent;
  width:100%;
  padding:8px 0 5px 0;
  font-size:16px;
  color:#fff;
}
.input-container input:focus{ 
 border:none;	
 outline:none;
 border-bottom:1px solid #e74c3c;	
}
.btn{
	color:#fff;
	background-color:#e74c3c;
	outline: none;
    border: 0;
    color: #fff;
	padding:10px 20px;
	text-transform:uppercase;
	margin-top:50px;
	border-radius:2px;
	cursor:pointer;
	position:relative;
}

.input-container input:focus ~ label,
.input-container input:valid ~ label{
	top:-12px;
	font-size:12px;
	
}



</style>