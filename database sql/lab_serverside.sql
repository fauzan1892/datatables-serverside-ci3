-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2020 at 07:37 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tgl_posting` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `kategori`, `penulis`, `tgl_posting`) VALUES
(1, 'Pengenalan HTML', 'HTML', 'Joe Doe', '2020-01-11 02:06:12'),
(2, 'Pengenalan CSS', 'CSS', 'Joe Doe', '2020-01-11 00:00:00'),
(3, 'Pengenalan PHP', 'PHP', 'Joe Doe', '2020-01-11 02:06:12'),
(4, 'Pengenalan JavaScript', 'JS', 'Joe Doe', '2020-01-11 00:00:00'),
(5, 'Pengenalan MySQL', 'mysql', 'Joe Doe', '2020-01-11 00:00:00'),
(6, 'Advanced PHP', 'PHP', 'Joe Doe', '2020-01-11 00:00:00'),
(7, 'Pengenalan Vue JS', 'JS', 'Joe Doe', '2020-01-11 00:00:00'),
(8, 'Framework PHP', 'PHP', 'Joe Doe', '2020-01-11 00:00:00'),
(9, 'Basic CodeIgniter', 'PHP', 'Joe Doe', '2020-01-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_buat`) VALUES
(1, 'Tutorial', '2020-01-12 00:00:00'),
(2, 'Teknologi', '2020-01-12 00:00:00'),
(3, 'Database', '2020-01-12 00:00:00'),
(4, 'Pemrograman', '2020-01-12 00:00:00'),
(5, 'JavaScript', '2020-01-12 00:00:00'),
(6, 'Framework', '2020-01-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subkat`
--

CREATE TABLE `subkat` (
  `id_subkat` int(11) NOT NULL,
  `subkat` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tgl_add` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkat`
--

INSERT INTO `subkat` (`id_subkat`, `subkat`, `id_kategori`, `tgl_add`) VALUES
(1, 'HTML', 1, '2020-01-12 00:00:00'),
(2, 'CSS', 1, '2020-01-12 00:00:00'),
(3, 'PHP', 1, '2020-01-12 00:00:00'),
(4, 'JavaScript', 1, '2020-01-12 00:00:00'),
(5, 'Gojek', 2, '2020-01-12 00:00:00'),
(6, 'Grab', 2, '2020-01-12 00:00:00'),
(7, 'MySQL', 3, '2020-01-12 00:00:00'),
(8, 'MongoDB', 3, '2020-01-12 00:00:00'),
(9, 'PHP', 4, '2020-01-12 00:00:00'),
(10, 'Golang', 4, '2020-01-12 00:00:00'),
(11, 'Node JS', 4, '2020-01-12 00:00:00'),
(12, 'Phyton', 4, '2020-01-12 00:00:00'),
(13, 'Ruby', 4, '2020-01-12 00:00:00'),
(14, 'ASP', 4, '2020-01-12 00:00:00'),
(15, 'Vue JS', 5, '2020-01-12 00:00:00'),
(16, 'React JS', 5, '2020-01-12 00:00:00'),
(17, 'Angular JS', 5, '2020-01-12 00:00:00'),
(18, 'jQuery', 5, '2020-01-12 00:00:00'),
(19, 'CodeIgniter', 6, '2020-01-12 00:00:00'),
(20, 'Laravel', 6, '2020-01-12 00:00:00'),
(21, 'Symfony', 6, '2020-01-12 00:00:00'),
(22, 'Ruby On Rails', 6, '2020-01-12 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `subkat`
--
ALTER TABLE `subkat`
  ADD PRIMARY KEY (`id_subkat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subkat`
--
ALTER TABLE `subkat`
  MODIFY `id_subkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;