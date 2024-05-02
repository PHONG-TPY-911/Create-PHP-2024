<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../connect-database/config.php';
$minLength = 6;

if (isset($_POST['register'])) {
  $Name = $_POST['Name'];
  $Lname = $_POST['Lname'];
  $Password = $_POST['Password'];
  $confirm_password = $_POST['confirm_password'];
  $Email = $_POST['Email'];
  $Status = 'user';
  $Age = "";
  $DataOfBirth = "";
  $Village = "";
  $District = "";
  $Province = "";
  $Address = "";
  $Gender = "";
  $Religion = "";
  $Study = "";
  $Education_level = "";
  $Tel = "";
  $Profile_picture = "";
  $Declaration = "";
  $Score = "";
  $Cv = "";
  $ID_task_information = "";

  if (empty($Name)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນຊື່';
    header("location: ../customer/registration.php");
  } else if (empty($Email)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນອີເມວ';
    header("location: ../customer/registration.php");
  } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'ຮູບແບບອິເມວບໍ່ຖືກຕ້ອງ';
    header("location:../customer/registration.php");
  } else if (empty($Password)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນລະຫັດຜ່ານ';
    header("location: ../customer/registration.php");
  } else if (strlen($Password) < $minLength) {
    $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 6 ຕົວອັກສອນ';
    header("location: ../customer/registration.php");
  } else if (empty($confirm_password)) {
    $_SESSION['error'] = 'ກາລຸນາຢືນຢັ້ນລະຫັດຜ່ານ';
    header("location: ../customer/registration.php");
  } else if ($Password !== $confirm_password) {
    $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ຕົງກັນ';
    header("location: ../customer/registration.php");
  } else {

    $checkUserName = $conn->prepare("SELECT COUNT(*) FROM customer WHERE Name = ?");
    $checkUserName->execute([$Name]);
    $userNameExists = $checkUserName->fetchColumn();

    $checkEmail = $conn->prepare("SELECT COUNT(*) FROM customer WHERE Email = ?");
    $checkEmail->execute([$Email]);
    $emailExists = $checkEmail->fetchColumn();

    if ($userNameExists) {
      $_SESSION['error'] = "ມີຊື່ັຜູ້ໃຊ້ງານຊ້ຳກັນຢູ່ໃນລະບົບ ກາລຸນາປ່ຽນເປັນຊື່ໃໝ່!";
      header("refresh:3; url=../customer/login.php");
    } else if ($emailExists) {
      $_SESSION['error'] = "ມີອີເມວຜູ້ໃຊ້ງານຊ້ຳກັນຢູ່ໃນລະບົບ ກາລຸນາປ່ຽນເປັນຊື່ໃໝ່!";
      header("refresh:3; url=../customer/login.php");
    } else {
      // insert information
      try {
        $passwordHash = password_hash($Password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO customer(Name, Lname, Age, DataOfBirth, Village, District, Province, Tel, Address, Religion, Education_level, Gender, Study, Email, Password, Status, Profile_picture, Declaration, Score, Cv, ID_task_information)
                                            VALUES(:Name, :Lname, :Age, :DataOfBirth, :Village, :District, :Province, :Tel, :Address, :Religion, :Education_level, :Gender, :Study, :Email, :Password, :Status, :Profile_picture, :Declaration, :Score, :Cv, :ID_task_information)");

        $stmt->bindParam(":Name", $Name);
        $stmt->bindParam(":Lname", $Lname);
        $stmt->bindParam(":Age", $Age);
        $stmt->bindParam(":DataOfBirth", $DataOfBirth);
        $stmt->bindParam(":Village", $Village);
        $stmt->bindParam(":District", $District);
        $stmt->bindParam(":Province", $Province);
        $stmt->bindParam(":Tel", $Tel);
        $stmt->bindParam(":Email", $Email);
        $stmt->bindParam(":Address", $Address);
        $stmt->bindParam(":Religion", $Religion);
        $stmt->bindParam(":Education_level", $Education_level);
        $stmt->bindParam(":Status", $Status);
        $stmt->bindParam(":Gender", $Gender);
        $stmt->bindParam(":Study", $Study);
        $stmt->bindParam(":Profile_picture", $Profile_picture);
        $stmt->bindParam(":Declaration", $Declaration);
        $stmt->bindParam(":Score", $Score);
        $stmt->bindParam(":Cv", $Cv);
        $stmt->bindParam(":ID_task_information", $ID_task_information);
        $stmt->bindParam(":Password", $passwordHash);
        $stmt->execute();
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
        header("refresh:3; url=../customer/login.php");
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
  }
}
?>