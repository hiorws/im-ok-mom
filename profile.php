<?php
include('session.php');
// header ('Content-type: image/png');
?>

<?php
require_once("templates/header.php");
?>

<head xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <title>Homepage ~ I'm OK Mom! </title>
</head>

<div id="content">

<div id="profile_id" align="right">
    <b id="welcome">Welcome : <i><a href="profile.php">[ <?php echo $login_session; ?> ]</a></i></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>

<div id="profile_top" align="right">
<?php
    $_SESSION['username'] = $login_session;

    // Get Personal Data

    $profile_sql = "SELECT * from users where username = '$user_check'";
    $profile_ses_sql = mysqli_query($conn, $profile_sql);
    $new_row = mysqli_fetch_assoc($profile_ses_sql);

    $real_name = $new_row['real_name'];
    $e_mail = $new_row['e_mail'];
    $me = $new_row['username'];
    $pp = $new_row['profile_pic'];

    // Get new follower requests

    $followship = "SELECT Count(follower) from follows where accepted = '0' and followed = '$me'";
    $follow_query = mysqli_query($conn, $followship);
    $follow_row = mysqli_fetch_assoc($follow_query);

    foreach($follow_row as $key => $value) {
        // echo "$key is at $value";
    }

    $count_follow = $follow_row['Count(follower)'];
    echo "You have " . $count_follow. " new follow <a href='whofollow.php'> requests.</a>";

    echo <<< EOF
     <img src="$pp" width="200" height="200" align="left" alt="Profile Picture">
<h3 align="left">$real_name</br>$e_mail</h3>
EOF;

?>

</div>

</br>

<div id="profile_bottom">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:</br>
        <input type="file" name="fileToUpload" id="fileToUpload"></br>
        <input type="submit" value="Upload Image" name="submit">
    </form>
</div>

</br>

<div id="new_post" align="left" style="padding-top: 20px">
    <form id="new_post_form" action="newpost.php" method="post">
        Topic: </br>
        <textarea rows="5" cols="50" name="post_context" form="new_post_form">Enter your message here...</textarea>
        </br>
        <select name="option">
            <option value="0">0 (Public)</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <input type="submit" name="submit" value="Share!">
    </form>
</div>


<div id="timeline" align="middle">
        <?php

        // My Posts With Table
        $my_timeline_query = "SELECT DISTINCT follows.followed, posts.context from follows, posts where follows.follower = '$me' and follows.followed = posts.user AND not follows.followed = '$me' and posts.access <= follows.degree and follows.accepted = 1";

        if ($timeline_results = mysqli_query($conn, $my_timeline_query)){
            echo "</br></br></br>";
            echo "<table>";
            //header
            echo "<tr>";
            echo "<th>User</th>";
            echo "<th>Posts</th>";
            echo "</tr>";
            //data
            while ($row = mysqli_fetch_array($timeline_results))  {
                echo "<tr><td>{$row[0]}</td>";
                echo "<td>{$row[1]}</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "</br>";
        }


        ?>
</div>


<div id="my_posts" align="middle">
<?php

    // My Posts With Table
    $my_posts_query = "SELECT context, access from posts where user = '$me'";

    if ($result = mysqli_query($conn, $my_posts_query)){
        echo "</br></br></br>";
        echo "<table>";
        //header
        echo "<tr>";
        echo "<th>Your Posts</th>";
        echo "<th>Acces Level</th>";
        echo "</tr>";
        //data
        while ($row = mysqli_fetch_array($result))  {
            echo "<tr><td>{$row[0]}</td>";
            echo "<td>{$row[1]}</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</br></br></br></br></br></br>";
    }

    mysqli_free_result($result);
    mysqli_close($conn);

?>

</div>



</div>

<?php
require_once("templates/footer.php");
?>
