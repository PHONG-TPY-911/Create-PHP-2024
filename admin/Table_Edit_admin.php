<?php include_once './header copy.php'; ?>
<form id="contact-form" enctype="multipart/form-data" action="Table_Update_admin.php" method="POST">
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
    $stmt = $conn->prepare("SELECT * FROM admin WHERE ID = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $company_data = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch a single record
    $formattedDateOfBirth = '';
    if (isset($company_data['DataOfBirth'])) {
      $timestamp = strtotime($company_data['Created_at']);
      $formattedDateOfBirth = date('Y-m-d', $timestamp);
    }
  }
  ?>

  <div class="show-data">
    <div class="row g-3 needs-validation" novalidate>
      <div class="image-img">
        <div class="col-mb-12">
          <h6 for="validationCustom01" class="form-label mb-3 fw-bold">ຮູບພາຍ ໂປຣຟາຍ</h6>
          <img src="image-admin/<?= $company_data['Profile_picture'] ?>" alt="">
        </div>
      </div>
      <hr>
      <div class="row">
        <input class="form-control" type="hidden" name="ID" required value="<?= htmlspecialchars($company_data['ID']) ?>">
        <input class="form-control" type="hidden" name="Password" required value="<?= htmlspecialchars($company_data['Password']) ?>">
        <input type="hidden" value="<?= $company_data['Profile_picture']; ?>" require class="form-control" name="Profile_picture1">
        <div class="col-md-4  mb-4">
          <div class="form-group">
            <label class="form-label">ຊື່</label>
            <input class="form-control" type="text" name="Name" placeholder="ຊື່" required value="<?= htmlspecialchars($company_data['Name']) ?>">
          </div>
        </div>
        <div class="col-md-4  mb-4">
          <div class="form-group">
            <label class="form-label">ນາມສະກຸນ</label>
            <input class="form-control" type="text" name="Lname" placeholder="ນາມສະກຸນ" value="<?= htmlspecialchars($company_data['Lname']) ?>">
          </div>
        </div>
        <div class="col-md-4  mb-4">
          <div class="form-group">
            <label class="form-label">ອາຍຸ</label>
            <input class="form-control" type="number" name="Age" placeholder="ອາຍຸ" value="<?= htmlspecialchars($company_data['Age']) ?>">
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="province">ແຂວງ</label>
            <input type="text" class="form-control" name="Province" placeholder="ແຂວງ" value="<?= htmlspecialchars($company_data['Province']) ?>">
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="district">ເມືອງ</label>
            <input type="text" class="form-control" name="District" placeholder="ເມືອງ" value="<?= htmlspecialchars($company_data['District']) ?>">
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="village">ບ້ານ</label>
            <input type="text" class="form-control" name="Village" placeholder="ບ້ານ" value="<?= htmlspecialchars($company_data['Village']) ?>">
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="village">ທີ່ຢູ່ອື່ນໆ</label>
            <input type="text" class="form-control" name="Address" placeholder="ທີ່ຢູ່ອື່ນໆ" value="<?= htmlspecialchars($company_data['Address']) ?>">
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="village">ຕຳແໜ່ງ</label>
            <input type="text" class="form-control" name="Position" placeholder="ຕຳແໜ່ງ" value="<?= htmlspecialchars($company_data['Position']) ?>">
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="form-label">ອິເມວ</label>
            <input class="form-control" type="Email" name="Email" placeholder="ອິເມວ" required value="<?= htmlspecialchars($company_data['Email']) ?>">
          </div>
        </div>
        <!-- <div class="col-md-4 mb-4">
        <div class="form-group">
          <label class="form-label">ລະຫັດ</label>
          <input class="form-control" type="Password" name="Password" placeholder="ລະຫັດ" required>
        </div>
      </div> -->
        <div class="col-md-4 mb-4">
          <div class="form-group">
            <label class="form-label">ເບີຕິດຕໍ່</label>
            <input class="form-control" type="number" name="Tel" placeholder="ເບີຕິດຕໍ່" value="<?= htmlspecialchars($company_data['Tel']) ?>">
          </div>
        </div>
        <hr>
        <label class="fs-5">ບ່ອນຮູບໂຫຼດຮູບພາບ</label>
        <div class="mt-3 d-flex fw-bold">
          <div class="col-md-12">
            <div class="form-group">
              <label for="file-upload" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                ໂປຣຟາຍ
              </label><br>
              <input type="file" id="imgInput" name="Profile_picture" />
              <img width="100%" id="perview" class="mt-2 rounded" alt="">
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