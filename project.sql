-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 02, 2024 at 03:32 AM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `username`, `email`, `password_hash`) VALUES
(22, 'yameii1', 'newemail@gmail.com', '$2y$10$X/UZUiBpEn99Ec7rQ5DdjOPz9QYe9YlEIIm0cjU9a9bIV2J4jBieW'),
(24, 'max77418', 'mtikhon@siue.edu', '$2y$10$obCHijimkaVTZQYgDMEi5OEzZGPVWAoAEro7DEZVps1/xVCw9ufLi'),
(25, 'hello123', 'fafdsa@gamil.net', '$2y$10$8TerpO6AIb8HavwvtU56AeDmroUFVKU8MXpAJq7hzxA8pdnfOwsIa');

-- --------------------------------------------------------

--
-- Table structure for table `supplements`
--

CREATE TABLE `supplements` (
  `supplement_name` varchar(60) NOT NULL,
  `supplement_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplements`
--

INSERT INTO `supplements` (`supplement_name`, `supplement_link`) VALUES
('Creatine', 'https://en.wikipedia.org/wiki/Creatine'),
('Citruline-malate', 'https://en.wikipedia.org/wiki/Citrulline'),
('Caffeine', 'https://en.wikipedia.org/wiki/Caffeine'),
('Taurine', 'https://en.wikipedia.org/wiki/Taurine'),
('Niacin', 'https://en.wikipedia.org/wiki/Niacin'),
('Beta-alanine', 'https://en.wikipedia.org/wiki/%CE%92-Alanine'),
('Betaine', 'https://en.wikipedia.org/wiki/Betaine'),
('Tyrosine', 'https://en.wikipedia.org/wiki/Tyrosine'),
('Theanine', 'https://en.wikipedia.org/wiki/Theanine'),
('Carnitine', 'https://en.wikipedia.org/wiki/Carnitine'),
('Arginine', 'https://en.wikipedia.org/wiki/Arginine'),
('Nitrate', 'https://en.wikipedia.org/wiki/Nitrate'),
('Nitric oxide', 'https://en.wikipedia.org/wiki/Biological_functions_of_nitric_oxide'),
('Alpha GPC', 'https://en.wikipedia.org/wiki/Glycerophosphorylcholine'),
('Agmatine', 'https://en.wikipedia.org/wiki/Agmatine'),
('Glucose', 'https://en.wikipedia.org/wiki/Glucose');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `login_times` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `login_times`) VALUES
(22, '2024-12-01 21:13:42'),
(22, '2024-12-01 21:24:16'),
(24, '2024-12-01 21:28:02'),
(25, '2024-12-01 21:29:28'),
(25, '2024-12-01 21:29:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
