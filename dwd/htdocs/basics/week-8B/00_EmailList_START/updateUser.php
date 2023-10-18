<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap 5.0 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- FontAwesome Kit -->
    <script src="https://kit.fontawesome.com/3956b000b9.js" crossorigin="anonymous"></script>
    <title>Email List</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <h1><i class="fas fa-envelope"></i> Email List</h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="index.php">Add User</a>
          <a class="nav-link" href="manageUsers.php">Manage Users</a>
          <a class="nav-link" href="emailUsers.php">Email Users</a>
        </div>
      </div>
    </div>
  </nav>
  <?php 
    try {
        $connect = new PDO('mysql:host=localhost;dbname=emailListDb', 'root', 'root');
    } catch(PDOException $e){
        echo "Error connecting...";
    }
    
    // $sql = "SELECT id, fname, lname, email  FROM tblEmailList;";
    // $result = $connect->query($sql);
 
    if (!empty($_GET['id'])):
        $id = $connect->prepare($_GET['id']);
    endif;
?>
<div class="container">
    
    <form class="row align-items-center gx-3 gy-2" method="GET" action="./addUser.php">
        <div class="col-sm-3">
            <label class="visually-hidden" for="fname">First Name</label>
            <input type="text" class="form-control" placeholder="First Name" name="fname" value="fname">
        </div>
        <div class="col-sm-3">
            <label class="visually-hidden" for="lname">Last Name</label>
            <input type="text" class="form-control" placeholder="Last Name" name="lname" value="lname">
        </div>
        <div class="col-sm-3">
            <label class="visually-hidden" for="email">Email</label>
            <input type="text" class="form-control" placeholder="Email" name="email" value="email">
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</body>
</html>