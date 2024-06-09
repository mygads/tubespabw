<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "edutes");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Mendapatkan data dari request
$id = $_POST['id_tantangan'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$hadiah = $_POST['hadiah'];
$batas_waktu = $_POST['batas_waktu'];

// Menentukan timestamp saat ini untuk kolom updated_at
$updated_at = date('Y-m-d H:i:s');

// Query untuk memperbarui data tantangan
$query = "UPDATE tantangan SET judul = '$judul', deskripsi = '$deskripsi', hadiah = '$hadiah', batas_waktu = '$batas_waktu', updated_at = '$updated_at' WHERE id_tantangan = $id";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah query berhasil
if ($result) {
    echo json_encode(['success' => 'Data berhasil diperbarui']);
} else {
    echo json_encode(['error' => 'Gagal memperbarui data']);
}

// Menutup koneksi
mysqli_close($koneksi);
