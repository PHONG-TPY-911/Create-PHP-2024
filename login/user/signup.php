<?php
session_start();
require_once '../../connect-database/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../insert-info/img00/logo.jpg" rel="apple-touch-icon">
    <link href="../insert-info/img00/logo.jpg" rel="icon">
    <title>ຟອມສະໝັກສະມາຊີກ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: none;

    }
    .container form {
        margin-top: 5rem;
        width: 35rem;
        margin: 1em auto;
        box-shadow: 0px 0px 15px 0px #d6d6d6;
        padding: 1em 1em 1em 1em;
        border-radius: 8px 8px 8px 8px;
        background-color: #f7f6f6;
    }
    .btn {
        text-align: center;
        margin-left: 80px;
        border-radius: 10px;
    }
    .container form input {
        border-radius: 10px;
    }
    .error {
        width: 92%;
        margin: 0px auto;
        padding: 10px;
        color: #000;
        background: #f2dede;
        border-radius: 5px;
        text-align: left;
    }
    .success {
        color: #3c763d;
        background: #dff9d8;
        border: 1px solid #3c763d;
        margin-bottom: 20px;
    }
</style>
<body>
    <div class="container">
        <!-- <hr style="width:50%; margin-left:25% !important; margin-right:25% !important;" /> -->
        <form action="signup_db.php" method="post">
            <h2 class="mt-0 text-center">ສະໝັກສະມາຊິກ</h2>
            <hr>
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role=alert>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php  } ?>
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role=alert>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php  } ?>
            <?php if (isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role=alert>
                    <?php
                    echo $_SESSION['warning'];
                    unset($_SESSION['warning']);
                    ?>
                </div>
            <?php  } ?>
            <!-- content -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="name" class="form-label fw-bold">ຊື່</label>
                    <input type="text" class="form-control " name="name" aria-describedby="name" placeholder="ປ້ອນຊື່ຂອງທ່ານ...">
                </div>

                <div class="col-md-6 mb-4 ">
                    <label for="lastName" class="form-label fw-bold">ນາມສະກຸນ</label>
                    <input type="text" class="form-control " name="lastname" aria-describedby="lastname" placeholder="ປ້ອນນາມສະກຸນ...">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="street" class="form-label fw-bold">ຖະໜົນທີ່ & ຮ່ອມ</label>
                    <input type="text" class="form-control " name="street" aria-describedby="street" placeholder="ປ້ອນຖະໜົນທີ່ & ຮ່ອມ...">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="village" class="form-label fw-bold">ບ້ານ</label>
                    <input type="text" class="form-control " name="village" aria-describedby="village" placeholder="ປ້ອນບ້ານ...">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="district" class="form-label fw-bold">ເມືອງ</label>
                    <input type="text" class="form-control " name="district" aria-describedby="district" placeholder="ປ້ອນເມືອງ...">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="province" class="form-label fw-bold">ແຂວງ</label>
                    <input type="text" class="form-control " name="province" aria-describedby="province" placeholder="ປ້ອນແຂວງ...">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tel" class="form-label fw-bold">ເບີໂທ</label>
                    <input type="number" class="form-control " name="tel" aria-describedby="tel" placeholder="ປ້ອນເບີໂທ...">
                </div>
                <div class=" col-md-6 mb-3">
                    <label for="email" class="form-label fw-bold">ອີເມວ</label>
                    <input type="email" class="form-control " name="email" aria-describedby="email" placeholder="ປ້ອນອີເມວ...">
                </div>
                <div class=" col-md-6 mb-3">
                    <label for="password" class="form-label fw-bold">ລະຫັດຜ່ານ</label>
                    <input type="password" class="form-control " name="password" placeholder="ປ້ອນລະຫັດຜ່ານ...">
                </div>
                <div class=" col-md-6 mb-3">
                    <label for="confirm password" class="form-label fw-bold">ຢືນຍັນລະຫັດຜ່ານ</label>
                    <input type="password" class="form-control " name="c_password" placeholder="ຢືນຍັນລະຫັດຜ່ານ...">
                </div>
            </div>
            <!-- content -->
            <div class="btn">
                <button type="submit" name="signup" class="btn btn-primary fw-bold text-center" style="padding-left: 2.5rem; padding-right: 2.5rem; margin-top: 10px; text-align: center;">ສະໝັກສະມາຊິກ</button>
            </div>
            <p class="small fw-bold mt-3 pt-1 mb-0 text-center">ເປັນສະມາຊິກແລ້ວບໍ່? ຄິກທີ່ນິ້ເພື່ອ <a href="login.php" class="link-danger" style="text-decoration: none;">ເຂົ້າສູ່ລະບົບ</a></p>
        </form>
    </div>
    <!-- link script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>