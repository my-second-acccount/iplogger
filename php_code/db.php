<?php
$servername = "db"; // this if the app is running in container
//$servername = "localhost";
$username = "admin";
$password = "pass";

try {
  $conn = new PDO("mysql:host=$servername;dbname=ip_grabber", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
