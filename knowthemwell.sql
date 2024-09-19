-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2024 at 05:37 PM
-- Server version: 11.3.2-MariaDB
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowthemwell`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) NOT NULL,
  `type` enum('CANDIDACY','EXECUTIVE','LEGISLATIVE') NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('FEMALE','MALE') NOT NULL DEFAULT 'FEMALE',
  `dob` varchar(25) NOT NULL,
  `state` varchar(200) NOT NULL,
  `lga` varchar(200) NOT NULL,
  `town` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `position` bigint(20) NOT NULL,
  `political_party` bigint(20) NOT NULL,
  `previous_offices` varchar(255) DEFAULT NULL,
  `date_join_politics` varchar(255) DEFAULT NULL,
  `manifesto` text DEFAULT NULL,
  `ideology` text DEFAULT NULL,
  `verdict` varchar(255) DEFAULT NULL,
  `picture_path` varchar(255) DEFAULT NULL,
  `use_on_homepage` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `publish_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `type`, `name`, `gender`, `dob`, `state`, `lga`, `town`, `citizenship`, `occupation`, `religion`, `position`, `political_party`, `previous_offices`, `date_join_politics`, `manifesto`, `ideology`, `verdict`, `picture_path`, `use_on_homepage`, `created_at`, `updated_at`, `publish`, `publish_at`) VALUES
