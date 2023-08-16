<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Pengaturan head dan meta -->
    <meta charset="utf-8">
    <title>SD Negeri 193 Halsel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/sd.png" rel="icon">

    <!-- Pengaturan tampilan font dari Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet menggunakan Font Awesome dan Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet untuk animasi dan carousel -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Stylesheet -->
    <link href="css/style.css?v=2" rel="stylesheet">
</head>

<body>
    <!-- Bagian untuk menampilkan spinner saat loading -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Bagian akhir spinner -->

    <!-- Bagian navbar -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <!-- Logo dan nama sekolah -->
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary" style="font-size: 30px; max-width: 30px;"><img width="40" height="40" src="img/sd.png" alt="logo sd"><strong> SD Negeri 193 Halsel</strong></h2>
        </a>
        <!-- Tombol toggle untuk tampilan responsif pada layar kecil -->
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Bagian menu navbar -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Beranda</a>
                <!-- Dropdown menu untuk menu Akademik -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Akademik</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="index.php?p=guru" class="dropdown-item">Tenaga Pendidik</a>
                        <a href="siswa.php" class="dropdown-item">Siswa</a>
                        <a href="index.php?p=event" class="dropdown-item">Event Sekolah</a>
                        <a href="index.php?p=danabos" class="dropdown-item">Dana Bos</a>
                        <a href="kalender.php" class="dropdown-item">Kalender Akademik</a>
                    </div>
                </div>
                <a href="index.php?p=berita" class="nav-item nav-link">Berita</a>
                <a href="index.php?p=kontak" class="nav-item nav-link">Kontak</a>
            </div>
        </div>
    </nav>
    <!-- Bagian akhir navbar -->

    <?php
    // Memulai sesi dan memanggil file koneksi database
    session_start();
    require_once "connections/connections.php";

    // Mengecek koneksi database
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Pengaturan paginasi untuk data siswa
    $limit = 5;
    $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_siswa"));
    $totalPages = ceil($totalRows / $limit);

    // Mendapatkan halaman saat ini dari parameter URL
    if (isset($_GET['page'])) {
        $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
    }

    // Menyamakan halaman saat ini dengan total halaman yang tersedia
    if ($currentPage > $totalPages) {
        $currentPage = $totalPages;
    }

    // Menghitung offset untuk data yang akan ditampilkan pada halaman saat ini
    $offset = ($currentPage - 1) * $limit;

    // Mengambil kata kunci pencarian dari parameter URL
    $searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';

    // Query untuk mengambil data siswa dengan kata kunci pencarian dan batasan data yang ditampilkan
    $sql = "SELECT * FROM tb_siswa WHERE nama_siswa LIKE '%$searchKeyword%' LIMIT $offset, $limit";
    $result = mysqli_query($conn, $sql);
    ?>

    <!-- Bagian tampilan data siswa -->
    <div class="container mt-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <!-- Judul halaman siswa -->
            <h6 class="section-title bg-white text-center text-primary px-3">SD NEGERI 193 Hansel</h6>
            <h1 class="mb-5">Siswa</h1>
        </div>

        <!-- Form pencarian siswa -->
        <form action="" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari siswa..." value="<?php echo $searchKeyword; ?>">
                <button type="submit" class="btn btn-primary" style="border-radius: 4px;">Cari</button>
            </div>
        </form>

        <!-- Tabel untuk menampilkan data siswa -->
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
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
                </tr>
            </thead>
            <tbody>
                <?php
                // Nomor urut untuk data siswa
                $no = $offset + 1;
                // Loop untuk menampilkan data siswa dari hasil query
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                    <tr>
                        <!-- Menampilkan data siswa dalam kolom tabel -->
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama_siswa']; ?></td>
                        <td><?php echo $row['rombel']; ?></td>
                        <td><?php echo $row['jenis_kelamin']; ?></td>
                        <td><?php echo $row['nisn']; ?></td>
                        <td><?php echo $row['nis']; ?></td>
                        <td><?php echo $row['tempat_lahir']; ?></td>
                        <td><?php echo $row['tgl_lahir']; ?></td>
                        <td><?php echo $row['nik']; ?></td>
                        <td><?php echo $row['agama']; ?></td>
                        <td><?php echo $row['nama_ayah']; ?></td>
                        <td><?php echo $row['nama_ibu']; ?></td>
                        <td>
                            <?php if (!empty($row['foto'])) : ?>
                                <!-- Menampilkan foto siswa jika ada -->
                                <img src="admin/uploads/siswa/<?php echo $row['foto']; ?>" alt="Foto siswa" width="100">
                            <?php else : ?>
                                <!-- Menampilkan teks "N/A" jika tidak ada foto siswa -->
                                N/A
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Navigasi paginasi untuk halaman siswa -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <!-- Tombol "Previous" jika halaman saat ini bukan halaman pertama -->
                <?php if ($currentPage > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>&search=<?php echo $searchKeyword; ?>">Previous</a>
                    </li>
                <?php endif; ?>

                <!-- Tombol-tombol angka untuk navigasi halaman -->
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo $searchKeyword; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Tombol "Next" jika halaman saat ini bukan halaman terakhir -->
                <?php if ($currentPage < $totalPages) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>&search=<?php echo $searchKeyword; ?>">Next</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <!-- Bagian akhir tampilan data siswa -->

    <!-- Bagian footer -->
    <div class="container-fluid text-light footer pt-2 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="d-flex justify-content-center align-items-center text-center text-dark text-md-start mb-3 mb-md-0">
                        <!-- Teks hak cipta dan nama sekolah -->
                        &copy; <a class="" href="#">SD NEGERI 194 Hansel</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bagian akhir footer -->

    <!-- Tombol "Kembali ke atas" -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Skrip JavaScript khusus -->
    <script src="js/main.js"></script>
</body>

</html>
