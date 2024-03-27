<?php
session_start();
require_once '../../connect-database/config.php';
require_once './get_districts.php';
require_once './get_village.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../insert-info/img00/logo.jpg" rel="apple-touch-icon">
    <link href="../insert-info/img00/logo.jpg" rel="icon">
    <title>ຟອມສະໝັກສະມາຊີກ</title>
    <link rel="stylesheet" href="./css/Regsiter.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
</style>
<body>
    <div class="container">
        <!-- <hr style="width:50%; margin-left:25% !important; margin-right:25% !important;" /> -->
        <form action="Regsiter_db.php" method="post">
            <h2 class="mt-0 text-center">ສະໝັກສະມາຊິກ</h2>
            <hr>
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role=alert>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php  } ?>
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role=alert>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php  } ?>
            <?php if (isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role=alert>
                    <?php
                    echo $_SESSION['warning'];
                    unset($_SESSION['warning']);
                    ?>
                </div>
            <?php  } ?>
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
            <div class="btn">
                <button type="submit" name="regsiter" class="btn btn-primary fw-bold text-center" style="padding-left: 2.5rem; padding-right: 2.5rem; margin-top: 10px; text-align: center;">ສະໝັກສະມາຊິກ</button>
            </div>
            <p class="small fw-bold mt-3 pt-1 mb-0 text-center">ເປັນສະມາຊິກແລ້ວບໍ່? ຄິກທີ່ນິ້ເພື່ອ <a href="login.php" class="link-danger" style="text-decoration: none;">ເຂົ້າສູ່ລະບົບ</a></p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./setValue_select.js"></script>
</body>

</html>
<!-- <script>
    var selectElement = document.getElementById('provinceSelect');

    // Add an event listener to the 'change' event of the select element
    selectElement.addEventListener('change', function() {
        // Get the selected option from the select element
        var selectedOption = selectElement.options[selectElement.selectedIndex];

        // Get the value attribute of the selected option
        var selectedValue = selectedOption.value;

        // Log or use the selected value as needed
        alert(selectedValue);
    });
</script> -->
