<?php

// session_start();
// require_once '../../connect-database/config.php';
?>
<?php require '../Header/header.php' ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-2 mt-3">
            <h4><i class="fa-solid fa-user"></i> ລາຍຊື່ຄອມເມັ້ນ</h4>
        </div>
        <div class="col-md-10 d-flex justify-content-end">
            <button type="button" title="ເພີ່ມບັນຊີ" class="btn btn-primary fw-bold p-3" data-bs-toggle="modal" data-bs-target="#admin-panel"><i class="fa-solid fa-user-plus"></i></button>
        </div>
    </div>
    <hr>
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php } ?>
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
    <?php } ?>
    <table id="myTable" class="table" style="width:100%;">
        <thead style="background-color: #9EACC1;">
            <tr>
                <th scope="col" class="fs-7">ຮູບພາບ</th>
                <th scope="col" class="fs-7">ຊື່</th>
                <th scope="col" class="fs-7">ເນື້ອຫາ</th>
                <th scope="col" class="fs-7">ຮູບພາບ</th>
                <th scope="col" class="fs-7">ໄອດີລົດ</th>
                <th scope="col" class="fs-7">ລາຍການ</th>
            </tr>
        </thead>
    </table>
    <!-- Modal Add info admin panel -->
    <div class="modal fade" id="admin-panel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 mt-2">
                        <form action="insert-type.php" method="post" enctype="multipart/form-data">
                            <h2 class="mt-0 text-center fw-bold">ເພີ່ມຂໍ້ມູນຜູ້ດູແລລະບົບ</h2>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="name" class="form-label fw-bold">ຊື່</label>
                                    <input type="text" class="form-control " name="name" aria-describedby="name" placeholder="ປ້ອນຊື່ຂອງທ່ານ">
                                </div>
                                <div class="col-md-6 mb-4 ">
                                    <label for="lastName" class="form-label fw-bold">ນາມສະກຸນ</label>
                                    <input type="text" class="form-control " name="lname" aria-describedby="lastname" placeholder="ປ້ອນນາມສະກຸນ">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="street" class="form-label fw-bold">ອາຍຸ</label>
                                    <input type="number" class="form-control " name="age" aria-describedby="age" placeholder="ປ້ອນອາຍຸ">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="province" class="form-label fw-bold">ແຂວງ</label>
                                    <select class="form-select" aria-label="Default select example" name="province" id="provinceSelect">
                                        <option value="" selected>-----</option>
                                        <?php
                                        $stmt = $conn->query("SELECT pr_id, pr_name FROM province");
                                        $stmt->execute();
                                        $provincestmt = $stmt->fetchAll();
                                        foreach ($provincestmt as $province) {
                                        ?>
                                            <option value="<?= $province['pr_id']; ?>"> <?= $province['pr_name']; ?></option>
                                        <?php   }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="district" class="form-label fw-bold">ເມືອງ</label>
                                    <select class="form-select" aria-label="Default select example" name="district" id="districtSelect">
                                        <option value="" selected>-----</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="village" class="form-label fw-bold">ບ້ານ</label>
                                    <select class="form-select" aria-label="Default select example" name="village" id="villageSelect">
                                        <option value="" selected>-----</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="tel" class="form-label fw-bold">ທີ່ຢູ່ປັດຈຸບັນ</label>
                                    <input type="text" class="form-control " name="address" aria-describedby="address" placeholder="ປ້ອນທີ່ຢູ່ປັດຈຸບັນ">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="tel" class="form-label fw-bold">ເບີໂທ</label>
                                    <input type="number" class="form-control " name="tel" aria-describedby="tel" placeholder="ປ້ອນເບີໂທ">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tel" class="form-label fw-bold">ຕຳແໜ່ງ</label>
                                    <input type="text" class="form-control " name="position" aria-describedby="position" placeholder="ປ້ອນຕຳແໜ່ງ">
                                </div>
                                <div class=" col-md-6 mb-3">
                                    <label for="email" class="form-label fw-bold">ອີເມວ</label>
                                    <input type="email" class="form-control " name="email" aria-describedby="email" placeholder="ປ້ອນອີເມວ">
                                </div>
                                <div class=" col-md-3 mb-3">
                                    <label for="password" class="form-label fw-bold">ລະຫັດຜ່ານ</label>
                                    <input type="password" class="form-control " name="password" placeholder="ປ້ອນລະຫັດຜ່ານ">
                                </div>
                                <div class=" col-md-3 mb-3">
                                    <label for="confirm password" class="form-label fw-bold">ຢືນຍັນລະຫັດຜ່ານ</label>
                                    <input type="password" class="form-control " name="C_password" placeholder="ຢືນຍັນລະຫັດຜ່ານ">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 ">
                                <label for="img" class="form-label fw-bold">ຮູບພາບ</label>
                                <input type="file" class="form-control" id="image_profile" name="img">
                                <img width="50%" id="perview_profile" class="mt-2 rounded" alt="">
                            </div>
                            <div class="col-md-12 modal-footer text-center mt-3  ">
                                <a href="table-type.php" class="btn btn-info fw-bold"> ເບິ່ງຕະລາງ</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> ຍົກເລີກ</button>
                                <button type="submit" name="types" class="btn btn-primary fw-bold ">ເພີ່ມ</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php require '../Header/Footer.php' ?>

