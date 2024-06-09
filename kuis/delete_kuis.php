<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "edutes");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Ambil ID tantangan dari parameter GET
$id = $_GET['id'];

// Query untuk menghapus data
$query = "DELETE FROM kuis WHERE id_kuis = $id";
$query2 = "DELETE FROM pertanyaan_kuis WHERE id_kuis = $id";
if (mysqli_query($koneksi, $query) and mysqli_query($koneksi, $query2)) {
    echo "Data berhasil dihapus.";
} else {
    echo "Terjadi kesalahan: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);