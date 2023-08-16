<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Loops</title>
</head>
<body>
    <?php 
        // while loop
        $iteration = 0; // start point
        while ($iteration < 5) {
            $iteration++;
            // echo "<p>looped for $iteration</p>";
        }

        // for loop
        // starting position; ending position; increment;
        for ($i = 0; $i < 10; $i++) {
            // echo "<p>hi x$i</p>";
        }

        // for each loop
        $colours = ["red", "green", "blue"];

        for ($i = 0; $i < count($colours); $i++) {
            // echo "<p>$colours[$i]</p>";
        }
        foreach($colours as $value) {
            // echo "<p>$value</p>";
        }

        // ACTIVITY NO.5A [HINT: while!]
        // Create a loop that sings and counts down the 99 bottles of bear song
        // 99 bottles of beer on the wall ,99 bottles of beer
        // take one down pass it around ,98 bottles of beer on the wall
        // 98 bottles of beer on the wall ,98 bottles of beer...
        for ($i = 1; $i < 100; $i++) {
            // echo "<p>$i bottles of beer on the wall</p>";
        }

        // function
        function myNameIs(string $name)
        {
            return "My name is $name";
        }
        echo myNameIs("Tyson")
    ?>
</body>
</html>