<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../connect-database/config.php';
$minLength = 6;

if (isset($_POST['updateImage'])) {

  $ID = $_POST['ID'];
  print_r($ID);
  $Profile_picture = $_FILES['Profile_picture'];

  $Profile_picture1 = $_POST['Profile_picture1'];
  $upload = $_FILES['Profile_picture']['name'];
  if ($upload != '') {
    //filename.jpg
    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $Profile_picture['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew1 = rand() . "." . $fileActExt;
    $filePath1 = "../folder-image-company/profile-company/" . $fileNew1;

    if (in_array($fileActExt, $allow)) {
      if ($Profile_picture['size'] > 0 && $Profile_picture['error'] == 0) {
        move_uploaded_file($Profile_picture['tmp_name'], $filePath1);
      }
    }
  } else {
    $fileNew1 = $Profile_picture1;
  }
  try {
    //Update information
    $stmt = $conn->prepare("UPDATE company SET Profile_picture = :Profile_picture WHERE ID = :ID ");

    $stmt->bindParam(":ID", $ID);
    $stmt->bindParam(":Profile_picture", $fileNew1);
    $stmt->execute();
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
      header("location: ./company-details.php");
    }
  } catch (Exception $err) {
    $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
    header("location: ./company-details.php");
  }
}
?>