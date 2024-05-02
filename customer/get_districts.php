
<?php
require_once '../connect-database/config.php';
// get_districts.php
// Assume $conn is your database connection

if(isset($_POST['province_id'])) {
    $provinceId = $_POST['province_id'];
    $stmt = $conn->prepare("SELECT * FROM district WHERE pr_id = ?");
    $stmt->execute([$provinceId]);
    $districts = $stmt->fetchAll();
    
    $options = '<option value="">-----</option>';
    foreach ($districts as $district) {
        $options .= '<option value="' . $district['dr_id'] . '">' . $district['dr_name'] . '</option>';
    }
    echo $options;
}
?>

