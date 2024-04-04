<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../../connect-database/config.php';
// require_once '../../connect-database/config.php';

if (isset($_POST['register'])) {
  $Name = $_POST['name'];
  $Lname = $_POST['lname'];
  $Age = "";
  $DataOfBirth = "";
  $Village = "";
  $District = "";
  $Province = "";
  $Address = "";
  $religion = "";
  $Study = "";
  $Education_level = "";
  $Password = $_POST['password'];
  $C_password = $_POST['C_password'];
  $Email = $_POST['email'];
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
  } else if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $Email)) {
    // } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'ຮູບແບບອິເມວບໍ່ຖືກຕ້ອງ';
    header("location: registration.php");
  } else if (empty($Password)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນລະຫັດຜ່ານ';
    header("location: registration.php");
  } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 5 ເຖິງ 10 ຕົວອັກສອນ';
    header("location: registration.php");
  } else if (empty($C_password)) {
    $_SESSION['error'] = 'ກາລຸນາຢືນຢັ້ນລະຫັດຜ່ານ';
    header("location: registration.php");
  } else if ($Password != $C_password) {
    $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ຕົງກັນ';
    header("location: registration.php");
  } else {

    print_r($Name);

    // insert information
    try {
      $check_email = $conn->prepare("SELECT Email FROM customer WHERE Email = :email");
      $check_email->bindParam(":email", $Email);
      $check_email->execute();
      if ($check_email->rowCount() > 0) {
        $_SESSION['warning'] = "ມີອິເມວນີ້ຢູ່ໃນລະບົບເເລ້ວ <a href='registration.php'>ຄິກທີ່ນີ້</a> ເພື່ອເຂົ້າສູ່ລະບົບ";
        header("location: index.php");
      } else if (!isset($_SESSION['error'])) {
        $passwordHash = password_hash($Password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO customer(Name, Lname, Age, DataOfBirth, Village, District, Province, Address, Religion, Study, Education_level, Tel, Email, Password, Status, Profile_picture, Declaration, Score, Cv)
                      VALUES(:Name, :Lname, :Age, :DataOfBirth, :Village, :District, :Province, :Address, :Religion, :Study, :Education_level, :Tel, :Email, :Password, :Status, :Profile_picture, :Declaration, :Score, :Cv)");
        $stmt->bindParam(":Name", $Name);
        $stmt->bindParam(":Lname", $Lname);
        $stmt->bindParam(":Age", $Age);
        $stmt->bindParam(":DataOfBirth", $DataOfBirth);
        $stmt->bindParam(":Village", $Village);
        $stmt->bindParam(":District", $District);
        $stmt->bindParam(":Province", $Province);
        $stmt->bindParam(":Address", $Address);
        $stmt->bindParam(":Religion", $religion);
        $stmt->bindParam(":Study", $Study);
        $stmt->bindParam(":Education_level", $Education_level);
        $stmt->bindParam(":Tel", $Tel);
        $stmt->bindParam(":Email", $Email);
        $stmt->bindParam(":Password", $passwordHash);
        $stmt->bindParam(":Status", $Status);
        $stmt->bindParam(":Profile_picture", $Profile_picture);
        $stmt->bindParam(":Declaration", $Declaration);
        $stmt->bindParam(":Score", $Score);
        $stmt->bindParam(":Cv", $Cv);
        // $stmt->bindParam(":ID_task_information", $ID_task_information);

        // $stmt = $conn->prepare("INSERT INTO customer(Name, Lname,  Tel, Email, Password, Status)
        //                       VALUES(:Name, :Lname, :Email, :Password, :Status)");
        // $stmt = $conn->prepare("INSERT INTO customer(Name, Lname, Age, DataOfBirth, Village, District, Province, Address, Religion, Study, Education_level, Tel, Email, Password, Status, Profile_picture, Declaration, Score, Cv, ID_task_information)
        //                       VALUES(:Name, :Lname, :Age, :DataOfBirth, :Village, :District, :Province, :Address, :Study, :Education_level, :Tel, :Email, :Password, :Status, :Profile_picture, :Declaration, :Score, :Cv, :ID_task_information)");
        // $stmt->bindParam(":Name", $Name);
        // $stmt->bindParam(":Lname", $Lname);
        // $stmt->bindParam(":Age", $Age);
        // $stmt->bindParam(":DataOfBirth", $DataOfBirth);
        // $stmt->bindParam(":Village", $Village);
        // $stmt->bindParam(":District", $District);
        // $stmt->bindParam(":Province", $Province);
        // $stmt->bindParam(":Address", $Address);
        // $stmt->bindParam(":Religion", $Religion);
        // $stmt->bindParam(":Study", $Study);
        // $stmt->bindParam(":Education_level", $Education_level);
        // $stmt->bindParam(":Tel", $Tel);
        // $stmt->bindParam(":Email", $Email);
        // $stmt->bindParam(":Password", $passwordHash);
        // $stmt->bindParam(":Status", $Status);
        // $stmt->bindParam(":Profile_picture", $Profile_picture);
        // $stmt->bindParam(":Declaration", $Declaration);
        // $stmt->bindParam(":Score", $Score);
        // $stmt->bindParam(":Cv", $Cv);
        // $stmt->bindParam(":ID_task_information", $ID_task_information);
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
        header("refresh:3; url=login.php");
      } else {
        $_SESSION['error'] = "ມີຢ່າງຜິດພາດ";
        header("location: registration.php");
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
?>