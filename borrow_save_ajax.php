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
	$advisor = $_POST['advisor'];
	$student_id = $_SESSION['student_id'];

	$borrow_id = $_SESSION['borrow_id'];
	$equ_list = $_POST["term"];
	$num = $_POST["num"];
	$unit = $_POST["unit"];
	$student_id = $_SESSION['student_id'];
	
	
	 if($result_check["borrow_id"] == $borrow_id){
	 	$sql2 = "INSERT INTO borrow_list (borrow_id, equ_list, num,unit,student_id) VALUES ('$borrow_id', '$equ_list', '$num','$unit', '$student_id'); ";
		$query2 = mysqli_query($conn, $sql2);
		
	 	if($query2) {
	 	echo json_encode(array('status' => '1','message'=> 'Record add successfully'));
	 	}
	 	else
	 	{
			echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
		}

 } else {
 	$sql1 = "INSERT INTO borrow (borrow_id, course, subject, start_date, end_date, start_time, end_time, advisor, student_id,approve) VALUES ('$borrow_id', '$course', '$subject', '$start_date', '$end_date', '$start_time', '$end_time', '$advisor', '$student_id','0')";
	 	$query1 = mysqli_query($conn, $sql1);

	 	$sql2 = "INSERT INTO borrow_list (borrow_id, equ_list, num,unit, student_id) VALUES ('$borrow_id', '$equ_list', '$num','$unit', '$student_id'); ";
	 	$query2 = mysqli_query($conn, $sql2);
		
	 	if($query1 && $query2) {
	 	echo json_encode(array('status' => '1','message'=> 'Record add successfully'));
	 	}
	 	else
		{
	 		echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
	 	}

	 }

?>