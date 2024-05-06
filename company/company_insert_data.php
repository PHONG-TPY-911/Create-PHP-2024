<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../connect-database/config.php';
$minLength = 6;

if (isset($_POST['Submit'])) {

  $ID = $_POST['ID'];
  $Name_company = $_POST['Name_company'];
  $Business_model = $_POST['Business_model'];
  $Business_image = $_FILES['Business_image'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
  $NewPassword = $_POST['NewPassword'];
  $Village = $_POST['Village'];
  $District = $_POST['District'];
  $Province = $_POST['Province'];
  $Tel = $_POST['Tel'];
  $Status = $_POST['Status'];
  $Profile_picture = $_FILES['profile_picture'];
  $All_image = $_FILES['All_image'];
  $ID_employee = "";


  //image  //img Profile_picture
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Profile_picture['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew1 = rand() . "." . $fileActExt;
  $filePath1 = "../folder-image-company/profile-company/" . $fileNew1;

  //img Declaration
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Business_image['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew2 = rand() . "." . $fileActExt;
  $filePath2 = "../folder-image-company/business-company/" . $fileNew2;

  //img Declaration
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $All_image['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew3 = rand() . "." . $fileActExt;
  $filePath3 = "../folder-image-company/all-image/" . $fileNew3;

  // Check image Profile_picture
  if (in_array($fileActExt, $allow)) {
    if ($Profile_picture['size'] > 0 && $Profile_picture['error'] == 0) {
      if (move_uploaded_file($Profile_picture['tmp_name'], $filePath1)) {

        // Check image Declaration
        if (in_array($fileActExt, $allow)) {
          if ($Business_image['size'] > 0 && $Business_image['error'] == 0) {
            if (move_uploaded_file($Business_image['tmp_name'], $filePath2)) {

              if (in_array($fileActExt, $allow)) {
                if ($All_image['size'] > 0 && $All_image['error'] == 0) {
                  if (move_uploaded_file($All_image['tmp_name'], $filePath3)) {
                    $passwordHash = password_hash($NewPassword, PASSWORD_DEFAULT);

                    //Update information
                    $stmt = $conn->prepare("UPDATE company SET Name_company = :Name_company, All_image = :All_image, Business_model = :Business_model, Business_image = :Business_image, Village = :Village, District = :District, Province = :Province, Tel = :Tel, Email = :Email, Password = :Password, Status = :Status, Profile_picture = :Profile_picture, ID_employee = :ID_employee WHERE ID = :ID ");

                    $stmt->bindParam(":ID", $ID);
                    $stmt->bindParam(":Name_company", $Name_company);
                    $stmt->bindParam(":Business_model", $Business_model);
                    $stmt->bindParam(":Village", $Village);
                    $stmt->bindParam(":District", $District);
                    $stmt->bindParam(":Province", $Province);
                    $stmt->bindParam(":Tel", $Tel);
                    $stmt->bindParam(":Email", $Email);
                    $stmt->bindParam(":Status", $Status);
                    $stmt->bindParam(":Profile_picture", $fileNew1);
                    $stmt->bindParam(":Business_image", $fileNew2);
                    $stmt->bindParam(":All_image", $fileNew3);
                    $stmt->bindParam(":ID_employee", $ID_employee);
                    $stmt->bindParam(":Password", $passwordHash);
                    $stmt->execute();
                    // $_SESSION['success'] = "ສະໝັກສະມາຊີກຮຽບຮ້ອຍ!<a href='signin.php' class='alert-link' >ຄິກທີ່ນີ້</a>ເພື່ອເຂົ້າສູ່ລະບົບ";
                    if ($stmt) {
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
                      header("refresh:3; url= ./company-details.php");
                    } else {
                      $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
                      header("location: ./company-details-add.php");
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}
?>