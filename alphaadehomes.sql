-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 06:19 PM
-- Server version: 11.3.2-MariaDB
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alphaadehomes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `isVerify` tinyint(1) NOT NULL DEFAULT 0,
  `isDefault` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `status` enum('ACTIVE','DEACTIVATED','DELETED','') NOT NULL DEFAULT 'DEACTIVATED',
  `last_login` varchar(255) DEFAULT NULL,
  `roles_id` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `names`, `email`, `password`, `role_id`, `isVerify`, `isDefault`, `status`, `last_login`, `roles_id`, `created_at`, `updated_at`) VALUES
(1, 'Adedeji Richards', 'deeaxfun2@Gmail.com', '9bd6355e8c616dfb5be1c81158a8476b', 0, 0, 'NO', 'ACTIVE', NULL, NULL, '2024-06-01 14:53:19', NULL),
(28, 'Imoleayo Adeyeun', 'adeyeunimoleayo@gmail.com', 'f46e329f5e051fdc453529b645e860ee', 1, 1, 'NO', 'ACTIVE', NULL, NULL, '2024-06-16 21:52:11', NULL),
(29, 'Richards Boladale', 'adewumiadedeji27@gmail.com', '3c15f03457404a4bda7b96d24746a286', 1, 0, 'NO', 'DEACTIVATED', NULL, NULL, '2024-10-05 15:26:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `booking_date` varchar(50) DEFAULT NULL,
  `booking_time` varchar(50) DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `property_id`, `email`, `name`, `message`, `booking_date`, `booking_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'adewumiadedeji27@gmail.com', 'adewumiadedeji27@gmail.com', 'kgr jkbjjtrihjtiohjtioght', NULL, NULL, 'pending', '2024-10-09 00:37:06', '2024-10-09 00:37:06'),
(2, 6, 'adewumiadedeji27@gmail.com', 'adewumiadedeji27@gmail.com', 'kgr jkbjjtrihjtiohjtioght', NULL, NULL, 'pending', '2024-10-09 00:37:53', '2024-10-09 00:37:53'),
(3, 6, 'adewumiadedeji27@gmail.com', 'adewumiadedeji27@gmail.com', 'kgr jkbjjtrihjtiohjtioght', NULL, NULL, 'confirmed', '2024-10-09 00:38:13', '2024-10-09 15:46:28'),
(4, 6, 'adewumiadedeji27@gmail.com', 'adewumiadedeji27@gmail.com', 'kgr jkbjjtrihjtiohjtioght', NULL, NULL, 'pending', '2024-10-09 00:38:35', '2024-10-09 00:38:35'),
(5, 6, 'adewumiadedeji27@gmail.com', 'adewumiadedeji27@gmail.com', 'kgr jkbjjtrihjtiohjtioght', NULL, NULL, 'pending', '2024-10-09 00:38:55', '2024-10-09 00:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `role_id`, `url`, `created_at`) VALUES
(1, 1, 'GET /console=Dashboard->index', '2024-10-05 14:28:26'),
(2, 1, 'GET /console/logout = Home->logout', '2024-10-05 14:28:26'),
(3, 1, 'GET /console/download/@extention=Export->index', '2024-10-05 14:28:26'),
(4, 1, 'POST /console/candidate/validate=Home->validate', '2024-10-05 14:28:26'),
(5, 1, 'GET|POST /console/account/@id=Dashboard->candidate', '2024-10-05 14:28:26'),
(6, 1, 'GET|POST /console/client/account/@id=Dashboard->client', '2024-10-05 14:28:26'),
(7, 1, 'GET|POST /console/admin/account/@id=Dashboard->admin', '2024-10-05 14:28:26'),
(8, 1, 'GET /console/bookings=Booking->index', '2024-10-05 14:28:26'),
(9, 1, 'GET /console/properties=Property->index', '2024-10-05 14:28:26'),
(10, 1, 'GET /console/properties/@id=Property->detail', '2024-10-05 14:28:26'),
(11, 1, 'GET|POST /console/properties/new=Property->create', '2024-10-05 14:28:26'),
(12, 1, 'POST /console/properties/action/update=Property->performActions', '2024-10-05 14:28:26'),
(13, 1, 'POST /console/properties/remove=Property->removeProperty', '2024-10-05 14:28:26'),
(14, 1, 'GET /console/users=Users->index', '2024-10-05 14:28:26'),
(15, 1, 'GET /console/users/@id=Users->getUser', '2024-10-05 14:28:26'),
(16, 1, 'GET|POST /console/users/new=Users->create', '2024-10-05 14:28:26'),
(17, 1, 'POST /console/users/update=Users->update', '2024-10-05 14:28:26'),
(18, 1, 'GET /console/access/users=Staff->index', '2024-10-05 14:28:26'),
(19, 1, 'GET /console/access/users/@id=Staff->detail', '2024-10-05 14:28:26'),
(20, 1, 'GET|POST /console/acess/users/new=Staff->create', '2024-10-05 14:28:26'),
(21, 1, 'POST /console/access/users/action/update=Staff->performActions', '2024-10-05 14:28:26'),
(22, 1, 'POST /console/access/users/remove=Staff->removeStaff', '2024-10-05 14:28:26'),
(23, 1, 'GET /console/access/roles=Roles->index', '2024-10-05 14:28:26'),
(24, 1, 'GET /console/access/roles/@id=Roles->detail', '2024-10-05 14:28:26'),
(25, 1, 'GET|POST /console/acess/roles/new=Roles->create', '2024-10-05 14:28:26'),
(26, 1, 'GET /console/settings=Settings->index', '2024-10-05 14:28:26'),
(27, 1, 'GET /console/messaging/@id=Messaging->index', '2024-10-05 14:28:26'),
(28, 1, 'GET|POST /console/messaging/compose=Messaging->compose', '2024-10-05 14:28:26'),
(29, 2, 'GET /console=Dashboard->index', '2024-10-05 14:57:26'),
(30, 2, 'GET /console/logout = Home->logout', '2024-10-05 14:57:26'),
(31, 2, 'GET /console/download/@extention=Export->index', '2024-10-05 14:57:26'),
(32, 2, 'POST /console/candidate/validate=Home->validate', '2024-10-05 14:57:26'),
(33, 2, 'GET|POST /console/account/@id=Dashboard->candidate', '2024-10-05 14:57:26'),
(34, 2, 'GET|POST /console/client/account/@id=Dashboard->client', '2024-10-05 14:57:26'),
(35, 2, 'GET|POST /console/admin/account/@id=Dashboard->admin', '2024-10-05 14:57:26'),
(36, 2, 'GET /console/bookings=Booking->index', '2024-10-05 14:57:26'),
(37, 2, 'GET /console/properties=Property->index', '2024-10-05 14:57:26'),
(38, 2, 'GET /console/properties/@id=Property->detail', '2024-10-05 14:57:26'),
(39, 2, 'GET|POST /console/properties/new=Property->create', '2024-10-05 14:57:26'),
(40, 2, 'POST /console/properties/action/update=Property->performActions', '2024-10-05 14:57:26'),
(41, 2, 'POST /console/properties/remove=Property->removeProperty', '2024-10-05 14:57:26'),
(42, 2, 'GET /console/users=Users->index', '2024-10-05 14:57:26'),
(43, 2, 'GET /console/users/@id=Users->getUser', '2024-10-05 14:57:26'),
(44, 2, 'GET|POST /console/users/new=Users->create', '2024-10-05 14:57:26'),
(45, 2, 'POST /console/users/update=Users->update', '2024-10-05 14:57:26'),
(46, 2, 'GET /console/access/users=Staff->index', '2024-10-05 14:57:26'),
(47, 2, 'GET /console/access/users/@id=Staff->detail', '2024-10-05 14:57:26'),
(48, 2, 'GET|POST /console/acess/users/new=Staff->create', '2024-10-05 14:57:26'),
(49, 2, 'POST /console/access/users/action/update=Staff->performActions', '2024-10-05 14:57:26'),
(50, 2, 'POST /console/access/users/remove=Staff->removeStaff', '2024-10-05 14:57:26'),
(51, 2, 'GET /console/access/roles=Roles->index', '2024-10-05 14:57:26'),
(52, 2, 'GET /console/access/roles/@id=Roles->detail', '2024-10-05 14:57:26'),
(53, 2, 'GET|POST /console/acess/roles/new=Roles->create', '2024-10-05 14:57:26'),
(54, 2, 'GET /console/settings=Settings->index', '2024-10-05 14:57:26'),
(55, 2, 'GET /console/messaging/@id=Messaging->index', '2024-10-05 14:57:26'),
(56, 2, 'GET|POST /console/messaging/compose=Messaging->compose', '2024-10-05 14:57:26'),
(57, 3, 'GET /console=Dashboard->index', '2024-10-05 15:16:16'),
(58, 3, 'GET /console/logout = Home->logout', '2024-10-05 15:16:16'),
(59, 3, 'GET /console/download/@extention=Export->index', '2024-10-05 15:16:16'),
(60, 3, 'POST /console/candidate/validate=Home->validate', '2024-10-05 15:16:16'),
(61, 3, 'GET|POST /console/account/@id=Dashboard->candidate', '2024-10-05 15:16:16'),
(62, 3, 'GET|POST /console/client/account/@id=Dashboard->client', '2024-10-05 15:16:16'),
(63, 3, 'GET|POST /console/admin/account/@id=Dashboard->admin', '2024-10-05 15:16:16'),
(64, 3, 'GET /console/properties/@id=Property->detail', '2024-10-05 15:16:16'),
(65, 3, 'GET|POST /console/properties/new=Property->create', '2024-10-05 15:16:16'),
(66, 3, 'POST /console/properties/action/update=Property->performActions', '2024-10-05 15:16:16'),
(67, 3, 'POST /console/properties/remove=Property->removeProperty', '2024-10-05 15:16:16'),
(68, 3, 'GET /console/users=Users->index', '2024-10-05 15:16:16'),
(69, 3, 'GET /console/users/@id=Users->getUser', '2024-10-05 15:16:16'),
(70, 3, 'GET|POST /console/users/new=Users->create', '2024-10-05 15:16:16'),
(71, 3, 'POST /console/users/update=Users->update', '2024-10-05 15:16:16'),
(72, 3, 'GET /console/access/users=Staff->index', '2024-10-05 15:16:16'),
(73, 3, 'GET /console/access/users/@id=Staff->detail', '2024-10-05 15:16:16'),
(74, 3, 'GET|POST /console/acess/users/new=Staff->create', '2024-10-05 15:16:16'),
(75, 3, 'POST /console/access/users/action/update=Staff->performActions', '2024-10-05 15:16:16'),
(76, 3, 'POST /console/access/users/remove=Staff->removeStaff', '2024-10-05 15:16:16'),
(77, 3, 'GET /console/access/roles=Roles->index', '2024-10-05 15:16:16'),
(78, 3, 'GET /console/access/roles/@id=Roles->detail', '2024-10-05 15:16:16'),
(79, 3, 'GET|POST /console/acess/roles/new=Roles->create', '2024-10-05 15:16:16'),
(80, 3, 'GET /console/access/roles/@id/edit=Roles->edit', '2024-10-05 15:16:16'),
(81, 3, 'GET /console/messaging/@id=Messaging->index', '2024-10-05 15:16:16'),
(82, 3, 'GET|POST /console/messaging/compose=Messaging->compose', '2024-10-05 15:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `id` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `type` enum('CONTACT','FEEDBACK','SUBSCRIPTION') NOT NULL DEFAULT 'CONTACT',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messaging`
--

INSERT INTO `messaging` (`id`, `email`, `name`, `phone`, `subject`, `content`, `type`, `created_at`, `updated_at`) VALUES
(1, 'deeaxfun2@gmail.com', 'ADEDEJI RICHARDS', '08065627281', 'Testing reverse email', 'kj gjifrgfugitu grtiurtiturpt', 'CONTACT', '2024-10-08 13:02:58', '2024-10-08 13:02:58'),
(2, 'deeaxfun2@gmail.com', 'ADEDEJI RICHARDS', '08065627281', 'Testing reverse email', 'kj gjifrgfugitu grtiurtiturpt', 'CONTACT', '2024-10-08 13:03:21', '2024-10-08 13:03:21'),
(3, 'deeaxfun2@gmail.com', 'ADEDEJI RICHARDS', '08065627281', 'Testing reverse email', 'kj gjifrgfugitu grtiurtiturpt', 'CONTACT', '2024-10-08 13:03:44', '2024-10-08 13:03:44'),
(4, 'deeaxfun2@gmail.com', 'ADEDEJI RICHARDS', '08065627281', 'Testing reverse email', 'kj gjifrgfugitu grtiurtiturpt', 'CONTACT', '2024-10-08 13:05:30', '2024-10-08 13:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NULL DEFAULT current_timestamp(),
  `payment_status` enum('pending','completed','failed') NOT NULL DEFAULT 'pending',
  `payment_method` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `category` enum('LEASE','RENT','SALE','AIR BNB','SPACE') NOT NULL DEFAULT 'LEASE',
  `type` enum('RESIDENTIAL','BUSINESS','COMMERCIAL','HALLS','HIGH RISE','LAND') NOT NULL DEFAULT 'RESIDENTIAL',
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `bedrooms` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `square_feet` int(11) DEFAULT NULL,
  `ratings` varchar(10) DEFAULT '0:0',
  `views` int(11) NOT NULL DEFAULT 0,
  `status` enum('pending','publish') NOT NULL DEFAULT 'pending',
  `availability` enum('available','sold') NOT NULL DEFAULT 'available',
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `default_picture` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `category`, `type`, `title`, `description`, `price`, `bedrooms`, `bathrooms`, `square_feet`, `ratings`, `views`, `status`, `availability`, `address`, `city`, `state`, `zip_code`, `latitude`, `longitude`, `default_picture`, `created_at`, `updated_at`) VALUES
(3, 'SALE', 'BUSINESS', 'Application for Full stack Software engineer', '', '100.00', 2, 3, 55, '0:0', 0, 'publish', 'available', 'rjvnrgnt', 'fvgbt', 'fvfrgbth', 'fggthg', 'fbgrbh', 'fgt', NULL, '2024-10-06 10:06:45', '2024-10-09 17:15:28'),
(5, 'SALE', 'COMMERCIAL', 'Application for Full stack Software engineer', '', '100.00', 2, 3, 55, '0:0', 0, 'publish', 'available', 'vrfvgtrgh', 'fvgbt', 'fvfrgbth', 'fggthg', 'fbgrbh', 'fgt', NULL, '2024-10-06 10:25:13', '2024-10-09 17:15:32'),
(6, 'SALE', 'BUSINESS', 'Application for Full stack Software engineer', 'This is like the same promise as end-to-end-encrypted\r\n messaging, but for web browsing and other forms of communication, but \r\nunlike WhatsApp or Signal where it\'s definitely your best friend or \r\nlover at the other end of the connection, instead it\'s your [maybe] \r\nfavourite ', '100.00', 2, 3, 55, '0:0', 0, 'publish', 'available', 'vrfvgtrgh', 'Akure', 'fvfrgbth', 'fggthg', 'fbgrbh', 'fgt', NULL, '2024-10-07 15:06:14', '2024-10-09 17:15:34'),
(7, 'SALE', 'BUSINESS', 'Application for Full stack Software engineer', '', '100.00', 2, 3, 55, '26.2:5', 0, 'publish', 'available', 'rjvnrgnt', 'fvgbt', 'fvfrgb', 'fggthg', 'fbgrbh', 'fgt', NULL, '2024-10-06 10:06:45', '2024-10-09 18:31:44'),
(8, 'SALE', 'BUSINESS', 'Application for Full stack Software engineer', 'This is like the same promise as end-to-end-encrypted\r\n messaging, but for web browsing and other forms of communication, but \r\nunlike WhatsApp or Signal where it\'s definitely your best friend or \r\nlover at the other end of the connection, instead it\'s your [maybe] \r\nfavourite ', '100.00', 2, 3, 55, '0:0', 0, 'publish', 'available', 'vrfvgtrgh', 'Akure', 'fvfrgbth', 'fggthg', 'fbgrbh', 'fgt', NULL, '2024-10-07 15:06:14', '2024-10-09 17:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `is_primary` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `privileges` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`privileges`)),
  `status` enum('ACTIVE','DEACTIVATE') NOT NULL DEFAULT 'ACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `remark`, `privileges`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Control unit', NULL, '{\"\'select\'\":\"on\",\"\'insert\'\":\"on\",\"\'update\'\":\"on\",\"\'delete\'\":\"on\",\"\'download\'\":\"on\",\"\'print\'\":\"on\"}', 'ACTIVE', '2024-10-05 14:28:26', '2024-10-05 14:28:26'),
(2, 'Control units', NULL, '{\"select\":\"on\",\"insert\":\"on\",\"update\":\"on\",\"delete\":\"on\"}', 'ACTIVE', '2024-10-05 14:57:26', '2024-10-05 14:57:26'),
(3, 'Account unit', NULL, '{\"select\":\"on\",\"insert\":\"on\",\"update\":\"on\",\"download\":\"on\",\"print\":\"on\"}', 'ACTIVE', '2024-10-05 15:16:16', '2024-10-05 15:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `saved_searches`
--

CREATE TABLE `saved_searches` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `search_criteria` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`search_criteria`)),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','agent','client') NOT NULL DEFAULT 'client',
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `user_id` (`email`),
  ADD KEY `idx_booking_date` (`booking_date`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_property_status` (`status`),
  ADD KEY `idx_property_city` (`city`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_searches`
--
ALTER TABLE `saved_searches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_user_role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saved_searches`
--
ALTER TABLE `saved_searches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_images`
--
ALTER TABLE `property_images`
  ADD CONSTRAINT `property_images_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_searches`
--
ALTER TABLE `saved_searches`
  ADD CONSTRAINT `saved_searches_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
