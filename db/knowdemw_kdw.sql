-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2024 at 11:35 PM
-- Server version: 8.0.36-cll-lve
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowdemw_kdw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `display` varchar(300) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `display`, `email`, `phone`, `username`, `password`) VALUES
(1, 'Administrator', 'info@knowdemwell.com', '0800000000', 'admin', '7516c3b35580b3490248629cff5e498c');

-- --------------------------------------------------------

--
-- Table structure for table `contact_kdm`
--

CREATE TABLE `contact_kdm` (
  `id` int NOT NULL,
  `fullname` varchar(150) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `subject` text,
  `message` text,
  `date_uploaded` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_kdm`
--

INSERT INTO `contact_kdm` (`id`, `fullname`, `email`, `subject`, `message`, `date_uploaded`) VALUES
(1, 'Imoleayo Adeyeun', 'adeyeunimoleayo@gmail.com', 'Refund', '6j6tjtyjyu', 'Feb 16, 2024'),
(2, 'Bola Tinubu', 'adeyeunimoleaggggggyo@gmail.co', '', '', 'Feb 16, 2024'),
(3, 'Imoleayo Adeyeun', 'adeyeunimoj6yjjjjleayo@gmail.c', '', '', 'Feb 16, 2024'),
(4, 'Imoleayo Adeyeun', 'adeyeunimoleayo@gmail.com', '', '', 'Feb 16, 2024'),
(5, 'Imoleayo Adeyeun', 'adeyeunimoleayo@gmail.com', '', '', 'Feb 16, 2024'),
(6, 'Peter Obi', 'adeyeunimoleayo@gmail.com', '', '', 'Feb 16, 2024'),
(7, 'Imoleayo Michael Adeyeun', 'adeyeunimoleayo@gmail.com', '', '', 'Feb 16, 2024'),
(8, 'Bola Tinubu', 'adeyeunimoleayo@gmail.com', '', '', 'Feb 16, 2024'),
(9, 'Bola Tinubu', 'adeyeunimoleayo@gmail.com', '', '', 'Feb 16, 2024'),
(10, 'Imoleayo Adeyeun', 'adeyeunimoleayo@gmail.com', '', '', 'Feb 16, 2024'),
(11, 'Michael', 'adeyeunimoleayo@gmail.com', '', '', 'Feb 16, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id` int NOT NULL,
  `log_time` varchar(30) DEFAULT NULL,
  `log_date` varchar(30) DEFAULT NULL,
  `log_type` varchar(30) DEFAULT NULL,
  `admin_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id`, `log_time`, `log_date`, `log_type`, `admin_id`) VALUES
