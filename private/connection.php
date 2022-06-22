<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "pakket-afhaal-service";



try {
$conn = new PDO("mysql:host=$host;dbname=pakket-afhaal-service", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
echo "Connection failed:" . $e->getMessage();
die();
}
?>


