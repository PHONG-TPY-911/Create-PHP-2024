<?php
session_start();
require_once '../../connect-database/config.php';

if (!isset($_SESSION['user_id'])) {
  header("refresh:1; url=login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <h1>pongsavath</h1>
  <?php
  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
  }
  try {
    $stmt = $conn->prepare("SELECT * FROM customer WHERE ID = ?");
    $stmt->execute([$user_id]);
    $userDate = $stmt->fetch();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  ?>
  <h1><?php echo $userDate['ID'] ?></h1>
  <h1><?php echo $userDate['Name'] ?></h1>
  <h1><?php echo $userDate['Email'] ?></h1>
  <h1><?php echo $userDate['Status'] ?></h1>
</body>

</html>