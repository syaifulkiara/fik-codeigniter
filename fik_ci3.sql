-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2020 at 07:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fik_ci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `denyut_nadi`
--

CREATE TABLE `denyut_nadi` (
  `id_denyut_nadi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal_pengukuran` varchar(100) NOT NULL,
  `jam_pengukuran` varchar(100) NOT NULL,
  `tds` int(11) NOT NULL,
  `tdd` int(11) NOT NULL,
  `denyut_nadi` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal_post` varchar(100) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denyut_nadi`
--

INSERT INTO `denyut_nadi` (`id_denyut_nadi`, `id_user`, `id_pasien`, `tanggal_pengukuran`, `jam_pengukuran`, `tds`, `tdd`, `denyut_nadi`, `keterangan`, `tanggal_post`, `tanggal_update`) VALUES
(1, 1, 1, '01-12-2020', '08:00', 120, 80, 75, 'Keterangan\r\nKeterangan Lain\r\n', '0000-00-00', '2020-12-29 16:59:58'),
(2, 1, 1, '29-12-2020', '08:00', 150, 40, 50, 'Abcdefg', '0000-00-00', '2020-12-29 16:59:17'),
(3, 1, 3, '30-12-2020', '08:00', 150, 80, 50, '', '', '2020-12-29 12:08:26'),
(4, 1, 2, '29-12-2020', '08:00', 150, 40, 50, '', '', '2020-12-29 12:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_pasien` varchar(20) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(32) DEFAULT NULL,
  `tanggal_lahir` varchar(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id_user`, `kode_pasien`, `nama_pasien`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telepon`, `tanggal_update`) VALUES
(1, 1, '00011101', 'Abdul Gani', 'L', 'Jakarta', '01-01-1961', 'J.Flamboyan 2', '021 657765667', '2020-12-20 04:46:29'),
(2, 1, '000988', 'M Arsad', 'L', 'Jakarta', '01-01-1980', 'Jl.Bengawan solo', '089677543467', '2020-12-29 18:06:29'),
(3, 1, '000989', 'Siti Rukmana', 'P', 'Medan', '25-09-1990', 'Jl.Mawar merah berduri', '087878677677', '2020-12-29 18:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `suhu_tubuh`
--

CREATE TABLE `suhu_tubuh` (
  `id_suhu_tubuh` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal_pengukuran` varchar(11) NOT NULL,
  `jam_pengukuran` varchar(11) NOT NULL,
  `suhu_tubuh` double NOT NULL,
  `metode_pengukuran` varchar(200) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suhu_tubuh`
--

INSERT INTO `suhu_tubuh` (`id_suhu_tubuh`, `id_user`, `id_pasien`, `tanggal_pengukuran`, `jam_pengukuran`, `suhu_tubuh`, `metode_pengukuran`, `keterangan`, `tanggal_update`) VALUES
(1, 1, 1, '01-12-2019', '07:30:00', 38, 'Axilla', '', '2020-12-23 19:27:53'),
(2, 1, 1, '24-12-2020', '09:00:00', 39, 'Rectal', '', '2020-12-23 19:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(1, 'Syaiful Kiara', 'admin@admin.com', 'admin', '7d8f4b4b4613dc7e15333e6449692ad4af502d1d', 'Admin', '2020-12-20 04:59:42'),
(2, 'Daffian', 'dalusy20@gmail.com', 'Daffi', '7d8f4b4b4613dc7e15333e6449692ad4af502d1d', 'Perawat', '2020-12-20 04:53:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `denyut_nadi`
--
ALTER TABLE `denyut_nadi`
  ADD PRIMARY KEY (`id_denyut_nadi`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `kode_pasien` (`kode_pasien`);

--
-- Indexes for table `suhu_tubuh`
--
ALTER TABLE `suhu_tubuh`
  ADD PRIMARY KEY (`id_suhu_tubuh`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `denyut_nadi`
--
ALTER TABLE `denyut_nadi`
  MODIFY `id_denyut_nadi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suhu_tubuh`
--
ALTER TABLE `suhu_tubuh`
  MODIFY `id_suhu_tubuh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
