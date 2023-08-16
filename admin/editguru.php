<?php
// Memulai sesi
session_start();

// Memanggil file koneksi database
require_once "./../connections/connections.php";

// Cek apakah request menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari input form
    $nama_guru = $_POST["nama_guru"];
    $nip = $_POST["nip"];
    $pendidikan = $_POST["pendidikan"];
    $jabatan = $_POST["jabatan"];
    $status = $_POST["status"];
    $keterangan = $_POST["keterangan"];

    // Cek apakah ada file gambar yang diunggah
    if (!empty($_FILES['foto']['name'])) {
        // Mendapatkan informasi file gambar yang diunggah
        $gambar = $_FILES['foto']['name'];
        $gambar_tmp = $_FILES['foto']['tmp_name'];
        $gambar_path = "uploads/guru/" . $gambar;

        // Memindahkan file gambar dari temporary location ke lokasi tujuan (uploads/guru/)
        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            // Jika berhasil memindahkan gambar, maka perbarui data guru dengan gambar baru
            $sql = "UPDATE tb_guru SET nama_guru='$nama_guru', nip='$nip', pendidikan='$pendidikan', foto='$gambar', keterangan='$keterangan' WHERE id_guru='$_GET[menu_upd]'";

            // Eksekusi perintah SQL untuk melakukan update data guru
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                // Alihkan halaman kembali ke halaman admin.php dengan parameter p=guru setelah berhasil mengupdate data
                echo '<script>window.location.href = "admin.php?p=guru";</script>';
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Gagal mengunggah gambar.";
        }
    } else {
        // Jika tidak ada gambar yang diunggah, perbarui data guru tanpa mengganti gambar
        $sql = "UPDATE tb_guru SET nama_guru='$nama_guru', nip='$nip', pendidikan='$pendidikan', jabatan='$jabatan', status='$status', keterangan='$keterangan' WHERE id_guru='$_GET[menu_upd]'";

        // Eksekusi perintah SQL untuk melakukan update data guru
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            // Alihkan halaman kembali ke halaman admin.php dengan parameter p=guru setelah berhasil mengupdate data
            echo '<script>window.location.href = "admin.php?p=guru";</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Menampilkan halaman form edit guru
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
    // Memanggil file koneksi database
    require_once "./../connections/connections.php";

    // Mengecek koneksi database
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mengecek apakah ada parameter menu_upd pada URL (request GET)
    if (isset($_GET['menu_upd'])) {
        // Membuat query SQL untuk mengambil data guru berdasarkan id_guru yang diberikan melalui parameter GET (menu_upd)
        $sql = "SELECT * FROM tb_guru WHERE id_guru='$_GET[menu_upd]'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    } else {
        // Jika tidak ada parameter menu_upd, maka menampilkan pesan "Invalid request."
        echo "Invalid request.";
        exit();
    }
    ?>

    <!-- Form edit guru -->
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
                <label for="pendidikan">Pendidikan:</label>
                <input type="text" id="pendidikan" value="<?php echo $row['pendidikan']; ?>" name="pendidikan" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" id="jabatan" value="<?php echo $row['jabatan']; ?>" name="jabatan" required>
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
