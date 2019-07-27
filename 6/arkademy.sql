-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 04:42 PM
-- Server version: 10.3.16-MariaDB
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
-- Database: `arkademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) NOT NULL,
  `salary` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `salary`) VALUES
(2, '10000000'),
(3, '12000000');

-- --------------------------------------------------------

--
-- Table structure for table `nama`
--

CREATE TABLE `nama` (
  `id` int(10) NOT NULL,
  `name` varchar(256) NOT NULL,
  `id_work` int(10) NOT NULL,
  `id_salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nama`
--

INSERT INTO `nama` (`id`, `name`, `id_work`, `id_salary`) VALUES
(48, 'Alfian', 1, 3),
(60, 'Rebecca', 1, 2),
(61, 'Vita', 2, 3),
(62, 'Huda', 2, 3),
(63, 'Kiky', 1, 2),
(66, 'Kikin', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(10) NOT NULL,
  `name` varchar(256) NOT NULL,
  `id_salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `name`, `id_salary`) VALUES
(1, 'Front End Dev', 2),
(2, 'Back End Dev', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nama`
--
ALTER TABLE `nama`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_work` (`id_work`),
  ADD KEY `id_salary` (`id_salary`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_salary` (`id_salary`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nama`
--
ALTER TABLE `nama`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nama`
--
ALTER TABLE `nama`
  ADD CONSTRAINT `nama_ibfk_1` FOREIGN KEY (`id_salary`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `nama_ibfk_2` FOREIGN KEY (`id_work`) REFERENCES `work` (`id`);

--
-- Constraints for table `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_ibfk_2` FOREIGN KEY (`id_salary`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
