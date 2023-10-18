<?php
if (isset($_POST['post-submit'])) {
    require './connect.inc.php';

    // Store form data to local variables
    $title = $_POST['title'];
    $imageUrl = $_POST['imageurl'];
    $comment = $_POST['comment'];
    $websiteUrl = $_POST['websiteurl'];
    $websiteTitle = $_POST['websitetitle'];

    // Validation: Check for empty fields
    if (empty($title) || empty($comment)) {
        header("Location: ../createpost.php?error=emptyfields");
        exit();
    }

    // INSERT DATA into POSTS using prepared statements (PDO)
    $sql = "INSERT INTO POSTS (title, imageurl, comment, websiteurl, websitetitle) VALUES (:title, :imageurl, :comment, :websiteurl, :websitetitle)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':imageurl', $imageUrl);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':websiteurl', $websiteUrl);
    $stmt->bindParam(':websitetitle', $websiteTitle);

    if ($stmt->execute()) {
        header("Location: ../createpost.php?success=posted");
        exit();
    } else {
        header("Location: ../createpost.php?error=databaseerror");
        exit();
    }
} else {
    header("Location: ../createpost.php?error=forbidden");
    exit();
}
