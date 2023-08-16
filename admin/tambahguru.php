<?php
session_start();
require_once "./../connections/connections.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memulai sesi dan memerlukan file koneksi ke database

    $nama_guru = $_POST["nama_guru"];
    $nip = $_POST["nip"];
    $pendidikan = $_POST["pendidikan"];
    $jabatan = $_POST["jabatan"];
    $status = $_POST["status"];
    $keterangan = $_POST["keterangan"];
    // Mengambil nilai yang diinputkan oleh pengguna melalui form

    if (!empty($_FILES['foto']['name'])) {
        // Cek apakah gambar diunggah
    
        $gambar = $_FILES['foto']['name'];
        $gambar_tmp = $_FILES['foto']['tmp_name'];
        $gambar_path = "uploads/guru/" . $gambar;
        // Mengambil informasi file gambar yang diunggah melalui input "foto"
    
        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            // Jika berhasil mengunggah file gambar ke lokasi yang ditentukan
    
            $sql = "INSERT INTO tb_guru (nama_guru, nip, pendidikan, foto, jabatan, status, keterangan)
                    VALUES ('$nama_guru', '$nip', '$pendidikan', '$gambar', '$jabatan', '$status', '$keterangan')";
            // Membuat pernyataan SQL untuk menyisipkan data guru ke dalam tabel "tb_guru"
        } else {
            // Jika gagal mengunggah file gambar
    
            echo "Gagal mengunggah gambar.";
            exit();
        }
    } else {
        // Jika gambar tidak diunggah, tidak perlu memasukkan kolom "foto" ke dalam query
    
        $sql = "INSERT INTO tb_guru (nama_guru, nip, pendidikan, jabatan, status, keterangan)
                VALUES ('$nama_guru', '$nip', '$pendidikan', '$jabatan', '$status', '$keterangan')";
    }
    
    if ($conn->query($sql) === TRUE) {
        // Jika pernyataan SQL berhasil dieksekusi
    
        $conn->close();
        // Menutup koneksi ke database
    
        echo '<script>window.location.href = "admin.php?p=guru";</script>';
        // Mengarahkan halaman kembali ke halaman "admin.php?p=guru" setelah data guru berhasil ditambahkan
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
    <title>Tambah Guru</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="form-container mt-2">
        <h2>Tambah Guru</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_guru">Nama:</label>
                <input type="text" id="nama_guru" name="nama_guru" required>
            </div>
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" id="nip" name="nip" required>
            </div>
            <div class="form-group">
                <label for="pendidikan">Pendidikan:</label>
                <input type="text" id="pendidikan" name="pendidikan" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" id="jabatan" name="jabatan" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" id="keterangan" name="keterangan" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" accept="image/*">
            </div>
            <div class="form-group submit-button">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
    <!-- <script>
        document.querySelector('input[type="file"]').addEventListener('change', function () {
            const fileName = this.value.split('\\').pop();
            const fileLabel = document.querySelector('label[for="foto"]');
            fileLabel.textContent = fileName;
        });
    </script> -->
</body>

</html>
