 <?php
session_start() ;
 require_once "connect.php";

  if (isset($_POST['submit'])) {
$field = $_POST['field'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$dep = $_POST['dep'];
$password = md5($_POST['password']);
$img = $_FILES['img'];
$statuss = 1;
$allow = array('jpg', 'jpeg', 'png');
$extension = explode(".",$img['name']);
$fileActExt = strtolower(end($extension));
$fileNew =rand() . "." . $fileActExt;
$filePath = "upload/img_user/".$fileNew;
if (in_array($fileActExt, $allow)) {
if ($img['size'] > 0 && $img['error'] == 0) {
if (move_uploaded_file($img['tmp_name'], $filePath)) {
// prepare and bind
$sql = "INSERT INTO tbluser (field,fullname, email, dep, password,img,
statuss) VALUES(?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi",$field, $fullname, $email, $dep, $password,
$fileNew, $statuss);
$stmt->execute() ;

if ($stmt) {
    $_SESSION[' success'] = "Data has been Save.";
    header("location: user4.php");
 } else {
    $_SESSION['error'] = "Data has not been Save.";
    header("location: index.php");
}
}
}
}
}
?>