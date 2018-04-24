


<?php

date_default_timezone_set('Etc/GMT+5');
/*
 * Insert image data into database
 */
//DB details
$dbHost     = 'localhost';
$dbUsername = 'csmel';
$dbPassword = 'goaway@2014';
$dbName     = 'creativesakasdb';

// set parameters
$name=$_POST['name'];
$comment=$_POST['comment'];

$dateVal= date("ymd");
$timeVal= date("H:i");

//Create connection and select DB
$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]['tmp_name']);
    if ($check !== false) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        if ($_FILES["image"]['size'] > 100000) {
            echo "<br>Sorry, your file is too large!<br>";
        } else {
            // insert data into database(prepared and binded)
            $insert = $connection->prepare("INSERT INTO  commenter (name, comment, dateVal, timeVal, image) VALUES (?, ?, ?, ?, ?)");
            $null = null;
            $insert->bind_param("ssssb", $name, $comment, $dateVal, $timeVal, $null);
            $insert->send_long_data(4, file_get_contents($_FILES["image"]['tmp_name']));
            $insert->execute();
            if ($insert) {
                echo "File uploaded successfully.";
                echo '<script>';
                echo 'window.location = "login";';
                echo '</script>';
            } else {
                echo "File upload failed, please try again.";
            }
        }
    }
}

?>
