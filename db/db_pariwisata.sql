-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 10:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `booked_by` varchar(255) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `number_of_people` int(11) DEFAULT NULL,
  `accommodation` tinyint(1) NOT NULL,
  `transportation` tinyint(1) NOT NULL,
  `consumption` tinyint(1) NOT NULL,
  `duration` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','canceled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `location`, `description`, `price`, `created_at`) VALUES
(1, 'Tangkuban Perahu', 'Bandung, Jawa Barat', 'Gunung berapi aktif dengan kawah yang menakjubkan.', 0.00, '2024-08-13 15:21:25'),
(2, 'Kawah Putih', 'Bandung, Jawa Barat', 'Kawah vulkanik dengan air berwarna putih kehijauan.', 0.00, '2024-08-13 15:21:25'),
(3, 'Farm House Lembang', 'Lembang, Bandung', 'Tempat wisata dengan suasana ala Eropa dan peternakan.', 0.00, '2024-08-13 15:21:25'),
(4, 'Floating Market Lembang', 'Lembang, Bandung', 'Pasar terapung dengan berbagai makanan dan kerajinan.', 0.00, '2024-08-13 15:21:25'),
(5, 'Dusun Bambu', 'Lembang, Bandung', 'Tempat wisata alam dengan fasilitas rekreasi dan tempat makan.', 0.00, '2024-08-13 15:21:25'),
(6, 'Kebun Teh Ciwidey', 'Ciwidey, Bandung', 'Kebun teh dengan pemandangan hijau dan kegiatan berkebun.', 0.00, '2024-08-13 15:21:25'),
(7, 'Glamping Lakeside Rancabali', 'Rancabali, Bandung', 'Pengalaman glamping di tepi danau dengan fasilitas lengkap.', 0.00, '2024-08-13 15:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `destination_id`, `description`, `price`, `discount`, `duration`, `created_at`) VALUES
(1, 'Paket Wisata Tangkuban Perahu', 1, 'Nikmati keindahan kawah gunung berapi aktif Tangkuban Perahu dengan pemandangan yang menakjubkan dan udara pegunungan yang sejuk.', 350000.00, 0, '1 day', '2024-08-13 15:21:35'),
(2, 'Paket Wisata Kawah Putih', 2, 'Kunjungi kawah putih yang menawan danau vulkanik dengan air berwarna putih kehijauan yang indah dan suasana yang sejuk.', 400000.00, 3, '1 day', '2024-08-13 15:21:35'),
(3, 'Paket Wisata Farm House Lembang', 3, 'Jelajahi Farm House Lembang dengan suasana ala Eropa, peternakan, dan kebun binatang kecil yang cocok untuk seluruh keluarga.', 250000.00, 0, '1 day', '2024-08-13 15:21:35'),
(4, 'Paket Wisata Floating Market Lembang', 4, 'Rasakan pengalaman berbelanja di pasar terapung Lembang dengan berbagai makanan lokal dan kerajinan tangan yang unik.', 300000.00, 4, '1 day', '2024-08-13 15:21:35'),
(5, 'Paket Wisata Dusun Bambu', 5, 'Kunjungi Dusun Bambu yang menawarkan suasana alam yang indah dengan berbagai fasilitas rekreasi dan tempat makan yang nyaman.', 450000.00, 5, '1 day', '2024-08-13 15:21:35'),
(6, 'Paket Wisata Kebun Teh Ciwidey', 6, 'Nikmati keindahan kebun teh Ciwidey dengan udara segar dan pemandangan hijau yang memukau serta kegiatan berkebun dan pemetikan teh.', 350000.00, 1, '1 day', '2024-08-13 15:21:35'),
(7, 'Paket Wisata Glamping Lakeside Rancabali', 7, 'Pengalaman glamping di tepi danau dengan fasilitas lengkap dan pemandangan indah yang membuat liburan Anda lebih berkesan.', 500000.00, 0, '1 day', '2024-08-13 15:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` enum('credit_card','bank_transfer','paypal') NOT NULL,
  `status` enum('pending','completed','failed') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
