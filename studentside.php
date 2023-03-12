<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script type="text/javascript" src="js/calc.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body style="
background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);" >
   <div>
  
   <?php



   $variable;
   session_start();
 if(isset($_SESSION["Identity_number"])){
    $mysqli=require __DIR__ ."/php/connetion.php";
    $sql="SELECT * FROM userreg
          WHERE Rollnumber={$_SESSION["Identity_number"]}";
          $result =$mysqli->query($sql);
          $user =$result->fetch_assoc();
          if($user){
            $variable=$_SESSION["Identity_number"];
          }
  
  
  
 }

    ?>
   <nav class="navbar navbar-expand navbar-light bg-light "style=" ;">
        <ul class="nav navbar-nav">
            <li class="nav-item" >
                <a class="nav-link active " style="font:bold;font-size:40px;margin-top: 4px;"  aria-current="page">Wellcome <span class="visually-hidden" style="font:bold;font-size:20px;">(Student)</span></a>
            </li>
            
        </ul>
    </nav>
</div>
<div class="container">
     
<? if(isset($user));?>
            <div class="row">
	<form  action="activity_db2.php" method="post" id="form" >

                <div class="col-sm-5 col-md-4 col-lg-3"style="padding: 10px;background:#292990;">
                        <div class="card " style="width:autopx;padding-top: 10px;margin-left: 20px;">
                            <img class="card-img-top " style="width:80px;border-radius:50%;" src="assets/default.jpg" alt="Card image cap">
                            <div class="card-body" style="text-align: center;background:#0ff7;">
                                <h5 class="card-title" style="text-align:start;font:bold;"><?= htmlspecialchars( $user["firstname"])?></h5>
                                <p class="card-text">welcome <?= htmlspecialchars( $user["firstname"])?> plese perform calculator funtions hear </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?= $user["Email"]?></li>
                                <li class="list-group-item" id="Roll"><?= $user["Rollnumber"]?></li>
                                
                            </ul>
                            <div class="card-body col-sm-2 col-md-3 col-lg-3">
                            
                                <a href="logout.php" class="card-link get" style="justify-content: center;">Logout</a>
                            </div>
                        </div>
                </div>
 <div class="col-sm-6 col-md-6 col-lg-4 " >
            
                <div class="form-outline">
                       <label class="form-label" >First Value</label>
                        <input id="n1"type="number"class="form-control" required name="n1" maxlength="20"value="" /><br>        
                </div>
                <div>
                <label class="form-label">Oparator</label><br>
                    <select id="operators" value="" name="oper"  >
                        <option value="+" class="option">+</option>
                        <option value="-" class="option">-</option>
                        <option value="/" class="option">/</option>
                        <option value="*" class="option">X</option>
                      </select>
                </div><br>
                <div class="form-outline">
                        <label class="form-label" >Second Value</label>
                        <input required id="n2"type="number"class="form-control" name="n2" maxlength="20"value="" /> <br>                  
                      
                </div>
                <div>
                <label class="form-label">Ask Master</label>
                <button onclick="calc();" id="submit" type="submit" name="submit"> Slove</button>
                <label class="form-label" style="margin-left: 10px;">Result</label>
                <input type="text" readonly id="result" name="val"/>
                </div>
</form>
                
</div>
<div class="col-sm-6 col-md-6 col-lg-5 " style="border:2px solid red;" >
           <div >
                <div>
                    <h3> Activity Log</h3><span ><?php  ?></span>
                    <div>
                        <ul>
                        <div>
                    
                    <table class=" table table-dark">
                     <tr>
                         
                         <th>Value</th>
                         <th>Task</th>
                         <th>Value2</th>
                         <th>Answer by Master</th>
                     </tr>
                     <?php

 $mycon=require __DIR__ ."/php/Activity_db_.php";
 $sql ="SELECT value1,oparation,value2,result,rollnumber from activity";
 $result=$mycon->query($sql);
 
      if($result-> num_rows >0){
        
       while($row =$result -> fetch_assoc()){
        if($row["rollnumber"]==$_SESSION["Identity_number"]){
          
          echo"<tr><td class='opp'>".$row["value1"]."</td><td class='opp'>".$row["oparation"]."</td><td class='opp'>".$row["value2"]."</td><td class='opp'><span>=</span>".$row["result"]."</td></tr>";
        }
       }
       echo"</table>";
      }else{echo "0 result";}
      $mycon->close();
   ?>
<style>
  .opp{
    text-align: center;
    
   
  }
</style>
                         
                    </table>
                     
                 </div>
                           

                        </ul>
                    </div>
                </div>
           </div>
</div>


   
</body>

<script>
    
$("#submit").click( function() {
 
   $.post( $("#form").attr("action"),
           $("#form :input").serializeArray(),
       function(info) {
 
         $("#response").empty();
         $("#response").html(info);
    
       });
 
  $("#form").submit( function() {
     return false;  
  });
});
 
</script>
<style>
  input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
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
