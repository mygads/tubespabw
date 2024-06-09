<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "edutes");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data yang dikirimkan melalui form
    $judul = $_POST["judul"];
    $kategori = $_POST["kategori"];
    $konten = $_POST["konten"];
    $gambar = $_POST["gambar"];

    // Query untuk menambahkan data berita ke dalam database
    $query = "INSERT INTO berita (judul, kategori, konten, gambar, created_at, updated_at) VALUES ('$judul', '$kategori', '$konten', '$gambar', NOW(), NOW())";

    // Jalankan query
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, kirimkan respon sukses ke JavaScript
        echo json_encode(array("status" => "success", "message" => "berita berhasil ditambahkan."));
    } else {
        // Jika gagal, kirimkan respon error ke JavaScript
        echo json_encode(array("status" => "error", "message" => "Gagal menambahkan berita: " . mysqli_error($koneksi)));
    }

    // Tutup koneksi
    mysqli_close($koneksi);
} else {
    // Jika form tidak disubmit, kirimkan respon error ke JavaScript
    echo json_encode(array("status" => "error", "message" => "Metode tidak diizinkan."));
}
?>
