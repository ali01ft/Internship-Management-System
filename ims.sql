-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 07:49 AM
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
(88, 101220516, 20, 'YES', NULL, 'pending'),
(89, 101220213, 20, 'YES', NULL, NULL),
(90, 101223648, 21, NULL, NULL, NULL),
(91, 101220611, 19, 'YES', NULL, NULL),
(92, 101220668, 21, NULL, NULL, NULL),
(93, 101220668, 20, 'YES', '93_101220668_2022-05-10.pdf', 'Confirmed'),
(94, 101220668, 19, 'YES', NULL, NULL),
(95, 101220699, 21, NULL, NULL, NULL),
(96, 101220699, 20, 'YES', '96_101220699_2022-05-10.pdf', 'Confirmed'),
(97, 101220699, 19, 'YES', NULL, NULL),
(98, 101220016, 21, 'YES', NULL, 'pending'),
(99, 101220016, 20, NULL, NULL, NULL),
(100, 101220016, 22, NULL, NULL, NULL),
(101, 101220016, 23, 'YES', NULL, NULL),
(102, 101220016, 24, 'YES', NULL, NULL),
(103, 101220016, 19, 'YES', '103_101220016_2022-05-18.pdf', 'Confirmed');

-- --------------------------------------------------------

--
-- Stand-in structure for view `confirmed_details`
-- (See below for the actual view)
--
CREATE TABLE `confirmed_details` (
`Job_ID` int(255)
,`REGIS_NO` int(20)
,`STUDENT_ID` int(255)
,`NAME` varchar(50)
,`STUDENT_EMAIL` varchar(100)
,`COURSE` varchar(50)
,`YEAR_OF_STUDY` varchar(1)
,`CV` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `appID` int(255) NOT NULL,
  `email` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`REGIS_NO`, `COMPANY_NAME`, `COMPANY_ADDRESS`, `CONTACT_NO`, `WEBSITE`, `Password`, `USERNAME`, `Email`) VALUES
