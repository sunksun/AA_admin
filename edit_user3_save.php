 <?php
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');

    $field = $_POST['field'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $dep = $_POST['dep'];
    $password = md5($_POST['password']);
    $id = $_GET["id"];

    $sql = "UPDATE tbluser SET
            field = ? ,
            fullname = ? ,
            email = ? , 
            dep = ? ,
            password = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss",$field,$fullname , $email  ,$dep, $password , $id);
    $stmt->execute();

    if ($stmt) {
        $_SESSION[' success'] = "Data has been Save.";
        header("location: user3.php");
    } else {
        $_SESSION['error'] = "Data has not been Save.";
        header("location: dashboard.php");
    }

    $conn->close();
?>