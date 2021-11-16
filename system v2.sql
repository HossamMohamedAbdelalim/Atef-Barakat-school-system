-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2021 at 08:16 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `educational_year`
--

DROP TABLE IF EXISTS `educational_year`;
CREATE TABLE IF NOT EXISTS `educational_year` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `links_aka_perms`
--

DROP TABLE IF EXISTS `links_aka_perms`;
CREATE TABLE IF NOT EXISTS `links_aka_perms` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FRIENDLYNAME` varchar(11) NOT NULL,
  `ADDRESS(LINKS)` varchar(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links_aka_perms`
--

INSERT INTO `links_aka_perms` (`ID`, `FRIENDLYNAME`, `ADDRESS(LINKS)`) VALUES
(1, 'user.php', 'dfdfxgxhf'),
(2, 'tgg.php', 'afxgxhccjg');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `ID` int(11) NOT NULL,
  `FriendlyName` int(11) NOT NULL,
  `LinkAddress` int(11) NOT NULL,
  `HTML` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SUBJECT_NAME` varchar(50) NOT NULL,
  `SUBJECT_CODE` varchar(5) NOT NULL,
  `GRADE` int(100) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subject_registeration`
--

DROP TABLE IF EXISTS `subject_registeration`;
CREATE TABLE IF NOT EXISTS `subject_registeration` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EducationalYear_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `DateTimeStamp` int(11) NOT NULL,
  `IsDeleted` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `EducationalYear_ID` (`EducationalYear_ID`),
  KEY `Student_ID` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sujects_registiration_details`
--

DROP TABLE IF EXISTS `sujects_registiration_details`;
CREATE TABLE IF NOT EXISTS `sujects_registiration_details` (
  `ID` int(11) NOT NULL,
  `SUBJECT_ID` int(11) NOT NULL,
  `Registeration_id` int(11) NOT NULL,
  `TimeStamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ClassWorkGrade` int(11) NOT NULL,
  `FinalGrade` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `SUBJECT_ID` (`SUBJECT_ID`),
  KEY `Registeration_id` (`Registeration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_useres`
--

DROP TABLE IF EXISTS `tb_useres`;
CREATE TABLE IF NOT EXISTS `tb_useres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `UserType_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserType_id` (`UserType_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(250) NOT NULL,
  `DOB` date NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `USERTYPE_ID` int(11) NOT NULL,
  `LINK_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USERTYPE_ID` (`USERTYPE_ID`),
  KEY `LINK_ID` (`LINK_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `FullName`, `DOB`, `USERNAME`, `Address`, `EMAIL`, `USERTYPE_ID`, `LINK_ID`) VALUES
(2, 'efyr77rufy', '2001-09-01', 'limo_h', 'wergdfusdtwt', 'hossam.mohamed@msa.edu,eg', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`ID`, `NAME`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Student'),
(4, 'Parent'),
(5, 'Accountant'),
(6, 'Librarian');

-- --------------------------------------------------------

--
-- Table structure for table `usertype_pages`
--

DROP TABLE IF EXISTS `usertype_pages`;
CREATE TABLE IF NOT EXISTS `usertype_pages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERTYPE_ID` int(11) NOT NULL,
  `Page_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USERTYPE_ID` (`USERTYPE_ID`),
  KEY `LINK_ID` (`Page_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subject_registeration`
--
ALTER TABLE `subject_registeration`
  ADD CONSTRAINT `subject_registeration_ibfk_1` FOREIGN KEY (`EducationalYear_ID`) REFERENCES `educational_year` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_registeration_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sujects_registiration_details`
--
ALTER TABLE `sujects_registiration_details`
  ADD CONSTRAINT `sujects_registiration_details_ibfk_1` FOREIGN KEY (`SUBJECT_ID`) REFERENCES `subjects` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sujects_registiration_details_ibfk_2` FOREIGN KEY (`Registeration_id`) REFERENCES `subject_registeration` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_useres`
--
ALTER TABLE `tb_useres`
  ADD CONSTRAINT `tb_useres_ibfk_1` FOREIGN KEY (`UserType_id`) REFERENCES `usertype` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`USERTYPE_ID`) REFERENCES `usertype` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`LINK_ID`) REFERENCES `links_aka_perms` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD CONSTRAINT `usertype_pages_ibfk_2` FOREIGN KEY (`USERTYPE_ID`) REFERENCES `usertype` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usertype_pages_ibfk_3` FOREIGN KEY (`Page_ID`) REFERENCES `pages` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
