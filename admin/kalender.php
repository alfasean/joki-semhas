<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Pengaturan karakter encoding dan viewport -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Menggunakan font dari Google Fonts dan Bootstrap CSS versi 4.5.0 dari CDN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Menggunakan file CSS dari direktori "css" -->
    <link rel="stylesheet" href="css/style.css?v=2">
    <!-- Menggunakan library jQuery versi 3.5.1 dari CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Menggunakan library Popper.js versi 1.16.0 dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- Menggunakan library Bootstrap JS versi 4.5.0 dari CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Bagian konten utama halaman -->
    <div class="content-wrapper">
        <!-- Container ekstra large untuk menyusun isi halaman -->
        <div class="container-xl">
            <!-- Bagian untuk menampilkan tabel responsif -->
            <div class="table-responsive">
                <!-- Bagian wrapper tabel -->
                <div class="table-wrapper mt-5">
                    <!-- Bagian judul tabel -->
                    <div class="table-title">
                        <div class="row">
                            <!-- Bagian kolom untuk judul halaman dan tombol tambah kalender -->
                            <div class="col-sm-6 mb-2">
                                <h2><b>Kalender Akademik</b></h2>
                                <a href="admin.php?p=addkalender" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true">
                                    <i class="fa fa-plus mr-1"></i>Tambah Kalender</a>
                            </div>
                        </div>
                    </div>

                    <?php
                    // Memulai sesi
                    session_start();
                    // Memanggil file koneksi database
                    require_once "./../connections/connections.php";

                    // Jika koneksi ke database gagal, hentikan proses dan tampilkan pesan error
                    if (!$conn) {
                        die("Koneksi database gagal: " . mysqli_connect_error());
                    }

                    // Inisialisasi variabel nomor urut
                    $no = 0;

                    // Query untuk mengambil data dari tabel tb_kalender
                    $query = "SELECT * FROM tb_kalender";
                    $result = mysqli_query($conn, $query);

                    // Jika terdapat data dalam tabel tb_kalender
                    if (mysqli_num_rows($result) > 0) {

                        // Tampilkan tabel dengan class Bootstrap
                        echo '<table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Tanggal Kegiatan Berakhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>';

                        // Loop untuk menampilkan data dalam tabel
                        while ($row = mysqli_fetch_assoc($result)) {
                            $no++;
                            echo '<tr>
                    <td>' . $no . '</td>
                    <td>' . $row['judul'] . '</td>
                    <td>' . $row['tanggal'] . '</td>
                    <td>' . $row['tanggal_berakhir'] . '</td>
                    <td>
                                    <a style="color: #F2BE22;" href="admin.php?p=editkalender&menu_upd=' . $row['id_kalender'] . '"" class="edit">
                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a style="color: #CD1818;" href="deletekalender.php?menu_del=' . $row['id_kalender'] . '" class="delete">
                                    <i class="material-icons" data-toggle="tooltip" title="Hapus">&#xE872;</i></a>
                                </td>
                </tr>';
                        }

                        // Selesai menampilkan tabel
                        echo '</table>';
                    } else {
                        // Jika tidak ada data dalam tabel tb_kalender, tampilkan pesan bahwa tidak ada data guru
                        echo 'Tidak ada data.';
                    }

                    // Menutup koneksi database
                    mysqli_close($conn);
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
