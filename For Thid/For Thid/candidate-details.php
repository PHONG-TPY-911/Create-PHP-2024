<?php
session_start();
require_once '../../connect-database/config.php';
require_once './get_districts.php';
require_once './get_village.php';
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
<style>
  input[type="file"] {
    display: none;
  }

  .custom-file-upload {
    border: 1px solid #ccc;
    color: #fff;
    display: inline-block;
    padding: 12px 12px;
    margin-right: 10rem;
    border-radius: 8px;
    cursor: pointer;
    background-color: green;
  }

  .custom {
    border: 1px solid #ccc;
    color: #fff;
    display: inline-block;
    padding: 6px 12px;
    border-radius: 8px;
    cursor: pointer;
    background-color: green;
    text-align: center;
    align-items: center;
  }

  .custom-file {
    border: 1px solid #ccc;
    color: #fff;
    display: inline-block;
    padding: 6px 12px;
    border-radius: 8px;
    cursor: pointer;
    background-color: green;
    align-items: center;
  }

  .custom-file-upload {
    border: 1px solid #ccc;
    color: #fff;
    display: inline-block;
    padding: 6px 12px;
    border-radius: 8px;
    cursor: pointer;
    background-color: green;
    align-items: center;
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
                        <a href="#"><span></span> Username</a>
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
                    <img src="assets/img/user/Profile.jpeg" width="130" height="130" alt="Image-HasTech">
                  </div>
                  <div class="content">
                    <h4 class="title">Kanya XAYYAHAN</h4>
                    <h5 class="sub-title">Web Developer</h5>
                    <ul class="info-list">
                      <li><i class="icofont-location-pin"></i> Vientiane, Laos</li>
                    </ul>
                  </div>
                </div>
                <div class="team-details-btn">
                  <!-- <input type="file" id="img" name="declaration" accept="image/*"> <br>

                  <button type="button" class="btn-theme">ປ່ຽນຮູບ</button> -->
                  <label for="file-upload" class="custom-file-upload">
                    ປ່ຽນຮູບໂປຣຟາຍ
                  </label>
                  <input id="file-upload" type="file" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-7 col-xl-8">
              <div class="team-details-item">
                <div class="widget-item widget-contact">
                  <div class="widget-title">
                    <h3 class="title">ເພີ່ມຂໍ້ມູນເພື່ອຢືນຢັນ</h3>
                  </div>
                  <div class="widget-contact-form">
                    <form id="contact-form" action="" method="POST">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <input class="form-control" type="text" name="study" placeholder="ສາຂາຮຽນ:">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input class="form-control" type="text" name="education_level" placeholder="ລະດັບການສຶກສາ:">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="form-label">ເພດ</label>
                          <div class="form-group d-flex">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1">
                              <label class="form-check-label" for="flexRadioDefault2">
                                ຊາຍ
                              </label>
                            </div>
                            <div class="form-check ms-5">
                              <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1">
                              <label class="form-check-label" for="flexRadioDefault2">
                                ຍິງ
                              </label>
                            </div>
                            <div class="form-check ms-5">
                              <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1">
                              <label class="form-check-label" for="flexRadioDefault2">
                                ເພດທີ່ສາມ
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-label">ສະຖະນະ</label>
                            <label class="form-label">ເພດ</label>
                            <div class="form-group d-flex">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  ໂສດ
                                </label>
                              </div>
                              <div class="form-check ms-5">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  ມີແຟນແລ້ວ
                                </label>
                              </div>
                              <div class="form-check ms-5">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  ແຕ່ງງານແລ້ວ
                                </label>
                              </div>
                              <div class="form-check ms-5">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  ກຳລັງຄົບຫາກັນຢູ່
                                </label>
                              </div>
                              <div class="form-check ms-5">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  ສະຖະນະບໍ່ຊັດເຈນ
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input class="form-control" type="text" name="age" placeholder="ອາຍຸ:">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-label">ວັນ/ເດືອນ/ປີເກີດ</label>
                            <input class="form-control" type="date" name="dataOfBirth" placeholder="ວັນ/ເດືອນ/ປີເກີດ:">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="province">ແຂວງ</label>
                            <select class="form-select" aria-label="Default select example" name="province" id="provinceSelect">
                              <option value="" selected>-----</option>
                              <?php
                              $stmt = $conn->query("SELECT pr_id, pr_name FROM province");
                              $stmt->execute();
                              $provincestmt = $stmt->fetchAll();
                              foreach ($provincestmt as $province) {
                              ?>
                                <option value="<?= $province['pr_id']; ?>"> <?= $province['pr_name']; ?></option>
                              <?php   }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="district">ເມືອງ</label>
                            <select class="form-select" aria-label="Default select example" name="district" id="districtSelect">
                              <option value="" selected>-----</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="village">ບ້ານ</label>
                            <select class="form-select" aria-label="Default select example" name="village" id="villageSelect">
                              <option value="" selected>-----</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input class="form-control" type="text" name="address" placeholder="ທີ່ຢູ່ອື່ນໆ:">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input class="form-control" type="text" name="religion" placeholder="ສາສະໜາ:">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input class="form-control" type="text" name="tel" placeholder="ເບີຕິດຕໍ່:">
                          </div>
                        </div>
                        <label class="">ບ່ອນຮູບໂຫຼດຮູບພາບ</label>
                        <div class="mt-3 d-flex fw-bold">
                          <div class="col-md-4">
                            <div class="form-group">
                              <!-- <label for="img">ໃບປະກາດ:</label>
                            <input type="file" id="img" name="declaration" accept="image/*"> -->
                              <label for="file-upload" class="custom" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                                ໃບປະກາດ
                              </label>
                              <input id="file-upload" type="file" />
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <!-- <label for="img">ໃບຄະແນນ:</label>
                            <input type="file" id="img" name="score" accept="image/*"> -->

                              <label for="file-upload" class="custom-file" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                                ຊີວີ
                              </label>
                              <input id="file-upload" type="file" />
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <!-- <label for="img">ຊີວີ:</label>
                            <input type="file" id="img" name="cv" accept="image/*"> -->

                              <label for="file-upload" class="custom-file-upload" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                                ໃບຄະແນນ
                              </label>
                              <input id="file-upload" type="file" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group mb--0">
                            <button class="btn-theme d-block w-100" type="submit">ບັນທຶກ</button>
                          </div>
                        </div>
                      </div>
                    </form>

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
                      $stmt = $conn->query("SELECT * FROM customer");
                      $stmt->execute();
                      $provincestmt = $stmt->fetchAll();
                      foreach ($provincestmt as $province) {
                      ?>

                        <tbody>
                          <tr>
                            <td class="table-name">ສາຂາຮຽນ</td>
                            <td class="dotted">:</td>
                            <td><?= $province['study'] ? $province['study'] : ''; ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ລະດັບການສຶກສາ</td>
                            <td class="dotted">:</td>
                            <td><?= $province['Education_level'] ? $province['Education_level'] : ''; ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ສະຖະນະ</td>
                            <td class="dotted">:</td>
                            <td><?= $province['Status']; ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ເພດ</td>
                            <td class="dotted">:</td>
                            <td><?= $province['Gender'] ? $province['Gender'] : ''; ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ອາຍຸ</td>
                            <td class="dotted">:</td>
                            <td><?= $province['Age'] ? $province['Age'] : ''; ?></td>
                          </tr>

                          <tr>
                            <td class="table-name">ວັນ/ເດືອນ/ປີ</td>
                            <td class="dotted">:</td>
                            <td><?= $province['DataOfBirth'] ? $province['DataOfBirth'] : ''; ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ອີເມວ</td>
                            <td class="dotted">:</td>
                            <td><?= $province['Email']; ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ເບີຕິດຕໍ່</td>
                            <td class="dotted">:</td>
                            <td><?= $province['Tel'] ? $province['Tel'] : ''; ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ທີ່ຢູ່ປັດຈຸບັນ</td>
                            <td class="dotted">:</td>
                            <td><?= $province['Address'] ? $province['Address'] : ''; ?></td>
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
                <p class="copyright">© 2024 . 2ITCon2 <i class="icofont-heart"></i> by <a target="_blank" href="#">Group 101.</a></p>
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

  <script src="assets/js/jquery-main.js"></script>
  <script src="./setValue_select.js"></script>
  <?php require_once './js.php'; ?>




</body>

</html>