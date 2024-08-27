-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2024 at 04:52 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erecruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `adminCode` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Adminfullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adminProfile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zipcode` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `division` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `admin_token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `adminCode`, `username`, `Adminfullname`, `firstname`, `lastname`, `middlename`, `email`, `adminProfile`, `number`, `address`, `birthday`, `region`, `province`, `city`, `barangay`, `street`, `zipcode`, `division`, `branch`, `admin_token`) VALUES
(1, 92, 'RTRV24', 'Chris123', 'Crispin Tabirara', 'Crispin', 'Tabirara', 'M', 'chris@gmail.com', '1709393806_d613a70a78cdeff37c9a.jpg', '09366581432', 'Lumangbayan Calapan City', '2024-02-17', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Lumang Bayan', '123 street', '5200', NULL, 'Calapan', '3e3b327501b42429fdca41da74f8df53307b681e4710b92949');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int NOT NULL,
  `agent_id` int DEFAULT NULL,
  `AgentCode` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Agentfullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zipcode` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agentprofile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `FA` int DEFAULT NULL,
  `branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agent_token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `agent_id`, `AgentCode`, `email`, `username`, `Agentfullname`, `firstname`, `lastname`, `middlename`, `birthday`, `region`, `province`, `city`, `barangay`, `street`, `zipcode`, `number`, `address`, `rank`, `agentprofile`, `FA`, `branch`, `created_at`, `agent_token`) VALUES
