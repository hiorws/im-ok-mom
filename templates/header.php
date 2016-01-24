<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link rel="stylesheet" type="text/css" href="static/style.css">

</head>

<body>
<div id="header">
    <?php
        if(isset($_SESSION['username'])){
            echo '<ul id="header">';
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="about.php">About</a></li>';
            echo '<li><a href="contact.php">Contact</a></li>';
            echo '<li><a href="logout.php">Logout</a></li>';
            echo '<li style="float: right"><a href="https://github.com/hiorws/im-ok-mom"><img src="img/fork.png" height="15px" width="15px"> ~ Fork on Github</a></li>';
            echo '<form action="search.php" method="get">';
            echo '<li style="float: right"><input type="submit" name="search_submit" value="Search"></li>';
            echo '<li style="float: right"><input size="50" type="text" placeholder="Search somebody" name="search_text"></form></li>';
            echo '</form>';
            echo '</ul>';
        }
        else{
            echo '<ul id="header">';
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="about.php">About</a></li>';
            echo '<li><a href="contact.php">Contact</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
            echo '<li><a href="index.php">Login</a></li>';
            echo '<li style="float: right"><a href="https://github.com/hiorws/im-ok-mom"><img src="img/fork.png" height="15px" width="15px"> ~ Fork on Github</a></li>';
            echo '</ul>';


        }
    ?>

</div>