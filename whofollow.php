<?php
session_start();// Starting Session

$host = "localhost";
$username = "ozgurkod_root";
$password = "Ok!!MoM456_imokmom";
$db_name = "ozgurkod_imokmom";


// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "root");

// Create connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully.\n";
// Storing Session

$user_check= $_SESSION['username'];


// SQL Query To Fetch Complete Information Of User
// $ses_sql=mysqli_query($connection, "select username from users where username='$user_check'");
$sql = "SELECT follower from follows where followed = '$user_check' and accepted = '0'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if ($result = mysqli_query($conn, $sql)){

    echo '<h2>Search results:</h2>';
    echo "</br>";
    echo "<table>";
    //header
    echo "<tr align='middle'>";
    echo "</br></br>";
    echo "<td width='10%'>Username</td>";
    echo "<td>Access Level</td>";
    echo "<td>Follow Request</td>";
    echo "</tr>";

    //data
    while ($row = mysqli_fetch_array($result))  {
        echo "<tr align='middle'>";
        echo "<td><h2>{$row[0]}</h2></td>";
        echo "<td><form action='giveaccess.php' method='get'>";
        echo "<select name='option'>";
        echo "<option value='0'>0 (Public)</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<input type='hidden' value='{$row[0]}' name='follower_who'>";
        echo "</select><input type='submit' value='Give Access' name='submit'></form></td>";

        // echo "<td><h2><form action='follow.php' method='get'><input type='hidden' name='follow_who' value='{$row[0]}'><input type='hidden'><input type='submit' value='+' name='follow'></h2></td>";
        echo "</tr>";

    }
    echo "</table>";
    echo "</br></br></br><h4><a href='index.php'>Return Home</a></h4>";
}

mysqli_free_result($result);
mysqli_close($conn);

