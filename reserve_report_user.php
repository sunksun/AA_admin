<?php
ini_set('display_errors', 1);
error_reporting(~0);
session_start();
include_once('connect.php');
include_once('dateThai.php');


$id = $_SESSION["id"];
$sql = "SELECT * FROM tblstudent WHERE id = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $id); //   s - string, b - blob, i - int, etc
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

$id = @$row["id"];
$name_n = $row["name_n"];
$student_id = $row["student_id"];
$_SESSION["student_id"] = $row["student_id"];
$field = $row['field'];

$statu = $row["statu"];
if ($statu != "1") {
    echo "<script>alert('กรุณา Login ก่อน\!!!!');window.location ='login_user.php';</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="./img/lrulogo.png" />

    <title> User </title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Bootstrap Css -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <!-- sidebar -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('sidebar4.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name_n; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!--  -->
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">ออกรายงาน</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>รหัสการเบิก</th>
                                                    <th>รายการเบิก</th>
                                                    <th>จำนวน</th>
                                                    <th>เริ่มวันที่</th>
                                                    <th>ถึงวันที่</th>
                                                    <th>สถานะ</th>
                                                </tr>
                                            <tfoot>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($conn,"SELECT borrow.approve,borrow.start_date,borrow.end_date,borrow.start_time,borrow.end_time,borrow_list.num, borrow.id, borrow.student_id, borrow.course , borrow.borrow_id , borrow_list.equ_list, tblstudent.name_n, tblstudent.field, tblstudent.sec FROM (borrow INNER JOIN borrow_list  ON borrow.borrow_id = borrow_list.borrow_id INNER JOIN tblstudent ON borrow.student_id = tblstudent.student_id ) WHERE borrow.student_id = '$student_id' AND (borrow.approve = '2');") or die(mysqli_error($conn));;
                                                $i = 1;
                                                while ($result = mysqli_fetch_array($query)) {
                                                    $id = $result["id"];
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $result["borrow_id"]; ?></td>
                                                        <td><?php echo $result["equ_list"]; ?></td>
                                                        <td><?php echo $result["num"]; ?></td>
                                                        <td><?php echo $result["start_date"]; ?></td>
                                                        <td><?php echo $result["end_date"]; ?></td>
                                                <td>
                                                        <a class="btn btn-success" type="button" href="reserve_fpdf.php?id=<?php echo $result['id'] ?>&name_n=<?php echo $result['name_n'] ?>&student_id=<?php echo $result['student_id'] ?>&sec=<?php echo $result['sec'] ?>&field=<?php echo $result['field'] ?>&course=<?php echo $result['course'] ?>&start_date=<?php echo $result['start_date'] ?>&start_time=<?php echo $result['start_time'] ?>&end_date=<?php echo $result['end_date'] ?>&end_time=<?php echo $result['end_time'] ?>"><i class="bi bi-printer"></i></a>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">คุณต้องการออกจากระบบไหม?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">คุณแน่ใจนะว่าจะออกตอนนี้</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                    <a class="btn btn-primary" href="logout.php">ออกจากระบบ</a>
                </div>
            </div>
        </div>
    </div>
</body>


<!-- Bootstrap core JavaScript-->
<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</html>