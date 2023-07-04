<?php
session_start();
require_once "./../connections/connections.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_guru = $_POST["nama_guru"];
    $nip = $_POST["nip"];
    $pendidikan = $_POST["pendidikan"];
    $jabatan = $_POST["jabatan"];
    $status = $_POST["status"];
    $keterangan = $_POST["keterangan"];
    
    if (!empty($_FILES['foto']['name'])) {
        $gambar = $_FILES['foto']['name'];
        $gambar_tmp = $_FILES['foto']['tmp_name'];
        $gambar_path = "uploads/guru/" . $gambar;

        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            $sql = "UPDATE tb_guru SET nama_guru='$nama_guru', nip='$nip', pendidikan='$pendidikan', foto='$gambar', keterangan='$keterangan' WHERE id_guru='$_GET[menu_upd]'";

            if ($conn->query($sql) === TRUE) {
                $conn->close();
                echo '<script>window.location.href = "admin.php?p=guru";</script>';
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Gagal mengunggah gambar.";
        }
    } else {
        $sql = "UPDATE tb_guru SET nama_guru='$nama_guru', nip='$nip', pendidikan='$pendidikan', jabatan='$jabatan', status='$status', keterangan='$keterangan' WHERE id_guru='$_GET[menu_upd]'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo '<script>window.location.href = "admin.php?p=guru";</script>';
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
    <title>Edit Guru</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <?php
    require_once "./../connections/connections.php";

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    if (isset($_GET['menu_upd'])) {
        $sql = "SELECT * FROM tb_guru WHERE id_guru='$_GET[menu_upd]'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Invalid request.";
        exit();
    }
    ?>

    <div class="form-container mt-2">
        <h2>Edit Guru</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_guru">Nama:</label>
                <input type="text" id="nama_guru" value="<?php echo $row['nama_guru']; ?>" name="nama_guru" required>
            </div>
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" id="nip" value="<?php echo $row['nip']; ?>" name="nip" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Pendidikan:</label>
                <input type="text" id="tanggal_lahir" value="<?php echo $row['pendidikan']; ?>" name="pendidikan" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" id="jabatanr" value="<?php echo $row['jabatan']; ?>" name="jabatan" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" id="status" value="<?php echo $row['status']; ?>" name="status" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" id="keterangan" value="<?php echo $row['keterangan']; ?>" name="keterangan" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <img src="uploads/guru/<?php echo $row['foto']; ?>" alt="Foto Guru" width="100">
                <input type="file" name="foto" accept="image/*">
            </div>
            <div class="form-group submit-button">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
