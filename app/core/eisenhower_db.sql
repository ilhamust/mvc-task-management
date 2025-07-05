-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2025 at 07:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eisenhower_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `importance` varchar(50) DEFAULT NULL,
  `quadrant` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `deadline`, `importance`, `quadrant`, `status`, `created_at`) VALUES
(17, 'apa ni', 'xixi', '2025-07-25', 'Tidak Penting', 'Quadrant 4', 'completed', '2025-07-02 13:51:13'),
(18, 'kerjain tu tugas', 'akwkw', '2025-07-03', 'Penting', 'Quadrant 1', 'pending', '2025-07-02 14:02:49'),
(19, 'coba urutkan', 'xixi', '2025-07-01', 'Tidak Penting', 'Quadrant 3', 'completed', '2025-07-02 14:04:14'),
(21, 'cek lag ni', 'hvj', '2025-07-04', 'Penting', 'Quadrant 1', 'pending', '2025-07-02 14:13:36'),
(22, 'cek', 'alks', '2025-07-03', 'Tidak Penting', 'Quadrant 3', 'completed', '2025-07-02 14:16:11'),
(23, 'OOP', 'Membuat Website Daftar Tugas', '2025-07-05', 'Penting', 'Quadrant 1', 'pending', '2025-07-03 04:26:21'),
(24, 'Coba eror kah', 'cek', '2025-07-05', 'Tidak Penting', 'Quadrant 3', 'completed', '2025-07-04 16:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Ilham', '$2y$10$LHt50uuXlJfIlOiW2DDbiO4/F/k/6PTyNonIlOM2h41Bn2xykceB2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
