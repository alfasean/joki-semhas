<?php
session_start();
require_once "./../connections/connections.php";

// Mulai sesi PHP
// Mengimpor file koneksi untuk menjalankan koneksi ke database

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
// Jika koneksi ke database gagal, tampilkan pesan kesalahan dan hentikan eksekusi

$limit = 5;
// Jumlah data yang akan ditampilkan per halaman

$totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_siswa_1"));
// Menghitung jumlah total data siswa dalam tabel

// Menghitung jumlah total halaman
$totalPages = ceil($totalRows / $limit);

if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}
// Mendapatkan halaman saat ini dari URL, jika tidak ada, atur ke halaman 1

if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}
// Pastikan halaman saat ini tidak melebihi jumlah total halaman

$offset = max(0, ($currentPage - 1) * $limit);


$searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';
// Mendapatkan kata kunci pencarian dari URL, jika tidak ada, setel ke string kosong

$query = "SELECT * FROM tb_siswa_1 WHERE nama_siswa LIKE '%$searchKeyword%' LIMIT $offset, $limit";
// Query SQL untuk memilih data siswa berdasarkan kata kunci pencarian dan batasan halaman
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error executing query: ' . mysqli_error($conn));
} else if (mysqli_num_rows($result) == 0) {
    echo 'Tidak ada data siswa.';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
	<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css?v=2">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/admin.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="admin.php?p=dashboard" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Input
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="admin.php?p=guru" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Guru</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="siswa.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Siswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin.php?p=berita" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Berita</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin.php?p=event" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Event Sekolah</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin.php?p=kalender" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kalender</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin.php?p=danabos" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dana BOS</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="admin.php?p=pesan" class="nav-link">
                <i class="nav-icon fas fa-comment-alt"></i>
                <p>
                  Pesan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper mt-5">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6 mb-2">
                            <h2><b>Data Siswa</b></h2>
                            <a href="admin.php?p=addsiswa" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true"> <i class="fa fa-plus mr-1"></i>Tambah Siswa</a>
                        </div>
                    </div>
                </div>

                <form action="" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari rombel..." value="<?php echo $searchKeyword; ?>">
                        <button type="submit" class="btn btn-primary" style="border-radius: 4px;">Cari</button>
                    </div>
                </form>

                <?php
                require_once "./../connections/connections.php";

                if (!$conn) {
                    die("Koneksi database gagal: " . mysqli_connect_error());
                }

                $limit = 5;

                $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_siswa_1"));

                $totalPages = ceil($totalRows / $limit);

                if (isset($_GET['page'])) {
                    $currentPage = $_GET['page'];
                } else {
                    $currentPage = 1;
                }

                if ($currentPage > $totalPages) {
                    $currentPage = $totalPages;
                }

                $offset = ($currentPage - 1) * $limit;

                $searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';
                $query = "SELECT * FROM tb_siswa_1 WHERE rombel LIKE '%$searchKeyword%' LIMIT $offset, $limit";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Rombel</th>
                                        <th>Jenis Kelamin</th>
                                        <th>NISN</th>
                                        <th>NIS</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>NIK</th>
                                        <th>Agama</th>
                                        <th>Nama Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>';

                        $no = $offset + 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                                    <td>' . $no . '</td>
                                    <td>' . $row['nama_siswa'] . '</td>
                                    <td>' . $row['rombel'] . '</td>
                                    <td>' . $row['jenis_kelamin'] . '</td>
                                    <td>' . $row['nisn'] . '</td>
                                    <td>' . $row['nis'] . '</td>
                                    <td>' . $row['tempat_lahir'] . '</td>
                                    <td>' . $row['tgl_lahir'] . '</td>
                                    <td>' . $row['nik'] . '</td>
                                    <td>' . $row['agama'] . '</td>
                                    <td>' . $row['nama_ayah'] . '</td>
                                    <td>' . $row['nama_ibu'] . '</td>
                                    <td><img src="uploads/siswa/' . $row['foto'] . '" width="100" height="100" alt="Foto Siswa"></td>
                                    <td>
                                        <a style="color: #F2BE22;" href="admin.php?p=editsiswa&menu_upd=' . $row['id_siswa'] . '"" class="edit"><i class="material-icons" data-toggle="tooltip"
                                                title="Edit">&#xE254;</i></a>
                                        <a style="color: #CD1818;" href="deletesiswa.php?menu_del=' . $row['id_siswa'] . '" class="delete"><i class="material-icons"
                                                data-toggle="tooltip" title="Hapus">&#xE872;</i></a>
                                    </td>
                                </tr>';
                            $no++;
                        }

                        echo '</table>';

                        // Pagination
                        echo '<nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">';

                        if ($currentPage > 1) {
                            echo '<li class="page-item">
                                    <a class="page-link" href="?page=' . ($currentPage - 1) . '&search=' . $searchKeyword . '">Previous</a>
                                </li>';
                        }

                        for ($i = 1; $i <= $totalPages; $i++) {
                            echo '<li class="page-item ' . (($i == $currentPage) ? 'active' : '') . '">
                                    <a class="page-link" href="?page=' . $i . '&search=' . $searchKeyword . '">' . $i . '</a>
                                </li>';
                        }

                        if ($currentPage < $totalPages) {
                            echo '<li class="page-item">
                                    <a class="page-link" href="?page=' . ($currentPage + 1) . '&search=' . $searchKeyword . '">Next</a>
                                </li>';
                        }

                        echo '</ul>
                            </nav>';
                    } else {
                        echo 'Tidak ada data siswa.';
                    }
                } else {
                    echo 'Tidak ada data.';
                }

                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>