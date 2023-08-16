<?php
// Memulai sesi
session_start();

// Memanggil file koneksi database
require_once "./../connections/connections.php";

// Cek apakah request menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari input form
    $judul = $_POST["judul"];
    $tanggal = $_POST["tanggal"];

    // Membuat query SQL untuk mengupdate data kalender berdasarkan id_kalender yang diberikan melalui parameter GET (menu_upd)
    $sql = "UPDATE tb_kalender SET judul='$judul', tanggal='$tanggal' WHERE id_kalender='$_GET[menu_upd]'";

    // Eksekusi perintah SQL untuk melakukan update data kalender
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        // Alihkan halaman kembali ke halaman admin.php dengan parameter p=kalender setelah berhasil mengupdate data
        echo '<script>window.location.href = "admin.php?p=kalender";</script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kalender</title>
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
        // Membuat query SQL untuk mengambil data kalender berdasarkan id_kalender yang diberikan melalui parameter GET (menu_upd)
        $sql = "SELECT * FROM tb_kalender WHERE id_kalender='$_GET[menu_upd]'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    } else {
        // Jika tidak ada parameter menu_upd, maka menampilkan pesan "Invalid request."
        echo "Invalid request.";
        exit();
    }
    ?>

    <!-- Form edit kalender -->
    <div class="form-container mt-2">
        <h2>Edit Kalender</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Nama Kegiatan:</label>
                <input type="text" id="judul" value="<?php echo $row['judul']; ?>" name="judul" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Kegiatan:</label>
                <input type="date" id="tanggal" value="<?php echo $row['tanggal']; ?>" name="tanggal" required>
            </div>
            <div class="form-group submit-button">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
