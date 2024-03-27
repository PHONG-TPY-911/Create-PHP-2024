<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
require_once '../../connect-database/config.php';

if (isset($_POST['task_info'])) {
  $Skill = $_POST['skill'];
  $Language = $_POST['language'];
  $Occupation = $_POST['occupation'];
  $Job_content = $_POST['job_content'];
  // insert data
  $stmt = $conn->prepare("INSERT INTO taskInfo(Skill, Language, Occupation, Job_content) VALUES(:Skill, :Language:Occupation, :Job_content)");
  $stmt->bindParam(":Skill", $Skill);
  $stmt->bindParam(":Language", $Language);
  $stmt->bindParam(":Occupation", $Occupation);
  $stmt->bindParam(":Job_content", $Job_content);
  $stmt->execute();

  // check data
  if ($stmt) {
    echo "<script>
            $(document).ready(function() {
                Swal.fire({
                title: 'ເພີ່ມຂໍ້ມູນໜ້າວຽກ',
                text: 'ສຳເລັດເປັນທີ່ຮຽບຮ້ອຍແລ້ວ',
                icon: 'success',
                timer: 5000,
                showConfirmButton: false
                });
            });
          </script>";
    header("refresh:3; url=login.php");
  } else {
    $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນສຳເລັດ";
    header("location: show-info.php");
  }
}
?>