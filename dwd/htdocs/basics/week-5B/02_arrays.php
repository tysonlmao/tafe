<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>
    <h1>arrays</h1>

    <?php
    // 3. ACTIVITY NO.7
    // (a) Sort the array into a different order & echo the first colour in the array 
    // (b) See if you can figure out how to search an array (https://www.w3schools.com/php/func_array_search.asp) & search the array for the colour green & check what position it now is in
    $colours = array('red', 'green', 'blue', 'orange', 'pink', 'purple');

    $result = sort($colours); // ascending order
    foreach($colours as $value) {
        // echo '<p>'.$value.'</p>';
    }
    // echo array_search('green', $colours);
    ?>

    <?php
    // duncan
    $colours = array('stop'=>'red', 'go'=>'green', 'sky'=>'blue', 'wait'=>'orange', 'perfect'=>'pink', 'plum'=>'purple');

    ksort($colours); // ascending order
    foreach($colours as $key=>$value) {
        echo '<p>'.$key. ' - '. $value.'</p>';
    }
    if(in_array('green', $colours)) {
        echo "is green exists";
    }
    ?>
</body>
</html>