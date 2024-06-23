<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php

session_start();
require_once '../connect-database/config.php';
// $minLength = 6;

if (isset($_POST['login_customer'])) {
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];

  if (empty($Email)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນອີເມວ';
    header("location: ../customer/login.php");
  } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'ຮູບແບບອີເມວບໍ່ຖືກຕ້ອງ';
    header("location: ../customer/login.php");
  } else if (empty($Password)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນລະຫັດຜ່ານ';
    header("location: ../customer/login.php");
    // } 
    // else if (strlen($Password) < $minLength) {
    //   $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 6 ຕົວອັກສອນ';
    //   header("location:../customer/login.php");
  } else {

    try {
      //customer
      $check_data_customer = $conn->prepare("SELECT * FROM customer WHERE Email = :Email");
      $check_data_customer->bindParam(":Email", $Email);
      $check_data_customer->execute();
      $user = $check_data_customer->fetch(PDO::FETCH_ASSOC);

      //admin
      // $check_data_customer = $conn->prepare("SELECT * FROM admin WHERE Email = :Email");
      // $check_data_customer->bindParam(":Email", $Email);
      // $check_data_customer->execute();
      // $user = $check_data_customer->fetch(PDO::FETCH_ASSOC);

      //company
      $check_data_company = $conn->prepare("SELECT * FROM company WHERE Email = :Email");
      $check_data_company->bindParam(":Email", $Email);
      $check_data_company->execute();
      $company = $check_data_company->fetch(PDO::FETCH_ASSOC);

      //employee of company
      $check_data_employee = $conn->prepare("SELECT * FROM employees WHERE Email = :Email");
      $check_data_employee->bindParam(":Email", $Email);
      $check_data_employee->execute();
      $employee = $check_data_employee->fetch(PDO::FETCH_ASSOC);


      //Todo check login customer
      if ($check_data_customer->rowCount() > 0) {
        if ($Email == $user['Email']) {
          if (password_verify($Password, $user['Password'])) {
            if ($user['Status'] == 'user') {
              $_SESSION['user_login'] = $user['ID'];
              echo "<script>
                      $(document).ready(function() {
                          Swal.fire({
                              title: 'ບັນຊີ ຜູ້ດູສະໝັກວຽກ',
                              text: 'ຍີນດີຕ້ອນຮັບ ເຂົ້າສູ່ຜູ້ສະໝັກວຽກ',
                              icon: 'success',
                              timer: 5000,
                              showConfirmButton: false
                          });
                      });
                      </script>";

              header("refresh:2; url=../customer/candidate-details-skill-add.php");
            }
          } else {
            $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ';
            header("location: ../customer/login.php");
          }
        } else {
          $_SESSION['error'] = 'ອີເມວບໍ່ຖືກຕ້ອງ';
          header("location: ../customer/login.php");
        }
      } else if ($check_data_company->rowCount() > 0) {
        if ($Email == $company['Email']) {
          if (password_verify($Password, $company['Password'])) {
            if ($company['Status'] == 'company') {
              $_SESSION['company_login'] = $company['ID'];
              echo "<script>
                      $(document).ready(function() {
                          Swal.fire({
                              title: 'ບັນຊີ ບໍລິສັດ',
                              text: 'ຍີນດີຕ້ອນຮັບ ເຂົ້າສູ່ບໍລິສັດ',
                              icon: 'success',
                              timer: 5000,
                              showConfirmButton: false
                          });
                      });
                      </script>";

              header("refresh:2; url=../company/company-details.php");
            }
          } else {
            $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ';
            header("location: ../customer/login.php");
          }
        } else {
          $_SESSION['error'] = 'ອີເມວບໍ່ຖືກຕ້ອງ';
          header("location: ../customer/login.php");
        }
      } else if ($check_data_employee->rowCount() > 0) {
        if ($Email == $employee['Email']) {
          if (password_verify($Password, $employee['Password'])) {
            // Check if the employee has a valid company ID
            $check_employee_company = $conn->prepare("SELECT * FROM company WHERE ID = :ID_company");
            $check_employee_company->bindParam("ID_company", $employee['ID_company']);
            $check_employee_company->execute();
            if ($check_employee_company->rowCount() > 0) {
              // if ($employee['Status'] == 'company') {
              $_SESSION['employee_login'] = $employee['ID'];
              echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'ບັນຊີ ບໍລິສັດ',
                            text: 'ຍີນດີຕ້ອນຮັບ ເຂົ້າສູ່ບໍລິສັດ',
                            icon: 'success',
                            timer: 5000,
                            showConfirmButton: false
                        });
                    });
                    </script>";

              // header("refresh:2; url=../company/company-de")  ຂ;
              header("location: ../company/admin/Index.php");
            }
            // }
          } else {
            $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ';
            header("location: ../customer/login.php");
          }
        } else {
          $_SESSION['error'] = 'ອີເມວບໍ່ຖືກຕ້ອງ';
          header("location: ../customer/login.php");
        }
      } else {
        $_SESSION['error'] = "ບໍ່ມີຂໍ້ມູນຢູ່ໃນລະບົບ";
        header('location: ../customer/login.php');
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
?>