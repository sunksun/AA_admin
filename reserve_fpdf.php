<?php
    require('fpdf/fpdf.php');
    require_once "connect.php";
    include_once('dateThai.php');

    $id = $_GET['id'];
    $name_n = $_GET['name_n'];
    $student_id = $_GET['student_id'];
    $sec = $_GET['sec'];
    $field = $_GET['field'];
    $course = $_GET['course'];
    $start_date = $_GET['start_date'];
    $start_time = $_GET['start_time'];
    $end_date = $_GET['end_date'];
    $end_time = $_GET['end_time'];




        define('FPDF_FONTPATH','font/');
        $pdf = new FPDF();
  
        $pdf->AddPage();
        $pdf->AddFont('angsa','','angsab.php');
        $pdf->SetFont('angsa','',14);
        
        $pdf->Cell(175,4,iconv( 'UTF-8','TIS-620','แบบฟอร์มการเบิกวัสดุอุปกรณ์สารเคมีเเละครุภัณฑ์คณะวิทยาศาสตร์เเละเทคโนโลยี มหาวิทยาลัยราชภัฏเลย'),0,1,'C');
        // $pdf->Cell(175,4,iconv( 'UTF-8','TIS-620','ออกรายงาน : '.date('d').'/'.date('m').'/'.(date('Y')+543).' '),0,1);
        $pdf->Image('img/20160610_3391.png',3,2,40);
        $pdf->Line(10,30,199,30);
        $pdf->Ln(20);
        $pdf->SetFont('angsa','',12);
        
        

        $pdf->Cell(10,7,iconv( 'UTF-8','TIS-620','ข้าพเจ้า'),0,0,);
        $pdf->Cell(59,6,iconv( 'UTF-8','TIS-620',''.$name_n),0,0,);
        $pdf->Line(20,39,80,39);
        $pdf->Cell(20,7,iconv( 'UTF-8','TIS-620','รหัสนักศึกษา'),0,0,);
        $pdf->Cell(40,6,iconv( 'UTF-8','TIS-620',''.$student_id),0,0,);
        $pdf->Line(95,39,140,39);
        $pdf->Cell(15,7,iconv( 'UTF-8','TIS-620','หมู่เรียน'),0,0,);
        $pdf->Cell(70,6,iconv( 'UTF-8','TIS-620',''.$sec),0,1,);
        $pdf->Line(150,39,199,39);
        $pdf->Cell(10,9,iconv( 'UTF-8','TIS-620','สาขา'),0,0,);
        $pdf->Cell(59,8,iconv( 'UTF-8','TIS-620',''.$field),0,0,);
        $pdf->Line(17,46,80,46);
        $pdf->Cell(30,9,iconv( 'UTF-8','TIS-620','มีความประสงค์ขอใช้'),0,0,);
        $pdf->Cell(59,8,iconv( 'UTF-8','TIS-620',''.$course),0,1,);
        $pdf->Line(107,46,199,46);
        $pdf->Cell(17,9,iconv( 'UTF-8','TIS-620','ตั้งแต่วันที่'),0,0,);
        $pdf->Cell(17,8,iconv( 'UTF-8','TIS-620',''.DateThai($start_date)),0,0,);
        $pdf->Cell(43,8,iconv( 'UTF-8','TIS-620',''.$start_time),0,0,);
        $pdf->Line(23,54,87,54);
        $pdf->Cell(17,9,iconv( 'UTF-8','TIS-620','ถึงวันที่'),0,0,);
        $pdf->Cell(17,8,iconv( 'UTF-8','TIS-620',''.DateThai($end_date)),0,0,);
        $pdf->Cell(43,8,iconv( 'UTF-8','TIS-620',''.$end_time),0,0,);
        $pdf->Line(97,54,199,54);
        $pdf->Ln(10);
        $pdf->SetFont('angsa','',12);
        $pdf->Cell(10,7,iconv( 'UTF-8','TIS-620','ลำดับ'),1,0,'C');
        $pdf->Cell(100,7,iconv( 'UTF-8','TIS-620','รายการเบิก'),1,0,'C');
        $pdf->Cell(40,7,iconv( 'UTF-8','TIS-620','จำนาน'),1,0,'C');
        $pdf->Cell(40,7,iconv( 'UTF-8','TIS-620','หน่วย'),1,0,'C');
        $pdf->Ln();
        // sql 
        $sql_pdf = "SELECT borrow.approve,borrow.start_date,borrow.end_date,borrow.start_time,borrow.end_time,borrow_list.num,borrow_list.unit, borrow.id, borrow.student_id, borrow.course , borrow.borrow_id , borrow_list.equ_list, tblstudent.name_n, tblstudent.field, tblstudent.sec FROM (borrow INNER JOIN borrow_list  ON borrow.borrow_id = borrow_list.borrow_id INNER JOIN tblstudent ON borrow.student_id = tblstudent.student_id ) WHERE borrow.id = '$id' AND (borrow.approve = '2');";
        $query = mysqli_query($conn,$sql_pdf);
        $i = 1;
        while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

        $pdf->SetFont('angsa','',10);
        $pdf->Cell(10,7,iconv( 'UTF-8','TIS-620',''.$i),1,0,'C');
        $pdf->Cell(100,7,iconv( 'UTF-8','TIS-620',''.$result['equ_list']),1,0,'C');
        $pdf->Cell(40,7,iconv( 'UTF-8','TIS-620',''.$result['num']),1,0,'C');
        $pdf->Cell(40,7,iconv( 'UTF-8','TIS-620',''.$result['unit']),1,1,'C');
        
        $i++;
         }
        $pdf->Ln(70);
        $pdf->SetFont('angsa','',12);
        $pdf->Cell(150,7,iconv( 'UTF-8','TIS-620','ลงชื่อ......................................'),0,0);
        $pdf->Cell(170,7,iconv( 'UTF-8','TIS-620','ลงชื่อ......................................'),0,1,);
        $pdf->Cell(35,7,iconv( 'UTF-8','TIS-620','(......................................)'),0,0,'C');
        $pdf->Cell(115,7,iconv( 'UTF-8','TIS-620',''),0,0,'C');
        $pdf->Cell(35,7,iconv( 'UTF-8','TIS-620','(......................................)'),0,1,'C');
        $pdf->Cell(30,7,iconv( 'UTF-8','TIS-620','ผู้ยืม'),0,0,'C');
        $pdf->Cell(123,7,iconv( 'UTF-8','TIS-620',''),0,0,'C');
        $pdf->Cell(30,7,iconv( 'UTF-8','TIS-620','อาจารย์ที่ปรึกษา'),0,0,'C');
        $pdf->Ln(35);
        $pdf->Cell(180,7,iconv( 'UTF-8','TIS-620','ลงชื่อ......................................'),0,1,'C');
        $pdf->Cell(180,7,iconv( 'UTF-8','TIS-620','(......................................)'),0,1,'C');
        $pdf->Cell(180,7,iconv( 'UTF-8','TIS-620','เจ้าหน้าที่'),0,1,'C');

        $pdf->Output();
?>