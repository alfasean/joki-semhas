<?php 
session_start();
require_once "./../connections/connections.php";

$err        = "";
$username   = "";

if(isset($_SESSION['session_username'])){
    header("location:admin.php");
    exit();
}

if(isset($_POST['tb_admin'])){
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    if($username == '' or $password == ''){
        $err .= "<p style='margin: 10px 30px 0px 30px; color: #D21312 !important;'>Silakan masukkan username dan juga password</p>";
    }else{
        $sql1 = "select * from tb_admin where username = '$username'";
        $q1   = mysqli_query($conn,$sql1);
        $r1   = mysqli_fetch_array($q1);

        if(isset($r1['username']) == ''){
            $err .= "<p style='margin: 10px 30px 0px 30px; color: #D21312 !important;'>Username <b>$username</b> tidak tersedia</p>";
        }elseif($r1['password'] != md5($password)){
            $err .= "<p style='margin: 10px 30px 0px 30px; color: #D21312 !important;'>Password yang dimasukkan tidak sesuai</p>";
        }       
        
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
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Login Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100 mb-5">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
						<img src="./../img/sd.png" alt="logo" width="100">
                        <h1>SD NEGERI 193 HALMAHERA SELATAN</h1>
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
							<?php if($err){ ?>
								<div class="alert alert-danger d-flex align-items-center" role="alert">
									<p><?php echo $err ?></p>
								</div>
							<?php } ?>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="username">Username</label>
									<input id="username" type="text" class="form-control" name="username" value="" required autofocus>
								</div>

								<div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="d-flex align-items-center">
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

	<script src="js/login.js"></script>
</body>
</html>