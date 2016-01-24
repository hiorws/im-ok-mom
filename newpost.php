<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST["submit"])) {
    if (empty($_POST['post_context'])) {
        $error = "Username or Password is invalid";
    }
    else
    {

        $login_username = $_SESSION['username'];
        $context = $_POST['post_context'];
        $access = $_POST['option'];

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

        $post_text_sql = "INSERT INTO posts VALUES(NULL, '$login_username', '$context', '$access')";

        # $sql = "select * from users where password = '$login_password' AND username='$login_username'";

        $result = mysqli_query($conn, $post_text_sql);
        echo $result;
        # echo "Hello";
        if($result){
            mysqli_close($conn);
            header('Location: index.php'); // Redirecting To Home Page
        }

    }
}
else{
    echo "Validate form!";

}
