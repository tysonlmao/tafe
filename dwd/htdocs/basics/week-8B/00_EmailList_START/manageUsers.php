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
        <!-- Nav: START -->
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
    <!-- Navbar: END -->
    <div class="container">
        <?php 
            try {
                $connect = new PDO('mysql:host=localhost;dbname=emailListDb', 'root', 'root');
            } catch(PDOException $e){
                echo "Error connecting...";
            }
            
            $sql = "SELECT id, fname, lname, email  FROM tblEmailList;";
            $result = $connect->query($sql);
        ?>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">fname</th>
        <th scope="col">lname</th>
        <th scope="col">email</th>
        <th scope="col">update</th>
        <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->rowCount() > 0) :
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>
                    <th scope="row">' . $row['id'] . '</th>
                    <td>' . $row['fname'] . '</td>
                    <td>' . $row['lname'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td><a class="btn btn-primary" href="./updateUser.php?id=' . $row['id'] . '">Update</a></td>
                    <td><a class="btn btn-danger" href="./deleteUser.php?id=' . $row['id'] . '">Delete</a></td>
                </tr>';
            }
        endif;
        ?>
    </tbody>
    </table>
    </div>

    </body>
    </html>