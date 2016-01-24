<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_GET["search_submit"])) {
    if (empty($_GET['search_submit'])) {
        $error = "Not a valid search!";
    }
    else
    {

        $search_key = $_GET['search_text'];

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


        $search_text_sql = "SELECT username, real_name FROM users WHERE username like '%$search_key%' or real_name like '%$search_key%'";


        $result = mysqli_query($conn, $search_text_sql);

        $row = mysqli_fetch_assoc($result);

        if ($result = mysqli_query($conn, $search_text_sql)){

            echo '<h2>Search results.</h2>';
            echo "</br>";
            echo "<table>";
            //header
            echo "<tr align='middle'>";
            echo "</br></br>";
            echo "<td width='10%'>Username</td>";
            echo "<td>Name</td>";
            echo "<td>Follow Request</td>";
            echo "</tr>";

            //data
            while ($row = mysqli_fetch_array($result))  {
                echo "<tr align='middle'>";
                echo "<td><h2>{$row[0]}</h2></td>";
                echo "<td><h2>{$row[1]}</h2></td>";
                echo "<td><h2><form action='follow.php' method='get'><input type='hidden' name='follow_who' value='{$row[0]}'><input type='hidden'><input type='submit' value='+' name='follow'></h2></td>";
                echo "</tr>";
            }

            echo "</table>";
        }

        mysqli_free_result($result);
        mysqli_close($conn);


        if($result){
            // mysqli_close($conn);
        //    header('Location: index.php'); // Redirecting To Home Page
        }

    }
}
else{
    echo "Validate form!";

}
