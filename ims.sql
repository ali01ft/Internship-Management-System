-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 01:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Name`, `email`, `Password`) VALUES
(1254678, 'Ali Ashfaque', 'ali01ft@gmail.com', '123456789'),
(1414552, 'ali', 'alion@g.com', '123456789'),
(10124566, 'bibiana', 'bibiana@g.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `appID` int(255) NOT NULL,
  `STUDENT_ID` int(255) NOT NULL,
  `Job_ID` int(255) NOT NULL,
  `confirmation` varchar(3) DEFAULT NULL,
  `Proof` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`appID`, `STUDENT_ID`, `Job_ID`, `confirmation`, `Proof`, `Status`) VALUES
(111, 101223648, 1, 'YES', '111_101223648_2022-04-27.pdf', NULL),
(115, 101223648, 3, NULL, NULL, NULL),
(116, 101223648, 5, NULL, NULL, NULL),
(117, 101223648, 7, 'YES', '117_101223648_2022-04-28.pdf', 'Confirmed'),
(118, 101223648, 10, NULL, NULL, NULL),
(119, 101223648, 11, NULL, NULL, NULL),
(120, 101223648, 12, NULL, NULL, NULL),
(121, 101223648, 13, NULL, NULL, NULL),
(122, 101223648, 14, NULL, NULL, NULL),
(123, 101220012, 8, NULL, NULL, NULL),
(124, 101220012, 9, NULL, NULL, NULL),
(126, 101220012, 1, 'YES', '126_101220012_2022-04-28.pdf', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `REGIS_NO` int(255) NOT NULL,
  `COMPANY_NAME` varchar(50) NOT NULL,
  `COMPANY_ADDRESS` varchar(50) NOT NULL,
  `CONTACT_NO` varchar(20) NOT NULL,
  `WEBSITE` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`REGIS_NO`, `COMPANY_NAME`, `COMPANY_ADDRESS`, `CONTACT_NO`, `WEBSITE`, `Password`, `USERNAME`, `Email`) VALUES
(1202202, 'Samsung1234', '123 Korea town Malaysi', ' 0134423556', 'www.samsung.com', '123456', 'Samsung', 'Samsung2@sm.com'),
(78945612, 'Steam Org', 'asdasd', '1231564987', 'www.steam.com', 'Zz123456789', 'esteem', 'steam@s.com'),
(120212312, 'Mcdonalds768 ', 'Diabetes street, liver cancer town  ', ' 0123312312321 ', 'www.food.com ', '1234', 'Mcd', 'mcd@g.com '),
(2010312123, 'ZombieCorp', '123 Korea town China', '123123123', 'www.brains.com', '1234', '', 'zombie@g.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `Job_ID` int(11) NOT NULL,
  `Job_Title` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Qualification` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Vacancy` varchar(255) NOT NULL,
  `REGIS_NO` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`Job_ID`, `Job_Title`, `Location`, `Qualification`, `Category`, `Position`, `Vacancy`, `REGIS_NO`) VALUES
(1, 'trying something out', 'please work', 'anything', 'anything', 'anything', 'anything', 1202202),
(2, 'asdasd', 'asdasdsa', 'aasdasd', 'asdasda', 'asdasd', 'asdasd', 1202202),
(3, 'asdasd', 'asdasdasd', 'aasdasd', 'asdasda', 'asdasd', 'asdasd', 1202202),
(5, 'sdasd', 'asdasd', 'asdasd', 'asdasdsa', 'asdasd', 'asdasd', 1202202),
(7, 'sdasd', 'asdas', 'adsdas', 'asdasd', 'asdasd', 'asdasd', 1202202),
(8, 'This will is good enough', 'kuching ', 'i dont know', 'enough now', 'please confirm', 'lets finish this', 120212312),
(9, 'asdasd', 'asdasd', 'dasdas', 'asdasdas', 'sadasd', 'sadasd', 120212312),
(10, 'asdasda', 'dasdasdasd', 'asdasdasd', 'asdasdasda', 'asdasdasd', 'asdasdas', 1202202),
(11, 'asdasdasdas', 'asdsadas', 'asdasdas', 'asdasdasdsad', 'asdasdasd', 'asdasdasd', 1202202),
(12, 'sadasdasd', 'asdasdsad', 'aasdasdas', 'asdasdas', 'asdsad', 'asdasdas', 1202202),
(13, 'asdasdas', 'asdasdas', 'asdsada', 'asdasd', 'asdasd', 'asdasd', 1202202),
(14, 'asdasdasdasd', 'asdasdasdasd', 'asdasdsadsad', 'asdasdsadas', 'asdasdasdasd', 'asdasdasdasdas', 1202202);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STUDENT_ID` int(255) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `STUDENT_EMAIL` varchar(100) NOT NULL,
  `COURSE` varchar(50) NOT NULL,
  `ENROLL` varchar(10) DEFAULT NULL,
  `SUPERVISOR` varchar(50) DEFAULT NULL,
  `GENDER` varchar(7) NOT NULL,
  `CURRENT_RESIDENCE` varchar(100) NOT NULL,
  `CONTACT_NO` varchar(20) NOT NULL,
  `YEAR_OF_STUDY` varchar(1) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `CV` varchar(30) DEFAULT NULL,
  `USERNAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STUDENT_ID`, `NAME`, `STUDENT_EMAIL`, `COURSE`, `ENROLL`, `SUPERVISOR`, `GENDER`, `CURRENT_RESIDENCE`, `CONTACT_NO`, `YEAR_OF_STUDY`, `PASSWORD`, `CV`, `USERNAME`) VALUES
