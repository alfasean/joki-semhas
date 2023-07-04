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
								<h2><b>Kalender Akademik</b></h2>                   
							<a href="admin.php?p=addkalender" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true"> <i class="fa fa-plus mr-1"></i>Tambah Kalender</a>
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

				$query = "SELECT * FROM tb_kalender";
				$result = mysqli_query($conn, $query);

				if (mysqli_num_rows($result) > 0) {
		
					echo '<table class="table table-striped table-hover">
					<thead>
					<tr>
						<th>No</th>
						<th>Nama Kegiatan</th>
						<th>Tanggal Kegiatan</th>
						<th>Aksi</th>
					</tr>
				</thead>';

        while ($row = mysqli_fetch_assoc($result)) {
			$no++;
            echo '<tr>
                    <td>' . $no . '</td>
                    <td>' . $row['judul'] . '</td>
                    <td>' . $row['tanggal'] . '</td>
                    <td>
									<a style="color: #F2BE22;" href="admin.php?p=editkalender&menu_upd='.$row['id_kalender'].'"" class="edit"><i class="material-icons" data-toggle="tooltip"
											title="Edit">&#xE254;</i></a>
									<a style="color: #CD1818;" href="deletekalender.php?menu_del='.$row['id_kalender'].'" class="delete"><i class="material-icons"
											data-toggle="tooltip" title="Hapus">&#xE872;</i></a>
								</td>
                </tr>';
        }

        echo '</table>';
    } else {
        echo 'Tidak ada data guru.';
    }

    mysqli_close($conn);
	?>

				</div>
			</div>
		</div>
	</div>
</body>

</html>
