<?php require_once '../customer/folder_header.php' ?>


  <main class="main-content">
        <!--== Start Page Header Area Wrapper ==-->
        <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
          <div class="container pt--0 pb--0">
            <div class="row">
              <div class="col-12">
                <div class="page-header-content">
                  <h2 class="title">ຂໍ້ມູນບໍລິສັດ</h2>
                  <nav class="breadcrumb-area">
                    <ul class="breadcrumb justify-content-center">
                      <li><a href="index.html">ໜ້າຫຼັກ</a></li>
                      <li class="breadcrumb-sep">//</li>
                      <li>ປະກາດວຽກ</li>
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
                  <img src="assets/img/user/Profile-kancafe.jpg" width="130" height="130" alt="Image-HasTech">
                </div>
                <div class="content">
                    <h4 class="title">KAN CAFE</h4>
                    <h5 class="sub-title">ຮ້ານອາຫານ ແລະ ເຄື່ອງດື່ມ</h5>
                    <ul class="info-list">
                      <li><i class="icofont-location-pin"></i> Vientiane, Laos</li>
                    </ul> <br>
                    <button onclick="window.location.href = 'company-details-add.html';" type="button"
                      class="btn-theme">ຂໍ້ມູນທົ່ວໄປ</button>
                  </div>
              </div>
              <div class="team-details-btn">
                <input type="file" id="img" name="profile_picture" accept="image/*"> <br> <br>
                <button type="button" class="btn-theme">ປ່ຽນຮູບ</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-7 col-xl-8">
            <div class="team-details-item">
              <div class="widget-item widget-contact">
                <div class="widget-title">
                  <h3 class="title">ເພີ່ມຂໍ້ມູນການປະກາດວຽກ</h3>
                </div>
                <div class="widget-contact-form">
                  <form id="contact-form" action="" method="POST">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input class="form-control" type="text" name="address" placeholder="ຫົວຂໍ້ໜ້າວຽກ:">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" name="job_content" placeholder="ໜ້າວຽກໂດຍຫຍໍ້"></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input class="form-control" type="text" name="address" placeholder="ເງິນເດືອນ:">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-label">ວັນທີ່ເປີດຮັບສະໝັກວຽກ</label>
                          <input class="form-control" type="date" name="dataOfBirth" placeholder="ວັນ/ເດືອນ/ປີເກີດ:">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-label">ວັນທີ່ປີດຮັບສະໝັກວຽກ</label>
                          <input class="form-control" type="date" name="dataOfBirth" placeholder="ວັນ/ເດືອນ/ປີເກີດ:">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="img">ໂພດສະເຕີ້ປະກາດວຽກ:</label>
                          <input type="file" id="img" name="business_image" accept="image/*">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb--0">
                          <button onclick="window.location.href = 'company-details.html';" class="btn-theme d-block w-100" type="submit">ໂພດວຽກ</button>
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
                    <tbody>
                      <tr>
                        <td class="table-name">ອີເມວ</td>
                        <td class="dotted">:</td>
                        <td>Null</td>
                      </tr>
                      <tr>
                        <td class="table-name">ເບີຕິດຕໍ່</td>
                        <td class="dotted">:</td>
                        <td>Null</td>
                      </tr>
                      <tr>
                        <td class="table-name">ທີ່ຢູ່</td>
                        <td class="dotted">:</td>
                        <td>Null</td>
                      </tr>
                    </tbody>
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
 
 <?php require_once '../customer/folder_footer.php' ?>