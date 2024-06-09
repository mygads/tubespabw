<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "edutes");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Mendapatkan ID dari request
$id = $_GET['id'];

// Query untuk mendapatkan data satu tantangan
$query = "SELECT id_tantangan, judul, deskripsi, hadiah, batas_waktu, created_at, updated_at FROM tantangan WHERE id_tantangan = $id";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah data ditemukan
if ($row = mysqli_fetch_assoc($result)) {
    // Mengembalikan data dalam format JSON
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'Data tidak ditemukan']);
}

// Menutup koneksi
mysqli_close($koneksi);
