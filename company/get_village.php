
<?php
require_once '../connect-database/config.php';
// get_villages.php
// Assume $conn is your database connection

if(isset($_POST['district_id'])) {
    $districtId = $_POST['district_id'];
    $stmt = $conn->prepare("SELECT * FROM village WHERE dr_id = ?");
    $stmt->execute([$districtId]);
    $villages = $stmt->fetchAll();
    
    $options = '<option value="">-----</option>';
    foreach ($villages as $village) {
        $options .= '<option value="' . $village['vill_id'] . '">' . $village['vill_name'] . '</option>';
    }
    echo $options;
}
?>
