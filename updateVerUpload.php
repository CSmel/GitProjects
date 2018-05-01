<?php
session_start();
header("location:loginUser.php");
exit;
?>

<?php date_default_timezone_set('Etc/GMT+5'); ?>
<?php include 'includes/connection.php' ?>
	<?php include 'includes/nav.php';

	echo $_SESSION['loginName'];
	echo $_SESSION['loginPW'];?>
<?php
// set parameters
$name=$_POST['name'];
$comment=$_POST['comment'];
$dateVal= date("ymd");
$timeVal= date("H+:i");


$_SESSION['loginName'] = $_POST['loginName'];
$_SESSION['loginPW'] = $_POST['loginPW'];
$username = $_POST['loginName'];
$password = $_POST['loginPW'];

//Create connection and select DB
try {
    $connection = new PDO('mysql:host=localhost;dbname=creativedb', $dbUsername, $dbPassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Check connection
    if (isset($_POST["submit"])) {
        if (empty($_FILES['image']['tmp_name']) === true) {
            echo 'Please choose a file';
        } else {
            $check = getimagesize($_FILES["image"]['tmp_name']);
            if ($check !== false) {
                $image = $_FILES['image']['tmp_name'];
                $imgContent = (file_get_contents($_FILES["image"]['tmp_name']));
                if ($_FILES["image"]['size'] > 100000) {
                    echo "<br>Sorry, your file is too large!<br>";
                } else {
                    // insert data into database(prepared and binded)
                    $insert = $connection->prepare("INSERT INTO  commenter (name, comment, dateVal, timeVal, image) VALUES (?, ?, ?, ?, ?)");
                    $insert->bindParam(5, $_FILES["image"]['tmp_name'], PDO::PARAM_LOB);
                    $insert->execute(array($name, $comment, $dateVal, $timeVal,  $imgContent ));
                    if ($insert) {
                        echo "File uploaded successfully.<br> go back?";
                    } else {
                        echo "File upload failed, please try again.";
                    }
                }
            }
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$connection=null;
