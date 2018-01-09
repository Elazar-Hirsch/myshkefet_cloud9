<?php
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

  $mysqli= connect2db();
  $dataArray=array();

$res= $mysqli-> query("SELECT speed, heartbeat FROM swimdata WHERE username = 'Elazar Hirsch' ");

print"first variable: Res";

var_dump($res);


for ($x = 1; $x <= $mysqli->affected_rows; $x++) {
    $rows[] = $res->fetch_assoc();
}

print "/br     Next variable is: Rows";

var_dump($rows);

$speed=array_column($rows, 'speed');

print "/br     Next variable is: speed";
var_dump($speed);

$heartbeat=array_column($rows, 'heartbeat');

print "/br     Next variable is: heartbeat";
var_dump($heartbeat);

$dataArray=array_combine($heartbeat, $speed);

print "/br     Next variable is: dataArray";
var_dump($dataArray); 
//configure graph

?>