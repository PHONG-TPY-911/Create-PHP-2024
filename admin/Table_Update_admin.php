<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../connect-database/config.php';
$minLength = 6;

if (isset($_POST['record_info_company'])) {

  $ID = $_POST['ID'];
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

  $Profile_picture1 = $_POST['Profile_picture1'];
  $upload = $_FILES['Profile_picture']['name'];
  if ($upload != '') {
    //filename.jpg
    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $Profile_picture['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew2 = rand() . "." . $fileActExt;
    $filePath2 = "image-admin/" . $fileNew2;

    if (in_array($fileActExt, $allow)) {
      if ($Profile_picture['size'] > 0 && $Profile_picture['error'] == 0) {
        move_uploaded_file($Profile_picture['tmp_name'], $filePath2);
      }
    }
  } else {
    $fileNew2 = $Profile_picture1;
  }
  try {
    //Update information
    $stmt = $conn->prepare("UPDATE admin SET Name = :Name, Lname = :Lname, Age = :Age, Village = :Village, District = :District, Province = :Province, Address = :Address, Position = :Position, Tel = :Tel, Password = :Password, Email = :Email, Profile_picture = :Profile_picture, Status = :Status WHERE ID = :ID ");

    $stmt->bindParam(":ID", $ID);
    $stmt->bindParam(":Name", $Name);
    $stmt->bindParam(":Lname", $Lname);
    $stmt->bindParam(":Age", $Age);
    $stmt->bindParam(":Village", $Village);
    $stmt->bindParam(":District", $District);
    $stmt->bindParam(":Province", $Province);
    $stmt->bindParam(":Address", $Address);
    $stmt->bindParam(":Position", $Position);
    $stmt->bindParam(":Tel", $Tel);
    $stmt->bindParam(":Password", $Password);
    $stmt->bindParam(":Email", $Email);
    $stmt->bindParam(":Profile_picture", $fileNew2);
    $stmt->bindParam(":Status", $Status);
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
      // header("location: Table_admin.php");
    } else {
      $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
      header("location: Table_admin.php");
    }
  } catch (Exception $err) {
    $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
    header("location: Table_admin.php");
  }
}
?>