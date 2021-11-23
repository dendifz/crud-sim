-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 04:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utsweb2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `dosen_id` int(11) NOT NULL,
  `nama_dosen` varchar(55) NOT NULL,
  `alamat_dosen` varchar(80) NOT NULL,
  `tlp_dosen` varchar(14) NOT NULL,
  `pend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`dosen_id`, `nama_dosen`, `alamat_dosen`, `tlp_dosen`, `pend_id`) VALUES
(1, 'Chandra Wirawan', 'Jakarta', '0851554****', 4);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `ruangan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `hari`, `jam_id`, `dosen_id`, `kelas_id`, `matakuliah_id`, `ruangan_id`) VALUES
(1, 'Senin', 1, 1, 1, 1, 1),
(2, 'Senin', 2, 1, 1, 1, 1),
(3, 'Selasa', 3, 1, 4, 2, 2),
(4, 'Selasa', 4, 1, 4, 2, 2),
(5, 'Selasa', 5, 1, 1, 3, 3),
(6, 'Selasa', 6, 1, 1, 3, 3),
(7, 'Selasa', 7, 1, 1, 3, 4),
(8, 'Selasa', 2, 1, 1, 3, 4),
(9, 'Rabu', 8, 1, 5, 4, 5),
(11, 'Rabu', 10, 1, 1, 1, 1),
(12, 'Selasa', 3, 1, 4, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jam_kuliah`
--

CREATE TABLE `jam_kuliah` (
  `jam_id` int(11) NOT NULL,
  `jamkuliah` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jam_kuliah`
--

INSERT INTO `jam_kuliah` (`jam_id`, `jamkuliah`) VALUES
(1, '11:05 - 11:55'),
(2, '12:45 - 13:45'),
(3, '07:30 - 08:20'),
(4, '08:20 - 09:10'),
(5, '09:10 - 10:00'),
(6, '10:15 - 11:05'),
(7, '11:05 - 11:55'),
(8, '13:35 - 14:25'),
(9, '14:25 - 15:15'),
(10, '09:00 - 10:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `nama_kelas` varchar(40) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `Tahun_akademik` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `nama_kelas`, `prodi_id`, `semester`, `Tahun_akademik`) VALUES
(1, 'A', 1, 'I', '2020/2021'),
(2, 'B', 1, 'I', '2020/2021'),
(4, 'B', 3, 'V', '2019/2020'),
(5, 'C', 4, 'V', '2019/2020');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `matakuliah_id` int(11) NOT NULL,
  `nama_matakuliah` varchar(40) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `sks` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`matakuliah_id`, `nama_matakuliah`, `semester`, `sks`) VALUES
(1, 'Pengantar Teknologi Informasi', 'I', '2'),
(2, 'Web Design', 'V', '2'),
(3, 'Pemrograman Web Statis', 'III', '2'),
(4, 'E-COMMERCE', 'V', '2'),
(5, 'Matematika Lanjutan', 'I', '6');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `pend_id` int(11) NOT NULL,
  `nama_pen` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`pend_id`, `nama_pen`) VALUES
(4, 'S2'),
(5, 'S3'),
(8, 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `prodi_id` int(11) NOT NULL,
  `nama_prodi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`prodi_id`, `nama_prodi`) VALUES
(1, 'MICE'),
(3, 'ABT'),
(4, 'AB');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `ruangan_id` int(11) NOT NULL,
  `ruangan_nama` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`ruangan_id`, `ruangan_nama`) VALUES
(1, '115'),
(2, '109'),
(3, '306'),
(4, '307'),
(5, 'GSG 1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Dendi F. Zaman', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`dosen_id`),
  ADD KEY `pend_id` (`pend_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `jam_id` (`jam_id`),
  ADD KEY `dosen_id` (`dosen_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `matakuliah_id` (`matakuliah_id`),
  ADD KEY `ruangan_id` (`ruangan_id`);

--
-- Indexes for table `jam_kuliah`
--
ALTER TABLE `jam_kuliah`
  ADD PRIMARY KEY (`jam_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`matakuliah_id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`pend_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`prodi_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ruangan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `dosen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jam_kuliah`
--
ALTER TABLE `jam_kuliah`
  MODIFY `jam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `matakuliah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `pend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `prodi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `ruangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`pend_id`) REFERENCES `pendidikan` (`pend_id`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`ruangan_id`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`dosen_id`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`jam_id`) REFERENCES `jam_kuliah` (`jam_id`),
  ADD CONSTRAINT `jadwal_ibfk_5` FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliah` (`matakuliah_id`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`prodi_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
