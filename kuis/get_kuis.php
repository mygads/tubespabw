<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "edutes");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Query untuk menampilkan data dari tabel kuis
$query = "SELECT id_kuis, judul, deskripsi FROM kuis";
$result = mysqli_query($koneksi, $query);

// Membuat array untuk menyimpan hasil query
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Mengembalikan data dalam format JSON
echo json_encode($data);

// Menutup koneksi
mysqli_close($koneksi);