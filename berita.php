<style>
  .here-item {
    background-color: #F0EEED;
  }
  .judul {
    font-size: 20px;
  }
</style>

<div class="item-container" id="berita">
  <div class="container mt-5">
    <div class="row">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <!-- Judul bagian atas halaman -->
        <h6 class="section-title bg-white text-center text-primary px-3">SD NEGERI 193 Hansel</h6>
        <h1 class="mb-5">Berita</h1>
      </div>
      <?php
      // Memasukkan file koneksi database
      require_once "connections/connections.php";

      // Query untuk memilih semua data dari tabel berita
      $query = "SELECT * FROM tb_berita";

      // Eksekusi query dan simpan hasilnya dalam variabel $result
      $result = $conn->query($query);

      // Perulangan untuk menampilkan setiap berita dari hasil query
      while ($row = $result->fetch_assoc()) {
        // Memulai kolom dengan lebar 4 dari sistem grid Bootstrap (menggunakan perangkat ukuran medium)
        echo '<div class="col-md-4">';

        // Bagian berita yang berisi gambar dan judul
        echo '<div class="here-item">';

        // Tautan ke halaman detail berita dengan mengirimkan parameter ID berita
        echo '<a href="index.php?p=beritadetail&id=' . $row['id_berita'] . '">';

        // Menampilkan gambar berita dengan lebar 100% dan tinggi 50% dari ukuran aslinya
        echo '<img src="admin/uploads/berita/' . $row['foto'] . '" alt="" style="width: 100%; height: 50%;">';

        // Bagian konten berita
        echo '<div class="down-content">';

        // Menampilkan judul berita dengan ukuran 20px dan tengah (center) teksnya
        echo '<h4 class="text-center mt-2 p-2 judul">' . $row['judul'] . '</h4>';

        echo '</div>'; // Penutup div.down-content
        echo '</a>'; // Penutup tautan ke halaman detail berita
        echo '</div>'; // Penutup div.here-item
        echo '</div>'; // Penutup div.col-md-4
      }
      ?>

    </div> <!-- Penutup div.row -->
  </div> <!-- Penutup div.container -->
</div> <!-- Penutup div.item-container -->
