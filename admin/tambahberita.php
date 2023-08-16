<?php
session_start();
require_once "./../connections/connections.php";

// Mulai sesi PHP
// Mengimpor file koneksi untuk menjalankan koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah request method adalah POST

    $judul = $_POST["judul"];
    $tgl_publish = $_POST["tgl_publish"];
    $deskripsi = $_POST["deskripsi"];
    // Ambil data yang dikirimkan melalui form dengan metode POST

    $gambar = $_FILES['foto']['name'];
    $gambar_tmp = $_FILES['foto']['tmp_name'];
    $gambar_path = "uploads/berita/" . $gambar;
    // Ambil data gambar yang diunggah melalui form

    if (move_uploaded_file($gambar_tmp, $gambar_path)) {
        // Pindahkan gambar ke direktori tujuan (uploads/berita/)

        $sql = "INSERT INTO tb_berita (judul, tgl_publish, deskripsi, foto)
                VALUES ('$judul', '$tgl_publish', '$deskripsi', '$gambar')";
        // Buat query SQL untuk menyimpan data berita ke database

        if ($conn->query($sql) === TRUE) {
            // Jalankan query dan periksa apakah berhasil

            $conn->close();
            // Tutup koneksi ke database
            echo '<script>window.location.href = "admin.php?p=berita";</script>';
            // Redirect ke halaman berita setelah berhasil menyimpan data
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            // Tampilkan pesan error jika query gagal dieksekusi
        }
    } else {
        echo "Gagal mengunggah gambar.";
        // Tampilkan pesan error jika gagal mengunggah gambar
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah berita</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="form-container mt-2">
        <h2>Tambah berita</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="tgl_publish">Tanggal Publish:</label>
                <input type="date" id="tgl_publish" name="tgl_publish" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" rows="8" required style="width: 100%;"></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" accept="image/*" required>
            </div>
            <div class="form-group submit-button">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
