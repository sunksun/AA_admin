 <?php
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');

    $equi_ass_name = $_POST['equi_ass_name'];
    $size = $_POST['size'];
    $unit_price = $_POST['unit_price'];
    $userbility = $_POST['userbility'];
    $id = $_SESSION['id'];

    $sql = "UPDATE equipment_da SET
            equi_ass_name = ? ,
            size = ? , 
            unit_price = ? ,
            userbility = ? 
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss",$equi_ass_name,$size,$unit_price, $userbility , $id);
    $stmt->execute();

    if ($stmt) {
        $_SESSION[' success'] = "Data has been Save.";
        header("location: equipment_da_list.php");
    } else {
        $_SESSION['error'] = "Data has not been Save.";
        header("location: dashboard.php");
    }

    $conn->close();
?>