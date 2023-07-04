<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>SD Negeri 193 Halsel</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="img/sd.png" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS Stylesheet -->
  <link href="css/style.css?v=2" rel="stylesheet">
  <style>
    /* Gaya CSS untuk kalender */
    .calendar {
      font-family: Arial, sans-serif;
    }

    .calendar-table {
      border-collapse: collapse;
      width: 100%;
    }

    .calendar-table th {
      border: 1px solid #ddd;
      padding: 20px;
      text-align: center;
    }

    .calendar-table td {
      border: 1px solid #ddd;
      padding: 20px;
      text-align: center;
    }

    .calendar-table .judul {
      font-size: 10px;
      background-color: #D21312;
      color: #fff;
      border-radius: 10px;
      padding: 5px;
      margin-top: 10px;
    }

    .calendar-table th {
      background-color: #f2f2f2;
    }

    .calendar-table td.current-day {
      background-color: #06BBCC;
      color: #fff;
    }

    .event-list {
      margin: 0;
      padding: 0;
      list-style: none;
    }

    .calendar-header {
      text-align: center;
    }
    select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }
  input {
    width: 100%;
  }
  </style>
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <!-- Spinner End -->


  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <h2 class="m-0 text-primary" style="font-size: 30px; max-width: 30px;"><img width="40" height="40"
          src="img/sd.png" alt="logo sd"><strong> SD Negeri 193 Halsel</strong></h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="index.php" class="nav-item nav-link">Beranda</a>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Akademik</a>
          <div class="dropdown-menu fade-down m-0">
            <a href="index.php?p=guru" class="dropdown-item">Tenaga Pendidik</a>
            <a href="siswa.php" class="dropdown-item">Siswa</a>
            <a href="index.php?p=event" class="dropdown-item">Event Sekolah</a>
            <a href="index.php?p=danabos" class="dropdown-item">Dana Bos</a>
            <a href="kalender.php" class="dropdown-item">Kalender Akademik</a>
          </div>
        </div>
        <a href="index.php?p=berita" class="nav-item nav-link">Berita</a>
        <a href="index.php?p=kontak" class="nav-item nav-link">Kontak</a>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->


  <div class="container mt-5">
  <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    <h6 class="section-title bg-white text-center text-primary px-3">SD NEGERI 193 Hansel</h6>
    <h1 class="mb-3">Kalender Akademik</h1>
  </div>
  <div class="d-flex justify-content-center">
    <div class="calendar">
      <div class="calendar-header mb-3">
        <form action="" method="get">
          <select name="month" id="month" class="mb-2">
            <?php
            $currentMonth = date('F');
            $currentYear = date('Y');
            $selectedMonth = isset($_GET['month']) ? $_GET['month'] : date('m');

            for ($m = 1; $m <= 12; $m++) {
              $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
              $monthNum = date('m', mktime(0, 0, 0, $m, 1, date('Y')));
              $selected = ($selectedMonth == $monthNum) ? 'selected' : '';
              echo "<option value='$monthNum' $selected>$month</option>";
            }
            ?>
          </select>
          <select name="year" id="year" class="mb-2">
            <?php
            $startYear = $currentYear - 10;
            $endYear = $currentYear + 10;
            $selectedYear = isset($_GET['year']) ? $_GET['year'] : $currentYear;

            for ($y = $startYear; $y <= $endYear; $y++) {
              $selected = ($selectedYear == $y) ? 'selected' : '';
              echo "<option value='$y' $selected>$y</option>";
            }
            ?>
          </select>
          <input type="submit" class="btn btn-primary" value="Ganti" style="border-radius: 10px;">
        </form>
      </div>
      <table class="calendar-table">
        <thead>
          <tr>
            <th>Minggu</th>
            <th>Senin</th>
            <th>Selasa</th>
            <th>Rabu</th>
            <th>Kamis</th>
            <th>Jumat</th>
            <th>Sabtu</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once "connections/connections.php";

          $selectedMonth = isset($_GET['month']) ? $_GET['month'] : date('m');
          $selectedYear = isset($_GET['year']) ? $_GET['year'] : date('Y');

          $query = "SELECT * FROM tb_kalender";
          $result = mysqli_query($conn, $query);

          $currentDate = strtotime($selectedYear . '-' . $selectedMonth . '-01');
          $startDay = date('w', $currentDate);
          $startDate = date('Y-m-d', strtotime("-$startDay day", $currentDate));

          for ($i = 0; $i < 6; $i++) {
            echo "<tr>";

            for ($j = 0; $j < 7; $j++) {
              $cellDate = date('Y-m-d', strtotime("+$j day", strtotime("+$i week", strtotime($startDate))));
              $cellEvents = "";

              mysqli_data_seek($result, 0);
              while ($row = mysqli_fetch_assoc($result)) {
                $eventDate = $row['tanggal'];
                $eventTitle = $row['judul'];

                if ($eventDate == $cellDate) {
                  $cellEvents .= "<li class='judul'>$eventTitle</li>";
                }
              }

              $cellClass = ($cellDate == date('Y-m-d')) ? "current-day" : "";

              echo "<td class='$cellClass'>";
              echo "<span>" . date('d', strtotime($cellDate)) . "</span>";
              echo "<ul class='event-list'>$cellEvents</ul>";
              echo "</td>";
            }

            echo "</tr>";
          }

          mysqli_close($conn);
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


  <!-- Footer Start -->
  <div class="container-fluid text-light footer pt-2 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
      <div class="copyright">
        <div class="row">
          <div
            class="d-flex justify-content-center align-items-center text-center text-dark text-md-start mb-3 mb-md-0">
            &copy; <a class="" href="#">SD NEGERI 194 Hansel</a>, All Right Reserved.
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Javascript -->
    <script src="js/main.js"></script>
</body>

</html>