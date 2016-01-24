<?php
session_start();


// load up your config file
// require_once("/path/to/resources/config.php");

require_once("templates/header.php");
?>
<head>
    <title>Logout ~ I'm OK Mom! </title>
</head>

<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
    // header("Location: index.php"); // Redirecting To Home Page
    echo "<script> location.replace('index.php'); </script>";
}
?>
<div id="content">
    <h2>Logout!</h2>

    <h3>You are successfully logged out. Click <a href="index.php">here </a>to visit home page</h3>

</div>


<?php
require_once("templates/footer.php");
?>
