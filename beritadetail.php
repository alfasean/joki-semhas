<?php
// Memasukkan file koneksi database
require_once "connections/connections.php";

// Memeriksa apakah parameter "id" ada dalam URL (menggunakan metode GET)
if (isset($_GET['id'])) {
    // Mengambil nilai ID berita dari parameter "id"
    $id_berita = $_GET['id'];

    // Query untuk memilih berita berdasarkan ID yang diberikan
    $query = "SELECT * FROM tb_berita WHERE id_berita = '$id_berita'";
    $result = $conn->query($query);

    // Memeriksa apakah query mengembalikan setidaknya satu baris data
    if ($result->num_rows > 0) {
        // Jika ada data, ambil baris data pertama
        $row = $result->fetch_assoc();
        // Menyimpan nilai judul, tanggal publish, deskripsi, dan nama foto berita dalam variabel
        $judul = $row['judul'];
        $tgl_publish = $row['tgl_publish'];
        $deskripsi = $row['deskripsi'];
        $foto = $row['foto'];
?>
        <!-- Menampilkan konten berita yang ditemukan -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- Menampilkan judul berita -->
                    <h2 class="mb-3"><?php echo $judul; ?></h2>
                    <!-- Menampilkan tanggal publish berita -->
                    <p class="text-muted"><?php echo $tgl_publish; ?></p>
                    <!-- Menampilkan gambar berita -->
                    <img src="admin/uploads/berita/<?php echo $foto; ?>" alt="" class="img-fluid mb-3">
                    <!-- Menampilkan deskripsi berita dengan penataan teks rata kanan (justify) -->
                    <p style="text-align: justify;"><?php echo $deskripsi; ?></p>
                </div>
            </div>
        </div>

<?php
    } else {
        // Jika query tidak mengembalikan data, tampilkan pesan berita tidak ditemukan
        echo "Berita tidak ditemukan.";
    }
} else {
    // Jika parameter "id" tidak ada dalam URL, tampilkan pesan permintaan tidak valid
    echo "Invalid request.";
}
?>
