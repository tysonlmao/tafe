<!-- HEADER.PHP -->
<?php 
  require "./templates/header.php"
?>

  <main class="container p-4 bg-light mt-3">
    <form action="includes/signup.inc.php" method="POST">
      <h2>Signup</h2>
      <!-- SIGNUP MESSAGES -->
      <?php
        // 1. VALIDATION: If error/success in $_GET - dsiplay appropriate message
        if(isset($_GET['error'])){

          // (i) Empty fields validation 
          if($_GET['error'] == "emptyfields"){
            $errorMsg = "Please fill in all fields";

          // (ii) Invalid Email AND Password
          } else if ($_GET['error'] == "invalidmailuid") {
            $errorMsg = "Invalid email and Password";

          // (iii) Invalid Email
          } else if ($_GET['error'] == "invalidmail") {
            $errorMsg = "Invalid email";

          // (iv) Invalid Username
          } else if ($_GET['error'] == "invaliduid") {
            $errorMsg = "Invalid username";

          // (NEW) Invalid Password
          } else if ($_GET['error'] == "invalidpwd") {
            $errorMsg = "Invalid password - you need to create a password with at least 1 capital letter, 1 number & 1 special character";

          // (v) Password Confirmation Error
          } else if ($_GET['error'] == "passwordcheck") {
            $errorMsg = "Passwords do not match";

          // (vi) Username MATCH in database on save
          } else if ($_GET['error'] == "usertaken") {
            $errorMsg = "Username already taken";

          // (vii) Internal server error 
          } else if ($_GET['error'] == "sqlerror") {
            $errorMsg = "An internal server error has occurred - please try again later";
          
          // Echo Back Danger Alert with the Dynamic Error Message as we definitely have an error!
          }
          echo '<div class="alert alert-danger" role="alert">' . $errorMsg . '</div>';
        
        // 2. SUCCESS MESSAGE: Successful sign up to DB
        } else if (isset($_GET['signup']) == "success") {
          echo '<div class="alert alert-success" role="alert">You have successfully signed up!</div>';    
        }
      ?>

      <!-- 1. USERNAME -->
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <!-- (i) If an invalid email - echo back the correct username (uid) -->
        <input 
          type="text" 
          class="form-control" 
          name="uid" 
          placeholder="Username" 
          value=<?php if(isset($_GET['uid'])){ echo($_GET['uid']); }?> 
        >
      </div>  

      <!-- 2. EMAIL -->
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <!-- (ii) If an invalid username - echo back the correct email (mail) -->
        <input 
          type="email" 
          class="form-control" 
          name="mail" 
          placeholder="Email Address" 
          value=<?php if(isset($_GET['mail'])){ echo $_GET['mail']; }?> 
        >
      </div>

      <!-- 3. PASSWORD -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="pwd" placeholder="Password">
      </div>

      <!-- 4. PASSWORD CONFIRMATION -->
      <div class="mb-3">
        <label for="password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="pwd-repeat" placeholder="Confirm Password">
      </div>

      <!-- 5. SUBMIT BUTTON -->
      <button type="submit" name="signup-submit" class="btn btn-primary w-100">Signup</button>
    </form>
  </main>

<!-- FOOTER.PHP -->
<?php 
  require "./templates/footer.php"
?>