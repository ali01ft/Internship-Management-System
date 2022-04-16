-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 11:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.1

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
  `Admin_ID` varchar(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Name`, `email`, `Password`) VALUES
('10124566', 'bibiana', 'bibiana', '123456789'),
('1414552', 'ali', 'alion', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `REGIS_NO` varchar(20) NOT NULL,
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
('1013245546', 'total oil ', 'just a random address ', '017581369754', 'www.random.com', '123456789', 'rdom', NULL),
('147854782865', 'percy inc', 'random address', '145269787', 'www.add.com', '123456789', 'adrom', NULL),
('a45471551', 'ion', 'asdasdasfasdf', '0172564896', 'www.aa.com', 'Zz123456789', 'Argon', 'ali@g.com'),
('a45471552', 'ion', 'asdasdasda', '0172564896', 'www.aa.com', 'Zz123456789', 'Argon', 'a@g.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `Job_ID` int(255) NOT NULL,
  `Job_Title` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Qualification` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Vacancy` varchar(255) NOT NULL,
  `REGIS_NO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`Job_ID`, `Job_Title`, `Location`, `Qualification`, `Category`, `Position`, `Vacancy`, `REGIS_NO`) VALUES
(1, 'Marketing Supervisor Needed', 'kuching sarawak', '3 year student with atleast 3.00 cgpa ', 'tech company', 'Marketing Supervisor', '255', '1013245546'),
(2, 'looking for an IT assistant ', 'Kuching', 'anything is fine', 'IT company ', 'Assistant ', '255', '147854782865');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STUDENT_ID` varchar(20) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `STUDENT_EMAIL` varchar(100) NOT NULL,
  `COURSE` varchar(50) NOT NULL,
  `ENROLL` varchar(1) DEFAULT NULL,
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
('101220111', 'Mutab Bin', '101220111@students.swinburne.edu.my', 'Bachelors of Engineering', NULL, NULL, 'Male', 'asdasdasda', '0172564897', '2', 'Zz123456789', '', 'alif'),
('101220121', 'Mutab Bin', '101220121@students.swinburne.edu.my', 'Bachelors of Commerce', NULL, NULL, 'Male', 'asdasdasda', '0172564896', '2', 'Zz123456789', '', 'Argon'),
('101220516', 'AaL', '101220516@students.swinburne.edu.my', 'Bachelors of Commerce', NULL, NULL, 'Male', 'asdasdsadas', '0176395488', '2', 'Zz123456789', 'profile101220516.pdf', 'aas'),
('101220518', 'AaL', '101220518@students.swinburne.edu.my', 'Bachelors of Engineering', NULL, NULL, 'Male', 'asdasdsadas', '0176395488', '2', 'Zz123456789', 'Array', 'aas'),
('101220606', 'Mutab Bin', '101220606@students.swinburne.edu.my', 'Bachelors of Marketing', NULL, NULL, 'Female', 'asdasdasda', '0172564897', '2', 'Zz123456789', '', 'Argon'),
('101220618', 'Ashfaque Ali shagor', '101220618@students.swinburne.edu.my', 'Bachelors of Intformation Technology ', '0', NULL, 'Male ', '433, lorong kenny hill 3', '01774587524', '3', '123456789', NULL, 'ali01ft'),
('101220717', 'Mutab Bin', '101220717@students.swinburne.edu.my', 'Bachelors of Commerce', 'A', NULL, 'Female', 'asdasdasda', '0172564897', '1', 'Zz123456789', 'Array', 'alif'),
('101220818', 'Mutab Bin', '101220818@students.swinburne.edu.my', 'Bachelors of Commerce', 'A', NULL, 'Male', 'asdasdasda', '0172564897', '3', 'Zz123456789', 'Array', 'alif'),
('101220919', 'Mutab Bin', '101220919@students.swinburne.edu.my', 'Bachelors of information technology', NULL, NULL, 'Male', 'asdasdasda', '0172564897', '1', 'Zz123456789', '', 'alif'),
('101223648', 'Araslan Hossain', '101223648@students.swinburne.edu.my', 'Bachelors of Intformation Technology ', '0', NULL, 'Male ', '432, lorong kenny hill 5, kuching, sarawak, malaysia', '01774587524', '3', '123456789', NULL, 'arasln');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Job_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`REGIS_NO`) REFERENCES `industry` (`REGIS_NO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
