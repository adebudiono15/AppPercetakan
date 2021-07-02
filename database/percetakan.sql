-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Mar 2021 pada 20.37
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `percetakan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` bigint(20) DEFAULT NULL,
  `kategori_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode`, `nama`, `stok`, `kategori_id`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(5, 'DPB00001', 'Tes barang', 20001, '2', 1000, 2000, '2021-03-18 06:36:27', '2021-03-22 14:57:06'),
(7, 'DPB00002', 'barang 2', 90, '3', 3000, 4000, '2021-03-18 19:44:42', '2021-03-22 15:06:56'),
(8, 'BDP00003', 'tes', 3000, '3', 3000, 3000, '2021-03-22 15:27:06', '2021-03-22 15:30:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` bigint(20) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `kode`, `nama`, `alamat`, `telepon`, `email`, `contact_person`, `created_at`, `updated_at`) VALUES
(1, 'DPC00001', 'nama cstomer', 'alamat', 111, 'ade@gmail.com', 'CONTACT', '2021-03-18 07:39:20', '2021-03-18 09:44:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'KDP00001', 'Dus Besar', '2021-03-22 14:30:35', '2021-03-22 14:35:58'),
(3, 'KDP00002', 'Dus Kecil', '2021-03-22 14:34:25', '2021-03-22 14:36:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logistik`
--

CREATE TABLE `logistik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` bigint(20) NOT NULL,
  `kategori_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logistik`
--

INSERT INTO `logistik` (`id`, `kode`, `nama`, `stok`, `kategori_id`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(11, 'DPL00001', 'log 1', 101, '3', 3000, 3000, '2021-03-18 17:35:57', '2021-03-28 18:18:59'),
(12, 'DPL00002', 'log 2', 101, '2', 1000, 4000, '2021-03-18 17:36:06', '2021-03-28 18:18:59'),
(13, 'LDP00003', 'Tes logistik', 101, '3', 1000, 2000, '2021-03-22 17:51:15', '2021-03-28 18:18:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logistik_keluar`
--

CREATE TABLE `logistik_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logistik_keluar`
--

INSERT INTO `logistik_keluar` (`id`, `kode`, `customer_id`, `grand_total`, `tanggal`, `created_at`, `updated_at`) VALUES
(6, 'LK00001', '1', 6000, '2021-03-29', '2021-03-28 18:18:59', '2021-03-28 18:18:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logistik_keluar_line`
--

CREATE TABLE `logistik_keluar_line` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_keluar_id` bigint(20) NOT NULL,
  `nama_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logistik_keluar_line`
--

INSERT INTO `logistik_keluar_line` (`id`, `log_keluar_id`, `nama_id`, `qty`, `harga`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 6, '11', 1, 3000, 3000, '2021-03-28 18:18:59', '2021-03-28 18:18:59'),
(2, 6, '12', 1, 1000, 1000, '2021-03-28 18:18:59', '2021-03-28 18:18:59'),
(3, 6, '13', 1, 2000, 2000, '2021-03-28 18:18:59', '2021-03-28 18:18:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logistik_masuk`
--

CREATE TABLE `logistik_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logistik_masuk`
--

INSERT INTO `logistik_masuk` (`id`, `kode`, `supplier_id`, `grand_total`, `tanggal`, `created_at`, `updated_at`) VALUES
(8, 'LM00001', '2', 10000, '2021-03-23', '2021-03-22 19:28:26', '2021-03-22 19:28:26'),
(18, 'LM00002', '2', 5000, '2021-03-23', '2021-03-22 20:17:03', '2021-03-22 20:17:03'),
(19, 'LM00003', '2', 69000, '2021-03-23', '2021-03-22 20:17:36', '2021-03-22 20:17:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logistik_masuk_line`
--

CREATE TABLE `logistik_masuk_line` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_masuk_id` bigint(20) NOT NULL,
  `nama_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logistik_masuk_line`
--

INSERT INTO `logistik_masuk_line` (`id`, `log_masuk_id`, `nama_id`, `qty`, `harga`, `grand_total`, `created_at`, `updated_at`) VALUES
(5, 8, '12', 4, 1000, 4000, '2021-03-22 19:28:26', '2021-03-22 19:28:26'),
(6, 8, '13', 6, 1000, 6000, '2021-03-22 19:28:26', '2021-03-22 19:28:26'),
(20, 16, '11', 1, 3000, 3000, '2021-03-22 20:14:54', '2021-03-22 20:14:54'),
(21, 16, '12', 1, 1000, 1000, '2021-03-22 20:14:54', '2021-03-22 20:14:54'),
(22, 17, '11', 1, 3000, 3000, '2021-03-22 20:16:04', '2021-03-22 20:16:04'),
(23, 17, '12', 2, 1000, 2000, '2021-03-22 20:16:04', '2021-03-22 20:16:04'),
(24, 18, '11', 1, 3000, 3000, '2021-03-22 20:17:03', '2021-03-22 20:17:03'),
(25, 18, '12', 2, 1000, 2000, '2021-03-22 20:17:03', '2021-03-22 20:17:03'),
(26, 19, '11', 17, 3000, 51000, '2021-03-22 20:17:36', '2021-03-22 20:17:36'),
(27, 19, '12', 18, 1000, 18000, '2021-03-22 20:17:36', '2021-03-22 20:17:36');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_18_120650_create_barang_table', 2),
(5, '2021_03_18_140825_create_customer_table', 3),
(6, '2021_03_18_164958_create_supplier_table', 4),
(7, '2021_03_18_170311_create_logistik_table', 5),
(10, '2021_03_18_171746_create_logistik_masuk_table', 6),
(11, '2021_03_19_020939_create_logistik_keluar_table', 7),
(12, '2021_03_19_024754_create_po_table', 8),
(13, '2021_03_19_024806_create_po_line_table', 8),
(14, '2021_03_22_171043_create_kategori_table', 9),
(15, '2021_03_23_021116_create_logistik_masuk_line_table', 10),
(16, '2021_03_29_004929_create_logistik_keluar_line_table', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`id`, `kode`, `customer_id`, `grand_total`, `created_at`, `updated_at`) VALUES
(12, 'PO23032101', 1, 13000, '2021-03-22 18:31:58', '2021-03-22 18:31:58'),
(13, 'PO23032102', 1, 38000, '2021-03-22 18:45:38', '2021-03-22 18:45:38'),
(14, 'PO23032103', 1, 6000, '2021-03-22 19:04:36', '2021-03-22 19:04:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_line`
--

CREATE TABLE `po_line` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_id` bigint(20) NOT NULL,
  `nama_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` bigint(20) NOT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `po_line`
--

INSERT INTO `po_line` (`id`, `kode`, `po_id`, `nama_id`, `qty`, `harga`, `grand_total`, `status`, `created_at`, `updated_at`) VALUES
(15, 'PO23032101', 12, '5', 2, 2000, 4000, '1', '2021-03-22 18:31:58', '2021-03-22 18:31:58'),
(16, 'PO23032101', 12, '8', 3, 3000, 9000, '2', '2021-03-22 18:31:58', '2021-03-22 18:44:37'),
(17, 'PO23032102', 13, '8', 1, 30000, 30000, '1', '2021-03-22 18:45:38', '2021-03-22 18:45:38'),
(18, 'PO23032102', 13, '7', 2, 4000, 8000, '3', '2021-03-22 18:45:38', '2021-03-22 18:45:57'),
(19, 'PO23032103', 14, '5', 3, 2000, 6000, '1', '2021-03-22 19:04:36', '2021-03-22 19:04:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` bigint(20) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `kode`, `nama`, `alamat`, `telepon`, `email`, `contact_person`, `created_at`, `updated_at`) VALUES
(2, 'DPS00001', 'budi', 'alamat', 1, 'a@gmail.com', 'aa', '2021-03-18 09:58:21', '2021-03-18 09:58:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logistik`
--
ALTER TABLE `logistik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logistik_keluar`
--
ALTER TABLE `logistik_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logistik_keluar_line`
--
ALTER TABLE `logistik_keluar_line`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logistik_masuk`
--
ALTER TABLE `logistik_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logistik_masuk_line`
--
ALTER TABLE `logistik_masuk_line`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `po_line`
--
ALTER TABLE `po_line`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
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
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `logistik`
--
ALTER TABLE `logistik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `logistik_keluar`
--
ALTER TABLE `logistik_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `logistik_keluar_line`
--
ALTER TABLE `logistik_keluar_line`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `logistik_masuk`
--
ALTER TABLE `logistik_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `logistik_masuk_line`
--
ALTER TABLE `logistik_masuk_line`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `po`
--
ALTER TABLE `po`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `po_line`
--
ALTER TABLE `po_line`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
