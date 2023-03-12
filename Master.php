<!DOCTYPE html>
<html >
<head>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>Master</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script type="text/javascript" src="php/Calculatefuntions.js"></script>
</head>

<body style="
background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);" >
 <?php 
 session_start();
 $mysqli=require __DIR__ ."/php/connetion.php";
 if(isset($_SESSION["Admin_number"])){
    $sql="SELECT * FROM adminlogin
          WHERE Id={$_SESSION["Admin_number"]}";
          $result =$mysqli->query($sql);
          $user =$result->fetch_assoc();
          if($user){
            $variable=$_SESSION["Admin_number"];
          }
    
 }
 ?>
<div>
  
   <nav class="navbar navbar-expand navbar-light bg-light ">
        <ul class="nav navbar-nav">
            <li class="nav-item" >
                <a class="nav-link active " style="font:bold;font-size:40px;margin-top: 4px;"  aria-current="page">Wellcome <span class="visually-hidden" style="font:bold;font-size:20px;">(Admin)</span></a>
            </li>
            
        </ul>
    </nav>
</div>
<div class="container">

                              
            <div class="row">
                <div class="col-sm-4 col-md-5 col-lg-3"style="padding: 10px;background:#292990;">
                        <div class="card " style="width:autopx;padding-top: 10px;margin-left: 20px;">
                            <img class="card-img-top " style="width:80px;border-radius:50%;" src="assets/default.jpg" alt="Card image cap">
                            <div class="card-body" style="text-align: center;background:#0ff7;">
                                <h5 class="card-title" style="text-align:center; "><?= htmlspecialchars($user["admin_name"])?></h5>
                                <p class="card-text">Hay..<?= htmlspecialchars($user["admin_name"])?> Hear you can see the all activity of students  </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                
                                <li class="list-group-item">Name<p><?= htmlspecialchars($user["admin_name"])?></li>
                                <li class="list-group-item">IdNumber<p><?= $user["Id"]?></p></li>
                                
                            </ul>
                            <div class="card-body col-sm-2 col-md-3 col-lg-3">
                                <a href="Admin_Log_out.php" class="card-link get" style="justify-content: center;">Logout</a>
                            </div>
                        </div>
                </div>
 
               
<div class="col-sm-7 col-md-7 col-lg-5  " >
<h3>Student info</h3>           
       <form > 
<div >
       
                <div>
                    
                   <table class=" table ">
                    <tr>
                        <th>StudentId</th>
                        <th>StudentName</th>
                        <th>StudentEmail</th>

                    </tr>
                    <?php                        
                  $mycon=require __DIR__ ."/php/connetion.php";
                  $sql ="SELECT firstname ,Rollnumber,email from userreg";
                  $result=$mycon->query($sql);
                       if($result-> num_rows >0){
                        
                        while($row =$result -> fetch_assoc()){
                            echo"<tr><td>".$row["Rollnumber"]."</td><td>".$row["firstname"]."</td><td>".$row["email"]."</td></tr>";
                        }echo"</table>";
                       }else{echo "0 result";}
                       $mycon->close();
                    ?>
                   </table>
                    
                </div>
           </div>
          </form> 
</div>


<div class="col-sm-8 col-md-7 col-lg-4 " style="border:2px solid red;">
               
      <form method="post" id="form">
          <h4>Student Activity<input value="" placeholder="Student Id" type="text" name="Look_Id" id="LookId"><span><button  id="submit" name="button"class="btn btn-primary" >Get Activity</button></span></h4>
          </form>
                <div>
                <div>
                    
                    <table class=" table table-dark">
                     <tr>
                         <th>Student ID</th>
                         <th>Student Given Value1</th>
                         <th>Student Given Oparator</th>
                         <th>Student Given Value2</th>
                         <th>Master Given Answer</th>
  </tr>
  <?php 
  
  error_reporting(0);
            $mycon=require __DIR__ ."/php/Activity_db_.php";
            $sql ="SELECT value1,oparation,value2,result,rollnumber from activity";
            $result=$mycon->query($sql);
            
          
            $val=$_POST["Look_Id"];
                 if($result-> num_rows >0){
                 "<th><h3>StudentId :-</h3></th>";
                  while($row =$result -> fetch_assoc()){
                   if($row["rollnumber"]==$val){
                     
                     echo"<tr><td>".$row["rollnumber"]."</td><td>".$row["value1"]."</td><td>".$row["oparation"]."</td><td>".$row["value2"]."</td><td>".$row["result"]."</td></tr>";
                   }
                  }
                  echo"</table>";
                 }else{echo "0 result";}
                 $mycon->close();
  ?>

                    </table>
                 </div>
                </div>
          
</div>
</body>

<style>


#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
    .container{
        width: 90%;
    }
    .act
    {
        padding:10px;
    }
    .get{
        border-radius: 40%;
    }
    .get:link, .get:visited {
  background-color: red;
  color: black;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

.get:hover, .get:active {
  background-color: green;
}
    
  .option{
    text-justify: auto;
    text-align: center;
    color:black;font-weight: bold;
    font-weight: bold;
    height:fit-content;  
    }  
.fixed {
  position: absolute;
  width: 45%;
  bottom: 10px;
  
} 
.parent {
  position: relative;
  height:100vh;
  border: 3px solid black;
}
</style>



</html>
