<?php
require_once("templates/header.php");
?>

<head>
    <title>Register ~ I'm OK Mom!</title>
</head>

<div id="content">
    <h2>Register Page</h2>
    <form action="registration.php" method="POST">
        <p>Username:
            <br />
            <input type="text" size=20 name="username"/>
        <p>Password:
            <br />
            <input type="password" size=20 name="password"/>
        <p>Name:
            <br />
            <input type="text" size=50 name="name"/>
        <p>E-mail:
            <br />
            <input type="text" size=50 name="email"/>
        <p>
            <input type=submit name="send" value="Submit"/>
            <input type=reset value="Clear"/>
    </form>
</div>


<?php
require_once("templates/footer.php");
?>
