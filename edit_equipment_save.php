 <?php
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');

    $equipment_name = $_POST['equipment_name'];
    $class = $_POST['class'];
    $size = $_POST['size'];
    $unit_price = $_POST['unit_price'];
    $userbility = $_POST['userbility'];
    $id = $_SESSION['id'];

    $sql = "UPDATE equipment SET
            equipment_name = ? ,
            class = ? , 
            size = ? ,
            unit_price = ? ,
            userbility = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss",$equipment_name,$class  ,$size, $unit_price , $userbility,  $id);
    $stmt->execute();

    if ($stmt) {
        $_SESSION[' success'] = "Data has been Save.";
        header("location: equipment.php");
    } else {
        $_SESSION['error'] = "Data has not been Save.";
        header("location: dashboard.php");
    }

    $conn->close();
?>