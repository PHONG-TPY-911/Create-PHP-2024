<?php
// Start the session and include the database configuration
session_start();
require_once '../../connect-database/config.php';

if (isset($_POST['add'])) {
  $Name_Employee = $_POST['Name_Employee'];
  $Lname = $_POST['Lname'];
  $Position = $_POST['Position'];
  $Tel = $_POST['Tel'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
  $Profile_picture = $_FILES['Profile_picture'];
  $ID_company = $_POST['ID_company'];
  // get data value of company
  $Name_company = $_POST['Name_company'];
  $Password1 = $_POST['Password1'];
  $Email1 = $_POST['Email1'];
  $Status = $_POST['Status'];

  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Profile_picture['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew = rand() . "." . $fileActExt;
  $filePath = "image/" . $fileNew;

  if (empty($Email)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນອີເມວ';
    header("location: Table_emplyee.php");
  } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'ຮູບແບບອີເມວບໍ່ຖືກຕ້ອງ!';
    header("location: Table_emplyee.php");
  } else if (empty($Password)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນລະຫັດຜ່ານ';
    header("location:Table_emplyee.php");
  } else {
    try {
      $check_email = $conn->prepare("SELECT Email FROM employees WHERE Email = :Email");
      $check_email->bindParam(":Email", $Email);
      $check_email->execute();

      if ($check_email->rowCount() > 0) {
        $_SESSION['warning'] = "ມີອິເມວນີ້ຢູ່ໃນລະບົບເເລ້ວ!";
        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        text: 'ມີອິເມວນີ້ຢູ່ໃນລະບົບເເລ້ວ!',
                        icon: 'warning',
                        timer: 6000,
                        showConfirmButton: false
                    });
                });
              </script>";
        header("refresh:2; url=Table_emplyee.php");
      } else if (!isset($_SESSION['error'])) {
        $passwordHash = password_hash($Password, PASSWORD_DEFAULT);

        if (in_array($fileActExt, $allow)) {
          if ($Profile_picture['size'] > 0 && $Profile_picture['error'] == 0) {
            if (move_uploaded_file($Profile_picture['tmp_name'], $filePath)) {
              $conn->beginTransaction();
              $stmt = $conn->prepare("INSERT INTO employees(Name_Employee, Lname, Position, Tel, Email, Password, Profile_picture, ID_company)
                                            VALUES(:Name_Employee, :Lname, :Position, :Tel, :Email, :Password, :Profile_picture, :ID_company)");
              $stmt->bindParam(":Name_Employee", $Name_Employee);
              $stmt->bindParam(":Lname", $Lname);
              $stmt->bindParam(":Position", $Position);
              $stmt->bindParam(":Tel", $Tel);
              $stmt->bindParam(":Email", $Email);
              $stmt->bindParam(":ID_company", $ID_company);
              $stmt->bindParam(":Password", $passwordHash);
              $stmt->bindParam(':Profile_picture', $fileNew);
              $stmt->execute();

              $employee_id = $conn->lastInsertId();

              $stmt_update = $conn->prepare("UPDATE company SET Name_company = :Name_company, Password = :Password, Email = :Email, Status = :Status, ID_employee = :ID_employee WHERE ID = :ID_company");
              $stmt_update->bindParam(":ID_company", $ID_company);  // Corrected the parameter name
              $stmt_update->bindParam(":Name_company", $Name_company);
              $stmt_update->bindParam(":Email", $Email1);
              $stmt_update->bindParam(":Status", $Status); // Corrected the parameter name
              $stmt_update->bindParam(":Password", $Password1);
              $stmt_update->bindParam(":ID_employee", $employee_id);
              $stmt_update->execute();

              $conn->commit();

              $_SESSION['success'] = "ສະໝັກສະມາຊີກຮຽບຮ້ອຍ!";
              echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                title: 'ເພີ່ມບັນຊີ',
                                text: 'ສະໝັກສະມາຊິກເປັນທີ່ຮຽບຮ້ອຍແລ້ວ',
                                icon: 'success',
                                timer: 6000,
                                showConfirmButton: false
                            });
                        });
                        
                        </script>";
              // header("refresh:3; url=Table_emplyee.php");
              header("location: Table_emplyee.php");
            }
          }
        }
      } else {
        $_SESSION['error'] = "ມີຢ່າງຜິດພາດ";
        header("location: Table_emplyee.php");
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
