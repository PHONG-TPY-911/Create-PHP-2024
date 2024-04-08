<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../../connect-database/config.php';
$minLength = 6;

if (isset($_POST['register'])) {
  $Name = $_POST['name'];
  $Lname = $_POST['lname'];
  $Password = $_POST['password'];
  $C_password = $_POST['C_password'];
  $Email = $_POST['email'];
  $Age = "";
  $DataOfBirth = "";
  $Village = "";
  $District = "";
  $Province = "";
  $Address = "";
  $Religion = "";
  $Study = "";
  $Education_level = "";
  $Tel = "";
  $Status = 'user';
  $Profile_picture = "";
  $Declaration = "";
  $Score = "";
  $Cv = "";
  // $ID_task_information = 1;

  if (empty($Name)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນຊື່';
    header("location: registration.php");
  } else if (empty($Email)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນອີເມວ';
    header("location: registration.php");
  } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'ຮູບແບບອິເມວບໍ່ຖືກຕ້ອງ';
    header("location: registration.php");
  } else if (empty($Password)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນລະຫັດຜ່ານ';
    header("location: registration.php");
  } else if (strlen($Password) < $minLength) {
    $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 6 ຕົວອັກສອນ';
    header("location: registration.php");
  } else if (empty($C_password)) {
    $_SESSION['error'] = 'ກາລຸນາຢືນຢັ້ນລະຫັດຜ່ານ';
    header("location: registration.php");
  } else if ($Password !== $C_password) {
    $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ຕົງກັນ';
    header("location: registration.php");
  } else {

    $checkUserName = $conn->prepare("SELECT COUNT(*) FROM customer WHERE Name = ?");
    $checkUserName->execute([$Name]);
    $userNameExists = $checkUserName->fetchColumn();

    $checkEmail = $conn->prepare("SELECT COUNT(*) FROM customer WHERE Email = ?");
    $checkEmail->execute([$Email]);
    $emailExists = $checkEmail->fetchColumn();

    if ($userNameExists) {
      $_SESSION['error'] = "UserName already exists";
      header("refresh:3; url=login.php");
    } else if ($emailExists) {
      $_SESSION['error'] = "UserName already exists";
      header("refresh:3; url=login.php");
    } else {
      // insert information
      try {
        $passwordHash = password_hash($Password, PASSWORD_DEFAULT);
        echo 'password+++' .  $passwordHash;
        $stmt = $conn->prepare("INSERT INTO customer(Name, Lname, Age, DataOfBirth, Village, District, Province, Address, Religion, Study, Education_level, Tel, Email, Password, Status, Profile_picture, Declaration, Score, Cv)
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$Name, $Lname, $Age, $DataOfBirth, $Village, $District, $Province, $Address, $Religion, $Study, $Education_level, $Tel, $Email, $passwordHash, $Status, $Profile_picture, $Declaration, $Score, $Cv]);
        $_SESSION['success'] = "ສະໝັກສະມາຊີກຮຽບຮ້ອຍ!<a href='login.php' class='alert-link' >ຄິກທີ່ນີ້</a>ເພື່ອເຂົ້າສູ່ລະບົບ";
        echo "<script>
                                                $(document).ready(function() {
                                                    Swal.fire({
                                                        title: 'ເພີ່ມຂໍ້ມູນຜູ້ສະໝັກວຽກ',
                                                        text: 'ໄດ້ເປັນທີ່ຮຽບຮ້ອຍແລ້ວ',
                                                        icon: 'success',
                                                        timer: 5000,
                                                        showConfirmButton: false
                                                    });
                                                });
                                                </script>";
        header("refresh:3; url=login.php");
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
  }
}
?>