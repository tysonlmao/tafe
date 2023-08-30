<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic submit</title>
    <style>
        form {
            margin: 1rem 0;
        }
    </style>
</head>
<body>
    <h2>basic form submit</h2>

    <!-- via url query paramaters -->
    <form method="GET">
        <input type="hidden" name="q" value="John Doe">
        <button type="submit">GET</button>
    </form>

    <form method="POST">
        <input type="hidden" name="message" value="Hidden post value">
        <button type="submit">POST</button>
    </form>

    <?php
        echo "<p>Submitted get data: ". $_GET['q']. "</p>";
        echo "<p>Submitted post data: ". $_POST['message']. "</p>";

    ?>
</body>
</html> 