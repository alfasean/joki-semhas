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
    
    if (!empty($_FILES['foto']['name'])) {
        $gambar = $_FILES['foto']['name'];
        $gambar_tmp = $_FILES['foto']['tmp_name'];
        $gambar_path = "uploads/siswa/" . $gambar;

        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            $sql = "UPDATE tb_siswa SET nama_siswa='$nama_siswa', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', 
            foto='$gambar', jenis_kelamin='$jenis_kelamin', agama='$agama', rombel='$rombel', nik='$nik', nisn='$nisn', nis='$nis', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu' WHERE id_siswa='$_GET[menu_upd]'";

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
    } else {
        $sql = "UPDATE tb_siswa SET nama_siswa='$nama_siswa', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', agama='$agama', rombel='$rombel', nik='$nik', nisn='$nisn', nis='$nis', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu' WHERE id_siswa='$_GET[menu_upd]'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo '<script>window.location.href = "admin.php?p=siswa";</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="css/style.css?v=2">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <?php
    require_once "./../connections/connections.php";

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    if (isset($_GET['menu_upd'])) {
        $sql = "SELECT * FROM tb_siswa WHERE id_siswa='$_GET[menu_upd]'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Invalid request.";
        exit();
    }
    ?>

    <div class="form-container mt-2">
        <h2>Edit Siswa</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_siswa">Nama:</label>
                <input type="text" id="nama_siswa" value="<?php echo $row['nama_siswa']; ?>" name="nama_siswa" required>
            </div>
            <div class="form-group">
                <label for="rombel">Rombel:</label>
                <input type="text" id="rombel" value="<?php echo $row['rombel']; ?>" name="rombel" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="id_email" name="jenis_kelamin">
                    <option value="Laki-Laki" <?php if ($row['jenis_kelamin'] == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                    <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nisn">NISN:</label>
                <input type="text" id="nisn" value="<?php echo $row['nisn']; ?>" name="nisn" required>
            </div>
            <div class="form-group">
                <label for="nis">NIS:</label>
                <input type="text" id="nis" value="<?php echo $row['nis']; ?>" name="nis" required>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" id="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" name="tempat_lahir" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" value="<?php echo $row['tgl_lahir']; ?>" name="tgl_lahir" required>
            </div>
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" id="nik" value="<?php echo $row['nik']; ?>" name="nik" required>
            </div>
            <div class="form-group">
                <label for="agama">Agama:</label>
                <select id="id_email" name="agama">
                    <option value="Laki-Laki" <?php if ($row['agama'] == 'Protestan') echo 'selected'; ?>>Protestan</option>
                    <option value="Katolik" <?php if ($row['agama'] == 'Katolik') echo 'selected'; ?>>Katolik</option>
                    <option value="Islam" <?php if ($row['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
                    <option value="Hindu" <?php if ($row['agama'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                    <option value="Budha" <?php if ($row['agama'] == 'Budha') echo 'selected'; ?>>Budha</option>
                    <option value="Konghucu" <?php if ($row['Konghucu'] == 'Konghucu') echo 'selected'; ?>>Konghucu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_ayah">Nama Ayah:</label>
                <input type="text" id="nama_ayah" value="<?php echo $row['nama_ayah']; ?>" name="nama_ayah" required>
            </div>
            <div class="form-group">
                <label for="nama_ibu">Nama Ibu:</label>
                <input type="text" id="nama_ibu" value="<?php echo $row['nama_ibu']; ?>" name="nama_ibu" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <img src="uploads/siswa/<?php echo $row['foto']; ?>" alt="Foto siswa" width="100">
                <input type="file" name="foto" accept="image/*">
            </div>
            <div class="form-group submit-button">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
