<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <p>setting and calling cookies</p>
    <?php
        setcookie(
            "cookie1",
            "hello",
            time() + (86400 * 30),
            "/",
            false,
            0
        );
    ?>
</body>
</html>