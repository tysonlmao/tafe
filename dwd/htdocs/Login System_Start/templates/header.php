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

  <header class="container">
    <div id="logo" class="text-center">
      <img src="./img/rocket.svg" alt="rocket">
      <h1>Rocket<span>POST<span></h1>
    </div>

    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" href="./index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./posts.php">Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="./create-post.php">Create Post</a>
      </li>
      <?php
      if (isset($_SESSION['userId'])) :
        echo '
        <li class="nav-item">
          <form action="./logout.php">
            <button type="submit" class="btn btn-warning w-100">Sign out</button>
          </form>
        </li>';
      else :
        echo '<li class="nav-item">
        <a class="nav-link active" href="./signup.php">Signup</a>
      </li>
      <li class="nav-item">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login-modal">
          Login
        </button>
      </li>';
      endif;
      ?>
      <div class="errors">
        <?php
        if (isset($_GET['loginError'])) :
          if ($_GET['loginerror'] == 'forbidden') :
            $msg = "Forbidden";
            echo '<div class="alert alert-danger">' . $msg . '</div>';
          elseif ($_GET['loginerror'] == 'emptyfields') :
            $msg = "Please fill in all fields";
            echo '<div class="alert alert-danger">' . $msg . '</div>';
          elseif ($_GET['loginerror'] == 'sqlerror') :
            $msg = "SQL error, please report this to the server adminstrator";
            echo '<div class="alert alert-danger">' . $msg . '</div>';
          elseif ($_GET['loginerror'] == 'nouser') :
            $msg = "User does not exists";
            echo '<div class="alert alert-danger">' . $msg . '</div>';
          elseif ($_GET['loginerror'] == 'wrongpwd') :
            $msg = "User does not exists";
            echo '<div class="alert alert-danger">' . $msg . '</div>';
          endif;
        endif;
        ?>
      </div>
  </header>

  <!-- Login Modal: START -->
  <!-- Modal -->
  <!-- Modal -->
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
          <form action="./includes/login.inc.php" method="POST">
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