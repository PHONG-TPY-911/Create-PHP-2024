<?php include_once './header copy.php'; ?>
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
    <div class="col-md-4">
      <h6 for="validationCustom01" class="form-label">ຊື່ : <?= htmlspecialchars($company_data['Name']) ?> </h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom02" class="form-label">ນາມສະກຸນ : <?= htmlspecialchars($company_data['Lname']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom02" class="form-label">ອາຍຸ : <?= htmlspecialchars($company_data['Age']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom04" class="form-label">ບ້ານ : <?= htmlspecialchars($company_data['Village']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ເມືອງ : <?= htmlspecialchars($company_data['District']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ແຂວງ : <?= htmlspecialchars($company_data['Province']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ທີ່ຢູ່ອື່ນໆ : <?= htmlspecialchars($company_data['Address']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ຕຳແໜ່ງ : <?= htmlspecialchars($company_data['Position']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ອິເມວ : <?= htmlspecialchars($company_data['Email']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ເບີຕິດຕໍ່ : <?= htmlspecialchars($company_data['Tel']) ?></h6>
    </div>
  </div>
</div>
</div>
<hr>

<?php include_once './footer.php' ?>