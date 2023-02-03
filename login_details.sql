-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 04:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `Id` int(10) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `admin_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`Id`, `Password`, `admin_name`) VALUES
(11111, 'J@swanth1', 'admin1'),
(22222, 'admin@2', 'Admin_@2'),
(33333, 'admin@3', 'Admin_3');

-- --------------------------------------------------------

--
-- Table structure for table `userreg`
--

CREATE TABLE `userreg` (
  `firstname` varchar(25) NOT NULL,
  `Rollnumber` int(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userreg`
--

INSERT INTO `userreg` (`firstname`, `Rollnumber`, `Email`, `Password`) VALUES
('Jaswanth', 11111, 'ja@gmail.com', '$2y$10$THkg.6tkvKQPARAlefdjC.4L09nQg4cm4xZkYmvw1JDuBlEExrbGq'),
('J@swanth', 12155, 'Jasw@gmail.com', '$2y$10$XgGdeaesWor.6bVfnPUQXeh2acCVkoQ7QRCIT.E8.7sMqmSzECHb2'),
('darapaneni jaswanth', 66666, 'Jaswanth123456@gmail.com', '$2y$10$ZKY05FiC5ZUmDne/5uCheuju2XdpIQvZKgEC8ZJEtFwGXLjKhB9UC'),
('Jaswanth', 88888, 'Jsad1@gmail.com', '$2y$10$K411CZx6qbD.3R6RcyIuWuyhf124LJcR5mhqIYgweXFAgzR7AWDzm'),
('Jaswanth', 99999, 'Jaswanth1234@gmail.com', '$2y$10$KtOsrVfKj6GdLXmOGQ7f..i5tLnwnGXqX3nsswjZjP6Op9LSjNkMm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `userreg`
--
ALTER TABLE `userreg`
  ADD UNIQUE KEY `Rollnumber` (`Rollnumber`),
  ADD UNIQUE KEY `Email` (`Email`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
