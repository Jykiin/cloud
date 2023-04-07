<?php
function connectDB(userN, passwordN,dbNameN){
$host = "localhost";
$user = $userN;
$password = $passwordN;
$dbname = $dbNameN;

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
}
?>