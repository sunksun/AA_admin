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
	$stmt ->execute();

	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

    $id = $row["id"];
    $name_n = $row["name_n"];
    $student_id = $row["student_id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>แบบฟอร์มขออนุญาตยืม – คืน  เครื่องแก้ว วัสดุอุปกรณ์ เครื่องมือและ สารเคมี</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
	  
	<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
 
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	  <!-- Bootstrap Css -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">นักศึกษา <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>หน้าเเรก</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>จัดการข้อมูลผู้ใช้งาน</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="admin_lists.php">ผู้ดูแลระบบ</a>
                        <a class="collapse-item" href="scientist_lists.php">เจ้าหน้าที่</a>
                        <a class="collapse-item" href="teacherLists.php">อาจารย์</a>
                        <a class="collapse-item" href="student_lists.php">นักศึกษา</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>จัดการวัสดุอุปกรณ์</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="equipment_lists.php">รายการวัสดุอุปกรณ์</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>จัดการครุภัณฑ์</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="durable_lists.php">รายการครุภัณฑ์</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseChart"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>วัสดุประกอบครุภัณฑ์</span></a>
				<div id="collapseChart" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="equi_ass_list.php">รายการวัสดุประกอบครุภัณฑ์</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>ออกรายงาน</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ระบบบริหารจัดการพัสดุครุภัณฑ์และสารเคมี ศูนย์วิทยาศาสตร์</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    

                    <!-- Content Row -->. 
                    <?php
					$sql="SELECT * FROM borrow";
					$result=mysqli_query($conn,$sql);
					$rowcount=mysqli_num_rows($result);
					$rowcount = $rowcount + 1;
					$rowcount = "0000".$rowcount; //00001
	  				$rowcount = substr($rowcount, -4); //0001
	  				$rowcount = "S-".$rowcount; //S-0001
					$_SESSION['borrow_id'] = $rowcount;
					?>
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php echo "$_SESSION[name_n]"; ?> <?php echo "$_SESSION[student_id]"; ?> <?php echo "$_SESSION[sec]"; ?> สาขาวิชา<?php echo "$_SESSION[field]"; ?>
                                [รหัสการยืม : <?php echo"$rowcount"?>]</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area h-100">
                                        <form action="" name="frmMain" id="frmMain" method="post">
										  <div class="form-row">
											<div class="form-group col-md-6">
											  <label for="inputEmail4">มีความประสงค์ขอใช้  เครื่องแก้ว/วัสดุอุปกรณ์/เครื่องมือและ สารเคมี  ในรายวิชา</label>
											  <input type="text" class="form-control" id="inputEmail4" name="course">
											  <input type="hidden" id="borrow_id" name="borrow_id" value="<?php echo "$rowcount"; ?>">
											</div>
											<div class="form-group col-md-6">
											  <label for="inputPassword4">ปฏิบัติการเรื่อง</label>
											  <input type="text" class="form-control" id="inputPassword4" name="subject">
											</div>
										  </div>
										  <div class="form-row">
										  <div class="form-group col-md-3">
											<label for="inputAddress">ระหว่างวันที่</label>
											<input type="date" class="form-control" id="inputAddress" placeholder="" name="start_date">
										  </div>
										  <div class="form-group col-md-3">
											<label for="inputAddress">ถึงระหว่างวันที่</label>
											<input type="date" class="form-control" id="inputAddress" placeholder="" name="end_date">
										  </div>
										  <div class="form-group col-md-3">
											<label for="inputAddress">เวลา</label>
											<input type="time" class="form-control" id="inputAddress" placeholder="" name="start_time">
										  </div>
										  <div class="form-group col-md-3">
											<label for="inputAddress">ถึงเวลา</label>
											<input type="time" class="form-control" id="inputAddress" placeholder="" name="end_time">
										  </div>
										  </div>
										  <div class="form-group">
											<label for="inputAddress2">อาจารย์ที่ปรึกษาผู้ควบคุม</label>
											<input type="text" class="form-control" id="inputAddress2" placeholder="" name="advisor">
										  </div>
										  <hr>
										  <div class="form-row">
											<div class="form-group col-md-8">
											  <label for="inputEmail4">รายการเครื่องแก้ว/วัสดุอุปกรณ์/เครื่องมือ</label>
											  <input type="text" name="term" id="term" placeholder="search here...." class="form-control">
											</div>
											<div class="form-group col-md-2">
											  <label for="inputPassword4">จำนวน</label>
											  <input type="number" name="num" class="form-control" id="inputPassword4" min="1">
											</div>
											<div class="form-group col-md-2">
											  <label for="inputPassword4">Action</label>
											  <button type="button" name="btnSend" id="btnSend" class="btn btn-success">เพิ่มเข้าไปในรายการ</button>
											</div>
										  </div>
										</form>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<script type="text/javascript">
								$(document).ready(function() {
								$("#btnSend").click(function() {
									$.ajax({
									   type: "POST",
									   url: "borrow_save_ajax.php",
									   data: $("#frmMain").serialize(),
									   success: function(result) {
											if(result.status == 1) // Success
											{
												alert(result.message);
												document.getElementById("frmMain").reset();
											}
											else // Err
											{
												alert(result.message);
											}
										   }
										 });
									});
								});
						</script>

                        <!-- Pie Chart -->
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">รายการการยืม</h6>
                                </div>
                                <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสการยืม</th>
                                            <th>รายวิชา</th>
                                            <th>ปฏิบัติการเรื่อง</th>
                                            <th>ระหว่างวันที่</th>
                                            <th>Action</th>
                                        </tr>
                                        <tfoot>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสการยืม</th>
                                            <th>รายวิชา</th>
                                            <th>ปฏิบัติการเรื่อง</th>
                                            <th>ระหว่างวันที่</th>
                                            <th>status</th>
                                        </tr>
                                    </tfoot>
                                    </thead>
                                    
                                    <tbody>
									<?php
									  $sql="SELECT * FROM borrow WHERE student_id = '$student_id';";
									  $query = mysqli_query($conn,$sql);
									  $i = 1;
										while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
										{
										 $id = $result["id"];?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $result["borrow_id"];?></td>
                                            <td><?php echo $result["course"];?></td>
                                            <td><?php echo $result["subject"];?></td>
                                            <td><?php echo DateThai ($result["start_date"]);?> - <?php echo DateThai ($result["end_date"]);?> </td>
                                            <td><?php
                                             $st = $result["statu"];
                                            if($st == 0){
                                            echo "<font class='bg-danger text-white'>";
                                              echo "รออนุมัติ";
                                                echo "</font>";
                                                }else{
                                                echo "<font class='bg-success text-white'>";
                                                echo "อนุมัติแล้ว";
                                                echo "</font>";
                                                }
                                                ?></td>
                                            
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">   
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login2.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
	  $(function() {
		 $( "#term" ).autocomplete({
		   source: 'ajax-db-search.php',
		 });
	  });
	</script>	

    <!-- Bootstrap core JavaScript-->
    <!--<script src="vendor/jquery/jquery.min.js"></script>-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
		
</body>

</html>