<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../connect-database/config.php';

if (isset($_POST['record_info_customer'])) {
  $ID = $_POST['ID'];
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
  // $Password = $_POST['Password'];
  $Gender = $_POST['Gender'];
  $Nationality = $_POST['Nationality'];
  $Email = $_POST['Email'];
  $Tel = $_POST['Tel'];
  $Status_user = $_POST['Status_user'];
  // $ID_task_information = "";
  $Profile_picture = $_FILES['Profile_picture'];
  $Declaration = $_FILES['Declaration'];
  $Score = $_FILES['Score'];
  $Cv = $_FILES['Cv'];
  $ID_task_information = isset($_POST['ID_Task']) ? $_POST['ID_Task'] : '';
  
  print_r($Status_user);
  //img Profile_picture

  $Profile_picture1 = $_POST['Profile_picture1'];
  $upload = $_FILES['Profile_picture']['name'];
  if ($upload != '') {
    //filename.jpg
    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $Profile_picture['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew1 = rand() . "." . $fileActExt;
    $filePath1 = "../folder-image/image-profile/" . $fileNew1;

    if (in_array($fileActExt, $allow)) {
      if ($Profile_picture['size'] > 0 && $Profile_picture['error'] == 0) {
        move_uploaded_file($Profile_picture['tmp_name'], $filePath1);
      }
    }
  } else {
    $fileNew1 = $Profile_picture1;
  }

  //img Declaration

  $Declaration1 = $_POST['Declaration1'];
  $upload = $_FILES['Declaration']['name'];
  if ($upload != '') {
    //filename.jpg
    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $Declaration['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew2 = rand() . "." . $fileActExt;
    $filePath2 = "../folder-image/image-declaration/" . $fileNew2;

    if (in_array($fileActExt, $allow)) {
      if ($Declaration['size'] > 0 && $Declaration['error'] == 0) {
        move_uploaded_file($Declaration['tmp_name'], $filePath2);
      }
    }
  } else {
    $fileNew2 = $Declaration1;
  }

  //img Score

  $Score1 = $_POST['Score1'];
  $upload = $_FILES['Score']['name'];
  if ($upload != '') {
    //filename.jpg
    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $Score['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew3 = rand() . "." . $fileActExt;
    $filePath3 = "../folder-image/image-score/" . $fileNew3;

    if (in_array($fileActExt, $allow)) {
      if ($Score['size'] > 0 && $Score['error'] == 0) {
        move_uploaded_file($Score['tmp_name'], $filePath3);
      }
    }
  } else {
    $fileNew3 = $Score1;
  }

  //img Cv

  $Cv1 = $_POST['Cv1'];
  $upload = $_FILES['Cv']['name'];
  if ($upload != '') {
    //filename.jpg
    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $Cv['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew4 = rand() . "." . $fileActExt;
    $filePath4 = "../folder-image/image-cv/" . $fileNew4;

    if (in_array($fileActExt, $allow)) {
      if ($Cv['size'] > 0 && $Cv['error'] == 0) {
        move_uploaded_file($Cv['tmp_name'], $filePath4);
      }
    }
  } else {
    $fileNew4 = $Cv1;
  }

  $stmt = $conn->prepare("UPDATE customer SET Name = :Name, Lname = :Lname,
   Age = :Age, DataOfBirth = :DataOfBirth,
   Village = :Village, District = :District, Province = :Province, 
   Tel = :Tel, Address = :Address, Religion = :Religion,
    Education_level =:Education_level, Gender = :Gender, Study = :Study, Email = :Email,
  Nationality = :Nationality, Status_user = :Status_user, Profile_picture = :Profile_picture,
    Declaration = :Declaration, Score = :Score, Cv = :Cv, ID_task_information = :ID_task_information WHERE ID = :ID ");

  $stmt->bindParam(":ID", $ID);
  $stmt->bindParam(":Name", $Name);
  $stmt->bindParam(":Lname", $Lname);
  $stmt->bindParam(":Age", $Age);
  $stmt->bindParam(":DataOfBirth", $DataOfBirth);
  $stmt->bindParam(":Village", $Village);
  $stmt->bindParam(":District", $District);
  $stmt->bindParam(":Province", $Province);
  $stmt->bindParam(":Address", $Address);
  $stmt->bindParam(":Religion", $Religion);
  $stmt->bindParam(":Study", $Study);
  $stmt->bindParam(":Education_level", $Education_level);
  $stmt->bindParam(":Tel", $Tel);
  $stmt->bindParam(":Email", $Email);
  // $stmt->bindParam(":Password", $Password);
  // $stmt->bindParam(":Status", $Status);
  $stmt->bindParam(":Gender", $Gender);
  $stmt->bindParam(":Nationality", $Nationality);
  $stmt->bindParam(":Status_user", $Status_user);
  $stmt->bindParam(":ID_task_information", $ID_task_information);
  $stmt->bindParam(":Profile_picture", $fileNew1);
  $stmt->bindParam(":Declaration", $fileNew2);
  $stmt->bindParam(":Score", $fileNew3);
  $stmt->bindParam(":Cv", $fileNew4);
  $stmt->bindParam(":ID_task_information", $ID_task_information);
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
    header("refresh:3; url=candidate-details.php");
  } else {
    $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
    header("location: candidate-details.php");
  }
}
