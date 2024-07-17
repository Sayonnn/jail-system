-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 04:21 AM
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
-- Database: `adbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminaccount`
--

CREATE TABLE `adminaccount` (
  `AdminID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminaccount`
--

INSERT INTO `adminaccount` (`AdminID`, `Username`, `Password`, `DateCreated`) VALUES
(1, 'Laud Zion', 'Sayon', '2023-05-03 09:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `authorizeadmin`
--

CREATE TABLE `authorizeadmin` (
  `AuthorizeID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `SecretPin` varchar(50) NOT NULL,
  `SecretPassword` varchar(50) NOT NULL,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authorizeadmin`
--

INSERT INTO `authorizeadmin` (`AuthorizeID`, `Email`, `Code`, `SecretPin`, `SecretPassword`, `AdminID`) VALUES
(1, 'cascallalaudzion19@gmail.com', '91902', 'POGIAKO', 'JOKELANG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `casetable`
--

CREATE TABLE `casetable` (
  `CaseID` int(11) NOT NULL,
  `CaseName` varchar(100) NOT NULL,
  `CaseType` varchar(50) NOT NULL,
  `CaseDesc` longtext DEFAULT NULL,
  `CaseDegree` varchar(50) NOT NULL,
  `CaseStatus` varchar(50) NOT NULL,
  `ApplicableLaw` longtext DEFAULT NULL,
  `PersonID` int(11) DEFAULT NULL,
  `OfficerID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `casetable`
--

INSERT INTO `casetable` (`CaseID`, `CaseName`, `CaseType`, `CaseDesc`, `CaseDegree`, `CaseStatus`, `ApplicableLaw`, `PersonID`, `OfficerID`) VALUES
(15, 'Dela Hoya', ' Homicide', 'The kid on drug addiction killed his entire family', 'Bailable', 'Open', 'R.A Unknown', NULL, '104'),
(16, 'Laud Zion Cascalla', ' Suicide', 'The girl in depresssion jump out of the rooftop', 'None', 'Closed', 'R.A 2202', NULL, '104'),
(17, 'Mysterious Lost', ' Kidnapping', 'The girl was nowhere to be found', 'None', 'Closed', 'None', NULL, '104');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Message` longtext NOT NULL,
  `OfficerID` varchar(25) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Rank` varchar(100) NOT NULL,
  `DateSent` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageID`, `Title`, `Message`, `OfficerID`, `Name`, `Rank`, `DateSent`) VALUES
(7, 'Love Scars', 'takot nakong masugatan', '104', 'Chamie Carandang', 'Bachelor', '2023-05-10 22:51:46'),
(9, 'tip toe', 'meow', '104', 'Chamie Carandang', 'Bachelor', '2023-05-10 22:52:04'),
(10, 'shawti', 'arf arf', '104', 'Chamie Carandang', 'Bachelor', '2023-05-10 22:52:15'),
(12, 'Twinkle', 'Twinkle litter star', '104', 'Chamie Carandang', 'Bachelor', '2023-05-11 11:55:30'),
(13, 'Hey!', 'How are you?', '104', 'Chamie Carandang', 'Bachelor', '2023-05-11 11:55:49'),
(14, 'I like you', 'As a friend', '104', 'Chamie Carandang', 'Bachelor', '2023-05-11 11:56:05'),
(17, 'Ulaga ako', 'oo nga daw', '104', 'Chamie Carandang', 'Bachelor', '2023-05-11 14:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `officeraccount`
--

CREATE TABLE `officeraccount` (
  `AccountID` int(11) NOT NULL,
  `OfficerUsername` varchar(50) NOT NULL,
  `OfficerPassword` varchar(50) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `OfficerID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officeraccount`
--

INSERT INTO `officeraccount` (`AccountID`, `OfficerUsername`, `OfficerPassword`, `DateCreated`, `OfficerID`) VALUES
(9, 'Sayon', 'Sayon19!', '2023-09-05 06:17:56', '102'),
(11, 'Laud Zion', 'Sayon', '2023-05-09 18:17:36', '104'),
(12, 'paul', ' alvin', '2023-05-11 10:41:40', '107');

-- --------------------------------------------------------

--
-- Table structure for table `officerinformation`
--

CREATE TABLE `officerinformation` (
  `OfficerID` varchar(25) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Age` int(11) NOT NULL,
  `Duty` varchar(255) NOT NULL,
  `Rank` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officerinformation`
--

INSERT INTO `officerinformation` (`OfficerID`, `Name`, `Gender`, `Age`, `Duty`, `Rank`, `Position`, `Image`) VALUES
('102', 'Laud Zion Cascalla', 'Male', 21, ' Developer', 'Bachelor of Science in Information Technology', 'Corporal', 0x322e6a7067),
('104', 'Chamie Carandang', 'Female', 20, ' Muse', 'Bachelor', 'Chismosa', 0x332e6a7067),
('107', 'Paul Alvin', 'Male', 20, ' asf', 'asdf', 'asdf', 0x626c75656c6f676f2e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `personcaseinformation`
--

CREATE TABLE `personcaseinformation` (
  `ID` int(11) NOT NULL,
  `Investigation` longtext DEFAULT NULL,
  `Proofs` longblob DEFAULT NULL,
  `LegalDocs` longblob DEFAULT NULL,
  `CaseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personintherole`
--

CREATE TABLE `personintherole` (
  `PersonID` int(11) NOT NULL,
  `PersonName` varchar(100) NOT NULL,
  `PersonAge` int(11) DEFAULT NULL,
  `PersonGender` varchar(15) NOT NULL,
  `PersonAddress` varchar(150) NOT NULL,
  `RoleType` varchar(50) NOT NULL,
  `CaseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personintherole`
--

INSERT INTO `personintherole` (`PersonID`, `PersonName`, `PersonAge`, `PersonGender`, `PersonAddress`, `RoleType`, `CaseID`) VALUES
(1, 'Laud Zion Cascalla', 20, 'Male', 'Lalayat San Jose Batangas', 'Victim', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminaccount`
--
ALTER TABLE `adminaccount`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `authorizeadmin`
--
ALTER TABLE `authorizeadmin`
  ADD PRIMARY KEY (`AuthorizeID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `casetable`
--
ALTER TABLE `casetable`
  ADD PRIMARY KEY (`CaseID`),
  ADD KEY `PersonID` (`PersonID`),
  ADD KEY `OfficerID` (`OfficerID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `officeraccount`
--
ALTER TABLE `officeraccount`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `OfficerID` (`OfficerID`);

--
-- Indexes for table `officerinformation`
--
ALTER TABLE `officerinformation`
  ADD PRIMARY KEY (`OfficerID`);

--
-- Indexes for table `personcaseinformation`
--
ALTER TABLE `personcaseinformation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CaseID` (`CaseID`);

--
-- Indexes for table `personintherole`
--
ALTER TABLE `personintherole`
  ADD PRIMARY KEY (`PersonID`),
  ADD KEY `CaseID` (`CaseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminaccount`
--
ALTER TABLE `adminaccount`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authorizeadmin`
--
ALTER TABLE `authorizeadmin`
  MODIFY `AuthorizeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `casetable`
--
ALTER TABLE `casetable`
  MODIFY `CaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `officeraccount`
--
ALTER TABLE `officeraccount`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personcaseinformation`
--
ALTER TABLE `personcaseinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personintherole`
--
ALTER TABLE `personintherole`
  MODIFY `PersonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authorizeadmin`
--
ALTER TABLE `authorizeadmin`
  ADD CONSTRAINT `authorizeadmin_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `adminaccount` (`AdminID`);

--
-- Constraints for table `casetable`
--
ALTER TABLE `casetable`
  ADD CONSTRAINT `casetable_ibfk_1` FOREIGN KEY (`PersonID`) REFERENCES `personintherole` (`PersonID`) ON DELETE SET NULL,
  ADD CONSTRAINT `casetable_ibfk_2` FOREIGN KEY (`OfficerID`) REFERENCES `officerinformation` (`OfficerID`) ON DELETE SET NULL;

--
-- Constraints for table `officeraccount`
--
ALTER TABLE `officeraccount`
  ADD CONSTRAINT `officeraccount_ibfk_1` FOREIGN KEY (`OfficerID`) REFERENCES `officerinformation` (`OfficerID`) ON DELETE CASCADE;

--
-- Constraints for table `personcaseinformation`
--
ALTER TABLE `personcaseinformation`
  ADD CONSTRAINT `personcaseinformation_ibfk_1` FOREIGN KEY (`CaseID`) REFERENCES `casetable` (`CaseID`) ON DELETE CASCADE;

--
-- Constraints for table `personintherole`
--
ALTER TABLE `personintherole`
  ADD CONSTRAINT `personintherole_ibfk_1` FOREIGN KEY (`CaseID`) REFERENCES `casetable` (`CaseID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
