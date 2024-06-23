<?php include_once './header.php'; ?>
<style>
  .image-img {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    /* height: 100vh; */
  }

  .image-img img {
    max-width: 40%;
    height: auto;
    border-radius: 20%;
    overflow: hidden;
  }
</style>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // Use a prepared statement to prevent SQL injection
  $stmt = $conn->prepare("SELECT * FROM customer WHERE ID = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch a single record
  $formattedDateOfBirth = '';
  if (isset($user['DataOfBirth'])) {
    $timestamp = strtotime($user['DataOfBirth']);
    $formattedDateOfBirth = date('Y-m-d', $timestamp);
  }
}
?>

<div class="show-data">
  <div class="row g-3 needs-validation" novalidate>
    <div class="image-img">
      <div class="col-mb-12">
        <img src="../folder-image/image-profile/133853035.jpg" alt="">
      </div>
    </div>
    <hr>
    <div class="col-md-2">
      <h6 for="validationCustom01" class="form-label">ຊື່ : <?= htmlspecialchars($user['Name']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom02" class="form-label">ນາມສະກຸນ : <?= htmlspecialchars($user['Lname']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustomUsername" class="form-label">ອາຍຸ : <?= htmlspecialchars($user['Age']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom03" class="form-label">ເດືອນປີເກີດ : <?= htmlspecialchars($formattedDateOfBirth) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom04" class="form-label">ບ້ານ : <?= htmlspecialchars($user['Village']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ເມືອງ : <?= htmlspecialchars($user['District']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ແຂວງ : <?= htmlspecialchars($user['Province']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ທີ່ຢູ່ : <?= htmlspecialchars($user['Address']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ເພດ : <?= htmlspecialchars($user['Gender']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ສະສາໜາ : <?= htmlspecialchars($user['Religion']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ສັນຊາດ : <?= htmlspecialchars($user['Nationality']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ສາຂາຮຽນ : <?= htmlspecialchars($user['Study']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ລະດັບການສຶກສາ : <?= htmlspecialchars($user['Education_level']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ອິເມວ : <?= htmlspecialchars($user['Email']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ເບີຕິດຕໍ່ : <?= htmlspecialchars($user['Tel']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ໃບປະກາດ : <?= htmlspecialchars($user['Lname']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ໃບຄະແນນ : <?= htmlspecialchars($user['Lname']) ?></h6>
    </div>
    <div class="col-md-2">
      <h6 for="validationCustom05" class="form-label">ໃບຊິວິ : <?= htmlspecialchars($user['Lname']) ?></h6>
    </div>
  </div>
</div>
</div>
<hr>
<!-- Modal edit user -->
<div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" novalidate>
          <div class="col-md-4">
            <label for="validationCustom01" class="form-label">First name</label>
            <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Username</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend">@</span>
              <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Please choose a username.
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label for="validationCustom03" class="form-label">City</label>
            <input type="text" class="form-control" id="validationCustom03" required>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
          <div class="col-md-3">
            <label for="validationCustom04" class="form-label">State</label>
            <select class="form-select" id="validationCustom04" required>
              <option selected disabled value="">Choose...</option>
              <option>...</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid state.
            </div>
          </div>
          <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Zip</label>
            <input type="text" class="form-control" id="validationCustom05" required>
            <div class="invalid-feedback">
              Please provide a valid zip.
            </div>
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
              <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php include_once './footer.php' ?>