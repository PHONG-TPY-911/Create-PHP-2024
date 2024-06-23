<?php include_once './header.php';
if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $deletestmt = $conn->query("DELETE FROM admin WHERE ID = $delete_id");
  $deletestmt->execute();
}
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
    <h3 class="fw-bold">ຕາຕະລາງຈັດການ ບັນຊີຜູ້ເຂົ້າໃຊ້ງານ (ບໍລິສັດ)</h3>
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
      <button class="btn btn-primary p-3 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">ເພີ່ມ ຜູ້ດູແລລະບົບ <i class="fa-solid fa-plus"></i></button>
    </div>
  </div>
  <table id="myTable" class="table">
    <thead>
      <tr>
        <th scope="col" class="left">ຊື່</th>
        <th scope="col">ນາມສະກຸນ</th>
        <th scope="col">ອາຍຸ</th>
        <th scope="col">ແຂວງ</th>
        <th scope="col">ຕຳແໜ່ງ</th>
        <th scope="col">ອີເມວ</th>
        <th scope="col">ເບີຕິດຕໍ່</th>
        <th scope="col" class="right">ລາຍການ</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $stmt = $conn->query("SELECT * FROM admin WHERE Status = 'admin' ORDER BY Name DESC ");
      $stmt->execute();
      $companys = $stmt->fetchAll();

      if (!$companys) {
        echo "<tr><td colspan='6' class='text-center'>ຍັງບໍ່ມີ ບັນຊີຜູ້ໃຊ້ງານ</td></tr>";
      } else {
        foreach ($companys as $company) {
      ?>
          <tr>
            <td><?= $company['Name'] ? $company['Name'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $company['Lname'] ? $company['Lname'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $company['Age'] ? $company['Age'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $company['Province'] ? $company['Province'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $company['Position'] ? $company['Position'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $company['Email'] ? $company['Email'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $company['Tel'] ? $company['Tel'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td class="actions">
              <div class="actions-btn">
                <a href="Table_View_admin.php?id=<?= $company['ID']; ?>" class="btn btn-primary mb-2"><i class="fa-solid fa-eye"></i></a>
                <a href="Table_Edit_admin.php?id=<?= $company['ID']; ?>" class="btn btn-warning mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="?delete=<?= $company['ID']; ?>" class="btn btn-danger delete-btn mb-2" data-id="<?= $company['ID']; ?>"><i class="fa-solid fa-trash-arrow-up"></i></a>
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
          <h1 class="modal-title fs-4 fw-bold" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນ ບໍລິສັດ</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="Table_insert_admin.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="widget-contact-form">
              <div class="row">
                <div class="col-md-4  mb-4">
                  <div class="form-group">
                    <label class="form-label">ຊື່</label>
                    <input class="form-control" type="text" name="Name" placeholder="ຊື່" required>
                  </div>
                </div>
                <div class="col-md-4  mb-4">
                  <div class="form-group">
                    <label class="form-label">ນາມສະກຸນ</label>
                    <input class="form-control" type="text" name="Lname" placeholder="ນາມສະກຸນ">
                  </div>
                </div>
                <div class="col-md-4  mb-4">
                  <div class="form-group">
                    <label class="form-label">ອາຍຸ</label>
                    <input class="form-control" type="number" name="Age" placeholder="ອາຍຸ">
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-group">
                    <label class="province">ແຂວງ</label>
                    <input type="text" class="form-control" name="Province" placeholder="ແຂວງ">
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-group">
                    <label class="district">ເມືອງ</label>
                    <input type="text" class="form-control" name="District" placeholder="ເມືອງ">
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-group">
                    <label class="village">ບ້ານ</label>
                    <input type="text" class="form-control" name="Village" placeholder="ບ້ານ">
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-group">
                    <label class="village">ທີ່ຢູ່ອື່ນໆ</label>
                    <input type="text" class="form-control" name="Address" placeholder="ທີ່ຢູ່ອື່ນໆ">
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-group">
                    <label class="village">ຕຳແໜ່ງ</label>
                    <input type="text" class="form-control" name="Position" placeholder="ຕຳແໜ່ງ">
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-group">
                    <label class="form-label">ອິເມວ</label>
                    <input class="form-control" type="Email" name="Email" placeholder="ອິເມວ" required>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-group">
                    <label class="form-label">ລະຫັດ</label>
                    <input class="form-control" type="Password" name="Password" placeholder="ລະຫັດ" required>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-group">
                    <label class="form-label">ເບີຕິດຕໍ່</label>
                    <input class="form-control" type="number" name="Tel" placeholder="ເບີຕິດຕໍ່">
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
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
            <button type="submit" name="record_info_admin" class="btn btn-primary">ບັນທຶກ</button>
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
                url: 'Table_admin.php',
                type: 'GET',
                data: 'delete=' + userId,
              })
              .done(function() {
                Swal.fire({
                  title: 'ລົບບັນຊີ',
                  text: 'ລົບບັນຊີໄດ້ເປັນທີ່ຮຽບຮ້ອຍແລ້ວ!',
                  icon: 'success'
                }).then(() => {
                  document.location.href = 'Table_admin.php';
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
  </script>