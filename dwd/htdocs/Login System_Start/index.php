<?php
session_start(); // Ensure session is started
include "./templates/header.php";
?>

<main class="container mt-3 p-4 bg-light">
  <?php
  if (isset($_GET['loggedIn']) && $_GET['loggedIn'] == 'true') {
    if (isset($_SESSION['userUsername'])) {
      $username = $_SESSION['userUsername'];
      echo "Howdy, $username";
    } else {
      echo "Howdy, fellow user!"; // Provide a default if username is not set
    }
  } else {
    echo "Welcome to Rocket<b>Posts</b> home page";
    if (isset($_SESSION['userUsername'])) :
      $username = $_SESSION['userUsername'];
      echo "<br> Howdy, $username";
    endif;
  }
  ?>

</main>

<!-- FOOTER.PHP -->
<!-- Flaticon Attribution -->
<?php include "./templates/footer.php" ?>
<!-- Bootstrap Script Bundle -->