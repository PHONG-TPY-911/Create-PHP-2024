<?php include_once './header.php'; ?>
<?php
if (!isset($_SESSION['company_login']) && !isset($_SESSION['employee_login'])) {
    $_SESSION['error'] = 'ກາລຸນາເຂົ້າສູ່ລະບົບ!';
    header("location: ../../customer/login.php");
}


if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deletestmt = $conn->query("DELETE FROM employees WHERE ID = $delete_id");
    $deletestmt->execute();
}
?>
<div class="mb-4">
    <div class="mb-5">
        <h3 class="fw-bold">ຕາຕະລາງຈັດການ ປະກາດວຽກ ຂອງບໍລິສັດ</h3>
        <hr>
    </div>
    <div class="row mb-4">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary p-3 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">ເພີ່ມການປະກາດວຽກ <i class="fa-solid fa-plus"></i></button>
        </div>
    </div>
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th scope="col" class="left">ໂພສເຕີ້ປະກາດວຽກ</th>
                <th scope="col">ຫົວຂໍ້ໜ້າວຽກ</th>
                <th scope="col">ເງີນເດືອນ</th>
                <th scope="col">ວັນທີ່ເປີດຮັບສະໝັກວຽກ</th>
                <th scope="col">ວັນທີ່ປີດຮັບສະໝັກວຽກ</th>
                <th scope="col">ໜ້າວຽກໂດຍຫຍໍ້</th>
                <th scope="col" class="right">ລາຍການ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['company_login'])) {
                $company_id = $_SESSION['company_login'];
                $stmt = $conn->prepare("SELECT * FROM post_work_company WHERE ID_company = :company_id");
                $stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);
            } elseif (isset($_SESSION['employee_login'])) {
                $employee_id = $_SESSION['employee_login'];
                $stmt = $conn->prepare("SELECT * FROM post_work_company WHERE ID_employee = :employee_id");
                $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
            } else {
                // Handle the case where no valid session exists
                echo "<tr><td colspan='6' class='text-center'>No valid session found.</td></tr>";
                exit;
            }

            $stmt->execute();
            $post_Work = $stmt->fetchAll();
            if (!$post_Work) {
                echo "<tr><td colspan='6' class='text-center'>ຍັງບໍ່ມີ ບັນຊີຜູ້ໃຊ້ງານ</td></tr>";
            } else {
                foreach ($post_Work as $post_Works) {

            ?>
                    <tr>
                        <td>
                            <img src="./Image_post/<?= $post_Works['Job_post_photos']; ?>" class="d-block" width="100px" alt="<?= $post_Works['Job_post_photos']; ?>">
                        </td>
                        <td><?= $post_Works['Job_title'] ? $post_Works['Job_title'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
                        <td><?= $post_Works['Salary'] ? $post_Works['Salary'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
                        <td><?= $post_Works['Job_data'] ? $post_Works['Job_data'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
                        <td><?= $post_Works['job_end_data'] ? $post_Works['job_end_data'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
                        <td><?= $post_Works['Describe_work'] ? $post_Works['Describe_work'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
                        <td class="actions">
                            <div class="actions-btn">
                                <a href="Edit_Post_company.php?id=<?= $post_Works['ID']; ?>" class="btn btn-warning mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="?delete=<?= $post_Works['ID']; ?>" class="btn btn-danger delete-btn mb-2" data-id="<?= $post_Works['ID']; ?>"><i class="fa-solid fa-trash-arrow-up"></i></a>
                            </div>
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນ ພະນັກງານ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="Table_Post_Work_DB.php" method="post" enctype="multipart/form-data">

                    <div class="modal-body">
                        <?php
                        if (isset($_SESSION['company_login']))
                            $user_id = $_SESSION['company_login'];
                        // echo 'User ID' . $user_id;
                        $stmt = $conn->query("SELECT * FROM company WHERE ID = $user_id ");
                        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

                        if (isset($_SESSION['employee_login']))
                            $employee_id = $_SESSION['employee_login'];
                        // echo 'User ID' . $user_id;
                        $stmt = $conn->query("SELECT * FROM employees WHERE ID = $employee_id");
                        $employees_id = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>

                        <input type="text" name="ID_company" value="<?= $user_data['ID'] ?>">
                        <input type="text" name="ID_employee" value="<?= $employees_id['ID'] ?>">
                        <div class="row g-3 needs-validation" novalidate>

                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">ຫົວຂໍ້ໜ້າວຽກ</label>
                                <input type="text" class="form-control" name="Job_title">
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">ເງີນເດືອນ</label>
                                <input type="number" class="form-control" name="Salary">
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustomUsername" class="form-label">ວັນທີ່ເປີດຮັບສະໝັກວຽກ</label>
                                <input type="date" class="form-control" name="Job_data">
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">ວັນທີ່ປີດຮັບສະໝັກວຽກ</label>
                                <input type="date" class="form-control" name="job_end_data">
                            </div>
                            <label for="validationCustom02" class="form-label">ເວລາການເຮັດວຽກ</label>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Working_time" id="exampleRadios1" value="Part-Time" checked="checked">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Part-Time
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Working_time" id="exampleRadios2" value="Full-Time">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Full-Time
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label for="validationCustom03" class="form-label">ເວລາ</label>
                                <input class="form-control" type="time" name="Time">
                            </div>

                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">ໜ້າວຽກໂດຍຫຍໍ້</label>
                                <textarea type="text" class="form-control" name="Describe_work"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom05" class="form-label">ໂພສເຕີ້ປະກາດວຽກ</label><br>
                                <input type="file" name="Job_post_photos" id="image-company"><br>
                                <hr>
                                <img width="100%" id="perviewImage" class="mt-4 rounded" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
                        <button type="submit" name="add" class="btn btn-primary">ບັນທຶກ</button>
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
                                url: 'Table_emplyee.php',
                                type: 'GET',
                                data: 'delete=' + userId,
                            })
                            .done(function() {
                                Swal.fire({
                                    title: 'ລົບບັນຊີ',
                                    text: 'ລົບບັນຊີໄດ້ເປັນທີ່ຮຽບຮ້ອຍແລ້ວ!',
                                    icon: 'success'
                                }).then(() => {
                                    document.location.href = 'Table_emplyee.php';
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
        let Image_company = document.getElementById('image-company');
        let preview = document.getElementById('perviewImage');
        Image_company.onchange = e => {
            const [file] = Image_company.files;
            if (file) {
                preview.src = URL.createObjectURL(file);
            }
        }
    </script>