(101220011, 'Geralt', '101220011@student.swinburne.edu.my', 'Bachelors of information technology', NULL, NULL, 'Male', 'dasdasdasd', '1665456547', '3', '1234', 'profile101220011.pdf', 'chou'),
(101220012, 'Geraltdina', '101220012@student.swinburne.edu.my', 'Bachelors of Engineering', 'Confirmed', NULL, 'Female', 'dasdasdasd', '1665456547', '2', '1234', 'profile101220012.pdf', 'chouis'),
(101220016, 'Eric Kau', '101220016@students.swinburne.edu.my', 'Bachelors of Commerce', NULL, NULL, 'Male', 'asdasdasda', '0172564896', '3', '1234', 'profile101220016.pdf', 'Eric'),
(101220213, 'Andrew Michael', '101220213@students.swinburne.edu.my', 'Bachelors of Commerce', NULL, NULL, 'Male', 'asdasdasda', '0172564897', '3', '12345', 'profile101220213.pdf', 'ErgoProxy'),
(101220516, 'AaL', '101220516@students.swinburne.edu.my', 'Bachelors of Commerce', NULL, NULL, 'Male', 'asdasdsadas', '0176395488', '2', '12345', 'profile101220516.pdf', 'aas'),
(101223648, 'Araslan Hossain', '101223648@students.swinburne.edu.my', 'Bachelors of Intformation Technology ', 'Confirmed', NULL, 'Male ', '432, lorong kenny hill 5, kuching, sarawak, malaysia', '01774587524', '3', '123456789', NULL, 'arasln'),
(101320618, 'haider', '101320618@students.swinburne.edu.my', 'Bachelors of Marketing', NULL, NULL, 'Male', 'ta 145 sadasdas', '0122231577', '3', '1234', 'profile101320618.pdf', 'hayze');

-- --------------------------------------------------------

--
-- Stand-in structure for view `students_nonappliedjobs`
-- (See below for the actual view)
--
CREATE TABLE `students_nonappliedjobs` (
`NAME` varchar(50)
,`STUDENT_ID` int(255)
,`REGIS_NO` int(20)
,`Job_ID` int(11)
,`Job_Title` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `weak_entity`
--

CREATE TABLE `weak_entity` (
  `appID` int(11) NOT NULL,
  `Proof` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `students_nonappliedjobs`
--
DROP TABLE IF EXISTS `students_nonappliedjobs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`trial for more options`@`%` SQL SECURITY DEFINER VIEW `students_nonappliedjobs`  AS SELECT `a`.`NAME` AS `NAME`, `a`.`STUDENT_ID` AS `STUDENT_ID`, `j`.`REGIS_NO` AS `REGIS_NO`, `j`.`Job_ID` AS `Job_ID`, `j`.`Job_Title` AS `Job_Title` FROM ((`student` `a` join `applicants` `o` on(`a`.`STUDENT_ID` = `o`.`STUDENT_ID`)) join `jobs` `j` on(`o`.`Job_ID` = `j`.`Job_ID`)) WHERE `a`.`STUDENT_ID` <> 101223648101223648  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`appID`),
  ADD KEY `STUDENT_ID` (`STUDENT_ID`),
  ADD KEY `Job_ID` (`Job_ID`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`REGIS_NO`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`Job_ID`),
  ADD KEY `REGIS_NO` (`REGIS_NO`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`STUDENT_ID`);

--
-- Indexes for table `weak_entity`
--
ALTER TABLE `weak_entity`
  ADD PRIMARY KEY (`appID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `appID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Job_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`),
  ADD CONSTRAINT `applicants_ibfk_2` FOREIGN KEY (`Job_ID`) REFERENCES `jobs` (`Job_ID`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`REGIS_NO`) REFERENCES `industry` (`REGIS_NO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
