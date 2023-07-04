<?php
require_once "connections/connections.php";
    $query = "SELECT COUNT(*) as total_guru FROM tb_guru";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_guru = $data['total_guru'];
    
    $query = "SELECT COUNT(*) as total_siswa FROM tb_siswa";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_siswa = $data['total_siswa'];

?>

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/3.jpeg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown">SD NEGERI 193 HALMAHERA SELATAN</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Berprestasi Bersama, Menginspirasi Masa Depan</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Informasi Sekolah</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/1.jpeg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown">SD NEGERI 193 HALMAHERA SELATAN</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Berprestasi Bersama, Menginspirasi Masa Depan</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Informasi Sekolah</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- informasi Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Informasi</h6>
                <h1 class="mb-5">Informasi Sekolah</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="informasi-item text-center pt-3">
                        <div class="p-4">
                            <i class="fas fa-3x fa-user-graduate text-primary mb-4"></i>
                            <h5 class="mb-3">Total Siswa</h5>
                            <p><b><?php echo $total_siswa; ?></b></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="informasi-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-chalkboard-teacher text-primary mb-4"></i>
                            <h5 class="mb-3">Visi</h5>
                            <p>Menyelenggarakan Pendidikan yang bermutu berdaya saing berdasarkan iman dan taqwa kepada Tuhan Yang Maha Esa</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="informasi-item text-center pt-3">
                        <div class="p-4">
                            <i class="far fa-3x fa-dot-circle text-primary mb-4"></i>
                            <h5 class="mb-3">Misi</h5>
                            <ul>
                                <li style="text-align: left;">Menciptakan anak bangsa yang mampu bersaing nasional secara global</li>
                                <li style="text-align: left;">Meningkatkan mutu kelulusan berstandar nasional</li>
                                <li style="text-align: left;">Menciptakan suasana belajar yang harmonis</li>
                              </ul>  
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="informasi-item text-center pt-3">
                        <div class="p-4">
                            <i class="fas fa-3x fa-user-tie text-primary mb-4"></i>
                            <h5 class="mb-3">Total Guru</h5>
                            <p><b><?php echo $total_guru; ?></b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- informasi End -->

    <!-- Profil Start -->
    <div class="container-fluid py-5 wow fadeInUp" id="pemkot" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Informasi</h6>
                <h1 class="mb-5">Kepala Sekolah & Wakil Kepala Sekolah</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="profil-item bg-light rounded overflow-hidden">
                        <div class="profil-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-2.jpg" alt="wali kota">
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Maurits Mantiri</h4>
                            <p class="text-uppercase m-0">Kepala Sekolah</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <div class="profil-item bg-light rounded overflow-hidden">
                        <div class="profil-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-3.jpg" alt="wakil">
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Hengky Honandar</h4>
                            <p class="text-uppercase m-0">Wakil Kepala Sekolah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profil End -->


    <!-- Sejarah Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/2.jpeg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Informasi</h6>
                    <h1 class="mb-4">Sejarah Sekolah</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Sejarah End -->
