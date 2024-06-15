 <?php
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');

    $chem_name = $_POST['chem_name'];
    $volume	 = $_POST['volume'];
    $balance = $_POST['balance'];
    $unit = $_POST['unit'];
    $typee = $_POST['typee'];
    $userbility = $_POST['userbility'];
    $id = $_GET['id'];

    $sql = "UPDATE chemical SET
            chem_name = ? ,
            volume = ? , 
            balance = ? ,
            unit = ? ,
            typee = ?,
            userbility = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss",$chem_name,$volume,$balance, $unit , $typee, $userbility,  $id);
    $stmt->execute();

    if ($stmt) {
        $_SESSION[' success'] = "Data has been Save.";
        header("location: chemical_list.php");
    } else {
        $_SESSION['error'] = "Data has not been Save.";
        header("location: dashboard.php");
    }

    $conn->close();
?>