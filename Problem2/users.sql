-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 07:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Samsung` tinyint(1) NOT NULL DEFAULT 0,
  `Microsoft` tinyint(1) NOT NULL DEFAULT 0,
  `Google` tinyint(1) NOT NULL DEFAULT 0,
  `Apple` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `Samsung`, `Microsoft`, `Google`, `Apple`) VALUES
('sankar', 'sankar-123', 'sankarrao5690@gmail.com', 1, 0, 0, 0),
('Hema', 'hems', 'abc@gmail.com', 1, 0, 0, 0),
('Satish', 'Satish', 'Satish@gmail.com', 1, 0, 0, 0),
('saipriya', 'priya@99', 'saipriya454@gmail.com', 0, 0, 0, 0),
('saipriya9', 'priya@99', 'saipriya454@gmail.com', 0, 1, 0, 0),
('Harsha', '1234', 'Harsha@gmail.com', 1, 1, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
