<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->


<?php

session_start();
require_once '../../connect-database/config.php';
$minLength = 6;

if (isset($_POST['login'])) {
  $Email = $_POST['email'];
  $Password = $_POST['password'];

  if (empty($Email)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນອີເມວ';
    header("location: login.php");
  } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'ຮູບແບບອີເມວບໍ່ຖືກຕ້ອງ';
    header("location: login.php");
  } else if (empty($Password)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນລະຫັດຜ່ານ';
    header("location: login.php");
  } else if (strlen($Password) < $minLength) {
    $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 6 ຕົວອັກສອນ';
    header("location: login.php");
  } else {

    try {

      $stmt = $conn-> prepare("SELECT * FROM customer WHERE Email = ?");
      $stmt->execute([$Email]);
      $userData = $stmt->fetch();
      if ($userData && password_verify($Password, $userData['Password'])) {
        $_SESSION['user_id'] = $userData['ID'];
        header("refresh:1; url=show.php");
      } else {
        $_SESSION['error'] = 'Invalid email and password';
        header("refresh:1; url=login.php");
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
?>