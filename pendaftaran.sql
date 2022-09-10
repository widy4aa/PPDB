-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 10, 2022 at 10:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `kk` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `no_hp` int(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calon_siswa`
--

INSERT INTO `calon_siswa` (`id`, `nik`, `kk`, `nisn`, `nama`, `tgl_lahir`, `jurusan`, `tgl_pendaftaran`, `no_hp`, `alamat`, `nama_ayah`, `nama_ibu`, `asal_sekolah`, `status`) VALUES
(3, '213213213213', '213213213213', '21321', 'arieX', '2022-09-06', 'TITL', '2022-09-07', 81221122, 'wuluhan', 'agoess pcl', 'sutresss', 'smp 1 ringintelu', 1),
(4, '2132132132', '2312321321', '16623312', 'bambang yoga saputra', '2022-09-07', 'RPL', '2022-09-14', 853203712, 'jember', 'sugen', 'bambang', 'smp it', 1),
(5, '3213123', '31231', '321312', 'Bang faktur', '2022-09-09', 'RPL', '2022-09-16', 432424242, 'fsfdsfdsfds', 'Wahyu', 'sutres', '', 0),
(6, '92378971237', '2371237', '92139127371273', 'dioasidoias', '2022-09-14', 'RPL', '2022-09-16', 823718231, 'jember\r\npuger', 'sutreees2', 'sutress3', 'smppp 5', 1),
(8, '3424324', '78787', '78787878', 'fdgdfgdgdg', '2022-09-23', 'BKP', '2022-09-19', 5555, 'jkjjkg', 'dsaddsa', 'jkjkjk', 'jkjkjkjkjk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan`) VALUES
('BKP'),
('RPL'),
('TAB'),
('TITL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `no_telp`, `password`) VALUES
(1, 'arie', 'arie@gmail.com', '08637363', '$2y$10$ZYtv2vxC/g4uI6q0pOexhuzAl7Bpt1CeIJRVKFdAtMlrPi5Q8vcJO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusan` (`jurusan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD CONSTRAINT `calon_siswa_ibfk_1` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
