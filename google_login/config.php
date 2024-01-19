<?php
require_once '../connect-database/config.php';
require_once '../vendor/autoload.php';
session_start();

// init configuration
$clientID = '890489949620-ikhg2t09pm00gih47tonnfkupcrrf0gf.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/finally/google_login/index.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

?>