<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../connect-database/config.php';

if (isset($_POST['record_info_customer'])) {
  $ID = $_POST['ID'];
  echo 'ID User' . $ID;
  $Name = $_POST['Name'];
  $Lname = $_POST['Lname'];
  $Age = $_POST['Age'];
  $DataOfBirth = $_POST['DataOfBirth'];
  $Village = $_POST['Village'];
  $District = $_POST['District'];
  $Province = $_POST['Province'];
  $Address = $_POST['Address'];
  $Religion = $_POST['Religion'];
  $Study = $_POST['Study'];
  $Education_level = $_POST['Education_level'];
  $Password = $_POST['Password'];
  $Gender = $_POST['Gender'];
  $Email = $_POST['Email'];
  $Tel = $_POST['Tel'];
  $Status = $_POST['Status'];
  $ID_task_information = "";
  $Profile_picture = $_FILES['image_profile_picture'];
  $Declaration = $_FILES['image_declaration'];
  $Score = $_FILES['image_score'];
  $Cv = $_FILES['image_cv'];

  //img Profile_picture
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Profile_picture['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew1 = rand() . "." . $fileActExt;
  $filePath1 = "../folder-image/image-profile/" . $fileNew1;

  //img Declaration
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Declaration['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew2 = rand() . "." . $fileActExt;
  $filePath2 = "../folder-image/image-declaration/" . $fileNew2;

  //img Score
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Score['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew3 = rand() . "." . $fileActExt;
  $filePath3 = "../folder-image/image-score/" . $fileNew3;

  //img Cv
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Cv['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew4 = rand() . "." . $fileActExt;
  $filePath4 = "../folder-image/image-cv/" . $fileNew4;



  // Check image Profile_picture
  if (in_array($fileActExt, $allow)) {
    if ($Profile_picture['size'] > 0 && $Profile_picture['error'] == 0) {
      if (move_uploaded_file($Profile_picture['tmp_name'], $filePath1)) {

        // Check image Declaration
        if (in_array($fileActExt, $allow)) {
          if ($Declaration['size'] > 0 && $Declaration['error'] == 0) {
            if (move_uploaded_file($Declaration['tmp_name'], $filePath2)) {

              // Check image Score
              if (in_array($fileActExt, $allow)) {
                if ($Score['size'] > 0 && $Score['error'] == 0) {
                  if (move_uploaded_file($Score['tmp_name'], $filePath3)) {

                    // Check image Cv
                    if (in_array($fileActExt, $allow)) {
                      if ($Cv['size'] > 0 && $Cv['error'] == 0) {
                        if (move_uploaded_file($Cv['tmp_name'], $filePath4)) {

                          // insert information
                          // $stmt = $conn->prepare("INSERT INTO customer(Name, Lname, Age, DataOfBirth, Village, District, Province, Address, Religion, Study, Education_level, Tel, Email, Password, Status, Profile_picture, Declaration, Score, Cv, ID_task_information)
                          //                                           VALUES(:Name, :Lname, :Age, :DataOfBirth, :Village, :District, :Province, :Address, :Study, :Education_level, :Tel, :Email, :Password, :Status, :Profile_picture, :Declaration, :Score, :Cv, :ID_task_information)");

                          // $stmt = $conn->prepare("INSERT INTO customer(ID, Name, Lname, Age, DataOfBirth, Village, District, Province, Tel, Address, Religion, Education_level, Gender, Study, Email, Password, Status, Profile_picture, Declaration, Score, Cv, ID_task_information)
                          //                                              VALUES(:ID, :Name, :Lname, :Age, :DataOfBirth, :Village, :District, :Province, :Tel, :Address, :Religion, :Education_level, :Gender, :Study, :Email, :Password, :Status, :Profile_picture, :Declaration, :Score, :Cv, :ID_task_information)");

                          $stmt = $conn->prepare("UPDATE customer SET Name = :Name, Lname = :Lname, Age = :Age, DataOfBirth = :DataOfBirth, Village = :Village, District = :District, Province = :Province, Tel = :Tel, Address = :Address, Religion = :Religion, Education_level =:Education_level, Gender = :Gender, Study = :Study, Email = :Email, Password = :Password, Status = :Status, Profile_picture = :Profile_picture, Declaration = :Declaration, Score = :Score, Cv = :Cv, ID_task_information = :ID_task_information WHERE ID = :ID ");


                          $stmt->bindParam(":ID", $ID);
                          $stmt->bindParam(":Name", $Name);
                          $stmt->bindParam(":Lname", $Lname);
                          $stmt->bindParam(":Age", $Age);
                          $stmt->bindParam(":DataOfBirth", $DataOfBirth);
                          $stmt->bindParam(":Village", $Village);
                          $stmt->bindParam(":District", $District);
                          $stmt->bindParam(":Province", $Province);
                          $stmt->bindParam(":Address", $Address);
                          $stmt->bindParam(":Religion", $Religion);
                          $stmt->bindParam(":Study", $Study);
                          $stmt->bindParam(":Education_level", $Education_level);
                          $stmt->bindParam(":Tel", $Tel);
                          $stmt->bindParam(":Email", $Email);
                          $stmt->bindParam(":Password", $Password);
                          $stmt->bindParam(":Status", $Status);
                          $stmt->bindParam(":Gender", $Gender);
                          $stmt->bindParam(":ID_task_information", $ID_task_information);
                          $stmt->bindParam(":Profile_picture", $fileNew1);
                          $stmt->bindParam(":Declaration", $fileNew2);
                          $stmt->bindParam(":Score", $fileNew3);
                          $stmt->bindParam(":Cv", $fileNew4);
                          $stmt->execute();
                          if ($stmt) {
                            // $_SESSION['success'] = "ທ່ານໄດ້ເພີ່ມຂໍ້ມູນສຳເລັດເປັນທີ່ຮຽບຮ້ອຍແລ້ວ";
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
                            header("refresh:3; url=candidate-details.php");
                          } else {
                            $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
                            header("location: candidate-details.php");
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}
