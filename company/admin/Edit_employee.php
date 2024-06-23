<?php include_once './header.php'; ?>
<form id="contact-form" enctype="multipart/form-data" action="Update_employee.php" method="POST">
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM employees WHERE ID = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
    // Format date for input type="date"
    $formattedDateOfBirth = '';
    if (isset($user_data['DataOfBirth'])) {
      $timestamp = strtotime($user_data['DataOfBirth']);
      $formattedDateOfBirth = date('Y-m-d', $timestamp);
    }
  }
  ?>
  <input type="hidden" name="ID" value="<?= $user_data['ID'] ?>">
  <input type="hidden" name="ID_company" value="<?= $user_data['ID_company'] ?>">
  <input type="hidden" name="Password" value="<?= $user_data['Password'] ?>">
  <input type="hidden" value="<?= $user_data['Profile_picture']; ?>" require class="form-control" name="Profile_picture1">
  <!-- <input type="hidden" name="ID_Task" value="<?= $ID_task['ID_Task'] ?>"> -->
  <div class="row">
    <!-- <div class="col-lg-7 col-xl-8"> -->
    <div class="team-details-item">
      <div class="widget-item widget-contact">
        <div class="widget-title mb-5">
          <h3 class="title">ເພີ່ມຂໍ້ມູນເພື່ອຢືນຢັນ</h3>
        </div>
        <div class="widget-contact-form">
          <div class="row">
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="village">ຊື່ ພະນັກງານ</label>
                <input type="text" class="form-control" name="Name_Employee" placeholder="ພະນັກງານ:" value="<?= $user_data['Name_Employee'] ?>">
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="form-label">ນາມສະກຸນ</label>
                <input class="form-control" type="text" name="Lname" placeholder="ນາມສະກຸນ:" value="<?= $user_data['Lname'] ?>">
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="form-label">ຕຳແໜ່ງ</label>
                <input class="form-control" type="text" name="Position" placeholder="ຕຳແໜ່ງ:" value="<?= $user_data['Position'] ?>">
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="form-label">ອິເມວ</label>
                <input class="form-control" type="Email" name="Email" placeholder="ອິເມວ:" value="<?= $user_data['Email'] ?>">
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="form-label">ເບີຕິດຕໍ່</label>
                <input class="form-control" type="number" name="Tel" placeholder="ເບີຕິດຕໍ່:" value="<?= $user_data['Tel'] ?>">
              </div>
            </div>
            <hr>
            <label class="">ບ່ອນຮູບໂຫຼດຮູບພາບ</label>
            <div class="mt-3 d-flex fw-bold">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="file-upload" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                    ຮູບພາບ
                  </label>
                  <input type="file" id="imgInput" name="Profile_picture" />
                  <img width="50%" id="perview" class="mt-2 rounded" alt="" src="image/<?= $user_data['Profile_picture'] ?>">
                </div>
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