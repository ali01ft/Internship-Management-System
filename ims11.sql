-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 09:05 AM
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
  `Status` varchar(255) DEFAULT NULL,
  `Date_Applied` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`appID`, `STUDENT_ID`, `Job_ID`, `confirmation`, `Proof`, `Status`, `Date_Applied`) VALUES
(89, 101220213, 20, 'YES', NULL, NULL, NULL),
(91, 101220611, 19, 'YES', NULL, 'Completed', NULL),
(92, 101220668, 21, 'YES', NULL, NULL, NULL),
(93, 101220668, 20, 'YES', '93_101220668_2022-05-10.pdf', 'Confirmed', NULL),
(94, 101220668, 19, 'YES', NULL, NULL, NULL),
(95, 101220699, 21, 'YES', NULL, NULL, NULL),
(96, 101220699, 20, 'YES', '96_101220699_2022-05-10.pdf', 'Confirmed', NULL),
(97, 101220699, 19, 'YES', NULL, NULL, NULL),
(98, 101220016, 21, 'YES', NULL, 'Completed', NULL),
(99, 101220016, 20, NULL, NULL, NULL, NULL),
(100, 101220016, 22, NULL, NULL, NULL, NULL),
(101, 101220016, 23, 'YES', NULL, NULL, NULL),
(102, 101220016, 24, 'YES', NULL, NULL, NULL),
(103, 101220016, 19, 'YES', '103_101220016_2022-05-18.pdf', 'Completed', NULL),
(104, 101220121, 21, 'YES', '104_101220121_2022-05-25.pdf', 'Ended', NULL),
(105, 101220121, 20, NULL, NULL, NULL, NULL),
(106, 101220121, 22, NULL, NULL, NULL, NULL),
(107, 101220121, 23, 'YES', NULL, NULL, NULL),
(108, 101220121, 24, 'YES', NULL, NULL, NULL),
(109, 101220121, 19, 'YES', NULL, NULL, NULL),
(110, 101222777, 21, 'YES', '110_101222777_2022-05-25.pdf', 'Completed', NULL),
(111, 101222777, 25, 'YES', NULL, 'Confirmed', NULL),
(112, 101222777, 26, NULL, NULL, NULL, NULL),
(113, 101222777, 20, NULL, NULL, NULL, NULL),
(114, 101222777, 22, NULL, NULL, NULL, NULL),
(115, 101222777, 23, 'YES', NULL, NULL, NULL),
(116, 101222777, 24, NULL, NULL, NULL, NULL),
(117, 101222777, 19, NULL, NULL, NULL, NULL),
(125, 101320666, 21, NULL, NULL, NULL, '2022-05-26'),
(126, 101320666, 20, NULL, NULL, NULL, '2022-05-26'),
(127, 101320666, 24, 'YES', '127_101320666_2022-05-26.pdf', 'Completed', '2022-05-26'),
(128, 101320666, 19, NULL, NULL, NULL, '2022-05-26'),
(129, 101220699, 25, NULL, NULL, 'Completed', '2022-05-26'),
(130, 101220699, 26, NULL, NULL, NULL, '2022-05-26'),
(131, 101220017, 21, NULL, NULL, NULL, '2022-05-26'),
(132, 101220017, 25, NULL, NULL, NULL, '2022-05-26'),
(133, 101220017, 26, NULL, NULL, NULL, '2022-05-26'),
(134, 101220017, 27, NULL, NULL, NULL, '2022-05-26'),
(135, 101220017, 20, NULL, NULL, NULL, '2022-05-26'),
(136, 101220017, 22, NULL, NULL, NULL, '2022-05-26'),
(137, 101220017, 23, 'YES', NULL, NULL, '2022-05-26'),
(138, 101220017, 24, NULL, NULL, NULL, '2022-05-26'),
(139, 101220017, 28, NULL, NULL, NULL, '2022-05-26'),
(140, 101220017, 19, NULL, NULL, NULL, '2022-05-26'),
(141, 101220111, 21, NULL, NULL, NULL, '2022-05-26'),
(142, 101220111, 25, NULL, NULL, NULL, '2022-05-26'),
(143, 101220111, 23, 'YES', '143_101220111_2022-05-26.pdf', 'Completed', '2022-05-26'),
(144, 101220111, 24, NULL, NULL, NULL, '2022-05-26'),
(145, 101220111, 26, NULL, NULL, NULL, '2022-05-26');

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
-- Stand-in structure for view `forhistory`
-- (See below for the actual view)
--
CREATE TABLE `forhistory` (
`STUDENT_ID` int(255)
,`NAME` varchar(50)
,`STUDENT_EMAIL` varchar(100)
,`COURSE` varchar(50)
,`SUPERVISOR` varchar(50)
,`YEAR_OF_STUDY` varchar(1)
,`COMPANY_NAME` varchar(50)
,`WEBSITE` varchar(50)
,`Email` varchar(255)
,`Job_Title` varchar(255)
,`Position` varchar(255)
,`Date_Applied` date
);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(255) NOT NULL,
  `Student_id` varchar(255) DEFAULT NULL,
  `Student_NAME` varchar(255) DEFAULT NULL,
  `STUDENT_EMAIL` varchar(255) DEFAULT NULL,
  `COURSE` varchar(255) DEFAULT NULL,
  `SUPERVISOR` varchar(255) DEFAULT NULL,
  `YEAR_OF_STUDY` varchar(255) DEFAULT NULL,
  `COMPANY_NAME` varchar(255) DEFAULT NULL,
  `WEBSITE` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Job_Title` varchar(255) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `Date_End` date DEFAULT NULL,
  `Completion_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `Student_id`, `Student_NAME`, `STUDENT_EMAIL`, `COURSE`, `SUPERVISOR`, `YEAR_OF_STUDY`, `COMPANY_NAME`, `WEBSITE`, `Email`, `Job_Title`, `Position`, `Date_End`, `Completion_date`) VALUES
