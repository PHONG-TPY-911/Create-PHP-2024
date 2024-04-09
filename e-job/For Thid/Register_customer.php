<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
require_once '../../connect-database/config.php';

if (isset($_POST['regsiter'])) {
  $Name = $_POST['name'];
  $Lname = $_POST['lname'];
  $Age = $_POST['age'];
  $DataOfBirth = $_POST['dataofbirth'];
  $Village = $_POST['village'];
  $District = $_POST['district'];
  $Province = $_POST['province'];
  $Address = $_POST['address'];
  $religion = $_POST['religion'];
  $Study = $_POST['study'];
  $Education_level = $_POST['education_level'];
  $Password = $_POST['password'];
  $C_password = $_POST['C_password'];
  $Email = $_POST['email'];
  $Tel = $_POST['tel'];
  $Status = 'User';
  $Profile_picture = $_FILES['profile_picture'];
  $Declaration = $_FILES['declaration'];
  $Score = $_FILES['score'];
  $Cv = $_FILES['cv'];

  //img Profile_picture
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Profile_picture['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew = rand() . "." . $fileActExt;
  $filePath = "uploads_Profile/" . $fileNew;

  //img Declaration
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Declaration['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew = rand() . "." . $fileActExt;
  $filePath = "uploads_Declaration/" . $fileNew;

  //img Score
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Score['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew = rand() . "." . $fileActExt;
  $filePath = "uploads_Score/" . $fileNew;

  //img Cv
  $allow = array('jpg', 'jpeg', 'png');
  $extension = explode(".", $Cv['name']);
  $fileActExt = strtolower(end($extension));
  $fileNew = rand() . "." . $fileActExt;
  $filePath = "uploads_Cv/" . $fileNew;

  if (empty($Province)) {
    $_SESSION['error'] = 'ກາລຸນາເລຶອກແຂວງ';
    header("location: Regsiter_Admin.php");
  } else if (empty($District)) {
    $_SESSION['error'] = 'ກາລຸນາເລຶອກເມືອງ';
    header("location: Regsiter_Admin.php");
  } else if (empty($Address)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນທີ່ຢູ່ປັດຈຸບັນ';
    header("location: Regsiter_Admin.php");
  } else {

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
                            try {
                              $check_email = $conn->prepare("SELECT Email FROM customer WHERE Email = :email");
                              $check_email->bindParam(":email", $Email);
                              $check_email->execute();
                              if ($check_email->rowCount() > 0) {
                                $_SESSION['warning'] = "ມີອິເມວນີ້ຢູ່ໃນລະບົບເເລ້ວ <a href='login.php'>ຄິກທີ່ນີ້</a> ເພື່ອເຂົ້າສູ່ລະບົບ";
                                header("location: index.php");
                              } else if (!isset($_SESSION['error'])) {
                                $passwordHash = password_hash($Password, PASSWORD_DEFAULT);
                                $stmt = $conn->prepare("INSERT INTO customer(Name, Lname, Age, DataOfBirth, Village, District, Province, Address, Religion, Study, Education_level, Tel, Email, Password, Status, Profile_picture, Declaration, Score, Cv)
                                                                    VALUES(:Name, :Lname, :Age, :DataOfBirth, :Village, :District, :Province, :Address, :Study, :Education_level, :Tel, :Email, :Password, :Status, :Profile_picture, :Declaration, :Score, :Cv)");
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
                                $stmt->bindParam(":Password", $passwordHash);
                                $stmt->bindParam(":Status", $Status);
                                $stmt->bindParam(":Profile_picture", $filePath1);
                                $stmt->bindParam(":Declaration", $filePath2);
                                $stmt->bindParam(":Score", $filePath3);
                                $stmt->bindParam(":Cv", $filePath4);
                                $stmt->execute();
                                // $_SESSION['success'] = "ສະໝັກສະມາຊີກຮຽບຮ້ອຍ!<a href='login.php' class='alert-link' >ຄິກທີ່ນີ້</a>ເພື່ອເຂົ້າສູ່ລະບົບ";
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
                                header("refresh:3; url=login.php");
                              } else {
                                $_SESSION['error'] = "ມີຢ່າງຜິດພາດ";
                                header("location: Regsiter_Admin.php");
                              }
                            } catch (PDOException $e) {
                              echo $e->getMessage();
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
}
?>

//     // IF input
//     if (empty($Name)) {
//         $_SESSION['error'] = 'ກາລຸນາປ້ອນຊື່';
//         header("location: Regsiter_Admin.php");
//     } else if (empty($Lname)) {
//         $_SESSION['error'] = 'ກາລຸນາປ້ອນນາມສະກຸນ';
//         header("location: Regsiter_Admin.php");
//     } else if (empty($Province)) {
//         $_SESSION['error'] = 'ກາລຸນາເລຶອກແຂວງ';
//         header("location: Regsiter_Admin.php");
//     } else if (empty($District)) {
//         $_SESSION['error'] = 'ກາລຸນາເລຶອກເມືອງ';
//         header("location: Regsiter_Admin.php");
//     } else if (empty($Address)) {
//         $_SESSION['error'] = 'ກາລຸນາປ້ອນທີ່ຢູ່ປັດຈຸບັນ';
//         header("location: Regsiter_Admin.php");
//     } else if (empty($Tel)) {
//         $_SESSION['error'] = 'ກາລຸນາປ້ອນເບີໂທ';
//         header("location: Regsiter_Admin.php");
//     } else if (empty($Position)) {
//         $_SESSION['error'] = 'ກາລຸນາປ້ອນຕຳແໜ່ງ';
//         header("location: Regsiter_Admin.php");
//     } else if (empty($Email)) {
//         $_SESSION['error'] = 'ກາລຸນາປ້ອນອີເມວ';
//         header("location: Regsiter_Admin.php");
//     } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
//         $_SESSION['error'] = 'ຮູບແບບອິເມວບໍ່ຖືກຕ້ອງ!';
//         header("location: Regsiter_Admin.php");
//     } else if (empty($Password)) {
//         $_SESSION['error'] = 'ກາລຸນາປ້ອນລະຫັດຜ່ານ';
//         header("location: Regsiter_Admin.php");
//     } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
//         $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 5 ເຖິງ 10 ຕົວອັກສອນ';
//         header("location: Regsiter_Admin.php");
//     } else if (empty($C_password)) {
//         $_SESSION['error'] = 'ກາລຸນາຢືນຢັ້ນລະຫັດຜ່ານ';
//         header("location: Regsiter_Admin.php");
//     } else if ($Password != $C_password) {
//         $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ຕົງກັນ';
//         header("location: Regsiter_Admin.php");
//     } else {
//         try {
//             $check_email = $conn->prepare("SELECT Email FROM admin WHERE Email = :email");
//             $check_email->bindParam(":email", $Email);
//             $check_email->execute();
//             if ($check_email->rowCount() > 0) {
//                 $_SESSION['warning'] = "ມີອິເມວນີ້ຢູ່ໃນລະບົບເເລ້ວ <a href='login.php'>ຄິກທີ່ນີ້</a> ເພື່ອເຂົ້າສູ່ລະບົບ";
//                 header("location: index.php");
//             } else if (!isset($_SESSION['error'])) {
//                 $passwordHash = password_hash($Password, PASSWORD_DEFAULT);
//                 $stmt = $conn->prepare("INSERT INTO admin(Name, Lname, Age, Village, District, Province, Address, Tel, Position, Email, Password, ID_status)
//                                         VALUES(:Name, :Lname, :Age, :Village, :District, :Province, :Address, :Tel, :Position, :Email, :Password, :ID_status)");
//                 $stmt->bindParam(":Name", $Name);
//                 $stmt->bindParam(":Lname", $Lname);
//                 $stmt->bindParam(":Age", $Age);
//                 $stmt->bindParam(":Village", $Village);
//                 $stmt->bindParam(":District", $District);
//                 $stmt->bindParam(":Province", $Province);
//                 $stmt->bindParam(":Address", $Address);
//                 $stmt->bindParam(":Tel", $Tel);
//                 $stmt->bindParam(":Position", $Position);
//                 $stmt->bindParam(":Email", $Email);
//                 $stmt->bindParam(":Password", $passwordHash);
//                 $stmt->bindParam(":ID_status", $ID_status);
//                 $stmt->execute();
//                 $_SESSION['success'] = "ສະໝັກສະມາຊີກຮຽບຮ້ອຍ!<a href='login.php' class='alert-link' >ຄິກທີ່ນີ້</a>ເພື່ອເຂົ້າສູ່ລະບົບ";
//                 echo "<script>
//                     $(document).ready(function() {
//                         Swal.fire({
//                             title: 'ເພີ່ມຂໍ້ມູນແອັດມີນ',
//                             text: 'ສະໝັກສະມາຊິກເປັນທີ່ຮຽບຮ້ອຍແລ້ວ',
//                             icon: 'success',
//                             timer: 5000,
//                             showConfirmButton: false
//                         });
//                     });
//                     </script>";
//                 header("refresh:3; url=login.php");
//             } else {
//                 $_SESSION['error'] = "ມີຢ່າງຜິດພາດ";
//                 header("location: Regsiter_Admin.php");
//             }
//         } catch (PDOException $e) {
//             echo $e->getMessage();
//         }
//     }
// }

?>