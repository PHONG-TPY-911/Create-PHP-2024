<?php
$servername = "127.0.0.1";
$username = "root";
$password = ""; // Use the password you set during the mysql_secure_installation step
$dbname = "database_final";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection Database Failed: " . $e->getMessage();
}
?>
