<style>
  .here-item {
    background-color: #F0EEED;
  }
  .judul {
    font-size: 20px;
  }
</style>

<div class="item-container" id="berita">
  <div class="container mt-5">
    <div class="row">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">SD NEGERI 193 Hansel</h6>
        <h1 class="mb-5">Berita</h1>
      </div>
      <?php
      require_once "connections/connections.php";
      $query = "SELECT * FROM tb_berita";
      $result = $conn->query($query);

      while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4">';
        echo '<div class="here-item">';
        echo '<a href="index.php?p=beritadetail&id=' . $row['id_berita'] . '">';
        echo '<img src="admin/uploads/berita/' . $row['foto'] . '" alt="" style="width: 100%; height: 50%;">';
        echo '<div class="down-content">';
        echo '<h4 class="text-center mt-2 p-2 judul">' . $row['judul'] . '</h4>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
        echo '</div>';
      }
      ?>

    </div>
  </div>
</div>
</div>
