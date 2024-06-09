<?php
include('../template/head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jenis Sampah</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card:hover {
      transform: translateY(-5px);
      transition: all 0.3s ease;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Jenis Sampah</h2>
    <div class="row">
      <div class="col-md-4">
        <a href="kelola_organik.php" class="text-decoration-none">
          <div class="card mb-4">
            <img src="organik.jpg" class="card-img-top" alt="Organik">
            <div class="card-body">
              <h5 class="card-title">Organik</h5>
              <p class="card-text">Jenis sampah organik.</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="kelola_anorganik.php" class="text-decoration-none">
          <div class="card mb-4">
            <img src="anorganik.jpg" class="card-img-top" alt="Anorganik">
            <div class="card-body">
              <h5 class="card-title">Anorganik</h5>
              <p class="card-text">Jenis sampah anorganik.</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="kelola_b3.php" class="text-decoration-none">
          <div class="card mb-4">
            <img src="b3.jpg" class="card-img-top" alt="B3">
            <div class="card-body">
              <h5 class="card-title">B3</h5>
              <p class="card-text">Jenis sampah Bahan Berbahaya dan Beracun.</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include('../template/foot.php');
?>