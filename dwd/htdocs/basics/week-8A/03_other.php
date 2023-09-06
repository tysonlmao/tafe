<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session page 2</title>
</head>
<body>
    <h2>session page 2</h2>
    <?php  echo '<p>'.session_id().'</p>'; 
    if(!isset($_SESSION['username'])) {
        echo "not logged in";
    } else {
        echo "Welcome ".$_SESSION['username']."!";
    }
    
    ?>


</body>
</html>