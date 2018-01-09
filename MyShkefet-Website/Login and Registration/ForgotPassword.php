<?php
function forgotPassword($username, $email, $msg){
print ('<!DOCTYPE html>
 <head>
        <link rel="stylesheet" type= "text/css" href = "loginpage.css">
        <link rel="shortcut icon" href="/b475b0e42b0cc33fae47b4a63d28313f.ico/favicon.ico" type="image/x-icon"/>
        <title> My-Shkefet Retrieve Password</title>
    </head>
    <body>
     <nav>
        <ul>
            <li><a href= "about.html" > About </a></li>
            <li><a href= "/MyShkefet-Website/Login and Registration/loginpage.php"> Login </a></li>
            <li><a href= "/MyShkefet-Website/Login and Registration/Registration.php"> Registration</a> </li>
            <li style="float:left"> <a class="active" href= "/MyShkefet-Website/HOmepage/index.php"> MyShkefet </a></li>
        </ul>
        </nav>
<form>
  <div class="imgcontainer">
    <a href= "/MyShkefet-Website/HOmepage/index.php">
    <img src="https://www.shareicon.net/data/2016/07/21/799718_goggle_512x512.png" alt="My-Shkefet" class="avatar">
    </a> 
  </div>

  <div class="container">
    <label><b>Username</b></label>
  <input type="text" placeholder="Enter Username" name="username" value="'.$username.'" >
  <label><b>Email</b></label>
  <input type="email" placeholder="Confirm Email" name="email" value="'.$email.'" >
    <p class="login-msg">
        '.$msg.'		
		</p> 
    <button type="submit" formmethod= "post" >Submit Password Request</button>
  </div>
</form>
</body>
</html>
');
}
function connect2db(){
  $host= "127.0.0.1";
  $user= "elazarhirsch";
  $pass= "";
  $db= "UserData";
  $port= 3306; 
  
  $mydb= new mysqli($host, $user, $pass, $db, $port);
  if ($mydb->connect_errno) {
    print ('Failed to connect to MySQL: ('. $mydb-> connect_errno . ')' . $mydb->connect_error);
    die;
  }
  return $mydb;
}


if ($_SERVER["REQUEST_METHOD"]!= "POST"){
  forgotPassword('','','');
}else{
   $mysqli = connect2db ();
   $username=$mysqli-> escape_string($_POST['username']);
   $email= $mysqli-> escape_string($_POST['email']);
   $sql1= "SELECT username FROM UserData.UserInfo WHERE username='$username'" ;
   $res1= $mysqli-> query ($sql1)-> fetch_object()->username;
   $sql2= "SELECT email FROM UserData.UserInfo WHERE username='$username'" ;
   $res2= $mysqli-> query ($sql2) -> fetch_object()-> email;
   //did they enter values? No!
   if($username!= $_POST ['username'] or
     $username==null or 
     $email!= $_POST['email'] or
     $email== null){
       forgotPassword($_POST['username'], $_POST['email'] ,'Please enter Valid Username');
     }
  //did they enter values? Yes!
  // entered invalid username:
    else if ($res1==null){
    forgotPassword($_POST['username'], $_POST['email'], 'Please enter Valid Username');
    } else if ($email!= $res2){
    forgotPassword($_POST['username'], $_POST['email'], 'Username does not match email');
    }
    //valid username! Finally!
    else 
    {
        // obtain user's  password
        
        $sql3= "SELECT password FROM UserData.UserInfo WHERE username= '$username'";
        $res3= $mysqli-> query($sql3) -> fetch_object()-> password;
        //reveal password
        $msg= " Hello,  ".$username. "</br> Your password is: </br>  ".$res3. "</br> -The My-Shkefet team";
        forgotPassword($_POST['username'], $_POST['email'], $msg);
    }  
} 


?>