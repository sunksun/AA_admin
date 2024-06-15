<?php
session_start();
require_once "connect.php";

$student_id = $_GET['student_id'];
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ลำคับ</th>
            <th>รหัสการยืม</th>
            <th>รายการ</th>
            <th>จำนวน</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT borrow.borrow_id , borrow_list.equ_list ,borrow_list.num , borrow.approve FROM (borrow INNER JOIN borrow_list ON borrow.borrow_id = borrow_list.borrow_id) WHERE borrow.student_id = '$student_id';";
        $query = mysqli_query($conn, $sql);
        $i = 1;
        while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        ?>

            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $result["borrow_id"]; ?></td>
                <td><?php echo $result["equ_list"]; ?></td>
                <td><?php echo $result["num"]; ?></td>
                <td>
                    <?php
                    $st = $result["approve"];
                    if ($st == 0 ){
                        echo "<font color='#1100ff'>";
                        echo "รอการตรวจสอบ";
                        echo "</font>";
                    } elseif($st == 1) {
                        echo "<font color='#1100ff'>";
                        echo "รออนุมัติ";
                        echo "</font>";
                    } elseif($st == 2) {
                        echo "<font color='#1100ff'>";
                        echo "อนุมัติแล้ว";
                        echo "</font>";
                    } elseif($st == 3) {
                    echo "<font color='#1100ff'>";
                    echo "คืนเเล้ว";
                    echo "</font>";
                }
                    
                    ?>
                </td>
            </tr>
        <?php
            $i++;
        }
        ?>

    </tbody>
    </tbody>