<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditionals</title>
</head>
<body>
    <?php
    /**
     * @author tysonlmao
     * 2023-08-16
     */

    // ACTIVITY NO.4
    // Write your own if statement.
    // If Alex's age is greater than or equal to 30, echo a string saying "Alex is getting old!"
    $alex = 31;
    if ($alex > 30) {
        // echo '<p>Alex is getting old</p>';
    }

    // combining operators
    $age = 18;
    // if($age != 18 || $age < 18) {
    if($age >= 18) {
        // echo "ur bad, no alcohol for u";
    }

    // if else statement
    $foo = "John";
    $bar = "Doe";
    if ($foo != "John") {
        return 0;
    } else {
        // echo "<p>🔥</p>";
    }
    
    // else if 
    $yea = 17;
    if ($yea === 19) {
        $result = "is 19";
    } elseif ($yea == 19) {
        $result =  "really not equal";
    } else {
       $result = "not 19";
    }

    echo '<p>'.$result.'</p>';

    ?>

    
        
</body>
</html>