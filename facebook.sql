-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 02:42 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cell` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gendar` varchar(10) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `edu` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cell`, `username`, `password`, `gendar`, `photo`, `age`, `edu`, `status`, `trash`, `created_at`, `updated_at`) VALUES
(10, 'Md. Sadman Ahsan', 'ahsan.susmoy@gmail.com', '01756938000', 'dev_sadman', '$2y$10$giY0iG2kcCEwXIIByptDWOt82d0n0lE3x.yIoxj4abPMXe5CVM/zG', 'male', '1635560585_1766566917_1.jpg', 25, 'Jahangirnagar University', 1, 0, '2021-10-12 09:29:10', NULL),
(11, 'Sazia Zaman', 'sazia@gmail.com', '01750000001', 'sazia_dev', '$2y$10$PjOMss0uqyu8CFaAfW/hC.nopZBeZRP5hfjuxSEkW/PwD5SBklJ/m', 'female', '1635568239_187921366_f.jpg', NULL, NULL, 1, 0, '2021-10-12 09:31:55', NULL),
(12, 'Assad Valla lok', 'asad@gmail.com', '01616938300', 'assad_vala', '$2y$10$hIvKjNWuGVjrcmKAzaJQzuqGTomRk527B9b11v4/9eF6QVwnSAgFG', 'male', '1634444773_1228522046_index.jpg', 0, '', 1, 0, '2021-10-17 10:25:45', '2021-10-23 04:10:28'),
(13, 'Tony Ura', 'tony@gmail.com', '01616938301', 'tony_ura', '$2y$10$xFy/F47tKqlafXx8nUSV/OWXxhcIv7ivqxrYpb9t7vNWjtWsPx3HW', 'male', '1634444953_1121086271_index.jpg', NULL, NULL, 1, 0, '2021-10-17 10:27:14', NULL),
(14, 'Norman Vanua', 'noman@gmail.com', '01616938302', 'naman_vanua', '$2y$10$9O5YL8cNozSJ/EQFhKqzFOhLXM4hkCIJa3MHiYcTfabmo53mjGyoW', 'male', '1634445022_1554745436_index.jpg', NULL, NULL, 1, 0, '2021-10-17 10:28:52', NULL),
(15, 'Hakuna Matata', 'hakka@gmail.com', '01819430460', 'hakka', '$2y$10$g1Iask/1LgJLCvRoLyzfGe8DyFheaYm9VTmck1ZrOkzyNlhagr0WK', 'male', '1634958116_843249782_290827.10.jpg', NULL, NULL, 1, 0, '2021-10-23 08:59:42', NULL),
(16, 'Hamilton Masakadza', 'demo@gmail.com', '01713255352', 'dev_sadman_003', '$2y$10$Bgn3BxnlYOlFM/THCMuaJ.2zxoZu.YCfTIGCc8PRbYCtRmCHMAt.. ', 'Male', NULL, NULL, NULL, 1, 0, '2021-10-24 09:08:40', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
