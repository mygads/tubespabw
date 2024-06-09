-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 08:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edutrashgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `konten` text NOT NULL,
  `url_gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `kategori`, `konten`, `url_gambar`, `created_at`, `updated_at`) VALUES
(1, 'Teknologi Daur Ulang Terbaru', 'Teknologi', 'Berita tentang inovasi terbaru dalam teknologi daur ulang', 'image-berita.png', NULL, NULL),
(2, 'Workshop Pemilahan Sampah', 'Komunitas', 'Workshop komunitas tentang cara pemilahan sampah yang efektif', 'image-berita.png', NULL, NULL),
(3, 'Kampanye Lingkungan Sekolah', 'Edukasi', 'Sekolah-sekolah mengadakan kampanye untuk meningkatkan kesadaran lingkungan', 'image-berita.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `konten_daur_ulang`
--

CREATE TABLE `konten_daur_ulang` (
  `id_konten` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `url_video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konten_daur_ulang`
--

INSERT INTO `konten_daur_ulang` (`id_konten`, `judul`, `deskripsi`, `konten`, `url_video`, `created_at`, `updated_at`) VALUES
(1, 'Judul Konten Diperbarui', 'Deskripsi baru dari konten daur ulang', 'Ini adalah konten yang telah diperbarui', 'https://www.youtube.com/watch?v=updated_video_id', NULL, '2024-06-08 22:38:48'),
(2, 'Cara Membuat Kompos', 'Langkah-langkah membuat kompos dari sampah organik', 'Konten tentang cara membuat kompos', 'url_ke_video_kompos', NULL, NULL),
(3, 'Kreativitas Daur Ulang', 'Mengubah sampah menjadi barang berguna', 'Konten tentang kreativitas daur ulang', 'url_ke_video_kreatif', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id_kuis` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id_kuis`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Kuis Lingkungan Hidup', 'Kuis untuk menguji pengetahuan tentang lingkungan hidup', NULL, NULL),
(2, 'Kuis Daur Ulang', 'Kuis tentang proses dan manfaat daur ulang', NULL, NULL),
(3, 'Kuis Pemilahan Sampah', 'Kuis untuk menguji pemahaman tentang pemilahan sampah', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_06_08_160742_create_berita_table', 1),
(2, '2024_06_08_185714_create_konten_daur_ulang_table', 1),
(3, '2024_06_08_190035_create_kuis_table', 1),
(4, '2024_06_08_190918_create_modul_kategori_table', 1),
(5, '2024_06_08_191007_create_modul_detail_sampah_table', 1),
(6, '2024_06_08_191726_create_pengguna_table', 1),
(7, '2024_06_08_192226_create_pertanyaan_kuis_table', 1),
(8, '2024_06_08_192543_create_skor_siswa_table', 1),
(9, '2024_06_08_193702_create_tantangan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modul_detail_sampah`
--

