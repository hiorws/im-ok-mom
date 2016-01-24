<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_GET["follow"])) {
    if (empty($_GET['follow_who'])) {
        $error = "";
    }
    else
    {
        $follow_who = $_GET['follow_who'];
        $follow_by = $_SESSION['username'];

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

        $post_text_sql = "INSERT INTO follows VALUES('$follow_who', '$follow_by', '0', '0')";


        $result = mysqli_query($conn, $post_text_sql);
        echo $result;
        # echo "Hello";
        if($result){
            mysqli_close($conn);
            header('Location: profile.php'); // Redirecting To Home Page
        }
    }
}
else{
    echo "Validate form!";

}
