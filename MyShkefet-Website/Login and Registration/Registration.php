

<?php


function register($username, $password,$confirm_password, $email, $msg){
print ('<!DOCTYPE html>
 <head>
        <link rel="stylesheet" type= "text/css" href = "Registration.css">
        <link rel="shortcut icon" href="/b475b0e42b0cc33fae47b4a63d28313f.ico/favicon.ico" type="image/x-icon"/>
        <title> My-Shkefet Registration</title>
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
<form name= "loginform" id="loginform" method= "post">
  <div class="imgcontainer">
   <a href="/MyShkefet-Website/HOmepage/index.php">
    <img src="https://www.shareicon.net/data/2016/07/21/799718_goggle_512x512.png" alt="My-Shkefet"  class="avatar">
    </a>
  </div>

  <div class="container">
    <label><b>Username</b></label>
  <input type="text" placeholder="Enter Username" name="username" value="'.$username.'" >

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" value="'.$password.'" >
    
    <label><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="confirm_password" value="'.$confirm_password.'" >
    <label><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" value="'.$email.'" >
<p class="login-msg">
        '.$msg.'		
		</p> 
    <button type="submit" formmethod= "post" >Register</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <span class="psw"> Go to <a href="/MyShkefet-Website/Login and Registration/loginpage.php">login page</a></span>
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
  register('','', '', '', '');
}else{
   $mysqli = connect2db ();
   
   $_SESSION['logged-in']="no";
   
   $password=$mysqli-> escape_string($_POST['password']);
   $username=$mysqli-> escape_string($_POST['username']);
   $confirm_password=$mysqli->escape_string($_POST['confirm_password']);
   $email=$mysqli-> escape_string($_POST['email']);
   $sql1= "SELECT username FROM UserData.UserInfo WHERE username='$username'" ;
   $res= $mysqli-> query ($sql1)-> fetch_object()->username;
  if($password!= $_POST['password'] or
     $username!= $_POST ['username'] or
     $email!= $_POST['email'] or
     $confirm_password!= $_POST['confirm_password']or
     $password== null or
     $username==null or 
     $email== null or 
     $confirm_password==null){
       register($_POST['username'], $_POST['password'], $_POST['confirm_password'], $_POST['email'], 'Please enter all values');   
    
}else if($res!== null){
    register($_POST['username'], $_POST['password'], $_POST['confirm_password'], $_POST['email'], 'Username already taken!');
  }
// check confirm password
else if ($confirm_password!= $password){
  register($_POST['username'], $_POST['password'], $_POST['confirm_password'], $_POST['email'], 'Passwords must match!');
} else {
  $sql= "INSERT INTO UserInfo (username, password, email) VALUES ('$username', '$password', '$email') "; 
   if ($mysqli-> query ($sql)=== true){
    register($_POST['username'], $_POST['password'], $_POST['confirm_password'], $_POST['email'], 'My-Shkefet account created successfully! Please continue to log-in page!');
  }else {
    echo "Error creating account:" . $sql . "<br>" .$mysqli->error;
  }
}
}

?>