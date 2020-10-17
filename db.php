<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db = "clouddb";

$dbconnect = mysqli_connect($hostname,$username,$password,$db);
if ($dbconnect->connect_error){
 die("Database connection failed: " . $dbconnect->connect_error);
}
?>