<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: /../login.php");
    exit;
}
require 'functions-gejala.php';

//ambil data di url 
$kd_gejala = $_GET['kd_gejala'];

//query menampilkan data gejala berdasarkan id
$gejala = query("SELECT * FROM datagejala WHERE kd_gejala = '" . $kd_gejala . "'")[0];
//cek apakah tombol sudah ditekan atau belum

if (isset($_POST["button"])) {
    //cek data berhasil ditambahkan atau tidak
    if (update_gejala($_POST) > 0) {
        echo " <script>
					alert('Data berhasil diubah');
					document.location.href ='../gejala.php';
			   </script>
			 ";
    } else {
        echo " <script>
					alert('Data gagal diubah');
			   </script>
			 ";
    }
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

    <title>Sistem Pakar Administrator</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="icon" type="img/png" href="/img/unsika-logo-remake.png">
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard.php">
                <div class="sidebar-brand-text mx-3">Sistem Pakar Administrator </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="../pengguna.php" aria-expanded="true">
                    <i class="fas fa-user"></i>
                    <span>Pengguna</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../penyakit.php" aria-expanded="true">
                    <i class="fas fa-stethoscope"></i>
                    <span>Penyakit Stroke</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../gejala.php" aria-expanded="true">
                    <i class="fas fa-notes-medical"></i>
                    <span>Gejala</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../basis-pengetahuan.php" aria-expanded="true">
                    <i class="fas fa-server"></i>
                    <span>Basis Pengetahuan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../riwayat-konsultasi.php" aria-expanded="true">
                    <i class="fas fa-history"></i>
                    <span>Riwayat Konsultasi</span>
                </a>
            </li>
        </ul>
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["username"]; ?></span>
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                    <h1 class="h3 mb-4 text-gray-800">Ubah Data Gejala</h1>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="kd_gejala" class="form-label">Kode Gejala</label>
                                    <input type="text" class="form-control" value="<?php echo $gejala["kd_gejala"]; ?>" id="kd_gejala" aria-describedby="kd_gejala" name="kd_gejala" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_gejala" class="form-label">Nama Gejala</label>
                                    <input type="text" class="form-control" value="<?php echo $gejala["nama_gejala"]; ?>" id="nama_gejala" aria-describedby="namagejala" name="nama_gejala" required>
                                </div>
                                <button type="submit" name="button" class="btn btn-primary">Simpan</button>
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
                        <span>Copyright &copy; Wahyu Rudiansyah | SISKARNOSKE</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin keluar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

</body>

</html>