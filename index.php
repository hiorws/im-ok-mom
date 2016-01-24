<?php
require_once("templates/header.php");
?>
<head>
    <title>Homepage ~ I'm OK Mom! </title>
</head>

<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['username'])){
    header("location: profile.php");
}
?>

<div id="content">
    <div id="login">
        <h2>Login</h2>
        <form method="POST">
            <p>Username:
                <br />
                <input type="text" size=20 placeholder="username" name="username"/>
            <p>Password:
                <br />
                <input type="password" size=20 placeholder="*********" name="password"/>
                <input type="submit" name="submit" value="Login"/>
                <input type="reset" value="Clear"/>
                <span><?php echo $error; ?></span>
        </form>
    </div>
</div>


<?php
require_once("templates/footer.php");
?>
