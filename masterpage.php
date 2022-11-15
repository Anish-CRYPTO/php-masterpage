<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=fietsenmaker", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $conn->prepare("SELECT * FROM fietsen");
    $query ->execute();
    $result = $query ->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $bike)
    {
        echo "<a href='detail.php?id=" . $bike['id'] . "'>";
        echo $bike['merk'] . " " . $bike['type'];
        echo "</a>";
        echo "<br>";
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
