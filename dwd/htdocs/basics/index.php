<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php syntax</title>
</head>
<body>
    <h2>syntax!</h2>
    <?php
    /**
     * 2023-07-09
     * Session 4A
     */
    $x = "<h2>hi</h2>";
    echo $x;
    // print vs echo
    $var = "<p>yes</p>"; 
    print $var;
    // . concatenate
    echo "<p>My name is "."tyson </p>";
    // escape char
    echo '<p>you\'re</p>';

    // ACTIVITY NO.1
    // Using echo and \ output the following string.
    // Output: th'*'%$@'+_\\><'
    echo "<p style=\"color: red;\">ACTIVITY N0.1</p>";
    echo 'th\'*\'%$@\'+_\\\\><\'';

    // ACTIVITY NO.2
    // Write a small app calculating how many seconds old you are.
    function howOld(int $age) {
        $age_in_seconds = $age * 365 * 24 * 60;
        return $age_in_seconds;
    }
    ?>
    <p><?php echo howOld(17); ?></p>

</body>
</html>
