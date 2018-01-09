<?php
function login($username, $password, $msg){
print ('<!DOCTYPE html>
 <head>
        <link rel="stylesheet" type= "text/css" href = "loginpage.css">
        <link rel="shortcut icon" href="/b475b0e42b0cc33fae47b4a63d28313f.ico/favicon.ico" type="image/x-icon"/>
        <title> My-Shkefet Login</title>
    </head>
    <body>
     <nav>
        <ul>
            <li><a href= "/MyShkefet-Website/HOmepage/about.html" > About </a></li>
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

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" value="'.$password.'" >
    <p class="login-msg">
        '.$msg.'		
		</p> 
    <button type="submit" formmethod= "post" >Login</button>
  </div>

  <div class="container" style="background-color:##99ccff">
    <span class="psw">Forgot <a href="/MyShkefet-Website/Login and Registration/ForgotPassword.php">password?</a></span>
  </div>
</form>
</body>
</html>
');
}

session_start();
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
  login('','', '');
}else{
   $mysqli = connect2db ();
   
   $_SESSION['logged-in']="no";
   
   $password=$mysqli-> escape_string($_POST['password']);
   $username=$mysqli-> escape_string($_POST['username']);
   //did they enter values? No!
   if($password!= $_POST['password'] or
     $username!= $_POST ['username'] or
     $password== null or
     $username==null){
       logIn($_POST['username'], $_POST['password'], 'Please enter Username and Password');
     }
  //did they enter values? Yes!
     else{
       $res=$mysqli->query("SELECT password FROM UserData.UserInfo WHERE username= '$username' ")->fetch_object()->password;
       //incorrect username and password
       if ( $res !=  $password){
       $_SESSION['logged-in']="no";
       logIn($_POST['username'], $_POST['password'], 'Invalid username or password');
       }
       //correct User/Pass
       else{
              $_SESSION['logged-in']="yes";
             $_SESSION['username']=$username; 
              
         header('Location:'. '/MyShkefet-Website/Personal Pages/PersonalHomePage.php');
     }
     }     
} 


?>

