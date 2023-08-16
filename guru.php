<!-- Bagian untuk menampilkan daftar tenaga pendidik -->
<div class="container-xxl py-5">
    <div class="container">
        <!-- Bagian atas halaman -->
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <!-- Judul bagian atas halaman -->
            <h6 class="section-title bg-white text-center text-primary px-3">SD NEGERI 193 Hansel</h6>
            <h1 class="mb-5">Tenaga Pendidik</h1>
        </div>
        <!-- Mengambil data tenaga pendidik dari database dan menampilkannya dalam bentuk kartu -->
        <div class="row g-4">
            <?php
            // Memasukkan file koneksi database
            require_once "connections/connections.php";
            // Query untuk memilih semua data dari tabel "tb_guru"
            $query = "SELECT * FROM tb_guru";
            // Eksekusi query dan simpan hasilnya dalam variabel $result
            $result = $conn->query($query);

            // Memulai perulangan while untuk menampilkan setiap data tenaga pendidik dari hasil query
            while ($row = $result->fetch_assoc()) {
            ?>
                <!-- Setiap data tenaga pendidik ditampilkan dalam bentuk kartu menggunakan Bootstrap -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <!-- Mengatur lebar gambar menjadi 100% -->
                        <div class="overflow-hidden">
                            <img style="width: 100%;" class="img-fluid" src="admin/uploads/guru/<?php echo $row["foto"]; ?>" alt="<?php echo $row["nama_guru"]; ?>">
                        </div>
                        <!-- Menampilkan informasi tenaga pendidik dalam kartu -->
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?php echo $row["nama_guru"]; ?></h5>
                            <!-- Menampilkan jabatan tenaga pendidik -->
                            <small><b><?php echo $row["jabatan"]; ?></b></small>
                            <br>
                            <!-- Menampilkan nomor induk pegawai (NIP) tenaga pendidik -->
                            <small>NIP : <?php echo $row["nip"]; ?></small>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
