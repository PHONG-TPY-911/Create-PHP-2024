<?php
require_once '../vendor/autoload.php'; // Include Google API Client Library
require_once '../connect-database/config.php';

$client = new Google_Client();
$client->setClientId('890489949620-7t4u00onpu34fmu84apkh1l13be7mth6.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/finally/google_login/login.php');
$client->addScope('email');
$client->addScope('profile');

$oauth = new Google_Service_Oauth2($client);
// $oauth = new Google_Service_Oauth2($client);

try {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $user = $oauth->userinfo->get();

    // Check if email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM google_login WHERE email = :email");
    $stmt->bindParam(':email', $user->email);
    $stmt->execute();
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        // User already exists, log them in
        $_SESSION['user'] = $existingUser;
    } else {
        // User doesn't exist, create a new account
        $stmt = $pdo->prepare("INSERT INTO google_login (google_id, name, email) VALUES (:google_id, :name, :email)");
        $stmt->bindParam(':google_id', $user->id);
        $stmt->bindParam(':name', $user->name);
        $stmt->bindParam(':email', $user->email);
        $stmt->execute();

        $newUserId = $pdo->lastInsertId();

        // Log in the new user
        $stmt = $pdo->prepare("SELECT * FROM google_login WHERE id = :id");
        $stmt->bindParam(':id', $newUserId);
        $stmt->execute();
        $_SESSION['user'] = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Redirect to the dashboard
    header('Location: dashboard.php');
    exit();
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
