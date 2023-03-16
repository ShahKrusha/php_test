-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 11:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `category_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `contactno`) VALUES
(1, 'krusha', 'kshah', 'krushashah18@gmail.com', '8238475793'),
(2, 'admin', '0f2797f2182804d0cc7f0b85d254c146', 'admin@gmail.com', '8597456250'),
(3, 'harnisha', 'fbfdcd3d876d92ee02c50cf180246b71', 'harnisha12@gmail.com', '8320545329'),
(4, 'keyur', 'df62b40f2418f8e7f294be7283c4da54', 'keyur@gmail.com', '6587452015'),
(5, 'ram', '03f8dc81b32582404a66456dc94acddd', 'ram@gmail.com', '8569745088'),
(6, 'kesha', '10f27a4971a4c515ef9753407f775325', 'kkskks1806@gmail.com', '6358745099'),
(7, 'kajal', 'c64d2d53541dc7d610b59dea08369c66', 'kajal@gmail.com', '7894561230'),
(8, 'harnisha', 'fbfdcd3d876d92ee02c50cf180246b71', 'hp12@gmail.com', '9874589045'),
(9, 'aa', 'c2727f65c5de18503d5360f4c10c9cc9', 'aa@gmail.com', '6987450012'),
(10, 'Rudu', 'a452b6907388c17b4f761019158e30af', 'rudu@gmail.com', '5698745500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
