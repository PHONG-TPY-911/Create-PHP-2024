<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
require_once '../../connect-database/config.php';

if (isset($_POST['regsiter'])) {
    $Name = $_POST['name'];
    $Lname = $_POST['lname'];
    $Age = $_POST['age'];
    $Village = $_POST['village'];
    $District = $_POST['district'];
    $Province = $_POST['province'];
    $Address = $_POST['address'];
    $Tel = $_POST['tel'];
    $Position = $_POST['position'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $C_password = $_POST['C_password'];
    $ID_status = 3;
    // IF input
    if (empty($Name)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນຊື່';
        header("location: Regsiter_Admin.php");
    } else if (empty($Lname)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນນາມສະກຸນ';
        header("location: Regsiter_Admin.php");
    } else if (empty($Province)) {
        $_SESSION['error'] = 'ກາລຸນາເລຶອກແຂວງ';
        header("location: Regsiter_Admin.php");
    } else if (empty($District)) {
        $_SESSION['error'] = 'ກາລຸນາເລຶອກເມືອງ';
        header("location: Regsiter_Admin.php");
    } else if (empty($Address)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນທີ່ຢູ່ປັດຈຸບັນ';
        header("location: Regsiter_Admin.php");
    } else if (empty($Tel)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນເບີໂທ';
        header("location: Regsiter_Admin.php");
    } else if (empty($Position)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນຕຳແໜ່ງ';
        header("location: Regsiter_Admin.php");
    } else if (empty($Email)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນອີເມວ';
        header("location: Regsiter_Admin.php");
    } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'ຮູບແບບອິເມວບໍ່ຖືກຕ້ອງ!';
        header("location: Regsiter_Admin.php");
    } else if (empty($Password)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນລະຫັດຜ່ານ';
        header("location: Regsiter_Admin.php");
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 5 ເຖິງ 10 ຕົວອັກສອນ';
        header("location: Regsiter_Admin.php");
    } else if (empty($C_password)) {
        $_SESSION['error'] = 'ກາລຸນາຢືນຢັ້ນລະຫັດຜ່ານ';
        header("location: Regsiter_Admin.php");
    } else if ($Password != $C_password) {
        $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ຕົງກັນ';
        header("location: Regsiter_Admin.php");
    } else {
        try {
            $check_email = $conn->prepare("SELECT Email FROM admin WHERE Email = :email");
            $check_email->bindParam(":email", $Email);
            $check_email->execute();
            if ($check_email->rowCount() > 0) {
                $_SESSION['warning'] = "ມີອິເມວນີ້ຢູ່ໃນລະບົບເເລ້ວ <a href='login.php'>ຄິກທີ່ນີ້</a> ເພື່ອເຂົ້າສູ່ລະບົບ";
                header("location: index.php");
            } else if (!isset($_SESSION['error'])) {
                $passwordHash = password_hash($Password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO admin(Name, Lname, Age, Village, District, Province, Address, Tel, Position, Email, Password, ID_status)
                                        VALUES(:Name, :Lname, :Age, :Village, :District, :Province, :Address, :Tel, :Position, :Email, :Password, :ID_status)");
                $stmt->bindParam(":Name", $Name);
                $stmt->bindParam(":Lname", $Lname);
                $stmt->bindParam(":Age", $Age);
                $stmt->bindParam(":Village", $Village);
                $stmt->bindParam(":District", $District);
                $stmt->bindParam(":Province", $Province);
                $stmt->bindParam(":Address", $Address);
                $stmt->bindParam(":Tel", $Tel);
                $stmt->bindParam(":Position", $Position);
                $stmt->bindParam(":Email", $Email);
                $stmt->bindParam(":Password", $passwordHash);
                $stmt->bindParam(":ID_status", $ID_status);
                $stmt->execute();
                $_SESSION['success'] = "ສະໝັກສະມາຊີກຮຽບຮ້ອຍ!<a href='login.php' class='alert-link' >ຄິກທີ່ນີ້</a>ເພື່ອເຂົ້າສູ່ລະບົບ";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'ເພີ່ມຂໍ້ມູນແອັດມີນ',
                            text: 'ສະໝັກສະມາຊິກເປັນທີ່ຮຽບຮ້ອຍແລ້ວ',
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

?>