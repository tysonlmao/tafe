<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM SUPER GLOBALS</title>
</head>
<body>
    <h2>FORM SUPER GLOBALS</h2>

    <?php 
        echo "<h4>Welcome ". $_GET['name']. "<h4/>";
    ?>
    <form action="./03_form-globals.php" method="GET">
    <fieldset>
      <legend>Form Data</legend>
      <!-- Name Block -->
      <p>
        <label for="name">Name: </label>
        <input type="text" name="name" />
      </p>
      <!-- Age Block -->
      <p>
        <label for="name">Age: </label>
        <input type="text" name="age" />
      </p>
      <!-- Submit Button -->
      <p>
        <input type="submit"/>
      </p>
    </fieldset>
  </form>

  <?php
    
  ?>
</body>
</html>