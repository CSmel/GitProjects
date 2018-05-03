
<section class="section">
  <div class ="section-container">
            <?php include 'includes/connection.php' ?>
            <?php
try {
    $connection = new PDO('mysql:host=localhost;dbname=creativedb', $dbUsername, $dbPassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $connection->prepare("SELECT  image, name, comment, dateVal, timeVal FROM commenter");
    $sql->execute();
    header('Content-type: image');
    $result = $sql->fetchAll();
    if ($result > 0) {
        // output data of each row
        foreach ($result as $row) {
            echo "<div id='containerScroll'>";
            echo '<img class="small" src="data:image/png;base64,' . base64_encode($row["image"]) . '" /><br>';
            echo '  <b>'. $row["name"]. " @ </b>". $row["dateVal"]." //  ".  date('h:i A', strtotime($row["timeVal"])). "<br>";
            echo "<div class='commentOutput'> " . $row["comment"]. "</div><br>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$connection=null;
?>
</div> <!-- close section container -->
</section>
