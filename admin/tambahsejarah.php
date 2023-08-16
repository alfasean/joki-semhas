<?php
session_start();
require_once "./../connections/connections.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memulai sesi dan memerlukan file koneksi ke database

    $deskripsi = $_POST["deskripsi"];
    // Mengambil nilai yang diinputkan oleh pengguna melalui form untuk deskripsi sejarah

    $sql = "INSERT INTO tb_sejarah (deskripsi)
            VALUES ('$deskripsi')";
    // Membuat pernyataan SQL untuk menyisipkan deskripsi sejarah ke dalam tabel "tb_sejarah"

    if ($conn->query($sql) === TRUE) {
        // Jika pernyataan SQL berhasil dieksekusi

        $conn->close();
        // Menutup koneksi ke database

        echo '<script>window.location.href = "admin.php?p=sejarah";</script>';
        // Mengarahkan halaman kembali ke halaman "admin.php?p=sejarah" setelah deskripsi sejarah berhasil ditambahkan
        exit();
    } else {
        // Jika terjadi kesalahan saat mengeksekusi pernyataan SQL

        echo "Error: " . $sql . "<br>" . $conn->error;
        // Menampilkan pesan error beserta informasi kesalahan dari database
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah sejarah</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="form-container mt-2">
        <h2>Tambah Sejarah</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" rows="8" required style="width: 100%;"></textarea>
            </div>
            <div class="form-group submit-button">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
