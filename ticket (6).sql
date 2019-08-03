-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 03:19 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `foto_barang` varchar(100) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `foto_barang`, `id_jenis`) VALUES
(1, 'BRG0001', 'RJ 45', 'barang_1563345681.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pro`
--

CREATE TABLE `pro` (
  `id` int(11) NOT NULL,
  `category` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro`
--

INSERT INTO `pro` (`id`, `category`) VALUES
(1, 'Network'),
(2, 'Support'),
(3, 'Hardware'),
(4, 'Software');

-- --------------------------------------------------------

--
-- Table structure for table `problem_req`
--

CREATE TABLE `problem_req` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_problem` varchar(128) NOT NULL,
  `time` varchar(128) NOT NULL,
  `respont` varchar(256) NOT NULL,
  `recomend` varchar(256) NOT NULL,
  `detect` int(1) NOT NULL,
  `kind` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem_req`
--

INSERT INTO `problem_req` (`id`, `name`, `nik`, `category_id`, `type`, `description`, `date_problem`, `time`, `respont`, `recomend`, `detect`, `kind`) VALUES
(29, 'Karyawan', 'PAP0011', 2, 1, 'laptop error', '2019-07-16', '07:13:47', 'Success', 'Pengecekan Success', 1, 'Ringan'),
(31, 'acfahreza', 'FOP0014', 1, 2, 'kabel internet mati', '2019-07-17', '01:42:37', 'Order', 'dkasdnas\r\nRecommend : RJ 45', 0, 'Ringan'),
(58, 'Karyawan', 'PAP0011', 1, 1, 'Tidak Dapat Terhubung dengan Komputer Server,Tidak Dapat Terkoneksi dengan Internet,kerusakan pada connector jaringan,Kerusakan / terputusnya Kabel pada jaringan,konfigurasi server dengan client', '2019-07-22', '12:04:26', 'Pending', 'Sedang Dalam Proses Pengerjaan', 0, 'Ringan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `divisi` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `divisi`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'admin', 'admin@help.com', 'default.jpg', 'pass', 'Human Resource Development (HRD)', 1, 1, 1552120289),
(6, 'staff', 'staff@help.com', 'default.jpg', 'pass', '', 3, 1, 1552285263),
(11, 'Karyawan', 'karyawan@help.com', 'default.jpg', 'pass', 'Provisioning Access Point', 2, 1, 1553151354),
(14, 'acfahreza', 'acfahreza@gmail.com', 'default.jpg', 'jeketi48', 'Field Operation (FOP)', 2, 1, 1563340023);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(53, 1, 2),
(57, 2, 2),
(58, 2, 9),
(59, 3, 2),
(60, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(8, 'Request'),
(9, 'Order');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Karyawan'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(3, 2, 'My Profile', 'user', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Setting', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Edit Profil', 'user/edit', 'fas fa-fw fa-cogs', 1),
(9, 1, 'List User', 'user/list', 'fas fa-fw fa-user-tag', 1),
(16, 8, 'Request', 'request', 'fas fa-fw fa-cogs', 1),
(17, 9, 'Order Me', 'order', 'fas fa-fw fa-envelope', 1),
(18, 8, 'Item', 'barang', 'fas fa-fw fa-tools', 1),
(19, 9, 'Order List', 'order/list', 'fas fa-fw fa-envelope-open', 1),
(20, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(17, '2012470003@ftumj.ac.id', 'kgU23HBU5HezMLQ6FCRYmWLu/FI/okTg93ZOoRInYoU=', 1556017243),
(18, '2012470003@ftumj.ac.id', 'SXyg9KgYKW+gPlnLTbRPmbV+zUFz4h2jWlVr96DShpU=', 1556017248),
(19, '2012470003@ftumj.ac.id', 'SH7qiMQuW4mHn6javJIJCkTsiFXydshXeWYmPi9X9zk=', 1556017251),
(20, '2012470003@ftumj.ac.id', 'fzbaksdwVydCN2u1Pl0npK4nH1KuWY/XMy8MpTnntjM=', 1556017313),
(21, '2012470003@ftumj.ac.id', 'yYFNEQDOutxZWct2lx1m4hj4mOxttZCMYSPzLGT/xmY=', 1562548321);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pro`
--
ALTER TABLE `pro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem_req`
--
ALTER TABLE `problem_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pro`
--
ALTER TABLE `pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `problem_req`
--
ALTER TABLE `problem_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
