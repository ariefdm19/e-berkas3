-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Sep 2023 pada 10.05
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-berkas2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agunan_masuks`
--

CREATE TABLE `agunan_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `nama_debitur` varchar(255) NOT NULL,
  `upload_berkas` varchar(255) DEFAULT NULL,
  `status_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agunan_masuks`
--

INSERT INTO `agunan_masuks` (`id`, `no_rekening`, `nama_debitur`, `upload_berkas`, `status_id`, `created_at`, `updated_at`) VALUES
(26, '100000', 'KAKA', NULL, 'Update Ulang', '2023-09-18 00:55:27', '2023-09-18 00:55:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agunan_pinjams`
--

CREATE TABLE `agunan_pinjams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `nama_debitur` varchar(255) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `keperluan` text DEFAULT NULL,
  `status_id` text NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Trigger `agunan_pinjams`
--
DELIMITER $$
CREATE TRIGGER `delete_agunan_masuks_status` AFTER DELETE ON `agunan_pinjams` FOR EACH ROW BEGIN
  UPDATE agunan_masuks
  SET status_id = 'Update Ulang'
  WHERE no_rekening = OLD.no_rekening;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_agunan_masuks_status` AFTER INSERT ON `agunan_pinjams` FOR EACH ROW BEGIN
  UPDATE agunan_masuks
  SET status_id = NEW.status_id
  WHERE no_rekening = NEW.no_rekening;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_agunan_masuks_status` AFTER UPDATE ON `agunan_pinjams` FOR EACH ROW BEGIN
  UPDATE agunan_masuks
  SET status_id = NEW.status_id
  WHERE no_rekening = NEW.no_rekening;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_lemaris`
--

CREATE TABLE `berkas_lemaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_lemari` varchar(255) NOT NULL,
  `nama_lemari` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berkas_lemaris`
--

INSERT INTO `berkas_lemaris` (`id`, `kode_lemari`, `nama_lemari`, `created_at`, `updated_at`) VALUES
(9, '02', 'Kredit Berjangka', '2023-09-11 06:15:23', '2023-09-11 06:15:23'),
(10, '03', 'Kredit Seuri', '2023-09-11 06:15:32', '2023-09-11 06:15:32'),
(11, '05', 'Kredit Back TO Back', '2023-09-11 06:15:40', '2023-09-11 06:15:40'),
(12, '06', 'Kredit Karyawan', '2023-09-11 06:15:49', '2023-09-11 06:15:49'),
(13, '08', 'Kredit Kreatif', '2023-09-11 06:15:57', '2023-09-11 06:15:57'),
(14, '09', 'Kredit Karisma', '2023-09-11 06:16:03', '2023-09-11 06:16:03'),
(15, '16', 'Kredit KPR Sejahtera', '2023-09-11 06:16:10', '2023-09-11 06:16:10'),
(16, '17', 'Kredit Perdagangan Sejahtera', '2023-09-11 06:16:19', '2023-09-11 06:16:19'),
(17, '18', 'Kredit Angkutan Sejahtera', '2023-09-11 06:16:25', '2023-09-11 06:16:25'),
(18, '19', 'Kredit Tani Sejahtera ', '2023-09-11 06:16:32', '2023-09-11 06:16:32'),
(19, '20', 'Kredit Multiguna Sejahtera', '2023-09-11 06:16:38', '2023-09-11 06:16:38'),
(20, '21', 'Kredit Pemilikan Emas', '2023-09-11 06:16:47', '2023-09-11 06:16:47'),
(21, '22', 'Kredit Fintech', '2023-09-11 06:16:53', '2023-09-11 06:16:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_masuks`
--

CREATE TABLE `berkas_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CIF` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `nama_debitur` varchar(255) DEFAULT NULL,
  `kode_lemari` varchar(255) DEFAULT NULL,
  `upload_berkas` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berkas_masuks`
--

INSERT INTO `berkas_masuks` (`id`, `CIF`, `no_rekening`, `nama_debitur`, `kode_lemari`, `upload_berkas`, `status`, `created_at`, `updated_at`) VALUES
(63, '2352735325', '190900', 'Dwiky', '14', NULL, 'dipinjam', '2023-09-18 00:18:52', '2023-09-18 00:18:52'),
(64, '235252356', '100000', 'KAKA', '17', NULL, 'dilemari', '2023-09-18 00:19:11', '2023-09-18 00:19:11'),
(65, '464634536', '98989898', 'LINA MARLIANA', '17', NULL, 'dilemari', '2023-09-18 00:19:29', '2023-09-18 00:19:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_pinjams`
--

CREATE TABLE `berkas_pinjams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `nama_debitur` varchar(255) DEFAULT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `jabatan_peminjam` varchar(255) NOT NULL,
  `tanggal_pinjam` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan_digunakan` text NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berkas_pinjams`
--

INSERT INTO `berkas_pinjams` (`id`, `no_rekening`, `nama_debitur`, `nama_peminjam`, `jabatan_peminjam`, `tanggal_pinjam`, `keterangan_digunakan`, `tanggal_kembali`, `status`, `created_at`, `updated_at`) VALUES
(52, '190900', NULL, 'AGUS', 'LEGAL', '2023-09-17 17:00:00', 'pengecekan ', NULL, 'dipinjam', '2023-09-18 00:20:22', '2023-09-18 00:20:22');

--
-- Trigger `berkas_pinjams`
--
DELIMITER $$
CREATE TRIGGER `update_berkas_masuks_status` AFTER INSERT ON `berkas_pinjams` FOR EACH ROW BEGIN
  UPDATE berkas_masuks
  SET status = NEW.status
  WHERE no_rekening = NEW.no_rekening;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_berkas_masuks_status_edit` AFTER UPDATE ON `berkas_pinjams` FOR EACH ROW BEGIN
  UPDATE berkas_masuks
  SET status = NEW.status
  WHERE no_rekening = NEW.no_rekening;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_berkas_masuks_status_on_delete` AFTER DELETE ON `berkas_pinjams` FOR EACH ROW BEGIN
  UPDATE berkas_masuks
  SET status = 'dilemari'
  WHERE no_rekening = OLD.no_rekening;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(7, 'App\\Models\\BerkasMasuk', 47, '9da9f8da-4dd4-4eb6-bf25-3fe0114566bf', 'default', 'Merah Modern Berita Terkini Youtube Thumbnail', 'J73u88fquYVhO4fDB4WPD70J5VBsyp-metaTWVyYWggTW9kZXJuIEJlcml0YSBUZXJraW5pIFlvdXR1YmUgVGh1bWJuYWlsLnBuZw==-.png', 'image/png', 'public', 'public', 1017954, '[]', '[]', '[]', '[]', 1, '2023-09-11 20:19:36', '2023-09-11 20:19:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_09_06_070100_create_berkas_lemaris_table', 1),
(12, '2023_09_06_070116_create_berkas_masuks_table', 1),
(13, '2023_09_07_080414_create_media_table', 2),
(14, '2023_09_09_070305_tambah_kolom_status_ke_berkas_masuks', 3),
(15, '2023_09_09_071950_create_berkas_pinjams_table', 4),
(16, '2023_09_09_084455_tambah_kolom_tanggal_kembali__ke_berkas_pinjams', 5),
(17, '2023_09_12_043750_create_statusagunan_table', 6),
(18, '2023_09_12_044446_create_statusagunans_table', 7),
(19, '2023_09_12_044446_create_status_agunans_table', 8),
(20, '2023_09_12_065204_create_agunan_masuks_table', 9),
(21, '2023_09_12_121013_create_agunan_pinjams_table', 10),
(22, '2023_09_12_121549_create_agunan_pinjams_table', 11),
(23, '2023_09_12_133633_create_pengembalian_agunans_table', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian_agunans`
--

CREATE TABLE `pengembalian_agunans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `nama_debitur` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jaminan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `upload_bukti` varchar(255) DEFAULT NULL,
  `status_id` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengembalian_agunans`
--

INSERT INTO `pengembalian_agunans` (`id`, `no_rekening`, `nama_debitur`, `tanggal`, `jaminan`, `alamat`, `no_hp`, `upload_bukti`, `status_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, '190900', 'Dwiky', '2023-09-18', 'hhhh', 'hh', 'hh', 'hh', 'sudah dikembalikan ke debitur', 'hh', '2023-09-18 00:56:39', '2023-09-18 00:56:39');

--
-- Trigger `pengembalian_agunans`
--
DELIMITER $$
CREATE TRIGGER `tr_delete_agunanantartabel` AFTER INSERT ON `pengembalian_agunans` FOR EACH ROW BEGIN
    DECLARE noRekening INT;
    SET noRekening = NEW.no_rekening;
    
    -- Hapus data dari tabel agunan_pinjam dengan nomor kredit yang sesuai
    DELETE FROM agunan_pinjams WHERE no_rekening = noRekening;
    
    -- Hapus data dari tabel agunan_masuk dengan nomor kredit yang sesuai
    DELETE FROM agunan_masuks WHERE no_rekening = noRekening;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_agunans`
--

CREATE TABLE `status_agunans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_agunans`
--

INSERT INTO `status_agunans` (`id`, `nama_status`, `created_at`, `updated_at`) VALUES
(1, 'Brankas Khasanah', '2023-09-11 21:57:22', '2023-09-11 23:20:44'),
(2, 'Brankas SBD', '2023-09-11 23:20:56', '2023-09-11 23:20:56'),
(3, 'Di Pinjam', '2023-09-11 23:21:09', '2023-09-11 23:21:09'),
(4, 'Di Kembalikan Ke Petugas', '2023-09-11 23:21:26', '2023-09-11 23:21:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'arief', 'arief@gmail.com', NULL, '$2y$10$kYTTcVMgdOYZ8MifepacVemfOMsQulS2AgXenLYSL.U2diPEEtbLe', NULL, '2023-09-06 20:40:55', '2023-09-06 20:40:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agunan_masuks`
--
ALTER TABLE `agunan_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `agunan_pinjams`
--
ALTER TABLE `agunan_pinjams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berkas_lemaris`
--
ALTER TABLE `berkas_lemaris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berkas_masuks`
--
ALTER TABLE `berkas_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berkas_pinjams`
--
ALTER TABLE `berkas_pinjams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengembalian_agunans`
--
ALTER TABLE `pengembalian_agunans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `status_agunans`
--
ALTER TABLE `status_agunans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agunan_masuks`
--
ALTER TABLE `agunan_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `agunan_pinjams`
--
ALTER TABLE `agunan_pinjams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `berkas_lemaris`
--
ALTER TABLE `berkas_lemaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `berkas_masuks`
--
ALTER TABLE `berkas_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `berkas_pinjams`
--
ALTER TABLE `berkas_pinjams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pengembalian_agunans`
--
ALTER TABLE `pengembalian_agunans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `status_agunans`
--
ALTER TABLE `status_agunans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
