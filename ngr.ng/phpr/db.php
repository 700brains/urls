<?php
session_start();
$localhost ='localhost';
$dbname = 'shorturl';

$password = '';
$user = 'root';


$con = mysqli_connect($localhost,$user,$password);
if(!$con)
{
echo ' No connection';
}

$db = mysqli_select_db($con,$dbname);
if(!$db){
  echo 'No Db';
}
?>