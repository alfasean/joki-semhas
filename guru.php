<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">SD NEGERI 193 Hansel</h6>
            <h1 class="mb-5">Tenaga Pendidik</h1>
        </div>
        <div class="row g-4">
            <?php
            require_once "connections/connections.php";
            $query = "SELECT * FROM tb_guru";
            $result = $conn->query($query);
            
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">';
                echo '<div class="team-item bg-light">';
                echo '<div class="overflow-hidden">';
                echo '<img style="width: 100%;" class="img-fluid" src="admin/uploads/guru/' . $row["foto"] . '" alt="' . $row["nama_guru"] . '">';
                echo '</div>';
                echo '<div class="text-center p-4">';
                echo '<h5 class="mb-0">' . $row["nama_guru"] . '</h5>';
                echo '<small><b>' . $row["jabatan"] . '<b></small>';
                echo '<br>';
                echo '<small>' . $row["nip"] . '</small>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
<!-- Team End -->
