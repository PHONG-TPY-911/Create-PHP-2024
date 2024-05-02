<?php
session_start();

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Finate - Job Portal Website Template Using Bootstrap 5" />
  <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive" />
  <meta name="author" content="hastech" />

  <title>Longin E-Job</title>

</head>
<style>
  .error {
    width: 92%;
    margin: 0px auto;
    padding: 10px;
    color: #a94442;
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

  <!--wrapper start-->
  <div class="wrapper">

      <!--== Start Login Area Wrapper ==-->
      <section class="account-login-area">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <div class="login-register-form-wrap">
                <div class="login-register-form">
                  <div class="form-title">
                    <h4 class="title">ເຂົ້າລະບົບຜູ້ໃຊ້ງານທົ່ວໄປ</h4>
                  </div>
                  <form action="../login_customer/register_login_db.php" method="POST">
                    <!-- Check error -->
                    <?php if (isset($_SESSION['error'])) { ?>
                      <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                      </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['success'])) { ?>
                      <div class="alert alert-success" role="alert">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                      </div>
                    <?php } ?>

                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <input class="form-control" type="email" name="Email" placeholder="Email">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <input class="form-control" type="password" name="Password" placeholder="Password">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <div class="remember-forgot-info">
                            <div class="remember">
                              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">ຈື່ລະຫັດ</label>
                            </div>
                            <div class="forgot-password">
                              <span><a href="candidate-details.html">ເຂົ້າລະບົບບໍລິສັດ</a></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <button name="login_customer" class="btn-theme">ເຂົ້າລະບົບ</button>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="login-register-form-info">
                    <p>ບໍ່ມີບັນຊີ? <a href="registration.php">ສະໝັກ</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

</body>

</html>