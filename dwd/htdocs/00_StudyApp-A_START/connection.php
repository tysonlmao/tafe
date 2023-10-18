<?php 

try {
    $connect = new PDO('mysql:host=localhost;dbname=studyAppDb', 'root', 'root');
} catch(PDOException $e) {
    die("There was an error connecting to the server: $e");
}

$fname = strval($_POST['fname']);
$lname = strval($_POST['lname']);
$theDate = $_POST['theDate'];
$durationStudy = abs((int) $_POST['durationStudy']);

$query = $connect->query("INSERT INTO studyTbl(id, fname, lname, theDate, durationStudy) VALUES (NULL, '$fname', '$lname', '$theDate', '$durationStudy')");

if ($query):
    echo "Form submitted successfully";
endif;