(1202202, 'Samsung', '123 Korea town Malaysia', '0134423556', 'www.samsung.com', '12345', 'Samsung', 'Samsung@sm.com'),
(1202232, 'LG', 'Zimbabwe', '123123123', 'www.LG.com', '1234', 'Lifes good', 'lg@lg.com'),
(2010312, 'Mircosoft', '123 America town Malaysia', '013442123', 'www.mircosoft.com', '12345', 'MS', 'MS@outlook.com'),
(120212312, 'Mcdonalds', 'Diabetes street, liver cancer town ', '0123312312321', 'www.food.com', '1234', 'Mcd', 'mcd@g.com'),
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
  `REGIS_NO` int(20) NOT NULL,
  `Date_Posted` date DEFAULT NULL,
  `Date_End` date DEFAULT NULL,
  `Extra_Details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`Job_ID`, `Job_Title`, `Location`, `Qualification`, `Category`, `Position`, `Vacancy`, `REGIS_NO`, `Date_Posted`, `Date_End`, `Extra_Details`) VALUES
(19, 'Seating man near the table', 'kuching', 'O levels', 'Industry ', 'entry level', '222', 2010312123, '2022-05-10', '2022-05-24', NULL),
(20, 'Web developement intern needed ', 'kuching', 'first year completed', 'Mechanical Engineering', 'youtube', '111', 1202202, '2022-05-10', '2023-05-02', NULL),
(21, 'Intern for observer', 'kualalampur', 'second year student', ' car industry ', 'anything', '121', 2010312, '2022-05-11', '2022-05-12', NULL),
(22, 'yadayad', 'dasdsad', 'dasd', 'asdasdas', 'asdas', '123', 1202202, '2022-05-10', '2022-08-10', NULL),
(23, 'New trial', 'kuching', 'you are unqualified', 'Car Industry', 'janiter', 'none', 1202202, '2022-05-13', '2022-08-13', NULL),
(24, 'The last trial', 'This is over', 'I am done', 'Telecom Industry', 'i dont care', 'Please work', 1202202, '2022-05-13', '2022-11-13', 'Thanks for playing');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STUDENT_ID` int(255) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `STUDENT_EMAIL` varchar(100) NOT NULL,
  `COURSE` varchar(50) NOT NULL,
  `ENROLL` varchar(255) DEFAULT NULL,
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
(101220016, 'Eric Kau', '101220016@students.swinburne.edu.my', 'Bachelors of Commerce', 'Confirmed', 'jim', 'Male', '567 kuchching road', '0172564896', '3', '1234', 'profile101220016.pdf', 'Eric'),
(101220213, 'Andrew Michael', '101220213@students.swinburne.edu.my', 'Bachelors of Commerce', NULL, 'ali', 'Male', 'TA165, genting highlands', '0172564897', '3', '12345', 'profile101220213.pdf', 'ErgoProxy'),
(101220516, 'AaL', '101220516@students.swinburne.edu.my', 'Bachelors of Commerce', NULL, NULL, 'Male', '43 street, london', '0176395488', '2', '12345', 'profile101220516.pdf', 'aas'),
(101220611, 'Ashfaque Ali', '101220611@students.swinburne.edu.my', 'Bachelors of information technology', NULL, NULL, 'Male', 'dhaka bangladesh', '123456789', '3', '1234', 'profile101220611.pdf', 'shag'),
(101220668, 'Asfaque Ali', '101220668@students.swinburne.edu.my', 'Bachelors of Commerce', 'Confirmed', 'arsalan', 'Male', 'dhaka bangladesh', '01752658745', '3', '1234', 'profile101220668.pdf', 'shag'),
(101220699, 'Eric Mohammad', '101220699@students.swinburne.edu.my', 'Bachelors of Commerce', 'Confirmed', NULL, 'Male', '433 kenny hill kuching ', '1454175', '3', '1234', 'profile101220699.pdf', 'shag'),
(101223648, 'Araslan Hossain', '101223648@students.swinburne.edu.my', 'Bachelors of Intformation Technology ', '0', NULL, 'Male ', '432, lorong kenny hill 5, kuching, sarawak, malaysia', '01774587524', '3', '123456789', NULL, 'arasln');

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
-- Stand-in structure for view `student_job_details`
-- (See below for the actual view)
--
CREATE TABLE `student_job_details` (
`STUDENT_ID` int(255)
,`REGIS_NO` int(20)
,`COMPANY_NAME` varchar(50)
,`Job_ID` int(11)
,`Job_Title` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `student_review_table`
--

CREATE TABLE `student_review_table` (
  `FeedID` int(255) NOT NULL,
  `STUDENT_ID` int(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `rating_question1` varchar(4) DEFAULT NULL,
  `rating_question2` varchar(4) DEFAULT NULL,
  `user_rating` int(5) DEFAULT NULL,
  `user_review` varchar(255) DEFAULT NULL,
  `datetime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_review_table`
--

INSERT INTO `student_review_table` (`FeedID`, `STUDENT_ID`, `user_name`, `rating_question1`, `rating_question2`, `user_rating`, `user_review`, `datetime`) VALUES
(10, 101220016, 'Eric Kau', 'Yes', 'Yes', 5, 'asdasd', '2022-05-18');

-- --------------------------------------------------------

--
-- Structure for view `confirmed_details`
--
DROP TABLE IF EXISTS `confirmed_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `confirmed_details`  AS SELECT `a`.`Job_ID` AS `Job_ID`, `j`.`REGIS_NO` AS `REGIS_NO`, `s`.`STUDENT_ID` AS `STUDENT_ID`, `s`.`NAME` AS `NAME`, `s`.`STUDENT_EMAIL` AS `STUDENT_EMAIL`, `s`.`COURSE` AS `COURSE`, `s`.`YEAR_OF_STUDY` AS `YEAR_OF_STUDY`, `s`.`CV` AS `CV` FROM (((`student` `s` join `applicants` `a` on(`s`.`STUDENT_ID` = `a`.`STUDENT_ID`)) join `jobs` `j` on(`a`.`Job_ID` = `j`.`Job_ID`)) join `industry` `i` on(`j`.`REGIS_NO` = `i`.`REGIS_NO`)) WHERE `s`.`ENROLL` = 'confirmed''confirmed'  ;

-- --------------------------------------------------------

--
-- Structure for view `students_nonappliedjobs`
--
DROP TABLE IF EXISTS `students_nonappliedjobs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`trial for more options`@`%` SQL SECURITY DEFINER VIEW `students_nonappliedjobs`  AS SELECT `a`.`NAME` AS `NAME`, `a`.`STUDENT_ID` AS `STUDENT_ID`, `j`.`REGIS_NO` AS `REGIS_NO`, `j`.`Job_ID` AS `Job_ID`, `j`.`Job_Title` AS `Job_Title` FROM ((`student` `a` join `applicants` `o` on(`a`.`STUDENT_ID` = `o`.`STUDENT_ID`)) join `jobs` `j` on(`o`.`Job_ID` = `j`.`Job_ID`)) WHERE `a`.`STUDENT_ID` <> 101223648101223648101223648101223648101223648101223648101223648101223648  ;

-- --------------------------------------------------------

--
-- Structure for view `student_job_details`
--
DROP TABLE IF EXISTS `student_job_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_job_details`  AS SELECT `s`.`STUDENT_ID` AS `STUDENT_ID`, `j`.`REGIS_NO` AS `REGIS_NO`, `i`.`COMPANY_NAME` AS `COMPANY_NAME`, `j`.`Job_ID` AS `Job_ID`, `j`.`Job_Title` AS `Job_Title` FROM (((`student` `s` join `applicants` `a` on(`s`.`STUDENT_ID` = `a`.`STUDENT_ID`)) join `jobs` `j` on(`a`.`Job_ID` = `j`.`Job_ID`)) join `industry` `i` on(`j`.`REGIS_NO` = `i`.`REGIS_NO`))  ;

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
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`appID`);

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
-- Indexes for table `student_review_table`
--
ALTER TABLE `student_review_table`
  ADD PRIMARY KEY (`FeedID`),
  ADD KEY `STUDENT_ID` (`STUDENT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `appID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `appID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Job_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `student_review_table`
--
ALTER TABLE `student_review_table`
  MODIFY `FeedID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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

--
-- Constraints for table `student_review_table`
--
ALTER TABLE `student_review_table`
  ADD CONSTRAINT `student_review_table_ibfk_1` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
