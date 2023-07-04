<?php
require_once "connections/connections.php";

if (isset($_GET['id'])) {
    $id_berita = $_GET['id'];

    // Query untuk mendapatkan data berita berdasarkan ID
    $query = "SELECT * FROM tb_berita WHERE id_berita = '$id_berita'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $judul = $row['judul'];
        $tgl_publish = $row['tgl_publish'];
        $deskripsi = $row['deskripsi'];
        $foto = $row['foto'];
        // ... tambahkan field lainnya sesuai kebutuhan
?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2 class="mb-3"><?php echo $judul; ?></h2>
                    <p class="text-muted"><?php echo $tgl_publish; ?></p>
                    <img src="admin/uploads/berita/<?php echo $foto; ?>" alt="" class="img-fluid mb-3">
                    <p><?php echo $deskripsi; ?></p>
                    <!-- ... tambahkan tampilan field lainnya sesuai kebutuhan -->
                </div>
            </div>
        </div>

<?php
    } else {
        echo "Berita tidak ditemukan.";
    }
} else {
    echo "Invalid request.";
}
?>
