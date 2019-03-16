-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2019 at 01:24 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `region_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `income` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `region_id`, `address`, `income`, `created_at`) VALUES
(1, 'Aditya Aulia Anza', 4, 'Solok Padang', '5000000', '2019-03-16 15:56:15'),
(3, 'Arya Fikri Kurniawan', 8, 'Jalan Raya', '3500000', '2019-03-16 16:22:25'),
(4, 'Abdul', 4, 'Padang', '3500000', '2019-03-16 16:29:33'),
(5, 'Rina', 4, 'Pariaman', '3000000', '2019-03-16 16:29:47'),
(6, 'Rani', 5, 'Pekanbaru', '3500000', '2019-03-16 16:30:18'),
(7, 'Hasbi', 6, 'Jakarta Utara', '1000000', '2019-03-16 16:30:34'),
(8, 'Genta', 7, 'Jambi Raya', '2000000', '2019-03-16 16:31:14'),
(9, 'Rizky', 8, 'Denpasar Raya', '1000000', '2019-03-16 16:31:38'),
(10, 'Riska', 4, 'Payakumbuh', '1000000', '2019-03-16 16:48:30'),
(11, 'Yudes', 7, 'Jambi Raya', '2000000', '2019-03-16 17:29:04'),
(12, 'Vina', 6, 'Jakarta Selatan', '1500000', '2019-03-16 17:29:21'),
(13, 'Melan', 6, 'Jakarta Utara', '2000000', '2019-03-16 17:30:01'),
(14, 'Hilda', 7, 'Jambi Raya', '1000000', '2019-03-16 17:30:30'),
(15, 'Nanda', 4, 'Padang Sidampuan', '1500000', '2019-03-16 17:31:02'),
(16, 'Riki', 8, 'Pulau Dewata Bali', '2000000', '2019-03-16 17:31:25'),
(17, 'Aziz', 5, 'Kampar', '2000000', '2019-03-16 17:35:24'),
(18, 'Mikel', 7, 'Kota Jambi', '1000000', '2019-03-16 17:35:57'),
(19, 'Zaki', 8, 'Kota Jambi', '1500000', '2019-03-16 17:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `region_name`, `created_at`) VALUES
(4, 'Padang', '2019-03-16 14:37:58'),
(5, 'Pekanbaru', '2019-03-16 14:38:54'),
(6, 'Jakarta', '2019-03-16 15:35:09'),
(7, 'Jambi', '2019-03-16 15:46:14'),
(8, 'Denpasar', '2019-03-16 16:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-03-16 13:05:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`region_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
