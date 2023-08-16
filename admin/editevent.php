<?php
// Memulai sesi
session_start();

// Memanggil file koneksi database
require_once "./../connections/connections.php";

// Cek apakah request menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari input form
    $judul = $_POST["judul"];
    $tgl_publish = $_POST["tgl_publish"];
    $deskripsi = $_POST["deskripsi"];

    // Cek apakah ada file gambar yang diunggah
    if (!empty($_FILES['gambar']['name'])) {
        // Mendapatkan informasi file gambar yang diunggah
        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_path = "uploads/event_sekolah/" . $gambar;

        // Memindahkan file gambar dari temporary location ke lokasi tujuan (uploads/event_sekolah/)
        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            // Jika berhasil memindahkan gambar, maka perbarui data event dengan gambar baru
            $sql = "UPDATE tb_event SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id_event='$_GET[menu_upd]'";

            // Eksekusi perintah SQL untuk melakukan update data event
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                // Alihkan halaman kembali ke halaman admin.php dengan parameter p=event setelah berhasil mengupdate data
                echo '<script>window.location.href = "admin.php?p=event";</script>';
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Gagal mengunggah gambar.";
        }
    } else {
        // Jika tidak ada gambar yang diunggah, perbarui data event tanpa mengganti gambar
        $sql = "UPDATE tb_event SET judul='$judul', deskripsi='$deskripsi' WHERE id_event='$_GET[menu_upd]'";

        // Eksekusi perintah SQL untuk melakukan update data event
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            // Alihkan halaman kembali ke halaman admin.php dengan parameter p=event setelah berhasil mengupdate data
            echo '<script>window.location.href = "admin.php?p=event";</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Menampilkan halaman form tambah event
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Event</title>
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
        // Membuat query SQL untuk mengambil data event berdasarkan id_event yang diberikan melalui parameter GET (menu_upd)
        $sql = "SELECT * FROM tb_event WHERE id_event='$_GET[menu_upd]'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    } else {
        // Jika tidak ada parameter menu_upd, maka menampilkan pesan "Invalid request."
        echo "Invalid request.";
        exit();
    }
    ?>

    <!-- Form tambah event -->
    <div class="form-container mt-2">
        <h2>Tambah event</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" id="judul" value="<?php echo $row['judul']; ?>" name="judul" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" rows="8" required style="width: 100%;"><?php echo $row['deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Foto:</label>
                <img src="uploads/event/<?php echo $row['gambar']; ?>" alt="gambar event" width="100">
                <input type="file" name="gambar" accept="image/*">
            </div>
            <div class="form-group submit-button">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
