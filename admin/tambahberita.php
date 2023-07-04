<?php
session_start();
require_once "./../connections/connections.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $tgl_publish = $_POST["tgl_publish"];
    $deskripsi = $_POST["deskripsi"];

    $gambar = $_FILES['foto']['name'];
    $gambar_tmp = $_FILES['foto']['tmp_name'];
    $gambar_path = "uploads/berita/" . $gambar;

    if (move_uploaded_file($gambar_tmp, $gambar_path)) {
        $sql = "INSERT INTO tb_berita (judul, tgl_publish, deskripsi, foto)
                VALUES ('$judul', '$tgl_publish', '$deskripsi', '$gambar')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo '<script>window.location.href = "admin.php?p=berita";</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal mengunggah gambar.";
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
