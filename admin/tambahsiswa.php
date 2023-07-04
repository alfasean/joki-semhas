<?php
session_start();
require_once "./../connections/connections.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $gambar = $_FILES['foto']['name'];
    $gambar_tmp = $_FILES['foto']['tmp_name'];
    $gambar_path = "uploads/siswa/" . $gambar;

    if (move_uploaded_file($gambar_tmp, $gambar_path)) {
        $sql = "INSERT INTO tb_siswa (nama_siswa, tempat_lahir, tgl_lahir, foto, agama, rombel, nik, nisn, nis, nama_ayah, nama_ibu, jenis_kelamin)
                VALUES ('$nama_siswa', '$tempat_lahir', '$tgl_lahir', '$gambar', '$agama', '$rombel', '$nik', '$nisn', '$nis', '$nama_ayah', '$nama_ibu', '$jenis_kelamin')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo '<script>window.location.href = "admin.php?p=siswa";</script>';
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
                <input type="text" id="nama_siswa" name="nama_siswa" required>
            </div>
            <div class="form-group">
                <label for="rombel">Rombel:</label>
                <input type="text" id="rombel" name="rombel" required>
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
                <input type="text" id="nisn" name="nisn" required>
            </div>
            <div class="form-group">
                <label for="nis">NIS:</label>
                <input type="text" id="nis" name="nis" required>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tgl_lahir" required>
            </div>
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" id="nik" name="nik" required>
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
                <input type="text" id="nama_ayah" name="nama_ayah" required>
            </div>
            <div class="form-group">
                <label for="nama_ibu">Nama Ibu:</label>
                <input type="text" id="nama_ibu" name="nama_ibu" required>
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
