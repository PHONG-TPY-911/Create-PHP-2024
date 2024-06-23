<?php
// Start the session and include the database configuration
session_start();
require_once '../../connect-database/config.php';

if (isset($_POST['add'])) {
  $Job_title = $_POST['Job_title'];
  $Salary = $_POST['Salary'];
  $Job_data = $_POST['Job_data'];
  $job_end_data = $_POST['job_end_data'];
  $Describe_work = $_POST['Describe_work'];
  $Working_time = $_POST['Working_time'];
  $Time = $_POST['Time'];
  $ID_company = $_POST['ID_company'];
  $ID_employee = $_POST['ID_employee'];
  $Job_post_photos = $_FILES['Job_post_photos'];
  $InfoFull = 'full';

  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Job_post_photos['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew = rand() . "." . $fileActExt;
  $filePath = "./Image_post/" . $fileNew;


  try {
    if (in_array($fileActExt, $allow)) {
      if ($Job_post_photos['size'] > 0 && $Job_post_photos['error'] == 0) {
        if (move_uploaded_file($Job_post_photos['tmp_name'], $filePath)) {
          $stmt = $conn->prepare("INSERT INTO post_work_company(Job_title, Salary, Job_post_photos, Job_data, job_end_data, Describe_work, Time, Working_time, ID_company, ID_employee, InfoFull)
          VALUES(:Job_title, :Salary, :Job_post_photos, :Job_data, :job_end_data, :Describe_work, :Time, :Working_time, :ID_company, :ID_employee, :InfoFull)");

          $stmt->bindParam(":Job_title", $Job_title);
          $stmt->bindParam(":Salary", $Salary);
          $stmt->bindParam(":Job_data", $Job_data);
          $stmt->bindParam(":job_end_data", $job_end_data);
          $stmt->bindParam(":Describe_work", $Describe_work);
          $stmt->bindParam(":Time", $Time);
          $stmt->bindParam(":Working_time", $Working_time);
          $stmt->bindParam(":ID_company", $ID_company);
          $stmt->bindParam(":ID_employee", $ID_employee);
          $stmt->bindParam(":InfoFull", $InfoFull);
          $stmt->bindParam(":Job_post_photos", $fileNew);
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
            // header("location: Table_Post_Work.php");
            // header("refresh:3; url= Table_emplyee.php");
          } else {
            $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
            header("location: Table_Post_Work.php");
          }
        }
      }
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