<script>
    let Image_profile = document.getElementById('image_profile');
    let perview_profile = document.getElementById('perview_profile');

    Image_profile.onchange = () => {
        const [file] = Image_profile.files;
        if (file) {
            perview_profile.src = URL.createObjectURL(file);
        }
    }
</script>
<script>
    // $('.delete-btn').click(function(e) {
    //     var comment = $(this).data('id');
    //     e.preventDefault();
    //     deleteConfirm(comment);
    // })

    // function deleteConfirm(comment) {
    //     Swal.fire({
    //         icon: 'warning',
    //         title: 'ທ່ານໝັ້ນໃຈແລ້ວຫວາ ທີ່ຈະລົບບັນຊີນີ້?',
    //         //text: 'It will be delete permanently!',
    //         text: 'ບັນຊີຈະຖືກລົບອອກຖາວອນ!',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         cancelButtonText: 'ຍົກເລີກ',
    //         //ButtonText: 'ຍົກເລີກ',
    //         //confirmButtonText: 'Yes, delete it!',
    //         confirmButtonText: 'ລົບບັນຊີນີ້!',
    //         showLoaderOnConfirm: true,
    //         preConfirm: function() {
    //             return new Promise(function(resolve) {

    //                 $.ajax({
    //                         url: 'table-comment.php',
    //                         type: 'GET',
    //                         data: 'delete=' + comment,
    //                     })
    //                     .done(function() {
    //                         Swal.fire({
    //                             title: 'ລົບບັນຊີ',
    //                             text: 'ລົບບັນຊີໄດ້ເປັນທີ່ຮຽບຮ້ອຍແລ້ວ!',
    //                             icon: 'success'
    //                         }).then(() => {
    //                             document.location.href = 'table-comment.php';
    //                         })
    //                     })
    //                     .fail(function() {
    //                         Swal.fire('Oops...', 'ມີບາງຢ່າງຜິດພາດໃນ ajax!', 'error');
    //                         window.location.reload();
    //                     })
    //             })
    //         }
    //     })
    // }
</script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#myTable').DataTable({
            "aaSorting": [
                [0, 'desc']
            ],
            "oLanguage": {
                "sLengthMenu": "ສະແດງ _MENU_ ແຖວ ຕໍ່ໜ້າ",
                "sZeroRecords": "ບໍ່ພົບຂໍ້ມູນຄົ້ນຫາ",
                "sInfo": "ສະແດງ _START_ ເຖິງ _END_ ຂອງ _TOTAL_ ແຖວ",
                "sInfoEmpty": "ສະແດງ 0 ເຖິງ 0 ຂອງ 0 ແຖວ",
                "sInfoFiltered": "(ຈາກບັນທຶກທັງໝົດ _MAX_ ບັນທຶກ)",
                "sSearch": "ຄົ້ນຫາ : ",
                "sSearch": "ຄົ້ນຫາ : ",
                "sSorting": [
                    [0, 'desc']
                ],
                "oPaginate": {
                    "sFirst": "ໜ້າຫຼັກ",
                    "sPrevious": "ກ່ອນໜ້ານີ້",
                    "sNext": "ຕໍ່ໄປ",
                    "sLast": "ໜ້າສຸດທ້າຍ"
                },
            }
        });
    });
</script>
</body>

</html>