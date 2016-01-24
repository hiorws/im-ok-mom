<?php
session_start();
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $file_name = "img/" . basename( $_FILES["fileToUpload"]["name"]);
        echo "File name: \n" . $file_name;
        $uname = $_SESSION['username'];

        $host = "localhost";
        $username = "ozgurkod_root";
        $password = "Ok!!MoM456_imokmom";
        $db_name = "ozgurkod_imokmom";

        // Create connection
        $conn = new mysqli($host, $username, $password, $db_name);
        $sql = "UPDATE users SET profile_pic = '$file_name' WHERE username = '$uname'";


        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        if ($conn->query($sql) === TRUE) {
            echo "Profile picture updated.";
            mysqli_close($conn);
            header('Location: index.php'); // Redirecting To Home Page
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// SET DB TO USE NEW UPLOADED IMAGE


?>