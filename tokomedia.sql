-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2021 pada 13.40
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokomedia`
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
  `payment_status` varchar(15) NOT NULL,
  `proof` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `from_uid`, `to_uid`, `amount`, `payment_status`, `proof`) VALUES
(10, 48, 9, 6, 1480000, 'menunggu konfir', '619dd8c6e5ded.png'),
(11, 49, 9, 6, 900000, 'menunggu konfir', '619e1e6d441e8.png'),
(12, 50, 9, 6, 450000, 'menunggu konfir', '619e201361331.png'),
(13, 51, 9, 6, 450000, 'menunggu konfir', '619e2732ebeec.jpg'),
(14, 52, 9, 6, 450000, 'menunggu konfir', '619e2938a0f71.png'),
(15, 53, 9, 6, 450000, 'menunggu konfir', '619e299983b47.png'),
(16, 54, 9, 6, 450000, 'menunggu konfir', '619e29ea6651f.png'),
(17, 55, 9, 6, 580000, 'pembayaran diko', '61a7216064448.png'),
(18, 57, 9, 6, 450000, 'pembayaran diko', '61af8242ec31d.jpg'),
(19, 59, 15, 6, 740000, 'pembayaran diko', '61b17e9d631c2.jpg'),
(20, 61, 9, 7, 1739000, 'pembayaran diko', '61b2f08000750.jpg');

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
  `deskripsi` text NOT NULL DEFAULT 'Tidak ada deskripsi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_price`, `category`, `stok`, `user_id`, `gambar`, `sold`, `deskripsi`) VALUES
