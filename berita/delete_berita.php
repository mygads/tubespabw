<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "edutes");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Ambil ID berita dari parameter GET
$id = $_GET['id'];

// Query untuk menghapus data
$query = "DELETE FROM berita WHERE id_berita = $id";
if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil dihapus.";
} else {
    echo "Terjadi kesalahan: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);