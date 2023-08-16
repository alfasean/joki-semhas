<?php
// Memanggil file koneksi database
require_once "connections/connections.php";

// Query untuk mengambil data dari tabel tb_sejarah
$query = "SELECT * FROM tb_sejarah";

// Menjalankan query dan mengambil hasilnya
$result = $conn->query($query);

// Memeriksa apakah ada data yang ditemukan
if ($result->num_rows > 0) {
    // Jika ada data, ambil data pertama dari hasil query
    $row = $result->fetch_assoc();
    // Mengambil deskripsi dari data pertama
    $deskripsi = $row['deskripsi'];
    // Mengubah baris baru (\n) menjadi tag <br> untuk menampilkan paragraf dengan line breaks pada tampilan
    $deskripsi_with_linebreaks = nl2br($deskripsi);
?>
    <!-- Bagian tampilan sejarah -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- Menampilkan gambar sejarah -->
                <img src="img/2.jpeg" alt="" class="img-fluid mb-3">
                <!-- Menampilkan deskripsi sejarah dengan penataan teks rata kanan dan kiri (justify) -->
                <p style="text-align: justify;"><?php echo $deskripsi_with_linebreaks; ?></p>
            </div>
        </div>
    </div>
<?php
} else {
    // Jika tidak ada data sejarah ditemukan, tampilkan pesan "Tidak ada sejarah."
    echo "Tidak ada sejarah.";
}
?>
