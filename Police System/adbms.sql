-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 03:22 PM
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
(12, 'Murder De La Casa', ' Mass Murder', 'Killing', 'Bailable', 'Closed', 'Anti-Crime', 11, '102'),
(14, 'Murder De La Home', ' Homicide', 'Murder at his Grandma House', 'Unknown', 'Open', 'R.A 192.122', 11, '104');

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
(11, 'Laud Zion', 'Sayon', '2023-05-09 18:17:36', '102');

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
('102', 'Laud Zion Cascalla', 'Male', 21, ' Developer', 'General', 'Corporal', 0x322e6a7067),
('104', 'Joanne Crizaldo', 'Female', 37, ' Patrol', 'Bachelor', 'Chismosa', 0x322e6a7067);

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
  `PersonAge` int(11) NOT NULL,
  `PersonGender` varchar(15) NOT NULL,
  `PersonAddress` varchar(100) NOT NULL,
  `RoleType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personintherole`
--

INSERT INTO `personintherole` (`PersonID`, `PersonName`, `PersonAge`, `PersonGender`, `PersonAddress`, `RoleType`) VALUES
(10, 'Lourd Rey', 25, 'Male', 'Lalayat San jose Batangas', 'Suspect'),
(11, 'Chamie Carandang', 20, 'Female', ' San Jose Batangas', 'VIctim');

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
  ADD PRIMARY KEY (`PersonID`);

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
  MODIFY `CaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `officeraccount`
--
ALTER TABLE `officeraccount`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personcaseinformation`
--
ALTER TABLE `personcaseinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personintherole`
--
ALTER TABLE `personintherole`
  MODIFY `PersonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
