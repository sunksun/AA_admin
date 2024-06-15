 <?php
session_start() ;
 require_once "connect.php";

  if (isset($_POST['submit'])) {
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$useremail = $_POST['useremail'];
$custaddr = $_POST['custaddr'];
$password = md5($_POST['password']);
$img = $_FILES['img'];
$role_id = 1;
$allow = array('jpg', 'jpeg', 'png');
$extension = explode(".",$img['name']);
$fileActExt = strtolower(end($extension));
$fileNew =rand() . "." . $fileActExt;
$filePath = "upload/img_user/".$fileNew;
if (in_array($fileActExt, $allow)) {
if ($img['size'] > 0 && $img['error'] == 0) {
if (move_uploaded_file($img['tmp_name'], $filePath)) {
// prepare and bind
$sql = "INSERT INTO tbladmin (fullname, username, useremail, custaddr, password,img,
role_id) VALUES(?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi",$fullname, $username, $useremail, $custaddr, $password,
$fileNew, $role_id);
$stmt->execute() ;

if ($stmt) {
    $_SESSION[' success'] = "Data has been Save.";
    header("location: user.php");
 } else {
    $_SESSION['error'] = "Data has not been Save.";
    header("location: index.php");
}
}
}
}
}
?>