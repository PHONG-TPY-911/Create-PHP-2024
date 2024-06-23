<?php include_once './header copy.php'; ?>
<form id="contact-form" enctype="multipart/form-data" action="Table_Update_company.php" method="POST">
  <style>
    .image-img {
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      /* height: 100vh; */
    }

    .image-img img {
      max-width: 250px;
      height: auto;
      border-radius: 20px;
      overflow: hidden;
    }

    .skill {
      border-right: 1px solid #000;
      border-left: none;
      /* padding: 5px; */
    }
  </style>
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM company WHERE ID = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $company_data = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch a single record
  }
  ?>

  <div class="show-data">
    <div class="row g-3 needs-validation" novalidate>
      <input type="hidden" value="<?= $company_data['ID']; ?>" require class="form-control" name="ID">
      <input type="hidden" value="<?= $company_data['Business_image']; ?>" require class="form-control" name="Business_image1">
      <input type="hidden" value="<?= $company_data['All_image']; ?>" require class="form-control" name="All_image1">
      <div class="image-img">
        <div class="col-mb-12">
          <h6 for="validationCustom01" class="form-label mb-3 fw-bold">ຮູບພາຍ ໂປຣຟາຍ</h6>
          <img src="../folder-image-company/profile-company/<?= $company_data['Profile_picture'] ?>" alt="">
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="form-label">ຊື່ບໍລິສັດ</label>
            <input class="form-control" type="text" name="Name_company" placeholder="ຊື່ບໍລິສັດ" value="<?= $company_data['Name_company'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="form-label">ຮູບແບບທຸລະກິດ</label>
            <input class="form-control" type="text" name="Business_model" placeholder="ຮູບແບບທຸລະກິດ" value="<?= $company_data['Business_model'] ?>">
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="province">ແຂວງ</label>
            <input type="text" class="form-control" name="Province" placeholder="ແຂວງ" value="<?= $company_data['Province'] ?>">
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="district">ເມືອງ</label>
            <input type="text" class="form-control" name="District" placeholder="ເມືອງ" value="<?= $company_data['District'] ?>">
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="village">ບ້ານ</label>
            <input type="text" class="form-control" name="Village" placeholder="ບ້ານ" value="<?= $company_data['Village'] ?>">
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="form-label">ສັນຊາດ</label>
            <input class="form-control" type="text" name="Nationality" placeholder="ສັນຊາດ" value="<?= $company_data['Nationality'] ?>">
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="form-label">ອິເມວ</label>
            <input class="form-control" type="Email" name="Email" placeholder="ອິເມວ" value="<?= $company_data['Email'] ?>">
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="form-label">ເບີຕິດຕໍ່</label>
            <input class="form-control" type="number" name="Tel" placeholder="ເບີຕິດຕໍ່" value="<?= $company_data['Tel'] ?>">
          </div>
        </div>

        <hr>
        <label class="fs-5">ບ່ອນຮູບໂຫຼດຮູບພາບ</label>
        <div class="mt-3 d-flex fw-bold">
          <div class="col-md-5">
            <div class="form-group">
              <label for="file-upload" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                ໃບທະບຽນວິສະຫະກິດ
              </label><br>
              <input type="file" id="imgInput" name="Business_image" />
              <img width="90%" id="perview" class="mt-2 rounded" alt="" src="../folder-image-company/business-company/<?= $company_data['Business_image'] ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">

              <label for="file-upload" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                ຮູບພາບລວມບໍລິສັດ
              </label><br>
              <input type="file" id="imgInput1" name="All_image" />
              <img width="90%" id="perview1" class="mt-2 rounded" alt="" src="../folder-image-company/all-image/<?= $company_data['All_image'] ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="container">
    <div class="col-md-12">
      <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-primary p-2" type="submit" name="record_info_company">ບັນທຶກ</button>
      </div>
    </div>
  </div>
</form>

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

  // img1
  let imgInput1 = document.getElementById('imgInput1');
  let previewImg1 = document.getElementById('perview1');

  imgInput1.onchange = evt => {
    const [file] = imgInput1.files;
    if (file) {
      previewImg1.src = URL.createObjectURL(file);
    }
  }
</script>