<?php
require_once("templates/header.php");
?>
<head>
    <title>Contact ~ I'm OK Mom!</title>
</head>

<div id="content">
    <h2>Contact with mail</h2>
    <h2>Send e-mail to someone@example.com:</h2>

    <form action="MAILTO:someone@example.com" method="post" enctype="text/plain">
        Name:<br>
        <input type="text" name="name" placeholder="Name"><br>
        E-mail:<br>
        <input type="text" name="mail" placeholder="e-mail"><br>
        Comment:<br>
        <input type="text" name="comment" value="" size="50"><br><br>
        <input type="submit" value="Send">
        <input type="reset" value="Reset">
    </form>

</div>

<?php
require_once("templates/footer.php");
?>
