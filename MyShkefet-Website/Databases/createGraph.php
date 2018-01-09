<?php



include($_SERVER['DOCUMENT_ROOT'].'/MyShkefet-Website/Databases/phpgraphlib-master/phpgraphlib.php');
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

  $username= $_SESSION['username'];
  

 $graph=new PHPGraphLib(550,350);
  $mysqli= connect2db();
  $dataArray=array();

$res= $mysqli-> query("SELECT MAX(speed) AS speed, date FROM swimdata WHERE username = '$username' GROUP BY date");
for ($x = 1; $x <= $mysqli->affected_rows; $x++) {
    $rows[] = $res->fetch_assoc();
}

$speed=array_column($rows, 'speed');
$date=array_column($rows, 'date');
$dataArray=array_combine($date, $speed);
//configure graph
$graph->addData($dataArray);
$graph->setTitle("Top Speed per Day");
$graph->setGradient("blue", "green");
$graph->setBarOutlineColor("black");
$graph->createGraph(); 


?>