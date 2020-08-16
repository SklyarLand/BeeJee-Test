-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 16, 2020 at 10:24 PM
-- Server version: 5.5.62
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e-mail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `edited` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `e-mail`, `content`, `closed`, `edited`) VALUES
(1, 'test', 'test@test.com', 'test job', 0, 0),
(2, 'имя', 'alex@examle.com', 'test', 1, 0),
(3, 'имя', 'alex@examle.com', 'test', 2, 0),
(4, 'имя', 'alex@examle.com', 'test', 0, 0),
(5, 'имя2', 'alex2@examle.com', '123', 0, 0),
(6, 'имя2', 'alex2@examle.com', '123', 0, 0),
(7, 'имя2', 'alex2@examle.com', '123', 0, 0),
(8, 'Александр', 'sushu@mail.com', ' Сделать админку', 1, 1),
(9, 'Игорь', 'igor@gmail.com', '    Отредактировано', 1, 1),
(10, 'имя', 'alex@examle.com', '   <script>alert(‘test’);</script>', 0, 1),
(11, 'имя', 'alex@examle.com', 'dsfsdf', 0, 0),
(12, 'имя', 'alex@examle.com', 'dfsdfdsf', 0, 0),
(13, 'имя', 'alex@examle.com', 'dfdsfsdfsd', 0, 0),
(14, 'имя', 'alex@examle.com', 'dfdsfsdfsd', 1, 0),
(15, 'имя', 'alex@examle.com', 'fdsf', 0, 0),
(16, 'имя', 'alex@examle.com', 'fdsf', 0, 0),
(17, 'имя', 'alex@examle.com', 'fdsf', 1, 0),
(18, 'имя', 'alex@examle.com', 'fdsf', 1, 1),
(19, 'имя', 'alex@examle.com', 'fdsfaasdf', 1, 1),
(20, 'имя', 'alex@examle.com', 'fdsfaasdff', 0, 1),
(21, 'Александр', 'sushu@examle.com', 'Обратная связь', 0, 1),
(22, 'имя', 'alex@examle.com', 'qdsfdsf', 0, 1),
(23, 'имя', 'alex@examle.com', 'Отредактировано', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
