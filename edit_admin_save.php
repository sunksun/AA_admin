 <?php
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');

    $fullname = $_POST['fullname'];
    $useremail = $_POST['useremail'];
    $custaddr = $_POST['custaddr'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $id = $_SESSION['id'];

    $sql = "UPDATE tbladmin SET
            fullname = ? ,
            useremail = ? ,
            custaddr = ? , 
            username = ? ,
            password = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss",$fullname,$useremail , $custaddr  ,$username, $password , $id);
    $stmt->execute();

    if ($stmt) {
        $_SESSION[' success'] = "Data has been Save.";
        header("location: user.php");
    } else {
        $_SESSION['error'] = "Data has not been Save.";
        header("location: dashboard.php");
    }

    $conn->close();
?>