(1, 135, 'CBF556', 'ellenleido@gmail.com', 'Ellen', 'Ellen Leido Afable', 'Eleanor', 'Afable', 'L', '2024-03-01', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Tibag', 'Asturias', '', '09366581432', 'Lumanbayan', 'Silver', '', NULL, 'Calapan', '2024-02-29 16:57:36', 'd000fd7c8315f1964e7e4a6e755daed0bd8ee44ef37d278597'),
(2, 133, 'YREP63', 'jandeleido@gmail.com', 'janz', 'Escalera Jandel Leido', 'Jandel', 'Escalera123', 'L', '2003-01-26', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Tibag', 'Asturias', '5200', '09366581432', 'Lumangbayan calapan City', 'Bronze', '', 135, 'Calapan', '2024-02-29 17:12:37', '12b34799076af5ed996429f8ee5aea631a2b921ad9e98f33d3'),
(5, 145, 'EJE9WK', 'alejandrogino950@gmail.com', 'Lineth', NULL, 'May Lineth', 'Candolita', 'F', '', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Calero (Pob.)', 'Nable', '', '09366588812', NULL, NULL, '', 133, NULL, '2024-04-05 13:09:36', '05fd60d38fc468347b4122a5685a0dfca55de4b78721435de9'),
(7, 138, 'P5S8QQ', 'escalerajandel@gmail.com', 'jandel', NULL, 'Jandel', 'Escalera', 'L', '2003-01-26', 'MIMAROPA', 'Oriental Mindoro', '', 'Tibag', '', '', '09366581432', NULL, NULL, '', 133, NULL, '2024-05-20 05:21:12', '6ac375885b352b7cc1555d5f36398a6a7e4f44e8d5a2a0d7a6');

-- --------------------------------------------------------

--
-- Table structure for table `aial`
--

CREATE TABLE `aial` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `aial_token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nonLife` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `life` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `variableLife` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `accidentAndHealth` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `others` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `othersSpecification` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agencyName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surname` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `middleName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agentType` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `homeAddress` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zipCode` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `businessAddress` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tin` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobileNumber` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `birthPlace` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `citizenship` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sex` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `civilStatus` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `maidenName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `husbandsName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `naturalizationDetails` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foreignerDetails` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `certifiedCopyDetails` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `filipinoParticipation` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company1` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `licenseType1` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `licenseNo1` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `yearIssued1` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `licenseType2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `licenseNo2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `yearIssued2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company3` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `licenseType3` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `licenseNo3` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `yearIssued3` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `taxReturnFiled` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `taxReturnNotFiledReason` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `employer1` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `position1` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dates1` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `employer2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `position2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dates2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `insuranceEmployee` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `positionHeld` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `governmentEmployee` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `month2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `year` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `place` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `applicantName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `provinceCity` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `affiant` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tin2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sss` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `day` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `month` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `year2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exhibit` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `applicant` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `companyName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `place2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `authorizedRepresentative` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aial`
--

INSERT INTO `aial` (`id`, `user_id`, `aial_token`, `nonLife`, `life`, `variableLife`, `accidentAndHealth`, `others`, `othersSpecification`, `agencyName`, `surname`, `firstName`, `middleName`, `agentType`, `homeAddress`, `zipCode`, `businessAddress`, `tin`, `email`, `mobileNumber`, `birthDate`, `birthPlace`, `citizenship`, `sex`, `civilStatus`, `maidenName`, `husbandsName`, `naturalizationDetails`, `foreignerDetails`, `certifiedCopyDetails`, `filipinoParticipation`, `company1`, `licenseType1`, `licenseNo1`, `yearIssued1`, `company2`, `licenseType2`, `licenseNo2`, `yearIssued2`, `company3`, `licenseType3`, `licenseNo3`, `yearIssued3`, `taxReturnFiled`, `taxReturnNotFiledReason`, `employer1`, `position1`, `dates1`, `employer2`, `position2`, `dates2`, `insuranceEmployee`, `positionHeld`, `governmentEmployee`, `date`, `month2`, `year`, `place`, `applicantName`, `provinceCity`, `affiant`, `tin2`, `sss`, `day`, `month`, `year2`, `exhibit`, `applicant`, `companyName`, `place2`, `date2`, `authorizedRepresentative`, `created_at`, `updated_at`) VALUES
(1, 138, '6ac375885b352b7cc1555d5f36398a6a7e4f44e8d5a2a0d7a6', 'nonLife', 'life', 'variableLife', 'accidentAndHealth', 'others', '123', '123', '123', '123', '123', 'OrdinaryAgent', '123', '123', '123', '123', 'jan@gmail.com', '123123', '2024-04-03', '123', '123123', 'Male', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', 'NO', 'PANDEMIC', '123', '123', '2024-04-10', '123', '123', '2024-04-10', 'NO', 'N/A', 'NO', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '132', '123', '123', '132', 'ALLIANZ PNB LIFE INSURANCE, INC.', '123', '123', '123', '2024-04-09 23:15:22', '2024-06-05 23:35:03'),
(10, 134, '44f24ddb252b71f62db2520c4f2890414f5a485ab09854adc2', 'nonLife', NULL, NULL, NULL, NULL, '123', '123', 'Afable', 'Jansen', 'L.', 'OrdinaryAgent', 'Lumangbayan Calapan City Oriental Mindoro', '5200', '', '123', 'jansenafable@gmail.com', '123', '2024-06-03', 'asd', 'Filipino', 'Male', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'NO', 'PANDEMIC', '', '', '', '', '', '', 'NO', 'N/A', 'NO', '', '', '', '', 'asd', 'asd', '', '123', '123', '', '', '', '', 'Jans', 'ALLIANZ PNB LIFE INSURANCE, INC.', '', '', '', '2024-06-03 21:35:27', '2024-07-13 20:50:54'),
(12, 133, '12b34799076af5ed996429f8ee5aea631a2b921ad9e98f33d3', 'nonLife', 'life', 'variableLife', 'accidentAndHealth', 'others', '123', '123', '123', '123', '123', 'OrdinaryAgent', '123', '123', '123', '123', 'jandel@gmail.com', '123', '2024-06-05', '123', 'Filipino', 'Male', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'NO', 'PANDEMIC', '123', '123', '2024-06-05', '123', '123', '2024-06-05', 'NO', 'N/A', 'NO', '12', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '132', 'ALLIANZ PNB LIFE INSURANCE, INC.', '123', '123', '123', '2024-06-05 23:55:13', '2024-06-05 23:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `aonff`
--

CREATE TABLE `aonff` (
  `id` int NOT NULL,
  `applicant_id` int DEFAULT NULL,
  `app_aonff_token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `place` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `day` int DEFAULT NULL,
  `witness_place` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `month` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `affiant` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ctc_no` int DEFAULT NULL,
  `ctc_issue_date` date DEFAULT NULL,
  `ctc_issue_place` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sworn_day` int DEFAULT NULL,
  `sworn_month` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sworn_year` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sworn_place` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aonff`
--

INSERT INTO `aonff` (`id`, `applicant_id`, `app_aonff_token`, `name`, `place`, `reason`, `day`, `witness_place`, `month`, `year`, `affiant`, `ctc_no`, `ctc_issue_date`, `ctc_issue_place`, `sworn_day`, `sworn_month`, `sworn_year`, `sworn_place`, `created_at`, `updated_at`) VALUES
(4, 133, '12b34799076af5ed996429f8ee5aea631a2b921ad9e98f33d3', '123', '12', '123', 123, '123', '123', '123', '123', 123, '2024-06-05', '123', 123, '123', '123', '132', '2024-06-05 23:26:25', '2024-06-05 23:26:25'),
(5, 134, '44f24ddb252b71f62db2520c4f2890414f5a485ab09854adc2', '123 123 123', '12', '123', 123, '123', '323', '12', '123', 123, '2024-06-17', '123', 1, '1', '123', '2', '2024-06-17 12:27:33', '2024-06-17 12:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int NOT NULL,
  `applicant_id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `refcode` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zipcode` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `app_token` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `applicant_id`, `username`, `refcode`, `firstname`, `lastname`, `middlename`, `number`, `email`, `birthday`, `region`, `province`, `city`, `barangay`, `street`, `zipcode`, `branch`, `status`, `profile`, `created_at`, `app_token`) VALUES
(2, 133, 'janz', NULL, NULL, NULL, NULL, '09366581432', 'jandeleido@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 'Calapan', 'confirmed', '1702140342_0f4bffae9348708e674c.jpg', '2024-02-29 16:41:42', '12b34799076af5ed996429f8ee5aea631a2b921ad9e98f33d3'),
(3, 134, 'Jansen', 'YREP63', 'Jansen', 'Afable', 'L.', '09366581432', 'jansenafable@gmail.com', '2013-04-28', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Lumangbayan', 'street 123', '', 'Calapan', 'pending', '1709394150_a815fc9df645e369a39b.jpg', '2024-02-29 16:46:28', '44f24ddb252b71f62db2520c4f2890414f5a485ab09854adc2'),
(6, 138, 'jandel', 'YREP63', 'Jandel', 'Escalera', 'L', '09366581432', 'escalerajandel@gmail.com', '2003-01-26', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Tibag', '', '', 'Calapan', 'confirmed', '1710051491_6b8980d7d5f1379ae034.jpg', '2024-03-10 06:15:55', '6ac375885b352b7cc1555d5f36398a6a7e4f44e8d5a2a0d7a6'),
(8, 145, 'Lineth', 'YREP63', 'May Lineth', 'Candolita', 'F', '09366588812', 'alejandrogino950@gmail.com', '', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Calero (Pob.)', 'Nable', '', 'Calapan', 'confirmed', 'def.jpg', '2024-03-11 16:53:33', '05fd60d38fc468347b4122a5685a0dfca55de4b78721435de9'),
(42, 176, 'Les', 'CBF556', 'Lester', 'Caibal', 'M', '09366581432', 'Lester@gmail.com', '2024-05-19', 'MIMAROPA', 'Oriental Mindoro', 'Bulalacao (San Pedro)', 'Benli (Mangyan Settlement)', '123 street', '4450', NULL, 'pending', '', '2024-04-06 13:11:01', '8d3f2ec598d606580041f50bb888d5d3498790f542ea4c7ed8');

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
  `id` int NOT NULL,
  `sender` int NOT NULL,
  `message` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `recipient` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender`, `message`, `recipient`, `created_at`) VALUES
(1, 92, 'hi', 107, '2024-03-23 13:10:14'),
(2, 92, '', 107, '2024-03-23 13:20:01'),
(3, 92, 'Hi', 107, '2024-03-23 13:20:04'),
(4, 92, 'asd', 107, '2024-03-24 13:25:25'),
(5, 92, 'qasd', 107, '2024-03-24 13:25:39'),
(8, 138, 'Hi', 107, '2024-03-24 14:01:19'),
(9, 138, 'qwe', 107, '2024-03-24 16:33:26'),
(10, 138, 'try', 107, '2024-03-24 16:36:24'),
(11, 138, 'qwe', 107, '2024-03-24 16:36:45'),
(12, 138, 'qwe', 107, '2024-03-24 16:37:21'),
(13, 138, 'Hi', 107, '2024-03-24 16:42:45'),
(14, 138, 'dapat makuha ko ang chat ko', 138, '2024-03-24 16:46:35'),
(15, 138, 'ge', 107, '2024-03-24 17:08:40'),
(16, 134, 'Hi po', 138, '2024-03-24 17:09:40'),
(17, 138, 'hi', 138, '2024-03-24 17:10:38'),
(18, 138, 'qwe', 92, '2024-03-24 17:13:55'),
(19, 138, 'dapat makuha ko ang chat ko', 92, '2024-03-24 17:14:19'),
(20, 138, 'Hi', 92, '2024-03-24 17:17:13'),
(21, 92, 'Hi applicant', 92, '2024-03-28 07:56:44'),
(22, 138, 'sir', 92, '2024-03-28 15:18:40'),
(23, 92, 'hi', 92, '2024-04-02 14:34:37'),
(24, 92, 'Hi', 92, '2024-04-02 14:35:57'),
(25, 92, 'test', 92, '2024-04-02 14:37:49'),
(26, 92, 'qasd', 92, '2024-04-02 14:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `client_id` int NOT NULL,
  `client_token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `applicationNo` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `middleName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `zipcode` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'def.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `client_id`, `client_token`, `applicationNo`, `username`, `lastName`, `firstName`, `middleName`, `email`, `number`, `birthday`, `region`, `province`, `city`, `barangay`, `street`, `zipcode`, `created_at`, `profile`) VALUES
(4, 196, '70d910e12ad815d67fea10c0fec1c86ba83d2a7492500f1afd', 581039807, 'client', 'Escalera', 'Jandel', 'L', 'client@gmail.com', '09366581432', '2003-01-26', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Tibag', '123 street', '', '2024-04-15 17:05:10', 'def.png'),
(8, 197, '53b9f97948d1b77cb60f145038acb24b94e59fe6ade2514f2b', 581039808, 'client2', 'client2', 'client', 'client', 'client2@gmail.com', '09366581432', '2024-04-28', 'MIMAROPA', 'Oriental Mindoro', 'City Of Calapan (Capital)', 'Canubing I', '', '', '2024-04-15 17:33:08', 'def.png');

-- --------------------------------------------------------

--
-- Table structure for table `client_plan`
--

CREATE TABLE `client_plan` (
  `id` int NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `client_id` int NOT NULL,
  `agent` int NOT NULL,
  `plan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mode_payment` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `term` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  `applicationNo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `commission` float NOT NULL,
  `receipt` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_plan`
--

INSERT INTO `client_plan` (`id`, `token`, `client_id`, `agent`, `plan`, `mode_payment`, `term`, `created_at`, `updated_at`, `applicationNo`, `status`, `commission`, `receipt`) VALUES
(33, '508f815dca6b1e08f0b6e6707ab5bba8375441710a80b6b03e', 206, 133, '62951ea5e91e573d76bbf6ad8d0e874c53eb4404343cebae527a2a0dffcb52378288230ea70a61dbe19ed987e79102c83560', 'Annual', 10, '2024-05-20 17:35:14', '2024-05-22 16:31:37', '581039809', 'paid', 60000, '1716226569_366cfd187f0eb066eecf.png');

-- --------------------------------------------------------

--
-- Table structure for table `client_scheduler`
--

CREATE TABLE `client_scheduler` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `clientName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `applicationNo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `complteaddress` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `selected_date` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `plan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `schedule_time` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `meeting_type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `client_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_scheduler`
--

INSERT INTO `client_scheduler` (`id`, `username`, `clientName`, `number`, `applicationNo`, `email`, `complteaddress`, `selected_date`, `agent`, `plan`, `schedule_time`, `meeting_type`, `status`, `created_at`, `client_id`) VALUES
(53, 'client', 'Escalera, Jandel L.', '09366581432', '581039807', 'client@gmail.com', 'MIMAROPA, Oriental Mindoro, City Of Calapan (Capital), Tibag, Asturias', '2024-5-21', '133', '62951ea5e91e573d76bbf6ad8d0e874c53eb4404343cebae527a2a0dffcb52378288230ea70a61dbe19ed987e79102c83560', '21:46', 'phone-call', 'completed', '2024-05-18 13:46:34', 196),
(57, 'ClientJandel', 'Client, Jandel C.', '09366581432', '581039809', 'smithlednaj@gmail.com', ', , , , ', '2024-5-22', '133', 'e87752f8a2c53bd4e3b99ac5a11b998edbf761944ef7b0680a1a8aa35cae179e7534f895a53971a312130fe954b6d364fc66', '00:46', 'phone-call', 'completed', '2024-05-20 16:46:44', 206),
(58, 'ClientJandel', 'Client, Jandel C.', '09366581432', '581039809', 'smithlednaj@gmail.com', 'MIMAROPA, Oriental Mindoro, City Of Calapan (Capital), Tawagan, 123', '2024-5-23', '133', '62951ea5e91e573d76bbf6ad8d0e874c53eb4404343cebae527a2a0dffcb52378288230ea70a61dbe19ed987e79102c83560', '01:31', 'office-meeting', 'completed', '2024-05-20 17:31:37', 206);

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `agent_id` int NOT NULL,
  `client_id` int NOT NULL,
  `commi` float NOT NULL,
  `amount_paid` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receipts` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `token`, `agent_id`, `client_id`, `commi`, `amount_paid`, `created_at`, `receipts`) VALUES
(37, '37fc7c46e384fdeef84e07e13388678e07acd4d43f8c095f67', 133, 206, 30000, 100000, '2024-05-20 17:35:14', '1716226514_b43042fefa5ac93f9db0.png'),
(38, 'e8f03e3191996ef735e689e868292d44f72e8b26266d675cc2', 133, 206, 30000, 100000, '2024-05-20 17:36:09', '1716226569_366cfd187f0eb066eecf.png');

-- --------------------------------------------------------

--
-- Table structure for table `e-signature`
--

CREATE TABLE `e-signature` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e-signature`
--

INSERT INTO `e-signature` (`id`, `user_id`, `user_token`, `signature`, `created_at`, `updated_at`) VALUES
(3, 134, '44f24ddb252b71f62db2520c4f2890414f5a485ab09854adc2', 'signature_1724597885.png', '2024-06-03 23:54:49', '2024-08-25 22:58:05'),
(4, 133, '12b34799076af5ed996429f8ee5aea631a2b921ad9e98f33d3', 'signature_1720875634.png', '2024-06-06 00:37:30', '2024-07-13 21:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `fback`
--

CREATE TABLE `fback` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fback`
--

INSERT INTO `fback` (`id`, `name`, `email`, `content`, `created_at`) VALUES
(1, 'Jandel', 'jandeleido@gmail.com', 'Smooth', '2024-04-10 18:09:09'),
(2, 'sprite', 'chris@gmail.com', 'Nice Capstone 3 ka saakin', '2024-04-13 00:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `file1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file2` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `file3` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `file4` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `file5` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `file6` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `token`, `file1`, `file2`, `file3`, `file4`, `file5`, `file6`, `created_at`) VALUES
(25, 176, 'dc63dfd7071f1b3bffcb529174467670', '1716694558_97a98352a5cf866ef9ce.png', '1716693483_d13b3219669270bfe312.docx', '1716693863_b765fb5c07f437a70a67.pdf', '1716694282_1627af94500ad20f7e40.jpg', '1716694297_118d7dccfa82a9edae6f.jpg', '1716694479_96b236ff050221ab5b85.png', '2024-05-26 02:55:17'),
(28, 134, '5dee0c44fcc99ce63558984fad331727', '1724599128_d5531774a0b5f3b08209.jpg', '1724599157_245d90e9b4d048ca71b4.pdf', '', '', '', '', '2024-08-25 15:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `gli`
--

CREATE TABLE `gli` (
  `id` int NOT NULL,
  `applicant_id` int DEFAULT NULL,
  `app_gli_token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `middleName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `companyName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `businessNature` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `civilStatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `residenceAddress` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `residenceTelephone` int DEFAULT NULL,
  `businessAddress` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `businessTelephone` int DEFAULT NULL,
  `firstName1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mi1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastName1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `month1` int DEFAULT NULL,
  `day1` int DEFAULT NULL,
  `year1` int DEFAULT NULL,
  `relationship1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstName2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mi2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastName2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `month2` int DEFAULT NULL,
  `day2` int DEFAULT NULL,
  `year2` int DEFAULT NULL,
  `relationship2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstName3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mi3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastName3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `month3` int DEFAULT NULL,
  `day3` int DEFAULT NULL,
  `year3` int DEFAULT NULL,
  `relationship3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstName4` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mi4` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastName4` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `month4` int DEFAULT NULL,
  `day4` int DEFAULT NULL,
  `year4` int DEFAULT NULL,
  `relationship4` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trusteeMinorBeneficiary` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `day` int DEFAULT NULL,
  `month` int DEFAULT NULL,
  `year` int DEFAULT NULL,
  `applicantSignature` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gli`
--

INSERT INTO `gli` (`id`, `applicant_id`, `app_gli_token`, `lastName`, `firstName`, `middleName`, `dateOfBirth`, `occupation`, `companyName`, `businessNature`, `sex`, `civilStatus`, `nationality`, `residenceAddress`, `residenceTelephone`, `businessAddress`, `businessTelephone`, `firstName1`, `mi1`, `lastName1`, `month1`, `day1`, `year1`, `relationship1`, `remarks1`, `firstName2`, `mi2`, `lastName2`, `month2`, `day2`, `year2`, `relationship2`, `remarks2`, `firstName3`, `mi3`, `lastName3`, `month3`, `day3`, `year3`, `relationship3`, `remarks3`, `firstName4`, `mi4`, `lastName4`, `month4`, `day4`, `year4`, `relationship4`, `remarks4`, `trusteeMinorBeneficiary`, `place`, `day`, `month`, `year`, `applicantSignature`, `created_at`, `updated_at`) VALUES
(1, 145, '05fd60d38fc468347b4122a5685a0dfca55de4b78721435de9', 'Candolita', 'Lieth', 'l', '2024-03-07', 'Nothing', 'ABC Compony', 'Ewan', 'Female', 'Married', 'Filipino', 'Calero', 123, 'Calero nablle', 321, 'Mama', 'ko', '123123123', 1, 26, 2000, 'mother', '123123', '123123', 'asd', '123123123', 2, 2, 0, 'qwe', 'qwe', '123123', 'asd', 'asd', 2, 2, 2, 'qwe', '123123', 'qwe', 'asd', 'qwe', 2, 2, 2, 'qwe', 'qwe', 'Sya', 'asd', 26, 1, 2000, 'qweqwe', NULL, NULL),
(2, 133, '12b34799076af5ed996429f8ee5aea631a2b921ad9e98f33d3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 138, '6ac375885b352b7cc1555d5f36398a6a7e4f44e8d5a2a0d7a6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 176, '8d3f2ec598d606580041f50bb888d5d3498790f542ea4c7ed8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 134, '44f24ddb252b71f62db2520c4f2890414f5a485ab09854adc2', 'Afable', 'Jansen', 'L.', '2024-06-04', 'none', '', '', 'male', 'Single', 'Filipino', 'Lumangbayan Calapan City Oriental Mindoro', 123123, '', 123123, 'Janzz', 'L', 'Esca', 0, 0, 0, 'Friends', '', '', '', '', 0, 0, 0, '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 0, 0, 0, '', '', '', 'May', 20, 323, 12, 'asd', NULL, '2024-06-17 12:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `lifechangerform`
--

CREATE TABLE `lifechangerform` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `app_life_token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `preferredArea` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referralBy` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referral` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `onlineAd` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `walkIn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `othersRef` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `placeOfBirth` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bloodType` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `homeAddress` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobileNo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `landline` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `othersCitizenship` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `naturalizationInfo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'N/A',
  `maritalStatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `maidenName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spouseName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sssNo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lifeInsuranceExperience` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `traditional` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `variable` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `recentInsuranceCompany` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `highSchool` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `highSchoolCourse` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `highSchoolYear` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `college` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `collegeCourse` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `collegeYear` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `graduateSchool` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `graduateCourse` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `graduateYear` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `companyName1` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `position1` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `employmentFrom1` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `employmentTo1` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `reason1` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `companyName2` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `position2` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `employmentFrom2` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `employmentTo2` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `reason2` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `companyName3` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `position3` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `employmentFrom3` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `employmentTo3` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `reason3` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `companyName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `resposition` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `contactName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `contactPosition` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `emailAddress` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `contactNumber` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `yescuremployed` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nocuremployed` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `allowed` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `notallowed` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ifnoProvdtls` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `persontonotif` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `moNo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `n1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `c1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `e1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `n2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `c2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `e2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `n3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `c3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `e3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g1y` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g1n` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `accused` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g2y` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g2n` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bankruptcy` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g3y` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g3n` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `investigated` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g4y` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g4n` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `terminat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `printedName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `botdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lifechangerform`
--

INSERT INTO `lifechangerform` (`id`, `user_id`, `app_life_token`, `created_at`, `updated_at`, `position`, `preferredArea`, `referralBy`, `referral`, `onlineAd`, `walkIn`, `othersRef`, `fname`, `nickname`, `birthdate`, `placeOfBirth`, `gender`, `bloodType`, `homeAddress`, `mobileNo`, `landline`, `email`, `citizenship`, `othersCitizenship`, `naturalizationInfo`, `maritalStatus`, `maidenName`, `spouseName`, `sssNo`, `tin`, `lifeInsuranceExperience`, `traditional`, `variable`, `recentInsuranceCompany`, `highSchool`, `highSchoolCourse`, `highSchoolYear`, `college`, `collegeCourse`, `collegeYear`, `graduateSchool`, `graduateCourse`, `graduateYear`, `companyName1`, `position1`, `employmentFrom1`, `employmentTo1`, `reason1`, `companyName2`, `position2`, `employmentFrom2`, `employmentTo2`, `reason2`, `companyName3`, `position3`, `employmentFrom3`, `employmentTo3`, `reason3`, `companyName`, `resposition`, `contactName`, `contactPosition`, `emailAddress`, `contactNumber`, `yescuremployed`, `nocuremployed`, `allowed`, `notallowed`, `ifnoProvdtls`, `persontonotif`, `moNo`, `n1`, `p1`, `c1`, `e1`, `n2`, `p2`, `c2`, `e2`, `n3`, `p3`, `c3`, `e3`, `g1y`, `g1n`, `accused`, `g2y`, `g2n`, `bankruptcy`, `g3y`, `g3n`, `investigated`, `g4y`, `g4n`, `terminat`, `printedName`, `botdate`) VALUES
(34, 134, '44f24ddb252b71f62db2520c4f2890414f5a485ab09854adc2', '2024-06-05 15:50:05', '2024-08-03 19:31:14', 'Agent', 'Calapan', 'Escalera, Jandel L', 'yes', 'No', 'No', 'No', 'Jansen Afable', 'Jansen', '2013-04-28', 'Lumangbayan', 'Male', 'N/A', 'Lumangbayan Calapan City Oriental Mindoro', '123', '123', 'jandeleido@gmail.com', 'Filipino', 'N/A', '', 'Single', '', '', '123', '123', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', '', '', '', '', 'N/A', 'N/A', 'N/A', 'N/A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', '', '2024-06-05'),
(35, 133, '12b34799076af5ed996429f8ee5aea631a2b921ad9e98f33d3', '2024-06-05 15:52:23', '2024-07-13 21:20:56', 'Agent', 'Calapan City', 'Afable, Eleanor L', 'yes', 'No', 'No', 'No', 'Jandel L. Escalera', 'Jandel', '2003-01-26', 'Calamba Laguna', 'Male', 'N/A', 'Lumangbayan Calapan City Oriental Mindoro', '123', '123', 'jandeleido@gmail.com', 'Filipino', 'N/A', '', 'Single', '', '', '123', '123', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', '', '', '', '', 'N/A', 'N/A', 'N/A', 'N/A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `notif` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brief_description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `com_percentage` int NOT NULL,
  `coverage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `plan_name`, `brief_description`, `description`, `price`, `token`, `created_at`, `image`, `com_percentage`, `coverage`) VALUES
(25, 'Allianz Well', 'A health insurance plan offered by Allianz that provides coverage for medical expenses, including hospitalization, surgeries, and consultations, ensuring you\'re financially protected against unexpected healthcare costs.', 'A health insurance plan offered by Allianz that provides coverage for medical expenses, including hospitalization, surgeries, and consultations, ensuring you\'re financially\r\nprotected against unexpected healthcare costs.', 100000, '62951ea5e91e573d76bbf6ad8d0e874c53eb4404343cebae527a2a0dffcb52378288230ea70a61dbe19ed987e79102c83560', '2024-04-13 11:51:40', '1715704016_0f86942b7642a8c62f4a.png', 30, 100000),
(26, 'Allianz Compass', 'An insurance plan designed to guide you through life\'s uncertainties, offering a range of                             coverage options tailored to your needs, including health, life, and property insurance,                             providing peace of m', 'An insurance plan designed to guide you through life\'s uncertainties, offering a range of coverage options tailored to your needs, including health, life, and property insurance, providing peace of mind for you and your family.', 100000, 'e87752f8a2c53bd4e3b99ac5a11b998edbf761944ef7b0680a1a8aa35cae179e7534f895a53971a312130fe954b6d364fc66', '2024-04-13 11:53:28', '1715704023_47d949e23e4c6e6b0290.png', 30, 10000),
(27, 'eAZy Health Blue', 'A basic health insurance package from Allianz, offering essential coverage for medical                             expenses such as doctor visits, prescription drugs, and diagnostic tests, ensuring                             affordable access to healthca', 'A basic health insurance package from Allianz, offering essential coverage for medical expenses such as doctor visits, prescription drugs, and diagnostic tests, ensuring affordable access to healthcare services when you need them most.', 100000, '533c3ce8dda4169936bf14547b8806aa6b945218cad18243b73b2163b3170958d4c4927bd0ce3fb30562e265d0a733fffebf', '2024-04-13 11:54:55', '1713009295_4520944f2bf09e6fdcb3.png', 30, 100000),
(28, 'eAZy Health Silver', 'A mid-tier health insurance plan by Allianz, providing broader coverage than the basic                             package, including additional benefits like specialist consultations, outpatient procedures,                             and wellness progra', 'A mid-tier health insurance plan by Allianz, providing broader coverage than the basic\r\npackage, including additional benefits like specialist consultations, outpatient procedures, and wellness programs, offering enhanced protection for your health and well-being.', 10000, '5efa711ec22d2c36d2a4e5662a31834f5425e9f590849e750c7f752e6ce974b107774c9481c4cfd00343adcebddb56533fb0', '2024-04-13 11:55:40', '1713009340_9c0f4833a3b57d7c4067.png', 30, 100000),
(29, 'eAZy Health Gold', 'A health insurance option from Allianz, offering extensive coverage for medical expenses,                             including hospitalization, surgeries, maternity care, and chronic disease management,                             ensuring you receive to', 'A health insurance option from Allianz, offering extensive coverage for medical expenses, including hospitalization, surgeries, maternity care, and chronic disease management, ensuring you receive top-quality healthcare without financial worries.', 100000, '69209f2ebe713c1613e1b94c0d57b976075bb368941c457a87737706c643f8fb683da2a48afc667e7bf40364141ee5909920', '2024-04-13 11:56:27', '1713009387_d4171fd161aae7aebbd4.png', 30, 100000),
(30, 'eAZy Health platinum', 'The highest level of health insurance coverage offered by Allianz, providing premium benefits                             such as worldwide medical coverage, VIP hospital accommodations, advanced treatments, and                             personalized he', 'The highest level of health insurance coverage offered by Allianz, providing premium benefits such as worldwide medical coverage, VIP hospital accommodations, advanced treatments, and personalized health services, ensuring you receive the best possible care wherever you are.', 100000, '7c5cf99bbd71b7c49e13e73d0afbcccf614d554681d932b5f9fa63579702e323d8677c69976fea42bd51e61d516e3d346365', '2024-04-13 11:57:14', '1713009434_886401b891eee0b14937.png', 30, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int NOT NULL,
  `title` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(1, 'T', 'asd', '2024-04-17 12:41:00', '2024-04-17 23:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `sou`
--

CREATE TABLE `sou` (
  `id` int NOT NULL,
  `applicant_id` int DEFAULT NULL,
  `app_sou_token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `position` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `printedname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sou`
--

INSERT INTO `sou` (`id`, `applicant_id`, `app_sou_token`, `position`, `name`, `printedname`, `created_at`, `updated_at`) VALUES
(5, 134, '44f24ddb252b71f62db2520c4f2890414f5a485ab09854adc2', 'asdqwasd', 'asd', 'wqsadsd', '2024-06-05 23:16:33', '2024-06-17 12:28:19'),
(6, 133, '12b34799076af5ed996429f8ee5aea631a2b921ad9e98f33d3', '123', '123', '123', '2024-06-05 23:20:45', '2024-06-05 23:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `to_confirm`
--

CREATE TABLE `to_confirm` (
  `id` int NOT NULL,
  `applicant_id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `middlename` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `refcode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `to_confirm`
--

INSERT INTO `to_confirm` (`id`, `applicant_id`, `username`, `token`, `number`, `firstname`, `lastname`, `middlename`, `email`, `refcode`, `role`, `created_at`) VALUES
(48, 211, 'admin3333333', '012d868b2d64b36d8844eae1655aa0c0ffc8e50e009ab0bfce', '1111111', 'Ariel', 'Escalera123', 'O', '1234@gmail.com', NULL, 'client', '2024-08-25 16:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `time_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `accountStatus` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `confirm` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `verification_token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pass_token` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `token`, `email`, `username`, `password`, `time_log`, `role`, `status`, `accountStatus`, `confirm`, `verification_token`, `created_at`, `pass_token`) VALUES
(92, '3e3b327501b42429fdca41da74f8df53307b681e4710b92949', 'cris@gmail.com', 'Chris', '$2y$10$ggzG3p6epFA1KwsNK3Hx7.TP0xAdweahPtxGHLnqP10pk91pRgxuu', '2024-08-26 12:57:41', 'admin', 'verified', '', 'true', '', '2023-12-09 16:58:18', ''),
(133, '12b34799076af5ed996429f8ee5aea631a2b921ad9e98f33d3', 'jandeleido@gmail.com', 'janz', '$2y$10$7p4wLbtAgfUWSbHKBpROGOV212nBJYr7Dos60Yo3V59oufB4nxfk6', '2024-08-25 14:54:53', 'agent', 'verified', 'active', 'true', '99', '2024-02-29 16:41:42', ''),
(134, '44f24ddb252b71f62db2520c4f2890414f5a485ab09854adc2', 'jansenafable@gmail.com', 'Jansen', '$2y$10$15KatkX.X04sUNVaUauONutwK8FMzGb4casktDC5ldtP8aDWX.NJG', '2024-08-25 15:17:38', 'applicant', 'verified', 'active', 'true', 'eedc19e7c7097173fd847a42d9a19623', '2024-02-29 16:46:28', ''),
(135, 'd000fd7c8315f1964e7e4a6e755daed0bd8ee44ef37d278597', 'ellenleido@gmail.com', 'Ellen', '$2y$10$Ypotf4Rphg/pUfGrE8XKOOD94spI5IX01xlRjwsiWv9zsJV5vNUby', '2024-05-12 16:45:32', 'agent', 'verified', 'active', 'true', '', '2024-02-29 16:55:53', ''),
(138, '6ac375885b352b7cc1555d5f36398a6a7e4f44e8d5a2a0d7a6', 'escalerajandel@gmail.com', 'jandel', '$2y$10$a8OaE2qHCOXkzWPCrrMLY.1zHWXrGnPnnMJhy2Xk/oimvgZBsQz.S', '2024-05-20 05:21:58', 'agent', 'verified', 'active', 'true', '921932e9c00eba63493b1226d1491998', '2024-03-10 06:15:55', ''),
(145, '05fd60d38fc468347b4122a5685a0dfca55de4b78721435de9', 'alejandrogino950@gmail.com', 'Lineth', '$2y$10$XD54H8NJd2BC4Src4V1IguDbzR5NrClVNvN/Vr9ERYXDlimnMWDze', '2024-05-05 03:43:29', 'agent', 'verified', 'active', 'true', '43bd99ce34b88bc2a3ed5a4079dd6ec2', '2024-03-11 16:53:33', ''),
(176, '8d3f2ec598d606580041f50bb888d5d3498790f542ea4c7ed8', 'Lester@gmail.com', 'Les', '$2y$10$MssN7JDnVyZki4UkZ5ShVumbCZvGT74HLFvN0BqnLk5TOxAwZFKjq', '2024-06-04 12:18:29', 'applicant', 'verified', 'active', 'true', 'db85b52bef570b057b11747327fc56dc', '2024-04-06 13:08:03', ''),
(196, '70d910e12ad815d67fea10c0fec1c86ba83d2a7492500f1afd', 'client@gmail.com', 'client', '$2y$10$kKLpAiMdO25stakT8x9xOeQY1OSBhe8FYKDaRSK6CLsT4yWlrvti.', '2024-08-25 15:16:26', 'client', 'verified', 'active', 'true', '', '2024-04-15 16:36:17', ''),
(197, '53b9f97948d1b77cb60f145038acb24b94e59fe6ade2514f2b', 'client2@gmail.com', 'client2', '$2y$10$8fdJQ3L2buJqIw7F/VRjFOSvjnV75wH2xSAf11gmsI6DlRCCK1JYW', '2024-05-14 16:46:27', 'client', 'verified', 'active', 'true', '', '2024-04-15 17:29:25', ''),
(201, '7ccdaf5a8ead0cd16d4993d50d21d11a1d03a8ed56f24612dd', 'test@gmail.com', 'test', '$2y$10$lugkVMUPGu93iEOO2Ra4g.k8JLoifsZWA8uVw80jq6ZM7WkS5W.sC', '2024-08-03 12:02:56', 'client', 'verified', 'active', 'true', 'e33bfae66f2d5d64186120a9d0df64b2a2cea57402494c8a97', '2024-04-18 12:22:10', ''),
(207, '4fbaadab8fff55fa587d2f891cbaaade44205dab3387ed12b5', 'smithlednaj@gmail.com', 'junz', '$2y$10$kQlLcqME0rtjDoMgU1jgd.h9kPTGQu7rMyDj88NGN/0gsrynWHZhu', '2024-08-20 06:13:38', 'applicant', 'unverified', 'active', 'false', '', '2024-08-20 06:13:38', ''),
(211, '012d868b2d64b36d8844eae1655aa0c0ffc8e50e009ab0bfce', '1234@gmail.com', 'admin3333333', '$2y$10$y4HUFmo3n1P2ZJg/cJDK8.5hSW/M/QwVRdfjhYDrZ5/AvNkJJNlYO', '2024-08-25 16:03:48', 'client', 'unverified', 'active', 'false', '', '2024-08-25 16:03:48', '');

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
  ADD KEY `fk_app_username` (`username`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `aial`
--
ALTER TABLE `aial`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `aonff`
--
ALTER TABLE `aonff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client_plan`
--
ALTER TABLE `client_plan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `client_scheduler`
--
ALTER TABLE `client_scheduler`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `e-signature`
--
ALTER TABLE `e-signature`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fback`
--
ALTER TABLE `fback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `gli`
--
ALTER TABLE `gli`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lifechangerform`
--
ALTER TABLE `lifechangerform`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sou`
--
ALTER TABLE `sou`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `to_confirm`
--
ALTER TABLE `to_confirm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_admin_token` FOREIGN KEY (`admin_token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `fk_agent_id` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_agent_token` FOREIGN KEY (`agent_token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_FA` FOREIGN KEY (`FA`) REFERENCES `agent` (`agent_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `aial`
--
ALTER TABLE `aial`
  ADD CONSTRAINT `fk_aial_token` FOREIGN KEY (`aial_token`) REFERENCES `applicant` (`app_token`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aial_userId` FOREIGN KEY (`user_id`) REFERENCES `applicant` (`applicant_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `aonff`
--
ALTER TABLE `aonff`
  ADD CONSTRAINT `fk_aonff_app_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_aonff_app_token` FOREIGN KEY (`app_aonff_token`) REFERENCES `applicant` (`app_token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `fk_app_id` FOREIGN KEY (`applicant_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_app_token` FOREIGN KEY (`app_token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_id` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_client_token` FOREIGN KEY (`client_token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `e-signature`
--
ALTER TABLE `e-signature`
  ADD CONSTRAINT `fk_esign_token` FOREIGN KEY (`user_token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userId_token` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `gli`
--
ALTER TABLE `gli`
  ADD CONSTRAINT `fk_gli_app_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_gli_app_token` FOREIGN KEY (`app_gli_token`) REFERENCES `applicant` (`app_token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lifechangerform`
--
ALTER TABLE `lifechangerform`
  ADD CONSTRAINT `fk_app_life_token` FOREIGN KEY (`app_life_token`) REFERENCES `applicant` (`app_token`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_life_app_id` FOREIGN KEY (`user_id`) REFERENCES `applicant` (`applicant_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sou`
--
ALTER TABLE `sou`
  ADD CONSTRAINT `fk_sou_app_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_sou_app_token` FOREIGN KEY (`app_sou_token`) REFERENCES `applicant` (`app_token`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
