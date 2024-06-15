 <?php
session_start() ;
 require_once "connect.php";

  if (isset($_POST['submit'])) {
$chem_name = $_POST['chem_name'];
$volume = $_POST['volume'];
$balance = $_POST['balance'];
$unit = $_POST['unit'];
$typee = $_POST['typee'];
$statuss = 1;

// prepare and bind
$sql = "INSERT INTO chemical (chem_name, volume, balance, unit, typee,
statuss) VALUES(?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi",$chem_name, $volume, $balance, $unit, $typee,$statuss);
$stmt->execute() ;

if ($stmt) {
    $_SESSION[' success'] = "Data has been Save.";
    header("location: chemical_list.php");
 } else {
    $_SESSION['error'] = "Data has not been Save.";
    header("location: index.php");
}
}
?>