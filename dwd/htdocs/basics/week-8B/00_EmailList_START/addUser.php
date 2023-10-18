<?php

function addUser() {
    try {
        $connect = new PDO('mysql:host=localhost;dbname=emailListDb', 'root', 'root');
    } catch(PDOException $e){
        echo "Error connecting...";
    }

    $fname = strval($_GET['fname']); 
    $lname = $_GET['lname'];
    $email = $_GET['email'];

    $query = $connect->query("INSERT INTO tblEmailList(id, fname, lname, email) VALUES (NULL,'$fname','$lname','$email')");

    if($query):
        echo "Form submission succesful";
    endif;
}

addUser();
