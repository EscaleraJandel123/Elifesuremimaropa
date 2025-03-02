-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 02, 2025 at 03:09 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u311273531_elifesure`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `adminCode` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `Adminfullname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adminProfile` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `region` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `zipcode` varchar(20) NOT NULL,
  `division` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `admin_token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `adminCode`, `username`, `Adminfullname`, `firstname`, `lastname`, `middlename`, `email`, `adminProfile`, `number`, `address`, `birthday`, `region`, `province`, `city`, `barangay`, `street`, `zipcode`, `division`, `branch`, `admin_token`) VALUES
(1, 92, 'RTRV24', 'Bong', 'Crispin Tabirara', 'Crispin', 'Tabirara', 'M', 'cris@gmail.com', '1709393806_d613a70a78cdeff37c9a.jpg', '09366581432', 'Lumangbayan Calapan City', '2024-02-17', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Lumang Bayan', '123 street', '5200', NULL, 'Calapan', 'aac70ecbb9d2ff301f0c41c40826869c8271583329dac1d021');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `AgentCode` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `Agentfullname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `zipcode` varchar(20) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT 'Bronze',
  `agentprofile` varchar(255) DEFAULT NULL,
  `FA` int(11) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `agent_token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `agent_id`, `AgentCode`, `email`, `username`, `Agentfullname`, `firstname`, `lastname`, `middlename`, `birthday`, `region`, `province`, `city`, `barangay`, `street`, `zipcode`, `number`, `address`, `rank`, `agentprofile`, `FA`, `branch`, `created_at`, `agent_token`) VALUES
(2, 133, 'YREP63', 'jandeleido@gmail.com', 'Bong', 'Escalera Jandel Leido', 'Crispin', 'Tabirara', 'L', '2003-01-26', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Tibag', 'Asturias', '5200', '09366581432', 'Lumangbayan calapan City', 'Bronze', '1730142201_817350cd6cb31eb2527e.jpg', 135, 'Calapan', '2024-02-29 17:12:37', '7c56146542b26c1956e57acdc8d5587f20203cc69994b64adf'),
(11, 223, 'DJC2O6', 'carpio.gemma2669@gmail.com', 'Gemma2669', NULL, 'Gemma', 'Carpio', 'l', '1969-05-26', 'MIMAROPA', 'Oriental Mindoro', '', 'Canubing I', 'Sitio Pajo', '5200', '09123123123', NULL, NULL, '1727706973_08bf7625bd721ea15bd8.jpg', 133, NULL, '2024-09-30 14:34:41', '23c0ab39d6111ff301c710ffa741126fcddb7dff9007dc9bad'),
(12, 228, 'JTPUCI', 'ellenleido@gmail.com', 'eleanor', NULL, 'Eleanor', 'Afable', 'L', '1971-04-23', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Lumang Bayan', 'Lawan', '5200', '09486034370', NULL, NULL, '1730142420_0c6611b0290698c59b82.png', 133, NULL, '2024-10-28 18:56:08', '949d7093349cf580607df3dd5004719e357ac5c0e9374fe0d2'),
(13, 227, 'R1NKL8', 'rommel33@gmail.com', 'Rommel', NULL, 'Rommel', 'Mekendrez', 'M', '1994-02-08', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Camilmil', '', '5200', '09530459949', NULL, NULL, '1728240050_3617d07f3b59e674ee77.jpg', 133, NULL, '2024-10-28 18:56:17', '3344b3395ce86cad05f78fc6e1379f333383299b0330a6e571');

-- --------------------------------------------------------

--
-- Table structure for table `aial`
--

CREATE TABLE `aial` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `aial_token` varchar(50) NOT NULL,
  `nonLife` varchar(100) DEFAULT NULL,
  `life` varchar(100) DEFAULT NULL,
  `variableLife` varchar(100) DEFAULT NULL,
  `accidentAndHealth` varchar(100) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `othersSpecification` varchar(100) DEFAULT NULL,
  `agencyName` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `agentType` varchar(100) DEFAULT NULL,
  `homeAddress` varchar(100) DEFAULT NULL,
  `zipCode` varchar(100) DEFAULT NULL,
  `businessAddress` varchar(100) DEFAULT NULL,
  `tin` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobileNumber` varchar(100) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `birthPlace` varchar(100) DEFAULT NULL,
  `citizenship` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `civilStatus` varchar(100) DEFAULT NULL,
  `maidenName` varchar(100) DEFAULT NULL,
  `husbandsName` varchar(100) DEFAULT NULL,
  `naturalizationDetails` varchar(100) DEFAULT NULL,
  `foreignerDetails` varchar(100) DEFAULT NULL,
  `certifiedCopyDetails` varchar(100) DEFAULT NULL,
  `filipinoParticipation` varchar(100) DEFAULT NULL,
  `company1` varchar(100) DEFAULT NULL,
  `licenseType1` varchar(100) DEFAULT NULL,
  `licenseNo1` varchar(100) DEFAULT NULL,
  `yearIssued1` varchar(100) DEFAULT NULL,
  `company2` varchar(100) DEFAULT NULL,
  `licenseType2` varchar(100) DEFAULT NULL,
  `licenseNo2` varchar(100) DEFAULT NULL,
  `yearIssued2` varchar(100) DEFAULT NULL,
  `company3` varchar(100) DEFAULT NULL,
  `licenseType3` varchar(100) DEFAULT NULL,
  `licenseNo3` varchar(100) DEFAULT NULL,
  `yearIssued3` varchar(100) DEFAULT NULL,
  `taxReturnFiled` varchar(100) DEFAULT NULL,
  `taxReturnNotFiledReason` varchar(100) DEFAULT NULL,
  `employer1` varchar(100) DEFAULT NULL,
  `position1` varchar(100) DEFAULT NULL,
  `dates1` varchar(100) DEFAULT NULL,
  `employer2` varchar(100) DEFAULT NULL,
  `position2` varchar(100) DEFAULT NULL,
  `dates2` varchar(100) DEFAULT NULL,
  `insuranceEmployee` varchar(100) DEFAULT NULL,
  `positionHeld` varchar(100) DEFAULT NULL,
  `governmentEmployee` varchar(100) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month2` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `applicantName` varchar(100) DEFAULT NULL,
  `provinceCity` varchar(100) DEFAULT NULL,
  `affiant` varchar(100) DEFAULT NULL,
  `tin2` varchar(100) DEFAULT NULL,
  `sss` varchar(100) DEFAULT NULL,
  `day` varchar(100) DEFAULT NULL,
  `month` varchar(100) DEFAULT NULL,
  `year2` varchar(100) DEFAULT NULL,
  `exhibit` varchar(100) DEFAULT NULL,
  `applicant` varchar(100) DEFAULT NULL,
  `companyName` varchar(100) DEFAULT NULL,
  `place2` varchar(100) DEFAULT NULL,
  `date2` varchar(100) DEFAULT NULL,
  `authorizedRepresentative` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aial`
--

INSERT INTO `aial` (`id`, `user_id`, `aial_token`, `nonLife`, `life`, `variableLife`, `accidentAndHealth`, `others`, `othersSpecification`, `agencyName`, `surname`, `firstName`, `middleName`, `agentType`, `homeAddress`, `zipCode`, `businessAddress`, `tin`, `email`, `mobileNumber`, `birthDate`, `birthPlace`, `citizenship`, `sex`, `civilStatus`, `maidenName`, `husbandsName`, `naturalizationDetails`, `foreignerDetails`, `certifiedCopyDetails`, `filipinoParticipation`, `company1`, `licenseType1`, `licenseNo1`, `yearIssued1`, `company2`, `licenseType2`, `licenseNo2`, `yearIssued2`, `company3`, `licenseType3`, `licenseNo3`, `yearIssued3`, `taxReturnFiled`, `taxReturnNotFiledReason`, `employer1`, `position1`, `dates1`, `employer2`, `position2`, `dates2`, `insuranceEmployee`, `positionHeld`, `governmentEmployee`, `date`, `month2`, `year`, `place`, `applicantName`, `provinceCity`, `affiant`, `tin2`, `sss`, `day`, `month`, `year2`, `exhibit`, `applicant`, `companyName`, `place2`, `date2`, `authorizedRepresentative`, `created_at`, `updated_at`) VALUES
(13, 223, '23c0ab39d6111ff301c710ffa741126fcddb7dff9007dc9bad', NULL, 'life', 'variableLife', NULL, NULL, 'N/A', 'N/A', 'Carpio', 'Gemma', 'Lanuza', 'OrdinaryAgent', 'Pajo, Canubing-1, Calapan City, Oriental Mindoro', '5200', 'N/A', '427-025-666', 'carpio.gemma2669@gmail.com', '09663589897', '1969-05-26', 'Davao Oriental', 'Filipino', 'Female', 'Married', 'Bert', 'Norberto D. Carpio', '', '', '', '', 'Fortune Life', 'Traditional', '23610', '8-18-2022', '', '', '', '', '', '', '', '', 'NO', 'PANDEMIC', 'Fortune Life', 'Agent', '1969-05-26', '', '', '', 'NO', 'N/A', 'NO', '', '', '', '', 'Gemma L. Carpio', 'Manila', 'Gemma L. Carpio', '427-025-666', '044-407947-7', '07', 'July', '2023', '', '', 'ALLIANZ PNB LIFE INSURANCE, INC.', '', '', '', '2024-09-30 01:42:17', '2024-09-30 01:42:17'),
(14, 228, '949d7093349cf580607df3dd5004719e357ac5c0e9374fe0d2', NULL, 'life', NULL, NULL, NULL, 'qwe', 'qweqweqwe', 'Afable', 'Eleanor', 'Leido', 'OrdinaryAgent', 'Lawaan St. Lumangbayan, Calapan City, Oriental Mindoro', '5200', '', '506-635-235-000', 'eleanor.afable@allianzsales.ph', '09486034370', '1971-04-23', 'Calapan City, Oriental Mindoro', 'Filipino', 'Female', 'Married', 'obef', 'Norberto A. Afable', '', '', '', '', 'Fortune Life', 'Traditional', '23599', '8-18-2022', '', '', '', '', '', '', '', '', 'NO', 'PANDEMIC', 'Fortune Life', 'Agent', '2022-08-18', '', '', '', 'NO', 'N/A', 'NO', 'December', '12', '2023', 'Calapan City Oriental Mindoro', 'Eleanor L. Afable', '', '', '506-635-235-000', '1431605414', 'December', '12', '2023', 'Calapan City Oriental Mindoro', 'Eleanor L. Afable', 'ALLIANZ PNB LIFE INSURANCE, INC.', 'Calapan City, Oriental Mindoro', 'December 12, 2023', '', '2024-10-07 01:51:26', '2024-10-31 11:50:13'),
(15, 227, '3344b3395ce86cad05f78fc6e1379f333383299b0330a6e571', NULL, 'life', 'variableLife', NULL, NULL, '', '', 'Melendrez', 'Rommel', 'Mendoza', 'OrdinaryAgent', '29 karilga St. Camilmil, Calapan City, Oriental Mindoro', '5200', '12F Allied Bank Center 6754 Ayala Ave Cor Legaspi St. Makati City', '925-936-205-000', 'rommelmelendres0@gmail.com', '09530459499', '1976-10-15', 'Calapan City, Oriental Mindoro', 'Filipino', 'Male', 'Married', 'Mendoza', '', '', '', '', '', 'Alliaz Pnb Life', 'Traditional', '', '2016', '', 'Variable', '', '2016', '', '', '', '', 'NO', 'PANDEMIC', 'Allianz Pnb Life', 'Financial Advisor', '2016-02-02', 'Fortune Life', 'Financial Advisor', '2022-10-12', 'NO', 'N/A', 'NO', '28th', 'April', '2023', 'Calapan City Oriental Mindoro', 'Rommel M. Melendres', 'Calapan City', '', '', '', '', '', '', '', '', 'ALLIANZ PNB LIFE INSURANCE, INC.', 'Calapan City, Oriental Mindoro', '', '', '2024-10-07 02:29:05', '2024-10-07 02:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `aonff`
--

CREATE TABLE `aonff` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `app_aonff_token` varchar(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `place` varchar(100) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `witness_place` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `affiant` varchar(255) DEFAULT NULL,
  `ctc_no` int(11) DEFAULT NULL,
  `ctc_issue_date` date DEFAULT NULL,
  `ctc_issue_place` varchar(255) DEFAULT NULL,
  `sworn_day` int(11) DEFAULT NULL,
  `sworn_month` varchar(100) NOT NULL,
  `sworn_year` varchar(100) NOT NULL,
  `sworn_place` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aonff`
--

INSERT INTO `aonff` (`id`, `applicant_id`, `app_aonff_token`, `name`, `place`, `reason`, `day`, `witness_place`, `month`, `year`, `affiant`, `ctc_no`, `ctc_issue_date`, `ctc_issue_place`, `sworn_day`, `sworn_month`, `sworn_year`, `sworn_place`, `created_at`, `updated_at`) VALUES
(6, 223, '23c0ab39d6111ff301c710ffa741126fcddb7dff9007dc9bad', 'Gemma L. Carpio', 'Pajo, Canubing-1,Calapan City, Oriental Mindoro', '2022', 7, 'Manila', 'July', '2023', 'Gemma L. Carpio', 2801, '2022-09-06', '', 7, 'July', '2023', 'Manila', '2024-09-30 01:48:35', '2024-09-30 01:48:35'),
(7, 228, '949d7093349cf580607df3dd5004719e357ac5c0e9374fe0d2', 'Eleanor L. Afable', 'Lawaan St. Lumangbayan, Calapan City, Oriental Mindoro', '2022', 0, '', '', '', 'Eleanor L. Afable', 5142905, '2023-02-07', 'Calapan City, Oriental Mindoro', 0, '', '', '', '2024-10-07 01:54:35', '2024-10-30 09:50:27'),
(8, 227, '3344b3395ce86cad05f78fc6e1379f333383299b0330a6e571', 'Rommel M. Melendres', 'Camilmil, Calapan City Oriental Mindoro', '2022', 28, 'Calapan City, Oriental Mindoro', 'April', '2023', 'Rommel M. Melendres', 0, '0000-00-00', 'Calapan City, Oriental Mindoro', 28, 'April', '2023', 'Calapan City, Oriental Mindoro', '2024-10-07 02:38:40', '2024-10-07 02:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `refcode` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `region` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `zipcode` varchar(20) NOT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `profile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `app_token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `applicant_id`, `username`, `refcode`, `firstname`, `lastname`, `middlename`, `number`, `email`, `birthday`, `region`, `province`, `city`, `barangay`, `street`, `zipcode`, `branch`, `status`, `profile`, `created_at`, `app_token`) VALUES
(61, 223, 'Gemma2669', 'YREP63', 'Gemma', 'Carpio', 'l', '09123123123', 'carpio.gemma2669@gmail.com', '1969-05-26', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Canubing I', 'Sitio Pajo', '5200', NULL, 'confirmed', '1727626407_9f7fa143ee0f19d5845e.jpg', '2024-09-29 16:10:08', '23c0ab39d6111ff301c710ffa741126fcddb7dff9007dc9bad'),
(62, 227, 'Rommel', 'YREP63', 'Rommel', 'Mekendrez', 'M', '09530459949', 'rommel33@gmail.com', '1994-02-08', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Camilmil', '', '5200', NULL, 'confirmed', '1728240050_3617d07f3b59e674ee77.jpg', '2024-10-06 13:29:31', '3344b3395ce86cad05f78fc6e1379f333383299b0330a6e571'),
(63, 228, 'Eleanor', 'YREP63', 'Eleanor', 'Afable', 'L', '09486034370', 'ellenleido@gmail.com', '1971-04-23', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Lumang Bayan', 'Lawan', '52002', NULL, 'confirmed', '1728237700_cfbd1cd7cddace29bdc2.png', '2024-10-06 13:29:38', '949d7093349cf580607df3dd5004719e357ac5c0e9374fe0d2'),
(65, 253, 'Lita_23', 'DJC2O6', 'Lita', 'Deolita', 'G', '09775586352', 'deolita@gmail.com', '', 'MIMAROPA', 'Oriental Mindoro', 'Baco', 'Malapad', '', '5200', NULL, 'pending', '1731246321_8875c4386b2175471fee.jpg', '2024-11-10 07:45:39', '549a0011390af45e292a60ec25391024e843b6e69fc70a1837'),
(66, 254, 'Michelle', 'JTPUCI', 'Michelle ', 'Marga', 'B', '09943265873', 'Michelle2655@gmail.com', '', 'MIMAROPA', 'Occidental Mindoro', 'Mamburao (Capital)', 'Poblacion 1 (Barangay 1)', '', '5200', NULL, 'pending', '1731246441_e08a7b65d7f469f922b2.jpg', '2024-11-10 07:48:40', 'c1eb5df50e82ebcb6899f575f7ca5b85bed318e3329435f0d9'),
(67, 259, 'Marilyny23', 'DJC2O6', 'Marilyn', 'Lozano', 'F', '09109653815', 'marilynfondevilla@gmail.com', '', 'MIMAROPA', 'Marinduque', 'Buenavista', 'Barangay I (Pob.)', '', '5200', NULL, 'pending', NULL, '2024-10-10 11:50:50', '57eb419d47fd57daf8cf41f60537187980de73b5ccfd72214e');

--
-- Triggers `applicant`
--
DELIMITER $$
CREATE TRIGGER `update_lifechangerform` AFTER UPDATE ON `applicant` FOR EACH ROW BEGIN
    IF NEW.app_token <> OLD.app_token OR NEW.username <> OLD.username THEN
        UPDATE lifechangerform
        SET app_life_token = NEW.app_token,
            username = NEW.username
        WHERE app_token = OLD.app_token
          AND username = OLD.username;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `recipient` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_token` varchar(50) NOT NULL,
  `applicationNo` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile` varchar(255) NOT NULL DEFAULT 'def.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `client_id`, `client_token`, `applicationNo`, `username`, `lastName`, `firstName`, `middleName`, `email`, `number`, `birthday`, `region`, `province`, `city`, `barangay`, `street`, `zipcode`, `created_at`, `profile`) VALUES
(12, 224, '4792e3b3aae82862316f792e09d450597d6e4fe1e36eae6d0e', 1, 'Lagring', 'Leido', 'Lagrimas', 'M', 'lagrimasleido@gmail.com', '09366581432', '1989-02-12', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Lumang Bayan', 'Lumangbayan', '5200', '2024-09-30 11:02:35', '1730386254_656343dc9c372eb043fe.jpg'),
(15, 255, '0dd05d03efe43193f5e2c70d4b3bb9198ddc5d222aa5f0ea5e', 2, 'Angel', 'Bugarin', 'Angel Crosby', 'L', 'Angel26@gmail.com', '09600739787', '1994-01-28', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Bulusan', 'Xevera', '5200', '2024-11-10 10:29:41', '1731246181_0c999942d731b2ebd5d3.jpg'),
(16, 256, '18d34f63bfc2bc8580aff6124de61b43ffd6bc7b6c3bf670da', 3, 'Jameer', 'Palma', 'Jameer Amiel', 'D', 'Jameer11@gmail.com', '09177148163', '0086-11-27', 'Region III (Central Luzon)', 'Bulacan', 'Santa Maria', 'Santa Cruz', 'Sanoma', '3022', '2024-11-10 10:45:05', '1731245995_c585b4b98af231a1f918.jpg'),
(17, 257, '5488d41e706dd3c534d5827efa9fdbbb8dfd5de85380f38e7f', 4, 'Maria', 'Pedrajas', 'Maria Marisol', 'B', 'Mariamarisolb19@gmail.com', '09209461643', '1986-12-16', 'Region III (Central Luzon)', 'Bulacan', 'Marilao', 'Loma de Gato', '', '3019', '2024-11-10 11:03:32', 'def.png'),
(18, 258, 'be7961e9a3e6b8d81af2776de2d570926c02c672f28a77fe6d', 5, 'Daisy14', 'Manayron', 'Daisy', 'A', 'manaydaisy14@gmail.com', '09350658234', '1996-12-14', 'MIMAROPA', 'Occidental Mindoro', 'Santa Cruz', 'Dayap', '', '', '2024-11-10 11:41:01', '1731246079_988ecdca9f1ee326862d.jpg'),
(21, 267, '080fe3dc5db3fafb64500b090687dde593488a3d1ff565d616', 6, 'Jansen', 'Afable', 'Jansen', 'L', 'jansenafable@gmail.com', '09945428697', '', '', '', '', '', '', '', '2024-12-11 15:35:09', 'def.png');

-- --------------------------------------------------------

--
-- Table structure for table `client_plan`
--

CREATE TABLE `client_plan` (
  `id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `client_id` int(11) NOT NULL,
  `agent` int(11) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `mode_payment` varchar(50) NOT NULL,
  `term` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL,
  `applicationNo` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `commission` float NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `duedate` date DEFAULT NULL,
  `email_sent` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_plan`
--

INSERT INTO `client_plan` (`id`, `token`, `client_id`, `agent`, `plan`, `mode_payment`, `term`, `created_at`, `updated_at`, `applicationNo`, `status`, `commission`, `receipt`, `duedate`, `email_sent`) VALUES
(41, 'b9b81fd86b09d846f74ac9c2fcf02ad26dd1c2abdb5eb6a6b7', 255, 223, 'e87752f8a2c53bd4e3b99ac5a11b998edbf761944ef7b0680a1a8aa35cae179e7534f895a53971a312130fe954b6d364fc66', 'Monthly', 10, '2024-11-10 10:38:07', '0000-00-00 00:00:00', '2', 'paid', 1000, '1731235087_40913a10a3799416837d.jpg', NULL, 0),
(42, '8b8e7c6916683d3d482edfb190dec4f5b2277231db978e4723', 256, 133, '5efa711ec22d2c36d2a4e5662a31834f5425e9f590849e750c7f752e6ce974b107774c9481c4cfd00343adcebddb56533fb0', 'Semi-Annual', 10, '2024-11-10 10:54:32', '2024-11-10 10:55:35', '3', 'paid', 9000, '1731236072_f406b60172c6a1b23056.jpg', NULL, 0),
(43, '1d6b6826becd0f0dac9a2e83a07ae51efe4d2905463a0ce610', 257, 227, '7c5cf99bbd71b7c49e13e73d0afbcccf614d554681d932b5f9fa63579702e323d8677c69976fea42bd51e61d516e3d346365', 'Annual', 10, '2024-11-10 11:14:15', '0000-00-00 00:00:00', '4', 'paid', 30000, '1731237255_709fa36f07fa10837d3f.jpg', NULL, 0),
(44, '936a7b28cca4efa7e75e41bd38f9c17cd6e5dc98f67de0257f', 224, 228, '533c3ce8dda4169936bf14547b8806aa6b945218cad18243b73b2163b3170958d4c4927bd0ce3fb30562e265d0a733fffebf', 'Semi-Annual', 10, '2024-11-10 11:27:15', '0000-00-00 00:00:00', '1', 'paid', 15000, '1731238035_09282d5f05239eca4fc4.jpg', NULL, 0),
(45, '375af8bed6b98ebcce5df8e3821f15942d1505e63d690ca9ba', 258, 133, '69209f2ebe713c1613e1b94c0d57b976075bb368941c457a87737706c643f8fb683da2a48afc667e7bf40364141ee5909920', 'Semi-Annual', 10, '2024-11-10 11:45:24', '2024-12-11 17:30:56', '5', 'paid', 3750, '1731239124_230dc63f1982667a193d.jpg', NULL, 0),
(51, '2a68e9c35cec25b9ca2ef3acef96a3cb3855a11f955d86a064', 267, 228, '62951ea5e91e573d76bbf6ad8d0e874c53eb4404343cebae527a2a0dffcb52378288230ea70a61dbe19ed987e79102c83560', 'Monthly', 10, '2024-12-11 17:12:24', '2024-12-11 17:58:09', '6', 'unpaid', 2500, '1733937144_2d5609f9afc54d09fe09.jpg', '2024-12-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_scheduler`
--

CREATE TABLE `client_scheduler` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `clientName` varchar(255) NOT NULL,
  `number` varchar(50) NOT NULL,
  `applicationNo` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `complteaddress` varchar(255) NOT NULL,
  `selected_date` varchar(50) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `schedule_time` varchar(50) NOT NULL,
  `meeting_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_scheduler`
--

INSERT INTO `client_scheduler` (`id`, `username`, `clientName`, `number`, `applicationNo`, `email`, `complteaddress`, `selected_date`, `agent`, `plan`, `schedule_time`, `meeting_type`, `status`, `created_at`, `client_id`) VALUES
(71, 'Angel', 'Bugarin, Angel Crosby L.', '09600739787', '2', 'Angel26@gmail.com', 'MIMAROPA, Oriental Mindoro, City Of Calapan (Capital), Bulusan, Xevera', '2024-7-10', '223', 'e87752f8a2c53bd4e3b99ac5a11b998edbf761944ef7b0680a1a8aa35cae179e7534f895a53971a312130fe954b6d364fc66', '22:40', 'office-meeting', 'completed', '2024-09-10 10:35:04', 255),
(72, 'Jameer', 'Palma, Jameer Amiel D.', '09177148163', '3', 'Jameer11@gmail.com', 'Region III (Central Luzon), Bulacan, Santa Maria, Santa Cruz, Sanoma', '2024-6-12', '133', '5efa711ec22d2c36d2a4e5662a31834f5425e9f590849e750c7f752e6ce974b107774c9481c4cfd00343adcebddb56533fb0', '10:40', 'zoom', 'completed', '2024-09-10 10:51:52', 256),
(73, 'Maria', 'Pedrajas, Maria Marisol B.', '09209461643', '4', 'Mariamarisolb19@gmail.com', 'Region III (Central Luzon), Bulacan, Marilao, Loma de Gato, ', '2024-7-21', '227', '7c5cf99bbd71b7c49e13e73d0afbcccf614d554681d932b5f9fa63579702e323d8677c69976fea42bd51e61d516e3d346365', '21:40', 'phone-call', 'completed', '2024-11-10 11:12:29', 257),
(74, 'Lagring', 'Leido, Lagrimas M.', '09366581432', '1', 'lagrimasleido@gmail.com', 'MIMAROPA, Oriental Mindoro, City Of Calapan (Capital), Lumang Bayan, Lumangbayan', '2024-10-12', '228', '533c3ce8dda4169936bf14547b8806aa6b945218cad18243b73b2163b3170958d4c4927bd0ce3fb30562e265d0a733fffebf', '20:30', 'phone-call', 'completed', '2024-11-10 11:22:14', 224),
(75, 'Daisy14', 'Manayron, Daisy A.', '09350658234', '5', 'manaydaisy14@gmail.com', 'MIMAROPA, Occidental Mindoro, Santa Cruz, Dayap, ', '2024-9-29', '133', '69209f2ebe713c1613e1b94c0d57b976075bb368941c457a87737706c643f8fb683da2a48afc667e7bf40364141ee5909920', '10:45', 'office-meeting', 'completed', '2024-11-10 11:43:29', 258),
(83, 'Jansen', 'Afable, Jansen L.', '09945428697', '6', 'jansenafable@gmail.com', ', , , , ', '', '228', '62951ea5e91e573d76bbf6ad8d0e874c53eb4404343cebae527a2a0dffcb52378288230ea70a61dbe19ed987e79102c83560', '13:11', 'phone-call', 'completed', '2024-12-11 17:11:20', 267);

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `commi` float NOT NULL,
  `amount_paid` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `receipts` varchar(100) NOT NULL,
  `duedate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `token`, `agent_id`, `client_id`, `commi`, `amount_paid`, `created_at`, `receipts`, `duedate`) VALUES
(54, '397e8ba84a5846d002f0dec01634f81d9ec1bb6378114d9129', 223, 255, 3000, 10000, '2024-09-19 10:38:07', '1731235087_40913a10a3799416837d.jpg', NULL),
(55, 'a7d9787bf2df49fe80ff6ddc045ded876daf687673bf7442a8', 133, 256, 1500, 9000, '2024-09-13 10:54:32', '1731236072_f406b60172c6a1b23056.jpg', NULL),
(56, '9c13ab3be0e5178787a279aa10fd79651f0342988ad56fa76e', 227, 257, 7500, 12500, '2024-10-22 11:14:15', '1731237255_709fa36f07fa10837d3f.jpg', NULL),
(57, 'b57bd261e0645b0dd2d623487dc45de010693f1b45ccee3bbb', 228, 224, 1500, 10000, '2024-10-30 11:27:15', '1731238035_09282d5f05239eca4fc4.jpg', NULL),
(58, '297d6f6fb36c9f7248b22e8db885055b9a154190eba84a3c6f', 133, 258, 1500, 3750, '2024-09-10 11:45:24', '1731239124_230dc63f1982667a193d.jpg', NULL),
(64, 'df2307d78918412c9f6c27dad13d7d5ebe5bc8fca191a7317a', 228, 267, 2500, 8333.33, '2024-12-11 17:12:24', '1733937144_2d5609f9afc54d09fe09.jpg', '2025-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `e-signature`
--

CREATE TABLE `e-signature` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_token` varchar(50) DEFAULT NULL,
  `signature` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e-signature`
--

INSERT INTO `e-signature` (`id`, `user_id`, `user_token`, `signature`, `created_at`, `updated_at`) VALUES
(7, 223, '23c0ab39d6111ff301c710ffa741126fcddb7dff9007dc9bad', 'signature_1730059055.png', '2024-09-30 01:14:27', '2024-10-28 03:57:35'),
(8, 133, '7c56146542b26c1956e57acdc8d5587f20203cc69994b64adf', 'signature_1730558056.png', '2024-09-30 10:48:18', '2024-11-02 22:34:16'),
(9, 227, '3344b3395ce86cad05f78fc6e1379f333383299b0330a6e571', 'signature_1731206437.png', '2024-10-07 02:19:01', '2024-11-10 10:40:37'),
(10, 228, '949d7093349cf580607df3dd5004719e357ac5c0e9374fe0d2', 'signature_1730011836.png', '2024-10-27 14:43:13', '2024-10-27 14:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `fback`
--

CREATE TABLE `fback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fback`
--

INSERT INTO `fback` (`id`, `name`, `email`, `content`, `created_at`) VALUES
(13, 'AnnaKef', 'somasesokiyo31@gmail.com', 'Sveiki, aš norėjau sužinoti jūsų kainą.', '2024-11-13 13:38:50'),
(14, 'Regina Crouch', 'regina.crouch25@outlook.com', 'If you are reading this message, That means my marketing is working. I can make your ad message reach 5 million sites in the same manner for just $50. It\'s the most affordable way to market your business or services. Contact me by email virgo.t3@gmail.com or skype me at live:.cid.dbb061d1dcb9127a\r\n\r\nP.S: Speical Offer - ONLY for 24 hours - 10 Million Sites for the same money $50', '2024-11-19 22:57:40'),
(15, 'Annetta Spruill', 'annetta.spruill@gmail.com', 'Rick here from Container Speedy House Co., Ltd, we are the factory producing modular container houses from China. It is a pleasure to introduce you our container houses for office, accommodation, hotel, school and camping house etc. \r\n\r\nPlease contact us by  Whatsapp: +8615150130346  More information on our website: www.containerspeedyhouse.com  More videos on our youtube: https://www.youtube.com/@containerspeedyhouse', '2024-11-21 08:01:38'),
(16, 'Cora Spooner', 'cora.spooner@googlemail.com', 'Hi,\r\n\r\nIf you\'ve fallen victim to an investment scam and lost money, you\'re not alone. Scammers are becoming more sophisticated, but there is hope. Our team specializes in helping individuals like you recover lost funds through legal avenues and professional recovery services.\r\n\r\nDon’t let the scam define your future. Contact us today for a confidential consultation. We’ll guide you step-by-step and work hard to help you reclaim what you’ve lost. Click here www.madacovi.co for more details\r\n\r\nTake action now. You deserve justice and a chance to move forward.\r\n\r\nBest regards,\r\nGerard Williams\r\nMadacovi Limited\r\nhelp@madacovi.co\r\nwww.madacovi.co', '2024-11-23 09:14:01'),
(17, 'IslaKef', 'yawiviseya67@gmail.com', 'Hi, kam dashur të di çmimin tuaj', '2024-11-24 01:18:10'),
(18, 'Axia Al-Barakah', 'eesljbrmjbuz@dont-reply.me', 'There was buzzing with tthis medic Ukh Codswallop Paranoia Only do This is still', '2024-11-26 00:04:05'),
(19, 'Muriel Donaldson', 'muriel.donaldson@hotmail.com', 'Hi,\r\n\r\nI am a senior web developer, highly skilled and with 10+ years of collective web design and development experience, I work in one of the best web development company.\r\n\r\n\r\nMy hourly rate is $8\r\n\r\n\r\nMy expertise includes: \r\n\r\nWebsite design - custom mockups and template designs \r\nWebsite design and development - theme development, backend customisation \r\nResponsive website - on all screen sizes and devices \r\nPlugins and Extensions Development \r\nWebsite speed optimisation and SEO on-page optimisation \r\nWebsite security \r\nWebsite migration, support and maintenance \r\nIf you have a question or requirement to discuss, I would love to help and further discuss it. Please email me at e.solus@gmail.com\r\n\r\n\r\nRegards, \r\nSachin\r\ne.solus@gmail.com', '2024-11-27 06:07:20'),
(20, 'OscarKef', 'ebojajuje04@gmail.com', 'Dia duit, theastaigh uaim do phraghas a fháil.', '2024-11-28 12:46:56'),
(21, 'Rene Renard', 'rene.renard@gmail.com', 'Hi Mate,\r\n\r\n\"Traffic down, rankings down, revenue down, business down.\"\r\n\r\n\"Just as the new broad core update is rolling out, sales vanished while traffic is way up.\"\r\n\r\n\"We are free falling.\" \r\n\r\n\"Yes, looks like a drop. Ad revenue record low for November.” \r\n\r\n\"Big drop today. -40%.\" \r\n\r\n\"Yeah, a very big drop today. Seems like Google wants to ensure that they don’t lose any piece of the Christmas shopping cake.\"\r\n\r\n\"Anyone else seeing big changes for their sites at the moment? Traffic for our Indonesian speaking main site is down by nearly 50%\"\r\n\r\nWell, Google, hit you hard again, didn’t it?\r\n\r\nIf the above SEO chatter regarding the November 2024 Core Update hits a little too close to home then know this…\r\nWe stand by you.\r\nWe stand by you like always and are happy to report that we have massacred the Update of Google November 2024 Core Update.\r\n\r\n\r\nAs soon as the update hit the web, me and my team hit the SEO lab and started testing thousands of websites for various permutations an', '2024-11-29 21:58:05'),
(22, 'Irita Ritari', 'eajrmazamzuz@dont-reply.me', 'Why would be better tell us they d come The clip and the', '2024-12-01 17:10:49'),
(23, 'Kathrine Floreal', 'esbbralzizuz@do-not-respond.me', 'I say that is our good mood to place went active', '2024-12-06 20:36:55'),
(24, 'Denisha Burwell', 'denisha.burwell81@hotmail.com', 'Hi elifesuremimaropa.com owner,\r\n\r\nI hope you’re doing well.\r\n\r\nI’m reaching out from Virgo T3. We are looking to purchase backlinks from high-quality websites like yours, and after reviewing your site, we believe there’s a great opportunity for us to collaborate.\r\n\r\nWe are willing to pay for placing a link on your website that points to one of our high-quality resources. The payment will be based on the metrics of your site, and we are happy to discuss the terms further to ensure it works for both of us.\r\n\r\nHere are the details:\r\n\r\nLink Type: Contextual Backlink, within a blog post, etc.\r\nPayment: We will compensate you based on your site\'s metrics (e.g., traffic, DA, etc.).\r\nContent: We will provide a nicely written/ High quality copyscape passed content.\r\nIf you\'re interested, please let me know, and we can discuss the details and arrange payment accordingly.\r\n\r\nLooking forward to hearing from you! Email me at virgot.3@gmail.com\r\n\r\nBest regards,\r\nSam\r\nvirgot.3@gmail.com', '2024-12-08 00:44:37'),
(25, 'Thank you for registering - it was incredible and pleasant all the best http://yandex.ru ladonna  cu', 'xrum003@24red.ru', 'Thank you for registering - it was incredible and pleasant all the best http://yandex.ru ladonna  cucumber', '2024-12-08 21:11:56'),
(26, 'Jami Boddie', 'morrismi1@outlook.com', 'My name is Ahmet. I\'m a bank staff in a Turkish bank. I\'ve been looking for someone who has the same nationality as you. A citizen of your country died in the recent earthquake in Turkey, he had in our bank fixed deposit of $11.5 million. \r\n\r\nMy Bank management is yet to know of his death. If my bank executive finds out about his death ,They would use the funds for themselves and get richer and I would like to prevent that from happening only if I get your cooperation, I knew about it because I was his account manager. Last week my bank management held a meeting for the purpose of a bank audit to note the dormant and abandoned deposit accounts.  I know this will happen and that\'s why I\'m looking for a solution to deal with this situation because if my bank discovers his death, they will divert the funds to the board of directors.  I don\'t want that to happen. \r\n \r\nI request your cooperation to introduce you as the kin/heir of the account as you are of the same nationality as him.  Ther', '2024-12-10 08:04:51'),
(27, 'Akilah Hosking', 'hosking.akilah20@googlemail.com', 'Does your business accept Visa/Mastercard? If so, and if you processed payments from 2004 to 2019, you might qualify for the class action settlement worth $5.54 billion!\r\nDeadline: February 4, 2025\r\nVisit http://cardsettlement.top for help filing your claim today!', '2024-12-13 01:36:36'),
(28, 'Jeff Tarrasa', 'bzmjrszbjzuz@do-not-respond.me', 'They have been taught in his return Some', '2024-12-17 09:56:19'),
(29, 'Berenice Worthen', 'worthen.berenice83@gmail.com', 'Want to get your message in front of millions of potential customers? Our service can help. By sending your ad text to website contact forms, your message will be read just like you\'re reading this one. And with one flat rate, you can reach a massive audience without any per click costs. Start growing your business today.\r\n\r\n Get in touch with me through the info provided below if you’d like to know more about how I can help.\r\n\r\nRegards,\r\nBerenice Worthen\r\nEmail: Berenice.Worthen@morebiz.my\r\nWebsite: http://w4zcnu.advertise-with-contactforms.pro\r\nConnect with me via Skype: https://join.skype.com/invite/nVcxdDgQnfhA', '2024-12-18 16:07:50'),
(30, 'Scott Gurley', 'scott.gurley@gmail.com', 'Are you still looking at getting your website done/ completed? Contact e.solus@gmail.com\r\n\r\nStruggling to rank on Google? Our SEO experts can help. Contact es.olus@gmail.com', '2024-12-19 00:09:00'),
(31, 'NAERTREGE4233255NERTHRRTH', 'jaydavis1980@sabesmail.com', 'MEYJTJ4233255MAWRERGTRH', '2024-12-20 03:00:01'),
(32, 'Harry Quintero', 'morrismi1@outlook.com', 'My name is Ahmet. I\'m a bank staff in a Turkish bank. I\'ve been looking for someone who has the same nationality as you. A citizen of your country died in the recent earthquake in Turkey, he had in our bank fixed deposit of $11.5 million. \r\n\r\nMy Bank management is yet to know of his death. If my bank executive finds out about his death ,They would use the funds for themselves and get richer and I would like to prevent that from happening only if I get your cooperation, I knew about it because I was his account manager. Last week my bank management held a meeting for the purpose of a bank audit to note the dormant and abandoned deposit accounts.  I know this will happen and that\'s why I\'m looking for a solution to deal with this situation because if my bank discovers his death, they will divert the funds to the board of directors.  I don\'t want that to happen. \r\n \r\nI request your cooperation to introduce you as the kin/heir of the account as you are of the same nationality as him.  Ther', '2024-12-24 09:23:51'),
(33, 'Harlan Marin', 'marin.harlan@gmail.com', 'Do you have a project you’ve been dreaming of completing for years? A book you want to write or publish? A business you’re ready to start or grow? Imagine having your own dedicated team to help you get it across the finish line.\r\nAt WCD Marketing, we offer Accountability Coaching designed to turn your ideas into achievements. From “someday” to “success.”  We know how easy it is for goals to stall when life gets busy, and that’s why we’re here to keep you focused, motivated, and moving forward.\r\nWhether it’s a creative project, a business venture, or a personal milestone, our proven strategies and expert guidance will help you overcome obstacles, stay on track, and achieve the success you’ve envisioned. We don’t just set goals; we make them happen—together.\r\nDon’t let another year pass with your dreams on hold. Contact us today and take the first step toward making your vision a reality.  Contact me at wilene@wcdenterprises.com or WCD Marketing and let’s start your journey to success.\r\n', '2024-12-25 08:39:24'),
(34, 'Alton Norman', 'norman.alton@hotmail.com', 'Would you like this New Year to be the year you let go of your hurtful past?  Make the resolution to make the change to become your Best Self.\r\n\r\n     Have you heard of Se-REM? (Self effective - Rapid Eye Movement). Many people don\'t know that REM brain activity dramatically improves the processing of traumatic emotion. It creates peace and empowers the listener. Se-REM is an advanced version of EMDR therapy. It is more powerful because it combines elements of 6 different therapies, EMDR, hypnosis, mindfulness, Gestalt child within work, music therapy, and Awe therapy,(connecting profoundly with nature).\r\n     It has helped thousands of people overcome PTSD, and anxiety. But it is also helpful in a great many situations, any experience that has been traumatic.  Se-REM\'s mission statement is \"Trauma relief at as close to free as possible\". This not-for-profit program downloads to a smart phone or computer and can be used at home.         \r\n      Read and download at: https://Se-REM.com.', '2024-12-31 03:58:37'),
(35, 'Billy Murr', 'murr.billy@yahoo.com', 'Hey there, I apologize for using your contact form, but I wasn\'t sure who the right person was to speak with in your company.\r\n\r\nI want to ask you if you\'re interested in buying/renting Google Ads accounts with free spending ads credit limit of 10k monthly on each account ($329 daily budget & $120k a year of free ppc ads spend limit) for a very cheap price starting at $500-$1000? It works for all types of Google Ads policy niches like E-Commerce stores, affiliate marketing, dropshipping ads, lead generation, etc... in the search ads placement (website traffic or call leads). The best Google Ads placement feature to easily boost your online digital presence and business.\r\n \r\n\r\nLet\'s connect on FB and check out my recent post: http://fbpost2024.xyz   \r\n\r\nWant more info: http://ad-accounts2024.xyz\r\n\r\nIf you\'re interested or have any questions private email me at 1800ivanr@gmail.com \r\n\r\nLearn more about me -  http://successwithivan.xyz\r\n\r\nSubscribe to my YouTube channel: http://yt-ivanrami', '2025-01-01 04:05:17'),
(36, 'I want sex>>> https://ugy2mr2.auraflirtsdreams.com/dkf8d6u?m=1', 'raya.gritsenko.91@mail.ru', 'The dating site that works for you. Join here!  - https://ugy2mr2.auraflirtsdreams.com/dkf8d6u?m=1', '2025-01-03 02:30:38'),
(37, 'Mathew Greig', 'trey.greig71@yahoo.com', 'Hello\r\n\r\nI hope this message finds you well. My name is Mathew, and I am a Research Assistant in the Research and Development Department one of the leading biopharmaceutical company based in London, England. I am reaching out to explore a potential partnership opportunity. \r\n\r\nWe are currently seeking a reliable business representative in your region to assist us in sourcing essential raw materials used in the production of high-quality antiviral vaccines, cancer treatments, and other life-saving pharmaceutical products. While this may be outside of your primary area of expertise, it offers a unique opportunity to diversify your business interests and generate additional income.\r\n\r\nOur company has been actively searching for a reputable supplier but has yet to establish a direct source. \r\n\r\nHowever, I have identified a local supplier who offers the necessary materials at a significantly lower cost compared to our previous purchases. This could present a mutually beneficial opportunity ', '2025-01-08 09:07:02'),
(38, 'Ellen Smith', 'alice.capuano@gmail.com', 'Impact Explainers specializes in high-quality 2D/3D animation, CGI/VFX, and motion graphics. With a team of 60+ experts and cutting-edge technology, we deliver exceptional results and fast turnarounds. \r\nUse animation to enhance sales, marketing, business intros, product mock-ups, YouTube videos, social media ads, or demo videos. Whether it’s architectural visualization, motion graphics, anime, or explainer videos, we bring your ideas to life with groundbreaking results. \r\n\r\nExplore our portfolio or chat with us at www.impactexplainer.com. You can also email us at ellen@impactexplainer.com or call (332) 222-4058. Let’s create something amazing together!\r\n\r\nEllen Smith\r\nellen@impactexplainer.com\r\n(332) 222-4058', '2025-01-10 22:50:56'),
(39, 'AmandaDumfrelDa', 'amandaShiedsc@gmail.com', 'Just thinking about you gives me chills… come closer  -  https://rb.gy/es66fc?Lard', '2025-01-11 09:39:41'),
(40, 'Oman Sargent', 'kraig.sargent@gmail.com', 'Hello,\r\n\r\nAt Cateus Investment Company (CIC), we understand that securing the right funding is crucial for both startups and established businesses. That\'s why we offer flexible financing solutions designed to meet your specific needs.\r\n\r\nHere’s how we can help:\r\n\r\nDebt Financing: 3% annual interest with zero penalties for early repayment.\r\nEquity Financing: Venture capital support with a 10% equity stake—helping you expand while keeping control.\r\nWe’re ready to explore the best option for your business. Simply send us your pitch deck or executive summary, and let’s discuss the ideal investment structure to fuel your growth.\r\n\r\nLooking forward to hearing from you.\r\n\r\nBest regards,\r\nOman Rook\r\nExecutive Investment Consultant/Director\r\nCateus Investment Company (CIC)\r\n\r\nemail:  oman-rook@cateusgroup.org   or  cateusgroup@gmail.com \r\nhttps://cateusinvestmentgroup.com', '2025-01-13 21:37:28'),
(41, 'Leslee Lorenzini', 'morrismi1@outlook.com', 'My name is Ahmet. I\'m a bank staff in a Turkish bank. I\'ve been looking for someone who has the same nationality as you. A citizen of your country died in the recent earthquake in Turkey, he had in our bank fixed deposit of $11.5 million. \r\n\r\nMy Bank management is yet to know of his death. If my bank executive finds out about his death ,They would use the funds for themselves and get richer and I would like to prevent that from happening only if I get your cooperation, I knew about it because I was his account manager. Last week my bank management held a meeting for the purpose of a bank audit to note the dormant and abandoned deposit accounts.  I know this will happen and that\'s why I\'m looking for a solution to deal with this situation because if my bank discovers his death, they will divert the funds to the board of directors.  I don\'t want that to happen. \r\n \r\nI request your cooperation to introduce you as the kin/heir of the account as you are of the same nationality as him.  Ther', '2025-01-14 22:04:30'),
(42, 'Kamani Pestrin', 'raizazjsezuz@dont-reply.me', 'It would cut down too much money a few signal for sure see us Many men so', '2025-01-17 09:35:02'),
(43, 'rebyspops', '0142gwbq@icloud.com', 'Your account has been dormant for 364 days. To avoid deletion and claim your funds, please log in and initiate a withdrawal within 24 hours. For assistance, join our Telegram group: https://tinyurl.com/2cn4s9fy', '2025-01-19 12:02:18'),
(44, 'Johnny Vosper', 'jeremyallen298@gmail.com', 'Hello,\r\n\r\nDo you own and operate a business outside the USA? My name is Jeremy Allen from BNF Investments LLC, a Florida based Investment Company.\r\n\r\nWe are expanding our operations outside the USA hence; we are actively looking for established serious business owners operating outside the USA who are in need of business expansion financing or investments in their businesses for quick access to funding.\r\n\r\nGet back to me if you are interested through my email: jallen@bnfinvestmentsllc.com\r\n\r\nSincerely\r\nJeremy Allen\r\nMarking, BNF INVESTMENTS LLC.\r\nFlorida, USA.', '2025-01-20 19:05:03'),
(45, 'rebyspops', 'n7olaof4@icloud.com', 'Your account has been inactive for 364 days. To avoid removal and claim your balance, please access your account and request a payout within 24 hours. For help, connect with us on our Telegram group: https://tinyurl.com/2bbyar7p', '2025-01-22 02:55:59'),
(46, 'Mathias Farley', 'farley.mathias@gmail.com', 'We improve MOZ  Domain authority 30+ in 15 Days its help to improve google rank, improve your website SEO, and you get traffic from google \r\n\r\nDA - 0 to 30 - (Only $29) - Yes, Limited time !!\r\n\r\n>> 100% Guarantee \r\n>> Improve Ranking \r\n>> White Hat Process \r\n>> Permanent Work\r\n>> 100% Manual Work \r\n>> 0% Spam score increase \r\n\r\n\r\n⚡ From our work your website keyword get rank on google and get organic traffic from google through keywords\r\n\r\nContact now: intrug@gmail.com', '2025-01-22 06:45:08'),
(47, 'Dezha Heitsch', 'ajzlaeblizuz@dont-reply.me', 'But if you know will go on us they ran out Many ones', '2025-01-22 19:22:07'),
(48, 'Alfredo Crowder', 'crowder.alfredo@gmail.com', 'Hi,\r\n\r\nI am a senior web developer, highly skilled and with 10+ years of collective web design and development experience, I work in one of the best web development company.\r\n\r\n\r\nMy hourly rate is $8\r\n\r\n\r\nMy expertise includes: \r\n\r\nWebsite design - custom mockups and template designs \r\nWebsite design and development - theme development, backend customisation \r\nResponsive website - on all screen sizes and devices \r\nPlugins and Extensions Development \r\nWebsite speed optimisation and SEO on-page optimisation \r\nWebsite security \r\nWebsite migration, support and maintenance \r\nIf you have a question or requirement to discuss, I would love to help and further discuss it. Please email me at e.solus@gmail.com\r\n\r\n\r\nRegards, \r\nSachin\r\ne.solus@gmail.com', '2025-01-23 21:27:38'),
(49, 'Amity Womick', 'aersjbjrbzuz@dont-reply.me', 'I started to begin and it was captured a classic told nothing There is the payments Where to', '2025-01-25 11:00:57'),
(50, 'Taksh Hahn', 'asjrjrbaszuz@dont-reply.me', 'If not seen again Pasha You won t tip and ready to wake up to the', '2025-01-29 19:42:44'),
(51, 'Gia Mansell', 'mansell.gia@gmail.com', '\r\nSAVE up to 37% on SEO! FREE Onsite SEO + TRANSPARENT link building at COST PRICE with just a 20% fee. Result: Expect a 214% increase in NEW customers on long term! Contact us now at eso.lus@gmail.com', '2025-01-30 07:59:22'),
(52, 'Dorthy Ricketson', 'ricketson.dorthy57@yahoo.com', 'Are you tired of expensive and ineffective marketing strategies? Our service sends your ad text to millions of website contact forms at a flat rate. No extra costs. Your message will be read and noticed.\r\n\r\n Reach out using the contact info below to learn more.\r\n\r\nRegards,\r\nDorthy Ricketson\r\nEmail: Dorthy.Ricketson@uniqueadvertising.pro\r\nWebsite: http://tqvcxy.advertiseviaforms.my\r\n', '2025-02-03 13:43:01'),
(53, 'GeorgeKef', 'ibucezevuda439@gmail.com', 'Ողջույն, ես ուզում էի իմանալ ձեր գինը.', '2025-02-05 00:52:44'),
(54, 'rebyspops', 'fat2ikeq@hotmail.com', 'Your account has been dormant for 364 days. To prevent removal and retrieve your balance, please access your account and initiate a payout within 24 hours. For support, connect with us on our Telegram group: https://tinyurl.com/234t5q5k', '2025-02-06 11:39:34'),
(55, 'rebyspops', 'rb24s4xr@yahoo.com', 'Your account has been inactive for 364 days. To avoid deletion and retrieve your funds, please access your account and initiate a payout within 24 hours. For assistance, visit our Telegram group: https://tinyurl.com/2b23wwa2', '2025-02-07 14:49:41'),
(56, 'Bytheaxy', 'brosjonson@mail.ru', 'For a long time I was looking for a good site where I could meet a girl and now I found it. The site will automatically suggest girls from your city - https://d.webtune.space/ \r\n \r\nHetheaxy', '2025-02-09 19:19:03'),
(57, 'Skila Kechter', 'eejbjszlbuz@dont-reply.me', 'The pause was there first and me to wash our convoy hard breathing is the large radioset', '2025-02-13 02:17:12'),
(58, 'Gary Charles', 'garycharles@dominatingkeywords.com', 'I am not offering you SEO, nor PPC.\r\nIt\'s something completely different.\r\nJust send me keywords of your interest and I\'ll give you traffic guarantees on each of them.\r\nLet me demonstrate how it works and you will be surprised by the results. ', '2025-02-20 05:34:52'),
(59, 'TedKef', 'ocopesuq299@gmail.com', 'Zdravo, htio sam znati vašu cijenu.', '2025-02-24 11:30:04'),
(60, 'Thank you for registering - it was incredible and pleasant all the best http://yandex.ru ladonna  cu', 'alex01@24red.ru', 'Thank you for registering - it was incredible and pleasant all the best http://yandex.ru ladonna  cucumber', '2025-02-28 03:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `file1` varchar(255) NOT NULL,
  `file2` varchar(255) NOT NULL,
  `file3` varchar(255) NOT NULL,
  `file4` varchar(255) NOT NULL,
  `file5` varchar(255) NOT NULL,
  `file6` varchar(255) NOT NULL,
  `file7` varchar(255) NOT NULL,
  `file8` varchar(255) NOT NULL,
  `file9` varchar(255) NOT NULL,
  `file10` varchar(255) NOT NULL,
  `file11` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `token`, `file1`, `file2`, `file3`, `file4`, `file5`, `file6`, `file7`, `file8`, `file9`, `file10`, `file11`, `created_at`) VALUES
(29, 223, '86a19c5b210919fc8de2652020b1b6e4', '1727632250_71a2f9bc8adc1c3f9885.jpg', '1727632250_d97ac104572e941d5381.jpg', '1727632250_0b3b5e8b0edccb429bbd.jpg', '1727632250_843454b5117f9a768e81.jpg', '1727632250_e97a56bcfa908483a5c3.jpg', '1727632250_4b4a7dd1498cf8907ba3.jpg', '', '', '', '', '', '2024-09-29 17:50:50'),
(30, 228, 'bbd5df2b6179b36c80488e4e34535bab', '1730128110_c28a086949c50b558993.png', '1728237858_ca668316d834809f4a82.jpg', '1728237858_50dd3aecd86821e19295.png', '1728237858_2cc6b98b39657dabb4c7.docx', '1728237858_3d45b6bb0795c308696f.docx', '1728237858_07d964ab336b61c91427.jpg', '1730129639_43ae2e4e21d5d8b2bad5.jpg', '', '1730129667_44c56c2e5d8f17256e61.pdf', '1730129681_76aa6f60f197e4f328b1.jpg', '', '2024-10-06 18:04:18'),
(31, 227, 'cd5d81bbf9f734f792683634735aec22', '1728240081_3c4a58b1ec9b36798990.jpg', '1728240081_094a51bb3e9312b004ca.jpg', '1728240081_dc77d1f123d7fdd030d1.jpg', '1728240081_da13ee1c21cb2b332117.jpg', '1728240081_3516762cf306420519f5.jpg', '', '', '', '', '', '', '2024-10-06 18:41:21'),
(32, 133, '221089caa255bb8f8750b3530fbc4272', '1730136735_5f87efb4fc6725fab04f.png', '', '', '', '', '', '', '', '', '', '', '2024-10-28 17:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `gli`
--

CREATE TABLE `gli` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `app_gli_token` varchar(50) NOT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `businessNature` varchar(255) DEFAULT NULL,
  `sex` varchar(255) NOT NULL,
  `civilStatus` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `residenceAddress` varchar(255) DEFAULT NULL,
  `residenceTelephone` int(11) DEFAULT NULL,
  `businessAddress` varchar(255) DEFAULT NULL,
  `businessTelephone` int(11) DEFAULT NULL,
  `firstName1` varchar(255) DEFAULT NULL,
  `mi1` varchar(255) DEFAULT NULL,
  `lastName1` varchar(255) DEFAULT NULL,
  `month1` int(11) DEFAULT NULL,
  `day1` int(11) DEFAULT NULL,
  `year1` int(11) DEFAULT NULL,
  `relationship1` varchar(255) DEFAULT NULL,
  `remarks1` varchar(255) DEFAULT NULL,
  `firstName2` varchar(255) DEFAULT NULL,
  `mi2` varchar(255) DEFAULT NULL,
  `lastName2` varchar(255) DEFAULT NULL,
  `month2` int(11) DEFAULT NULL,
  `day2` int(11) DEFAULT NULL,
  `year2` int(11) DEFAULT NULL,
  `relationship2` varchar(255) DEFAULT NULL,
  `remarks2` varchar(255) DEFAULT NULL,
  `firstName3` varchar(255) DEFAULT NULL,
  `mi3` varchar(255) DEFAULT NULL,
  `lastName3` varchar(255) DEFAULT NULL,
  `month3` int(11) DEFAULT NULL,
  `day3` int(11) DEFAULT NULL,
  `year3` int(11) DEFAULT NULL,
  `relationship3` varchar(255) DEFAULT NULL,
  `remarks3` varchar(255) DEFAULT NULL,
  `firstName4` varchar(255) DEFAULT NULL,
  `mi4` varchar(255) DEFAULT NULL,
  `lastName4` varchar(255) DEFAULT NULL,
  `month4` int(11) DEFAULT NULL,
  `day4` int(11) DEFAULT NULL,
  `year4` int(11) DEFAULT NULL,
  `relationship4` varchar(255) DEFAULT NULL,
  `remarks4` varchar(255) DEFAULT NULL,
  `trusteeMinorBeneficiary` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `applicantSignature` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gli`
--

INSERT INTO `gli` (`id`, `applicant_id`, `app_gli_token`, `lastName`, `firstName`, `middleName`, `dateOfBirth`, `occupation`, `companyName`, `businessNature`, `sex`, `civilStatus`, `nationality`, `residenceAddress`, `residenceTelephone`, `businessAddress`, `businessTelephone`, `firstName1`, `mi1`, `lastName1`, `month1`, `day1`, `year1`, `relationship1`, `remarks1`, `firstName2`, `mi2`, `lastName2`, `month2`, `day2`, `year2`, `relationship2`, `remarks2`, `firstName3`, `mi3`, `lastName3`, `month3`, `day3`, `year3`, `relationship3`, `remarks3`, `firstName4`, `mi4`, `lastName4`, `month4`, `day4`, `year4`, `relationship4`, `remarks4`, `trusteeMinorBeneficiary`, `place`, `day`, `month`, `year`, `applicantSignature`, `created_at`, `updated_at`) VALUES
(12, 223, '23c0ab39d6111ff301c710ffa741126fcddb7dff9007dc9bad', 'Carpio', 'Gemma', 'Lanuza', '1969-05-26', 'Lps- Agent', 'Fortune Life', 'Agent', 'female', 'Married', 'Filipino', 'Sitio Pajo, Canubing-1, Calapan City, Oriental Mindoro', 51968512, '', 0, 'Norberto', 'D.', 'Carpio', 0, 6, 1958, 'Husband', '', 'ChristianJoy', 'L.', 'Carpio', 0, 12, 2002, 'Daughter', '', '', '', '', 0, 0, 0, '', '', '', '', '', 0, 0, 0, '', '', '', '', 0, 0, 0, 'Gemma L. Carpio', '2024-09-30 01:45:48', '2024-09-30 01:45:48'),
(13, 228, '949d7093349cf580607df3dd5004719e357ac5c0e9374fe0d2', 'Afable', 'Eleanor', 'Leido', '1971-04-23', 'Agent', 'Fortune Life', 'Agent', 'female', 'Married', 'Filipinooo', '', 0, '', 0, 'Jandel', 'L.', 'Escalera', 0, 26, 2003, 'Son', '', 'Jansen', 'L.', 'Afable', 0, 28, 2003, 'Son', '', 'Merlita', 'M.', 'Leido', 0, 24, 1949, 'Mother', '', '', '', '', 0, 0, 0, '', '', '', '', 0, 0, 0, 'Eleanor L. Afable', '2024-10-07 01:59:27', '2024-10-30 09:47:35'),
(14, 227, '3344b3395ce86cad05f78fc6e1379f333383299b0330a6e571', 'Melendres', 'Rommel', 'Mendoza', '1976-10-15', 'Business Man', 'Fortune Life', 'Life Insurance', 'male', 'Married', 'Filipino', '29 Karilman St. Camilmil', 0, '12 Floor Pru Life Center 6754-Ayala Makati', 828, 'Bryan Andrews', 'A', 'Melendres', 10, 12, 2013, 'Son', '', 'Ian Carlo', 'A', 'Melendres', 12, 2, 2002, 'Son', '', 'Ernest Jan', 'A', 'Melendres', 23, 2, 2003, 'Sone', '', '', '', '', 0, 0, 0, '', '', '', 'Calapan City', 28, 0, 2023, 'Rommel M. Melendres', '2024-10-07 02:36:16', '2024-10-07 02:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `lifechangerform`
--

CREATE TABLE `lifechangerform` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `app_life_token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `preferredArea` varchar(255) DEFAULT NULL,
  `referralBy` varchar(255) DEFAULT NULL,
  `referral` varchar(255) DEFAULT NULL,
  `onlineAd` varchar(255) DEFAULT NULL,
  `walkIn` varchar(255) DEFAULT NULL,
  `othersRef` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `placeOfBirth` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `bloodType` varchar(255) DEFAULT NULL,
  `homeAddress` varchar(255) DEFAULT NULL,
  `mobileNo` varchar(255) DEFAULT NULL,
  `landline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `othersCitizenship` varchar(255) DEFAULT NULL,
  `naturalizationInfo` varchar(255) DEFAULT 'N/A',
  `maritalStatus` varchar(255) DEFAULT NULL,
  `maidenName` varchar(255) DEFAULT NULL,
  `spouseName` varchar(255) DEFAULT NULL,
  `sssNo` varchar(255) DEFAULT NULL,
  `tin` varchar(255) DEFAULT NULL,
  `lifeInsuranceExperience` varchar(50) DEFAULT NULL,
  `traditional` varchar(50) DEFAULT NULL,
  `variable` varchar(50) DEFAULT NULL,
  `recentInsuranceCompany` varchar(50) DEFAULT NULL,
  `highSchool` varchar(50) NOT NULL,
  `highSchoolCourse` varchar(50) NOT NULL,
  `highSchoolYear` varchar(50) NOT NULL,
  `college` varchar(50) NOT NULL,
  `collegeCourse` varchar(50) NOT NULL,
  `collegeYear` varchar(50) NOT NULL,
  `graduateSchool` varchar(50) NOT NULL,
  `graduateCourse` varchar(50) NOT NULL,
  `graduateYear` varchar(50) NOT NULL,
  `companyName1` varchar(50) NOT NULL,
  `position1` varchar(50) NOT NULL,
  `employmentFrom1` varchar(50) NOT NULL,
  `employmentTo1` varchar(50) NOT NULL,
  `reason1` varchar(50) NOT NULL,
  `companyName2` varchar(50) NOT NULL,
  `position2` varchar(50) NOT NULL,
  `employmentFrom2` varchar(50) NOT NULL,
  `employmentTo2` varchar(50) NOT NULL,
  `reason2` varchar(50) NOT NULL,
  `companyName3` varchar(50) NOT NULL,
  `position3` varchar(50) NOT NULL,
  `employmentFrom3` varchar(50) NOT NULL,
  `employmentTo3` varchar(50) NOT NULL,
  `reason3` varchar(50) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `resposition` varchar(50) NOT NULL,
  `contactName` varchar(50) NOT NULL,
  `contactPosition` varchar(50) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `contactNumber` varchar(50) NOT NULL,
  `yescuremployed` varchar(50) NOT NULL,
  `nocuremployed` varchar(50) NOT NULL,
  `allowed` varchar(50) NOT NULL,
  `notallowed` varchar(50) NOT NULL,
  `ifnoProvdtls` varchar(50) NOT NULL,
  `persontonotif` varchar(255) DEFAULT NULL,
  `moNo` varchar(255) DEFAULT NULL,
  `n1` varchar(255) DEFAULT NULL,
  `p1` varchar(255) DEFAULT NULL,
  `c1` varchar(255) DEFAULT NULL,
  `e1` varchar(255) DEFAULT NULL,
  `n2` varchar(255) DEFAULT NULL,
  `p2` varchar(255) DEFAULT NULL,
  `c2` varchar(255) DEFAULT NULL,
  `e2` varchar(255) DEFAULT NULL,
  `n3` varchar(255) DEFAULT NULL,
  `p3` varchar(255) DEFAULT NULL,
  `c3` varchar(255) DEFAULT NULL,
  `e3` varchar(255) DEFAULT NULL,
  `g1y` varchar(10) DEFAULT NULL,
  `g1n` varchar(10) DEFAULT NULL,
  `accused` varchar(255) DEFAULT NULL,
  `g2y` varchar(10) DEFAULT NULL,
  `g2n` varchar(10) DEFAULT NULL,
  `bankruptcy` varchar(255) DEFAULT NULL,
  `g3y` varchar(10) DEFAULT NULL,
  `g3n` varchar(10) DEFAULT NULL,
  `investigated` varchar(255) DEFAULT NULL,
  `g4y` varchar(10) DEFAULT NULL,
  `g4n` varchar(10) DEFAULT NULL,
  `terminat` varchar(255) DEFAULT NULL,
  `printedName` varchar(255) DEFAULT NULL,
  `botdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lifechangerform`
--

INSERT INTO `lifechangerform` (`id`, `user_id`, `app_life_token`, `created_at`, `updated_at`, `position`, `preferredArea`, `referralBy`, `referral`, `onlineAd`, `walkIn`, `othersRef`, `fname`, `nickname`, `birthdate`, `placeOfBirth`, `gender`, `bloodType`, `homeAddress`, `mobileNo`, `landline`, `email`, `citizenship`, `othersCitizenship`, `naturalizationInfo`, `maritalStatus`, `maidenName`, `spouseName`, `sssNo`, `tin`, `lifeInsuranceExperience`, `traditional`, `variable`, `recentInsuranceCompany`, `highSchool`, `highSchoolCourse`, `highSchoolYear`, `college`, `collegeCourse`, `collegeYear`, `graduateSchool`, `graduateCourse`, `graduateYear`, `companyName1`, `position1`, `employmentFrom1`, `employmentTo1`, `reason1`, `companyName2`, `position2`, `employmentFrom2`, `employmentTo2`, `reason2`, `companyName3`, `position3`, `employmentFrom3`, `employmentTo3`, `reason3`, `companyName`, `resposition`, `contactName`, `contactPosition`, `emailAddress`, `contactNumber`, `yescuremployed`, `nocuremployed`, `allowed`, `notallowed`, `ifnoProvdtls`, `persontonotif`, `moNo`, `n1`, `p1`, `c1`, `e1`, `n2`, `p2`, `c2`, `e2`, `n3`, `p3`, `c3`, `e3`, `g1y`, `g1n`, `accused`, `g2y`, `g2n`, `bankruptcy`, `g3y`, `g3n`, `investigated`, `g4y`, `g4n`, `terminat`, `printedName`, `botdate`) VALUES
(37, 223, '23c0ab39d6111ff301c710ffa741126fcddb7dff9007dc9bad', '2024-09-30 01:16:08', '2024-09-30 21:44:09', 'Agent', 'Calapan Area', 'Tabirara, Crispin L', 'yes', 'No', 'No', 'No', 'Gemma L. Carpio', 'Gem', '1969-05-26', 'Davao Oriental', 'Female', 'N/A', 'Sitio Pajo, Canubing-1, Calapan City, Oriental Mindoro', '09663589897', '65468465', 'carpio.gemma2669@gmail.com', 'Filipino', 'N/A', '', 'Single', 'Bert', 'Norberto D. Carpio', '3925', '123', 'yes', 'traditional', 'No', 'Fortune Life', 'Cannery National High School', 'H-S Graduate', '1987-05-13', '', '', '', '', '', '', 'Fortune Life', 'Agent', '2021-07-06', '2022-03-09', 'Active', 'Real State', 'Free Lance Agent', '', '', 'Active', 'Business Woman', 'Owner', '', '', 'Active', 'Verner Ornedo', 'N/A', '', '', '', '09190028006', 'N/A', 'N/A', 'N/A', 'N/A', '', 'Norberto D. Carpio', '09494330946', 'Romel Melendrez', 'F. Manager', '09530457499', 'romelmelendro@gmail.com', '', '', '', '', '', '', '', '', NULL, 'yes', '', NULL, 'yes', '', NULL, 'yes', '', NULL, 'yes', '', 'Gemma Carpio', '0000-00-00'),
(38, 228, '949d7093349cf580607df3dd5004719e357ac5c0e9374fe0d2', '2024-10-31 13:43:35', '2024-10-31 13:43:43', 'Agent', 'Calapan Area', 'Tabirara, Crispin L', 'yes', 'No', 'No', 'No', 'Eleanor L. Afable', 'eleanor', '1971-04-23', 'Occidental Mindoro', 'Female', 'N/A', 'Lumanbayan Calapan City', '09486534370', '123123', 'ellenleido@gmail.com', 'Filipino', 'N/A', '', 'Married', 'Magsino', 'Norberto Afable', '0409954430', '506-635-235-000', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', '', '', '', '', 'N/A', 'N/A', 'N/A', 'N/A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `notif` varchar(255) NOT NULL,
  `role` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `brief_description` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL,
  `com_percentage` int(11) NOT NULL,
  `coverage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `plan_name`, `brief_description`, `description`, `price`, `token`, `created_at`, `image`, `com_percentage`, `coverage`) VALUES
(25, 'Allianz Well', 'A health insurance plan offered by Allianz that provides coverage for medical expenses, including hospitalization, surgeries, and consultations, ensuring you\'re financially protected against unexpected healthcare costs.', 'A health insurance plan offered by Allianz that provides coverage for medical expenses, including hospitalization, surgeries, and consultations, ensuring you\'re financially\r\nprotected against unexpected healthcare costs.', 100000, '62951ea5e91e573d76bbf6ad8d0e874c53eb4404343cebae527a2a0dffcb52378288230ea70a61dbe19ed987e79102c83560', '2024-04-13 11:51:40', '1715704016_0f86942b7642a8c62f4a.png', 30, 100000),
(26, 'Allianz Compass', 'An insurance plan designed to guide you through life\'s uncertainties, offering a range of                             coverage options tailored to your needs, including health, life, and property insurance,                             providing peace of m', 'An insurance plan designed to guide you through life\'s uncertainties, offering a range of coverage options tailored to your needs, including health, life, and property insurance, providing peace of mind for you and your family.', 40000, 'e87752f8a2c53bd4e3b99ac5a11b998edbf761944ef7b0680a1a8aa35cae179e7534f895a53971a312130fe954b6d364fc66', '2024-04-13 11:53:28', '1715704023_47d949e23e4c6e6b0290.png', 30, 10000),
(27, 'eAZy Health Blue', 'A basic health insurance package from Allianz, offering essential coverage for medical                             expenses such as doctor visits, prescription drugs, and diagnostic tests, ensuring                             affordable access to healthca', 'A basic health insurance package from Allianz, offering essential coverage for medical expenses such as doctor visits, prescription drugs, and diagnostic tests, ensuring affordable access to healthcare services when you need them most.', 100000, '533c3ce8dda4169936bf14547b8806aa6b945218cad18243b73b2163b3170958d4c4927bd0ce3fb30562e265d0a733fffebf', '2024-04-13 11:54:55', '1713009295_4520944f2bf09e6fdcb3.png', 30, 100000),
(28, 'eAZy Health Silver', 'A mid-tier health insurance plan by Allianz, providing broader coverage than the basic                             package, including additional benefits like specialist consultations, outpatient procedures,                             and wellness progra', 'A mid-tier health insurance plan by Allianz, providing broader coverage than the basic\r\npackage, including additional benefits like specialist consultations, outpatient procedures, and wellness programs, offering enhanced protection for your health and well-being.', 10000, '5efa711ec22d2c36d2a4e5662a31834f5425e9f590849e750c7f752e6ce974b107774c9481c4cfd00343adcebddb56533fb0', '2024-04-13 11:55:40', '1713009340_9c0f4833a3b57d7c4067.png', 30, 100000),
(29, 'eAZy Health Gold', 'A health insurance option from Allianz, offering extensive coverage for medical expenses,                             including hospitalization, surgeries, maternity care, and chronic disease management,                             ensuring you receive to', 'A health insurance option from Allianz, offering extensive coverage for medical expenses, including hospitalization, surgeries, maternity care, and chronic disease management, ensuring you receive top-quality healthcare without financial worries.', 100000, '69209f2ebe713c1613e1b94c0d57b976075bb368941c457a87737706c643f8fb683da2a48afc667e7bf40364141ee5909920', '2024-04-13 11:56:27', '1713009387_d4171fd161aae7aebbd4.png', 30, 100000),
(30, 'eAZy Health platinum', 'The highest level of health insurance coverage offered by Allianz, providing premium benefits                             such as worldwide medical coverage, VIP hospital accommodations, advanced treatments, and                             personalized he', 'The highest level of health insurance coverage offered by Allianz, providing premium benefits such as worldwide medical coverage, VIP hospital accommodations, advanced treatments, and personalized health services, ensuring you receive the best possible care wherever you are.', 100000, '7c5cf99bbd71b7c49e13e73d0afbcccf614d554681d932b5f9fa63579702e323d8677c69976fea42bd51e61d516e3d346365', '2024-04-13 11:57:14', '1713009434_886401b891eee0b14937.png', 30, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(5, 'Meeting at the office', 'This Meeting is about the late requirements to be sent immediately', '2024-10-16 10:30:00', '2024-10-16 11:30:00'),
(6, 'Meeting', 'For Compliance of requirements  ', '2024-10-30 12:30:00', '2024-10-30 14:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `sou`
--

CREATE TABLE `sou` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `app_sou_token` varchar(50) DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `printedname` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sou`
--

INSERT INTO `sou` (`id`, `applicant_id`, `app_sou_token`, `position`, `name`, `printedname`, `created_at`, `updated_at`) VALUES
(7, 223, '23c0ab39d6111ff301c710ffa741126fcddb7dff9007dc9bad', 'Agent', 'Gemma L. Carpio', 'Gemma L. Carpio', '2024-09-30 01:49:33', '2024-09-30 01:49:33'),
(8, 228, '949d7093349cf580607df3dd5004719e357ac5c0e9374fe0d2', 'Agent', 'Eleanor L. Afable', 'Eleanor L. Afable', '2024-10-07 01:55:20', '2024-10-07 01:55:20'),
(9, 227, '3344b3395ce86cad05f78fc6e1379f333383299b0330a6e571', 'Agent', 'Rommel M. Melendres', 'Rommel M. Melendres', '2024-10-07 02:39:09', '2024-10-07 02:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `to_confirm`
--

CREATE TABLE `to_confirm` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `number` varchar(20) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `refcode` varchar(20) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `token` varchar(50) DEFAULT NULL,
  `email` text NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text NOT NULL,
  `time_log` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` text NOT NULL,
  `status` text DEFAULT NULL,
  `accountStatus` varchar(50) NOT NULL,
  `confirm` varchar(50) NOT NULL,
  `verification_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pass_token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `token`, `email`, `username`, `password`, `time_log`, `role`, `status`, `accountStatus`, `confirm`, `verification_token`, `created_at`, `pass_token`) VALUES
(92, 'aac70ecbb9d2ff301f0c41c40826869c8271583329dac1d021', 'cris@gmail.com', 'Chris', '$2y$10$6GIsBPAcqUW444.zFVsrtO.KLvyTv6doTg7yF3QTH2XGKWgGpKzVe', '2025-03-02 11:08:12', 'admin', 'verified', '', 'true', '', '2023-12-09 16:58:18', ''),
(133, '7c56146542b26c1956e57acdc8d5587f20203cc69994b64adf', 'jandeleido@gmail.com', 'Bong', '$2y$10$UeEq7v2CzOxrrbx3Y86fseqfG5czDaw.s8UwTYyPK9xfk7Oz6vuNq', '2025-02-19 09:47:23', 'agent', 'verified', 'active', 'true', '99', '2024-02-29 16:41:42', ''),
(223, '23c0ab39d6111ff301c710ffa741126fcddb7dff9007dc9bad', 'carpio.gemma2669@gmail.com', 'Gemma2669', '$2y$10$PrT51SWSDrKEZX66xpapUeRibqCgL7H2UIDBtOjpsjn7n.9mbLH5S', '2024-11-27 17:34:28', 'agent', 'verified', 'active', 'true', '9a28fa38fa3fb28140dcb96177ec68603882287eb9655b24e1', '2024-09-29 16:09:43', ''),
(224, '4792e3b3aae82862316f792e09d450597d6e4fe1e36eae6d0e', 'lagrimasleido@gmail.com', 'Lagring', '$2y$10$296hj.GSraNMdRXMZSau.uF7TGGnJWi6LLX4sLOxpWOGz1RLHqRni', '2024-12-11 23:12:54', 'client', 'verified', 'active', 'true', '9bbb9787b22c3e8c026fd3ebd1523409b1f3189f195498185b', '2024-09-30 11:02:12', ''),
(227, '3344b3395ce86cad05f78fc6e1379f333383299b0330a6e571', 'rommel33@gmail.com', 'Rommel', '$2y$10$3pghW5pR.SYnybxYFZmodOm.qcbK1toEjPxuqDQQVJ.4bzUY/qA6W', '2024-11-10 19:13:12', 'agent', 'verified', 'active', 'true', '70ae082049d81d96ef0b3c8fb7bc2916637df918347774515c', '2024-10-06 13:25:31', ''),
(228, '949d7093349cf580607df3dd5004719e357ac5c0e9374fe0d2', 'ellenleido@gmail.com', 'eleanor', '$2y$10$5rjDRbKbX0gBVntgdlSAgOce8.tWUFA750NOVpv5qhZu54t7gk.J.', '2024-12-12 01:11:58', 'agent', 'verified', 'active', 'true', 'c35033946a383e5d0dbe5212422710b30aec5c939a118283b1', '2024-10-06 13:27:29', ''),
(253, '549a0011390af45e292a60ec25391024e843b6e69fc70a1837', 'deolita@gmail.com', 'Lita_23', '$2y$10$KzsbT1myxkvUMIUN04J/reYv7Q0NpBwzFQ2zGpGww5pVq./Cf2wJq', '2024-11-27 17:34:53', 'applicant', 'verified', 'active', 'true', 'fb3628debbfd577221c9e390527e6768c88a74c99ada777eea', '2024-11-10 07:45:06', ''),
(254, 'c1eb5df50e82ebcb6899f575f7ca5b85bed318e3329435f0d9', 'Michelle2655@gmail.com', 'Michelle', '$2y$10$KsX6hydzubUW8imteRB3H.G4bCZYLQhbKeK2I3iaGJtFI1QmOLbqi', '2024-11-10 21:47:01', 'applicant', 'verified', 'active', 'true', '12bdacb87a7591a3f774a48bd68cb85c3a59f8c93b260f683b', '2024-11-10 07:48:21', ''),
(255, '0dd05d03efe43193f5e2c70d4b3bb9198ddc5d222aa5f0ea5e', 'Angel26@gmail.com', 'Angel', '$2y$10$MqTKKq7yf8ITt0NVVRSbVuM.6fO5N8e6pprm5RpGwXYXy2FjAOgru', '2024-11-10 21:42:44', 'client', 'verified', 'active', 'true', 'aa99834df95eea7bdad7cd1fe94309efc2cd5918bd0ad41706', '2024-11-10 10:29:28', ''),
(256, '18d34f63bfc2bc8580aff6124de61b43ffd6bc7b6c3bf670da', 'Jameer11@gmail.com', 'Jameer', '$2y$10$c5luW46eNKxF4jeTcn3b0eHdUjui1i5Ib.WquQbHbZQDCDK0qjoXq', '2024-11-10 21:55:17', 'client', 'verified', 'active', 'true', '2f61eb88d0e236082fce6e76d2662de7dfaa53ff8dda8e753e', '2024-11-10 10:44:33', ''),
(257, '5488d41e706dd3c534d5827efa9fdbbb8dfd5de85380f38e7f', 'Mariamarisolb19@gmail.com', 'Maria', '$2y$10$F.84sKBqVzjznm48X2cwLuPMWMrQTZ2k3OJ4oSkwyPDP2Tb0d7r7y', '2024-11-10 19:04:12', 'client', 'verified', 'active', 'true', '63d88fd5c6b5f5b272b4be51d51c138bd2855a279e9f2e9d8a', '2024-11-10 10:59:35', ''),
(258, 'be7961e9a3e6b8d81af2776de2d570926c02c672f28a77fe6d', 'manaydaisy14@gmail.com', 'Daisy14', '$2y$10$HyI0fc35Tm2b.vza3J.XUOAUjIMUy1CfpL3PjKQMIe3EEMDtlYVPe', '2024-11-10 21:41:02', 'client', 'verified', 'active', 'true', '485e2216eea843b91c2b2568658ded1450c6d267150351c7fc', '2024-11-10 11:40:24', ''),
(259, '57eb419d47fd57daf8cf41f60537187980de73b5ccfd72214e', 'marilynfondevilla@gmail.com', 'Marilyny23', '$2y$10$ts/OSgv86d10gGPwFIxNK.t.tRP0Sdn3Chs2MK5Y2ns34cmAaHcuK', '2024-11-10 21:48:23', 'applicant', 'verified', 'active', 'true', '976316e4ae1f97669b8811bc5b7b4452db2f9574b066ce22b8', '2024-11-10 11:50:40', ''),
(267, '080fe3dc5db3fafb64500b090687dde593488a3d1ff565d616', 'jansenafable@gmail.com', 'Jansen', '$2y$10$dhdQg.nytqwhkjYW5i21de3qd4zZ13f1pymEAnI0woW.euZmv0LWK', '2024-12-12 01:14:33', 'client', 'verified', 'active', 'true', '955b1b84706dd5c0b395cb20178623eb63876387e129b38fc8', '2024-12-11 15:34:52', ''),
(268, '2991570330d0b35528b812dd1adc9d56f50e3da9905ee844b5', 'Angel2Brooks5593@gmail.com', 'atvRIWnFl', '$2y$10$gcpyORe/kwEMwMfTQDft2u2KSDdnjB7BoJ/90o7dZgi6cHndLi80K', '2025-01-23 06:09:30', 'client', 'unverified', 'active', 'false', '', '2025-01-23 06:09:30', ''),
(269, '7a15d9bcc701983c875678b57ea1a64d57f3bd86f4bccf599b', 'Benjamin3Benson8564@gmail.com', 'YAcCKesdhKBoGO', '$2y$10$pcsetPIH1JwkfLpe4XZTGuoxOT2QrWOnQtdvnJ4aGgUld7htPtkzm', '2025-01-30 11:28:17', 'client', 'unverified', 'active', 'false', '', '2025-01-30 11:28:17', ''),
(270, '8632e9ddb6491f2a28532f84b9525393f7b8ed629f77b7f101', 'lessirobertsfw1995@gmail.com', 'BCtGtpwW', '$2y$10$PsCsO97ufyf1LHDkD4fSyuzYyrcYQZ/m/UDj1UqAlAjww2.9gPQoS', '2025-02-17 17:34:13', 'client', 'unverified', 'active', 'false', '', '2025-02-17 17:34:13', '');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `update_account_status` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    IF NEW.time_log < DATE_SUB(NOW(), INTERVAL 30 DAY) THEN
        SET NEW.accountStatus = 'inactive';
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_user_id` (`admin_id`),
  ADD KEY `fk_admin_token` (`admin_token`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `AgentCode` (`AgentCode`),
  ADD KEY `fk_agent_user_id` (`agent_id`),
  ADD KEY `subagents` (`FA`,`branch`),
  ADD KEY `fk_agent_branch` (`branch`),
  ADD KEY `agent_token` (`agent_token`),
  ADD KEY `fk_agent_username` (`username`);

--
-- Indexes for table `aial`
--
ALTER TABLE `aial`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aial_token` (`aial_token`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD UNIQUE KEY `user_id_3` (`user_id`);

--
-- Indexes for table `aonff`
--
ALTER TABLE `aonff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`,`app_aonff_token`),
  ADD KEY `fk_aonff_app_token` (`app_aonff_token`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_applicant_user_id` (`applicant_id`),
  ADD KEY `fk_applicant_branch` (`branch`),
  ADD KEY `fk_app_token` (`app_token`),
  ADD KEY `fk_app_username` (`username`),
  ADD KEY `fk_refcode` (`refcode`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_id` (`client_id`,`client_token`),
  ADD KEY `fk_client_token` (`client_token`);

--
-- Indexes for table `client_plan`
--
ALTER TABLE `client_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_scheduler`
--
ALTER TABLE `client_scheduler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e-signature`
--
ALTER TABLE `e-signature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userId_token` (`user_id`),
  ADD KEY `fk_esign_token` (`user_token`);

--
-- Indexes for table `fback`
--
ALTER TABLE `fback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_file_user_ID` (`user_id`);

--
-- Indexes for table `gli`
--
ALTER TABLE `gli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gli_app_id` (`applicant_id`),
  ADD KEY `app_token` (`app_gli_token`);

--
-- Indexes for table `lifechangerform`
--
ALTER TABLE `lifechangerform`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_referralBy` (`referralBy`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_app_life_token` (`app_life_token`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sou`
--
ALTER TABLE `sou`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sou_app_id` (`applicant_id`),
  ADD KEY `app_sou_token` (`app_sou_token`);

--
-- Indexes for table `to_confirm`
--
ALTER TABLE `to_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_user_token` (`token`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `aial`
--
ALTER TABLE `aial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `aonff`
--
ALTER TABLE `aonff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `client_plan`
--
ALTER TABLE `client_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `client_scheduler`
--
ALTER TABLE `client_scheduler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `e-signature`
--
ALTER TABLE `e-signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fback`
--
ALTER TABLE `fback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `gli`
--
ALTER TABLE `gli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lifechangerform`
--
ALTER TABLE `lifechangerform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sou`
--
ALTER TABLE `sou`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `to_confirm`
--
ALTER TABLE `to_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_admin_token` FOREIGN KEY (`admin_token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `fk_FA` FOREIGN KEY (`FA`) REFERENCES `agent` (`agent_id`),
  ADD CONSTRAINT `fk_agent_id` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_agent_token` FOREIGN KEY (`agent_token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `aial`
--
ALTER TABLE `aial`
  ADD CONSTRAINT `fk_aial_token` FOREIGN KEY (`aial_token`) REFERENCES `applicant` (`app_token`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aial_userId` FOREIGN KEY (`user_id`) REFERENCES `applicant` (`applicant_id`);

--
-- Constraints for table `aonff`
--
ALTER TABLE `aonff`
  ADD CONSTRAINT `fk_aonff_app_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_id`),
  ADD CONSTRAINT `fk_aonff_app_token` FOREIGN KEY (`app_aonff_token`) REFERENCES `applicant` (`app_token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `fk_app_id` FOREIGN KEY (`applicant_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_app_token` FOREIGN KEY (`app_token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_refcode` FOREIGN KEY (`refcode`) REFERENCES `agent` (`AgentCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_id` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_client_token` FOREIGN KEY (`client_token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `e-signature`
--
ALTER TABLE `e-signature`
  ADD CONSTRAINT `fk_esign_token` FOREIGN KEY (`user_token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userId_token` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `fk_file_user_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `gli`
--
ALTER TABLE `gli`
  ADD CONSTRAINT `fk_gli_app_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_id`),
  ADD CONSTRAINT `fk_gli_app_token` FOREIGN KEY (`app_gli_token`) REFERENCES `applicant` (`app_token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lifechangerform`
--
ALTER TABLE `lifechangerform`
  ADD CONSTRAINT `fk_app_life_token` FOREIGN KEY (`app_life_token`) REFERENCES `applicant` (`app_token`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_life_app_id` FOREIGN KEY (`user_id`) REFERENCES `applicant` (`applicant_id`);

--
-- Constraints for table `sou`
--
ALTER TABLE `sou`
  ADD CONSTRAINT `fk_sou_app_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_id`),
  ADD CONSTRAINT `fk_sou_app_token` FOREIGN KEY (`app_sou_token`) REFERENCES `applicant` (`app_token`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
