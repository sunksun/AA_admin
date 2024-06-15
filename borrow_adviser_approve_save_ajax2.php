<?php
	header('Content-Type: application/json');
	session_start();
	require_once "connect.php";

	$borrow_id = $_POST['borrow_id'];
	$course = $_POST['course'];
	$subject = $_POST['subject'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$fullname = $_POST['fullname'];
	$email = $_SESSION['email'];

	$borrow_id = $_SESSION['borrow_id'];
	$equ_list = $_POST["term"];
	$num = $_POST["num"];
	$unit = $_POST["unit"];
	$email = $_SESSION['email'];
	

	$sql_check = "SELECT * FROM borrow2 WHERE borrow_id = '$borrow_id';";
	$query_check = mysqli_query($conn, $sql_check);
	$result_check = mysqli_fetch_array($query_check,MYSQLI_ASSOC);

	if($result_check["borrow_id"] == $borrow_id){
		$sql2 = "INSERT INTO borrow_list2 (borrow_id, equ_list, num,unit,email) VALUES ('$borrow_id', '$equ_list', '$num','$unit', '$email'); ";
		$query2 = mysqli_query($conn, $sql2);
		
		if($query2) {
		echo json_encode(array('status' => '1','message'=> 'Record add successfully'));
		}
		else
		{
			echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
		}

	} else {
		$sql1 = "INSERT INTO borrow2 (borrow_id, course, subject, start_date, end_date, start_time, end_time,fullname, email,approve) VALUES ('$borrow_id', '$course', '$subject', '$start_date', '$end_date', '$start_time', '$end_time', '$fullname', '$email','1')";
		$query1 = mysqli_query($conn, $sql1);

		$sql2 = "INSERT INTO borrow_list2 (borrow_id, equ_list, num,unit, email) VALUES ('$borrow_id', '$equ_list', '$num','$unit', '$email'); ";
		$query2 = mysqli_query($conn, $sql2);
		
		if($query1 && $query2) {
		echo json_encode(array('status' => '1','message'=> 'Record add successfully'));
		}
		else
		{
			echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
		}

	}

	mysqli_close($conn);
?>