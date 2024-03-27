<?php
session_start();
require_once '../../connect-database/config.php';

// // Clear the $_SESSION variable
// $_SESSION = array();

// // Destroy the session
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../insert-info/img00/logo.jpg" rel="apple-touch-icon">
    <link href="../insert-info/img00/logo.jpg" rel="icon">
    <title>ຟອມເຂົ້າສູ່ລະບົບ</title>
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="login">
        <div class="box">
            <h1 class="text-center">ເຂົ້າສູ່ລະບົບ</h1>
            <!-- <hr style="width: 30%; margin-left: 35%; border-color: black; margin-bottom: 5%; margin-top: 5%;"> -->
            <!-- icon signin with  -->
            <!-- <div class="text-center mb-3">
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fa-brands fa-facebook"></i>
                </button>
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fa-brands fa-google-plus"></i>
                </button>
            </div> -->
            <form action="login_db.php" method="post">
                <!-- code php -->
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
                <div class="form-group mb-3">
                    <label class="form-label fw-bold" for="email">ອີເມວ</label><br>
                    <input name="email" type="email" class="form-control " placeholder="ປ້ອນທີ່ຢູ່ອີເມວ" name="email" aria-describedby="email">
                </div>
                <div class="form-group">
                    <label class="form-label fw-bold" for="password">ລະຫັດຜ່ານ</label>
                    <input name="password" type="password" class="form-control " autocomplete="current-password" required="" id="id_password" placeholder="ປ້ອນລະຫັດຜ່ານ"><br>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <!-- <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" value="1" id="form2Example3" name="remember" style="cursor: pointer;" />
                        <label class="form-check-label fw-bold" for="form2Example3">
                            ຈົດຈຳລະຫັດ & ອີເມວ
                        </label>
                    </div>
                    <a href="email/check_email.php" class=" text-body fw-bold" style="text-decoration: none;">ລືມລະຫັດຜ່ານແມ່ນບໍ່?</a> -->
                </div>
                <button class="btn btn-primary form-control" type="submit" name="login" style="padding-left: 1rem; padding-right: 1rem; text-align: center;">ເຂົ້າສູ່ລະບົບ</button>
                <p class="small fw-bold mt-4 pt-1 mb-0">ຍັງບໍ່ເປັນສະມາຊິກແມ່ນບໍ່? ຄິກທີ່ນິ້ເພື່ອ <a href="Regsiter_Admin.php" class="link-danger" style="text-decoration: none;">ສະໝັກສະມາຊິກ</a></p>
            </form>
        </div>
    </div>
</body>

</html>