(9, '101220016', 'Eric Kau', '101220016@students.swinburne.edu.my', 'Bachelors of Commerce', 'jim', '3', 'Mircosoft', 'www.mircosoft.com', 'MS@outlook.com', 'Intern for observer', 'anything', NULL, '2022-05-24'),
(10, '101220121', 'James Konroe', '101220121@students.swinburne.edu.my', 'Bachelors of Engineering', NULL, '3', 'Mircosoft', 'www.mircosoft.com', 'MS@outlook.com', 'Intern for observer', 'anything', NULL, '2022-05-25'),
(11, '101220121', 'James Konroe', '101220121@students.swinburne.edu.my', 'Bachelors of Engineering', NULL, '3', 'Mircosoft', 'www.mircosoft.com', 'MS@outlook.com', 'Intern for observer', 'anything', NULL, '2022-05-25'),
(12, '101220121', 'James Konroe', '101220121@students.swinburne.edu.my', 'Bachelors of Engineering', NULL, '3', 'Mircosoft', 'www.mircosoft.com', 'MS@outlook.com', 'Intern for observer', 'anything', NULL, '2022-05-25'),
(13, '101222777', 'Jessy Bond', '101222777@student.swinburne.edu.my', 'Bachelors of information technology', NULL, '3', 'Mircosoft', 'www.mircosoft.com', 'MS@outlook.com', 'Intern for observer', 'anything', NULL, '2022-05-25'),
(14, '101220516', 'AaL', '101220516@students.swinburne.edu.my', 'Bachelors of Commerce', NULL, '2', 'Samsung', 'www.samsung.com', 'Samsung@sm.com', 'Web developement intern needed ', 'youtube', NULL, '2022-05-25'),
(15, '101320666', 'Ali ishraq', '101320666@students.swinburne.edu.my', 'Bachelors of information technology', NULL, '3', 'Samsung', 'www.samsung.com', 'Samsung@sm.com', 'The last trial', 'i dont care', NULL, '2022-05-26'),
(16, '101220111', 'Alioo', '101220111@students.swinburne.edu.my', 'Bachelors of Commerce', NULL, '3', 'Samsung', 'www.samsung.com', 'Samsung@sm.com', 'New trial', 'janiter', NULL, '2022-05-26');

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
(2010312, 'Mircosoft', '124 America town Malaysia', ' 013442123', 'www.mircosoft.com', '12345', 'MS', 'MS@outlook.com'),
(2010312123, 'ZombieCorp', '123 Korea town China', '123123123', 'www.brains.com', '1234', '', 'zombie@g.com');

