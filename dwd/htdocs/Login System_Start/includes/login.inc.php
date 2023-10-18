<?php
if (!isset($_POST['login-submit'])) :
    exit('File cannot be directly accessed.');
endif;
require "./connection.inc.php";
// define POST data variables
$email = $_POST['mailuid'];
$password = $_POST['pwd'];
// Start validation
if (empty($email) || empty($password)) :
    header("Location: ../login.php?error=emptyFields");
// Validate email format
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
    header("Location: ../login.php?error=invalidemail&uid=" . $email);
else :
    // Validation passed, continue with authentication

    // check if the email exists in the database
    $sql = "SELECT id, email, pwd, username FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) :
        // verify the password
        if (password_verify($password, $user['pwd'])) :
            session_start();
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userEmail'] = $user['email'];
            $_SESSION['userUsername'] = $user['username']; // Store the username in the session
            header("Location: ../index.php?loggedIn=true");
            exit();
        else :
            header("Location: ../index.php?error=emailPasswordInvalid=true");
            exit();
        endif;
    else :
        header("Location: ../index.php?error=emailPasswordInvalid=true");
        exit();
    endif;
endif;
