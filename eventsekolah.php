<?php
// Memasukkan file koneksi database
require_once "connections/connections.php";

// Query untuk memilih semua data dari tabel "tb_event"
$query = "SELECT * FROM tb_event";

// Eksekusi query dan simpan hasilnya dalam variabel $result
$result = $conn->query($query);
?>


    <!-- Kontainer utama untuk menampilkan daftar event sekolah -->
<div class="container mt-5">
    <div class="row">
        <!-- Judul halaman -->
        <div class="col-md-12 text-center">
            <h2>Event Sekolah</h2>
        </div>
    </div>
    <div class="row mt-3">
        <?php
        // Memulai perulangan while untuk menampilkan setiap event dari hasil query
        while ($row = $result->fetch_assoc()) {
        ?>
            <!-- Setiap event ditampilkan dalam bentuk kartu menggunakan Bootstrap -->
            <div class="col-md-4">
                <div class="card mb-3">
                    <!-- Menampilkan gambar event sebagai gambar atas kartu -->
                    <img src="admin/uploads/event_sekolah/<?php echo $row['gambar']; ?>" class="card-img-top" alt="Event Image">
                    <div class="card-body">
                        <!-- Menampilkan judul event sebagai judul kartu -->
                        <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                        <!-- Menampilkan deskripsi event sebagai teks dalam kartu -->
                        <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                        <!-- Tombol "Lihat Detail" (dikomentari) dapat diaktifkan jika dibutuhkan -->
                        <!-- <a href="#" class="btn btn-primary">Lihat Detail</a> -->
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
