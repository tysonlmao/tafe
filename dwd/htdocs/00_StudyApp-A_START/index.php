<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles.css">
  <title>StudyTime</title>
</head>
<body>
  <!-- Navbar -->
  <nav>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>StudyTime</h3>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
          <ul>
            <li>
              <a href="index.php" class="text-white">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main Container -->
  <div id="container" class="mt-5">
    <!-- INSERT FORM HERE! -->
    <div class="text-center">
      <h2 class="main-primary">StudyTime</h2>
      <p>For the organised late-night student!</p>
    </div>
    <form action="./connection.php" method="POST">
      <div class="mb-3">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" class="form-control" name="fname">
      </div>
      <div class="mb-3">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lname">
      </div>
      <div class="mb-3">
        <label for="theDate" class="form-label">Date</label>
        <input type="date" class="form-control" name="theDate">
      </div>
      <div class="mb-3">
        <label for="durationStudy" class="form-label">Duration of Study</label>
        <input type="number" class="form-control" name="durationStudy">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <div>
        <p>For further information on StudyTimeApp, see our <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Terms and Conditions</a></p>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>