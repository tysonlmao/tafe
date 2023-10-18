<?php
// 1. Declare Database Config Variables
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "loginsystem";

try {
  // 2. Create a new PDO connection
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  // Set PDO in exception mode to handle errors
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die('<div class="alert alert-warning mt-3" role="alert"><h4>Connection Failed<h4>' . $e->getMessage() . '</div>');
}
