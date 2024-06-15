<?php
session_start() ;
 require_once "connect.php";

  if (isset($_POST['submit'])) {
$equi_ass_name = $_POST['equi_ass_name'];
$size = $_POST['size'];
$unit_price = $_POST['unit_price'];
$statuss = 1;

// prepare and bind
$sql = "INSERT INTO equipment_da (equi_ass_name,  size, unit_price, 
statuss) VALUES(?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi",$equi_ass_name,  $size, $unit_price, $statuss);
$stmt->execute() ;

if ($stmt) {
    $_SESSION[' success'] = "Data has been Save.";
    header("location: equipment_da_list.php");
 } else {
    $_SESSION['error'] = "Data has not been Save.";
    header("location: index.php");
}
}
?>




