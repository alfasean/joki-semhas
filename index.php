<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SD Negeri 193 Halsel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/sd.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Stylesheet -->
    <link href="css/style.css?v=2" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary" style="font-size: 30px; max-width: 30px;"><img width="40" height="40" src="img/sd.png" alt="logo sd"><strong> SD Negeri 193 Halsel</strong></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Beranda</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Akademik</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="index.php?p=guru" class="dropdown-item">Tenaga Pendidik</a>
                        <a href="siswa.php" class="dropdown-item">Siswa</a>
                        <!-- <a href="index.php?p=event" class="dropdown-item">Event Sekolah</a> -->
                        <a href="index.php?p=danabos" class="dropdown-item">Dana Bos</a>
                        <a href="kalender.php" class="dropdown-item">Kalender Akademik</a>
                    </div>
                </div>
                <a href="index.php?p=berita" class="nav-item nav-link">Berita</a>
                <a href="index.php?p=kontak" class="nav-item nav-link">Kontak</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <?php
    error_reporting(0);
    switch($_GET['p'])
    {
    default:
    include 'home.php';
    break;
    		case "guru";
    		include 'guru.php';
    		break;
    		case "siswa";
    			include 'siswa.php';
    		break;
    		case "orders";
    			include 'orders.php';
    		break;
    		case "bayar";
    			include 'bayar.php';
    		break;
    		case "kontak";
    			include 'kontak.php';
    		break;
    		case "berita";
    			include 'berita.php';
    		break;
    		case "beritadetail";
    			include 'beritadetail.php';
    		break;
    		case "kalender";
    			include 'kalender.php';
    		break;
    		case "danabos";
    			include 'danabos.php';
    		break;
    		case "event";
    			include 'eventsekolah.php';
    		break;
    		case "sejarahdetail";
    			include 'sejarahdetail.php';
    		break;
    	}
    	?>
        


    
    <!-- Footer Start -->
    <div class="container-fluid text-light footer pt-2 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="d-flex justify-content-center align-items-center text-center text-dark text-md-start mb-3 mb-md-0">
                        &copy; <a class="" href="#">SD NEGERI 194 Hansel</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Javascript -->
    <script src="js/main.js"></script>
</body>

</html>