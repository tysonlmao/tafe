<?php
$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'myFormDb';

$connect = mysqli_connect($server, $username, $password, $database);

if (!$connect) {
    die(mysqli_connect_error());
}

$name = mysqli_real_escape_string($connect, $_GET['name']);
$email = mysqli_real_escape_string($connect, $_GET['email']);
$regards = mysqli_real_escape_string($connect, $_GET['regards']);
$subject = mysqli_real_escape_string($connect, $_GET['subject']);

$sql = "INSERT INTO myuserdata(id, name, email, subject) VALUES (NULL,'$email','$regards','$subject')";

$result = mysqli_query($connect, $sql);
if(!$result) {
    echo "you broke it";
} else {
    echo "Form submission successful";
}
