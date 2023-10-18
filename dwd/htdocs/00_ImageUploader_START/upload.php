<?php
$dir = "./uploads";
$uploadOk = 1;
$uploadMessage = "";
$uploadMessageError = "";

// Only run when the form has been submitted
if (isset($_POST['submit'])) {
    $file = $_FILES['fileToUpload']['name'];
    $fileTempName = $_FILES['fileToUpload']['tmp_name'];
    $fileExt = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $allowedFiles = array('jpg', 'png', 'gif', 'jpeg');
    $fileSize = $_FILES['fileToUpload']['size'];
    $maxSize = 1024 * 1024 * 2; // 2MB
    $phpFileUploadErrors = array(
      0 => 'There is no error, the file uploaded with success',
      1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
      2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
      3 => 'The uploaded file was only partially uploaded',
      4 => 'No file was uploaded',
      6 => 'Missing a temporary folder',
      7 => 'Failed to write file to disk.',
      8 => 'A PHP extension stopped the file upload.',
    );
    
    $fileError = $_FILES['fileToUpload']['error'];
    if ($fileError):
      $uploadOk = 0;
      $uploadMessageError = $phpFileUploadErrors[$fileError];
    endif;

    // File directory URL
    $fdu = $dir . DIRECTORY_SEPARATOR . $file;

    // Validation
    if (file_exists($fdu)):
        $uploadMessageError = "File already exists";
        $uploadOk = 0;
    endif;

    if ($uploadOk && !in_array($fileExt, $allowedFiles)):
        $uploadOk = 0;
        $uploadMessageError = "File type is not allowed. Please choose a jpg, png, gif, or jpeg file";
    endif;

    if ($uploadOk && $fileSize > $maxSize):
        $uploadOk = 0;
        $uploadMessageError = "File exceeds size limit";
    endif;

    if ($uploadOk):
        if (move_uploaded_file($fileTempName, $dir . DIRECTORY_SEPARATOR . $file)) {
            $uploadMessage = "<p>File uploaded: <a href='" . $fdu . "'>" . $fdu . "</a></p>";
        }
      endif;

    // Construct the error/success message
    if ($uploadMessageError):
        $uploadMessage = "<div class='alert alert-danger' role='alert'>File wasn't uploaded: " . $uploadMessageError . "</div>";
     elseif ($uploadOk):
        $uploadMessage = "<div class='alert alert-success' role='alert'>File uploaded successfully: <a href='" . $fdu . "'>" . $fdu . "</a></div>";
     endif;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">

    <title>Image|Push</title>
    <style>
        h2 > span {
            font-weight: 800;
        }

        svg {
            color: orangered;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="display-4 mb-2">
            Image<span>Push</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                 class="bi bi-cloud-arrow-up-fill mb-1" viewBox="0 0 16 16">
                <path
                    d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
            </svg>
        </h2>
        <p class="lead">Select an image to upload:</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <!-- File Upload Form: START -->
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <!-- File Input -->
                    <input type="file" class="form-control" id="inputGroupFile" name="fileToUpload">
                    <!-- Submit Button -->
                    <input type="submit" value="Upload" name="submit" class="btn btn-primary input-group-text"></input>
                </div>
            </form>
            <!-- File Upload Form: END -->

            <!-- Display Upload Message -->
            <?php
            if ($uploadMessage):
                echo $uploadMessage;
            endif;
            ?>
        </div>
    </div>
</div>
</body>
</html>
