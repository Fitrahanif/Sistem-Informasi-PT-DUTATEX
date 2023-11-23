-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 12:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt_dutatex`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` varchar(11) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL,
  `id_karyawan` varchar(11) NOT NULL,
  `id_jabatan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `keterangan`, `waktu`, `id_karyawan`, `id_jabatan`) VALUES
('01', 'masuk', '2023-07-10 00:00:00', '1022', '02'),
('02', 'masuk', '0000-00-00 00:00:00', '1022', '02');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'admin produksi'),
(2, 'admin_inventory', 'manage inventory'),
(3, 'admin_pemasaran', 'manage pemasaran'),
(4, 'admin_hr', 'manage human resource'),
(5, 'admin_supplier', 'manage supplier data\r\n'),
(6, 'pemilik', 'pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 3),
(3, 4),
(4, 5),
(5, 2),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(151, '::1', 'inventory@gmail.com', 3, '2023-07-16 08:35:27', 1),
(152, '::1', 'humanresources@gmail.com', 5, '2023-07-16 08:50:40', 1),
(153, '::1', 'supplier@ya.com', 2, '2023-07-16 08:57:27', 1),
(154, '::1', 'hanip', NULL, '2023-07-16 09:06:42', 0),
(155, '::1', 'abiljunior14@gmail.com', 1, '2023-07-16 09:06:51', 1),
(156, '::1', 'abiljunior14@gmail.com', 1, '2023-07-16 15:40:09', 1),
(157, '::1', 'inventory@gmail.com', 3, '2023-07-16 15:54:11', 1),
(158, '::1', 'pemasaran@gmail.com', 4, '2023-07-16 15:59:06', 1),
(159, '::1', 'pemasaran@gmail.com', 4, '2023-07-16 16:04:02', 1),
(160, '::1', 'inventory@gmail.com', 3, '2023-07-16 16:11:38', 1),
(161, '::1', 'abiljunior14@gmail.com', 1, '2023-07-16 16:12:01', 1),
(162, '::1', 'inventory@gmail.com', 3, '2023-07-16 16:13:43', 1),
(163, '::1', 'abiljunior14@gmail.com', 1, '2023-07-16 16:29:50', 1),
(164, '::1', 'pemasaran@gmail.com', 4, '2023-07-16 16:33:03', 1),
(165, '::1', 'inventory@gmail.com', 3, '2023-07-16 16:34:03', 1),
(166, '::1', 'pemasaran@gmail.com', 4, '2023-07-16 16:44:08', 1),
(167, '::1', 'inventory@gmail.com', 3, '2023-07-16 16:51:27', 1),
(168, '::1', 'pemasaran@gmail.com', 4, '2023-07-16 16:52:11', 1),
(169, '::1', 'abiljunior14@gmail.com', 1, '2023-07-16 16:52:57', 1),
(170, '::1', 'inventory@gmail.com', 3, '2023-07-16 16:53:20', 1),
(171, '::1', 'inventory@gmail.com', 3, '2023-07-16 16:53:47', 1),
(172, '::1', 'abiljunior14@gmail.com', 1, '2023-07-16 16:54:03', 1),
(173, '::1', 'abiljunior14@gmail.com', 1, '2023-07-16 23:44:23', 1),
(174, '::1', 'pemasaran@gmail.com', 4, '2023-07-16 23:45:43', 1),
(175, '::1', 'abiljunior14@gmail.com', 1, '2023-07-17 00:05:55', 1),
(176, '::1', 'pemasaran@gmail.com', 4, '2023-07-17 00:25:40', 1),
(177, '::1', 'abiljunior14@gmail.com', 1, '2023-07-17 00:47:21', 1),
(178, '::1', 'pemasaran@gmail.com', 4, '2023-07-17 00:49:37', 1),
(179, '::1', 'inventory@gmail.com', 3, '2023-07-17 02:26:07', 1),
(180, '::1', 'abiljunior14@gmail.com', 1, '2023-07-17 02:38:23', 1),
(181, '::1', 'inventory@gmail.com', 3, '2023-07-17 03:59:24', 1),
(182, '::1', 'abiljunior14@gmail.com', 1, '2023-07-17 06:10:39', 1),
(183, '::1', 'inventory@gmail.com', 3, '2023-07-17 06:21:23', 1),
(184, '::1', 'abiljunior14@gmail.com', 1, '2023-07-17 06:35:19', 1),
(185, '::1', 'inventory@gmail.com', 3, '2023-07-17 06:36:53', 1),
(186, '::1', 'abiljunior14@gmail.com', 1, '2023-07-17 06:39:03', 1),
(187, '::1', 'pemasaran@gmail.com', 4, '2023-07-17 06:40:31', 1),
(188, '::1', 'pemasaran@gmail.com', 4, '2023-07-17 06:43:50', 1),
(189, '::1', 'abiljunior14@gmail.com', 1, '2023-07-17 06:54:30', 1),
(190, '::1', 'persediaan', NULL, '2023-07-17 06:55:27', 0),
(191, '::1', 'pemasaran', NULL, '2023-07-17 06:55:36', 0),
(192, '::1', 'inventory@gmail.com', 3, '2023-07-17 06:55:54', 1),
(193, '::1', 'pemasaran@gmail.com', 4, '2023-07-17 06:57:02', 1),
(194, '::1', 'abiljunior14@gmail.com', 1, '2023-07-17 06:57:56', 1),
(195, '::1', 'inventory@gmail.com', 3, '2023-07-17 07:03:24', 1),
(196, '::1', 'pemasaran@gmail.com', 4, '2023-07-17 07:30:56', 1),
(197, '::1', 'supplier@ya.com', 2, '2023-07-17 07:36:20', 1),
(198, '::1', 'inventory@gmail.com', 3, '2023-07-17 07:36:35', 1),
(199, '::1', 'abiljunior14@gmail.com', 1, '2023-07-17 07:37:14', 1),
(200, '::1', 'inventory@gmail.com', 3, '2023-07-17 07:38:14', 1),
(201, '::1', 'abiljunior14@gmail.com', 1, '2023-07-17 07:38:42', 1),
(202, '::1', 'pemasaran@gmail.com', 4, '2023-07-17 09:44:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
  `harga` int(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `satuan` enum('Kodi','Lusin','Gross','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `harga`, `jumlah`, `satuan`) VALUES
('M01', 'Sarung Batik', 85000, 100, 'Lusin'),
('M02', 'Sarung Motif', 85000, 100, 'Lusin'),
('M03', 'Sarung Corak', 75000, 100, 'Lusin'),
('M04', 'sarung polkadot', 70000, 100, 'Lusin');

-- --------------------------------------------------------

--
-- Table structure for table `barang_terjual`
--

CREATE TABLE `barang_terjual` (
  `kd_barang` varchar(30) NOT NULL,
  `harga` int(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_terjual`
