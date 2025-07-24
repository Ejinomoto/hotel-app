-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2025 at 02:09 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `fasilitas_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`fasilitas_id`, `name`, `description`, `gambar`, `is_deleted`) VALUES
(1, 'TV', 'TV 32\"', 'fasilitas-256fa78c2e.jpg', 0),
(2, 'Wifi', 'Wifi 30Gpbs', 'fasilitas-9c931e557d.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `fasilitas_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`fasilitas_id`, `name`, `is_deleted`) VALUES
(1, 'Box', 1),
(2, 'Brankas', 0),
(3, 'TV', 0),
(4, 'Working Desk', 0),
(5, 'Bathtub', 0),
(6, 'Water Heater', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `kamar_id` int NOT NULL,
  `tipe_kamar` varchar(100) NOT NULL,
  `jumlah_kamar` tinyint NOT NULL,
  `jumlah_order` tinyint NOT NULL,
  `harga` int NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `fasilitas_kamar` json NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kamar_id`, `tipe_kamar`, `jumlah_kamar`, `jumlah_order`, `harga`, `gambar`, `fasilitas_kamar`, `is_deleted`) VALUES
(1, 'Standard Room', 10, 10, 250000, 'kamar-c933b4105f.jpg', '[\"Brankas\"]', 0),
(2, 'Presidental Suite', 2, 5, 1000000, 'kamar-ba7fc75862.jpg', '[\"Working Desk\", \"Bathtub\", \"Water Heater\"]', 0),
(3, 'Honeymoon Suite', 20, 20, 500000, 'kamar-3029dc49cb.jpg', '[\"Brankas\", \"Bathtub\", \"Water Heater\"]', 0),
(4, 'Deluxe Room', 30, 30, 300000, 'kamar-f8c37ddba9.jpg', '[\"Brankas\", \"Working Desk\", \"Bathtub\"]', 0),
(5, 'Connecting Rooms', 4, 4, 500000, 'kamar-02a8f7a913.jpg', '[\"Box\", \"Bathtub\"]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int NOT NULL,
  `user_id` int NOT NULL,
  `kamar_id` int NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `notes` text NOT NULL,
  `room_view` text NOT NULL,
  `room_floor` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `user_id`, `kamar_id`, `check_in_date`, `check_out_date`, `notes`, `room_view`, `room_floor`, `total_price`, `status`, `created_at`) VALUES
(1, 4, 2, '2024-11-26', '2024-11-27', 'kokokoo', 'Beach View', 'Higher Floor', '1000000.00', 'pending', '2024-11-26 06:44:38'),
(2, 4, 2, '2024-12-03', '2024-12-04', 'ppp', 'Beach View', 'Lower Floor', '1000000.00', 'confirmed', '2024-12-03 04:28:08'),
(3, 3, 2, '2025-06-20', '2025-06-22', '', 'Beach View', 'Higher Floor', '2000000.00', 'confirmed', '2025-06-20 15:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','user','receptionist') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'Ezy', '$2y$10$C68PogIE0lTOuUHyhqHBiuC9uPSIuSg4MEe5VcpUHbCdecibDOdGG', 'iforgoragain@gmail.com', 'admin'),
(2, 'Resep', '$2y$10$6w9Ux0ChanttRE5rAhCO.OQPQg6qsAalQQKOyHI.muHdvBC4c.Wom', '111123@budiluhur.sch.id', 'receptionist'),
(3, 'Tamu', '$2y$10$TSuxmKW9bVJen8XBnjldmuQNJfimU2EHupSDItd8aOXeR76qvcF2G', 'bls1023@budiluhur.sch.id', 'user'),
(4, 'Ejinomoto', '$2y$10$CeecmaXUq6tBOUf4fgc6NeYMWkqAp2HI/5kvNfYsKwRhsYJd84saO', 'blsm13@budiluhur.sch.id', 'user'),
(5, 'Velociraptor', '$2y$10$BX.jQtjauehxHhPK.l.eeecl5gQRyJkA2jb.3FJGY93s1ZG0LX5EO', 'if1or111ain@gmail.com', 'user'),
(6, 'Eji1', '$2y$10$na0sBk9Xw9UxQlalLeJzyO8.Z5Bu5ujwrN1Wopna.hQd0QGO3bCxO', 'iforgoragain@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`fasilitas_id`);

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`fasilitas_id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kamar_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kamar_id` (`kamar_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `fasilitas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `fasilitas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `kamar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`kamar_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
