<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mengatur karakter encoding dan tampilan di perangkat seluler -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Menggunakan font Roboto dan Varela Round dari Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <!-- Menggunakan Bootstrap CSS versi 4.5.0 dari CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Menggunakan Material Icons dari Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Menggunakan Font Awesome CSS versi 4.7.0 dari CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Menggunakan custom CSS yang disimpan dalam file style.css -->
    <link rel="stylesheet" href="css/style.css?v=2">
    <!-- Menggunakan jQuery versi 3.5.1 dari CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Menggunakan Popper.js versi 1.16.0 dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- Menggunakan Bootstrap JS versi 4.5.0 dari CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Konten halaman dimulai -->
    <div class="content-wrapper">
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper mt-5">
                    <!-- Judul tabel dan tombol tambah guru -->
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <h2><b>Data Guru</b></h2>
                                <!-- Tombol untuk menambahkan guru baru -->
                                <a href="admin.php?p=addguru" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true"> <i class="fa fa-plus mr-1"></i>Tambah Guru</a>
                            </div>
                        </div>
                    </div>

                    <?php
                    // Memulai sesi dan memanggil file koneksi database
                    session_start();
                    require_once "./../connections/connections.php";

                    // Mengecek koneksi database
                    if (!$conn) {
                        die("Koneksi database gagal: " . mysqli_connect_error());
                    }

                    // Inisialisasi nomor urut
                    $no = 0;

                    // Query untuk mengambil data guru dari tabel tb_guru
                    $query = "SELECT * FROM tb_guru";
                    $result = mysqli_query($conn, $query);

                    // Cek apakah ada data guru
                    if (mysqli_num_rows($result) > 0) {
                        // Tampilkan tabel dengan header kolom
                        echo '<table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Pendidikan</th>
                                    <th>Jabatan</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>';

                        // Tampilkan data guru dalam bentuk baris tabel
                        while ($row = mysqli_fetch_assoc($result)) {
                            $no++;
                            echo '<tr>
                                    <td>' . $no . '</td>
                                    <td>' . $row['nama_guru'] . '</td>
                                    <td>' . $row['nip'] . '</td>
                                    <td>' . $row['pendidikan'] . '</td>
                                    <td>' . $row['jabatan'] . '</td>
                                    <td>' . $row['status'] . '</td>
                                    <td>' . $row['keterangan'] . '</td>
                                    <td><img src="uploads/guru/' . $row['foto'] . '" width="100" height="100" alt="Foto Guru"></td>
                                    <td>
                                        <!-- Tombol edit untuk mengedit data guru -->
                                        <a style="color: #F2BE22;" href="admin.php?p=editguru&menu_upd=' . $row['id_guru'] . '"" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <!-- Tombol hapus untuk menghapus data guru -->
                                        <a style="color: #CD1818;" href="deleteguru.php?menu_del=' . $row['id_guru'] . '" class="delete"><i class="material-icons" data-toggle="tooltip" title="Hapus">&#xE872;</i></a>
                                    </td>
                                </tr>';
                        }

                        echo '</table>';
                    } else {
                        // Jika tidak ada data guru, tampilkan pesan "Tidak ada data guru."
                        echo 'Tidak ada data guru.';
                    }

                    // Menutup koneksi database
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Konten halaman selesai -->
</body>

</html>
