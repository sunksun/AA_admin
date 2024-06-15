<?php
require_once "connect.php" ;
if (isset($_GET['term'])) {

$query = "SELECT * FROM chemical WHERE chem_name LIKE'%{$_GET['term']}%'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0){
while ($user= mysqli_fetch_array($result)) {
$res[] = $user['chem_name'];
}
}else{ 
$res = array();
}
echo json_encode($res);
}
?> 