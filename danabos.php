<?php
require_once "connections/connections.php";
$query = "SELECT * FROM tb_danabos";
$result = $conn->query($query);
?>

<div class="item-container" id="danabos">
  <div class="container mt-5">
    <div class="row">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">SD NEGERI 193 Hansel</h6>
        <h1 class="mb-5">Dana BOS</h1>
      </div>
      <?php
      while ($row = $result->fetch_assoc()) {
        $file = $row['file'];
        $file_path = "admin/uploads/danabos/" . $file;

        echo '<div class="col-md-4">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $file . '</h5>';
        echo '<a href="' . $file_path . '" class="btn btn-primary" download>Download</a>'; // Hapus atribut download
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</div>
