<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../connect-database/config.php';
$minLength = 6;

if (isset($_POST['user_list'])) {

  $ID = $_POST['ID'];
  $ID_task_information = $_POST['ID_task_information'];
  $Name = $_POST['Name'];
  $Lname = $_POST['Lname'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
  $Status = $_POST['Status'];
  $InfoFull = "passed";
  print_r($ID_task_information);



  try {
    //Update information
    $stmt = $conn->prepare("UPDATE customer SET Name = :Name, Lname = :Lname, Password = :Password, Status = :Status, Email = :Email, ID_task_information = :ID_task_information, InfoFull = :InfoFull WHERE ID = :ID ");
    $stmt->bindParam(":ID", $ID);
    $stmt->bindParam(":Name", $Name);
    $stmt->bindParam(":Lname", $Lname);
    $stmt->bindParam(":Password", $Password);
    $stmt->bindParam(":Email", $Email);
    $stmt->bindParam(":Status", $Status);
    $stmt->bindParam(":ID_task_information", $ID_task_information);
    $stmt->bindParam(":InfoFull", $InfoFull);
    $stmt->execute();
    // $_SESSION['success'] = "ສະໝັກສະມາຊີກຮຽບຮ້ອຍ!<a href='signin.php' class='alert-link' >ຄິກທີ່ນີ້</a>ເພື່ອເຂົ້າສູ່ລະບົບ";
    if ($stmt) {
      //   echo "<script>
      //   $(document).ready(function() {
      //     Swal.fire({
      //         title: 'ເພີ່ມຂໍ້ມູນຜູ້ສະໝັກວຽກ',
      //         text: 'ໄດ້ເປັນທີ່ຮຽບຮ້ອຍແລ້ວ',
      //         icon: 'success',
      //         timer: 5000,
      //         showConfirmButton: false
      //     });
      // });
      // </script>";
      //   header("refresh:3; url= List_user_apporve.php");
      // } else {
      $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດອັບເດດຂໍ້ມູນາສຳເລັດ";
      header("location: List_user_apporve.php");
    }
  } catch (Exception $err) {
    $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
    header("location: List_user_apporve.php");
  }
}
?>