 <?php
session_start() ;
 require_once "connect.php";

  if (isset($_POST['submit'])) {
$borrow_id = $_POST['borrow_id']; 
$course = $_POST['course'];
$subject = $_POST['subject'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$advisor = $_POST['advisor'];
$student_id = $_SESSION['student_id']; 




$sql = "INSERT INTO borrow (borrow_id,course, subject, start_date, end_date, start_time,end_time,
advisor,student_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssi",$borrow_id,$course, $subject, $start_date, $end_date, $start_time,
$end_time, $advisor,$student_id);
$stmt->execute() ;

if ($stmt) {
    $_SESSION[' success'] = "Data has been Save.";
    header("location: borrow.php");
 } else {
    $_SESSION['error'] = "Data has not been Save.";
    header("location: index.php");
}
}
?>