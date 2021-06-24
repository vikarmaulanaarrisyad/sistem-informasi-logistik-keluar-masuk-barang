-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 08:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Stand-in structure for view `laporan`
-- (See below for the actual view)
--
CREATE TABLE `laporan` (
`kodebarang` varchar(15)
,`idbarang` int(11)
,`namabarang` varchar(100)
,`stockbarang` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`jumlahmasuk` decimal(32,0)
,`jumlahkeluar` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `idbarang` int(11) NOT NULL,
  `kodebarang` varchar(15) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `stockbarang` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`idbarang`, `kodebarang`, `namabarang`, `stockbarang`, `created_at`, `updated_at`) VALUES
(11, 'A001', 'SAMSUNG 2', 7, '2021-06-22 23:25:28', '2021-06-22 23:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluar`
--

CREATE TABLE `tb_keluar` (
  `idkeluar` int(11) NOT NULL,
  `kodebarang` varchar(15) NOT NULL,
  `qtykeluar` int(11) NOT NULL,
  `tglkeluar` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `tb_keluar`
--
DELIMITER $$
CREATE TRIGGER `stockkeluar` AFTER INSERT ON `tb_keluar` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stockbarang = stockbarang - NEW.qtykeluar
    WHERE kodebarang = NEW.kodebarang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_masuk`
--

CREATE TABLE `tb_masuk` (
  `idmasuk` int(11) NOT NULL,
  `kodebarang` varchar(15) NOT NULL,
  `qtymasuk` int(11) NOT NULL,
  `tglmasuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_masuk`
--

INSERT INTO `tb_masuk` (`idmasuk`, `kodebarang`, `qtymasuk`, `tglmasuk`, `created_at`, `updated_at`) VALUES
(11, 'A001', 4, '2021-06-23', '2021-06-22 23:26:23', '2021-06-22 23:26:23');

--
-- Triggers `tb_masuk`
--
DELIMITER $$
CREATE TRIGGER `stockmasuk` AFTER INSERT ON `tb_masuk` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stockbarang = stockbarang + NEW.qtymasuk
    WHERE kodebarang = NEW.kodebarang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalkeluar`
-- (See below for the actual view)
--
CREATE TABLE `totalkeluar` (
`kodebarang` varchar(15)
,`jumlahkeluar` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalmasuk`
-- (See below for the actual view)
--
CREATE TABLE `totalmasuk` (
`kodebarang` varchar(15)
,`jumlahmasuk` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_masuk`
-- (See below for the actual view)
--
CREATE TABLE `v_masuk` (
`kodebarang` varchar(15)
,`qtymasuk` int(11)
,`tglmasuk` date
);

-- --------------------------------------------------------

--
-- Structure for view `laporan`
--
DROP TABLE IF EXISTS `laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan`  AS SELECT `tb_barang`.`kodebarang` AS `kodebarang`, `tb_barang`.`idbarang` AS `idbarang`, `tb_barang`.`namabarang` AS `namabarang`, `tb_barang`.`stockbarang` AS `stockbarang`, `tb_barang`.`created_at` AS `created_at`, `tb_barang`.`updated_at` AS `updated_at`, `totalmasuk`.`jumlahmasuk` AS `jumlahmasuk`, `totalkeluar`.`jumlahkeluar` AS `jumlahkeluar` FROM ((`tb_barang` left join `totalmasuk` on(`tb_barang`.`kodebarang` = `totalmasuk`.`kodebarang`)) left join `totalkeluar` on(`tb_barang`.`kodebarang` = `totalkeluar`.`kodebarang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `totalkeluar`
--
DROP TABLE IF EXISTS `totalkeluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalkeluar`  AS SELECT `tb_keluar`.`kodebarang` AS `kodebarang`, sum(`tb_keluar`.`qtykeluar`) AS `jumlahkeluar` FROM `tb_keluar` GROUP BY `tb_keluar`.`kodebarang` ;

-- --------------------------------------------------------

--
-- Structure for view `totalmasuk`
--
DROP TABLE IF EXISTS `totalmasuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalmasuk`  AS SELECT `tb_masuk`.`kodebarang` AS `kodebarang`, sum(`tb_masuk`.`qtymasuk`) AS `jumlahmasuk` FROM `tb_masuk` GROUP BY `tb_masuk`.`kodebarang` ;

-- --------------------------------------------------------

--
-- Structure for view `v_masuk`
--
DROP TABLE IF EXISTS `v_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_masuk`  AS SELECT `tb_masuk`.`kodebarang` AS `kodebarang`, `tb_masuk`.`qtymasuk` AS `qtymasuk`, `tb_masuk`.`tglmasuk` AS `tglmasuk` FROM (`tb_masuk` left join `tb_barang` on(`tb_masuk`.`kodebarang` = `tb_barang`.`kodebarang`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD UNIQUE KEY `kodebarang` (`kodebarang`);

--
-- Indexes for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD PRIMARY KEY (`idkeluar`),
  ADD KEY `kodebarang` (`kodebarang`);

--
-- Indexes for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`idmasuk`),
  ADD KEY `kodebarang` (`kodebarang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD CONSTRAINT `tb_keluar_ibfk_1` FOREIGN KEY (`kodebarang`) REFERENCES `tb_barang` (`kodebarang`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD CONSTRAINT `tb_masuk_ibfk_1` FOREIGN KEY (`kodebarang`) REFERENCES `tb_barang` (`kodebarang`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
