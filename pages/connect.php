<?php
$serverdb = "localhost";
$userdb = "root";
$passdb = "";
$namedb = "tugas_web_pro";
// Create connection
$conn = mysqli_connect($serverdb, $userdb, $passdb, $namedb);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>