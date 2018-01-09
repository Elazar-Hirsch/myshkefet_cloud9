<?php
session_start();
function homepage(){
print('
<DOCTYPE html> 
<html>
    <head>
        <link rel="stylesheet" type= "text/css" href = "HomePage.css">
        <link rel="shortcut icon" b475b0e42b0cc33fae47b4a63d28313f.ico/favicon.ico" type="image/x-icon"/>
        <title> My-Shkefet Home Page</title>
    </head>
    <body style= "background-color: powderblue">
    <nav>
        <ul>
            <li><a href= "about.html" > About </a></li>
            <li><a href= "/MyShkefet-Website/Login and Registration/loginpage.php"> Login </a></li>
            <li><a href= "/MyShkefet-Website/Login and Registration/Registration.php"> Registration</a> </li>
            <li style="float:left"> <a class="active" href= "/MyShkefet-Website/HOmepage/index.php"> MyShkefet </a></li>
        </ul>
    </nav>
    <div class="imgcontainer">
    <img src="https://www.shareicon.net/data/2016/07/21/799718_goggle_512x512.png" alt="My-Shkefet"  class="avatar">
  </div>
    <h1>
        My-Shkefet
    </h1>
    </body>
</html>
');
}
$_SESSION['logged-in']= "no";
$_SESSION['username']= "";
homepage();
?>
