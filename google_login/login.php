<?php
session_start();
require_once '../connect-database/config.php'; // Include your database connection file
require_once 'google_login.php';
if (isset($_GET['code'])) {
    // Handle Google OAuth response
    require 'google_login.php';
} elseif (isset($_SESSION['user'])) {
    // User already logged in
    header('Location: dashboard.php');
    exit();
} else {
    // Display the login button
    echo '<a href="' . $client->createAuthUrl() . '">Login with Google</a>';

    // echo '<a href="' . getGoogleLoginUrl() . '">Login with Google</a>';
}