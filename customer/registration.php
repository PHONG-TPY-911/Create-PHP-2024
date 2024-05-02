<?php
session_start();
require_once '../connect-database/config.php';


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

  <title>Register E-Job</title>

  <!--== Favicon ==-->
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />

  <!--== Google Fonts ==-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">


  <!--== Bootstrap CSS ==-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <!--== Icofont Icon CSS ==-->
  <link href="assets/css/icofont.css" rel="stylesheet" />
  <!--== Swiper CSS ==-->
  <link href="assets/css/swiper.min.css" rel="stylesheet" />
  <!--== Fancybox Min CSS ==-->
  <link href="assets/css/fancybox.min.css" rel="stylesheet" />
  <!--== Aos Min CSS ==-->
  <link href="assets/css/aos.min.css" rel="stylesheet" />
  <!--== Main Style CSS ==-->
  <link href="assets/css/style.css" rel="stylesheet" />
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

    <!--== Start Header Wrapper ==-->
    <header class="header-area transparent">
      <div class="container">
        <div class="row no-gutter align-items-center position-relative">
          <div class="col-12">
            <div class="header-align">
              <div class="header-align-start">
                <div class="header-logo-area">
                  <a href="index.html">
                    <img class="logo-main" src="assets/img/logo-light.png" alt="Logo" />
                    <img class="logo-light" src="assets/img/logo-light.png" alt="Logo" />
                  </a>
                </div>
              </div>
              <div class="header-align-center">
                <div class="header-navigation-area position-relative">
                  <ul class="main-menu nav">
                    <li><a href="index.html"><span>ໜ້າຫຼັກ</span></a></li>
                    <li><a href="job.html"><span>ປະກາດວຽກ</span></a></li>
                    <li><a href="candidate.html"><span>ບໍລີສັດ</span></a></li>
                    <li><a href="about-us.html"><span>ກ່ຽວກັບ</span></a></li>
                    <li><a href="contact.html"><span>ຕິດຕໍ່</span></a></li>

                    <div class="header-align-end">
                      <div class="header-action-area">
                        <a class="btn-login" href="login.html"><span></span> ເຂົ້າສູ່ລະບົບ</a>
                        <button class="btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                          <i class="icofont-navigation-menu"></i>
                        </button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </header>
    <!--== End Header Wrapper ==-->

    <main class="main-content">
      <!--== Start Page Header Area Wrapper ==-->
      <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
        <div class="container pt--0 pb--0">
          <div class="row">
            <div class="col-12">
              <div class="page-header-content">
                <h2 class="title">ລົງທະບຽນ</h2>
                <nav class="breadcrumb-area">
                  <ul class="breadcrumb justify-content-center">
                    <li><a href="index.html">ໜ້າຫຼັກ</a></li>
                    <li class="breadcrumb-sep">//</li>
                    <li>ລົງທະບຽນ</li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Page Header Area Wrapper ==-->

      <!--== Start Login Area Wrapper ==-->
      <section class="account-login-area">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-10 col-lg-7 col-xl-6">
              <div class="login-register-form-wrap register-form-wrap">
                <div class="login-register-form">
                  <div class="form-title">
                    <h4 class="title">ລົງທະບຽນນຳໃຊ້</h4>
                  </div>
                  <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="candidate-tab" data-bs-toggle="pill" data-bs-target="#candidate" type="button" role="tab" aria-controls="candidate" aria-selected="true"><i class="icofont-businessman"></i> ຜູ້ສະໝັກວຽກ</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="employer-tab" data-bs-toggle="pill" data-bs-target="#employer" type="button" role="tab" aria-controls="employer" aria-selected="false"><i class="icofont-bag-alt"></i> ບໍລິສັດ</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="candidate" role="tabpanel" aria-labelledby="candidate-tab">
                      <form action="../login_customer/Register_customer_insertInTo.php" method="post">
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
                              <input class="form-control" type="text" name="Name" placeholder="ຊື່">
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input class="form-control" type="text" name="Lname" placeholder="ນາມສະກຸນ">
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input class="form-control" type="email" name="Email" placeholder="ອີເມວ">
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input class="form-control" type="password" name="Password" placeholder="ລະຫັດ">
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input class="form-control" type="password" name="confirm_password" placeholder="ຢືນຢັນລະຫັດ">
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <!-- <button type="button" name="register" class="btn-theme">ລົງທະບຽນ</button> -->
                              <button type="button1" name="register" class="btn-theme">ລົງທະບຽນ ຜູ້ສະໝັກວຽກ</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="employer" role="tabpanel" aria-labelledby="employer-tab">
                      <form action="../login_company/register_company_db.php" method="post">

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
                              <input class="form-control" type="text" name="Name_company" placeholder="ຊື່ ບໍລິສັດ">
                            </div>
                          </div>
                          <!-- <div class="col-12">
                            <div class="form-group">
                              <input class="form-control" type="text" name="lname" placeholder="ນາມສະກຸນ">
                            </div>
                          </div> -->
                          <div class="col-12">
                            <div class="form-group">
                              <input class="form-control" type="email" name="Email" placeholder="ອີເມວ">
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input class="form-control" type="password" name="Password" placeholder="ລະຫັດ">
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input class="form-control" type="password" name="confirm" placeholder="ຢືນຢັນລະຫັດ">
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <button type="button1" name="login_company" class="btn-theme">ລົງທະບຽນ ບໍລິສັດ</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="login-register-form-info">
                    <p>ມີບັນຊີແລ້ວ? <a href="login.php">ເຂົ້າລະບົບ</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End Login Area Wrapper ==-->
    </main>

    <!--== Start Footer Area Wrapper ==-->
    <footer class="footer-area">
      <!--== Start Footer Bottom ==-->
      <div class="footer-bottom">
        <div class="container pt--0 pb--0">
          <div class="row">
            <div class="col-12">
              <div class="footer-bottom-content">
                <div class="social-icons">
                  <a href="https://www.facebook.com" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                  <a href="https://www.skype.com" target="_blank" rel="noopener"><i class="icofont-skype"></i></a>
                  <a href="https://twitter.com" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
                </div>
                <p class="copyright">© 2024 . 2ITCon2 <i class="icofont-heart"></i> by <a target="_blank" href="#">Group 101.</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Footer Bottom ==-->
    </footer>
    <!--== End Footer Area Wrapper ==-->
  </div>

  <!--=======================Javascript============================-->

  <!--=== jQuery Modernizr Min Js ===-->
  <script src="assets/js/modernizr.js"></script>
  <!--=== jQuery Min Js ===-->
  <script src="assets/js/jquery-main.js"></script>
  <!--=== jQuery Migration Min Js ===-->
  <script src="assets/js/jquery-migrate.js"></script>
  <!--=== jQuery Popper Min Js ===-->
  <script src="assets/js/popper.min.js"></script>
  <!--=== jQuery Bootstrap Min Js ===-->
  <script src="assets/js/bootstrap.min.js"></script>
  <!--=== jQuery Swiper Min Js ===-->
  <script src="assets/js/swiper.min.js"></script>
  <!--=== jQuery Fancybox Min Js ===-->
  <script src="assets/js/fancybox.min.js"></script>
  <!--=== jQuery Aos Min Js ===-->
  <script src="assets/js/aos.min.js"></script>
  <!--=== jQuery Counterup Min Js ===-->
  <script src="assets/js/counterup.js"></script>
  <!--=== jQuery Waypoint Js ===-->
  <script src="assets/js/waypoint.js"></script>

  <!--=== jQuery Custom Js ===-->
  <script src="assets/js/custom.js"></script>

</body>

</html>