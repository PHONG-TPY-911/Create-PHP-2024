<?php
session_start();
require_once '../../connect-database/config.php'
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    * {
        padding: 0;
        margin: 0;
    }
    body{
        background-image: url('image/wallpaeper.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
    .center {
        text-align: center;
    }
    .login {
        margin-top: 10%;
    }
    .box {
        width: 30rem;
        margin: 1.8em auto;
        box-shadow: 0px 0px 15px 0px #d6d6d6;
        padding: 1em 1em 1em 1em;
        border-radius: 8px 8px 8px 8px;
        background-color: #f7f6f6;
    }
    .box i {
        color: #0066CC;
        font-size: 30px;

        margin-top: 1%;
    }
    p {
        margin-top: 15px;
        text-align: center;
    }
    .login .box hr {
        width: 40px;
        margin-left: 45px;
        border-color: black;
    }
    .form-group input {
        border-radius: 10px;
        padding: 10px;
    }
    .btn {
        border-radius: 10px;
    }
    .error {
        width: 92%;
        margin: 0px auto;
        padding: 10px;
        background: #f2dede;
        border-radius: 10px;
        text-align: left;
        color: #000;
    }
    .success {
        color: #3c763d;
        background: #dff9d8;
        border: 1px solid #3c763d;
        margin-bottom: 20px;
    }
    @media (max-width: 450px) {
        .login {
            height: 100%;
        }
    }
</style>
<body>
    <!-- login -->
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

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fa-brands fa-github"></i>
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
                    <input name="email" type="email" value="<?php if (isset($_COOKIE['admin_login'])) { echo $_COOKIE['admin_login']; } ?>" class="form-control " placeholder="ປ້ອນທີ່ຢູ່ອີເມວ" name="email" aria-describedby="email">
                </div>
                <div class="form-group">
                    <label class="form-label fw-bold" for="password">ລະຫັດຜ່ານ</label>
                    <input name="password" type="password" value="<?php if (isset($_COOKIE['admin_password'])) { echo $_COOKIE['admin_login']; } ?>" class="form-control " autocomplete="current-password" required="" id="id_password" placeholder="ປ້ອນລະຫັດຜ່ານ"><br>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Checkbox -->
                    <!-- <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox"  <?php if (isset($_COOKIE['admin_login'])) { ?> checked <?php  }  ?> value="1" id="form2Example3" name="remember" style="cursor: pointer;" />
                        <label class="form-check-label fw-bold" for="form2Example3">
                            ຈົດຈຳລະຫັດ & ອີເມວ
                        </label>
                    </div>
                    <a href="email/check_email.php" class=" text-body fw-bold" style="text-decoration: none;">ລືມລະຫັດຜ່ານແມ່ນບໍ່?</a> -->
                </div>
                <button class="btn btn-primary form-control" type="submit" name="signin" style="padding-left: 1rem; padding-right: 1rem; text-align: center;">ເຂົ້າສູ່ລະບົບ</button>
                <p class="small fw-bold mt-4 pt-1 mb-0">ຍັງບໍ່ເປັນສະມາຊິກແມ່ນບໍ່? ຄິກທີ່ນິ້ເພື່ອ <a href="signup.php" class="link-danger" style="text-decoration: none;">ສະໝັກສະມາຊິກ</a></p>
            </form>
        </div>
    </div>
</body>

</html>