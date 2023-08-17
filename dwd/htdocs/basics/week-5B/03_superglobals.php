<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>superglobals</title>
</head>
<body>
    <h2>Superglobals</h2>

    <?php 
    function add() {
        $GLOBALS['result'] = $GLOBALS['num1'] + $GLOBALS['num2'];
    }

    ?>      
</body>
</html>