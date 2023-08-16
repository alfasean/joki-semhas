<?php
session_start();

if (!isset($_SESSION["reset_username"])) {
    // Jika tidak ada username dalam sesi, arahkan kembali ke halaman lupa password
    header("Location: forgot_password.php");
    exit();
}

require_once "./../connections/connections.php";

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil password baru yang di-submit dari form
    $newPassword = $_POST["new_password"];
    $username = $_SESSION["reset_username"];

    // Enkripsi password baru
    $encryptedPassword = md5($newPassword);

    // Query untuk memperbarui password baru di basis data untuk username yang sesuai
    $query = "UPDATE tb_admin SET password = '$encryptedPassword' WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Password berhasil diperbarui, hapus username dari sesi dan arahkan ke halaman login atau lokasi lainnya
        unset($_SESSION["reset_username"]);
        header("Location: index.php"); // Ganti ini dengan lokasi yang sesuai
        exit();
    } else {
        // Terjadi kesalahan dalam eksekusi query
        $errorMessage = "Terjadi kesalahan. Silakan coba lagi nanti.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .error-message {
            color: red;
        }

        label, input {
            display: block;
            margin-bottom: 10px;
            width: 100%;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .image {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        h4 {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="card">
        <?php if (isset($errorMessage)) { ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php } ?>
        <form method="post" action="">
        <div class="image">
        <img src="./../img/sd.png" alt="logo" width="100">
        <h4>SD NEGERI 193 HALMAHERA SELATAN</h4>
        </div>
            <label>Password Baru:</label>
            <input type="password" name="new_password" required>
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
