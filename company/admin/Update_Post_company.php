<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../../connect-database/config.php';

if (isset($_POST['record_info_customer'])) {
  $ID = $_POST['ID'];
  $Job_title = $_POST['Job_title'];
  $Salary = $_POST['Salary'];
  $Job_data = $_POST['Job_data'];
  $job_end_data = $_POST['job_end_data'];
  $Describe_work = $_POST['Describe_work'];
  $Job_post_photos = $_FILES['Job_post_photos'];
  $Time = $_POST['Time'];
  $Working_time = $_POST['Working_time'];
  $ID_company = $_POST['ID_company'];
  $ID_employee = $_POST['ID_employee'];

  print_r($ID);
  $Job_post_photos1 = $_POST['Job_post_photos1'];
  $upload = $_FILES['Job_post_photos']['name'];
  if ($upload != '') {
    //filename.jpg
    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $Job_post_photos['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew2 = rand() . "." . $fileActExt;
    $filePath2 = "./Image_post/" . $fileNew2;

    if (in_array($fileActExt, $allow)) {
      if ($Job_post_photos['size'] > 0 && $Job_post_photos['error'] == 0) {
        move_uploaded_file($Job_post_photos['tmp_name'], $filePath2);
      }
    }
  } else {
    $fileNew2 = $Job_post_photos1;
  }
  $stmt = $conn->prepare("UPDATE post_work_company SET Job_title = :Job_title, Salary = :Salary, Job_data = :Job_data, job_end_data = :job_end_data, Describe_work = :Describe_work, Time = :Time, Working_time = :Working_time, ID_company = :ID_company, ID_employee = :ID_employee, Job_post_photos = :Job_post_photos WHERE ID = :ID ");


  $stmt->bindParam(":ID", $ID);
  $stmt->bindParam(":Job_title", $Job_title);
  $stmt->bindParam(":Salary", $Salary);
  $stmt->bindParam(":Job_data", $Job_data);
  $stmt->bindParam(":job_end_data", $job_end_data);
  $stmt->bindParam(":Describe_work", $Describe_work);
  $stmt->bindParam(":Time", $Time);
  $stmt->bindParam(":Working_time", $Working_time);
  $stmt->bindParam(":ID_company", $ID_company);
  $stmt->bindParam(":ID_employee", $ID_employee);
  $stmt->bindParam(":Job_post_photos", $fileNew);
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
    header("location: Table_Post_Work.php");
  } else {
    $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
    header("location: Table_Post_Work.php");
  }
}
