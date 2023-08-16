<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css?v=2">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="content-wrapper">
		<div class="container-xl">
			<div class="table-responsive">
				<div class="table-wrapper mt-5">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6 mb-2">
								<h2><b>Sejarah</b></h2>                   
							<a href="admin.php?p=addsejarah" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true"> <i class="fa fa-plus mr-1"></i>Tambah Sejarah</a>
                            </div>         
						</div>
					</div>

					<?php
					// Bagian PHP dimulai di sini
					session_start();
					// Memulai sesi PHP

					require_once "./../connections/connections.php";
					// Mengimpor file koneksi untuk menjalankan koneksi ke database

					if (!$conn) {
						die("Koneksi database gagal: " . mysqli_connect_error());
						// Jika koneksi gagal, tampilkan pesan kesalahan dan hentikan eksekusi
					}

					$no = 0;
					// Inisialisasi variabel untuk menyimpan nomor baris

					$query = "SELECT * FROM tb_sejarah";
					// Query SQL untuk memilih semua data dari tabel 'tb_sejarah'
					$result = mysqli_query($conn, $query);
					// Jalankan query dan simpan hasilnya

					if (mysqli_num_rows($result) > 0) {
						// Periksa jika ada baris dalam hasil
						echo '<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>No</th>
							<th>Deskripsi</th>
							<th>Aksi</th>
						</tr>
						</thead>';
						// Tampilkan tabel dengan header kolom

						while ($row = mysqli_fetch_assoc($result)) {
							// Ulangi setiap baris dalam hasil dan ambilnya sebagai array asosiatif
							$no++;
							// Tambahkan nomor baris

							echo '<tr>
									<td>' . $no . '</td>
									<td style="text-align: justify;">' . $row['deskripsi'] . '</td>
									<td>
										<a style="color: #F2BE22;" href="admin.php?p=editsejarah&menu_upd=' . $row['id_sejarah'] . '"" class="edit"><i class="material-icons" data-toggle="tooltip"
												title="Edit">&#xE254;</i></a>
										<a style="color: #CD1818;" href="deletesejarah.php?menu_del=' . $row['id_sejarah'] . '" class="delete"><i class="material-icons"
												data-toggle="tooltip" title="Hapus">&#xE872;</i></a>
									</td>
								</tr>';
							// Tampilkan setiap baris dengan data yang sesuai dan ikon edit/hapus
						}

						echo '</table>';
						// Tutup tag tabel
					} else {
						echo 'Tidak ada data Sejarah.';
						// Jika tidak ada baris dalam hasil, tampilkan pesan bahwa tidak ada data
					}

					mysqli_close($conn);
					// Tutup koneksi database
					?>

				</div>
			</div>
		</div>
	</div>
</body>

</html>
