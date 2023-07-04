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
								<h2><b>Pesan</b></h2>                   
                            </div>         
						</div>
					</div>

				<?php
				session_start();
                require_once "./../connections/connections.php";

				if (!$conn) {
					die("Koneksi database gagal: " . mysqli_connect_error());
				}

				$no = 0;

				$query = "SELECT * FROM tb_kontak";
				$result = mysqli_query($conn, $query);

				if (mysqli_num_rows($result) > 0) {
		
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

        while ($row = mysqli_fetch_assoc($result)) {
			$no++;
            echo '<tr>
                    <td>' . $no . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['nama'] . '</td>
                    <td>' . $row['subjek'] . '</td>
                    <td>' . $row['pesan'] . '</td>
                    <td>
									<a style="color: #CD1818;" href="deletepesan.php?menu_del='.$row['id_kontak'].'" class="delete"><i class="material-icons"
											data-toggle="tooltip" title="Hapus">&#xE872;</i></a>
								</td>
                </tr>';
        }

        echo '</table>';
    } else {
        echo 'Tidak ada data pesan.';
    }

    mysqli_close($conn);
	?>

				</div>
			</div>
		</div>
	</div>
</body>

</html>
