<?php
session_start();// Starting Session

$host = "localhost";
$username = "ozgurkod_root";
$password = "Ok!!MoM456_imokmom";
$db_name = "ozgurkod_imokmom";


// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect($host, $username, $password);

// Create connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";
// Storing Session
$user_check = $_SESSION['username'];

// SQL Query To Fetch Complete Information Of User
// $ses_sql=mysqli_query($connection, "select username from users where username='$user_check'");
$sql = "SELECT username from users where username = '$user_check'";
$ses_sql = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];
if(!isset($login_session)){
    mysqli_close($connection); // Closing Connection
    // header('Location: index.php'); // Redirecting To Home Page
    echo "<script> location.replace('index.php'); </script>";
}

/*
 foreach ($a as $k => $v) {
    echo "\$a[$k] => $v.\n";
}
 * */