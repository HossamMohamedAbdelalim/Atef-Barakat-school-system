-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2021 at 08:56 PM
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
-- Database: `system database`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_calender`
--

DROP TABLE IF EXISTS `academic_calender`;
CREATE TABLE IF NOT EXISTS `academic_calender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `durationtyp_id` int(11) NOT NULL,
  `date_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`,`durationtyp_id`,`date_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `area_names`
--

DROP TABLE IF EXISTS `area_names`;
CREATE TABLE IF NOT EXISTS `area_names` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_names`
--

INSERT INTO `area_names` (`id`, `name`, `area_id`) VALUES
(1, 'giza', 0),
(2, 'october', 1),
(3, 'area51', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bankaccounts(transaction)`
--

DROP TABLE IF EXISTS `bankaccounts(transaction)`;
CREATE TABLE IF NOT EXISTS `bankaccounts(transaction)` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `pay_details_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pay_details_id` (`pay_details_id`),
  KEY `user_id` (`user_id`,`payment_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankaccounts(transaction)`
--

INSERT INTO `bankaccounts(transaction)` (`id`, `user_id`, `payment_type_id`, `pay_details_id`) VALUES
(1, 1, 3, 0),
(2, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `Publication_year` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_id` (`categories_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `Publication_year`, `description`, `categories_id`) VALUES
(1, 'c', '2009', 'uujkbjbuk', 0),
(2, 'python ', '2012', 'ilkmll;k', 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

DROP TABLE IF EXISTS `borrow`;
CREATE TABLE IF NOT EXISTS `borrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `borrow_det._id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `borrow_det._id` (`borrow_det._id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `book_id`, `borrow_det._id`, `student_id`) VALUES
(1, 1, 0, 0),
(2, 2, 0, 0),
(3, 1, 0, 0),
(4, 2, 0, 0),
(5, 1, 2, 0),
(6, 6, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_details`
--

DROP TABLE IF EXISTS `borrow_details`;
CREATE TABLE IF NOT EXISTS `borrow_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `categories_type_id` int(11) NOT NULL,
  `duration_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`,`categories_type_id`,`duration_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_details`
--

INSERT INTO `borrow_details` (`id`, `book_id`, `categories_type_id`, `duration_id`, `created`) VALUES
(1, 5, 3, 2, '2021-12-23 19:32:56'),
(2, 8, 1, 6, '2021-12-23 19:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

DROP TABLE IF EXISTS `buses`;
CREATE TABLE IF NOT EXISTS `buses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categoriestype`
--

DROP TABLE IF EXISTS `categoriestype`;
CREATE TABLE IF NOT EXISTS `categoriestype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nametype` varchar(50) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoriestype`
--

INSERT INTO `categoriestype` (`id`, `nametype`, `parent_id`) VALUES
(1, 'horror', 0),
(2, 'science_fiction', 0),
(5, 'blood horror', 1),
(6, 'mars', 2);

-- --------------------------------------------------------

--
-- Table structure for table `co-ordinator_details`
--

DROP TABLE IF EXISTS `co-ordinator_details`;
CREATE TABLE IF NOT EXISTS `co-ordinator_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `co-ordinator_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

DROP TABLE IF EXISTS `date`;
CREATE TABLE IF NOT EXISTS `date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `duration_type_events`
--

DROP TABLE IF EXISTS `duration_type_events`;
CREATE TABLE IF NOT EXISTS `duration_type_events` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `duration` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `end_point_details`
--

DROP TABLE IF EXISTS `end_point_details`;
CREATE TABLE IF NOT EXISTS `end_point_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `end_point_name` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `evaluation_det_id` int(20) NOT NULL,
  `evaluationtype_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `evaluation_det_id`, `evaluationtype_id`, `student_id`, `marks`) VALUES
(1, 2, 2, 1, 0),
(2, 3, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_details`
--

DROP TABLE IF EXISTS `evaluation_details`;
CREATE TABLE IF NOT EXISTS `evaluation_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `marks_out_of` int(11) NOT NULL,
  `date` date NOT NULL,
  `evaluation_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`,`teacher_id`,`topic_id`),
  KEY `evaluation_type_id` (`evaluation_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation_details`
--

INSERT INTO `evaluation_details` (`id`, `subject_id`, `teacher_id`, `topic_id`, `marks_out_of`, `date`, `evaluation_type_id`) VALUES
(3, 2, 1, 2, 6, '2021-12-22', 0),
(4, 2, 3, 8, 9, '2021-12-15', 0),
(5, 200, 3, 9, 10, '2022-01-06', 6),
(6, 9, 13, 1, 15, '2021-12-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_type`
--

DROP TABLE IF EXISTS `evaluation_type`;
CREATE TABLE IF NOT EXISTS `evaluation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation_type`
--

INSERT INTO `evaluation_type` (`id`, `name`) VALUES
(1, 'quiz'),
(2, 'exam');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_cal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `academic_cal_id` (`academic_cal_id`,`user_id`,`event_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `html_data`
--

DROP TABLE IF EXISTS `html_data`;
CREATE TABLE IF NOT EXISTS `html_data` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `link` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `htmldata` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `paymentsdetails`
--

DROP TABLE IF EXISTS `paymentsdetails`;
CREATE TABLE IF NOT EXISTS `paymentsdetails` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `student_id` int(20) NOT NULL,
  `iscreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` int(100) NOT NULL,
  `paytype_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentsdetails`
--

INSERT INTO `paymentsdetails` (`id`, `student_id`, `iscreated`, `amount`, `paytype_id`) VALUES
(1, 1, '2021-12-22 08:41:52', 3535, 2),
(2, 2, '2021-12-22 08:41:52', 51235, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment_options`
--

DROP TABLE IF EXISTS `payment_options`;
CREATE TABLE IF NOT EXISTS `payment_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payments_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_options_value`
--

DROP TABLE IF EXISTS `payment_options_value`;
CREATE TABLE IF NOT EXISTS `payment_options_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payments_option_id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session_attendence`
--

DROP TABLE IF EXISTS `session_attendence`;
CREATE TABLE IF NOT EXISTS `session_attendence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_attendence`
--

INSERT INTO `session_attendence` (`id`, `session_id`, `student_id`, `status_id`) VALUES
(1, 20, 1, 3),
(2, 20, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `session_details`
--

DROP TABLE IF EXISTS `session_details`;
CREATE TABLE IF NOT EXISTS `session_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_it_made` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `teacher_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_details`
--

INSERT INTO `session_details` (`id`, `time_it_made`, `teacher_id`, `room_id`, `subject_id`) VALUES
(1, '2021-12-23 20:17:20', 3, 200, 2),
(2, '2021-12-23 20:17:20', 10, 30, 200);

-- --------------------------------------------------------

--
-- Table structure for table `start_point_details`
--

DROP TABLE IF EXISTS `start_point_details`;
CREATE TABLE IF NOT EXISTS `start_point_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_point_name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_status`
--

DROP TABLE IF EXISTS `student_status`;
CREATE TABLE IF NOT EXISTS `student_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_status`
--

INSERT INTO `student_status` (`id`, `name`) VALUES
(1, 'present'),
(2, 'absent'),
(3, 'late');

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
-- Table structure for table `subjects_registiration_details`
--

DROP TABLE IF EXISTS `subjects_registiration_details`;
CREATE TABLE IF NOT EXISTS `subjects_registiration_details` (
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
-- Table structure for table `subject_registeration`
--

DROP TABLE IF EXISTS `subject_registeration`;
CREATE TABLE IF NOT EXISTS `subject_registeration` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EducationalYear_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `DateTimeStamp` int(11) NOT NULL,
  `IsDeleted` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `EducationalYear_ID` (`EducationalYear_ID`),
  KEY `Student_ID` (`User_ID`)
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_useres`
--

INSERT INTO `tb_useres` (`ID`, `FullName`, `Email`, `Password`, `DateOfBirth`, `UserType_id`) VALUES
(1, 'JousifRefaat', 'jousif_refaat@gmail.com', '5616', '2001-06-20', 3),
(2, 'KirolosEhab', 'kirolos_ehab@gmail.com', '5612', '2005-06-15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

DROP TABLE IF EXISTS `transportation`;
CREATE TABLE IF NOT EXISTS `transportation` (
  `id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `transport_det_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transportdetails`
--

DROP TABLE IF EXISTS `transportdetails`;
CREATE TABLE IF NOT EXISTS `transportdetails` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `area_id` int(20) NOT NULL,
  `start_point_id` int(11) NOT NULL,
  `end_point_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `payment_details_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `area_id` (`area_id`,`start_point_id`,`end_point_id`,`driver_id`,`coordinator_id`,`bus_id`,`payment_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `typeofpayment`
--

DROP TABLE IF EXISTS `typeofpayment`;
CREATE TABLE IF NOT EXISTS `typeofpayment` (
  `paytype_id` int(11) NOT NULL AUTO_INCREMENT,
  `paytype` varchar(150) NOT NULL,
  PRIMARY KEY (`paytype_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_duration`
--

DROP TABLE IF EXISTS `type_duration`;
CREATE TABLE IF NOT EXISTS `type_duration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `duration` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_duration`
--

INSERT INTO `type_duration` (`id`, `duration`) VALUES
(1, '7days'),
(2, '14days');

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
-- Constraints for table `subjects_registiration_details`
--
ALTER TABLE `subjects_registiration_details`
  ADD CONSTRAINT `subjects_registiration_details_ibfk_1` FOREIGN KEY (`SUBJECT_ID`) REFERENCES `subjects` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_registiration_details_ibfk_2` FOREIGN KEY (`Registeration_id`) REFERENCES `subject_registeration` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_registeration`
--
ALTER TABLE `subject_registeration`
  ADD CONSTRAINT `subject_registeration_ibfk_1` FOREIGN KEY (`EducationalYear_ID`) REFERENCES `educational_year` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_registeration_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
