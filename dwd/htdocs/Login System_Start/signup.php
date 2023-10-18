  <?php include "./templates/header.php" ?>
  <main class="container p-4 bg-light mt-3">

    <!-- signup.inc.php - Will process the data from this form-->
    <form action="./includes/signup.inc.php" method="POST">
      <h2>Signup</h2>
      <?php
      if (isset($_GET['error'])) :
        // handle empty fields
        if ($_GET['error'] == 'emptyFields') :
          $error_message = "Please fill in all fields";
          echo '<div class="alert alert-danger">' . $error_message . '</div>';
        elseif ($_GET['error'] == 'invalidusername') :
          $error_message = "Invalid username. Please enter a valid username";
          echo '<div class="alert alert-danger">' . $error_message . '</div>';
        elseif ($_GET['error'] == 'invalidemail') :
          $error_message = "Please enter a valid email address.";
          echo '<div class "alert alert-danger">' . $error_message . '</div>';
        elseif ($_GET['error'] == 'passwordMismatch') :
          $error_message = "Passwords do not match.";
          echo '<div class="alert alert-danger">' . $error_message . '</div>';
        elseif ($_GET['error'] == 'usernameTaken') :
          $error_message = "Username already taken.";
          echo '<div class="alert alert-danger">' . $error_message . '</div>';
        elseif ($_GET['error'] == 'sqlerror') :
          $error_message = "SQL Server Error. Please contact the system administrator.";
          echo '<div class="alert alert-danger">' . $error_message . '</div>';
        endif;

      elseif (isset($_GET['signup'])) :
        $message = 'Registration successful</a>';
        echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
      endif;
      ?>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>">
      </div>
      <div class="mb-3">
        <div class="row">
          <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="passwordConfirm" class="form-label">Confirm password</label>
            <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control">
          </div>
        </div>
        <div id="emailHelp" class="form-text text-white">Password must contain 8 digits, a capital letter, a number, and a special character</div>
      </div>
      <button type="submit" class="btn btn-primary" name="register-submit">Submit</button>
    </form>
  </main>
  <?php include "./templates/footer.php" ?>