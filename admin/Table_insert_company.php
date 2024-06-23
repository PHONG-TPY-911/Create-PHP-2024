<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../connect-database/config.php';
$minLength = 6;
if (isset($_POST['record_info_company'])) {
  $Name_company = $_POST['Name_company'];
  $Business_model = $_POST['Business_model'];
  $Village = $_POST['Village'];
  $District = $_POST['District'];
  $Province = $_POST['Province'];
  $Nationality = $_POST['Nationality'];
  $Password = $_POST['Password'];
  $Email = $_POST['Email'];
  $Tel = $_POST['Tel'];
  $Business_image = $_FILES['Business_image'];
  $All_image = $_FILES['All_image'];
  $Status = 'company';
  $InfoFull = '';
  $ID_employee = '';
  $Profile_picture = '';

  //img profile_picture
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Business_image['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew = rand() . "." . $fileActExt;
  $filePath = "../folder-image-company/business-company/" . $fileNew;
  //img profile_picture
  //img Score
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $All_image['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew1 = rand() . "." . $fileActExt;
  $filePath1 = "../folder-image-company/all-image/" . $fileNew1;

  $checkEmail = $conn->prepare("SELECT COUNT(*) FROM company WHERE Email = ?");
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
    header("refresh:3; url=../customer/login.php");
  } else {
    if (in_array($fileActExt, $allow)) {
      if ($Business_image['size'] > 0 && $Business_image['error'] == 0) {
        if (move_uploaded_file($Business_image['tmp_name'], $filePath)) {

          if (in_array($fileActExt, $allow)) {
            if ($All_image['size'] > 0 && $All_image['error'] == 0) {
              if (move_uploaded_file($All_image['tmp_name'], $filePath1)) {
                $passwordHash = password_hash($Password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO company(Name_company, Business_image, All_image, Business_model, Village, District, Province, Nationality, Tel, Password, Email, InfoFull, Profile_picture, Status, ID_employee) 
                                             VALUES(:Name_company, :Business_image, :All_image, :Business_model, :Village, :District, :Province, :Nationality, :Tel, :Password, :Email, :InfoFull, :Profile_picture, :Status, :ID_employee)");

                $stmt->bindParam(":Name_company", $Name_company);
                $stmt->bindParam(":Business_image", $fileNew);
                $stmt->bindParam(":All_image", $fileNew1);
                $stmt->bindParam(":Business_model", $Business_model);
                $stmt->bindParam(":Village", $Village);
                $stmt->bindParam(":District", $District);
                $stmt->bindParam(":Province", $Province);
                $stmt->bindParam(":Nationality", $Nationality);
                $stmt->bindParam(":Tel", $Tel);
                $stmt->bindParam(":Password", $passwordHash);
                $stmt->bindParam(":Email", $Email);
                $stmt->bindParam(":Profile_picture", $Profile_picture);
                $stmt->bindParam(":ID_employee", $ID_employee);
                $stmt->bindParam(":Status", $Status);
                $stmt->bindParam(":InfoFull", $InfoFull);
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
                  header("location: Table_company.php");
                } else {
                  $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
                  header("location: Table_company.php");
                }
              }
            }
          }
        }
      }
    }
  }
}
