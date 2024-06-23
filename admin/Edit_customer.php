<?php include_once './header.php'; ?>
<form id="contact-form" enctype="multipart/form-data" action="Update_customer.php" method="POST">
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM customer WHERE ID = :id");
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
  <!-- <input type="hidden" value="<?= $user_data['Profile_picture']; ?>" require class="form-control" name="Profile_picture1"> -->
  <input type="hidden" value="<?= $user_data['Declaration']; ?>" require class="form-control" name="Declaration1">
  <input type="hidden" value="<?= $user_data['Score']; ?>" require class="form-control" name="Score1">
  <input type="hidden" value="<?= $user_data['Cv']; ?>" require class="form-control" name="Cv1">
  <input type="hidden" value="<?= $user_data['Password']; ?>" require class="form-control" name="Password">
  <!-- <input type="hidden" value="<?= $user_data['Email']; ?>" require class="form-control" name="Email">
  <input type="hidden" value="<?= $user_data['Status']; ?>" require class="form-control" name="Status"> -->

  <?php
  $user_id = $user_data['ID'];
  $stmt = $conn->prepare("SELECT ID_Task,ID FROM taskinformation WHERE ID = :user_id");
  $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $stmt->execute();
  $ID_task = $stmt->fetch(PDO::FETCH_ASSOC);
  ?>

  <input type="hidden" name="ID_task_information" value="<?= htmlspecialchars($ID_task['ID_Task']); ?>">
  <div class="row">
    <!-- <div class="col-lg-7 col-xl-8"> -->
    <div class="team-details-item">
      <div class="widget-item widget-contact">
        <div class="widget-title mb-5">
          <h3 class="title">ເພີ່ມຂໍ້ມູນເພື່ອຢືນຢັນ</h3>
          <hr width="210">
        </div>
        <div class="widget-contact-form">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-label">ຊື່ຜູ້ໃຂ້ງານງານ</label>
                <input class="form-control" type="text" name="Name" placeholder="ຊື່ຜູ້ໃຂ້ງານງານ:" value="<?= $user_data['Name'] ?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-label">ນາມສະກຸນ</label>
                <input class="form-control" type="text" name="Lname" placeholder="ນາມສະກຸນ:" value="<?= $user_data['Lname'] ?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-label">ສາຂາຮຽນ</label>
                <input class="form-control" type="text" name="Study" placeholder="ສາຂາຮຽນ:" value="<?= $user_data['Study'] ?>">
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="form-label">ລະດັບການສືກສາ</label>
                <input class="form-control" type="text" name="Education_level" placeholder="ລະດັບການສຶກສາ:" value="<?= $user_data['Education_level'] ?>">
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <label class="form-label">ເພດ</label>
              <div class="form-group d-flex">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" value="ຊາຍ" <?= $user_data['Gender'] == 'ຊາຍ' ? 'checked' : '' ?>>
                  <label class="form-check-label" for="flexRadioDefault2">
                    ຊາຍ
                  </label>
                </div>
                <div class="form-check ms-5">
                  <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" value="ຍິງ" <?= $user_data['Gender'] == 'ຍິງ' ? 'checked' : '' ?>>
                  <label class="form-check-label" for="flexRadioDefault2">
                    ຍິງ
                  </label>
                </div>
                <div class="form-check ms-5">
                  <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" value="ເພດທີ່ສາມ" <?= $user_data['Gender'] == 'ເພດທີ່ສາມ' ? 'checked' : '' ?>>
                  <label class="form-check-label" for="flexRadioDefault2">
                    ເພດທີ່ສາມ
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-8 mb-3">
              <div class="form-group">
                <label class="form-label">ສະຖະນະ</label>
                <label class="form-label">ເພດ</label>
                <div class="form-group d-flex">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="Status_user" id="flexRadioDefault1" value="ໂສດ" <?= $user_data['Status_user'] == 'ໂສດ' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                      ໂສດ
                    </label>
                  </div>
                  <div class="form-check ms-5">
                    <input class="form-check-input" type="radio" name="Status_user" id="flexRadioDefault1" value="ມີແຟນແລ້ວ" <?= $user_data['Status_user'] == 'ມີແຟນແລ້ວ' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                      ມີແຟນແລ້ວ
                    </label>
                  </div>
                  <div class="form-check ms-5">
                    <input class="form-check-input" type="radio" name="Status_user" id="flexRadioDefault1" value="ແຕ່ງງານແລ້ວ" <?= $user_data['Status_user'] == 'ແຕ່ງງານແລ້ວ' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                      ແຕ່ງງານແລ້ວ
                    </label>
                  </div>
                  <div class="form-check ms-5">
                    <input class="form-check-input" type="radio" name="Status_user" id="flexRadioDefault1" value="ກຳລັງຄົບຫາກັນຢູ່" <?= $user_data['Status_user'] == 'ກຳລັງຄົບຫາກັນຢູ່' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                      ກຳລັງຄົບຫາກັນຢູ່
                    </label>
                  </div>
                  <div class="form-check ms-5">
                    <input class="form-check-input" type="radio" name="Status_user" id="flexRadioDefault1" value="ສະຖະນະບໍ່ຊັດເຈນ" <?= $user_data['Status_user'] == 'ສະຖະນະບໍ່ຊັດເຈນ' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                      ສະຖະນະບໍ່ຊັດເຈນ
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="form-label">ອາຍຸ</label>
                <input class="form-control" type="text" name="Age" placeholder="ອາຍຸ:" value="<?= $user_data['Age'] ?>">
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="form-label">ວັນ/ເດືອນ/ປີເກີດ</label>
                <input class="form-control" type="date" name="DataOfBirth" placeholder="ວັນ/ເດືອນ/ປີເກີດ:" value="<?= htmlspecialchars($formattedDateOfBirth) ?>">
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="province">ແຂວງ</label>
                <input type="text" class="form-control" name="Province" placeholder="ແຂວງ:" value="<?= $user_data['Province'] ?>">
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="district">ເມືອງ</label>
                <input type="text" class="form-control" name="District" placeholder="ເມືອງ:" value="<?= $user_data['District'] ?>">
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="village">ບ້ານ</label>
                <input type="text" class="form-control" name="Village" placeholder="ບ້ານ:" value="<?= $user_data['Village'] ?>">
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="form-label">ທີ່ຢູ່ອື່ນໆ</label>
                <input class="form-control" type="text" name="Address" placeholder="ທີ່ຢູ່ອື່ນໆ:" value="<?= $user_data['Address'] ?>">
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="form-label">ສາສະໜາ</label>
                <input class="form-control" type="text" name="Religion" placeholder="ສາສະໜາ:" value="<?= $user_data['Religion'] ?>">
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label class="form-label">ສັນຊາດ</label>
                <input class="form-control" type="text" name="Nationality" placeholder="ສັນຊາດ:" value="<?= $user_data['Nationality'] ?>">
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
                <input class="form-control" type="text" name="Tel" placeholder="ເບີຕິດຕໍ່:" value="<?= $user_data['Tel'] ?>">
              </div>
            </div>
            <label class="">ບ່ອນຮູບໂຫຼດຮູບພາບ</label>
            <div class="mt-3 d-flex fw-bold">
              <div class="col-md-4">
                <div class="form-group">
                  <!-- <label for="img">ໃບປະກາດ:</label>
                            <input type="file" id="img" name="declaration" accept="image/*"> -->
                  <label for="file-upload" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                    ໃບປະກາດ
                  </label>
                  <input type="file" id="imgInput" name="Declaration" />
                  <img width="50%" id="perview" class="mt-2 rounded" alt="" src="../folder-image/image-declaration/<?= $user_data['Declaration'] ?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <!-- <label for="img">ໃບຄະແນນ:</label>
                            <input type="file" id="img" name="score" accept="image/*"> -->

                  <label for="file-upload" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                    ຊີວີ
                  </label>
                  <input type="file" id="imgInput1" name="Cv" />
                  <img width="50%" id="perview1" class="mt-2 rounded" alt="" src="../folder-image/image-cv/<?= $user_data['Cv'] ?>">
                </div>
              </div>
              <div class="col-md-5 mb-4">
                <div class="form-group">
                  <!-- <label for="img">ຊີວີ:</label>
                            <input type="file" id="img" name="cv" accept="image/*"> -->

                  <label for="file-upload" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                    ໃບຄະແນນ
                  </label>
                  <input type="file" id="imgInput2" name="Score" />
                  <img width="50%" id="perview2" class="mt-2 rounded" alt="" src="../folder-image/image-score/<?= $user_data['Score'] ?>">
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

          <!--== Message Notification ==-->
          <!-- <div class="form-message"></div> -->
        </div>
      </div>
      <!-- </div> -->
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

  // img1
  let imgInput1 = document.getElementById('imgInput1');
  let previewImg1 = document.getElementById('perview1');

  imgInput1.onchange = evt => {
    const [file] = imgInput1.files;
    if (file) {
      previewImg1.src = URL.createObjectURL(file);
    }
  }
  // img1

  // img1
  let imgInput2 = document.getElementById('imgInput2');
  let previewImg2 = document.getElementById('perview2');

  imgInput2.onchange = evt => {
    const [file] = imgInput2.files;
    if (file) {
      previewImg2.src = URL.createObjectURL(file);
    }
  }
  // img1
</script>