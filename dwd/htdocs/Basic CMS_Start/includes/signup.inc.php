<?php 
  // 1. Check the user click the submit button from signup form
  if(isset($_POST['signup-submit'])){

    // 2. Connect to database
    require './connect.inc.php';

    // 3. Collect & store the POST information in variables
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    // Strong password REGEX
    $pwdReg = "/^(?=.*[0-9])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/";

    // 4. VALIDATION: 
    // (i) Check if any fields are empty
    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
      header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
      exit(); 
    
    // (ii) Check for BOTH invalid email AND password syntax (uses A to Z & 0 to 9) 
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../signup.php?error=invalidmailuid");
      exit(); 

    // (iii) Checks JUST if the username is invalid ONLY
    } else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../signup.php?error=invaliduid&mail=".$email);
      exit();

    // (iv) Checks JUST if the email is invalid ONLY
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup.php?error=invalidmail&uid=".$username);
      exit(); 

    // (NEW) Password check
    } else if(!preg_match($pwdReg, $password)){
      header("Location: ../signup.php?error=invalidpwd&uid=" . $username . "&mail=" . $email);
      exit();

    // (v) Checks if password has NOT been confirmed correctly
    } else if($password !== $passwordRepeat){
      header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
      exit();  

    // -- VALIDATION COMPLETE - REMAINDER OF CODE RUNS --
    } else {
      // 5. Check if User Exists in Database (Prepared Statements)
      // (i) Declare Template SQL with ? Placeholders to find user in DB
      $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
  
      // (ii) Init SQL statement
      $statement = $conn->stmt_init();
  
      // (iii) Prepare + send statement to database to check for errors
      if(!$statement->prepare($sql)){
        header("Location: ../signup.php?error=sqlerror"); 
        exit();
      } 
  
      // (iv) SUCCESS: Bind our user data with statement + escape strings
      $statement->bind_param("s", $username);
  
      // (v) Execute the SQL Statement with user data
      $statement->execute();
  
      // (vi) Return result & store inside the $statement
      $statement->store_result();

      // (vii) Check how many rows of results were returned
      $resultCheck = $statement->num_rows();
      if($resultCheck > 0){
        // ERROR: If User Exists - pass back error
        header("Location: ../signup.php?error=usertaken&mail".$email); 
        exit(); 

      // 6. SUCCESS: No user exists
      } else {
        // (i) Declare Template SQL with ? Placeholders to Save User Data to DB
        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
    
        // (ii) Init SQL statement
        $statement = $conn->stmt_init();
    
        // (iii) Prepare + send statement to database to check for errors
        if(!$statement->prepare($sql)){
          header("Location: ../signup.php?error=sqlerror");
          exit(); 
        }

        // (iv) SUCCESS: Hash password prior to binding & saving
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    
        // (v) Bind our user data with statement + escape strings
        $statement->bind_param("sss", $username, $email, $hashedPwd);
    
        // (vi) Execute the SQL Statement with user data
        $statement->execute();
    
        // (vii) SUCCES: Pass back user with SUCCESS message 
        header("Location: ../signup.php?signup=success"); 
        exit();
      }
    }
    // 7. Close prepared statement & DB connection
    $statement->close();  //Closes the statement
    $conn->close();  //Closes the connection to DB

  // 8. Restrict Access to Script Page
  } else {
    header("Location: ../signup.php?error=forbidden");
    exit(); 
  }
?>