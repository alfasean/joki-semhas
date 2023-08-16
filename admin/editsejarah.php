<?php
// Memulai sesi
session_start();

// Memanggil file koneksi database
require_once "./../connections/connections.php";

// Cek apakah request menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data deskripsi dari input form
    $deskripsi = $_POST["deskripsi"];

    // Membuat query SQL untuk mengupdate data sejarah berdasarkan id_sejarah yang diberikan melalui parameter GET (menu_upd)
    $sql = "UPDATE tb_sejarah SET deskripsi='$deskripsi' WHERE id_sejarah='$_GET[menu_upd]'";

    // Eksekusi perintah SQL untuk melakukan update data sejarah
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        // Alihkan halaman kembali ke halaman admin.php dengan parameter p=sejarah setelah berhasil mengupdate data
        echo '<script>window.location.href = "admin.php?p=sejarah";</script>';
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
    <title>Edit Sejarah</title>
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
        // Mengambil id_sejarah dari parameter GET
        $id_sejarah = $_GET['menu_upd'];

        // Membuat query SQL untuk mengambil data sejarah berdasarkan id_sejarah yang diberikan melalui parameter GET (menu_upd)
        $sql = "SELECT * FROM tb_sejarah WHERE id_sejarah='$id_sejarah'";
        $result = $conn->query($sql);

        // Mengecek apakah data sejarah dengan id_sejarah yang diberikan ada dalam database
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            // Jika tidak ada data sejarah dengan id_sejarah yang diberikan, maka menampilkan pesan "Data sejarah tidak ditemukan."
            echo "Data sejarah tidak ditemukan.";
            exit();
        }
    } else {
        // Jika tidak ada parameter menu_upd, maka menampilkan pesan "Invalid request."
        echo "Invalid request.";
        exit();
    }
    ?>

    <!-- Form edit sejarah -->
    <div class="form-container mt-2">
        <h2>Edit Sejarah</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" rows="8" required style="width: 100%;"><?php echo $row['deskripsi']; ?></textarea>
            </div>
            <div class="form-group submit-button">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
