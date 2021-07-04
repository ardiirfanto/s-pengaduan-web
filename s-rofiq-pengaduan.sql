-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Jul 2021 pada 15.04
-- Versi server: 5.7.24
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s-rofiq-pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_pengaduan`
--

CREATE TABLE `category_pengaduan` (
  `category_pengaduan_id` bigint(20) UNSIGNED NOT NULL,
  `category_pengaduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category_pengaduan`
--

INSERT INTO `category_pengaduan` (`category_pengaduan_id`, `category_pengaduan`) VALUES
(1, 'Kecelakaan'),
(3, 'Pemerkosaan'),
(4, 'Kebakaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_post`
--

CREATE TABLE `category_post` (
  `category_post_id` bigint(20) UNSIGNED NOT NULL,
  `category_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category_post`
--

INSERT INTO `category_post` (`category_post_id`, `category_post`) VALUES
(2, 'Berita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kades`
--

CREATE TABLE `kades` (
  `kades_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kades_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kades_gender` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kades_alamat` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kades`
--

INSERT INTO `kades` (`kades_id`, `user_id`, `kades_name`, `kades_gender`, `kades_alamat`) VALUES
(2, 10, 'Zainuri Ahmad', 'L', 'Pati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2021_06_01_080244_create_kades_table', 1),
(3, '2021_06_01_080302_create_warga_table', 1),
(4, '2021_06_01_080322_create_category_pengaduan_table', 1),
(5, '2021_06_01_080344_create_pengaduan_table', 1),
(6, '2021_06_01_080355_create_category_post_table', 1),
(7, '2021_06_01_080407_create_post_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `pengaduan_id` bigint(20) UNSIGNED NOT NULL,
  `category_pengaduan_id` bigint(20) UNSIGNED NOT NULL,
  `warga_id` bigint(20) UNSIGNED NOT NULL,
  `pengaduan_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengaduan_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengaduan_date` date NOT NULL,
  `pengaduan_status` enum('Pending','Proses','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengaduan_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `category_post_id` bigint(20) UNSIGNED NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`post_id`, `category_post_id`, `post_title`, `post_thumbnail`, `post_content`, `post_date`) VALUES
(1, 2, 'Ini Berita Pentingss', 'THUMB_20210704145918.jpg', '<p><font face=\"Comic Sans MS\"><b>Ini adalah sebuah berita penting ssssssszzz</b></font></p>', '2021-07-04'),
(2, 2, 'Ini Berita', 'THUMB_20210704143533jpg', '<p><b>Ini Bukan berita penting bosss</b></p>', '2021-07-04'),
(3, 2, 'Ini Berita', 'THUMB_20210704143958.jpg', '<p><b>Ini Bukan berita penting bosss</b></p>', '2021-07-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','kades','warga') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$YSDWluqcKc5EfLZNucs3tOUEr0yEoGemxT1FV7y4oau/dQ20EhUUm', 'admin'),
(5, 'budis', '$2y$10$DUf7Yo4kjijjyhO.VXxv4OM1znZ29Dnhfz.PE/ekBsHASYAmf2RlG', 'warga'),
(6, 'hamis', '$2y$10$7TzCqijQQhbVGCHeRJ.wCOTU9Zu3Qmfl7b60N.8kY6yP1JNhq2zMi', 'warga'),
(8, 'khamil', '$2y$10$FxtGlw8uGRiEelinf5/c..fdm9JpWEew0E/RPKpddYYANUFFkwhT6', 'warga'),
(10, 'zainuri', '$2y$10$U08CGR1Q2EHm3RK7alLNfujxIvnp1CrWbUVrDdxGQLG92GKPlYRhi', 'kades');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `warga_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `warga_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warga_gender` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `warga_alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `warga_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`warga_id`, `user_id`, `warga_name`, `warga_gender`, `warga_alamat`, `warga_phone`) VALUES
(2, 5, 'Budi Nuryanto', 'L', 'Pati', '089999000999'),
(3, 6, 'Hami Hinaya', 'P', 'Pati', '087666555678'),
(4, 8, 'Khamil Ahmad', 'L', 'Pati', '089999888999');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category_pengaduan`
--
ALTER TABLE `category_pengaduan`
  ADD PRIMARY KEY (`category_pengaduan_id`);

--
-- Indeks untuk tabel `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`category_post_id`);

--
-- Indeks untuk tabel `kades`
--
ALTER TABLE `kades`
  ADD PRIMARY KEY (`kades_id`),
  ADD KEY `kades_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`pengaduan_id`),
  ADD KEY `pengaduan_category_pengaduan_id_foreign` (`category_pengaduan_id`),
  ADD KEY `pengaduan_warga_id_foreign` (`warga_id`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_category_post_id_foreign` (`category_post_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`warga_id`),
  ADD KEY `warga_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category_pengaduan`
--
ALTER TABLE `category_pengaduan`
  MODIFY `category_pengaduan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `category_post`
--
ALTER TABLE `category_post`
  MODIFY `category_post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kades`
--
ALTER TABLE `kades`
  MODIFY `kades_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `pengaduan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `warga`
--
ALTER TABLE `warga`
  MODIFY `warga_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kades`
--
ALTER TABLE `kades`
  ADD CONSTRAINT `kades_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_category_pengaduan_id_foreign` FOREIGN KEY (`category_pengaduan_id`) REFERENCES `category_pengaduan` (`category_pengaduan_id`),
  ADD CONSTRAINT `pengaduan_warga_id_foreign` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`warga_id`);

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_category_post_id_foreign` FOREIGN KEY (`category_post_id`) REFERENCES `category_post` (`category_post_id`);

--
-- Ketidakleluasaan untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD CONSTRAINT `warga_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
