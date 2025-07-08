-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2025 at 06:16 PM
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
-- Database: `healthtracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `health_log`
--

CREATE TABLE `health_log` (
  `id` int(11) NOT NULL,
  `log_date` date NOT NULL,
  `sleep_hours` float DEFAULT NULL,
  `water_intake_liters` float DEFAULT NULL,
  `exercise_type` varchar(100) DEFAULT NULL,
  `mood` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `health_log`
--

INSERT INTO `health_log` (`id`, `log_date`, `sleep_hours`, `water_intake_liters`, `exercise_type`, `mood`, `notes`) VALUES
(1, '2025-07-01', 7.5, 2, 'Jogging', 'Energetic', 'Felt great after morning jog.'),
(2, '2025-07-02', 6, 1.5, 'Yoga', 'Relaxed', 'Did yoga to reduce stress.'),
(3, '2025-07-03', 8, 2.5, 'Gym', 'Motivated', 'Worked on strength training.'),
(4, '2025-07-04', 5.5, 1.2, 'None', 'Tired', 'Busy day, no workout.'),
(5, '2025-07-05', 7, 2, 'Cycling', 'Happy', 'Fun outdoor ride.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `health_log`
--
ALTER TABLE `health_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `health_log`
--
ALTER TABLE `health_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
