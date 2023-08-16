<?php
// Memulai sesi untuk penggunaan variabel $_SESSION
session_start();

// Memanggil file koneksi database
require_once "connections/connections.php";

// Memproses data jika metode permintaan adalah POST (data dikirimkan melalui form)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai dari input form
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $subjek = $_POST["subjek"];
    $pesan = $_POST["pesan"];

    // Query untuk menyimpan data ke dalam tabel tb_kontak
    $sql = "INSERT INTO tb_kontak (nama, email, subjek, pesan) VALUES ('$nama', '$email', '$subjek', '$pesan')";

    // Menjalankan query dan mengambil hasilnya
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        // Jika berhasil menyimpan data, maka tampilkan pesan sukses menggunakan JavaScript
        echo '<script>alert("Pesan telah terkirim.");</script>';
        // Redirect pengguna kembali ke halaman kontak menggunakan JavaScript
        echo '<script>window.location.href = "index.php?p=kontak";</script>';
        // Keluar dari script karena sudah berhasil mengirimkan pesan
        exit();
    } else {
        // Jika terjadi error dalam menjalankan query, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- Kontak Start -->
<!-- Bagian tampilan form kontak -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <!-- Judul bagian kontak -->
                <h6 class="section-title bg-white text-center text-primary px-3">Kontak</h6>
                <h1 class="mb-5">Hubungi Kami</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form method="POST" action="">
                        <div class="row g-3">
                            <!-- Input nama -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input name="nama" type="text" class="form-control" id="name" placeholder="Nama">
                                    <label for="name">Nama</label>
                                </div>
                            </div>
                            <!-- Input email -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <!-- Input subjek -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <input name="subjek" type="text" class="form-control" id="subject" placeholder="Subjek">
                                    <label for="subject">Subjek</label>
                                </div>
                            </div>
                            <!-- Input pesan -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="pesan" class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Pesan</label>
                                </div>
                            </div>
                            <!-- Tombol kirim pesan -->
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Kontak End -->
