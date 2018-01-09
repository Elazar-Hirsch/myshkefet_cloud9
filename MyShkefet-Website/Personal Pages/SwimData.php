<?php

session_start();

function swimData(){
    print('
<!DOCTYPE html>
<html>
    <head>
        <title> Swim Data  </title>
         <link rel="stylesheet" type= "text/css" href = "swimData.css">
         <link rel="shortcut icon" href="/b475b0e42b0cc33fae47b4a63d28313f.ico/favicon.ico" type="image/x-icon"/>
    </head>
    <body  style= "background-color: alice blue" >
          <nav>
        <ul>
            <li><a href= "/MyShkefet-Website/Personal Pages/insert_data_page/trans_page.php" > Upload New Swims </a></li>
            <li><a href= "/MyShkefet-Website/Personal Pages/SwimData.php"> My Swim Data</a> </li>
            <li style="float:left"> <a class="active" href= "/MyShkefet-Website/Personal Pages/PersonalHomePage.php"> Personal Home Page</a></li>
        </ul>
    </nav>
     <div class="imgcontainer">
    <img src="https://www.shareicon.net/data/2016/07/21/799718_goggle_512x512.png" alt="My-Shkefet"  class="avatar">
  </div>
  </div class= "information">
  <p>
      Here are your graphs! Enjoy!!!
  </p>
  </div>
 <div class = "swimmerImage">
     <img src= "/MyShkefet-Website/Databases/createGraph.php" alt = "Upload data to see your graphs" class= "graphcontainer">
 </div>
 <div class = "swimmerImage">
     <img src= "/MyShkefet-Website/Databases/averageSpeed.php" alt = "Upload data to see your graphs" class= "graphcontainer">
 </div>
    </body>
</html>');
}
swimData();




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



  $username= $_SESSION['username'];
  
$mydb->query("UPDATE swimdata SET username= '$username' WHERE username='' ");



?>