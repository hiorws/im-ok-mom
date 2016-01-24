<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
    else
    {

        $login_username = $_POST['username'];
        $login_password = $_POST['password'];

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

        $sql = "select * from users where password = '$login_password' AND username='$login_username'";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            $_SESSION['username'] = $login_username; // Initializing Session
            // header("location: profile.php"); // Redirecting To Other Page
            echo "<script> location.replace('profile.php'); </script>";
        }

        else{
            // Invalid credentials.
            $error = "Username or Password is invalid";
        }

        $result->close();
    }
}
else{
    // echo "NO COMING DATA FROM POST!";

}