(1, 'EXECUTIVE', 'ADEDEJI RICHARDS', 'MALE', '2024-07-01', 'Anambra', 'Aguata', 'Akure', 'Nigeria', 'IT', 'Traditional', 1, 1, 'IT', '2024-07-01', '', 'tuhioyuiyh', 'High Performance', 'ui/uploads/candidates/c4ca4238a0b923820dcc509a6f75849b.png', 1, '2024-07-30 21:50:37', '2024-07-30 21:50:37', 1, '2024-07-31 13:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_education`
--

CREATE TABLE `candidate_education` (
  `id` bigint(20) NOT NULL,
  `cand_id` bigint(20) NOT NULL,
  `school` varchar(255) NOT NULL,
  `from_` varchar(50) NOT NULL,
  `to_` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cand_track_record`
--

CREATE TABLE `cand_track_record` (
  `id` bigint(20) NOT NULL,
  `cand_id` bigint(20) NOT NULL,
  `records` text NOT NULL,
  `record_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `id` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `type` enum('CONTACT','FEEDBACK','SUBSCRIPTION') NOT NULL DEFAULT 'CONTACT',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance_index`
--

CREATE TABLE `performance_index` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('ACTIVE','DEACTIVATED') NOT NULL DEFAULT 'ACTIVE',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance_index`
--

INSERT INTO `performance_index` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Commitment to Democracy, Human Rights, and Gender Equality', 'ACTIVE', '2024-07-22 11:04:47', '2024-07-22 11:04:47'),
(2, 'Commitment to Poverty and Eradication', 'ACTIVE', '2024-07-22 11:04:47', '2024-07-22 11:04:47'),
(3, 'Commitment to Ending Corruption in Public Offices and Society', 'ACTIVE', '2024-07-22 11:08:09', '2024-07-22 11:08:09'),
(4, 'Commitment to Socio-Economic Development and Environmental Protection', 'ACTIVE', '2024-07-22 11:08:09', '2024-07-22 11:08:09'),
(5, 'Commitment to Education and Social Change', 'ACTIVE', '2024-07-22 11:08:39', '2024-07-22 11:08:39'),
(6, 'Commitment and Approach to Internal Security and Public Safety', 'ACTIVE', '2024-07-22 11:08:39', '2024-07-22 11:08:39'),
(7, 'Commitment and Approach to Peace and Conflict Resolution', 'ACTIVE', '2024-07-22 11:09:27', '2024-07-22 11:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `performance_metrics`
--

CREATE TABLE `performance_metrics` (
  `id` bigint(20) NOT NULL,
  `cand_id` bigint(20) NOT NULL,
  `index_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance_metrics`
--

INSERT INTO `performance_metrics` (`id`, `cand_id`, `index_id`, `created_at`, `updated_at`) VALUES
(9, 1, 1, '2024-07-31 13:10:15', '2024-07-31 13:10:15'),
(10, 1, 5, '2024-07-31 13:10:59', '2024-07-31 13:10:59'),
(11, 1, 6, '2024-07-31 13:11:46', '2024-07-31 13:11:46'),
(12, 1, 7, '2024-07-31 13:11:54', '2024-07-31 13:11:54'),
(13, 1, 1, '2024-07-31 16:43:57', '2024-07-31 16:43:57'),
(14, 1, 1, '2024-07-31 16:44:08', '2024-07-31 16:44:08'),
(15, 1, 1, '2024-07-31 16:44:08', '2024-07-31 16:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `performance_metrics_details`
--

CREATE TABLE `performance_metrics_details` (
  `id` bigint(20) NOT NULL,
  `metric_id` bigint(20) NOT NULL,
  `promise` text NOT NULL,
  `p_signal` varchar(255) NOT NULL,
  `actual_doings` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance_metrics_details`
--

INSERT INTO `performance_metrics_details` (`id`, `metric_id`, `promise`, `p_signal`, `actual_doings`) VALUES
(3, 9, '', 'High Performance', ''),
(5, 10, '', 'Medium Performance', ''),
(6, 11, '', 'High Performance', ''),
(7, 12, '', 'Medium Performance', ''),
(8, 13, '', 'High Performance', ''),
(9, 14, '', 'High Performance', ''),
(10, 15, '', 'High Performance', '');

-- --------------------------------------------------------

--
-- Table structure for table `political_parties`
--

CREATE TABLE `political_parties` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `party_color` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `political_parties`
--

INSERT INTO `political_parties` (`id`, `name`, `party_color`, `created_at`, `updated_at`) VALUES
(1, 'APC', NULL, '2024-07-30 21:33:00', '2024-07-30 21:33:00'),
(2, 'PDP', NULL, '2024-07-30 21:33:00', '2024-07-30 21:33:00'),
(3, 'LP', NULL, '2024-07-30 21:33:14', '2024-07-30 21:33:14'),
(4, 'APGA', NULL, '2024-07-30 21:33:14', '2024-07-30 21:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `political_positions`
--

CREATE TABLE `political_positions` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `abbr` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `political_positions`
--

INSERT INTO `political_positions` (`id`, `name`, `abbr`, `created_at`, `updated_at`) VALUES
(1, 'President', 'PRS', '2024-07-22 13:01:10', '2024-07-22 13:01:10'),
(2, 'Vice-President', 'VPRS', '2024-07-22 13:01:10', '2024-07-22 13:01:10'),
(3, 'Senators', 'LG_SNTR', '2024-07-22 13:03:31', '2024-07-22 13:03:31'),
(4, 'House of Representative', 'LG_HOS', '2024-07-22 13:03:31', '2024-07-22 13:03:31'),
(5, 'Governor', 'GOV', '2024-07-22 13:03:31', '2024-07-22 13:03:31'),
(6, 'Deputy Governor', 'DGOV', '2024-07-22 13:03:31', '2024-07-22 13:03:31'),
(7, 'LG Chiarman', 'LGA_CHR', '2024-07-22 13:03:31', '2024-07-22 13:03:31'),
(8, 'Ward Councillor', 'LGA_WCCL', '2024-07-22 13:03:31', '2024-07-22 13:03:31'),
(9, 'House of Assembly', 'HOA', '2024-07-22 13:06:17', '2024-07-22 13:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `menus` text DEFAULT NULL,
  `status` enum('ACTIVE','DEACTIVATE') NOT NULL DEFAULT 'ACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isVerify` tinyint(1) NOT NULL DEFAULT 0,
  `isDefault` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `status` enum('ACTIVE','DEACTIVATED','DELETED','') NOT NULL DEFAULT 'DEACTIVATED',
  `last_login` varchar(255) DEFAULT NULL,
  `roles_id` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `names`, `email`, `password`, `isVerify`, `isDefault`, `status`, `last_login`, `roles_id`, `created_at`, `updated_at`) VALUES
(1, 'Adedeji Richards', 'deeaxfun2@Gmail.com', '9bd6355e8c616dfb5be1c81158a8476b', 0, 'NO', 'ACTIVE', NULL, NULL, '2024-06-01 14:53:19', NULL),
(28, 'Imoleayo', 'adeyeunimoleayo@gmail.com', 'f46e329f5e051fdc453529b645e860ee', 1, 'NO', 'ACTIVE', NULL, NULL, '2024-06-16 21:52:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `political_position_index` (`position`);

--
-- Indexes for table `candidate_education`
--
ALTER TABLE `candidate_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_education_index` (`cand_id`);

--
-- Indexes for table `cand_track_record`
--
ALTER TABLE `cand_track_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cand_track_index` (`cand_id`);

--
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_index`
--
ALTER TABLE `performance_index`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `metric_unique` (`name`);

--
-- Indexes for table `performance_metrics`
--
ALTER TABLE `performance_metrics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metric_cand_index` (`cand_id`),
  ADD KEY `metric_index_ind` (`index_id`);

--
-- Indexes for table `performance_metrics_details`
--
ALTER TABLE `performance_metrics_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metric_detail_index` (`metric_id`);

--
-- Indexes for table `political_parties`
--
ALTER TABLE `political_parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `political_positions`
--
ALTER TABLE `political_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate_education`
--
ALTER TABLE `candidate_education`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cand_track_record`
--
ALTER TABLE `cand_track_record`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performance_index`
--
ALTER TABLE `performance_index`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `performance_metrics`
--
ALTER TABLE `performance_metrics`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `performance_metrics_details`
--
ALTER TABLE `performance_metrics_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `political_parties`
--
ALTER TABLE `political_parties`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `political_positions`
--
ALTER TABLE `political_positions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate_education`
--
ALTER TABLE `candidate_education`
  ADD CONSTRAINT `candidate_education_ibfk_1` FOREIGN KEY (`cand_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cand_track_record`
--
ALTER TABLE `cand_track_record`
  ADD CONSTRAINT `cand_track_record_ibfk_1` FOREIGN KEY (`cand_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `performance_metrics`
--
ALTER TABLE `performance_metrics`
  ADD CONSTRAINT `performance_metrics_ibfk_1` FOREIGN KEY (`cand_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `performance_metrics_ibfk_2` FOREIGN KEY (`index_id`) REFERENCES `performance_index` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `performance_metrics_details`
--
ALTER TABLE `performance_metrics_details`
  ADD CONSTRAINT `performance_metrics_details_ibfk_1` FOREIGN KEY (`metric_id`) REFERENCES `performance_metrics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roles_user_fk` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
