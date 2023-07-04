<?php
require_once "connections/connections.php";

$query = "SELECT * FROM tb_event";
$result = $conn->query($query);
?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Event Sekolah</h2>
            </div>
        </div>
        <div class="row mt-3">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="admin/uploads/event_sekolah/<?php echo $row['gambar']; ?>" class="card-img-top" alt="Event Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                            <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                            <!-- <a href="#" class="btn btn-primary">Lihat Detail</a> -->
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
