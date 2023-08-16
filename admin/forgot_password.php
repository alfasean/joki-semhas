<?php
require_once "./../connections/connections.php";
session_start();

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);

    // Periksa apakah username tersedia di basis data
    $checkQuery = "SELECT * FROM tb_admin WHERE username = '$username'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username ditemukan, simpan username dalam sesi dan arahkan ke halaman reset password
        $_SESSION["reset_username"] = $username;
        header("Location: reset_password.php");
        exit();
    } else {
        $errorMessage = "Username tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
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
        <form method="post" action="">
        <div class="image">
        <img src="./../img/sd.png" alt="logo" width="100">
        <h4>SD NEGERI 193 HALMAHERA SELATAN</h4>
        </div>
        <?php if (!empty($errorMessage)) { ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php } ?>
            <label>Username</label>
            <input type="text" name="username" required>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
