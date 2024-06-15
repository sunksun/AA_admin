<?php
ini_set('display_errors', 1);
error_reporting(~0);
session_start();
include_once('connect.php');
include_once('dateThai.php');


$id = $_SESSION["id"];
$sql = "SELECT * FROM tbluser WHERE id = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $id); //   s - string, b - blob, i - int, etc
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

$id = $row["id"];
$fullname = $row["fullname"];
$email = $row["email"];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>แก้ไขข้อมูลผู้ดูแลระบบ - <?php echo $fullname; ?></title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once 'sidebar3.php'; ?>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $fullname; ?></span>
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
                    <?php
                      $sql="SELECT * FROM tbladmin WHERE role_id = '1' ";
                      $query = mysqli_query($conn,$sql);
                    ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูลสารเคมี</h6>
							<div class="dropdown no-arrow">
							
							 <!-- <a class="btn btn-outline-primary btn-sm" href="#addAdmin" role="button" data-toggle="modal" data-target="#addAdmin" data-whatever="@mdo">เพิ่มข้อมูลผู้ดูแลระบบ</a>
								
							<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="addAdmin" aria-hidden="true">
							  <div class="modal-dialog" role="document">
								 <div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="addAdmin">เพิ่มข้อมูลผู้ดูแลระบบ</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div> 
								  <div class="modal-body">
									<form action="insert_admin.php" method="post" enctype="multipart/form-data">
									  <div class="form-group">
										<label for="fullname" class="col-form-label">ชื่อ-นามสกุล :</label>
										<input type="text" class="form-control" name="fullname" required>
									  </div>
									  <div class="form-group">
										<label for="useremail" class="col-form-label">อีเมล์ :</label>
										<input type="email" class="form-control" name="useremail" required>
									  </div>
									  <div class="form-group">
										<label for="custaddr" class="col-form-label">ที่อยู่ :</label>
										<input type="text" class="form-control" name="custaddr" required>
									  </div>
									  <div class="form-group">
										<label for="username" class="col-form-label">ชื่อผู้ใช้งาน (Username) :</label>
										<input type="text" class="form-control" name="username" required>
									  </div>
									  <div class="form-group">
										<label for="password" class="col-form-label">รหัสผ่าน (Password) :</label>
										<input type="password" class="form-control" name="password" required>
									  </div>
									  <div class="form-group">
										<label for="img" class="col-form-label">รูปภาพ:</label>
										<input type="file" class="form-control" id="imgInput" name="img" required>
										<img width="100%" id="previewImg" alt="">
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" name="submit" class="btn btn-success">บันทึกข้อมูล</button>
									  </div>
									</form>
								  </div>
								  
								</div> -->
							  </div> 
							</div>  
                           </div>
                        </div> 
						<?php
							$id = $_GET["id"];
							$sql = "SELECT * FROM equipment_da WHERE id = ? ";
							$stmt = $conn->prepare($sql);
							$stmt->bind_param('s', $id);	
							$stmt ->execute();
							$result = $stmt->get_result();
							$row = $result->fetch_assoc();
							$_SESSION['id'] = $row['id'];
						?>
                        <div class="card-body">
                            <form action="edit_equipment_da_list_save.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
								<label for="fullname" class="col-form-label">รายชื่ออุปกรณ์ครุภัณฑ์:</label>
								<input type="text" class="form-control" name="equi_ass_name" value="<?php echo $row["equi_ass_name"]; ?>">
							  </div>
                            <div class="form-group">
								<label for="fullname" class="col-form-label">ขนาด:</label>
								<input type="text" class="form-control" name="size" value="<?php echo $row["size"]; ?>">
							  </div>
                              <div class="form-group">
								<label for="fullname" class="col-form-label">ราคา :</label>
								<input type="text" class="form-control" name="unit_price" value="<?php echo $row["unit_price"]; ?>">
							  </div>
                              <div class="form-group">
								<label for="fullname" class="col-form-label">สถานะ :</label>
								<input type="text" class="form-control" name="userbility" value="<?php echo $row["userbility"]; ?>">
							  </div>
							  <div class="modal-footer">
								<button type="submit" name="submit" class="btn btn-success">บันทึกข้อมูล</button>
							  </div>
							</form>
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
                        <span>Copyright &copy; Your Website 2020</span>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

	<!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">คุณต้องการจะลบข้อมูลใช่หรือไม่</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">ข้อมูลที่ต้องการลบคือ ....</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                    <a class="btn btn-primary" href="login.html?id=<?php echo $result["id"];?>">ลบข้อมูล</a>
                </div>
            </div>
        </div>
    </div>
	
	<!-- Edit Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="editModal">แก้ไขข้อมูลผู้ดูแลระบบ</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form action="update_admin.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				<label for="fullname" class="col-form-label">ชื่อ-นามสกุล :</label>
				<input type="text" class="form-control" name="fullname" required>
			  </div>
			  <div class="form-group">
				<label for="useremail" class="col-form-label">อีเมล์ :</label>
				<input type="email" class="form-control" name="useremail" required>
			  </div>
			  <div class="form-group">
				<label for="custaddr" class="col-form-label">ที่อยู่ :</label>
				<input type="text" class="form-control" name="custaddr" required>
			  </div>
			  <div class="form-group">
				<label for="username" class="col-form-label">ชื่อผู้ใช้งาน (Username) :</label>
				<input type="text" class="form-control" name="username" required>
			  </div>
			  <div class="form-group">
				<label for="password" class="col-form-label">รหัสผ่าน (Password) :</label>
				<input type="password" class="form-control" name="password" required>
			  </div>
			  <div class="form-group">
				<label for="img" class="col-form-label">รูปภาพ:</label>
				<input type="file" class="form-control" id="imgInput" name="img" required>
				<img width="100%" id="previewImg" alt="">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" href="./">Close</button>
				<button type="submit" name="submit" class="btn btn-success">บันทึกข้อมูล</button>
			  </div>
			</form>
		  </div>

		</div>
	  </div>
	</div>
	
	<!-- Modal JavaScript -->
	<script>
		$(function() {
			$(document).on('click', '.edit', function(e) {
				e.preventDefault();
				$('#edit').modal('show');
				var id = $(this).data('id');
				getData(id);
				console.log(id);
			});

			$(document).on('click', '.delete', function(e) {
				e.preventDefault();
				$('#delete').modal('show');
				var id = $(this).data('id');
				console.log(id);
				getData(id);
			});

		});

		function getData(id) {
			$.ajax({
				type: 'POST',
				url: 'users_data.php',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					$('.bcId').val(response.id);
					$('#edit_email').val(response.email);
					$('.del_email').html(response.email);
				}
			});
		}
	</script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
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
	
	<script>
		let imgInput = document.getElementById('imgInput');
		let previewImg = document.getElementById('previewImg');
		
		imgInput.onchange = evt => {
			const [file] = imgInput.file;
			if (file) {
				previewImg.src = URL.createObjectURL(file);
			}
		}
	</script>

</body>

</html>