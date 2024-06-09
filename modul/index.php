<?php
include('../template/head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modul Pembelajaran Sampah</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Kelola Modul Pembelajaran</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title">Modul Jenis Sampah</h5>
            <p class="card-text">Pelajari berbagai jenis sampah berdasarkan kategorinya.</p>
            <a href="jenis_sampah.php" class="btn btn-primary">Buka Modul</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title">Modul Daur Ulang Sampah</h5>
            <p class="card-text">Pelajari cara daur ulang sampah untuk mengurangi limbah.</p>
            <a href="daur_ulang.php" class="btn btn-primary">Buka Modul</a>
          </div>
        </div>
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