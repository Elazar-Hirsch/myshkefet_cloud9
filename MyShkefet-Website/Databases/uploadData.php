<?php
session_start();
echo $_SESSION['username'];
    $host = "127.0.0.1";
    $user = "elazarhirsch";                     //Your Cloud 9 username
    $pass = "";                                  //Remember, there is NO password by default!
    $db = "UserData";                           //Your database name you want to connect to
    $port = 3306;                                //The port #. It is always 3306
    
    $mydb = new mysqli($host, $user, $pass, $db, $port);
    if($connection->connect_error)
    {
       die("connection failed: " .$connection->connect_error);
    }

   //$while= intval($_POST['check']);
  $num1=intval($_POST['num1']);
  $num2=intval($_POST['num2']);
  $num3=intval($_POST['num3']);
  $num4=intval($_POST['num4']);
  $username= $_SESSION['username'];
 $mydb->query("INSERT INTO swimdata (speed, laps, heartbeat, time, username, date) VALUES ($num1,$num2,$num3,$num4, '$username', CURDATE() )");
 
 

  

?>