(3, 'PD_616ea6b39b367', 'wow3', 1000, 'fashion', 4, 7, 'default.jpg', 5, 'Tidak ada deskripsi'),
(4, 'PD_616ea6de492ab', 'wow4', 9000, 'fashion', 9, 7, 'default.jpg', 0, 'Tidak ada deskripsi'),
(10, 'PD_616ea710ebf88', 'baju anak', 90000, 'fashion', 0, 7, 'default.jpg', 9, 'tidak ada deskirpsi'),
(11, 'PD_616ea71e93261', 'pisau pembunuh', 132000, 'alat masak', 2, 7, 'default.jpg', 10, 'tidak ada deskirpsi'),
(29, 'PD_616eee2449417', 'minyak alamiyah', 15000, 'fashion', 9, 6, '61a720e35622d.jpg', 0, 'tidak ada deskripsi'),
(31, 'PD_616ef0008d1fd', 'produk admin', 20000, 'fashion', 9, 6, '616ef0008d209.jpg', 0, 'tidak ada deskripsi'),
(32, 'PD_617004598134a', 'Sepatu Vans', 15000, 'fashion', 9, 6, '617004598135c.jpg', 0, 'tidak ada deskripsi'),
(33, 'PD_61751259e7cd9', 'minyak wangi', 30000, 'perkakas', 9, 14, '61751259e7ce9.jpg', 0, 'tidak ada deskripsi'),
(34, 'PD_6180ecd585ff5', 'Set Muslim', 250000, 'fashion', 9, 6, '6180ecd59fc1e.jpg', 0, 'produk set muslim pilihna umat muslim'),
(35, 'PD_6180ed1bc9d93', 'Set ngedate perempuan', 290000, 'fashion', 8, 6, '6180ed1bc9da5.jpg', 0, 'tidak ada deskripsi'),
(36, 'PD_6180ed4046be1', 'baju celana imut', 450000, 'fashion', 8, 6, '6180ed4046bf0.jpg', 0, 'tidak ada deskripsi');

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
(48, 'ORD_619dd89b8eb82', '2021-11-24 06:15:55', NULL, 'barang diterima', 9, 1480000, 6),
(49, 'ORD_619e1e2548b9e', '2021-11-24 11:12:37', NULL, 'barang diterima', 9, 900000, 6),
(50, 'ORD_619e1fdabcf48', '2021-11-24 11:19:54', '2021-11-24 11:23:37', 'barang diterima', 9, 450000, 6),
(51, 'ORD_619e2714b7218', '2021-11-24 11:50:44', '2021-11-24 11:54:00', 'barang diterima', 9, 450000, 6),
(52, 'ORD_619e28c11c56f', '2021-11-24 11:57:53', '2021-11-24 12:03:24', 'barang diterima', 9, 450000, 6),
(53, 'ORD_619e29865280d', '2021-11-24 12:01:10', '2021-11-24 12:03:18', 'barang diterima', 9, 450000, 6),
(54, 'ORD_619e29d75f0fd', '2021-11-24 12:02:31', '2021-11-24 12:03:15', 'barang diterima', 9, 450000, 6),
(55, 'ORD_61a7211d1d428', '2021-12-01 07:15:41', '2021-12-01 07:19:17', 'barang diterima', 9, 580000, 6),
(56, 'ORD_61a7273a23c5f', '2021-12-01 07:41:46', NULL, 'dibatalkan', 9, 450000, 6),
(57, 'ORD_61af7aa5a6132', '2021-12-07 15:15:49', '2021-12-07 15:49:02', 'barang diterima', 9, 450000, 6),
(58, 'ORD_61b17d565fbf9', '2021-12-09 03:51:50', NULL, 'dibatalkan', 15, 132000, 7),
(59, 'ORD_61b17e1d06409', '2021-12-09 03:55:09', '2021-12-09 03:58:08', 'barang dikirim', 15, 740000, 6),
(60, 'ORD_61b17e1d60db5', '2021-12-09 03:55:09', NULL, 'menunggu konfirmasi', 15, 30000, 14),
(61, 'ORD_61b2efa747bd0', '2021-12-10 06:11:51', '2021-12-10 06:15:45', 'barang diterima', 9, 1739000, 7),
(62, 'ORD_61b2efa779c44', '2021-12-10 06:11:51', NULL, 'menunggu konfirmasi', 9, 75000, 6);

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
(48, 35, 2, 580000, 6, 40),
(48, 36, 2, 900000, 6, 41),
(49, 36, 2, 900000, 6, 42),
(50, 36, 1, 450000, 6, 43),
(51, 36, 1, 450000, 6, 44),
(52, 36, 1, 450000, 6, 45),
(53, 36, 1, 450000, 6, 46),
(54, 36, 1, 450000, 6, 47),
(55, 35, 2, 580000, 6, 48),
(56, 36, 1, 450000, 6, 49),
(57, 36, 1, 450000, 6, 50),
(58, 11, 1, 132000, 7, 51),
(59, 35, 1, 290000, 6, 52),
(59, 36, 1, 450000, 6, 53),
(60, 33, 1, 30000, 14, 54),
(61, 3, 5, 5000, 7, 55),
(61, 10, 9, 810000, 7, 56),
(61, 11, 7, 924000, 7, 57),
(62, 29, 5, 75000, 6, 58);

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
(5, 'dekjun', '$2y$10$XcYpvSe/1OH1cDyjkrwat.IvbMlLVNR/U443ad.v9MlWisreMRlMe', 'dekjun kontol', 1, 0),
(6, 'admin', '$2y$10$zM.vhCn/cpE1MhYI1KfOoe6wFMIb.w5g5JmusaT3rGD8D41wNsUha', 'admin 2', 2, 100000),
(7, 'admin2', '$2y$10$7Cjnm.RppJTuYl6vnX7fIeFFTW1c.nwlEIx8O6MVnIUT.EkO1MIoq', 'admin', 2, 0),
(8, 'dennykd', '$2y$10$l2HYnsH41LSXHDvaE2cquumW.0n48Lgugw.LqqqNNqgcAWF4nDLlC', 'kadek deny', 2, 2147483647),
(9, 'user', '$2y$10$T05.pcvcvOY.G2wGdRf8CuooroQY1otHAc0hJfS8bHQo3CzoFbkaW', 'user', 1, 10000),
(10, 'administrator', '$2y$10$3nO7z5BeoSiozJtqp/X4CeED2e03pJgY4Qtlm4kWhAQrOuAQ80vFO', 'administrator Febryntara', 3, 0),
(11, 'lord', '$2y$10$d3RVSBLWJhMK7C4pcFtW7uV5RIEJgQNa.1OynPwXu7gxFlBO5AxAK', 'lord', 1, 0),
(12, 'pntx', '$2y$10$eZ5jVJN9gFpTAZVI/kRB6.LPyLZDjx.k3CTJCtUORLPSV1dZ9YYRC', 'pntx', 1, 0),
(13, 'febryntara', '$2y$10$uY/0RbKI1UJfj.vX5Cd8weQUc4WLPZwms4hzZAGQN59rcaUcnqn4K', 'Febryntara', 1, 0),
(14, 'penjual', '$2y$10$ePO0.K9lNuSK3fZGsYEN6Oc4dRN9/H.fVwWoW1pt7cIt/wZR7pjuy', 'penjual', 2, 0),
(15, 'berith', '$2y$10$8RHw.H.OYqmRK3dOnze3Ju5NDuqw7bn7y3FEg.Hz/PvczauXhWXJS', 'berith', 1, 0);

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
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `status_user`
--
ALTER TABLE `status_user`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`from_uid`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`to_uid`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `tb_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD CONSTRAINT `tb_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD CONSTRAINT `tb_order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tb_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status_user` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
