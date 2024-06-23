<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../connect-database/config.php';

if (isset($_POST['record_info_customer'])) {
  $Name = $_POST['Name'];
  $Lname = $_POST['Lname'];
  $Age = $_POST['Age'];
  $DataOfBirth = $_POST['DataOfBirth'];
  $Village = $_POST['Village'];
  $District = $_POST['District'];
  $Province = $_POST['Province'];
  $Address = $_POST['Address'];
  $Religion = $_POST['Religion'];
  $Study = $_POST['Study'];
  $Education_level = $_POST['Education_level'];
  $Password = $_POST['Password'];
  $Gender = $_POST['Gender'];
  $Nationality = $_POST['Nationality'];
  $Email = $_POST['Email'];
  $Tel = $_POST['Tel'];
  $Status_user = $_POST['Status_user'];
  $Status = 'user';
  $ID_task_information = "";
  $Profile_picture = '';
  $Declaration = $_FILES['Declaration'];
  $Score = $_FILES['Score'];
  $Cv = $_FILES['Cv'];
  // $Profile_picture = $_FILES['Profile_picture'];
  // $   = $_POST['ID_Task'];

  //img profile_picture
  // $allow = array('jpg', 'jpeg', 'png');
  // $extension = explode(".", $Profile_picture['name']);
  // $fileActExt = strtolower(end($extension));
  // $fileNew = rand() . "." . $fileActExt;
  // $filePath = "../folder-image/image-profile/" . $fileNew;
  //img profile_picture
  //img Score
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Declaration['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew1 = rand() . "." . $fileActExt;
  $filePath1 = "../folder-image/image-declaration/" . $fileNew1;
  //img Cv
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Score['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew2 = rand() . "." . $fileActExt;
  $filePath2 = "../folder-image/image-score/" . $fileNew2;

  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Cv['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew3 = rand() . "." . $fileActExt;
  $filePath3 = "../folder-image/image-cv/" . $fileNew3;

  $checkEmail = $conn->prepare("SELECT COUNT(*) FROM customer WHERE Email = ?");
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
    header("refresh:3; url=Table_customer.php");
  } else {
    // if (in_array($fileActExt, $allow)) {
    //   if ($Profile_picture['size'] > 0 && $Profile_picture['error'] == 0) {
    //     if (move_uploaded_file($Profile_picture['tmp_name'], $filePath)) {

    if (in_array($fileActExt, $allow)) {
      if ($Declaration['size'] > 0 && $Declaration['error'] == 0) {
        if (move_uploaded_file($Declaration['tmp_name'], $filePath1)) {

          if (in_array($fileActExt, $allow)) {
            if ($Score['size'] > 0 && $Score['error'] == 0) {
              if (move_uploaded_file($Score['tmp_name'], $filePath2)) {

                if (in_array($fileActExt, $allow)) {
                  if ($Cv['size'] > 0 && $Cv['error'] == 0) {
                    if (move_uploaded_file($Cv['tmp_name'], $filePath3)) {
                      $passwordHash = password_hash($Password, PASSWORD_DEFAULT);
                      $stmt = $conn->prepare("INSERT INTO customer( Name , Lname, Age, DataOfBirth, Village, District, Province, Tel, Address,  Religion,
                                               Education_level, Gender,  Study,  Email,
                                             Nationality, Status_user, Status,Password, Profile_picture,
                                              Declaration, Score, Cv, ID_task_information) VALUES(
                                            :Name, :Lname,:Age, :DataOfBirth, :Village, :District, :Province, 
                                            :Tel, :Address, :Religion,
                                             :Education_level, :Gender, :Study, :Email,
                                             :Nationality,  :Status_user, :Status, :Password, :Profile_picture,
                                             :Declaration,  :Score, :Cv,  :ID_task_information)");

                      $stmt->bindParam(":Name", $Name);
                      $stmt->bindParam(":Lname", $Lname);
                      $stmt->bindParam(":Age", $Age);
                      $stmt->bindParam(":DataOfBirth", $DataOfBirth);
                      $stmt->bindParam(":Village", $Village);
                      $stmt->bindParam(":District", $District);
                      $stmt->bindParam(":Province", $Province);
                      $stmt->bindParam(":Address", $Address);
                      $stmt->bindParam(":Religion", $Religion);
                      $stmt->bindParam(":Status", $Status);
                      $stmt->bindParam(":Study", $Study);
                      $stmt->bindParam(":Education_level", $Education_level);
                      $stmt->bindParam(":Tel", $Tel);
                      $stmt->bindParam(":Email", $Email);
                      $stmt->bindParam(":Password", $passwordHash);
                      $stmt->bindParam(":Gender", $Gender);
                      $stmt->bindParam(":Nationality", $Nationality);
                      $stmt->bindParam(":Status_user", $Status_user);
                      $stmt->bindParam(":ID_task_information", $ID_task_information);
                      $stmt->bindParam(":Profile_picture", $Profile_picture);
                      $stmt->bindParam(":Declaration", $fileNew1);
                      $stmt->bindParam(":Score", $fileNew2);
                      $stmt->bindParam(":Cv", $fileNew3);
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
                        header("refresh:3; url=Table_customer.php");
                      } else {
                        $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
                        header("location: Table_customer.php");
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
}
