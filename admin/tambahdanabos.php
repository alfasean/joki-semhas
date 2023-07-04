<?php
session_start();
require_once "./../connections/connections.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = $_FILES['file'];
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];

    $upload_dir = "uploads/danabos/";
    $file_path = $upload_dir . $file_name;

    $allowed_extensions = array('doc', 'docx', 'pdf');
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

    if (in_array($file_extension, $allowed_extensions)) {
        $max_file_size = 5 * 1024 * 1024;
        if ($file_size <= $max_file_size) {
            if (move_uploaded_file($file_tmp, $file_path)) {
                $sql = "INSERT INTO tb_danabos (file)
                        VALUES ('$file_name')";

                if ($conn->query($sql) === TRUE) {
                    $conn->close();
                    echo '<script>window.location.href = "admin.php?p=danabos";</script>';
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Gagal mengunggah file.";
            }
        } else {
            echo "Ukuran file terlalu besar. Maksimum 5MB.";
        }
    } else {
        echo "Tipe file tidak valid. Hanya file dengan ekstensi .doc, .docx, .pdf yang diperbolehkan.";
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
