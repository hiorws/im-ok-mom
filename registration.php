<?php
// Start the session
session_start();
?>

<?php
require_once("templates/header.php");
?>

<head>
    <title>Register ~ I'm OK Mom!</title>
</head>

<div id="content">
    <h2>Register Page</h2>
    <?php

    // foreach ($_REQUEST as $key=>$val){
    //    echo "$key == $val <br />";
    // }

    $host = "localhost";
    $username = "ozgurkod_root";
    $password = "Ok!!MoM456_imokmom";
    $db_name = "ozgurkod_imokmom";

    // Create connection
    $conn = new mysqli($host, $username, $password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // echo "Connected successfully";

    $new_username = mysqli_real_escape_string($conn, $_POST['username']);
    $new_name = mysqli_real_escape_string($conn, $_POST['name']);
    $new_email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "INSERT INTO users (user_id, username, real_name, password, e_mail) VALUES (NULL, '$new_username', '$new_name', '$new_password', '$new_email')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>Registration successfully.</h3>>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    ?>

    <h3>Update <a href="profile.php">your profile</a> and publish some news!</h3>
</div>


<?php
require_once("templates/footer.php");
?>
