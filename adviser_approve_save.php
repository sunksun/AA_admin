<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');

	$borrow_id = $_GET['borrow_id'];
	$approve = '1';
	$approve2 = '6';

	$sql = "UPDATE borrow SET approve = ? WHERE borrow_id = ? ;";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ss', $approve, $borrow_id);

	$stmt ->execute();

	if ($stmt) {
		$_SESSION['success'] = "Data has been Update.";
		header("location: adviser_approve.php");
	} else {
		$_SESSION['error'] = "Data has not been Update.";
		header("location: dashboard.php");
	}
	if (isset($_POST['no'])) {
		$sql = "UPDATE borrow SET approve = ? WHERE borrow_id = ? ;";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('ss', $approve2, $borrow_id);
		$stmt ->execute();
		if ($stmt) {
			$_SESSION['success'] = "Data has been Update.";
			header("location: adviser_approve.php");
		} else {
			$_SESSION['error'] = "Data has not been Update.";
			header("location: dashboard.php");
		}
	}

	$conn->close();
?>