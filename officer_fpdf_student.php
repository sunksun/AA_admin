<?php
    require('fpdf/fpdf.php');
    require_once "connect.php";

    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];


    if (isset($_POST['submit'])) {
        define('FPDF_FONTPATH','font/');
        $pdf = new FPDF('P','mm','A4');
  
        $pdf->AddPage();
        $pdf->AddFont('angsa','','angsab.php');
        $pdf->SetFont('angsa','',12);
        $pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ระบบเบิกจ่ายวัสดุอปกรณ์สารเคมีเเละครุภัณฑ์ มหาวิทยาลัยราชภัฏเลย (นักศึกษา)'),0,1);
        $pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ออกรายงาน : '.date('d').'/'.date('m').'/'.(date('Y')+543).' '),0,1);
        $pdf->Ln(5);
        $pdf->SetFont('angsa','',14);
        $pdf->Cell(175,4,iconv( 'UTF-8','TIS-620','ระบบเบิกจ่ายวัสดุอปกรณ์สารเคมีเเละครุภัณฑ์ มหาวิทยาลัยราชภัฏเลย (นักศึกษา)'),0,1,'C');
        $pdf->Ln(2);
        $pdf->Cell(10,7,iconv( 'UTF-8','TIS-620','ลำดับ'),1,0,'C');
        $pdf->Cell(25,7,iconv( 'UTF-8','TIS-620','รหัสการเบิก'),1,0,'C');
        $pdf->Cell(55,7,iconv( 'UTF-8','TIS-620','รายการเบิก'),1,0,'C');
        $pdf->Cell(15,7,iconv( 'UTF-8','TIS-620','จำนวน'),1,0,'C');
        $pdf->Cell(15,7,iconv( 'UTF-8','TIS-620','หน่วย'),1,0,'C');
        $pdf->Cell(35,7,iconv( 'UTF-8','TIS-620','ตั้งแต่วันที่'),1,0,'C');
        $pdf->Cell(35,7,iconv( 'UTF-8','TIS-620','ถึงวันที่'),1,0,'C');
        $pdf->Ln();

        $sql_pdf = "SELECT borrow.borrow_id , borrow.approve , borrow.start_date , borrow.end_date , borrow_list.borrow_id , borrow_list.equ_list , borrow_list.num , borrow_list.unit FROM (borrow INNER JOIN borrow_list ON borrow_list.borrow_id = borrow.borrow_id) WHERE borrow.approve = '2' AND ((start_date BETWEEN '$start_date' AND '$end_date') OR (end_date BETWEEN '$start_date' AND '$end_date'));";
        $query = mysqli_query($conn,$sql_pdf);
        $i = 1;
        while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $pdf->Cell(10,7,iconv( 'UTF-8','TIS-620',''.$i),1,0,'C');
            $pdf->Cell(25,7,iconv( 'UTF-8','TIS-620',''.$result['borrow_id']),1,0,'C');
            $pdf->Cell(55,7,iconv( 'UTF-8','TIS-620',''.$result['equ_list']),1,0,'C');
            $pdf->Cell(15,7,iconv( 'UTF-8','TIS-620',''.$result['num']),1,0,'C');
            $pdf->Cell(15,7,iconv( 'UTF-8','TIS-620',''.$result['unit']),1,0,'C');
            $pdf->Cell(35,7,iconv( 'UTF-8','TIS-620',''.$result['start_date']),1,0,'C');
            $pdf->Cell(35,7,iconv( 'UTF-8','TIS-620',''.$result['end_date']),1,0,'C');
            $pdf->Ln();

            $i++;
        }

        $pdf->Output();
    }
?>