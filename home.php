<?php
// Memasukkan file koneksi database
require_once "connections/connections.php";

// Query untuk menghitung total guru dari tabel "tb_guru"
$query = "SELECT COUNT(*) as total_guru FROM tb_guru";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$total_guru = $data['total_guru'];

// Query untuk menghitung total siswa dari tabel "tb_siswa"
$query = "SELECT COUNT(*) as total_siswa FROM tb_siswa";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$total_siswa = $data['total_siswa'];
?>


<!-- Carousel Start -->
<!-- Bagian untuk menampilkan carousel (slideshow) -->
<div class="container-fluid p-0 mb-5">
   <div class="owl-carousel header-carousel position-relative">
      <!-- Slide pertama -->
      <div class="owl-carousel-item position-relative">
         <img class="img-fluid" src="img/3.jpeg" alt="">
         <!-- Bagian atas slide dengan latar belakang transparan -->
         <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
            <div class="container">
               <div class="row justify-content-start">
                  <div class="col-sm-10 col-lg-8">
                     <!-- Judul dan teks di atas slide -->
                     <h1 class="display-3 text-white animated slideInDown">SD NEGERI 193 HALMAHERA SELATAN</h1>
                     <p class="fs-5 text-white mb-4 pb-2">Berprestasi Bersama, Menginspirasi Masa Depan</p>
                     <a href="#informasi" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Informasi Sekolah</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Slide kedua (mirip dengan slide pertama) -->
      <div class="owl-carousel-item position-relative">
         <img class="img-fluid" src="img/1.jpeg" alt="">
         <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
            <div class="container">
               <div class="row justify-content-start">
                  <div class="col-sm-10 col-lg-8">
                     <h1 class="display-3 text-white animated slideInDown">SD NEGERI 193 HALMAHERA SELATAN</h1>
                     <p class="fs-5 text-white mb-4 pb-2">Berprestasi Bersama, Menginspirasi Masa Depan</p>
                     <a href="#informasi" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Informasi Sekolah</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Carousel End -->



    <!-- informasi Start -->
<!-- Bagian untuk menampilkan informasi sekolah -->
<div class="container-xxl py-5" id="informasi">
   <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
         <h6 class="section-title bg-white text-center text-primary px-3">Informasi</h6>
         <h1 class="mb-5">Informasi Sekolah</h1>
      </div>
      <div class="row g-4">
         <!-- Kartu pertama menampilkan total siswa -->
         <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="informasi-item text-center pt-3">
               <div class="p-4">
                  <i class="fas fa-3x fa-user-graduate text-primary mb-4"></i>
                  <h5 class="mb-3">Total Siswa</h5>
                  <!-- Menampilkan jumlah total siswa -->
                  <p style="font-size: 50px"><b><?php echo $total_siswa; ?></b></p>
               </div>
            </div>
         </div>
         <!-- Kartu kedua menampilkan visi sekolah -->
         <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="informasi-item text-center pt-3">
               <div class="p-4">
                  <i class="fa fa-3x fa-chalkboard-teacher text-primary mb-4"></i>
                  <h5 class="mb-3">Visi</h5>
                  <!-- Menampilkan teks visi sekolah -->
                  <p>Menyelenggarakan Pendidikan yang bermutu berdaya saing berdasarkan iman dan taqwa kepada Tuhan Yang Maha Esa</p>
               </div>
            </div>
         </div>
         <!-- Kartu ketiga menampilkan misi sekolah -->
         <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="informasi-item text-center pt-3">
               <div class="p-4">
                  <i class="far fa-3x fa-dot-circle text-primary mb-4"></i>
                  <h5 class="mb-3">Misi</h5>
                  <!-- Menampilkan daftar misi sekolah dalam bentuk bullet list -->
                  <ul>
                     <li style="text-align: left;">Menciptakan anak bangsa yang mampu bersaing nasional secara global</li>
                     <li style="text-align: left;">Meningkatkan mutu kelulusan berstandar nasional</li>
                     <li style="text-align: left;">Menciptakan suasana belajar yang harmonis</li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- Kartu keempat menampilkan total guru -->
         <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="informasi-item text-center pt-3">
               <div class="p-4">
                  <i class="fas fa-3x fa-user-tie text-primary mb-4"></i>
                  <h5 class="mb-3">Total Guru</h5>
                  <!-- Menampilkan jumlah total guru -->
                  <p style="font-size: 50px"><b><?php echo $total_guru; ?></b></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- informasi End -->


   <!-- Profil Start -->
