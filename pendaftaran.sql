-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Sep 2022 pada 06.26
-- Versi server: 5.7.33
-- Versi PHP: 8.1.2

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
-- Struktur dari tabel `calon_siswa`
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
-- Dumping data untuk tabel `calon_siswa`
--

INSERT INTO `calon_siswa` (`id`, `nik`, `kk`, `nisn`, `nama`, `tgl_lahir`, `jurusan`, `tgl_pendaftaran`, `no_hp`, `alamat`, `nama_ayah`, `nama_ibu`, `asal_sekolah`, `status`) VALUES
(4, '2132132132', '2312321321', '16623312', 'bambang yoga saputra', '2022-09-07', 'RPL', '2022-09-14', 853203712, 'jember', 'sugen', 'bambang', 'smp it', 1),
(5, '3213123', '31231', '321312', 'Bang faktur', '2022-09-09', 'RPL', '2022-09-16', 432424242, 'fsfdsfdsfds', 'Wahyu', 'sutres', 'hjk', 0),
(6, '92378971237', '2371237', '92139127371273', 'dioasidoias', '2022-09-14', 'RPL', '2022-09-16', 823718231, 'jember\r\npuger', 'sutreees2', 'sutress3', 'smppp 5', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`jurusan`) VALUES
('RPL'),
('TAB'),
('TITL'),
('TKR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `photo_profile` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `no_telp`, `photo_profile`, `password`) VALUES
(1, 'arieaseli', 'arie@gmail.com', '086373636978', '631d4738ae3f6-1662863160.png', '$2y$10$oBgzq5H44B05f2SM7avGXeujUVeILnvkgkmTH7riCxf4V6748In7W');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusan` (`jurusan`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `calon_siswa`
--
ALTER TABLE `calon_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD CONSTRAINT `calon_siswa_ibfk_1` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
