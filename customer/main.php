<?php include_once 'header.php'; ?>
<main class="main-content">
  <!--== Start Hero Area Wrapper ==-->
  <class="home-slider-area">
    <div class="home-slider-container default-slider-container">
      <div class="home-slider-wrapper slider-default">
        <div class="slider-content-area" data-bg-img="assets/img/slider/slider-bg.jpg">
          <div class="container pt--0 pb--0">
            <div class="slider-container">
              <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-8">
                  <!--<div class="slider-content">
                      <h2 class="title"><span class="counter" data-counterup-delay="80">2,568</span> job available <br>
                        You can choose your dream job</h2>
                      <p class="desc">Find great job for build your bright career. Have many job in this plactform.</p>
                    </div> -->
                  <div class="slider-content">
                    <h2 class="title">ຄົ້ນຫາວຽກ ເພື່ອອານາຄົດ</h2>
                    <p class="desc">ຊອກວຽກທີ່ດີສຳລັບທ່ານ ໄດ້ງ່າຍໆ</p>
                  </div>
                </div>
                <div class="col-12">
                  <div class="job-search-wrap">
                    <div class="job-search-form">
                      <form action="#">
                        <div class="row row-gutter-10">
                          <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="ໜ້າວຽກ, ຕຳແໜ່ງ">
                            </div>
                          </div>
                          <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                            <div class="form-group">
                              <select class="form-control">
                                <option value="1" selected>ເມືອງ</option>
                                <option value="2">New York</option>
                                <option value="3">California</option>
                                <option value="4">Illinois</option>
                                <option value="5">Texas</option>
                                <option value="6">Florida</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                            <div class="form-group">
                              <select class="form-control">
                                <option value="1" selected>ໝວດວຽກ</option>
                                <option value="2">Web Designer</option>
                                <option value="3">Web Developer</option>
                                <option value="4">Graphic Designer</option>
                                <option value="5">App Developer</option>
                                <option value="6">UI &amp; UX Expert</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                            <div class="form-group">
                              <button type="button" class="btn-form-search"><i class="icofont-search-1"></i></button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="home-slider-shape">
      <img class="shape1" data-aos="fade-down" data-aos-duration="1500" src="assets/img/slider/vector1.png" width="270" height="234" alt="Image-HasTech">
      <img class="shape2" data-aos="fade-left" data-aos-duration="2000" src="assets/img/slider/vector2.png" width="201" height="346" alt="Image-HasTech">
      <img class="shape3" data-aos="fade-right" data-aos-duration="2000" src="assets/img/slider/vector3.png" width="276" height="432" alt="Image-HasTech">
      <img class="shape4" data-aos="flip-left" data-aos-duration="1500" src="assets/img/slider/vector4.png" width="127" height="121" alt="Image-HasTech">
    </div>
    </section>
    <!--== End Hero Area Wrapper ==-->

    <!--== Start Recent Job Area Wrapper ==-->
    <section class="recent-job-area bg-color-gray">
      <div class="container" data-aos="fade-down">
        <div class="row">
          <div class="col-12">
            <div class="section-title text-center">
              <h3 class="title">ວຽກທີ່ກຳລັບຕ້ອງການ</h3>
              <div class="desc">
                <p>ສະໝັກເລີຍ</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <?php
          $sql = "SELECT * FROM post_work_company WHERE InfoFull = 'passed'";
          $stmt = $conn->query($sql);
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Check if results are not empty
          if (!empty($results)) {
            // Iterate through each result to perform further operations
            foreach ($results as $result) {
              $company_id = $result['ID_company'];

              // Prepare the query to fetch matching company IDs
              $stmt = $conn->prepare("
                    SELECT company.ID AS company_id
                    FROM company
                    WHERE company.ID = :company_id
                ");
              $stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);
              $stmt->execute();
              $ID_task = $stmt->fetch(PDO::FETCH_ASSOC);

              if ($ID_task) {
                // Fetch company details
                $stmt = $conn->prepare("SELECT * FROM company WHERE ID = :company_id");
                $stmt->bindParam(':company_id', $ID_task['company_id'], PDO::PARAM_INT);
                $stmt->execute();
                $Data_company = $stmt->fetch(PDO::FETCH_ASSOC);
              } else {
                $Data_company = null;
              }

              // Display the data within the HTML structure if Data_company is not null
              if ($Data_company) {
          ?>
                <div class="col-md-4 col-lg-5">
                  <!--== Start Recent Job Item ==-->
                  <div class="recent-job-item">
                    <div class="company-info">
                      <div class="logo">
                        <a href="job-details.php">
                          <img src="../folder-image-company/profile-company/<?= htmlspecialchars($Data_company['Profile_picture']); ?>" width="75" height="75" alt="Image-HasTech">
                        </a>
                      </div>
                      <div class="content">
                        <h4 class="name"><a href="job-details.php?id= <?= $result['ID'] ?>"><?= htmlspecialchars($Data_company['Name_company']); ?></a></h4>
                        <p class="address"><?= htmlspecialchars($Data_company['Province']); ?> , <?= htmlspecialchars($Data_company['Nationality']); ?></p>
                      </div>
                    </div>
                    <div class="main-content">
                      <h3 class="title"><a href="job-details.php?id= <?= $result['ID'] ?>"><?= htmlspecialchars($result['Job_title']); ?></a></h3>
                      <h5 class="work-type"><?= htmlspecialchars($result['Working_time']); ?></h5>
                      <p class="desc"><?= htmlspecialchars($result['Describe_work']); ?></p>
                    </div>
                    <div class="recent-job-info">
                      <div class="salary">
                        <h4><?= number_format(htmlspecialchars($result['Salary'])); ?> LAK </h4>
                        <p>/ເດືອນ</p>
                      </div>
                      <a class="btn-theme btn-sm" href="job-details.php?id= <?= $result['ID'] ?>">ສະໝັກ</a>
                    </div>
                  </div>
                  <!--== End Recent Job Item ==-->
                </div>
          <?php
              }
            }
          } else {
            // echo "ຍັງບໍມິຂໍ້ມູນການປະການຮັບສະໝັກວຽກເທື່ອ!";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'ຂໍ້ມູນ',
                        text: 'ຍັງບໍມິຂໍ້ມູນການປະການຮັບສະໝັກວຽກເທື່ອ',
                        icon: 'error',
                        timer: 5000,
                        showConfirmButton: false
                    });
                });
                </script>";
          }
          ?>

          <!-- <div class="col-md-6 col-lg-4">
                  <div class="recent-job-item">
                    <div class="company-info">
                      <div class="logo">
                        <a href="company-details.html"><img src="assets/img/companies/BCEL Bank.jpg" width="75" height="75" alt="Image-HasTech"></a>
                      </div>
                      <div class="content">
                        <h4 class="name"><a href="company-details.html">BCEL Bank</a></h4>
                        <p class="address">ວຽງຈັນ, ລາວ</p>
                      </div>
                    </div>
                    <div class="main-content">
                      <h3 class="title"><a href="job-details.html">Front-end Developer</a></h3>
                      <h5 class="work-type">Full-time</h5>
                      <p class="desc">ພາສາ CSS3, HTML5, Javascript, Bootstrap, Jquery</p>
                    </div>
                    <div class="recent-job-info">
                      <div class="salary">
                        <h4>9,000,000LAK</h4>
                        <p>/ເດືອນ</p>
                      </div>
                      <a class="btn-theme btn-sm" href="job-details.html">ສະໝັກ</a>
                    </div>
                  </div>
                </div> -->


        </div>
    </section>
    <section>
      <div class="row">
        <div class="row mt-4">
          <div class="col-12">
            <div class="section-title text-center">
              <h3 class="title">ວຽກທີ່ກຳລັບຕ້ອງການ</h3>
              <div class="desc">
                <p>ສະໝັກເລີຍ</p>
              </div>
            </div>
          </div>
        </div>
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
          <div class="carousel-inner">
            <?php
            // session_start();
            include_once '../connect-database/config.php';
            // Make sure to establish a connection to the database
            // Example: $conn = new PDO('mysql:host=hostname;dbname=database_name', 'username', 'password');

            // Fetch all records from post_work_company where InfoFull is 'full'
            $sql = "SELECT * FROM post_work_company WHERE InfoFull = 'full'";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Check if results are not empty
            if (!empty($results)) {
              $firstItem = true; // Variable to check if it's the first carousel item
              // Iterate through each result to perform further operations
              foreach ($results as $result) {
                $company_id = $result['ID_company'];

                // Prepare the query to fetch matching company IDs
                $stmt = $conn->prepare("
                SELECT company.ID AS company_id
                FROM company
                WHERE company.ID = :company_id
            ");
                $stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);
                $stmt->execute();
                $ID_task = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($ID_task) {
                  // Fetch company details
                  $stmt = $conn->prepare("SELECT * FROM company WHERE ID = :company_id");
                  $stmt->bindParam(':company_id', $ID_task['company_id'], PDO::PARAM_INT);
                  $stmt->execute();
                  $Data_company = $stmt->fetch(PDO::FETCH_ASSOC);
                } else {
                  $Data_company = null;
                }

                // Display the data within the HTML structure if Data_company is not null
                if ($Data_company) {
                  // Add the 'active' class only to the first item
                  $activeClass = $firstItem ? 'active' : '';
                  $firstItem = false;
            ?>
                  <div class="carousel-item <?= $activeClass ?>">
                    <div class="col-md-4 col-lg-5">
                      <!--== Start Recent Job Item ==-->
                      <div class="recent-job-item">
                        <div class="company-info">
                          <div class="logo">
                            <a href="company-details.html">
                              <img src="../folder-image-company/profile-company/<?= htmlspecialchars($Data_company['Profile_picture']); ?>" width="75" height="75" alt="Image-HasTech">
                            </a>
                          </div>
                          <div class="content">
                            <h4 class="name"><a href="company-details.html"><?= htmlspecialchars($Data_company['Name_company']); ?></a></h4>
                            <p class="address"><?= htmlspecialchars($Data_company['Province']); ?> , <?= htmlspecialchars($Data_company['Nationality']); ?></p>
                          </div>
                        </div>
                        <div class="main-content">
                          <h3 class="title"><a href="job-details.html"><?= htmlspecialchars($result['Job_title']); ?></a></h3>
                          <h5 class="work-type"><?= htmlspecialchars($result['Working_time']); ?></h5>
                          <p class="desc"><?= htmlspecialchars($result['Describe_work']); ?></p>
                        </div>
                        <div class="recent-job-info">
                          <div class="salary">
                            <h4><?= number_format(htmlspecialchars($result['Salary'])); ?> LAK </h4>
                            <p>/ເດືອນ</p>
                          </div>
                          <a class="btn-theme btn-sm" href="job-details.html">ສະໝັກ</a>
                        </div>
                      </div>
                      <!--== End Recent Job Item ==-->
                    </div>
                  </div>
            <?php
                }
              }
            } else {
              echo "<div class='carousel-item active'>No records found.</div>";
            }
            ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

      </div>
    </section>
    <!--== End Recent Job Area Wrapper ==-->

    <!--== Start Work Process Area Wrapper ==-->
    <section class="work-process-area">
      <div class="container" data-aos="fade-down">
        <div class="row">
          <div class="col-12">
            <div class="section-title text-center">
              <h3 class="title">ເປັນສ່ວນຮ່ວມກັບເຮົາ</h3>
              <div class="desc">
                <p>ວິທິ່ການລົງທະບຽນນຳໃຊ້ Website</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="working-process-content-wrap">
              <div class="working-col">
                <!--== Start Work Process ==-->
                <div class="working-process-item">
                  <div class="icon-box">
                    <div class="inner">
                      <img class="icon-img" src="assets/img/icons/w1.png" alt="Image-HasTech">
                      <img class="icon-hover" src="assets/img/icons/w1-hover.png" alt="Image-HasTech">
                    </div>
                  </div>
                  <div class="content">
                    <h4 class="title">ສ້າງບັນຊີ</h4>
                    <p class="desc">ລົງທະບຽນນຳໃຊ້ເວັບໄຊ</p>
                  </div>
                  <div class="shape-arrow-icon">
                    <img class="shape-icon" src="assets/img/icons/right-arrow.png" alt="Image-HasTech">
                    <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png" alt="Image-HasTech">
                  </div>
                </div>
                <!--== End Work Process ==-->
              </div>
              <div class="working-col">
                <!--== Start Work Process ==-->
                <div class="working-process-item">
                  <div class="icon-box">
                    <div class="inner">
                      <img class="icon-img" src="assets/img/icons/w2.png" alt="Image-HasTech">
                      <img class="icon-hover" src="assets/img/icons/w2-hover.png" alt="Image-HasTech">
                    </div>
                  </div>
                  <div class="content">
                    <h4 class="title">ປະກອບຂໍ້ມູນ CV/Resume</h4>
                    <p class="desc">ຕື່ມຂໍ້ມູນພຶ້ນຖານ ແລະ CV ລໍຖ້າການອານຸມັດ</p>
                  </div>
                  <div class="shape-arrow-icon">
                    <img class="shape-icon" src="assets/img/icons/right-arrow.png" alt="Image-HasTech">
                    <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png" alt="Image-HasTech">
                  </div>
                </div>
                <!--== End Work Process ==-->
              </div>
              <div class="working-col">
                <!--== Start Work Process ==-->
                <div class="working-process-item">
                  <div class="icon-box">
                    <div class="inner">
                      <img class="icon-img" src="assets/img/icons/w3.png" alt="Image-HasTech">
                      <img class="icon-hover" src="assets/img/icons/w3-hover.png" alt="Image-HasTech">
                    </div>
                  </div>
                  <div class="content">
                    <h4 class="title">ຊອກຫາວຽກ</h4>
                    <p class="desc">ຊອກຫາວຽກທີ່ດີສຳລັບທ່ານຜ່ານເວັບໄຊ</p>
                  </div>
                  <div class="shape-arrow-icon">
                    <img class="shape-icon" src="assets/img/icons/right-arrow.png" alt="Image-HasTech">
                    <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png" alt="Image-HasTech">
                  </div>
                </div>
                <!--== End Work Process ==-->
              </div>
              <div class="working-col">
                <!--== Start Work Process ==-->
                <div class="working-process-item">
                  <div class="icon-box">
                    <div class="inner">
                      <img class="icon-img" src="assets/img/icons/w4.png" alt="Image-HasTech">
                      <img class="icon-hover" src="assets/img/icons/w4-hover.png" alt="Image-HasTech">
                    </div>
                  </div>
                  <div class="content">
                    <h4 class="title">ສະໝັກ</h4>
                    <p class="desc">ກົດປຸ່ມສະໝັກວຽກທີ່ຕ້ອງການ</p>
                  </div>
                  <div class="shape-arrow-icon d-none">
                    <img class="shape-icon" src="assets/img/icons/right-arrow.png" alt="Image-HasTech">
                    <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png" alt="Image-HasTech">
                  </div>
                </div>
                <!--== End Work Process ==-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Work Process Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="sec-overlay sec-overlay-theme bg-img" data-bg-img="assets/img/photos/">
      <div class="container pt--0 pb--0">
        <div class="row justify-content-center divider-style1">
          <div class="col-lg-10 col-xl-7">
            <div class="divider-content text-center">
              <h4 class="sub-title" data-aos="fade-down">ລົງທະບຽນເລິຍ</h4>
              <h2 class="title" data-aos="fade-down">ຜູ່ຫາວຽກກໍງ່າຍ... ຜູ້ຈ້າງງານກໍ່ສະດວກ...</h2>
              <div class="divider-btn-group">
                <a class="btn-divider" data-aos="fade-down" href="page-not-found.html">
                  <img src="assets/img/photos/google-play.png" width="201" height="63" class="icon" alt="Image-HasTech">
                </a>
                <a class="btn-divider btn-divider-app-store" data-aos="fade-down" href="page-not-found.html">
                  <img src="assets/img/photos/mac-os.png" width="201" height="63" class="icon" alt="Image-HasTech">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-layer-style1"></div>
      <div class="bg-layer-style2"></div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Team Area Wrapper ==-->
    <section class="team-area">
      <div class="container" data-aos="fade-down">
        <div class="row">
          <div class="col-12">
            <div class="section-title text-center">
              <h3 class="title">ບໍລິສັດດັ່ງທິ່ກຳລັງຊອກຫາພະນັກງານ</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!--== Start Team Item ==-->
            <div class="team-item">
              <div class="thumb">
                <a href="candidate-details.html">
                  <img src="assets/img/companies/BCEL Bank.jpg" width="160" height="160" alt="Image-HasTech">
                </a>
              </div>
              <div class="content">
                <h4 class="title"><a href="candidate-details.html">BCEL Bank</a></h4>
                <h5 class="sub-title">Back-end Developer</h5>
                <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>

                <a class="btn-theme btn-white btn-sm" href="candidate-details.html">ເບິ່ງໂປໄຟຣ</a>
              </div>
              <div class="bookmark-icon"><img src="assets/img/icons/bookmark1.png" alt="Image-HasTech"></div>
              <div class="bookmark-icon-hover"><img src="assets/img/icons/bookmark2.png" alt="Image-HasTech"></div>
            </div>
            <!--== End Team Item ==-->
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!--== Start Team Item ==-->
            <div class="team-item">
              <div class="thumb">
                <a href="candidate-details.html">
                  <img src="assets/img/companies/BeerLao.jpg" width="160" height="160" alt="Image-HasTech">
                </a>
              </div>
              <div class="content">
                <h4 class="title"><a href="candidate-details.html">Beer Lao </a></h4>
                <h5 class="sub-title">Graphice Designer</h5>
                <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>

                <a class="btn-theme btn-white btn-sm" href="candidate-details.html">ເບິ່ງໂປໄຟຣ</a>
              </div>
              <div class="bookmark-icon"><img src="assets/img/icons/bookmark1.png" alt="Image-HasTech"></div>
              <div class="bookmark-icon-hover"><img src="assets/img/icons/bookmark2.png" alt="Image-HasTech"></div>
            </div>
            <!--== End Team Item ==-->
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!--== Start Team Item ==-->
            <div class="team-item">
              <div class="thumb">
                <a href="candidate-details.html">
                  <img src="assets/img/companies/APB Bank.jpg" width="160" height="160" alt="Image-HasTech">
                </a>
              </div>
              <div class="content">
                <h4 class="title"><a href="candidate-details.html">APB Bank</a></h4>
                <h5 class="sub-title">Web Designer</h5>
                <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>

                <a class="btn-theme btn-white btn-sm" href="candidate-details.html">ເບິ່ງໂປໄຟຣ</a>
              </div>
              <div class="bookmark-icon"><img src="assets/img/icons/bookmark1.png" alt="Image-HasTech"></div>
              <div class="bookmark-icon-hover"><img src="assets/img/icons/bookmark2.png" alt="Image-HasTech"></div>
            </div>
            <!--== End Team Item ==-->
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!--== Start Team Item ==-->
            <div class="team-item">
              <div class="thumb">
                <a href="candidate-details.html">
                  <img src="assets/img/companies/CLSK.jpg" width="160" height="160" alt="Image-HasTech">
                </a>
              </div>
              <div class="content">
                <h4 class="title"><a href="candidate-details.html">ຈະເລີນເຊກອງ</a></h4>
                <h5 class="sub-title">App. Developer</h5>
                <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>

                <a class="btn-theme btn-white btn-sm" href="candidate-details.html">ເບິ່ງໂປໄຟຣ</a>
              </div>
              <div class="bookmark-icon"><img src="assets/img/icons/bookmark1.png" alt="Image-HasTech"></div>
              <div class="bookmark-icon-hover"><img src="assets/img/icons/bookmark2.png" alt="Image-HasTech"></div>
            </div>
            <!--== End Team Item ==-->
          </div>
        </div>
      </div>
    </section>
    <!--== End Team Area Wrapper ==-->

    <?php include_once 'footer.php'; ?>