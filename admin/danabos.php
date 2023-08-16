<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Pengaturan head dan meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css?v=2">
    <!-- Pustaka JavaScript dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Bagian wrapper konten -->
    <div class="content-wrapper">
        <div class="container-xl">
            <!-- Bagian tabel responsif -->
            <div class="table-responsive">
                <div class="table-wrapper mt-5">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <!-- Judul tabel Dana BOS dan tombol tambah Dana BOS -->
                                <h2><b>Dana BOS</b></h2>
                                <a href="admin.php?p=adddanabos" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true"> <i class="fa fa-plus mr-1"></i>Tambah Dana BOS</a>
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

                    // Variabel untuk nomor urut Dana BOS
                    $no = 0;

                    // Query untuk mengambil data Dana BOS dari tabel tb_danabos
                    $query = "SELECT * FROM tb_danabos";
                    $result = mysqli_query($conn, $query);

                    // Mengecek apakah ada data Dana BOS dalam tabel
                    if (mysqli_num_rows($result) > 0) {

                        // Menampilkan tabel Dana BOS jika ada data
                        echo '<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>No</th>
							<th>File</th>
							<th>Aksi</th>
						</tr>
					</thead>';

                        // Loop untuk menampilkan data Dana BOS dalam tabel
                        while ($row = mysqli_fetch_assoc($result)) {
                            $no++;
                            echo '<tr>
                                    <td>' . $no . '</td>
                                    <td>' . $row['file'] . '</td>
                                    <td>
										<a style="color: #CD1818;" href="deletedanabos.php?menu_del=' . $row['id_danabos'] . '" class="delete"><i class="material-icons"
												data-toggle="tooltip" title="Hapus">&#xE872;</i></a>
									</td>
                                </tr>';
                        }

                        echo '</table>';
                    } else {
                        // Menampilkan pesan jika tidak ada data Dana BOS
                        echo 'Tidak ada data Dana BOS.';
                    }

                    // Menutup koneksi database
                    mysqli_close($conn);
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Bagian akhir wrapper konten -->
</body>

</html>
