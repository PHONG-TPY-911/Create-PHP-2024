<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../../connect-database/config.php';

if (isset($_POST['insert_apporve_user'])) {

  $ID = $_POST['ID'];
  $ID_company = $_POST['ID_company'];
  $ID_employee = $_POST['ID_employee'];
  $InfoFull = 'passed';
  print_r("id",  $ID_company);

  try {
    //Update information
    $stmt = $conn->prepare("UPDATE post_work_company SET InfoFull = :InfoFull, ID_company = :ID_company, ID_employee = :ID_employee WHERE ID = :ID ");
    $stmt->bindParam(":ID", $ID, PDO::PARAM_INT);
    $stmt->bindParam(":ID_company", $ID_company, PDO::PARAM_INT);
    $stmt->bindParam(":ID_employee", $ID_employee, PDO::PARAM_INT);
    $stmt->bindParam(":InfoFull", $InfoFull, PDO::PARAM_STR);
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