<?php include_once './header.php';
if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $deletestmt = $conn->query("DELETE FROM customer WHERE ID = $delete_id");
  $deletestmt->execute();
}
?>

<?php

$stmt = $conn->query("SELECT * FROM customer WHERE Status = 'user' ORDER BY Name DESC ");
$stmt->execute();
$user = $stmt->fetch();
?>

<style>
  .error {
    width: 92%;
    margin: 0px auto;
    padding: 10px;
    color: #a94442;
    background: #f2dede;
    border-radius: 5px;
    text-align: left;
  }

  .success {
    color: #3c763d;
    background: #dff9d8;
    border: 1px solid #3c763d;
    margin-bottom: 20px;
  }
</style>
<div class="mb-4">
  <div class="mb-5">
    <h3 class="fw-bold">ຕາຕະລາງຈັດການ ບັນຊີຜູ້ເຂົ້າໃຊ້ງານ ຂອງຜູ້ຊອກວຽກ</h3>
  </div>
  <!-- Check error -->
  <?php if (isset($_SESSION['error'])) { ?>
    <div class="alert alert-danger" role="alert">
      <?php
      echo $_SESSION['error'];
      unset($_SESSION['error']);
      ?>
    </div>
  <?php } ?>

  <?php if (isset($_SESSION['success'])) { ?>
    <div class="alert alert-success" role="alert">
      <?php
      echo $_SESSION['success'];
      unset($_SESSION['success']);
      ?>
    </div>
  <?php } ?>

  <div class="row mb-4">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button class="btn btn-primary p-3 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">ເພີ່ມຜູ້ໃຊ້ງານ <i class="fa-solid fa-plus"></i></button>
    </div>
  </div>
  <table id="myTable" class="table">
    <thead>
      <tr>
        <th scope="col" class="left">ຊື່</th>
        <th scope="col">ວັນເດືອນປີເກີດ</th>
        <th scope="col">ເພດ</th>
        <th scope="col">ສັນຊາດ</th>
        <th scope="col">ເມືອງ</th>
        <th scope="col">ແຂວງ</th>
        <th scope="col" class="right">ລາຍການ</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $stmt = $conn->query("SELECT * FROM customer WHERE Status = 'user' ORDER BY Name DESC ");
      $stmt->execute();
      $user = $stmt->fetchAll();

      if (!$user) {
        echo "<tr><td colspan='6' class='text-center'>ຍັງບໍ່ມີ ບັນຊີຜູ້ໃຊ້ງານ</td></tr>";
      } else {
        foreach ($user as $users) {
      ?>
          <tr>
            <td><?= $users['Name'] ? $users['Name'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['DataOfBirth'] ? $users['DataOfBirth'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['Gender'] ? $users['Gender'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['Nationality'] ? $users['Nationality'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['District'] ? $users['District'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['Province'] ? $users['Province'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td class="actions">
              <div class="actions-btn">
                <a href="view_customer.php?id=<?= $users['ID']; ?>" class="btn btn-primary mb-2"><i class="fa-solid fa-eye"></i></a>
                <a href="Edit_customer.php?id=<?= $users['ID']; ?>" class="btn btn-warning mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="?delete=<?= $users['ID']; ?>" class="btn btn-danger delete-btn mb-2" data-id="<?= $users['ID']; ?>"><i class="fa-solid fa-trash-arrow-up"></i></a>
              </div>
            </td>
          </tr>
      <?php  }
      } ?>
    </tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-4 fw-bold" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນ ພະນັກງານ</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="Insert_customer.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="widget-contact-form">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="form-label">ຊື່ຜູ້ໃຂ້ງານງານ</label>
                    <input class="form-control" type="text" name="Name" placeholder="ຊື່ຜູ້ໃຂ້ງານງານ">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="form-label">ນາມສະກຸນ</label>
                    <input class="form-control" type="text" name="Lname" placeholder="ນາມສະກຸນ">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="form-label">ສາຂາຮຽນ</label>
                    <input class="form-control" type="text" name="Study" placeholder="ສາຂາຮຽນ">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-group">
                    <label class="form-label">ລະດັບການສືກສາ</label>
                    <input class="form-control" type="text" name="Education_level" placeholder="ລະດັບການສຶກສາ">
                  </div>
                </div>
                <hr>
                <div class="col-md-4 mb-4">
                  <label class="form-label">ເພດ</label>
                  <div class="form-group d-flex">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" checked="checked" value="ຊາຍ">
                      <label class="form-check-label" for="flexRadioDefault2">
                        ຊາຍ
                      </label>
                    </div>
                    <div class="form-check ms-5">
                      <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" value="ຍິງ">
                      <label class="form-check-label" for="flexRadioDefault2">
                        ຍິງ
                      </label>
                    </div>
                    <div class="form-check ms-5">
                      <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" value="ເພດທີ່ສາມ">
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
                        <input class="form-check-input" type="radio" name="Status_user" id="flexRadioDefault1" checked="checked" value="ໂສດ">
                        <label class="form-check-label" for="flexRadioDefault1">
                          ໂສດ
                        </label>
                      </div>
                      <div class="form-check ms-5">
                        <input class="form-check-input" type="radio" name="Status_user" id="flexRadioDefault1" value="ມີແຟນແລ້ວ">
                        <label class="form-check-label" for="flexRadioDefault1">
                          ມີແຟນແລ້ວ
                        </label>
                      </div>
                      <div class="form-check ms-5">
                        <input class="form-check-input" type="radio" name="Status_user" id="flexRadioDefault1" value="ແຕ່ງງານແລ້ວ">
                        <label class="form-check-label" for="flexRadioDefault1">
                          ແຕ່ງງານແລ້ວ
                        </label>
                      </div>
                      <div class="form-check ms-5">
                        <input class="form-check-input" type="radio" name="Status_user" id="flexRadioDefault1" value="ກຳລັງຄົບຫາກັນຢູ່">
                        <label class="form-check-label" for="flexRadioDefault1">
                          ກຳລັງຄົບຫາກັນຢູ່
                        </label>
                      </div>
                      <div class="form-check ms-5">
                        <input class="form-check-input" type="radio" name="Status_user" id="flexRadioDefault1" value="ສະຖະນະບໍ່ຊັດເຈນ">
                        <label class="form-check-label" for="flexRadioDefault1">
                          ສະຖະນະບໍ່ຊັດເຈນ
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-md-3 mb-4">
                  <div class="form-group">
                    <label class="form-label">ອາຍຸ</label>
                    <input class="form-control" type="number" name="Age" placeholder="ອາຍຸ">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-group">
                    <label class="form-label">ວັນ/ເດືອນ/ປີເກີດ</label>
                    <input class="form-control" type="date" name="DataOfBirth" placeholder="ວັນ/ເດືອນ/ປີເກີດ">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-group">
                    <label class="province">ແຂວງ</label>
                    <input type="text" class="form-control" name="Province" placeholder="ແຂວງ">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-group">
                    <label class="district">ເມືອງ</label>
                    <input type="text" class="form-control" name="District" placeholder="ເມືອງ">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-group">
                    <label class="village">ບ້ານ</label>
                    <input type="text" class="form-control" name="Village" placeholder="ບ້ານ">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-group">
                    <label class="form-label">ທີ່ຢູ່ອື່ນໆ</label>
                    <input class="form-control" type="text" name="Address" placeholder="ທີ່ຢູ່ອື່ນໆ">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-group">
                    <label class="form-label">ສາສະໜາ</label>
                    <input class="form-control" type="text" name="Religion" placeholder="ສາສະໜາ">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-group">
                    <label class="form-label">ສັນຊາດ</label>
                    <input class="form-control" type="text" name="Nationality" placeholder="ສັນຊາດ">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-group">
                    <label class="form-label">ອິເມວ</label>
                    <input class="form-control" type="Email" name="Email" placeholder="ອິເມວ" required>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-group">
                    <label class="form-label">ລະຫັດ</label>
                    <input class="form-control" type="Password" name="Password" placeholder="ລະຫັດ" required >
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-group">
                    <label class="form-label">ເບີຕິດຕໍ່</label>
                    <input class="form-control" type="number" name="Tel" placeholder="ເບີຕິດຕໍ່" >
                  </div>
                </div>
                <hr>
                <label class="fs-5">ບ່ອນຮູບໂຫຼດຮູບພາບ</label>
                <div class="mt-3 d-flex fw-bold">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="file-upload" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                        ໃບປະກາດ
                      </label>
                      <input type="file" id="imgInput" name="Declaration" required />
                      <img width="50%" id="perview" class="mt-2 rounded" alt="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="file-upload" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                        ຊີວີ
                      </label><br>
                      <input type="file" id="imgInput1" name="Cv" required />
                      <img width="50%" id="perview1" class="mt-2 rounded" alt="">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="file-upload" title="ຄິກທີ່ນີ້ ເພື່ອອັບໂຫຼດຮູບພາບ">
                        ໃບຄະແນນ
                      </label><br>
                      <input type="file" id="imgInput2" name="Score" required />
                      <img width="50%" id="perview2" class="mt-2 rounded" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
            <button type="submit" name="record_info_customer" class="btn btn-primary">ບັນທຶກ</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- create function click delete -->
  <?php include_once './footer.php' ?>

  <script>
    $('.delete-btn').click(function(e) {
      var userId = $(this).data('id');
      e.preventDefault();
      deleteConfirm(userId);
    })

    function deleteConfirm(userId) {
      Swal.fire({
        icon: 'warning',
        title: 'ທ່ານໝັ້ນໃຈແລ້ວຫວາ ທີ່ຈະລົບບັນຊີນີ້?',
        text: 'ບັນຊີຈະຖືກລົບອອກຖາວອນ!',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ຍົກເລີກ',
        confirmButtonText: 'ລົບບັນຊີນີ້!',
        showLoaderOnConfirm: true,
        preConfirm: function() {
          return new Promise(function(resolve) {

            $.ajax({
                url: 'Table_customer.php',
                type: 'GET',
                data: 'delete=' + userId,
              })
              .done(function() {
                Swal.fire({
                  title: 'ລົບບັນຊີ',
                  text: 'ລົບບັນຊີໄດ້ເປັນທີ່ຮຽບຮ້ອຍແລ້ວ!',
                  icon: 'success'
                }).then(() => {
                  document.location.href = 'Table_customer.php';
                })
              })
              .fail(function() {
                Swal.fire('Oops...', 'ມີບາງຢ່າງຜິດພາດໃນ ajax!', 'error');
                window.location.reload();
              })
          })
        }
      })
    }

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