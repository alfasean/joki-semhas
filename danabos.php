<?php
// Memasukkan file koneksi database
require_once "connections/connections.php";

// Query untuk memilih semua data dari tabel "tb_danabos"
$query = "SELECT * FROM tb_danabos";

// Eksekusi query dan simpan hasilnya dalam variabel $result
$result = $conn->query($query);
?>


<!-- Kontainer utama untuk menampilkan daftar file Dana BOS -->
<div class="item-container" id="danabos">
  <div class="container mt-5">
    <div class="row">
      <!-- Bagian atas halaman -->
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <!-- Judul bagian atas halaman -->
        <h6 class="section-title bg-white text-center text-primary px-3">SD NEGERI 193 Hansel</h6>
        <h1 class="mb-5">Dana BOS</h1>
      </div>

      <?php
      // Memulai perulangan while untuk menampilkan setiap file Dana BOS dari hasil query
      while ($row = $result->fetch_assoc()) {
        // Mendapatkan nama file dari baris data saat ini
        $file = $row['file'];

        // Mendapatkan path file yang dapat diunduh
        $file_path = "admin/uploads/danabos/" . $file;

        // Menampilkan setiap file Dana BOS dalam bentuk kartu menggunakan Bootstrap
        echo '<div class="col-md-4">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        // Menampilkan nama file sebagai judul kartu
        echo '<h5 class="card-title">' . $file . '</h5>';
        // Menampilkan tombol "Download" yang mengarahkan ke file yang dapat diunduh
        echo '<a href="' . $file_path . '" class="btn btn-primary" download>Download</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</div>
