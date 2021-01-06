-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 09:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwords` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `passwords`, `user_type`) VALUES
(1, 'Sahil', 'meharsahil207@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', 'User'),
(3, 'Sid', 'smehar@academic.rrc.ca', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', 'User'),
(4, 'JKaur', 'php@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', 'Admin'),
(5, 'Harry', 'harry@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', 'User'),
(6, 'Riza', 'riza@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', ''),
(7, 'Karan', 'karan@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', 'User'),
(8, 'Jody', 'jodygillis@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', 'User'),
(9, 'Justin', 'justin@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', ''),
(10, 'Mike', 'mike@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', ''),
(12, 'Mehak', 'mehak@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', ''),
(13, 'Rajveer', 'rajveer@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', ''),
(14, 'gagan', 'gagan@gmail.com', '$2y$10$AKy7mLvPQ.gLkewkFcQ5/evNFRmE/145UiWf.qQNQOK4YJKEEXTNS', 'User'),
(15, 'Honey', 'honey@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', ''),
(19, 'Admin1', 'newid@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', 'Admin'),
(20, 'Administrator', 'admin@gmail.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', 'Admin'),
(21, 'Tylor', 'tylor@yahoo.com', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', 'User'),
(26, 'S.i.d', 'smehar@academic.rrc.ca', '$2y$10$0qLQEYcRKgPygC.EnOzD1eqw4gfZtiL8eXY.LiVzoF4UfTVDgwGgC', 'User'),
(27, 'S.a.h.i.l', 'smehar@academic.rrc.ca', '$2y$10$pHwwdqBJ4D52iCQiCq2BiO/fU3ng7n5hUgklhfxB8aSSStkAx12BG', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
