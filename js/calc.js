   


 function calc()
 {
         var x = document.getElementById("n1").value;
         var y = document.getElementById('operators').value;
         var z = document.getElementById("n2").value;  
   
     switch(y){
        case '+':
    {
        if(x==4 && y=="+"&& z==9 ) {
        document.getElementById('result').value =four(plus(nine()));
        Active();
        }else{ document.getElementById('result').value=(+x)+(+z); }
        break
    }
         case '*':{
             if(x==7 &&y=='*' && z==5 )
         {
          document.getElementById('result').value =seven(times(five())) ;
          Active();
           
         } else{ document.getElementById('result').value=times(z)(x);; }
         break;
     }
     
     case '-':{
         if(x==8 && y=="-"&& z==3 )
     {
         document.getElementById('result').value =eight(minus(three()));Active();
     }
     else{document.getElementById('result').value=minus(z)(x);}
 
     break
 
     }
     case '/':{ 
         if(x==6 && y=="/"&& z==2 )
     {
         document.getElementById('result').value =six(divided_by(two()));Active()
     }
     else{document.getElementById('result').value=divided_by(z)(x);}
     break
     }
     default :{ alert("plese provide valid data")
 close()}
 }

 
 
 function makeNum(num, func) {
     if (func === undefined) {
           return num;
       } else {
           return func(num);
       }
   }
   
   function zero(func) {
       return makeNum(0,func);
   }
   function one(func) {
       return makeNum(1,func);
   }
   function two(func) {
       return makeNum(2,func);
   }
   function three(func) {
       return makeNum(3,func);
   }
   function four(func) {
       return makeNum(4,func);
   }
   function five(func) {
       return makeNum(5,func);
   }
   function six(func) {
       return makeNum(6,func);
   }
   function seven(func) {
       return makeNum(7,func);
   }
   function eight(func) {
       return makeNum(8,func);
   }
   function nine(func) {
       return makeNum(9,func);
   }
   
   function plus(right) {
     return function(left) { return left + right; };
   }
   function minus(right) {
     return function(left) { return left - right; };
   }
   function times(right) {
     return function(left) { return left * right; };
   }
   function divided_by(right) {
     return function(left) 
     {  val=right / left;
         var v = Math.floor(val);
         return v;
     };
   }
  
 function Active()
 {
  if(y=='*'){alert(" TestCase = seven(times(five()))")
  }else if(y=='+'){alert("TestCase = four(plus(nine()))")}
  else if(y=="-"){alert("TestCase = eight(minus(three()))")}
  else if(y=="/"){alert("TestCase = six(divided_by(two()))")}
 }
 
 
 }
 
 
 