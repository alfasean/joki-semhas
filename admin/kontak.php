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
							<!-- Bagian kolom untuk judul halaman "Pesan" -->
							<div class="col-sm-6 mb-2">
								<h2><b>Pesan</b></h2>
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

					// Query untuk mengambil data dari tabel tb_kontak
					$query = "SELECT * FROM tb_kontak";
					$result = mysqli_query($conn, $query);

					// Jika terdapat data dalam tabel tb_kontak
					if (mysqli_num_rows($result) > 0) {

						// Tampilkan tabel dengan class Bootstrap
						echo '<table class="table table-striped table-hover">
					<thead>
					<tr>
						<th>No</th>
						<th>Email</th>
						<th>Nama</th>
						<th>Subjek</th>
						<th>Pesan</th>
						<th>Aksi</th>
					</tr>
				</thead>';

						// Loop untuk menampilkan data dalam tabel
						while ($row = mysqli_fetch_assoc($result)) {
							$no++;
							echo '<tr>
					<td>' . $no . '</td>
					<td>' . $row['email'] . '</td>
					<td>' . $row['nama'] . '</td>
					<td>' . $row['subjek'] . '</td>
					<td>' . $row['pesan'] . '</td>
					<td>
									<a style="color: #CD1818;" href="deletepesan.php?menu_del=' . $row['id_kontak'] . '" class="delete">
									<i class="material-icons" data-toggle="tooltip" title="Hapus">&#xE872;</i></a>
								</td>
				</tr>';
						}

						// Selesai menampilkan tabel
						echo '</table>';
					} else {
						// Jika tidak ada data dalam tabel tb_kontak, tampilkan pesan bahwa tidak ada data pesan
						echo 'Tidak ada data pesan.';
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