CREATE TABLE `modul_detail_sampah` (
  `id_detail_sampah` int(11) NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `url_gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modul_detail_sampah`
--

INSERT INTO `modul_detail_sampah` (`id_detail_sampah`, `id_kategori`, `nama`, `deskripsi`, `url_gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sisa Makanan', 'Sisa makanan seperti sayuran dan buah-buahan', 'url_gambar_sisa_makanan.jpg', NULL, NULL),
(2, 2, 'Plastik', 'Sampah plastik seperti botol dan kantong plastik', 'url_gambar_plastik.jpg', NULL, NULL),
(3, 3, 'Baterai Bekas', 'Baterai bekas yang mengandung bahan kimia berbahaya', 'url_gambar_baterai_bekas.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modul_kategori`
--

CREATE TABLE `modul_kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi_kategori` text DEFAULT NULL,
  `url_gambar_kategori` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modul_kategori`
--

INSERT INTO `modul_kategori` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`, `url_gambar_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Organik', 'Sampah yang dapat terurai secara alami', 'url_gambar_organik.jpg', NULL, NULL),
(2, 'Anorganik', 'Sampah yang tidak dapat terurai secara alami', 'url_gambar_anorganik.jpg', NULL, NULL),
(3, 'B3', 'Sampah Bahan Berbahaya dan Beracun', 'url_gambar_b3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `peran` enum('siswa','guru') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_kuis`
--

CREATE TABLE `pertanyaan_kuis` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_kuis` int(10) UNSIGNED NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaan_kuis`
--

INSERT INTO `pertanyaan_kuis` (`id_pertanyaan`, `id_kuis`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 1, 'Apa itu daur ulang?', 'Proses mengubah sampah menjadi produk baru', NULL, NULL),
(2, 2, 'Sebutkan tiga jenis sampah berdasarkan kategorinya.', 'Organik, Anorganik, B3', NULL, NULL),
(3, 3, 'Bagaimana cara memilah sampah yang benar?', 'Memisahkan sampah berdasarkan jenis dan kategori', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skor_siswa`
--

CREATE TABLE `skor_siswa` (
  `id_skor_siswa` int(11) NOT NULL,
  `id_pengguna` int(10) UNSIGNED NOT NULL,
  `id_kuis` int(10) UNSIGNED NOT NULL,
  `skor` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tantangan`
--

CREATE TABLE `tantangan` (
  `id_tantangan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `batas_waktu` datetime DEFAULT NULL,
  `hadiah` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tantangan`
--

INSERT INTO `tantangan` (`id_tantangan`, `judul`, `deskripsi`, `batas_waktu`, `hadiah`, `created_at`, `updated_at`) VALUES
(1, 'Tantangan Kompos', 'Membuat kompos dari sampah organik dalam satu bulan', '2024-07-31 23:59:59', 'Paket alat kebun', NULL, NULL),
(2, 'Tantangan Daur Ulang', 'Menciptakan produk berguna dari sampah anorganik', '2024-08-31 23:59:59', 'Voucher belanja', NULL, NULL),
(3, 'Tantangan Hemat Energi', 'Mengurangi konsumsi energi di rumah selama satu bulan', '2024-09-30 23:59:59', 'Sertifikat penghematan energi', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `konten_daur_ulang`
--
ALTER TABLE `konten_daur_ulang`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id_kuis`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul_detail_sampah`
--
ALTER TABLE `modul_detail_sampah`
  ADD PRIMARY KEY (`id_detail_sampah`),
  ADD KEY `modul_detail_sampah_ibfk_1` (`id_kategori`);

--
-- Indexes for table `modul_kategori`
--
ALTER TABLE `modul_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `pengguna_username_unique` (`username`);

--
-- Indexes for table `pertanyaan_kuis`
--
ALTER TABLE `pertanyaan_kuis`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `pertanyaan_kuis_ibfk_1` (`id_kuis`);

--
-- Indexes for table `skor_siswa`
--
ALTER TABLE `skor_siswa`
  ADD PRIMARY KEY (`id_skor_siswa`),
  ADD KEY `skor_siswa_ibfk_1` (`id_pengguna`),
  ADD KEY `skor_siswa_ibfk_2` (`id_kuis`);

--
-- Indexes for table `tantangan`
--
ALTER TABLE `tantangan`
  ADD PRIMARY KEY (`id_tantangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konten_daur_ulang`
--
ALTER TABLE `konten_daur_ulang`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id_kuis` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `modul_detail_sampah`
--
ALTER TABLE `modul_detail_sampah`
  MODIFY `id_detail_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `modul_kategori`
--
ALTER TABLE `modul_kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaan_kuis`
--
ALTER TABLE `pertanyaan_kuis`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skor_siswa`
--
ALTER TABLE `skor_siswa`
  MODIFY `id_skor_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tantangan`
--
ALTER TABLE `tantangan`
  MODIFY `id_tantangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `modul_detail_sampah`
--
ALTER TABLE `modul_detail_sampah`
  ADD CONSTRAINT `modul_detail_sampah_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `modul_kategori` (`id_kategori`),
  ADD CONSTRAINT `modul_detail_sampah_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `modul_kategori` (`id_kategori`);

--
-- Constraints for table `pertanyaan_kuis`
--
ALTER TABLE `pertanyaan_kuis`
  ADD CONSTRAINT `pertanyaan_kuis_ibfk_1` FOREIGN KEY (`id_kuis`) REFERENCES `kuis` (`id_kuis`),
  ADD CONSTRAINT `pertanyaan_kuis_id_kuis_foreign` FOREIGN KEY (`id_kuis`) REFERENCES `kuis` (`id_kuis`);

--
-- Constraints for table `skor_siswa`
--
ALTER TABLE `skor_siswa`
  ADD CONSTRAINT `skor_siswa_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `skor_siswa_ibfk_2` FOREIGN KEY (`id_kuis`) REFERENCES `kuis` (`id_kuis`),
  ADD CONSTRAINT `skor_siswa_id_kuis_foreign` FOREIGN KEY (`id_kuis`) REFERENCES `kuis` (`id_kuis`),
  ADD CONSTRAINT `skor_siswa_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
