<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../connect-database/config.php';
$minLength = 6;

if (isset($_POST['login_company'])) {
  $Name_company = $_POST['Name_company'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
  $confirm_password = $_POST['confirm'];
  $Business_model = "";
  $Village = "";
  $District = "";
  $Province = "";
  $Tel = "";
  $Status = 'company';
  $Business_image = "";
  $Profile_picture = "";
  $ID_employee = "";

  if (empty($Name_company)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນຊື່';
    header("location: ../registration.php");
  } else if (empty($Email)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນອີເມວ';
    header("location: ../registration.php");
  } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'ຮູບແບບອິເມວບໍ່ຖືກຕ້ອງ';
    header("location: ../registration.php");
  } else if (empty($Password)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນລະຫັດຜ່ານ';
    header("location: ../registration.php");
  } else if (strlen($Password) < $minLength) {
    $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 6 ຕົວອັກສອນ';
    header("location: ../registration.php");
  } else if (empty($confirm_password)) {
    $_SESSION['error'] = 'ກາລຸນາຢືນຢັ້ນລະຫັດຜ່ານ';
    header("location: ../registration.php");
  } else if ($Password !== $confirm_password) {
    $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ຕົງກັນ';
    header("location: ../registration.php");
  } else {

    $checkEmail = $conn->prepare("SELECT COUNT(*) FROM company WHERE Email = ?");
    $checkEmail->execute([$Email]);
    $emailExists = $checkEmail->fetchColumn();
    if ($emailExists) {
      $_SESSION['error'] = "ອີເມວນີ້ມີຢູ່ໃນລະບົບແລ້ວ!";
      header("refresh:3; url=login.php");
    } else {
      // insert information
      try {
        $passwordHash = password_hash($Password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO company(Name_company, Business_model, Village, District, Province, Tel, Email, Password, Status, Business_image, Profile_picture, ID_employee)
                                            VALUES(:Name_company, :Business_model, :Village, :District, :Province, :Tel, :Email, :Password, :Status, :Business_image, :Profile_picture, :ID_employee)");

        $stmt->bindParam(":Name_company", $Name_company);
        $stmt->bindParam(":Business_model", $Business_model);
        $stmt->bindParam(":Village", $Village);
        $stmt->bindParam(":District", $District);
        $stmt->bindParam(":Province", $Province);
        $stmt->bindParam(":Tel", $Tel);
        $stmt->bindParam(":Email", $Email);
        $stmt->bindParam(":Status", $Status);
        $stmt->bindParam(":Business_image", $Business_image);
        $stmt->bindParam(":Profile_picture", $Profile_picture);
        $stmt->bindParam(":ID_employee", $ID_employee);
        $stmt->bindParam(":Password", $passwordHash);
        $stmt->execute();
        $_SESSION['success'] = "ສະໝັກສະມາຊີກຮຽບຮ້ອຍ!<a href='signin.php' class='alert-link' >ຄິກທີ່ນີ້</a>ເພື່ອເຂົ້າສູ່ລະບົບ";
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