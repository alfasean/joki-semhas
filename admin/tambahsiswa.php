<?php
session_start();
require_once "./../connections/connections.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memulai sesi dan memerlukan file koneksi ke database

    $nama_siswa = $_POST["nama_siswa"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $agama = $_POST["agama"];
    $rombel = $_POST["rombel"];
    $nik = $_POST["nik"];
    $nisn = $_POST["nisn"];
    $nis = $_POST["nis"];
    $nama_ayah = $_POST["nama_ayah"];
    $nama_ibu = $_POST["nama_ibu"];
    // Mengambil nilai yang diinputkan oleh pengguna melalui form untuk data siswa, seperti nama, tempat lahir, tanggal lahir, jenis kelamin, agama, rombel, nik, nisn, nis, nama ayah, dan nama ibu.

    if (!empty($_FILES['foto']['name'])) {
        // Cek apakah ada gambar diunggah
        $gambar = $_FILES['foto']['name'];
        $gambar_tmp = $_FILES['foto']['tmp_name'];
        $gambar_path = "uploads/siswa/" . $gambar;
        // Mengambil informasi tentang file gambar yang diunggah oleh pengguna melalui input "foto"
    
        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            // Jika berhasil mengunggah file gambar ke lokasi yang ditentukan
    
            $sql = "INSERT INTO tb_siswa_1 (nama_siswa, tempat_lahir, tgl_lahir, foto, agama, rombel, nik, nisn, nis, nama_ayah, nama_ibu, jenis_kelamin)
                    VALUES ('$nama_siswa', '$tempat_lahir', '$tgl_lahir', '$gambar', '$agama', '$rombel', '$nik', '$nisn', '$nis', '$nama_ayah', '$nama_ibu', '$jenis_kelamin')";
            // Membuat pernyataan SQL untuk menyisipkan data siswa ke dalam tabel "tb_siswa_1" dengan menyertakan path gambar untuk kolom "foto".
        } else {
            // Jika gagal mengunggah file gambar
            echo "Gagal mengunggah gambar.";
            exit();
        }
    } else {
        // Jika tidak ada gambar yang diunggah, data siswa akan disimpan tanpa menyertakan kolom "foto".
        $sql = "INSERT INTO tb_siswa_1 (nama_siswa, tempat_lahir, tgl_lahir, agama, rombel, nik, nisn, nis, nama_ayah, nama_ibu, jenis_kelamin)
                VALUES ('$nama_siswa', '$tempat_lahir', '$tgl_lahir', '$agama', '$rombel', '$nik', '$nisn', '$nis', '$nama_ayah', '$nama_ibu', '$jenis_kelamin')";
    }

    if ($conn->query($sql) === TRUE) {
        // Jika pernyataan SQL berhasil dieksekusi

        $conn->close();
        // Menutup koneksi ke database

        echo '<script>window.location.href = "admin.php?p=siswa";</script>';
        // Mengarahkan halaman kembali ke halaman "admin.php?p=siswa" setelah data siswa berhasil ditambahkan.
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
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="css/style.css?v=2">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="form-container mt-2">
        <h2>Tambah Siswa</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_siswa">Nama:</label>
                <input type="text" id="nama_siswa" name="nama_siswa" >
            </div>
            <div class="form-group">
                <label for="rombel">Rombel:</label>
                <input type="text" id="rombel" name="rombel" >
            </div>
            <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
            </select>
            </div>
            <div class="form-group">
                <label for="nisn">NISN:</label>
                <input type="text" id="nisn" name="nisn" >
            </div>
            <div class="form-group">
                <label for="nis">NIS:</label>
                <input type="text" id="nis" name="nis" >
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" >
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tgl_lahir" >
            </div>
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" id="nik" name="nik" >
            </div>
            <div class="form-group">
            <label for="agama">Agama:</label>
            <select id="agama" name="agama">
                        <option value="Pria">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                     </select>
            </div>
            <div class="form-group">
                <label for="nama_ayah">Nama Ayah:</label>
                <input type="text" id="nama_ayah" name="nama_ayah" >
            </div>
            <div class="form-group">
                <label for="nama_ibu">Nama Ibu:</label>
                <input type="text" id="nama_ibu" name="nama_ibu" >
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" accept="image/*" >
            </div>
            <div class="form-group submit-button">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
