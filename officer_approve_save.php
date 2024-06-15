<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');

	$borrow_id = $_GET['borrow_id'];
	$approve = '2';
	$approve2 = '5';

	if (isset($_POST['yes'])) {
		$sql = "UPDATE borrow SET approve = ? WHERE borrow_id = ? ;";
		$stmt = $conn->prepare($sql);

	$query2 = mysqli_query($conn, 'SELECT * FROM borrow_list WHERE borrow_id = "'.$borrow_id.'"');
	while($fetch2 = mysqli_fetch_array($query2)){
		$s = 'UPDATE equipment SET userbility = userbility - '.$fetch2['num'].' WHERE equipment_name = "'.$fetch2['equ_list'].'" ;';
		if(mysqli_query($conn, $s)){
		}
		$ss = 'UPDATE equipment_da SET userbility = userbility - '.$fetch2['num'].' WHERE equi_ass_name = "'.$fetch2['equ_list'].'" ;';
		if(mysqli_query($conn, $ss)){
		}
		$sss = 'UPDATE chemical SET userbility = userbility - '.$fetch2['num'].' WHERE chem_name = "'.$fetch2['equ_list'].'" ;';
		if(mysqli_query($conn, $sss)){
		}
			
	}	
	$stmt->bind_param('ss', $approve, $borrow_id);

	$stmt ->execute();

	if ($stmt) {
		$_SESSION['success'] = "Data has been Update.";
		header("location: officer_approve.php");
	} else {
		$_SESSION['error'] = "Data has not been Update.";
		header("location: dashboard.php");
	}
	}

	if (isset($_POST['no'])) {
		$sql = "UPDATE borrow SET approve = ? WHERE borrow_id = ? ;";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('ss', $approve2, $borrow_id);
		$stmt ->execute();
		if ($stmt) {
			$_SESSION['success'] = "Data has been Update.";
			header("location: officer_approve.php");
		} else {
			$_SESSION['error'] = "Data has not been Update.";
			header("location: dashboard.php");
		}
	}

	

	

	$conn->close();
