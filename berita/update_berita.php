<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "edutes");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Mendapatkan data dari request
$id = $_POST['id_berita'];
$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$konten = $_POST['konten'];
$url_gambar = $_POST['url_gambar'];

// Menentukan timestamp saat ini untuk kolom updated_at
$updated_at = date('Y-m-d H:i:s');

// Query untuk memperbarui data berita
$query = "UPDATE berita SET judul = '$judul', kategori = '$kategori', konten = '$konten', url_gambar = '$url_gambar', updated_at = '$updated_at' WHERE id_berita = $id";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah query berhasil
if ($result) {
    echo json_encode(['success' => 'Data berhasil diperbarui']);
} else {
    echo json_encode(['error' => 'Gagal memperbarui data']);
}

// Menutup koneksi
mysqli_close($koneksi);
