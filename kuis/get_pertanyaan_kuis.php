<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "edutes");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo json_encode(array('status' => 'error', 'message' => 'Koneksi database gagal: ' . mysqli_connect_error()));
    exit();
}

// Periksa apakah parameter id_kuis telah diberikan dan valid
if (!isset($_GET['id_kuis']) || !is_numeric($_GET['id_kuis'])) {
    echo json_encode(array('status' => 'error', 'message' => 'Parameter id_kuis tidak valid'));
    exit();
}

// Ambil nilai id_kuis dari parameter GET
$id_kuis = $_GET['id_kuis'];

// Query untuk mendapatkan data satu berita
$query = "SELECT * FROM pertanyaan_kuis WHERE id_kuis = $id_kuis";
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

