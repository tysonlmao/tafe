<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$x = "<p>hello world</p>";
// STRING METHODS
echo strlen($x);
echo str_replace("world", "alex", $x);
echo strtoupper($x);

// MATH METHODS
echo round(8.3); // round float to 1 point number
echo rand()
?>
</body>
</html>