<!-- Bagian untuk menampilkan profil kepala sekolah dan wakil kepala sekolah -->
<div class="container-fluid py-5 wow fadeInUp" id="pemkot" data-wow-delay="0.1s">
   <div class="container py-5">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
         <h6 class="section-title bg-white text-center text-primary px-3">Informasi</h6>
         <h1 class="mb-5">Kepala Sekolah & Wakil Kepala Sekolah</h1>
      </div>
      <div class="row g-5">
         <!-- Kartu pertama menampilkan profil kepala sekolah -->
         <?php
         require_once "connections/connections.php";
         
         $queryKepalaSekolah = "SELECT * FROM tb_guru WHERE jabatan = 'Kepala Sekolah'";
         $resultKepalaSekolah = mysqli_query($conn, $queryKepalaSekolah);

         if ($resultKepalaSekolah && mysqli_num_rows($resultKepalaSekolah) > 0) {
            $rowKepalaSekolah = mysqli_fetch_assoc($resultKepalaSekolah);
         ?>
         <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
            <div class="profil-item bg-light rounded overflow-hidden">
               <div class="profil-img position-relative overflow-hidden">
                  <img class="img-fluid w-100" src="admin/uploads/guru/<?php echo $rowKepalaSekolah['foto']; ?>" alt="Foto Kepala Sekolah">
               </div>
               <div class="text-center py-4">
                  <!-- Menampilkan nama kepala sekolah -->
                  <h4 class="text-primary"><?php echo $rowKepalaSekolah['nama_guru']; ?></h4>
                  <!-- Menampilkan jabatan kepala sekolah -->
                  <p class="text-uppercase m-0"><?php echo $rowKepalaSekolah['jabatan']; ?></p>
               </div>
            </div>
         </div>
         <?php } ?>
         <!-- Kartu kedua menampilkan profil wakil kepala sekolah -->
         <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
            <?php
            $queryWakilKepalaSekolah = "SELECT * FROM tb_guru WHERE jabatan = 'Wakil Kepala Sekolah'";
            $resultWakilKepalaSekolah = mysqli_query($conn, $queryWakilKepalaSekolah);

            if ($resultWakilKepalaSekolah && mysqli_num_rows($resultWakilKepalaSekolah) > 0) {
               $rowWakilKepalaSekolah = mysqli_fetch_assoc($resultWakilKepalaSekolah);
            ?>
            <div class="profil-item bg-light rounded overflow-hidden">
               <div class="profil-img position-relative overflow-hidden">
                  <img class="img-fluid w-100" src="admin/uploads/guru/<?php echo $rowWakilKepalaSekolah['foto']; ?>" alt="Foto Wakil Kepala Sekolah">
               </div>
               <div class="text-center py-4">
                  <!-- Menampilkan nama wakil kepala sekolah -->
                  <h4 class="text-primary"><?php echo $rowWakilKepalaSekolah['nama_guru']; ?></h4>
                  <!-- Menampilkan jabatan wakil kepala sekolah -->
                  <p class="text-uppercase m-0"><?php echo $rowWakilKepalaSekolah['jabatan']; ?></p>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
</div>
<!-- Profil End -->




   <!-- Sejarah Start -->
<!-- Bagian untuk menampilkan sejarah sekolah -->
<div class="container-xxl py-5">
   <div class="container">
      <div class="row g-5">
         <!-- Gambar di sisi kiri -->
         <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
            <div class="position-relative h-100">
               <img class="img-fluid position-absolute w-100 h-100" src="img/2.jpeg" alt="" style="object-fit: cover;">
            </div>
         </div>
         <!-- Teks sejarah di sisi kanan -->
         <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
            <h6 class="section-title bg-white text-start text-primary pe-3">Informasi</h6>
            <h1 class="mb-4">Sejarah Sekolah</h1>
            <!-- Paragraf pertama sejarah -->
            <p class="mb-4">Sekolah dasar Negeri 193 Halmahera Selatan ( SDN 193 HAL-SEL) terletak di Desa Tawa Kecamatan Bacan Timur Tengah, Kabupaten Halmahera Selatan, Provinsi Maluku Utara.
            Pendirian SDN 193 HAL-SEL.</p>
            <!-- Paragraf kedua sejarah -->
            <p class="mb-4">A. FASE SEBELUM INPRES Desa Tawa pada era tahun 70-an masih berbentuk anak desa (Dusun) dari Desa Babang (± 9 km jarak dari Desa Tawa). Populasi masyarakat yang kian berkembang dari tahun...</p>
            <!-- Tombol untuk melihat selengkapnya -->
            <a href="index.php?p=sejarahdetail" class="btn btn-primary animated slideInLeft">Selengkapnya</a>
         </div>
      </div>
   </div>
</div>
<!-- Sejarah End -->
