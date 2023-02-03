function validateform(){
    var validRegex="[a-z0-9]+@[a-z]+\.[a-z]{2,3}";
    var passpattren="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}";
    var name=document.myform.name.value;  
    var password=document.myform.password.value;     
    var Id=document.myform.rollnumber.value;  
    var email=document.myform.email.value;  

    if (name==null || name==""){  
        alert("Name can't be blank");  
        return false;  
      }else if(password.length<8){  
        alert("Password must be at least 8 characters long.");  
        return false;  
      } else if(!password.match(passpattren)){  
        alert("requires one lower case letter, one upper case letter and one digit, 8-18 length example:-Ex@mple1");  
        return false;  
      }
      else if(name.length<3 ||name.match("(?=.*[0-9])")){
        alert("Name not contain numbers");return false;
      }
      else if(Id==null||Id==""||Id.length<5){
        alert("Id must contain 5 numbers");return false;  
      } 
      else if(!email.match(validRegex)){
        alert("Plese fill email id"); return false;
     }

}