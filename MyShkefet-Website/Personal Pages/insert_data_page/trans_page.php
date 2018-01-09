<?php
function transfer(){
print('
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/MyShkefet-Website/Personal Pages/insert_data_page/trans_page.css"/>
        <link rel="shortcut icon" href="/b475b0e42b0cc33fae47b4a63d28313f.ico/favicon.ico" type="image/x-icon"/>
        <title> Upload Myshkefet Data  </title>
    </head>
    <body> 
    <nav>
        <ul>
            <li><a href= "/MyShkefet-Website/Personal Pages/insert_data_page/trans_page.php" > Upload New Swims </a></li>
            <li><a href= "/MyShkefet-Website/Personal Pages/SwimData.php"> My Swim Data</a> </li>
            <li style="float:left"> <a class="active" href= "/MyShkefet-Website/Personal Pages/PersonalHomePage.php"> Personal Home Page </a></li>
        </ul>
    </nav>
    <form>
  <div class="imgcontainer">
    <a href= "/MyShkefet-Website/HOmepage/index.php">
    <img src="https://www.shareicon.net/data/2016/07/21/799718_goggle_512x512.png" alt="My-Shkefet" class="avatar">
    </a> 
  </div>
<p> To upload your data to our database, please download our software from github. URL: abc.github.com</p>
  </div>
</form>
    </body>
        
        
    </body>
</html>
');
}
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
  $mydb->query("INSERT INTO swimdata (speed, laps, heartbeat, time, username, date) VALUES ($num1,$num2,$num3,$num4, '$username', CURDATE())");
  
  if($username== ""){
      
  }
transfer();