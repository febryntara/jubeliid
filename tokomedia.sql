-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql303.byethost11.com
-- Waktu pembuatan: 19 Jan 2022 pada 08.19
-- Versi server: 10.3.27-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b11_30613512_tokomedia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `from_uid` int(11) NOT NULL,
  `to_uid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `proof` varchar(100) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `from_uid`, `to_uid`, `amount`, `payment_status`, `proof`, `payment_date`) VALUES
(1, 1, 21, 18, 2675000, 'pembayaran dikonfirmasi', '61c923a8237aa.png', '2022-01-16 11:44:29'),
(2, 2, 21, 18, 105000, 'pembayaran dikonfirmasi', '61caae86e4a7b.png', '2022-01-16 11:44:29'),
(3, 3, 21, 17, 378000, 'pembayaran dikonfirmasi', '61d1acf521eb6.jpg', '2022-01-16 11:44:29'),
(4, 5, 17, 18, 80000, 'menunggu konfirmasi pembayaran', '61d1b5cebc934.jpg', '2022-01-16 11:44:29'),
(5, 6, 21, 18, 100000, 'pembayaran dikonfirmasi', '61d540ba9dbd1.jpg', '2022-01-16 11:44:29'),
(6, 8, 22, 17, 243000, 'menunggu konfirmasi pembayaran', '61e2514a17c00.jpeg', '2022-01-16 11:44:29'),
(7, 8, 22, 17, 243000, 'menunggu konfirmasi pembayaran', '61e2514a17c00.jpeg', '2022-01-16 11:44:29'),
(8, 8, 22, 17, 243000, 'menunggu konfirmasi pembayaran', '61e252160da48.jpeg', '2022-01-16 11:44:29'),
(9, 12, 23, 17, 50000, 'menunggu konfirmasi pembayaran', '61e255217fc5d.jpg', '2022-01-16 11:44:29'),
(10, 14, 21, 17, 5300000, 'menunggu konfirmasi pembayaran', '61e2648e5a16d.jpg', '2022-01-16 11:44:29'),
(11, 15, 21, 17, 6872000, 'pembayaran diterima', '61e40a7e428dc.jpg', '2022-01-16 12:07:56'),
(12, 17, 24, 18, 5000, 'pembayaran diterima', '61e65b0845751.jpg', '2022-01-18 06:15:36'),
(13, 16, 24, 17, 100000, 'pembayaran diterima', '61e65b6e5e002.jpg', '2022-01-18 06:17:52'),
(14, 26, 22, 18, 8000, 'pembayaran diterima', '61e7dab159f99.jpg', '2022-01-19 09:32:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT 0,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_price`, `category`, `stok`, `user_id`, `gambar`, `sold`, `deskripsi`) VALUES
(1, 'PD_61be999042f70', 'Sakura Blouse', 89000, 'fashion', 0, 17, '61be999042f79.jpg', 25, 'tidak ada deskripsi'),
(2, 'PD_61be99d80fed4', 'Kemeja Wanita', 65000, 'fashion', 0, 17, '61be99d80fee0.jpg', 50, 'kemeja kekinian'),
(3, 'PD_61be9a06d405f', 'Cardigan Rajut', 45000, 'fashion', 0, 17, '61be9a06d406b.jpg', 35, 'tidak ada deskripsi'),
(4, 'PD_61be9a41daf65', 'Atasan Crop', 50000, 'fashion', 50, 17, '61be9a41daf6f.jpg', 86, 'tidak ada deskripsi'),
(5, 'PD_61be9a722c226', 'Casual Blouse', 90000, 'fashion', 20, 17, '61be9a722c235.jpg', 0, 'tidak ada deskripsi'),
(6, 'PD_61be9aa355f26', 'Kulot Rayon', 60000, 'fashion', 30, 17, '61be9aa355f31.jpg', 0, 'tidak ada deskripsi'),
(7, 'PD_61be9b0378567', 'Boyfriend Jeans Wanita', 105000, 'fashion', 30, 17, '61be9b0378574.jpg', 0, 'tidak ada deskripsi'),
(8, 'PD_61be9b3982327', 'Kulot Bahan', 75000, 'fashion', 12, 17, '61be9b3982332.jpg', 8, 'tidak ada deskripsi'),
(9, 'PD_61be9b6b983ef', 'Jogger Pants Wanita', 100000, 'fashion', 29, 17, '61be9b6b983fc.jpg', 1, 'tidak ada deskripsi'),
(10, 'PD_61be9b961a4e4', 'Rok Rumbai', 80000, 'fashion', 20, 17, '61be9b961a4ef.jpg', 40, 'tidak ada deskripsi'),
(11, 'PD_61be9c22e97c2', 'Hoodie Pria', 75000, 'fashion', 25, 17, '61be9c22e97cf.jpg', 0, 'tidak ada deskripsi'),
(12, 'PD_61be9c4c02ee9', 'Crewneck ', 95000, 'fashion', 30, 17, '61be9c4c02ef3.jpg', 0, 'tidak ada deskripsi'),
(13, 'PD_61be9ca8b2861', 'Kaos Putih Pria', 50000, 'fashion', 30, 17, '61be9ca8b288c.jpg', 0, 'tidak ada deskripsi'),
(14, 'PD_61be9cd26b677', 'Kaos Hitam Pria', 50000, 'fashion', 30, 17, '61be9cd26b681.jpg', 0, 'tidak ada deskripsi'),
(15, 'PD_61be9cfb07f6c', 'Kemeja Pria', 60000, 'fashion', 25, 17, '61be9cfb07f76.jpg', 0, 'tidak ada deskripsi'),
(16, 'PD_61be9d29aa841', 'Jogger Pants Pria', 95000, 'fashion', 35, 17, '61be9d29aa84b.jpg', 0, 'tidak ada deskripsi'),
(17, 'PD_61be9d51e29b4', 'Kargo Pants', 85000, 'fashion', 30, 17, '61be9d51e29be.jpg', 0, 'tidak ada deskripsi'),
(18, 'PD_61be9d8e22bac', 'Jeans Pria', 110000, 'fashion', 30, 17, '61be9d8e22bbd.jpg', 0, 'tidak ada deskripsi'),
(19, 'PD_61be9dc2c06e4', 'Celana Pendek Jeans Pria', 95000, 'fashion', 20, 17, '61be9dc2c06ef.jpg', 0, 'tidak ada deskripsi'),
(20, 'PD_61be9dedc185d', 'Celana Pendek Pria', 65000, 'fashion', 25, 17, '61be9dedc186a.jpg', 0, 'tidak ada deskripsi'),
(21, 'PD_61beb0191df51', 'Gunting Baja', 50000, 'fashion', 1, 18, '61beb0191df5c.jpg', 10, 'Gunting untuk memotong baja ringan'),
(22, 'PD_61beb0711c3fc', 'Gergaji Besi Kecil', 35000, 'perkakas', 10, 18, '61beb0711c406.jpg', 0, 'Gergaji untuk memotong pipa'),
(23, 'PD_61beb09a7500d', 'Gergaji Besi', 40000, 'perkakas', 10, 18, '61beb09a7501e.jpg', 0, 'Gergaji untuk memotong kayu'),
(24, 'PD_61beb0c9e0780', 'Palu', 10000, 'perkakas', 10, 18, '61beb0c9e078a.jpg', 0, 'Palu untuk memasang paku'),
(25, 'PD_61beb0f7a6807', 'Tang', 7000, 'perkakas', 10, 18, '61beb0f7a6816.jpg', 0, 'Tang untuk mengencangkan kawat'),
(26, 'PD_61beb127e59d4', 'Senter', 25000, 'perkakas', 10, 18, '61beb127e59de.jpg', 0, 'Senter untuk penerangan saat bekerja di malam hari'),
(27, 'PD_61beb167c9d97', 'Solder', 17500, 'perkakas', 10, 18, '61beb167c9da6.jpg', 0, 'Solder untuk menyambung kabel dan kelistrikan lainnya'),
(28, 'PD_61beb1d0c523e', 'Obeng Minus', 8000, 'perkakas', 10, 18, '61beb1d0c524d.jpg', 0, 'Obeng minus kuning'),
(29, 'PD_61beb219ba267', 'Obeng Plus', 8000, 'perkakas', 9, 18, '61beb219ba277.jpg', 1, 'Obeng Plus Hijau'),
(30, 'PD_61beb28fcbd7b', 'Obeng Tespen', 12500, 'perkakas', 10, 18, '61beb28fcbd86.jpg', 0, 'Obeng untuk cek aliran listrik'),
(31, 'PD_61beb2e08b265', 'Pahat Kayu ', 60000, 'perkakas', 10, 18, '61beb2e08b272.jpg', 0, 'Pahat Kayu Set 3 PCS'),
(32, 'PD_61beb337ed230', 'Cutter', 5000, 'perkakas', 4998, 18, '61beb337ed23b.jpg', 2, 'Cutter kecil untuk potong kertas atau kardus'),
(33, 'PD_61beb37bba0e4', 'Bor Listrik', 400000, 'perkakas', 10, 18, '61beb37bba0f1.jpg', 0, 'Bor menggunakan listrik sebagai daya, untuk melubangi tembok ataupun kayu'),
(34, 'PD_61beb39e71e1d', 'Cetok Lancip', 30000, 'perkakas', 10, 18, '61beb39e71e2c.jpg', 0, 'Cetok semen lancip'),
(35, 'PD_61beb3dd4fecb', 'Gerinda Tangan', 450000, 'perkakas', 5, 18, '61beb3dd4fed8.png', 5, 'Gerinda tangan menggunakan listrik sebagai daya, untuk memotong besi'),
(36, 'PD_61beb421247bd', 'Kuas Cat', 10000, 'perkakas', 10, 18, '61beb421247c5.jpg', 0, 'Kuas cat berukuran 3 inci'),
(37, 'PD_61beb44c5e700', 'Kunci Inggris', 50000, 'perkakas', 10, 18, '61beb44c5e709.jpg', 0, 'Kunci serbaguna untuk membuka segala ukuran baut'),
(38, 'PD_61beb48d65690', 'Meteran roll', 25000, 'perkakas', 5, 18, '61beb48d656a3.jpg', 5, 'Meteran roll sepanjang 10m'),
(39, 'PD_61beb4b3ae078', 'Roller cat', 20000, 'perkakas', 10, 18, '61beb4b3ae081.jpg', 0, 'Roller untuk cat tembok'),
(40, 'PD_61beb4d92d04d', 'Waterpass', 55000, 'perkakas', 10, 18, '61beb4d92d059.jpg', 0, 'Alat ukur keseimbangan bangunan'),
(41, 'PD_61befc5f93252', 'Panic Dutch Oven 24cm', 75000, 'alat masak', 3, 20, '61befc5f9325b.jpg', 0, 'Panci oven dengan diameter lebar 24cm'),
(42, 'PD_61befd1143ba1', 'Panci wajan HC 30cm', 65000, 'alat masak', 2, 20, '61befd1143bac.jpg', 0, 'Wajan stainless steel HC 30cm'),
(43, 'PD_61befdab149ed', 'Wajan ', 85000, 'alat masak', 3, 20, '61befdab149f8.jpg', 0, 'Wajan anti lengket 3set'),
(45, 'PD_61befe8c00a30', 'Blender', 225000, 'alat masak', 5, 20, '61befe8c00a3c.jpg', 0, 'Bolde super Blend'),
(46, 'PD_61befeff3e5ed', 'Sendok takar ', 65000, 'alat masak', 7, 20, '61befeff3e5ff.jpg', 0, 'Sendok cup takar stainless steel 5pcs'),
(47, 'PD_61beff8d9e403', 'Sendok', 20000, 'alat masak', 10, 20, '61beff8d9e411.jpg', 0, 'Sendok masak '),
(48, 'PD_61bf0051787c0', 'Oven ', 1125000, 'alat masak', 4, 20, '61bf0051787cb.jpg', 0, 'Oven listrik '),
(49, 'PD_61bf0095ba01b', 'Blender Juice ', 80000, 'alat masak', 3, 20, '61bf0095ba024.jpg', 0, 'Juice blender portable '),
(50, 'PD_61bf00e49b2c0', 'Mixer', 95000, 'alat masak', 7, 20, '61bf00e49b2cb.jpg', 0, 'Mixer berdiri '),
(51, 'PD_61bf0146440bd', 'Nampan stainless ', 30000, 'alat masak', 9, 20, '61bf0146440cc.jpg', 0, 'Nampan stainless steel  30X40'),
(52, 'PD_61bf019a1660c', 'Panci susun ', 145000, 'alat masak', 7, 20, '61bf019a16624.jpeg', 0, 'Panci susun premium '),
(53, 'PD_61bf020a764b2', 'Pisau ', 70000, 'alat masak', 9, 20, '61bf020a764bb.jpg', 0, 'Pisau daging '),
(54, 'PD_61bf02969977f', 'Pisau ', 90000, 'alat masak', 11, 20, '61bf029699788.jpg', 0, 'Pisau dapur 5 set'),
(55, 'PD_61bf03568de9a', 'Spatula stainless ', 55000, 'alat masak', 6, 20, '61bf03568dea4.jpg', 0, 'Spatula stainless steel  '),
(56, 'PD_61bf03bd23efd', ' Mixer', 130000, 'alat masak', 5, 20, '61bf03bd23f0a.jpg', 0, 'Stand mixer cusimax'),
(57, 'PD_61bf069d0ce13', 'Kompor ', 225000, 'alat masak', 2, 20, '61bf069d0ce21.jpg', 0, 'Kompor gas rinnai 2tungku'),
(59, 'PD_61bf079220c6f', 'Parutan ', 22000, 'alat masak', 3, 20, '61bf079220c7b.jpg', 0, 'Parutan kelapa stainless steel '),
(60, 'PD_61bf08940ae9f', 'Rice cooker', 312000, 'alat masak', 4, 20, '61bf08940aeab.jpg', 0, 'Rice cooker sencor '),
(61, 'PD_61bfdda809256', 'Talenan ', 22000, 'alat masak', 9, 20, '61bfdda809260.png', 0, 'Talenan kayu halus persegi panjang '),
(62, 'PD_61bfde050a0d7', 'Cobek ', 33000, 'alat masak', 13, 20, '61bfde050a0e8.jpg', -1, 'Cobek merapi 25cm'),
(63, 'PD_61e24e5e35732', 'Celana Pendek Wanita', 85000, 'fashion', 50, 17, '61e24e5e3573c.jpg', 0, 'tidak ada deskripsi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_seller`
--

CREATE TABLE `request_seller` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_user`
--

CREATE TABLE `status_user` (
  `status_id` int(11) NOT NULL,
  `status_index` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_user`
--

INSERT INTO `status_user` (`status_id`, `status_index`) VALUES
(1, 'buyer'),
(2, 'seller'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_orders`
--

CREATE TABLE `tb_orders` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(20) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_date` timestamp NULL DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'unpayed',
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_orders`
--

INSERT INTO `tb_orders` (`order_id`, `order_code`, `order_date`, `payment_date`, `status`, `user_id`, `total`, `seller_id`) VALUES
(1, 'ORD_61c2b9d53ee27', '2021-12-22 05:40:03', '2022-01-02 13:54:36', 'barang diterima', 21, 2675000, 18),
(2, 'ORD_61caae59e3937', '2021-12-28 06:29:13', '2022-01-02 13:54:32', 'barang diterima', 21, 105000, 18),
(3, 'ORD_61d1aca3d071c', '2022-01-02 13:47:47', '2022-01-02 13:54:02', 'barang diterima', 21, 378000, 17),
(4, 'ORD_61d1afdf9b0eb', '2022-01-02 14:01:35', NULL, 'dibatalkan', 21, 25000, 18),
(5, 'ORD_61d1b53c7b5c8', '2022-01-02 14:24:27', NULL, 'dibatalkan', 17, 80000, 18),
(6, 'ORD_61d53fde03527', '2022-01-05 06:52:45', '2022-01-05 06:58:13', 'barang diterima', 21, 100000, 18),
(7, 'ORD_61e24b3ae7ca0', '2022-01-15 04:18:55', NULL, 'dibatalkan', 22, 75000, 18),
(8, 'ORD_61e24b70d6e13', '2022-01-15 04:19:49', '2022-01-15 04:48:32', 'barang diterima', 22, 243000, 17),
(9, 'ORD_61e24c9a5b015', '2022-01-15 04:24:47', NULL, 'dibatalkan', 23, 60000, 17),
(10, 'ORD_61e24c9a5c236', '2022-01-15 04:24:47', NULL, 'dibatalkan', 23, 25000, 18),
(11, 'ORD_61e24d26d63b4', '2022-01-15 04:27:07', NULL, 'dibatalkan', 22, 33000, 20),
(12, 'ORD_61e24d2a93075', '2022-01-15 04:27:11', NULL, 'dibatalkan', 23, 50000, 17),
(13, 'ORD_61e24d2a93fab', '2022-01-15 04:27:11', NULL, 'menunggu pembayaran', 23, 25000, 18),
(14, 'ORD_61e2641c9704c', '2022-01-15 06:05:05', '2022-01-15 06:08:24', 'barang diterima', 21, 5300000, 17),
(15, 'ORD_61e40a0304a5d', '2022-01-16 12:05:07', '2022-01-16 12:07:56', 'barang dikirim', 21, 6872000, 17),
(16, 'ORD_61e65aaa71bbc', '2022-01-18 06:13:40', '2022-01-18 06:17:52', 'menunggu pengiriman', 24, 100000, 17),
(17, 'ORD_61e65aaa7478e', '2022-01-18 06:13:40', '2022-01-18 06:15:36', 'barang diterima', 24, 5000, 18),
(18, 'ORD_61e6602bd2e05', '2022-01-18 06:37:10', NULL, 'menunggu konfirmasi', 21, 2050000, 17),
(19, 'ORD_61e6602c194c1', '2022-01-18 06:37:10', NULL, 'menunggu konfirmasi', 24, 2050000, 17),
(20, 'ORD_61e66112d53b9', '2022-01-18 06:41:01', NULL, 'menunggu konfirmasi', 24, 1600000, 17),
(21, 'ORD_61e66116e0c17', '2022-01-18 06:41:05', NULL, 'menunggu pembayaran', 21, 2200000, 17),
(22, 'ORD_61e7d3d764212', '2022-01-19 09:02:54', NULL, 'dibatalkan', 22, 50000, 17),
(23, 'ORD_61e7d619d8b2c', '2022-01-19 09:12:33', NULL, 'dibatalkan', 22, 1600000, 17),
(24, 'ORD_61e7d90f0169c', '2022-01-19 09:25:10', NULL, 'dibatalkan', 22, 2450000, 17),
(25, 'ORD_61e7da3663eca', '2022-01-19 09:30:05', NULL, 'dibatalkan', 22, 35000, 18),
(26, 'ORD_61e7da730af13', '2022-01-19 09:31:06', '2022-01-19 09:32:28', 'barang diterima', 22, 8000, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `temp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`order_id`, `product_id`, `qty`, `sub_total`, `seller_id`, `temp_id`) VALUES
(1, 21, 6, 300000, 18, 1),
(1, 35, 5, 2250000, 18, 2),
(1, 38, 5, 125000, 18, 3),
(2, 21, 2, 100000, 18, 4),
(2, 32, 1, 5000, 18, 5),
(3, 1, 2, 178000, 17, 6),
(3, 4, 4, 200000, 17, 7),
(4, 38, 1, 25000, 18, 8),
(5, 24, 8, 80000, 18, 9),
(6, 21, 2, 100000, 18, 10),
(7, 22, 1, 35000, 18, 11),
(7, 23, 1, 40000, 18, 12),
(8, 1, 2, 178000, 17, 13),
(8, 2, 1, 65000, 17, 14),
(9, 6, 1, 60000, 17, 15),
(10, 26, 1, 25000, 18, 16),
(11, 62, 1, 33000, 20, 17),
(12, 4, 1, 50000, 17, 18),
(13, 26, 1, 25000, 18, 19),
(14, 2, 50, 3250000, 17, 20),
(14, 4, 41, 2050000, 17, 21),
(15, 1, 23, 2047000, 17, 22),
(15, 2, 50, 3250000, 17, 23),
(15, 3, 35, 1575000, 17, 24),
(16, 9, 1, 100000, 17, 25),
(17, 32, 1, 5000, 18, 26),
(18, 4, 41, 2050000, 17, 27),
(19, 4, 41, 2050000, 17, 28),
(20, 10, 20, 1600000, 17, 29),
(21, 8, 8, 600000, 17, 30),
(21, 10, 20, 1600000, 17, 31),
(22, 4, 1, 50000, 17, 32),
(23, 10, 20, 1600000, 17, 33),
(24, 4, 49, 2450000, 17, 34),
(25, 22, 1, 35000, 18, 35),
(26, 29, 1, 8000, 18, 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `status_id` int(11) NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `full_name`, `status_id`, `saldo`) VALUES
(16, 'febryntara', '$2y$10$H.Gni9Vw7z5h9ccamN98.eTyQtf8kP6RFUiDQfTNsOCG3WmcEPWqO', 'febryntara', 1, 0),
(17, 'nisasintiaa', '$2y$10$9O4f/Yvr9YZd.5R.5DIMSuPZdzPo7KsBkglB8ok89kQ4RlEQR84p2', 'nisa sintia', 2, 0),
(18, 'apjseller', '$2y$10$HBDDsEXtNXHOd.Wl/5SRHeLxlSWn4XFKgyida3HHK1WPKn3kB25OK', 'apj', 2, 0),
(19, 'administrator', '$2y$10$IGXzXHeYTm/vO4411G.JuuQzItlceV5Tjszr4W./uMpMoEZaVHWwK', 'administrator', 3, 0),
(20, 'raj', '$2y$10$PHcW.nqEBn/Ta6iqpB8J8uLULHdRe/sdpZu1DpkfJRO9bpa/h3Zmq', 'rajeesh rauter', 2, 0),
(21, 'febry', '$2y$10$Efm.8FO5QjLR/Rd8hN0n1.pSj8j/UDI1lb110BrJDEjnrgA75Ky8e', 'buyerfebry', 1, 0),
(22, 'panpan', '$2y$10$7behF15s2Gxpd.V0nJ23WuvfxB0uU6XQ684XchA1AcImcmpW4Nl/m', 'panpan', 1, 0),
(23, 'Raj rauter', '$2y$10$TllJPB8ziCDDyq4IH0wXPuD9x8nFrD9BJCiaewJ2GwtztblItqDg6', 'Rajeesh ', 1, 0),
(24, 'dekjun', '$2y$10$M.TuYd8Kky2RoPiktxE61eChKIsegb83FOvJtD61XmvAh2fnumC.a', 'I Kadek Juniarta', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `from_uid` (`from_uid`),
  ADD KEY `to_uid` (`to_uid`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `request_seller`
--
ALTER TABLE `request_seller`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `status_user`
--
ALTER TABLE `status_user`
  ADD PRIMARY KEY (`status_id`);

--
-- Indeks untuk tabel `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD PRIMARY KEY (`temp_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `request_seller`
--
ALTER TABLE `request_seller`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `status_user`
--
ALTER TABLE `status_user`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
