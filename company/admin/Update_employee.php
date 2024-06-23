<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../../connect-database/config.php';

if (isset($_POST['record_info_customer'])) {
  $ID = $_POST['ID'];
  $Name_Employee = $_POST['Name_Employee'];
  $Lname = $_POST['Lname'];
  $Position = $_POST['Position'];
  $Password = $_POST['Password'];
  $Email = $_POST['Email'];
  $Tel = $_POST['Tel'];
  $ID_company = $_POST['ID_company'];
  $Profile_picture = $_FILES['Profile_picture'];

  $Profile_picture1 = $_POST['Profile_picture1'];
  $upload = $_FILES['Profile_picture']['name'];
  if ($upload != '') {
    //filename.jpg
    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $Profile_picture['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew2 = rand() . "." . $fileActExt;
    $filePath2 = "../folder-image/image-declaration/" . $fileNew2;

    if (in_array($fileActExt, $allow)) {
      if ($Profile_picture['size'] > 0 && $Profile_picture['error'] == 0) {
        move_uploaded_file($Profile_picture['tmp_name'], $filePath2);
      }
    }
  } else {
    $fileNew2 = $Profile_picture1;
  }
  $stmt = $conn->prepare("UPDATE employees SET Name_Employee = :Name_Employee, Lname = :Lname, Password = :Password, Position = :Position, Tel = :Tel, Email = :Email, Profile_picture = :Profile_picture, ID_company = :ID_company WHERE ID = :ID ");

  $stmt->bindParam(":ID", $ID);
  $stmt->bindParam(":Name_Employee", $Name_Employee);
  $stmt->bindParam(":Lname", $Lname);
  $stmt->bindParam(":Position", $Position);
  $stmt->bindParam(":Password", $Password);
  $stmt->bindParam(":Tel", $Tel);
  $stmt->bindParam(":Email", $Email);
  $stmt->bindParam(":Password", $passwordHash);
  $stmt->bindParam(":ID_company", $ID_company);
  $stmt->bindParam(':Profile_picture', $fileNew2);
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
    // header("refresh:3; url=Index.php");
    header("location: Table_emplyee.php");
  } else {
    $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
    header("location: Table_emplyee.php");
  }
}