(1, '8:17:46', 'Dec 3, 2023', 'login', '1'),
(2, '8:29:55', 'Dec 3, 2023', 'login', '1'),
(3, '10:07:13', 'Dec 3, 2023', 'login', '1'),
(4, '12:40:05', 'Dec 3, 2023', 'login', '1'),
(5, '13:21:56', 'Dec 3, 2023', 'login', '1'),
(6, '13:53:10', 'Dec 3, 2023', 'login', '1'),
(7, '14:49:24', 'Dec 3, 2023', 'login', '1'),
(8, '15:52:27', 'Dec 3, 2023', 'login', '1'),
(9, '18:20:47', 'Dec 3, 2023', 'login', '1'),
(10, '21:06:00', 'Dec 3, 2023', 'login', '1'),
(11, '14:38:12', 'Dec 5, 2023', 'login', '1'),
(12, '22:47:06', 'Dec 5, 2023', 'login', '1'),
(13, '23:39:54', 'Dec 5, 2023', 'login', '1'),
(14, '10:37:54', 'Dec 6, 2023', 'login', '1'),
(15, '21:26:34', 'Dec 6, 2023', 'login', '1'),
(16, '22:14:24', 'Dec 6, 2023', 'login', '1'),
(17, '16:40:26', 'Dec 7, 2023', 'login', '1'),
(18, '0:15:38', 'Dec 8, 2023', 'login', '1'),
(19, '0:16:28', 'Dec 8, 2023', 'login', '1'),
(20, '1:55:03', 'Dec 10, 2023', 'login', '1'),
(21, '3:12:49', 'Dec 10, 2023', 'login', '1'),
(22, '4:21:22', 'Dec 10, 2023', 'login', '1'),
(23, '18:58:50', 'Dec 11, 2023', 'login', '1'),
(24, '18:59:47', 'Dec 11, 2023', 'login', '1'),
(25, '19:05:14', 'Dec 12, 2023', 'login', '1'),
(26, '21:59:11', 'Dec 18, 2023', 'login', '1'),
(27, '22:18:14', 'Dec 18, 2023', 'login', '1'),
(28, '23:01:21', 'Dec 18, 2023', 'login', '1'),
(29, '23:09:23', 'Dec 18, 2023', 'login', '1'),
(30, '23:46:55', 'Dec 18, 2023', 'login', '1'),
(31, '0:35:38', 'Dec 19, 2023', 'login', '1'),
(32, '15:00:23', 'Jan 5, 2024', 'login', '1'),
(33, '18:24:43', 'Jan 5, 2024', 'login', '1'),
(34, '17:03:01', 'Jan 14, 2024', 'login', '1'),
(35, '17:06:41', 'Jan 14, 2024', 'login', '1'),
(36, '20:05:55', 'Jan 14, 2024', 'login', '1'),
(37, '20:06:41', 'Jan 14, 2024', 'login', '1'),
(38, '15:38:18', 'Jan 15, 2024', 'login', '1'),
(39, '20:52:33', 'Jan 18, 2024', 'login', '1'),
(40, '20:57:46', 'Jan 18, 2024', 'login', '1'),
(41, '21:06:27', 'Jan 18, 2024', 'login', '1'),
(42, '21:08:19', 'Jan 18, 2024', 'login', '1'),
(43, '21:24:38', 'Jan 18, 2024', 'login', '1'),
(44, '22:59:11', 'Jan 18, 2024', 'login', '1'),
(45, '23:51:53', 'Jan 18, 2024', 'login', '1'),
(46, '23:52:11', 'Jan 18, 2024', 'login', '1'),
(47, '19:57:46', 'Jan 20, 2024', 'login', '1'),
(48, '21:15:06', 'Feb 4, 2024', 'login', '1'),
(49, '22:48:27', 'Feb 5, 2024', 'login', '1'),
(50, '0:13:56', 'Feb 6, 2024', 'login', '1'),
(51, '16:25:20', 'Feb 6, 2024', 'login', '1'),
(52, '6:29:42', 'Feb 7, 2024', 'login', '1'),
(53, '7:46:03', 'Feb 7, 2024', 'login', '1'),
(54, '10:15:19', 'Feb 9, 2024', 'login', '1'),
(55, '22:58:56', 'Feb 9, 2024', 'login', '1'),
(56, '23:10:30', 'Feb 9, 2024', 'login', '1'),
(57, '23:30:32', 'Feb 9, 2024', 'login', '1'),
(58, '7:54:40', 'Feb 14, 2024', 'login', '1'),
(59, '8:43:43', 'Feb 14, 2024', 'login', '1'),
(60, '9:20:55', 'Feb 15, 2024', 'login', '1'),
(61, '11:58:36', 'Feb 15, 2024', 'login', '1'),
(62, '18:50:17', 'Mar 24, 2024', 'login', '1'),
(63, '18:57:07', 'Mar 24, 2024', 'login', '1'),
(64, '10:44:24', 'Apr 19, 2024', 'login', '1'),
(65, '12:02:34', 'Apr 19, 2024', 'login', '1'),
(66, '13:25:48', 'Apr 19, 2024', 'login', '1'),
(67, '16:41:51', 'Apr 19, 2024', 'login', '1'),
(68, '17:23:46', 'Apr 22, 2024', 'login', '1'),
(69, '20:10:14', 'Apr 22, 2024', 'login', '1'),
(70, '1:55:11', 'Apr 23, 2024', 'login', '1'),
(71, '1:54:34', 'Jun 2, 2024', 'login', '1'),
(72, '21:04:26', 'Jun 19, 2024', 'login', '1'),
(73, '10:25:08', 'Jul 9, 2024', 'login', '1'),
(74, '10:29:35', 'Jul 9, 2024', 'login', '1');

-- --------------------------------------------------------

--
-- Table structure for table `presidents`
--

