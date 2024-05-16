<?php
// $url='http://localhost/equiza/S0FU;8RRH}G&';
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "quiza";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}

?>