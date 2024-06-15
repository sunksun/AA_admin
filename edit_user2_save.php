 <?php
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');

    $faculty = $_POST['faculty'];
    $field = $_POST['field'];
    $sec= $_POST['sec'];
    $student_id = $_POST['student_id'];
    $name_n = $_POST['name_n'];
    $pass = md5($_POST['pass']);
    $id = $_GET["id"];
    $sql = "UPDATE tblstudent SET
            faculty = ? ,
            field = ? ,
            sec = ? , 
            student_id = ? ,
            name_n = ? ,
            pass = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss",$faculty,$field , $sec ,$student_id, $name_n , $pass,  $id);
    $stmt->execute();

    if ($stmt) {
        $_SESSION[' success'] = "Data has been Save.";
        header("location: user2.php");
    } else {
        $_SESSION['error'] = "Data has not been Save.";
        header("location: dashboard.php");
    }

    $conn->close();
?>