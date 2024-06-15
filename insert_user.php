<?php
session_start() ;
 require_once "connect.php";

  if (isset($_POST['submit'])) {
$faculty = $_POST['faculty'];
$field = $_POST['field'];
$sec = $_POST['sec'];
$student_id = $_POST['student_id'];
$name_n = $_POST['name_n'];
$pass = md5($_POST['pass']);
$img = $_FILES['img'];
$statu = 1;
$allow = array('jpg', 'jpeg', 'png');
$extension = explode(".",$img['name']);
$fileActExt = strtolower(end($extension));
$fileNew =rand() . "." . $fileActExt;
$filePath = "upload/img_user/".$fileNew;
if (in_array($fileActExt, $allow)) {
if ($img['size'] > 0 && $img['error'] == 0) {
if (move_uploaded_file($img['tmp_name'], $filePath)) {
// prepare and bind
$sql = "INSERT INTO tblstudent (faculty, field, sec, student_id,name_n, pass,img,
statu) VALUES(?, ?, ?, ?, ?, ?, ?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssi",$faculty, $field, $sec, $student_id, $name_n, $pass,
$fileNew, $statu);
$stmt->execute() ;

if ($stmt) {
    $_SESSION[' success'] = "Data has been Save.";
    header("location: user2.php");
 } else {
    $_SESSION['error'] = "Data has not been Save.";
    header("location: index.php");
}
}
}
}
}
?>