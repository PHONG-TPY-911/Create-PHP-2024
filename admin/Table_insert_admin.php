<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../connect-database/config.php';
$minLength = 6;
if (isset($_POST['record_info_admin'])) {
  $Name = $_POST['Name'];
  $Lname = $_POST['Lname'];
  $Age = $_POST['Age'];
  $Village = $_POST['Village'];
  $District = $_POST['District'];
  $Province = $_POST['Province'];
  $Address = $_POST['Address'];
  $Position = $_POST['Position'];
  $Password = $_POST['Password'];
  $Email = $_POST['Email'];
  $Tel = $_POST['Tel'];
  $Profile_picture = $_FILES['Profile_picture'];
  $Status = 'admin';

  //img profile_picture
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Profile_picture['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew = rand() . "." . $fileActExt;
  $filePath = "image-admin/" . $fileNew;
  //img profile_picture

  $checkEmail = $conn->prepare("SELECT COUNT(*) FROM admin WHERE Email = ?");
  $checkEmail->execute([$Email]);
  $emailExists = $checkEmail->fetchColumn();

  if ($emailExists) {
    $_SESSION['error'] = "ມີອີເມວຜູ້ໃຊ້ງານຊ້ຳກັນຢູ່ໃນລະບົບ ກາລຸນາປ່ຽນເປັນຊື່ໃໝ່!";
    echo "<script>
      $(document).ready(function() {
        Swal.fire({
            title: 'ອີເມວ',
            text: 'ມີອີເມວຜູ້ໃຊ້ງານຊ້ຳກັນຢູ່ໃນລະບົບ ກາລຸນາປ່ຽນເປັນຊື່ໃໝ່!',
            icon: 'success',
            timer: 5000,
            showConfirmButton: false
        });
    });
    </script>";
    header("refresh:3; url=Table_admin.php");
  } else {
    if (in_array($fileActExt, $allow)) {
      if ($Profile_picture['size'] > 0 && $Profile_picture['error'] == 0) {
        if (move_uploaded_file($Profile_picture['tmp_name'], $filePath)) {
          $passwordHash = password_hash($Password, PASSWORD_DEFAULT);
          $stmt = $conn->prepare("INSERT INTO admin(Name, Lname, Age, Village, District, Province, Address, Position, Tel, Password, Email, Profile_picture, Status) 
                                             VALUES(:Name, :Lname, :Age, :Village, :District, :Province, :Address, :Position, :Tel, :Password, :Email, :Profile_picture, :Status)");

          $stmt->bindParam(":Name", $Name);
          $stmt->bindParam(":Lname", $Lname);
          $stmt->bindParam(":Age", $Age);
          $stmt->bindParam(":Village", $Village);
          $stmt->bindParam(":District", $District);
          $stmt->bindParam(":Province", $Province);
          $stmt->bindParam(":Address", $Address);
          $stmt->bindParam(":Position", $Position);
          $stmt->bindParam(":Tel", $Tel);
          $stmt->bindParam(":Password", $passwordHash);
          $stmt->bindParam(":Email", $Email);
          $stmt->bindParam(":Profile_picture", $fileNew);
          $stmt->bindParam(":Status", $Status);
          $stmt->execute();
          if ($stmt) {
            echo "<script>
                          $(document).ready(function() {
                            Swal.fire({
                                title: 'ເພີ່ມຂໍ້ມູນ',
                                text: 'ພື້ນຖານຜູ້ສະໝັກວຽກເປັນທີ່ຮຽບຮ້ອຍແລ້ວ',
                                icon: 'success',
                                timer: 5000,
                                showConfirmButton: false
                            });
                        });
                        </script>";
            // header("location: Table_admin.php");
          } else {
            $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
            header("location: Table_admin.php");
          }
        }
      }
    }
  }
}
