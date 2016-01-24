<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_GET["submit"])) {
    if (empty($_GET['follower_who'])) {
        $error = "";
    }
    else
    {
        $follower_who = $_GET['follower_who'];
        $me = $_SESSION['username'];
        $degree = $_GET['option'];

        $host = "localhost";
        $username = "root";
        $password = "root";
        $db_name = "imokmom";

        // Create connection
        $conn = new mysqli($host, $username, $password, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // echo "Connected successfully";

        $post_text_sql = "UPDATE follows SET degree = '$degree', accepted = '1' where followed = '$me' and follower = '$follower_who'";

        $result = mysqli_query($conn, $post_text_sql);
        echo $result;
        # echo "Hello";
        if($result){
            mysqli_close($conn);
            header('Location: profile.php'); // Redirecting To Home Page
        }

        echo "Access gave.";

    }
}
else{
    echo "Validate form!";

}
