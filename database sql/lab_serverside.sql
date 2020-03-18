-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2020 at 10:03 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
