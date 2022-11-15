<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=fietsenmaker", $username, $password);

    $query = $conn->prepare("SELECT * FROM fietsen WHERE id = " . $_GET['id']);
    $query ->execute();

    $result = $query ->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $bike) {
        echo "Artikelnummer: " . $bike['id'] . "<br>";
        echo "Merk: " . $bike['merk'] . "<br>";
        echo "Type:" . $bike['type'] . "<br>";
        echo "Prijs: &euro; " . number_format($bike['prijs'],2,",",".");
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
