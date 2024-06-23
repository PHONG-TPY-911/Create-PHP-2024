<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
session_start();
require_once '../connect-database/config.php';

if (isset($_POST['saveTask'])) {
  $Job_content = $_POST['Job_content'];
  $skills = isset($_POST['Skill']) ? json_encode($_POST['Skill']) : json_encode([]);
  $Skill_Other = $_POST['Skill_Other'];
  $languages = isset($_POST['Language']) ? json_encode($_POST['Language']) : json_encode([]);
  $Language_Other = $_POST['Language_Other'];
  $Occupation = $_POST['Occupation'];
  $ID = $_POST['ID'];

  $sql = $conn->prepare("UPDATE Taskinformation Skill, Skill_Other, Language, Occupation, Job_content, Language_Other, ID )
   VALUES(:Skill, :Skill_Other, :Language, :Occupation, :Job_content, :Language_Other, :ID)");
  $sql->bindParam(':Skill', $skills);
  $sql->bindParam(':Skill_Other', $Skill_Other);
  $sql->bindParam(':Language', $languages);
  $sql->bindParam(':Occupation', $Occupation);
  $sql->bindParam(':Job_content', $Job_content);
  $sql->bindParam(':Language_Other', $Language_Other);
  $sql->bindParam(':ID', $ID);
  $sql->execute();

  if ($sql) {
    echo "<script>
    $(document).ready(function() {
      Swal.fire({
          title: 'ເພີ່ມ',
          text: 'ການເພີ່ມຂໍ້ມູນເປັນທີ່ຮຽບຮ້ອຍແລ້ວ!',
          icon: 'success',
          timer: 5000,
          showConfirmButton: false
      });
  });
  
  </script>";
    header("refresh:2; url= candidate-details.php.php");
  } else {
    // $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
    echo "<script>
    $(document).ready(function() {
      Swal.fire({
          title: 'ມີບາງຢ່າງເກິດການຜິດພາດ',
          text: 'ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ!',
          icon: 'error',
          timer: 5000,
          showConfirmButton: false
      });
  });
  </script>";
    header("refresh:2; url= candidate-details-skill-add.php");
  }
}
