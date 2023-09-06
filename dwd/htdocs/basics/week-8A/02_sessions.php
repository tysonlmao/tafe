<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
</head>
<body>
    <h2>Sessions</h2>
    <?php
    echo "<p>" . session_id() . "</p>";
    
    $_SESSION['username'] = "tysonlmao";
    echo "<p>" . $_SESSION['username'] . "</p>";
    
    ?>

    <a href="./03_other.php">to other page</a>
</body>
</html>