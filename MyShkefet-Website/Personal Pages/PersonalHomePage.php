<?php
session_start();
function homepage(){
print('
<DOCTYPE html> 
<html>
    <head>
        <link rel="stylesheet" type= "text/css" href = "PersonalHomePage.css">
        <link rel="shortcut icon" href="https://my-shkefet-project-elazarhirsch.c9users.io/b475b0e42b0cc33fae47b4a63d28313f.ico/favicon.ico" type="image/x-icon"/>
        <title> Personal Home Page</title>
    </head>
    <body style= "background-color: powderblue">
    <nav>
        <ul>
            <li><a href= "/MyShkefet-Website/Personal Pages/insert_data_page/trans_page.php" > Upload New Swims </a></li>
            <li><a href= "/MyShkefet-Website/Personal Pages/SwimData.php"> My Swim Data</a> </li>
            <li style="float:left"> <a class="active" href= "/MyShkefet-Website/HOmepage/index.php"> MyShkefet Home </a></li>
        </ul>
    </nav>
    <div class="imgcontainer">
    <img src="https://www.shareicon.net/data/2016/07/21/799718_goggle_512x512.png" alt="My-Shkefet"  class="avatar">
  </div>
    <h1>    
        My-Shkefet
    </h1>
       
    <div class= "text" >
        <p> Welcome to your MyShkefet personal homepage. <br> Your swimming data can be found at the "Swim Data" page! </p>
    
    </body>
</html>
');
}
if($_SESSION['logged-in']!="yes"){
    header('Location:'. '/MyShkefet-Website/HOmepage/index.php');
}
homepage();

?>