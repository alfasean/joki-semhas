<?php 
// Memulai sesi
session_start();

// Memanggil file koneksi database
require_once "./../connections/connections.php";

// Inisialisasi variabel error dan username
$err        = "";
$username   = "";

// Jika pengguna sudah login, langsung alihkan ke halaman admin
if(isset($_SESSION['session_username'])){
    header("location:admin.php");
    exit();
}

// Jika form login disubmit
if(isset($_POST['tb_admin'])){
    // Ambil nilai username dan password dari form
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    // Jika username atau password kosong, tambahkan pesan error
    if($username == '' or $password == ''){
        $err .= "<p style='margin: 10px 30px 0px 30px; color: #D21312 !important;'>Silakan masukkan username dan juga password</p>";
    }else{
        // Cari data admin berdasarkan username
        $sql1 = "select * from tb_admin where username = '$username'";
        $q1   = mysqli_query($conn,$sql1);
        $r1   = mysqli_fetch_array($q1);

        // Jika username tidak ditemukan, tambahkan pesan error
        if(isset($r1['username']) == ''){
            $err .= "<p style='margin: 10px 30px 0px 30px; color: #D21312 !important;'>Username <b>$username</b> tidak tersedia</p>";
        }elseif($r1['password'] != md5($password)){
            // Jika password yang dimasukkan tidak sesuai, tambahkan pesan error
            $err .= "<p style='margin: 10px 30px 0px 30px; color: #D21312 !important;'>Password yang dimasukkan tidak sesuai</p>";
        }       
        
        // Jika tidak ada error, simpan informasi sesi pengguna dan alihkan ke halaman admin
        if(empty($err)){
            $_SESSION['session_username'] = $username; 
            $_SESSION['session_password'] = md5($password);
            header("location:admin.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Pengaturan karakter encoding dan metadata -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login Admin</title>
	<!-- Menggunakan Bootstrap CSS versi 5.0.0-beta2 dari CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100 mb-5">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <!-- Bagian header halaman -->
					<div class="text-center my-5">
						<img src="./../img/sd.png" alt="logo" width="100">
                        <h1>SD NEGERI 193 HALMAHERA SELATAN</h1>
					</div>
					<!-- Bagian card untuk form login -->
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<!-- Form untuk login -->
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
							<?php if($err){ ?>
								<!-- Tampilkan pesan error jika ada -->
								<div class="alert alert-danger d-flex align-items-center" role="alert">
									<p><?php echo $err ?></p>
								</div>
							<?php } ?>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="username">Username</label>
									<!-- Input untuk mengisi username -->
									<input id="username" type="text" class="form-control" name="username" value="" required autofocus>
								</div>

								<div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Password</label>
									<!-- Input untuk mengisi password -->
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<a href="forgot_password.php" class="btn btn-link ">Lupa Password?</a>

								<div class="d-flex align-items-center">
									<!-- Tombol untuk submit form login -->
									<button type="submit" class="btn btn-primary ms-auto" name="tb_admin">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Menggunakan file JavaScript login.js -->
	<script src="js/login.js"></script>
</body>
</html>