-- --------------------------------------------------------

--
-- Table structure for table `industry_review_table`
--

CREATE TABLE `industry_review_table` (
  `FeedID` int(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `rating_question1` varchar(4) DEFAULT NULL,
  `rating_question2` varchar(4) DEFAULT NULL,
  `user_rating` int(4) DEFAULT NULL,
  `user_review` varchar(255) DEFAULT NULL,
  `datetime` date DEFAULT NULL,
  `STUDENT_ID` varchar(255) DEFAULT NULL,
  `Job_ID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry_review_table`
--

INSERT INTO `industry_review_table` (`FeedID`, `user_name`, `rating_question1`, `rating_question2`, `user_rating`, `user_review`, `datetime`, `STUDENT_ID`, `Job_ID`) VALUES
(1, 'asddsada', 'Yes', 'Yes', 5, 'asdasdasd', '2022-05-26', NULL, NULL),
(2, 'sdasda', 'Yes', 'Yes', 5, 'dasda', '2022-05-26', NULL, NULL),
(3, 'sdasda', 'Yes', 'Yes', 5, 'asdasdas', '2022-05-26', NULL, NULL),
(4, 'asdasd', 'Yes', 'Yes', 5, 'asdsa', '2022-05-26', NULL, NULL),
(5, 'dasdas', 'Yes', 'Yes', 5, 'sdasd', '2022-05-26', NULL, NULL),
(6, NULL, 'Yes', 'Yes', 5, 'ASdas', '2022-05-26', NULL, NULL),
(7, 'Samsung', 'Yes', 'Yes', 5, 'ASdas', '2022-05-26', '101320666', 24),
(8, 'Samsung', 'Yes', 'Yes', 5, 'ASdas', '2022-05-26', '101320666', 24),
(9, 'Samsung', 'Yes', 'Yes', 5, 'ASdas', '2022-05-26', '101320666', 24),
(10, 'Samsung', 'Yes', 'Yes', 5, 'ASdas', '2022-05-26', '101320666', 24),
(11, 'Samsung', 'Yes', 'Yes', 5, 'ASdas', '2022-05-26', '101320666', 24),
(12, 'Samsung', 'Yes', 'Yes', 5, 'ASdas', '2022-05-26', '101320666', 24),
(13, 'Samsung', 'Yes', 'Yes', 4, 'aksdhas', '2022-05-26', '101220111', 23);

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
(24, 'The last trial', 'This is over', 'I am done', 'Telecom Industry', 'i dont care', 'Please work', 1202202, '2022-05-13', '2022-11-13', 'Thanks for playing'),
(25, 'SuperVisor', 'kuala lampur', 'third year', 'Car Industry', 'secretary', '122', 2010312, '2022-05-25', '2022-09-25', 'Tire company'),
(26, 'SuperVisor', 'kuala lampur', 'third year', 'Car Industry', 'secretary', '122', 2010312, '2022-05-25', '2022-09-25', 'Tire company'),
(27, 'asdas', 'asdas', 'asdas', 'Car Industry', 'asdasda', 'dasdasd', 2010312, '2022-05-25', '2023-03-25', 'dasdas'),
(28, 'Work for canada', 'canada', 'Any', 'Telecom Industry', 'sweeper', '122', 1202202, '2022-05-26', '2022-10-26', 'Tower build');

-- --------------------------------------------------------

--
-- Stand-in structure for view `seetowork`
-- (See below for the actual view)
--
CREATE TABLE `seetowork` (
`STUDENT_ID` int(255)
,`NAME` varchar(50)
,`STUDENT_EMAIL` varchar(100)
,`COURSE` varchar(50)
,`ENROLL` varchar(255)
,`SUPERVISOR` varchar(50)
,`GENDER` varchar(7)
,`CURRENT_RESIDENCE` varchar(100)
,`CONTACT_NO` varchar(20)
,`YEAR_OF_STUDY` varchar(1)
,`PASSWORD` varchar(20)
,`CV` varchar(30)
,`USERNAME` varchar(20)
);

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
(101220016, 'Eric Kau', '101220016@students.swinburne.edu.my', 'Bachelors of Commerce', 'Completed', 'jim', 'Male', '567 kuchching road', '0172564896', '3', '1234', 'profile101220016.pdf', 'Eric'),
(101220017, 'Ishraq Chowdhury', '101220017@students.swinburne.edu.my', 'Bachelors of information technology', NULL, NULL, 'Male', 'seneca, ottowa, canada', '475744756', '3', '1234', 'profile101220017.pdf', 'icooo'),
(101220111, 'Alioo', '101220111@students.swinburne.edu.my', 'Bachelors of Commerce', 'Completed', NULL, 'Male', '422, Kuala lampur, hotlink', '1145452', '3', '1234', 'profile101220111.pdf', 'asd'),
(101220121, 'James Konroe', '101220121@students.swinburne.edu.my', 'Bachelors of Engineering', 'Ended', 'Asasda', 'Male', 'Kuching sarawak', '0178574882', '3', '1234', 'profile101220121.pdf', 'shag'),
(101220213, 'Andrew Michael', '101220213@students.swinburne.edu.my', 'Bachelors of Commerce', 'Ended', 'ali', 'Male', 'TA165, genting highlands', '0172564897', '3', '12345', 'profile101220213.pdf', 'ErgoProxy'),
(101220516, 'AaL', '101220516@students.swinburne.edu.my', 'Bachelors of Commerce', 'Ended', NULL, 'Male', '43 street, london', '0176395488', '2', '12345', 'profile101220516.pdf', 'aas'),
(101220611, 'Ashfaque Ali', '101220611@students.swinburne.edu.my', 'Bachelors of information technology', 'Completed', NULL, 'Male', 'dhaka bangladesh', '123456789', '3', '1234', 'profile101220611.pdf', 'shag'),
(101220668, 'Asfaque Ali', '101220668@students.swinburne.edu.my', 'Bachelors of Commerce', 'Confirmed', 'arsalan', 'Male', 'dhaka bangladesh', '01752658745', '3', '1234', 'profile101220668.pdf', 'shag'),
(101220699, 'Eric Mohammad', '101220699@students.swinburne.edu.my', 'Bachelors of Commerce', 'Completed', NULL, 'Male', '433 kenny hill kuching ', '1454175', '3', '1234', 'profile101220699.pdf', 'shag'),
(101221111, 'Scapegoat', '101221111@students.swinburne.edu.my', 'Bachelors of somehting', '', 'anyu', 'male', 'whatever', '5165156165', '3', '1234', NULL, 'asdas'),
(101222777, 'Jessy Bond', '101222777@student.swinburne.edu.my', 'Bachelors of information technology', 'Confirmed', NULL, 'Female', '422, Kuala lampur, hotlink', '1425416851', '3', '1234', 'profile101222777.pdf', 'ash'),
(101223648, 'Araslan Hossain', '101223648@students.swinburne.edu.my', 'Bachelors of Intformation Technology ', NULL, NULL, 'Male ', '432, lorong kenny hill 5, kuching, sarawak, malaysia', '01774587524', '3', '123456789', NULL, 'arasln'),
(101320666, 'Ali ishraq', '101320666@students.swinburne.edu.my', 'Bachelors of information technology', 'Completed', NULL, 'Male', 'canada', '124785245', '3', '1234', 'profile101320666.pdf', 'ash');

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
  `datetime` date DEFAULT NULL,
  `Job_ID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_review_table`
--

INSERT INTO `student_review_table` (`FeedID`, `STUDENT_ID`, `user_name`, `rating_question1`, `rating_question2`, `user_rating`, `user_review`, `datetime`, `Job_ID`) VALUES
(10, 101220016, 'Eric Kau', 'Yes', 'Yes', 5, 'asdasd', '2022-05-18', NULL),
(11, 101220016, 'Eric Kau', 'Yes', 'Yes', 5, 'sdfsdfasd', '2022-05-24', NULL),
(12, 101220016, 'Eric Kau', 'Yes', 'Yes', 5, 'sdfsdfasd', '2022-05-24', NULL),
(13, 101220016, 'Eric Kau', 'Yes', 'Yes', 5, 'sdfsdfasd', '2022-05-24', NULL),
(42, 101220016, 'Eric Kau', 'Yes', 'Yes', 5, 'sadasd', '2022-05-24', NULL),
(43, 101220016, 'Eric Kau', 'Yes', 'Yes', 5, 'sadasd', '2022-05-24', NULL),
(44, 101220016, 'Eric Kau', 'Yes', 'Yes', 5, 'sadasd', '2022-05-24', NULL),
(45, 101220016, 'Eric Kau', 'Yes', 'Yes', 5, 'asdasdasd', '2022-05-24', NULL),
(46, 101220016, 'Eric Kau', 'Yes', 'Yes', 5, 'asdasdasd', '2022-05-24', NULL),
(47, 101220016, 'Eric Kau', 'Yes', 'Yes', 5, 'asdasdasd', '2022-05-24', 21),
(48, 101220016, 'Eric Kau', 'Yes', 'Yes', 5, 'asdasd', '2022-05-25', 21),
(49, 101222777, 'Jessy Bond', 'Yes', 'Yes', 5, 'Aksisjdasd;\'', '2022-05-25', 21),
(50, 101320666, 'Ali ishraq', 'Yes', 'Yes', 5, 'axsfasdas', '2022-05-26', 24),
(51, 101220699, 'Eric Mohammad', 'Yes', 'Yes', 5, 'kdjbkjasnaslknd', '2022-05-26', NULL),
(52, 101220699, 'Eric Mohammad', 'Yes', 'Yes', 5, 'kdjbkjasnaslknd', '2022-05-26', 25),
(53, 101220699, 'Eric Mohammad', 'Yes', 'Yes', 5, 'kdjbkjasnaslknd', '2022-05-26', NULL),
(54, 101220699, 'Eric Mohammad', 'Yes', 'Yes', 5, 'asdasd', '2022-05-26', 25),
(55, 101220111, 'Alioo', 'Yes', 'Yes', 5, 'it was nice', '2022-05-26', 23);

-- --------------------------------------------------------

--
-- Structure for view `confirmed_details`
--
DROP TABLE IF EXISTS `confirmed_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `confirmed_details`  AS SELECT `a`.`Job_ID` AS `Job_ID`, `j`.`REGIS_NO` AS `REGIS_NO`, `s`.`STUDENT_ID` AS `STUDENT_ID`, `s`.`NAME` AS `NAME`, `s`.`STUDENT_EMAIL` AS `STUDENT_EMAIL`, `s`.`COURSE` AS `COURSE`, `s`.`YEAR_OF_STUDY` AS `YEAR_OF_STUDY`, `s`.`CV` AS `CV` FROM (((`student` `s` join `applicants` `a` on(`s`.`STUDENT_ID` = `a`.`STUDENT_ID`)) join `jobs` `j` on(`a`.`Job_ID` = `j`.`Job_ID`)) join `industry` `i` on(`j`.`REGIS_NO` = `i`.`REGIS_NO`)) WHERE `s`.`ENROLL` = 'confirmed\'confirmed\'confirmed\'confirmed''confirmed\'confirmed\'confirmed\'confirmed'  ;

-- --------------------------------------------------------

--
-- Structure for view `forhistory`
--
DROP TABLE IF EXISTS `forhistory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `forhistory`  AS SELECT `s`.`STUDENT_ID` AS `STUDENT_ID`, `s`.`NAME` AS `NAME`, `s`.`STUDENT_EMAIL` AS `STUDENT_EMAIL`, `s`.`COURSE` AS `COURSE`, `s`.`SUPERVISOR` AS `SUPERVISOR`, `s`.`YEAR_OF_STUDY` AS `YEAR_OF_STUDY`, `i`.`COMPANY_NAME` AS `COMPANY_NAME`, `i`.`WEBSITE` AS `WEBSITE`, `i`.`Email` AS `Email`, `j`.`Job_Title` AS `Job_Title`, `j`.`Position` AS `Position`, `a`.`Date_Applied` AS `Date_Applied` FROM (((`student` `s` join `applicants` `a` on(`s`.`STUDENT_ID` = `a`.`STUDENT_ID`)) join `jobs` `j` on(`a`.`Job_ID` = `j`.`Job_ID`)) join `industry` `i` on(`j`.`REGIS_NO` = `i`.`REGIS_NO`))  ;

-- --------------------------------------------------------

--
-- Structure for view `seetowork`
--
DROP TABLE IF EXISTS `seetowork`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `seetowork`  AS SELECT `student`.`STUDENT_ID` AS `STUDENT_ID`, `student`.`NAME` AS `NAME`, `student`.`STUDENT_EMAIL` AS `STUDENT_EMAIL`, `student`.`COURSE` AS `COURSE`, `student`.`ENROLL` AS `ENROLL`, `student`.`SUPERVISOR` AS `SUPERVISOR`, `student`.`GENDER` AS `GENDER`, `student`.`CURRENT_RESIDENCE` AS `CURRENT_RESIDENCE`, `student`.`CONTACT_NO` AS `CONTACT_NO`, `student`.`YEAR_OF_STUDY` AS `YEAR_OF_STUDY`, `student`.`PASSWORD` AS `PASSWORD`, `student`.`CV` AS `CV`, `student`.`USERNAME` AS `USERNAME` FROM `student` WHERE 11111111  ;

-- --------------------------------------------------------

--
-- Structure for view `students_nonappliedjobs`
--
DROP TABLE IF EXISTS `students_nonappliedjobs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`trial for more options`@`%` SQL SECURITY DEFINER VIEW `students_nonappliedjobs`  AS SELECT `a`.`NAME` AS `NAME`, `a`.`STUDENT_ID` AS `STUDENT_ID`, `j`.`REGIS_NO` AS `REGIS_NO`, `j`.`Job_ID` AS `Job_ID`, `j`.`Job_Title` AS `Job_Title` FROM ((`student` `a` join `applicants` `o` on(`a`.`STUDENT_ID` = `o`.`STUDENT_ID`)) join `jobs` `j` on(`o`.`Job_ID` = `j`.`Job_ID`)) WHERE `a`.`STUDENT_ID` <> 9999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999  ;

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
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`REGIS_NO`);

--
-- Indexes for table `industry_review_table`
--
ALTER TABLE `industry_review_table`
  ADD PRIMARY KEY (`FeedID`);

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
  ADD KEY `STUDENT_ID` (`STUDENT_ID`),
  ADD KEY `Job_ID` (`Job_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `appID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `appID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `industry_review_table`
--
ALTER TABLE `industry_review_table`
  MODIFY `FeedID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Job_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `student_review_table`
--
ALTER TABLE `student_review_table`
  MODIFY `FeedID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  ADD CONSTRAINT `student_review_table_ibfk_1` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`),
  ADD CONSTRAINT `student_review_table_ibfk_2` FOREIGN KEY (`Job_ID`) REFERENCES `jobs` (`Job_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
