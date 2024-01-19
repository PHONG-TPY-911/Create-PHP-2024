<?php
require_once 'config.php';
// require_once '../connect-database/config.php';
// require_once '../vendor/autoload.php';
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $userinfo = [
        'email' => $google_account_info['email'],
        'first_name' => $google_account_info['givenName'],
        'last_name' => $google_account_info['familyName'],
        'gender' => $google_account_info['gender'],
        'full_name' => $google_account_info['name'],
        'picture' => $google_account_info['picture'],
        'verifiedEmail' => $google_account_info['verifiedEmail'],
        'token' =>$google_account_info['id'],
    ];


    //checking if user is already exists in database
    $check_email = $conn->prepare("SELECT email FROM google_login WHERE email = :email");
    $check_email->bindParam(":email", $userinfo['email']);
    $check_email->execute();
    // $row = $check_email->fetch(PDO::FETCH_ASSOC);
    if ($check_email->rowCount() > 0) {
        // $_SESSION['warning'] = "ມີອິເມວນີ້ຢູ່ໃນລະບົບເເລ້ວ <a href='login.php'>ຄິກທີ່ນີ້</a> ເພື່ອເຂົ້າສູ່ລະບົບ";
        // header("location: signup.php");
        // User exists
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $token = $row['token'];
    } else if (!isset($_SESSION['error'])) {
        // user is not exists
    $sql = "INSERT INTO users (email, first_name, last_name, gender, full_name, picture, verifiedEmail, token) VALUES (:email, :first_name, :last_name, :gender, :full_name, :picture, :verifiedEmail, :token)";

    // try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $userinfo['email']);
    $stmt->bindParam(':first_name', $userinfo['first_name']);
    $stmt->bindParam(':last_name', $userinfo['last_name']);
    $stmt->bindParam(':gender', $userinfo['gender']);
    $stmt->bindParam(':full_name', $userinfo['full_name']);
    $stmt->bindParam(':picture', $userinfo['picture']);
    $stmt->bindParam(':verifiedEmail', $userinfo['verifiedEmail']);
    $stmt->bindParam(':token', $userinfo['token']);
    
    if ($stmt->execute()) {
        $token = $userinfo['token'];
    } else {
        echo "User is not created";
        die();
    }
    // }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
</head>

<body>
  <img src="<?= $userinfo['picture'] ?>" alt="" width="90px" height="90px">
  <ul>
    <li>Full Name: <?= $userinfo['full_name'] ?></li>
    <li>Email Address: <?= $userinfo['email'] ?></li>
    <li>Gender: <?= $userinfo['gender'] ?></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</body>

</html>