<!-- START NEW SESSION -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap 5.0 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- External CSS -->
  <link rel="stylesheet" href="./styles.css">

  <title>RocketPOST</title>
</head>
<body>
  <!-- Header: START -->
  <header class="container">
    <div id="logo" class="text-center">
      <img src="./img/rocket.svg" alt="rocket">
      <h1>Rocket<span>POST<span></h1>
    </div>

    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="posts.php">Posts</a>
      </li>

      <!-- CONDITIONAL NAV-LINKS -->
      <?php 
        // LOGGED IN STATE (Createpost link + Logout button)
        if(isset($_SESSION['userId'])){
          echo '<li class="nav-item">
            <a class="nav-link" href="createpost.php">Create Post</a>
          </li>
          <li class="nav-item">
            <form action="includes/logout.inc.php" action="POST">
              <button type="submit" class="btn btn-primary w-100" name="logout-submit">Logout</button>
            </form>
          </li>';
        }

        // LOGGED OUT STATE (Signup link + Login modal button)
        else {
          echo '<li class="nav-item">
            <a class="nav-link active" href="signup.php">Signup</a>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login-modal">
              Login
            </button>
          </li>';
        }
      ?>  
    </ul>
  </header>
  <!-- Header: END -->

  <!-- Login Modal: START -->
  <div class="modal fade" id="login-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>

        <!-- login.inc.php - Will process the data from this form-->
        <div class="modal-body">
          <form action="includes/login.inc.php" method="POST">
            <div class="mb-3">
              <label for="email" class="col-form-label">Email address:</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="mailuid" placeholder="Email Address">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="mb-3">
              <label for="password" class="col-form-label">Password:</label>
              <input type="password" class="form-control" id="password" name="pwd" placeholder="Password"></input>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary w-100" name="login-submit">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Modal: END -->

  <!-- Login Error Message from GET: START -->
  <section class="container mt-3">
    <?php
      // Check $_GET to see if we have any login error messages 
      if(isset($_GET['loginerror'])){
        // (i) Empty fields in Login 
        if($_GET['loginerror'] == "emptyfields"){
          $errorMsg = "Please fill in all fields";

        // (ii) 500 ERROR: SQL Error
        } else if ($_GET['loginerror'] == "sqlerror"){
          $errorMsg = "Internal server error - please try again later";

        // (iii) uidUsers / emailUsers do not match
        } else if ($_GET['loginerror'] == "nouser"){
          $errorMsg = "[DEV] The user does not exist";
          // $errorMsg = "Incorrect credentials";
        
        // (iv) Password does NOT match DB 
        } else if ($_GET['loginerror'] == "wrongpwd"){
          $errorMsg = "[DEV] Wrong password";
          // $errorMsg = "Incorrect credentials";
          
        // (iii) loginerror=forbidden
        } else if($_GET['loginerror'] == "forbidden"){
          $errorMsg = "Please submit form correctly";
        }
        // ERROR CATCH-ALL: Display alert with dynamic error message
        echo '<div class="alert alert-danger" role="alert">' . $errorMsg . '</div>';

      } else if (isset($_GET['login']) == "success"){
        // SUCCESS: User login successful message
        echo '<div class="alert alert-primary" role="alert">Welcome ' . $_SESSION['userUid'] . '</div>';    
      }
    ?>
  </section>
  <!-- Error Message from GET: END -->