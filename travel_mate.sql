-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 09:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_mate`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `pick_up_time` time(6) NOT NULL,
  `pick_up_date` date NOT NULL,
  `pick_up_location` varchar(100) NOT NULL,
  `drop_off_location` varchar(100) NOT NULL,
  `vehicle_model` varchar(50) NOT NULL,
  `ride_distance` double NOT NULL,
  `ride_cost` double NOT NULL,
  `payment_method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `full_name`, `phone_number`, `pick_up_time`, `pick_up_date`, `pick_up_location`, `drop_off_location`, `vehicle_model`, `ride_distance`, `ride_cost`, `payment_method`) VALUES
(12, 'Afsa Riaz', 2147483647, '22:42:00.000000', '2023-09-30', 'Rani Bagh, Hyderabad, Pakistan', 'Thandi Sarak, Hyderabad, Pakistan', 'BMW 3', 1.2, 420, 'by_hand'),
(13, 'Afsa Riaz', 2147483647, '03:32:00.000000', '2023-10-07', 'Rani Bagh, Hyderabad, Pakistan', 'Thandi Sarak, Hyderabad, Pakistan', 'Audi 1', 1.2, 240, 'by_card'),
(14, 'Afsa Riaz', 2147483647, '02:11:00.000000', '2023-10-06', 'Rani Bagh, Hyderabad, Pakistan', 'Thandi Sarak, Hyderabad, Pakistan', 'Audi 1', 1.2, 240, 'by_hand'),
(15, 'Ilsa Naeem', 2147483647, '11:49:00.000000', '2023-10-07', 'Rani Bagh, Hyderabad, Pakistan', 'Thandi Sarak, Hyderabad, Pakistan', 'Audi 1', 1.2, 240, 'by_card'),
(16, 'Saba Saeed', 2147483647, '12:15:00.000000', '2023-09-30', 'Rani Bagh, Hyderabad, Pakistan', 'Thandi Sarak, Hyderabad, Pakistan', 'Audi 1', 1.2, 240, 'by_hand'),
(17, 'Saba Saeed', 2147483647, '18:12:00.000000', '2023-10-07', 'Rani Bagh, Hyderabad, Pakistan', 'Thandi Sarak, Hyderabad, Pakistan', 'BMW 2', 1.2, 360, 'by_card'),
(18, 'Saba Saeed', 2147483647, '12:32:00.000000', '2023-10-06', 'Rani Bagh, Hyderabad, Pakistan', 'Thandi Sarak, Hyderabad, Pakistan', 'Audi 2', 1.2, 300, 'by_hand'),
(19, 'Saba Saeed', 2147483647, '17:33:00.000000', '2023-10-06', 'Rani Bagh, Hyderabad, Pakistan', 'Thandi Sarak, Hyderabad, Pakistan', 'Audi 3', 1.2, 360, 'by_card');

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `id` int(50) NOT NULL,
  `booking_id` int(50) NOT NULL,
  `card_number` int(20) NOT NULL,
  `card_holder_name` varchar(50) NOT NULL,
  `card_expiry` date NOT NULL,
  `card_cvc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_details`
--

INSERT INTO `card_details` (`id`, `booking_id`, `card_number`, `card_holder_name`, `card_expiry`, `card_cvc`) VALUES
(2, 13, 2147483647, 'Afsa Riaz', '2023-10-07', 123),
(3, 15, 2147483647, 'Ilsa Naeem', '2023-10-07', 123),
(4, 17, 2147483647, 'Saba Saeed', '2023-10-01', 123),
(5, 19, 2147483647, 'Saba Saeed', '2023-10-06', 123);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `date`) VALUES
(10, 'Afsa Riaz', 'afsa.riaz123@gmail.com', '2fea4d58bf48e4756a33e4e556f12e20', '2023-09-30'),
(11, 'Ilsa Naeem', 'ilsa@gmail.com', '7be8265ef0bcfce119fc4ce3bb128213', '2023-09-30'),
(12, 'Saba Saeed', 'saba@gmail.com', '5ef8bdb1a8730859dce2f334f3f0d032', '2023-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(255) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `seat` int(10) NOT NULL,
  `luggage` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `brand_name`, `model_name`, `seat`, `luggage`, `total`) VALUES
(1, 'Audi', 'Audi 1', 4, 2, 10),
(2, 'Audi', 'Audi 2', 4, 3, 10),
(3, 'Audi', 'Audi 3', 4, 4, 10),
(4, 'BMW', 'BMW 1', 4, 2, 10),
(5, 'BMW', 'BMW 2', 4, 3, 10),
(6, 'BMW', 'BMW 3', 4, 4, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `card_details`
--
ALTER TABLE `card_details`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
