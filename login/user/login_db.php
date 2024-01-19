<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
require_once '../../connect-database/config.php';
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນອີເມວ';
        header("location: login.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'ຮູບແບບອີເມວບໍ່ຖືກຕ້ອງ';
        header("location: login.php");
    } else if (empty($password)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນລະຫັດຜ່ານ';
        header("location: login.php");
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 5 ເຖິງ 20 ຕົວອັກສອນ';
        header("location: login.php");
    } else {
        try {
            $check_data = $conn->prepare("SELECT * FROM login WHERE email = :email");
            $check_data->bindParam(":email", $email);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);
            if ($check_data->rowCount() > 0) {
                if ($email == $row['email']) {
                    if (password_verify($password, $row['password'])) {
                        if ($row['urole'] == 'admin') {
                            $_SESSION['admin_login'] = $row['id'];
                            echo "<script>
                            $(document).ready(function() {
                                Swal.fire({
                                    title: 'ບັນຊີ ຜູ້ດູແລລະບົບ',
                                    text: 'ຍີນດີຕ້ອນຮັບ ເຂົ້າສູ່ເບື້ອງຫຼັງເວັບໄຊ້',
                                    icon: 'success',
                                    timer: 5000,
                                    showConfirmButton: false
                                });
                            });
                            </script>";
                            // header("refresh:3; url=../admin-new/index.php");
                        } elseif ($row['urole'] == 'company') {
                            $_SESSION['company_login'] = $row['id'];
                            echo "<script>
                                    $(document).ready(function() {
                                        Swal.fire({
                                            title: 'ບັນຊີຂອງ ບໍລິສັດ',
                                            text: 'ຍີນດີຕ້ອນຮັບ ເຂົ້າສູ່ເວັບໄຊ້',
                                            icon: 'success',
                                            timer: 5000,
                                            showConfirmButton: false
                                        });
                                    });
                                    </script>";
                            // header("refresh:3; url=../../company/123/index.php");
                        } elseif ($row['urole'] == 'user') {
                            $_SESSION['user_login'] = $row['id'];
                            echo "<script>
                                    $(document).ready(function() {
                                        Swal.fire({
                                            title: 'ບັນຊີຂອງ ຜູ້ໃຊ້ງານ',
                                            text: 'ຍີນດີຕ້ອນຮັບ ເຂົ້າສູ່ເວັບໄຊ້',
                                            icon: 'success',
                                            timer: 5000,
                                            showConfirmButton: false
                                        });
                                    });
                                    </script>";
                            header("refresh:3; url=index.php");
                        }
                    } else {
                        $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ';
                        header("location: login.php");
                    }
                } else {
                    $_SESSION['error'] = 'ອີເມວບໍ່ຖືກຕ້ອງ';
                    header("location: login.php");
                }
            } else {
                $_SESSION['error'] = "ບໍ່ມີຂໍ້ມູນຢູ່ໃນລະບົບ";
                header('location: login.php');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
