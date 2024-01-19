<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
require_once '../../connect-database/config.php';
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $street = $_POST['street'];
    $village = $_POST['village'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $urole = 'user';
    if (empty($name)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນຊື່';
        header("location: signup.php");
    } else if (empty($lastname)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນນາມສະກຸນ';
        header("location: signup.php");
    } else if (empty($street)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນ ຖະໜົນທີ່ & ຮ່ອມ';
        header("location: signup.php");
    } else if (empty($village)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນບ້ານ';
        header("location: signup.php");
    } else if (empty($district)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນເມືອງ';
        header("location: signup.php");
    } else if (empty($province)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນແຂວງ';
        header("location: signup.php");
    } else if (empty($tel)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນເບີໂທ';
        header("location: signup.php");
    } else if (empty($email)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນອິເມວ';
        header("location: signup.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'ຮູບແບບອິເມວບໍ່ຖືກຕ້ອງ!';
        header("location: signup.php");
    } else if (empty($password)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນລະຫັດຜ່ານ';
        header("location: signup.php");
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 5 ເຖິງ 10 ຕົວອັກສອນ';
        header("location: signup.php");
    } else if (empty($c_password)) {
        $_SESSION['error'] = 'ກາລຸນາຢືນຢັ້ນລະຫັດຜ່ານ';
        header("location: signup.php");
    } else if ($password != $c_password) {
        $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ຕົງກັນ';
        header("location: signup.php");
    } else {
        try {
            //Protected form injection
            $check_email = $conn->prepare("SELECT email FROM login WHERE email = :email");
            $check_email->bindParam(":email", $email);
            $check_email->execute();
            // $row = $check_email->fetch(PDO::FETCH_ASSOC);
            if ($check_email->rowCount() > 0) {
                $_SESSION['warning'] = "ມີອິເມວນີ້ຢູ່ໃນລະບົບເເລ້ວ <a href='login.php'>ຄິກທີ່ນີ້</a> ເພື່ອເຂົ້າສູ່ລະບົບ";
                header("location: signup.php");
            } else if (!isset($_SESSION['error'])) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO login(name, lastname, street, village, district, province, tel, email, password, urole)
                                            VALUES(:name, :lastname, :street, :village, :district, :province, :tel, :email, :password, :urole)");
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":lastname", $lastname);
                $stmt->bindParam(":street", $street);
                $stmt->bindParam(":village", $village);
                $stmt->bindParam(":district", $district);
                $stmt->bindParam(":province", $province);
                $stmt->bindParam(":tel", $tel);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $passwordHash);
                $stmt->bindParam(":urole", $urole);
                $stmt->execute();
                $_SESSION['success'] = "ສະໝັກສະມາຊີກຮຽບຮ້ອຍ!<a href='login.php' class='alert-link'>ຄິກທີ່ນີ້</a>ເພື່ອເຂົ້າສູ່ລະບົບ";
                echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                title: 'ເພີ່ມຂໍ້ມູນ',
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
                header("location: login.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>