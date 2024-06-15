<?php
session_start() ;
 require_once "connect.php";

  if (isset($_POST['submit'])) {
$equipment_name = $_POST['equipment_name'];
$class = $_POST['class'];
$size = $_POST['size'];
$unit_price = $_POST['unit_price'];
$status = 1;

// prepare and bind
$sql = "INSERT INTO equipment (equipment_name, class, size, unit_price, 
status) VALUES(?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi",$equipment_name, $class, $size, $unit_price, $status);
$stmt->execute() ;

if ($stmt) {
    $_SESSION[' success'] = "Data has been Save.";
    header("location: equipment.php");
 } else {
    $_SESSION['error'] = "Data has not been Save.";
    header("location: index.php");
}
}
?>




