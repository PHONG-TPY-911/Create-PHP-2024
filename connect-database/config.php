<?php 

$sername = "localhost";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$sername; dbname=finally", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection Database Failed : " . $e->getMessage();
}
?>