<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=rocketPostDb', 'root', 'root');
} catch(PDOException $e) {
    die("Error connecting to the server: $e");
}
?>