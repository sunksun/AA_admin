<?php
session_start();
require_once "connect.php";

$email = $_GET['email'];
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
        $sql = "SELECT borrow2.borrow_id , borrow_list2.equ_list ,borrow_list2.num , borrow2.approve FROM (borrow2 INNER JOIN borrow_list2 ON borrow2.borrow_id = borrow_list2.borrow_id) WHERE borrow2.email = '$email';";
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
                     } elseif($st == 5) {
                    echo "<font color='#1100ff'>";
                    echo "ไม่ผ่านการอนุมัติ";
                    echo "</font>";
                   } elseif($st == 6) {
                    echo "<font color='#1100ff'>";
                    echo "ไม่ผ่านการตรวจสอบ";
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