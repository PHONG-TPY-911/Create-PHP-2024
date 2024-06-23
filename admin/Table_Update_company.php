<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../connect-database/config.php';
$minLength = 6;

if (isset($_POST['record_info_company'])) {

  $ID = $_POST['ID'];
  $Name_company = $_POST['Name_company'];
  $Business_model = $_POST['Business_model'];
  $Business_image = $_FILES['Business_image'];
  $Email = $_POST['Email'];
  $Village = $_POST['Village'];
  $District = $_POST['District'];
  $Province = $_POST['Province'];
  $Nationality = $_POST['Nationality'];
  $Tel = $_POST['Tel'];
  $All_image = $_FILES['All_image'];

  $Business_image1 = $_POST['Business_image1'];
  $upload = $_FILES['Business_image']['name'];
  if ($upload != '') {
    //filename.jpg
    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $Business_image['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew2 = rand() . "." . $fileActExt;
    $filePath2 = "../folder-image-company/business-company/" . $fileNew2;

    if (in_array($fileActExt, $allow)) {
      if ($Business_image['size'] > 0 && $Business_image['error'] == 0) {
        move_uploaded_file($Business_image['tmp_name'], $filePath2);
      }
    }
  } else {
    $fileNew2 = $Business_image1;
  }

  $All_image1 = $_POST['All_image1'];
  $upload = $_FILES['All_image']['name'];
  if ($upload != '') {
    //filename.jpg
    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $All_image['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew3 = rand() . "." . $fileActExt;
    $filePath3 = "../folder-image-company/all-image/" . $fileNew3;

    if (in_array($fileActExt, $allow)) {
      if ($All_image['size'] > 0 && $All_image['error'] == 0) {
        move_uploaded_file($All_image['tmp_name'], $filePath3);
      }
    }
  } else {
    $fileNew3 = $All_image1;
  }
  try {
    //Update information
    $stmt = $conn->prepare("UPDATE company SET Name_company = :Name_company, All_image = :All_image, Business_model = :Business_model, Nationality = :Nationality, Business_image = :Business_image, Village = :Village, District = :District, Province = :Province, Tel = :Tel, Email = :Email WHERE ID = :ID ");

    $stmt->bindParam(":ID", $ID);
    $stmt->bindParam(":Name_company", $Name_company);
    $stmt->bindParam(":Business_model", $Business_model);
    $stmt->bindParam(":Village", $Village);
    $stmt->bindParam(":District", $District);
    $stmt->bindParam(":Province", $Province);
    $stmt->bindParam(":Nationality", $Nationality);
    $stmt->bindParam(":Tel", $Tel);
    $stmt->bindParam(":Email", $Email);
    $stmt->bindParam(":Business_image", $fileNew2);
    $stmt->bindParam(":All_image", $fileNew3);
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
      header("location: Table_company.php");
    } else {
      $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
      header("location: Table_company.php");
    }
  } catch (Exception $err) {
    $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
    header("location: Table_company.php");
  }
}
?>