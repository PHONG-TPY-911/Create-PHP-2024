<?php include_once './header.php'; ?>
<form id="contact-form" enctype="multipart/form-data" action="Update_Post_company.php" method="POST">
  <?php

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM post_work_company WHERE ID = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  ?>

  <input type="hidden" value="<?= $user_data['Job_post_photos']; ?>" require class="form-control" name="Job_post_photos1">
  <div class="row">
    <!-- <div class="col-lg-7 col-xl-8"> -->
    <div class="team-details-item">
      <div class="widget-item widget-contact">
        <div class="widget-title mb-5">
          <h3 class="title">ເພີ່ມຂໍ້ມູນເພື່ອຢືນຢັນ</h3>
        </div>
        <div class="widget-contact-form">
          <div class="row">
            <input type="hidden" name="ID" value="<?= $user_data['ID'] ?>">
            <input type="hidden" name="ID_company" value="<?= $user_data['ID_company'] ?>">
            <input type="hidden" name="ID_employee" value="<?= $user_data['ID_employee'] ?>">
            <div class="row g-3 needs-validation" novalidate>

              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">ຫົວຂໍ້ໜ້າວຽກ</label>
                <input type="text" class="form-control" name="Job_title" value="<?= $user_data['Job_title'] ?>">
              </div>
              <div class="col-md-6">
                <label for="validationCustom02" class="form-label">ເງີນເດືອນ</label>
                <input type="number" class="form-control" name="Salary" value="<?= $user_data['Salary'] ?>">
              </div>
              <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">ວັນທີ່ເປີດຮັບສະໝັກວຽກ</label>
                <input type="date" class="form-control" name="Job_data" value="<?= $user_data['Job_data'] ?>">
              </div>
              <div class="col-md-6">
                <label for="validationCustom02" class="form-label">ວັນທີ່ປີດຮັບສະໝັກວຽກ</label>
                <input type="date" class="form-control" name="job_end_data" value="<?= $user_data['job_end_data'] ?>">
              </div>
              <label for="validationCustom02" class="form-label">ເວລາການເຮັດວຽກ</label>
              <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="Working_time" id="exampleRadios1" value="Part-Time" checked <?= $user_data['Working_time'] == 'Part-Time' ? 'checked' : '' ?>>
                  <label class="form-check-label" for="exampleRadios1">
                    Part-Time
                  </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="Working_time" id="exampleRadios2" value="Full-Time" <?= $user_data['Working_time'] == 'Full-Time' ? 'checked' : '' ?>>
                  <label class="form-check-label" for="exampleRadios2">
                    Full-Time
                  </label>
                </div>
              </div>
              <div class="col-md-5">
                <label for="validationCustom03" class="form-label">ເວລາ</label>
                <input class="form-control" type="time" name="Time" value="<?= $user_data['Time'] ?>">
              </div>

              <div class="col-md-12">
                <label for="validationCustom03" class="form-label">ໜ້າວຽກໂດຍຫຍໍ້</label>
                <textarea type="text" class="form-control" name="Describe_work"><?= htmlspecialchars($user_data['Describe_work'] ?? '') ?></textarea>
              </div>
              <div class="col-md-12">
                <label for="validationCustom05" class="form-label">ໂພສເຕີ້ປະກາດວຽກ</label><br>
                <input type="file" name="Job_post_photos" id="imgInput"><br>
                <hr>
                <img width="100%" id="perview" class="mt-4 rounded" alt="" src="./image/<?= $user_data['Job_post_photos'] ?>">
              </div>
            </div>
            <div class="container">
              <div class="col-md-12">
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button class="btn btn-primary p-2" type="submit" name="record_info_customer">ບັນທຶກ</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- </div> -->
      </div>
    </div>
  </div>
</form>
<hr>
<?php include_once './footer.php' ?>

<script>
  // img1
  let imgInput = document.getElementById('imgInput');
  let previewImg = document.getElementById('perview');

  imgInput.onchange = evt => {
    const [file] = imgInput.files;
    if (file) {
      previewImg.src = URL.createObjectURL(file);
    }
  }
  // img1
</script>