CREATE TABLE `presidents` (
  `id` int NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `occupation` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `religion` varchar(250) NOT NULL,
  `party` varchar(250) NOT NULL,
  `manifesto` longtext NOT NULL,
  `index1` longtext NOT NULL,
  `promise1` longtext NOT NULL,
  `signal1` longtext NOT NULL,
  `doings1` longtext NOT NULL,
  `index2` longtext NOT NULL,
  `promise2` longtext NOT NULL,
  `signal2` longtext NOT NULL,
  `doings2` longtext NOT NULL,
  `index3` longtext NOT NULL,
  `promise3` longtext NOT NULL,
  `signal3` longtext NOT NULL,
  `doings3` longtext NOT NULL,
  `index4` longtext NOT NULL,
  `promise4` longtext NOT NULL,
  `signal4` longtext NOT NULL,
  `doings4` longtext NOT NULL,
  `index5` longtext NOT NULL,
  `promise5` longtext NOT NULL,
  `signal5` longtext NOT NULL,
  `doings5` longtext NOT NULL,
  `index6` longtext NOT NULL,
  `promise6` longtext NOT NULL,
  `signal6` longtext NOT NULL,
  `doings6` longtext NOT NULL,
  `index7` longtext NOT NULL,
  `promise7` longtext NOT NULL,
  `signal7` longtext NOT NULL,
  `doings7` longtext NOT NULL,
  `ideology` varchar(250) NOT NULL,
  `verdict` varchar(250) NOT NULL,
  `images` varchar(250) NOT NULL,
  `status` int NOT NULL,
  `date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presidents`
--

INSERT INTO `presidents` (`id`, `fullname`, `occupation`, `dob`, `state`, `religion`, `party`, `manifesto`, `index1`, `promise1`, `signal1`, `doings1`, `index2`, `promise2`, `signal2`, `doings2`, `index3`, `promise3`, `signal3`, `doings3`, `index4`, `promise4`, `signal4`, `doings4`, `index5`, `promise5`, `signal5`, `doings5`, `index6`, `promise6`, `signal6`, `doings6`, `index7`, `promise7`, `signal7`, `doings7`, `ideology`, `verdict`, `images`, `status`, `date`) VALUES
(1, 'Bola Ahmed Tinubu', 'Full-Time Politician and Political Godfather', '1942-03-29', 'Lagos', 'Islam', 'All Progressives Congress (APC)', '<p>Renewed Hope: Action Plan for a Better Nigeria</p>\r\n', 'Commitment to Democracy, Human Rights, and Gender Equality', 'Promised to reform Nigeria\'s judicial system by improving access to justice and the country\'s legal framework, ensuring equality of all before the law, as well as prioritizing judicial independence, judicial integrity, and respect for the rule of law. ', 'Low Performance', 'Not fulfilled. \r\n\r\nThreatened nationwide chaos if the ruling of the election tribunal does not go in his favor.', 'Commitment to Poverty and Eradication', 'Promised to continue the Homegrown School Feeding, Conditional Cash Transfer, N-Power, and Government Enterprise and Empowerment poverty alleviation programs of the Buhari regime.', 'Low Performance', 'Not fulfilled. \r\n\r\nApproved the creation of a poverty alleviation and humanitarian trust fund with a target to raise at least $5Billion annually. However, the Minister of humanitarian affairs and poverty alleviation, Betta Edu, is now suspended over financial misappropriation scandal. ', 'Commitment to Ending Corruption in Public Offices and Society', 'Promised to only spend public funds on \"the public good\" and cut down the cost of governance at the Federal level.', 'Low Performance', 'Not fulfilled. \r\n\r\nIn his first six months in office, President Tinubu spent at least N3.4Billion (nearly $4Million) on foreign and international travel, alongside his extremely large entourage, overshooting the 2023 budget provision for the president\'s travel by nearly 40%. \r\n\r\nAccording to the approved 2024 national budget, President Tinubu will spend at least N7.6Billion (almost $9Million) on local and international travel while his Vice President Kashim Shettima will spend at least N1.8Billion (roughly $2Million) on local and foreign trips. \r\n\r\nThe Tinubu administration will spend at least N200Million (over $200,000) to feed an unspecified type or number of animals in Aso Villa. \r\n\r\nThe Tinubu administration sponsored no less than 1,411 delegates from Nigeria to the 2023 COP28 Climate Change Conference, with at least N2.7Billion (over $3Million) spent on estacodes and flight tickets. \r\n\r\nAccording to the Supplementary 2023 Budget, President Tinubu spent N1.5Billion (over $1.6Million) on the procurement of vehicles for the Office of the First Lady, which does not exist in Nigeria\'s constitution. \r\n\r\nAccording to the Supplementary 2023 Budget, President Tinubu spent N2.9Billion (over $3Million) to replace functioning luxurious vehicles for the Office of the President and another N2.9Billion to procure Sport Utility Vehicles for the Presidential Villa. \r\n\r\nIn the Supplementary 2023 Budget, President Tinubu proposed to spend N5Billion (over $5Million) on a presidential yacht for the presidency, which was later repurposed by lawmakers for unverifiable \"student loans.\"', 'Commitment to Socio-Economic Development and Environmental Protection', 'Promised an unprecedented level of industrial activity driven by the youth (aged 15-35).', 'Low Performance', 'Not fulfilled.', 'Commitment to Education and Social Change', 'Promised to generally increase the number of qualified and competent educators, enhance the conduciveness of learning environments, and improve educational outcomes throughout the country.', 'Low Performance', 'Not fulfilled. \r\n\r\nThe Tinubu administration announced in October 2023 that 40% of the Internally Generated Revenue by all partially funded federal universities would be automatically deducted by the government. The policy was eventually cancelled in November 2023 following protests from academic unions and members of the public. President Tinubu announced the removal of federal universities, colleges of education, polytechnics, and other tertiary institutions from the Integrated Payroll and Personnel Information System (IPPIS) in December 2023.', 'Commitment and Approach to Internal Security and Public Safety', 'Promised an end to the use of Police for VIP protection by transferring such \"extraneous\" duties to the NSCDC, which will also be reformed.', 'Low Performance', 'Not fulfilled. \r\n\r\nPresident Tinubu has made several audio announcements on this issue.', 'Commitment and Approach to Peace and Conflict Resolution', 'None.^none', 'Low Performance^Medium Performance', 'Nil^none', 'Liberalism', 'Low Performance', 'uploads/presidents/6c955d9b3ccc3749819fe50d11508736.jpg', 0, 'Apr 19, 2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_kdm`
--
ALTER TABLE `contact_kdm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presidents`
--
ALTER TABLE `presidents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_kdm`
--
ALTER TABLE `contact_kdm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `presidents`
--
ALTER TABLE `presidents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
