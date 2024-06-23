<?php
session_start();
require_once '../connect-database/config.php';
// if (!isset($_SESSION['user_login'])) {
//   $_SESSION['error'] = 'ກາລຸນາເຂົ້າສູ່ລະບົບ!';
//   header("location: login.php");
// }
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

  <title>Resgister Form E-Job</title>

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

<body>

  <!--wrapper start-->
  <div class="wrapper">
    <?php
    if (isset($_SESSION['user_login']))
      $user_id = $_SESSION['user_login'];
    // echo 'User ID' . $user_id;
    // $stmt = $conn->query("SELECT * FROM taskinformation");
    $stmt = $conn->query("SELECT * FROM taskinformation WHERE ID = $user_id ");
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
    // Decode JSON data
    $skills = json_decode($user_data['Skill'], true);
    $Languages = json_decode($user_data['Language'], true);
    // Table customer
    $stmt = $conn->query("SELECT * FROM customer WHERE ID = $user_id ");
    $user_data_customer = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <!--== Start Header Wrapper ==-->
    <header class="header-area transparent">
      <div class="container">
        <div class="row no-gutter align-items-center position-relative">
          <div class="col-12">
            <div class="header-align">
              <div class="header-align-start">
                <div class="header-logo-area">
                  <a href="index.php">
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
                        <!--==  <a href="login.html"><span></span> Username</a> ==-->
                        <div class="dropdown">
                          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            USER Name
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">ກ່ຽວກັບຂ້ອຍ</a></li>
                            <li>
                              <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="login.html">ອອກລະບົບ</a></li>
                          </ul>
                        </div>
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
                <h2 class="title">ຂໍ້ມູນສ່ວນຕົວ</h2>
                <nav class="breadcrumb-area">
                  <ul class="breadcrumb justify-content-center">
                    <li><a href="index.html">ໜ້າຫຼັກ</a></li>
                    <li class="breadcrumb-sep">//</li>
                    <li>ຂໍ້ມູນສ່ວນຕົວ</li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Page Header Area Wrapper ==-->

      <!--== Start Team Details Area Wrapper ==-->
      <section class="team-details-area">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="team-details-wrap">
                <div class="team-details-info">
                  <div class="thumb">
                    <img src="../folder-image/image-profile/<?= $user_data_customer['Profile_picture'] ?>" width="130" height="130" alt="ຮູບໂປຣຟາຍ">
                  </div>
                  <div class="content">
                    <h4 class="title"><?= $user_data_customer['Name'] ?></h4>
                    <h5 class="sub-title"><?= $user_data_customer['Study'] ?></h5>
                    <ul class="info-list">
                      <a style="color:#00CC00" href="https://www.google.com/maps/place/%E0%B9%80%E0%B8%A7%E0%B8%B5%E0%B8%A2%E0%B8%87%E0%B8%88%E0%B8%B1%E0%B8%99%E0%B8%97%E0%B8%99%E0%B9%8C/@17.9605855,102.5233634,12z/data=!3m1!4b1!4m6!3m5!1s0x3124688606ed7b21:0x1f93b18618c1eedf!8m2!3d17.9757058!4d102.6331035!16zL20vMGZ0cDg?entry=ttu" target="_blank">
                        <li><i class="icofont-location-pin" style="color:#00CC00"></i> <?= $user_data_customer['Province'] ?>
                      </a> , <?= $user_data_customer['Nationality'] ?></li>
                    </ul> <br>
                    <button onclick="window.location.href = 'candidate-details-skill-add.php';" type="button" class="btn-theme">ກ່ຽວກັບຂ້ອຍ</button>
                    <button onclick="window.location.href = 'candidate-details.php';" type="button" class="btn-theme">ຂໍ້ມູນທົ່ວໄປ</button>
                  </div>
                </div>
                <div class="team-details-btn">
                  <input type="file" id="img" name="declaration" accept="image/*"> <br> <br>
                  <!-- <button type="button" class="btn-theme">ປ່ຽນຮູບ</button> -->
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-7 col-xl-8">
              <div class="team-details-item">
                <div class="widget-item widget-contact">
                  <div class="widget-contact-form">
                    <div class="content">
                      <h4 class="title" name="job_content">ກ່ຽວກັບຂ້ອຍ</h4>
                      <p class="desc"> <?= $user_data['Job_content'] ?></p>
                    </div>
                    <hr>
                    <div class="content-list-wrap">
                      <div class="content mb--0">
                        <h4 class="title">ພື້ນຖານຄອມພິວເຕີ</h4>
                        <ul class="team-details-list mb--0">
                          <?php if (!empty($skills)) : ?>
                            <?php foreach ($skills as $skill) : ?>
                              <li><i class="icofont-check"></i><?= htmlspecialchars($skill, ENT_QUOTES, 'UTF-8') ?></li>
                            <?php endforeach; ?>
                          <?php else : ?>
                            <li>ຍັງບໍ່ມີຂໍ້ມູນ Skiil</li>
                          <?php endif; ?>
                        </ul>
                      </div>
                      <div class="content mb--0">
                        <h4 class="title">ທັກສະດ້ານພາສາ</h4>
                        <ul class="team-details-list mb--0">
                          <?php if (!empty($Languages)) : ?>
                            <?php foreach ($Languages as $Language) : ?>
                              <li><i class="icofont-check"></i><?= htmlspecialchars($Language, ENT_QUOTES, 'UTF-8') ?></li>
                            <?php endforeach; ?>
                          <?php else : ?>
                            <li>ຍັງບໍ່ມີຂໍ້ມູນ Language</li>
                          <?php endif; ?>
                        </ul>
                      </div>
                    </div>
                    <hr>
                    <div class="content-list-wrap">
                      <div class="content mb--0">
                        <p class="title">ທັກສະເພີ່ມເຕີມ</p>
                        <ul class="team-details-list mb--0">
                          <p class="desc"> <?= $user_data['Skill_Other'] ?></p>
                        </ul>
                      </div>
                      <div class="content mb--0">
                        <p class="title">ທັກສະເພີ່ມເຕີມ</p>
                        <ul class="team-details-list mb--0">
                          <p class="desc"> <?= $user_data['Language_Other'] ?></p>
                        </ul>
                      </div>
                    </div>
                    <!-- <div class="content">
                      <h4 class="title" name="job_content">Skill ອື່ນໆ</h4>
                      <p class="desc"> <?= $user_data['Job_content'] ?></p>
                    </div>
                    </div> -->


                    <!--== Message Notification ==-->
                    <div class="form-message"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-xl-4">
              <div class="team-sidebar">
                <div class="widget-item">
                  <div class="widget-title">
                    <h3 class="title">ຂໍ້ມູນທົ່ວໄປ</h3>
                  </div>
                  <div class="summery-info">
                    <table class="table">

                      <?php
                      $stmt = $conn->query("SELECT * FROM customer WHERE ID = $user_id ");
                      $show_data_user = $stmt->fetchAll();

                      foreach ($show_data_user as $user) {

                      ?>

                        <tbody>
                          <tr>
                            <td class="table-name">ສາຂາຮຽນ</td>
                            <td class="dotted">:</td>
                            <td><?= $user['Study'] ? $user['Study'] : 'ບັງບໍ່ມີຂໍ້ມູນ'; ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ລະດັບການສຶກສາ</td>
                            <td class="dotted">:</td>
                            <td><?= $user['Education_level'] ? $user['Education_level'] : 'ບັງບໍ່ມີຂໍ້ມູນ'; ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ສະຖະນະ</td>
                            <td class="dotted">:</td>
                            <td><?= $user['Status'] ? $user['Status'] : 'ບັງບໍ່ມີຂໍ້ມູນ' ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ເພດ</td>
                            <td class="dotted">:</td>
                            <td><?= $user['Gender'] ? $user['Gender'] : 'ບັງບໍ່ມີຂໍ້ມູນ'; ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ອາຍຸ</td>
                            <td class="dotted">:</td>
                            <td><?= $user['Age'] ? $user['Age'] : 'ບັງບໍ່ມີຂໍ້ມູນ'; ?></td>
                          </tr>

                          <tr>
                            <td class="table-name">ວັນ/ເດືອນ/ປີ</td>
                            <td class="dotted">:</td>
                            <td>
                              <?php
                              if (isset($user['DataOfBirth']) && $user['DataOfBirth'] != '') {
                                // Convert to timestamp and format the date
                                $timestamp = strtotime($user['DataOfBirth']);
                                echo date('Y-m-d', $timestamp);
                              } else {
                                echo 'ບັງບໍ່ມີຂໍ້ມູນ';
                              }
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <td class="table-name">ອີເມວ</td>
                            <td class="dotted">:</td>
                            <td><?= $user['Email']; ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ເບີຕິດຕໍ່</td>
                            <td class="dotted">:</td>
                            <td><?= $user['Tel'] ? $user['Tel'] : 'ບັງບໍ່ມີຂໍ້ມູນ'; ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ທີ່ຢູ່ປັດຈຸບັນ</td>
                            <td class="dotted">:</td>
                            <td><?= $user['Province'] ? $user['Province'] : 'ບັງບໍ່ມີຂໍ້ມູນ'; ?></td>
                          </tr>
                        </tbody>
                      <?php   }
                      ?>
                    </table>
                  </div>
                </div>
                <div class="widget-item">
                  <div class="widget-title">
                    <h3 class="title">Share</h3>
                  </div>
                  <div class="social-icons">
                    <a href="https://www.facebook.com" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                    <a href="https://twitter.com" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
                    <a href="https://www.skype.com" target="_blank" rel="noopener"><i class="icofont-skype"></i></a>
                    <a href="https://www.pinterest.com" target="_blank" rel="noopener"><i class="icofont-pinterest"></i></a>
                    <a href="https://dribbble.com/" target="_blank" rel="noopener"><i class="icofont-dribbble"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End Team Details Area Wrapper ==-->
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
                <p class="copyright">© 2024 . 2ITCon2 <i class="icofont-heart"></i> by <a target="_blank" href="#">Group
                    101.</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Footer Bottom ==-->
    </footer>
    <!--== End Footer Area Wrapper ==-->
    <!--== Scroll Top Button ==-->
    <div id="scroll-to-top" class="scroll-to-top"><span class="icofont-rounded-up"></span></div>

    <!--== Start Aside Menu ==-->
    <aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h1 class="d-none" id="offcanvasExampleLabel">Aside Menu</h1>
        <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">menu <i class="icofont-simple-left"></i></button>
      </div>
      <div class="offcanvas-body">
        <!-- Mobile Menu Start -->
        <div class="mobile-menu-items">
          <ul class="nav-menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Find Jobs</a>
              <ul class="sub-menu">
                <li><a href="job.html">Jobs</a></li>
                <li><a href="job-details.html">Job Details</a></li>
              </ul>
            </li>
            <li><a href="employers-details.html">Employers Details</a></li>
            <li><a href="#">Candidates</a>
              <ul class="sub-menu">
                <li><a href="candidate.html">Candidates</a></li>
                <li><a href="candidate-details.html">Candidate Details</a></li>
              </ul>
            </li>
            <li><a href="#">Blog</a>
              <ul class="sub-menu">
                <li><a href="blog-grid.html">Blog Grid</a></li>
                <li><a href="blog.html">Blog Left Sidebar</a></li>
                <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                <li><a href="blog-details.html">Blog Details</a></li>
              </ul>
            </li>
            <li><a href="#">Pages</a>
              <ul class="sub-menu">
                <li><a href="about-us.html">About us</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="registration.html">Registration</a></li>
                <li><a href="page-not-found.html">Page Not Found</a></li>
              </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>
        <!-- Mobile Menu End -->
      </div>
    </aside>
    <!--== End Aside Menu ==-->
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