<?php

// bail early
if (!isset($_POST['signup-submit'])) {
    exit('File cannot be directly accessed.');
}
// Connect to the database
require "./connection.inc.php";

$username = $_POST['uid'];
$email = $_POST['mail'];
$password = $_POST['pwd'];
$passwordRepeat = $_POST['pwd-repeat'];

// start Validation
// check for empty fields
if (empty($username) || empty($password) || empty($passwordRepeat)) :
    header("Location: ../signup.php?error=emptyFields");
// validate username
elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) :
    header("Location: ../signup.php?error=invalidusername&mail=" . $email . "&username=" . $username);
// validate if email address is valid
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
    header("Location: ../signup.php?error=invalidemail&uid=" . $username);
elseif ($password !== $passwordRepeat) :
    header("Location: ../signup.php?error=passwordMismatch&uid=" . $username);
else :
    // check if the username is already taken
    $sql_check_username = "SELECT username FROM users WHERE username = :username";
    $stmt_check_username = $pdo->prepare($sql_check_username);
    $stmt_check_username->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt_check_username->execute();

    if ($stmt_check_username->rowCount() > 0) :
        header("Location: ../signup.php?error=usernameTaken");
    else :
        // Username is not taken, proceed with registration
        $sql = "INSERT INTO users (username, email, pwd) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

        try {
            $stmt->execute();
            header("Location: ../signup.php?signup=success");
        } catch (PDOException $e) {
            header("Location: ../signup.php?error=sqlerror");
        }
    endif;
endif;
