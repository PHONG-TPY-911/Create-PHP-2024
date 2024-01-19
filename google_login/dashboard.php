<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];
echo 'Welcome, ' . $user['name'] . '!<br>';
echo 'Email: ' . $user['email'] . '<br>';
