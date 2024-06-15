<?php
ini_set('display_errors', 1);
error_reporting(~0);
session_start();
include_once('connect.php');
$id = $_GET['id'];
$sql = "DELETE FROM equipment_da WHERE id = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $id);
$stmt ->execute();
if ($stmt) {
$_SESSION[' success'] = "Data has been Update.";
header("location: equipment_da_list.php");
 } else {
$_SESSION['error'] = "Data has not been Update.";
header("Location: index.php");
$conn->close();
 }
?>