--

INSERT INTO `barang_terjual` (`kd_barang`, `harga`, `jumlah`, `id_customer`) VALUES
('M01', 85000, '50', 10);

--
-- Triggers `barang_terjual`
--
DELIMITER $$
CREATE TRIGGER `update_data_terjual_di_persediaan` BEFORE INSERT ON `barang_terjual` FOR EACH ROW BEGIN
UPDATE `data_persediaan` SET `jml_barang`=data_persediaan.jml_barang - new.jumlah WHERE data_persediaan.kd_barang=new.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(30) NOT NULL,
  `kd_barang` varchar(35) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_customer`
--

CREATE TABLE `data_customer` (
  `nm_customer` varchar(25) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
  `jml_beli` int(50) NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_customer`
--

INSERT INTO `data_customer` (`nm_customer`, `jk`, `no_hp`, `alamat`, `nama_barang`, `jml_beli`, `id_customer`) VALUES
('vigo', 'Laki-Laki', '085713009069', 'Pekalongan', 'Sarung Batik', 50, 10);

-- --------------------------------------------------------

--
-- Table structure for table `data_laporan`
--

CREATE TABLE `data_laporan` (
  `nama_barang` varchar(50) NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `bulan_produksi` char(20) NOT NULL,
  `barang_jadi` char(20) NOT NULL,
  `barang_rusak` char(20) NOT NULL,
  `biaya_produksi` varchar(30) NOT NULL,
  `pendapatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_pemasok`
--

CREATE TABLE `data_pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `pemasok` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pemasok`
--

INSERT INTO `data_pemasok` (`id_pemasok`, `pemasok`, `alamat`, `no_hp`, `email`) VALUES
(2, 'PT DUPATEX JAYA', 'JL. Diponegoro gg 2 ', '086435654312', 'dupatex@gmail.com'),
(8, 'DUPANTEX', 'JL. Diponegoro', '098798798798', 'dupantex@gmail.com'),
(9, 'Dutetex', 'PASEKARAN, RT/RW 002001, Kel/Desa PASEKARAN, Kecamatan 0ATANO', '085701207570', 'dutatex@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `data_pembelian`
--

CREATE TABLE `data_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `nama_barang` varchar(80) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pembelian`
--

INSERT INTO `data_pembelian` (`id_pembelian`, `id_pemasok`, `nama_barang`, `jumlah`, `tgl_masuk`, `harga_satuan`, `total_harga`) VALUES
(9, 8, 'KOKO', 20, '2023-07-12', 10000, 2000000),
(10, 9, 'Celana Dalam', 132, '2023-07-16', 1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `data_persediaan`
--

CREATE TABLE `data_persediaan` (
  `id` int(11) NOT NULL,
  `kd_barang` varchar(30) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `jml_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_persediaan`
--

INSERT INTO `data_persediaan` (`id`, `kd_barang`, `tanggal`, `jml_barang`) VALUES
(3, 'M01', '2023-07-17', '50');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_produksi`
--

CREATE TABLE `hasil_produksi` (
  `id` int(11) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `kondisi` enum('Baik','Rusak') NOT NULL,
  `hasil_produksi` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kd_barang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_produksi`
--

INSERT INTO `hasil_produksi` (`id`, `tgl_produksi`, `kondisi`, `hasil_produksi`, `keterangan`, `kd_barang`) VALUES
(23, '2023-07-17', 'Baik', 100, 'Baik sekali', 'M01');

--
-- Triggers `hasil_produksi`
--
DELIMITER $$
CREATE TRIGGER `update_data_persediaan` AFTER INSERT ON `hasil_produksi` FOR EACH ROW BEGIN
UPDATE `data_persediaan` SET `jml_barang`=data_persediaan.jml_barang + new.hasil_produksi WHERE data_persediaan.kd_barang=new.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `kd_barang` varchar(30) NOT NULL,
  `brg_mentah` varchar(30) NOT NULL,
  `brg_jadi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `gaji` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gaji`) VALUES
('01', 'kepala operasional', '3500000'),
('02', 'karyawan', '2000000'),
('03', 'quality control', '3000000');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_produksi`
--

CREATE TABLE `jadwal_produksi` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `jml_produksi` int(50) NOT NULL,
  `kd_barang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_produksi`
--

INSERT INTO `jadwal_produksi` (`id`, `tgl`, `waktu`, `jml_produksi`, `kd_barang`) VALUES
(21, '2023-07-17', '08.00-16.00', 400, 'M01');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `id_jabatan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `alamat`, `kelamin`, `id_jabatan`) VALUES
('1022', 'saipul', 'Batang', 'laki laki', '02'),
('94849', 'Hanif', 'Batang', 'Laki-Laki', '');

-- --------------------------------------------------------

--
-- Table structure for table `laporan inventory`
--

CREATE TABLE `laporan inventory` (
  `id_laporan` varchar(30) NOT NULL,
  `id_suppliyer` varchar(30) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
  `kd_barang` varchar(30) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan pemasaran`
--

CREATE TABLE `laporan pemasaran` (
  `id_laporan` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(35) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
  `jumlah` int(35) NOT NULL,
  `kd_barang` varchar(30) NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan produksi`
--

CREATE TABLE `laporan produksi` (
  `id_laporan` varchar(30) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
  `jumlah` int(35) NOT NULL,
  `kd_barang` varchar(30) NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id_user` varchar(30) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1680770027, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemasaran`
--

CREATE TABLE `pemasaran` (
  `kd_barang` varchar(30) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `kd_barang` varchar(30) NOT NULL,
  `tgl_produksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliyer`
--

CREATE TABLE `suppliyer` (
  `id_suppliyer` varchar(30) NOT NULL,
  `kd_barang` varchar(30) NOT NULL,
  `tgl_msk` date NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'abiljunior14@gmail.com', 'hanip', '$2y$10$VgBq2FVronCRsw1RdTI2wOrEm0eDb.mtWZcEzbYTZQdGpKETBzV7y', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-04-06 08:37:01', '2023-04-06 08:37:01', NULL),
(2, 'supplier@ya.com', 'supplier', '$2y$10$LLGW9NgbpAloumWT5tlnFe/5CeSmH4JCSITvxzrBOQ8oHurDNbwI6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-07 11:01:09', '2023-07-07 11:01:09', NULL),
(3, 'inventory@gmail.com', 'inventory', '$2y$10$DTY3uAhxtBwFAZPGqAYnuuLGGoJGRDvNk4/imi7W7f8JK8mewDMb6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-07 11:32:53', '2023-07-07 11:32:53', NULL),
(4, 'pemasaran@gmail.com', 'pemasaran', '$2y$10$/COAZt0XJa2HQdvz8DBJYu/u8YLmAGuinjYGXzgoP2XICgt4IRpl2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-07 11:34:05', '2023-07-07 11:34:05', NULL),
(5, 'humanresources@gmail.com', 'human resources', '$2y$10$H.l4jkCKM.Q4KTLN8N4wGeTfTWyAZs/cIf4JHyDGxSshHpYxIPsYW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-07 11:49:28', '2023-07-07 11:49:28', NULL),
(6, 'pemilik@gmail.com', 'pemilik', '$2y$10$KpVnlztqRWWcROsyyWS2EeCQE0GsJguMzNL0HiYGx5nMXPudQscMO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-10 12:44:37', '2023-07-10 12:44:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `barang_terjual`
--
ALTER TABLE `barang_terjual`
  ADD KEY `barang_terjual_ibfk_1` (`id_customer`),
  ADD KEY `barang_terjual_ibfk_2` (`kd_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `data_customer`
--
ALTER TABLE `data_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `data_laporan`
--
ALTER TABLE `data_laporan`
  ADD PRIMARY KEY (`nama_barang`);

--
-- Indexes for table `data_pemasok`
--
ALTER TABLE `data_pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indexes for table `data_pembelian`
--
ALTER TABLE `data_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pemasok` (`id_pemasok`);

--
-- Indexes for table `data_persediaan`
--
ALTER TABLE `data_persediaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `hasil_produksi`
--
ALTER TABLE `hasil_produksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_produksi_ibfk_1` (`kd_barang`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jadwal_produksi`
--
ALTER TABLE `jadwal_produksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `laporan inventory`
--
ALTER TABLE `laporan inventory`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `id_supplayer` (`id_suppliyer`);

--
-- Indexes for table `laporan pemasaran`
--
ALTER TABLE `laporan pemasaran`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `Id_user` (`Id_user`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasaran`
--
ALTER TABLE `pemasaran`
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `suppliyer`
--
ALTER TABLE `suppliyer`
  ADD PRIMARY KEY (`id_suppliyer`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_customer`
--
ALTER TABLE `data_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_pemasok`
--
ALTER TABLE `data_pemasok`
  MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_pembelian`
--
ALTER TABLE `data_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_persediaan`
--
ALTER TABLE `data_persediaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hasil_produksi`
--
ALTER TABLE `hasil_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jadwal_produksi`
--
ALTER TABLE `jadwal_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `barang_terjual`
--
ALTER TABLE `barang_terjual`
  ADD CONSTRAINT `barang_terjual_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `data_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_terjual_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`);

--
-- Constraints for table `data_pembelian`
--
ALTER TABLE `data_pembelian`
  ADD CONSTRAINT `fk_pemasok` FOREIGN KEY (`id_pemasok`) REFERENCES `data_pemasok` (`id_pemasok`);

--
-- Constraints for table `data_persediaan`
--
ALTER TABLE `data_persediaan`
  ADD CONSTRAINT `data_persediaan_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_produksi`
--
ALTER TABLE `hasil_produksi`
  ADD CONSTRAINT `hasil_produksi_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`);

--
-- Constraints for table `jadwal_produksi`
--
ALTER TABLE `jadwal_produksi`
  ADD CONSTRAINT `jadwal_produksi_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan inventory`
--
ALTER TABLE `laporan inventory`
  ADD CONSTRAINT `laporan inventory_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`),
  ADD CONSTRAINT `laporan inventory_ibfk_2` FOREIGN KEY (`id_suppliyer`) REFERENCES `suppliyer` (`id_suppliyer`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `admin` (`id_user`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`nama`) REFERENCES `roles` (`nama`);

--
-- Constraints for table `pemasaran`
--
ALTER TABLE `pemasaran`
  ADD CONSTRAINT `pemasaran_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`);

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`);

--
-- Constraints for table `suppliyer`
--
ALTER TABLE `suppliyer`
  ADD CONSTRAINT `suppliyer_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
