-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Jul 2021 pada 14.44
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
  `pengaduan_date` datetime NOT NULL,
  `pengaduan_status` enum('Pending','Proses','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengaduan_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`pengaduan_id`, `category_pengaduan_id`, `warga_id`, `pengaduan_title`, `pengaduan_desc`, `pengaduan_date`, `pengaduan_status`, `pengaduan_img`, `lat`, `lng`) VALUES
(4, 1, 2, 'Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.  The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2021-07-19 15:03:41', 'Pending', 'PENG_20210719080341.jpg', '-6,888990', '110,99999'),
(7, 1, 2, 'Kecelakaan Panas', 'Kecelakaan terjadi di jalan A sampai B', '2021-07-19 22:49:36', 'Pending', 'PENG_20210719154936.jpg', '-6,888990', '110,99999'),
(8, 1, 2, 'Laporan Baru', 'Ini adalah Laporan Baru', '2021-07-20 16:50:54', 'Proses', 'PENG_20210720095054.jpg', '37.421998333333335', '-122.08400000000002');

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
(1, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'THUMB_20210704145918.jpg', '<div style=\"text-align: justify; \"><font face=\"Arial\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Molestie a iaculis at erat pellentesque. Etiam tempor orci eu lobortis elementum nibh tellus molestie. Iaculis at erat pellentesque adipiscing commodo. Ornare arcu dui vivamus arcu felis bibendum ut tristique et. Non pulvinar neque laoreet suspendisse interdum consectetur libero id faucibus. Dictum varius duis at consectetur lorem donec massa sapien. Pretium nibh ipsum consequat nisl vel pretium lectus quam. Sit amet massa vitae tortor. Ut etiam sit amet nisl purus in mollis. Gravida quis blandit turpis cursus in hac habitasse. Felis donec et odio pellentesque diam volutpat. Nibh tellus molestie nunc non.</font></div><div style=\"text-align: justify;\"><font face=\"Arial\"><br></font></div><div style=\"text-align: justify;\"><font face=\"Arial\">Aenean et tortor at risus viverra adipiscing at. Aliquet enim tortor at auctor. Diam in arcu cursus euismod. Id donec ultrices tincidunt arcu non sodales. Et malesuada fames ac turpis egestas integer. Praesent semper feugiat nibh sed pulvinar proin. Scelerisque viverra mauris in aliquam sem fringilla ut. Sed egestas egestas fringilla phasellus faucibus scelerisque eleifend. Felis imperdiet proin fermentum leo vel orci porta. Eget velit aliquet sagittis id consectetur purus ut. Sollicitudin tempor id eu nisl nunc mi ipsum faucibus vitae. Adipiscing elit pellentesque habitant morbi tristique senectus. Non tellus orci ac auctor augue. Metus aliquam eleifend mi in. Sapien faucibus et molestie ac feugiat sed lectus. Lectus quam id leo in vitae turpis. Aliquet porttitor lacus luctus accumsan tortor posuere ac ut consequat.</font></div><div style=\"text-align: justify;\"><font face=\"Arial\"><br></font></div><div style=\"text-align: justify;\"><font face=\"Arial\">Vestibulum rhoncus est pellentesque elit. Ullamcorper morbi tincidunt ornare massa eget egestas purus. Felis bibendum ut tristique et egestas. Pretium fusce id velit ut tortor pretium viverra suspendisse. Mattis pellentesque id nibh tortor. Consequat id porta nibh venenatis. Eget nullam non nisi est sit amet facilisis magna. Vitae justo eget magna fermentum iaculis eu non. Et tortor at risus viverra adipiscing at. Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et. Elementum eu facilisis sed odio morbi quis commodo odio aenean. Eu consequat ac felis donec. Nisi scelerisque eu ultrices vitae. Posuere morbi leo urna molestie at elementum eu facilisis sed. Etiam sit amet nisl purus in mollis nunc. Malesuada fames ac turpis egestas maecenas pharetra convallis posuere morbi.</font></div><div style=\"text-align: justify;\"><font face=\"Arial\"><br></font></div><div style=\"text-align: justify;\"><font face=\"Arial\">Eu sem integer vitae justo eget magna. A erat nam at lectus urna duis. Faucibus nisl tincidunt eget nullam. Ac ut consequat semper viverra nam libero justo laoreet sit. Pretium lectus quam id leo in vitae. Tortor at auctor urna nunc id cursus. Scelerisque viverra mauris in aliquam. Diam ut venenatis tellus in metus vulputate eu. Id ornare arcu odio ut sem nulla. Nunc mi ipsum faucibus vitae aliquet nec. Sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus. Nibh praesent tristique magna sit amet purus gravida quis. Ante in nibh mauris cursus mattis molestie. Arcu bibendum at varius vel pharetra. Blandit aliquam etiam erat velit. Commodo odio aenean sed adipiscing diam donec. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus.</font></div><div style=\"text-align: justify;\"><font face=\"Arial\"><br></font></div><div style=\"text-align: justify;\"><font face=\"Arial\">Vel fringilla est ullamcorper eget. Tincidunt ornare massa eget egestas purus viverra. Et ultrices neque ornare aenean euismod elementum nisi quis. In pellentesque massa placerat duis ultricies lacus. Tristique senectus et netus et malesuada fames ac turpis. Id diam maecenas ultricies mi eget mauris pharetra et ultrices. Odio morbi quis commodo odio aenean sed adipiscing diam donec. Amet dictum sit amet justo donec enim diam vulputate. Aliquam ultrices sagittis orci a scelerisque purus semper eget. In nibh mauris cursus mattis molestie a iaculis at erat. Sit amet commodo nulla facilisi nullam vehicula ipsum. Interdum posuere lorem ipsum dolor sit amet consectetur. Mauris commodo quis imperdiet massa tincidunt nunc. Ornare massa eget egestas purus. Aliquam ultrices sagittis orci a scelerisque purus semper eget duis. Gravida rutrum quisque non tellus orci ac auctor. Risus viverra adipiscing at in. Dui faucibus in ornare quam viverra orci sagittis eu. Diam sollicitudin tempor id eu nisl nunc mi ipsum faucibus.</font></div>', '2021-07-20'),
(2, 2, 'He had decided to accept his fate of accepting his fate', 'THUMB_20210704143533.jpg', '<div style=\"text-align: justify; \">The leather jacked showed the scars of being his favorite for years. It wore those scars with pride, feeling that they enhanced his presence rather than diminishing it. The scars gave it character and had not overwhelmed to the point that it had become ratty. The jacket was in its prime and it knew it.</div><div style=\"text-align: justify; \">Dave watched as the forest burned up on the hill, only a few miles from her house. The car had been hastily packed and Marta was inside trying to round up the last of the pets. Dave went through his mental list of the most important papers and documents that they couldn\'t leave behind. He scolded himself for not having prepared these better in advance and hoped that he had remembered everything that was needed. He continued to wait for Marta to appear with the pets, but she still was nowhere to be seen.</div><div style=\"text-align: justify; \">Dave wasn\'t exactly sure how he had ended up in this predicament. He ran through all the events that had lead to this current situation and it still didn\'t make sense. He wanted to spend some time to try and make sense of it all, but he had higher priorities at the moment. The first was how to get out of his current situation of being naked in a tree with snow falling all around and no way for him to get down.</div>', '2021-07-20'),
(3, 2, 'When I cook spaghetti, I like to boil it a few minutes past al dente so the noodles are super slippery.', 'THUMB_20210704143958.jpg', '<div style=\"text-align: justify; \">Cake or pie? I can tell a lot about you by which one you pick. It may seem silly, but cake people and pie people are really different. I know which one I hope you are, but that\'s not for me to decide. So, what is it? Cake or pie?</div><div style=\"text-align: justify;\">The rain and wind abruptly stopped, but the sky still had the gray swirls of storms in the distance. Dave knew this feeling all too well. The calm before the storm. He only had a limited amount of time before all Hell broke loose, but he stopped to admire the calmness. Maybe it would be different this time, he thought, with the knowledge deep within that it wouldn\'t.</div><div style=\"text-align: justify; \">Hopes and dreams were dashed that day. It should have been expected, but it still came as a shock. The warning signs had been ignored in favor of the possibility, however remote, that it could actually happen. That possibility had grown from hope to an undeniable belief it must be destiny. That was until it wasn\'t and the hopes and dreams came crashing down.</div>', '2021-07-20');

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
(5, 'budi', '$2y$10$x7uzH8iipfGhHUeIs3tF8OKyPbtZm4Z84WfIBXJ57UvoMePjUY67O', 'warga'),
(6, 'hamis', '$2y$10$7TzCqijQQhbVGCHeRJ.wCOTU9Zu3Qmfl7b60N.8kY6yP1JNhq2zMi', 'warga'),
(8, 'khamil', '$2y$10$FxtGlw8uGRiEelinf5/c..fdm9JpWEew0E/RPKpddYYANUFFkwhT6', 'warga'),
(10, 'zainuri', '$2y$10$U08CGR1Q2EHm3RK7alLNfujxIvnp1CrWbUVrDdxGQLG92GKPlYRhi', 'kades'),
(11, 'huda', '$2y$10$T4lEOCYrmFVYCVqJTNJ1yeBHaO5R9iMOH/XGge/fe9FkVRK47d7RC', 'warga'),
(13, 'hubi', '$2y$10$2VkgC9vnq04gMo91Y2M4kepHke26czyFGO2ke6ngTyfOAKHqH9G6i', 'warga'),
(14, 'mida', '$2y$10$59yMHIhfqqXbEr5ehgCMb.ccSwAgP6XJFdHHdQuT86zWT7GNGRgiS', 'warga'),
(15, 'miho', '$2y$10$FbWaPryzgEPwRSDSsMsaueh3u9IbtPh9Q/QUU0xcZlNmty9p4rx2G', 'warga');

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
(4, 8, 'Khamil Ahmad', 'L', 'Pati', '089999888999'),
(5, 13, 'Hubi A', 'L', 'Kudus', '081234567890'),
(6, 14, 'Mida M', 'L', 'Kudus', '081234567890'),
(7, 15, 'Miho Akemichi', 'P', 'Kudus', '08977667773');

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
  MODIFY `pengaduan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `warga`
--
ALTER TABLE `warga`
  MODIFY `warga_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
