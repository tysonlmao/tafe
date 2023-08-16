<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operators</title>
</head>
<body>
    <h2>operators</h2>
    <?php
        // ARITHMATIC
        echo $add = 1 + 1;
        echo $expo = 10 ** 3; // to the power of

        // ASSIGNMENT
        $foo = 1;
        $foo = $foo + 1;
        echo $foo;
        // COMPARISON
        $w = 1;
        $y = "1";
        var_dump($w === $y);
        var_dump(!$w);
        
        if (!$w) {
            return;
        }
        // LOGICAL
        $test = $w == $w && $y == $y;
        var_dump($test);
    ?>
</body>
</html>