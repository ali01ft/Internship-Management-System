-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 08:28 AM
-- Server version: 10.4.21-MariaDB
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
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `REGIS_NO` int(20) NOT NULL,
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
(1202202, 'Samsung', '123 Korea town Malaysia', '0134423556', 'www.samsung.com', '12345', 'Samsung', 'Samung@sm.com'),
(1202232, 'LG', 'Zimbabwe', '123123123', 'www.LG.com', '1234', 'Lifes good', 'lg@lg.com'),
(2010312, 'Mircosoft', '123 America town Malaysia', '013442123', 'www.mircosoft.com', '12345', 'MS', 'MS@outlook.com'),
(120212312, 'Mcdonalds', 'Diabetes street, liver cancer town ', '0123312312321', 'www.food.com', '1234', 'Mcd', 'mcd@g.com'),
(2010312123, 'ZombieCorp', '123 Korea town China', '123123123', 'www.brains.com', '1234', '', 'zombie@g.com'),
(5564123, 'KFC', 'Diabetes street, Cholesterol', '01123123123', 'www.food2.com', '1234', 'kfc', 'kfc@kfc.com');

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
  `REGIS_NO` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STUDENT_ID` int(20) NOT NULL,
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
(101220016, 'Eric Kau', '101220016@students.swinburne.edu.my', 'Bachelors of Commerce', NULL, NULL, 'Male', 'asdasdasda', '0172564896', '3', 'Zz123456789', 'profile101220016.pdf', 'Eric'),
(101220213, 'Andrew Michael', '101220213@students.swinburne.edu.my', 'Bachelors of Commerce', NULL, NULL, 'Male', 'asdasdasda', '0172564897', '3', 'Zz123456789', 'profile101220213.pdf', 'ErgoProxy'),
(101220516, 'AaL', '101220516@students.swinburne.edu.my', 'Bachelors of Commerce', NULL, NULL, 'Male', 'asdasdsadas', '0176395488', '2', 'Zz123456789', 'profile101220516.pdf', 'aas'),
(101223648, 'Araslan Hossain', '101223648@students.swinburne.edu.my', 'Bachelors of Intformation Technology ', '0', NULL, 'Male ', '432, lorong kenny hill 5, kuching, sarawak, malaysia', '01774587524', '3', '123456789', NULL, 'arasln');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
