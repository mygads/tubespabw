<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include('template/head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-feature {
            cursor: pointer;
            transition: transform 0.2s;
        }
        .card-feature:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Dashboard Admin</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-feature" onclick="location.href='modul/'">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola Modul Pembelajaran</h5>
                        <p class="card-text">Manajemen modul pembelajaran yang ada.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-feature" onclick="location.href='kuis/'">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola Kuis</h5>
                        <p class="card-text">Manajemen kuis untuk siswa.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-feature" onclick="location.href='tantangan/'">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola Tantangan</h5>
                        <p class="card-text">Manajemen tantangan yang tersedia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-feature" onclick="location.href='berita/'">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola Berita</h5>
                        <p class="card-text">Manajemen berita terkini.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
include('template/foot.php');
?>