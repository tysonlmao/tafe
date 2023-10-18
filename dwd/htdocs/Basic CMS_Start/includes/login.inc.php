<?php
  // 1. Check user clicked submit button on Login Form
  if(isset($_POST['login-submit'])){

    // 2. Connect to database
    require './connect.inc.php';

    // 3. Collect & store the POST username + password in variables
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    // 4. Check username and password fields are not blank
    if(empty($mailuid) || empty($password)){
      header("Location: ../index.php?loginerror=emptyfields"); 
      exit();
    }
    
    // 5. Check if User Exists in Database WHERE No Form Error (Using Prepared Statements in OOP)
    // (i) Declare SQL for finding the user in the database
    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?"; 

    // (ii) Init SQL statement
    // OOP CLASS: MYSQLI_STMT - https://www.php.net/manual/en/class.mysqli-stmt.php
    $statement = $conn->stmt_init();

    // (iii) Prepare + send statement to database to check for errors
    if(!$statement->prepare($sql)) {
      header("Location: ../index.php?loginerror=sqlerror"); 
      exit(); 
    }

    // (iv) SUCCESS: Bind our user data with statement & run SQL statement 
    $statement->bind_param("ss", $mailuid, $mailuid);

    // (v) Execute the SQL Statement with user data
    $statement->execute();

    // (vi) Return result & store in variable
    $result = $statement->get_result();       

    // 6. Check $result to see if a user EXISTS in DB
    // OOP CLASS: MYSQLI_RESULT - https://www.php.net/manual/en/class.mysqli-result.php 
    if($row = $result->fetch_assoc()){
      // (i) Matching user -> compare password in form to encrypted password in DB
      $pwdCheck = password_verify($password, $row['pwdUsers']);

      // (ii) ERROR: User exists - BUT Password is NOT a match using bcrypt
      if(!$pwdCheck){
        header("Location: ../index.php?loginerror=wrongpwd");
        exit(); 

      } else {
        // (iii) User exists + Password match = START LOGGED IN SESSION
        // NOTE: To save data which can be accessed on DIFFERENT pages and user stays logged in!
        session_start();

        // Add logged in user data to $_SESSION to access around our application
        $_SESSION['userId'] = $row['idUsers']; 
        $_SESSION['userUid'] = $row['uidUsers']; 

        // (iv) Redirect on success
        header("Location: ../index.php?login=success");
        exit(); 
      }
    } else {
      // (v) ERROR: No user was found in DB
      header("Location: ../index.php?loginerror=nouser");
      exit(); 
    }
  } else {
    // ERROR: User has NOT submitted the form correctly
    header("Location: ../index.php?loginerror=forbidden");
    exit();
  }
?>