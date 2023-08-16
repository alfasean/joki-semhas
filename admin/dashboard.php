<?php
    session_start();
    require_once "./../connections/connections.php";

    $query = "SELECT COUNT(*) as total_guru FROM tb_guru";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_guru = $data['total_guru'];

    // $query = "SELECT COUNT(*) as total_siswa FROM tb_siswa";
    // $result = mysqli_query($conn, $query);
    // $data = mysqli_fetch_assoc($result);
    // $total_siswa = $data['total_siswa'];

    $query = "SELECT COUNT(*) as total_berita FROM tb_berita";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_berita = $data['total_berita'];

    $query = "SELECT COUNT(*) as total_kontak FROM tb_kontak";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_kontak = $data['total_kontak'];
    mysqli_close($conn);
    ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $total_kontak; ?></h3>
              <p>Total Pesan</p>
            </div>
            <div class="icon">
                <i class="far fa-envelope"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $total_siswa; ?></h3>
              <p>Total Siswa</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-graduate"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $total_guru; ?></h3>
              <p>Total Guru</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $total_berita; ?></h3>
              <p>Total Berita</p>
            </div>
            <div class="icon">
                <i class="far fa-newspaper"></i>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
