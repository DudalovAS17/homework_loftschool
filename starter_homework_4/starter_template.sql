-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2017 at 09:12 PM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starter_template`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` tinytext NOT NULL,
  `age` int(11) DEFAULT NULL,
  `description` text,
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `age`, `description`, `photo`) VALUES
(46, 'Sasha', 'Sasha', 'Саша', 21, 'Ноу коммент.', 'photos/46.jpg'),
(47, 'Nastya', 'Nastya', 'Настя', 22, 'Молодец', 'photos/47.jpg'),
(49, 'Masha', 'Masha', 'Маша', 22, 'Угу', 'photos/49.jpg'),
(50, 'Damir', 'Damir', 'Дамир', 21, '', 'photos/50.jpg'),
(51, 'Ilnur', 'Ilnur', 'Ильнур', 22, 'Груу', 'photos/51.jpg'),
(52, 'Egor', 'Egor', 'Егор', 23, 'alert(\'hi\')', 'photos/52.jpg'),
(53, 'Serega', '$2y$10$NOa5qdvIJnODDLFkr4r8xOnjtzec022.VDMC0HLIg.ThqeEjdxX9m', 'Серега', 23, 'TTT', 'photos/53.jpg'),
(54, 'Alex', '$2y$10$RdbufoejcPNXAD19e.Tvxu3MWdrB8Hwxd7XFZF1aGBmDb1yQPX0.K', 'Алекс', 23, 'йцукен', 'photos/54.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
