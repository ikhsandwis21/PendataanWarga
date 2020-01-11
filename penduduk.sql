-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 01:27 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penduduk`
--

-- --------------------------------------------------------

--
-- Table structure for table `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `kk_id` int(11) NOT NULL,
  `no_kk` int(100) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_kepala` varchar(50) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `status_hubungan` varchar(50) NOT NULL,
  `kwarganegaraan` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`kk_id`, `no_kk`, `nik`, `nama_kepala`, `nama`, `status_hubungan`, `kwarganegaraan`, `nama_ayah`, `nama_ibu`, `created`, `updated`) VALUES
(3, 212121, '02312473843', '', '5', '', '', '', '', '2019-06-18 23:11:51', '2019-06-18 18:13:29'),
(4, 123, '1212', 'Adi', 'Ikhsan', 'Belum Kawin', 'WNI', 'Sarno', 'Sarmi', '2019-06-28 14:07:20', '2019-06-28 14:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `kas_keluar`
--

CREATE TABLE `kas_keluar` (
  `kd_kas_keluar` int(11) NOT NULL,
  `kd_kas_masuk` int(11) NOT NULL,
  `pengguna` varchar(50) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas_keluar`
--

INSERT INTO `kas_keluar` (`kd_kas_keluar`, `kd_kas_masuk`, `pengguna`, `keperluan`, `jumlah`, `tanggal`) VALUES
(25, 18, 'Warga', 'Piknik', 500, '2019-06-29');

--
-- Triggers `kas_keluar`
--
DELIMITER $$
CREATE TRIGGER `pengeluaran` AFTER INSERT ON `kas_keluar` FOR EACH ROW BEGIN
	UPDATE kas_masuk set saldo=saldo-NEW.jumlah
    WHERE kd_kas_masuk = NEW.kd_kas_masuk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kas_masuk`
--

CREATE TABLE `kas_masuk` (
  `kd_kas_masuk` int(11) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `asal_dana` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas_masuk`
--

INSERT INTO `kas_masuk` (`kd_kas_masuk`, `jumlah`, `asal_dana`, `tanggal`, `saldo`) VALUES
(18, 5000, 'kas', '2019-06-28', 4500);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `tanggal`) VALUES
(2, 'Ramadhan', '2019-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--
-- Error reading structure for table penduduk.panitia: #1932 - Table 'penduduk.panitia' doesn't exist in engine
-- Error reading data for table penduduk.panitia: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `penduduk`.`panitia`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `panitia1`
--

CREATE TABLE `panitia1` (
  `kd_panitia` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `nama_ketua` varchar(50) NOT NULL,
  `nama_pj` varchar(50) NOT NULL,
  `nama_bd` varchar(50) NOT NULL,
  `nama_sk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panitia1`
--

INSERT INTO `panitia1` (`kd_panitia`, `id_kegiatan`, `nama_ketua`, `nama_pj`, `nama_bd`, `nama_sk`) VALUES
(1, 2, 'Renindra Alprisno K', 'Ikhsan', 'Feby', 'Alex');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Renindra Alprisno Kusuma', 'Bandung', 1),
(6, 'User2', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Ikhsan', 'Bandung', 2),
(7, 'bendahara', '8cf55b8ae912bbfec560427ce8a2f296bf3ac972', 'Omar', 'Turki', 3);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha') NOT NULL,
  `status` enum('Kawin','Belum Kawin','','') NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_tinggal` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`nik`, `nama`, `ttl`, `alamat`, `jenis_kelamin`, `agama`, `status`, `pekerjaan`, `status_tinggal`, `created`, `updated`) VALUES
('1212', 'Ikhsan', '2008-06-18', 12, 'Laki-laki', 'Islam', 'Belum Kawin', 'Mahasiswa', 'Kos', '2019-06-27 23:56:40', '2019-06-27 23:56:40'),
('123456', 'Tika', '1994-04-12', 12, 'Perempuan', 'Islam', 'Kawin', 'PNS', 'Kontrak', '2019-06-28 14:08:50', '2019-06-28 14:08:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`kk_id`),
  ADD KEY `nik` (`nik`) USING BTREE;

--
-- Indexes for table `kas_keluar`
--
ALTER TABLE `kas_keluar`
  ADD PRIMARY KEY (`kd_kas_keluar`);

--
-- Indexes for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  ADD PRIMARY KEY (`kd_kas_masuk`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `panitia1`
--
ALTER TABLE `panitia1`
  ADD PRIMARY KEY (`kd_panitia`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  MODIFY `kk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kas_keluar`
--
ALTER TABLE `kas_keluar`
  MODIFY `kd_kas_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  MODIFY `kd_kas_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `panitia1`
--
ALTER TABLE `panitia1`
  MODIFY `kd_panitia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD CONSTRAINT `kartu_keluarga_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `warga` (`nik`);

--
-- Constraints for table `panitia1`
--
ALTER TABLE `panitia1`
  ADD CONSTRAINT `panitia1_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
