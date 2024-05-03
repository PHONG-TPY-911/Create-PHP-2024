<?php 

$servername = "localhost";
$username = "root";
$password = "root";

try{
    $conn = new PDO("mysql:host=$servername; dbname=e-job", $username, $password);
    // $conn = new PDO("mysql:host=$servername;dbname=final", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection Database Failed : " . $e->getMessage();
}

?>