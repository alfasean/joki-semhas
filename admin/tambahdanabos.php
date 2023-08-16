<?php
session_start();
require_once "./../connections/connections.php";

// Mulai sesi PHP
// Mengimpor file koneksi untuk menjalankan koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah request method adalah POST

    $file = $_FILES['file'];
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    // Ambil informasi tentang file yang diunggah melalui form

    $upload_dir = "uploads/danabos/";
    $file_path = $upload_dir . $file_name;
    // Tentukan direktori tujuan untuk menyimpan file dan jalur lengkap file yang akan diunggah

    $allowed_extensions = array('doc', 'docx', 'pdf');
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    // Tentukan ekstensi file yang diizinkan untuk diunggah

    if (in_array($file_extension, $allowed_extensions)) {
        // Periksa apakah ekstensi file termasuk dalam ekstensi yang diizinkan

        $max_file_size = 5 * 1024 * 1024;
        if ($file_size <= $max_file_size) {
            // Periksa apakah ukuran file tidak melebihi batas maksimum (5MB)

            if (move_uploaded_file($file_tmp, $file_path)) {
                // Pindahkan file ke direktori tujuan

                $sql = "INSERT INTO tb_danabos (file)
                        VALUES ('$file_name')";
                // Buat query SQL untuk menyimpan data nama file ke database

                if ($conn->query($sql) === TRUE) {
                    // Jalankan query dan periksa apakah berhasil

                    $conn->close();
                    // Tutup koneksi ke database
                    echo '<script>window.location.href = "admin.php?p=danabos";</script>';
                    // Redirect ke halaman dana BOS setelah berhasil menyimpan data
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    // Tampilkan pesan error jika query gagal dieksekusi
                }
            } else {
                echo "Gagal mengunggah file.";
                // Tampilkan pesan error jika gagal mengunggah file
            }
        } else {
            echo "Ukuran file terlalu besar. Maksimum 5MB.";
            // Tampilkan pesan error jika ukuran file terlalu besar
        }
    } else {
        echo "Tipe file tidak valid. Hanya file dengan ekstensi .doc, .docx, .pdf yang diperbolehkan.";
        // Tampilkan pesan error jika tipe file tidak diizinkan
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dana BOS</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="form-container mt-2">
        <h2>Tambah Dana BOS</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">File:</label>
                <input type="file" name="file" accept=".doc, .docx, .pdf" required>
            </div>
            <div class="form-group submit-button">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
