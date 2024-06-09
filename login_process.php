<?php
session_start();

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "edutes");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo json_encode(['success' => false, 'message' => 'Koneksi database gagal: ' . mysqli_connect_error()]);
    exit();
}

// Mendapatkan data dari request
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$kata_sandi = mysqli_real_escape_string($koneksi, $_POST['kata_sandi']);

// Query untuk memeriksa pengguna
$query = "SELECT * FROM pengguna WHERE username = '$username' AND kata_sandi = '$kata_sandi'";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah pengguna ditemukan dan kata sandi cocok
if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['user_id'] = $row['id_pengguna'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['peran'] = $row['peran']; // Asumsikan ada kolom 'peran' untuk menentukan siswa atau guru(admin)
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Username atau kata sandi salah']);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
