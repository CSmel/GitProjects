<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Creative Sakas: Resume</title>
    <meta content="Melanie Sakas" name="author">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">

</head>

<body>

        <section>
          <?php
/*
 * Insert image data into database
 */

//DB details
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'githubDatabase';
$username = $_POST['loginName'];
$password = $_POST['loginPW'];




//Create connection and select DB
$connection = new PDO('mysql:host=localhost;dbname=githubDatabase', $dbUsername, $dbPassword);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $verify = $connection->prepare("SELECT userAdmin From user WHERE userAdmin =?");

    $verify->bindValue(':loginName', $username, PDO::PARAM_STR);
    $verify->execute(array($_POST['loginName']));

    if ($verify->fetchColumn() == $_POST['loginName']) {
        echo'Username was valid!<br> Hey, ' . $username;
        echo'  <form action="updateVerUpload.php" method="post" enctype="multipart/form-data">';
        echo'  <h1>Comments</h1>';
        echo' <div class="row">';
        echo'<div class="col justify-content-start">';
        echo '<label for="name">';
        echo 'Name';
        echo '</label></div>';
        echo'<div class="col"><input id="name" type="text" name="name" maxlength="13"></div>';
        echo'  </div>';
        echo'<div class="row">';
        echo'<div class="col">';
        echo'<label for="name">';
        echo 'Review';
        echo'</label>';
        echo '</div>';
        echo'<div class="col">';
        echo '<input id="comment" type="text" name="comment" maxlength="240" size="30">';
        echo '</div>';
        echo'</div>';

        echo'    <div class="row">';
        echo'<div class="col"><label for="upload">Select image to upload:</label></div>';
        echo'<div class="col"><input  type="file" id="myDropZone" name="image" value="UPLOAD"/></div>';
        echo'    <div class="col"><input  type="submit" id="submit-all" name="submit" value="UPLOAD"/>';
        echo'        </div>';
        echo'    </div>';

        echo'    </form>';
    } else {
        echo 'OOPS- Wrong username, try again.';
    }
}

$connection=null;

?>
</section>

</body>

</html>
