-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 02:08 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookId` int(10) NOT NULL,
  `Section` varchar(255) NOT NULL,
  `Subject` varchar(50) DEFAULT NULL,
  `Textbook` varchar(255) NOT NULL,
  `Volume` varchar(255) DEFAULT NULL,
  `Year` varchar(50) DEFAULT NULL,
  `Availability` int(10) DEFAULT NULL,
  `Author` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `M_Id` int(10) NOT NULL,
  `Sender` varchar(255) NOT NULL,
  `RollNo` varchar(50) DEFAULT NULL,
  `Msg` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `R_ID` int(10) NOT NULL,
  `Book_Name` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `RollNo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `RollNo` varchar(255) NOT NULL,
  `BookId` int(255) NOT NULL,
  `Date_of_Issue` date NOT NULL,
  `Due_Date` date NOT NULL,
  `Date_of_Return` date NOT NULL,
  `Dues` int(255) NOT NULL,
  `Renewals_left` int(255) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `renew`
--

CREATE TABLE `renew` (
  `RollNo` varchar(50) NOT NULL,
  `BookId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE `return` (
  `id` int(11) NOT NULL,
  `RollNo` varchar(255) NOT NULL,
  `BookId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `stock_left` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl`
--

CREATE TABLE `tbl` (
  `BookId` int(11) NOT NULL,
  `deletor` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `RollNo` varchar(50) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Department` varchar(255) NOT NULL,
  `EmailId` varchar(50) DEFAULT NULL,
  `MobNo` bigint(11) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`RollNo`, `Name`, `Type`, `Category`, `Department`, `EmailId`, `MobNo`, `Password`) VALUES
('1002416', 'King A.Albaracin', 'Student', 'Student', 'Compstud', 'kingalbaracin50@gmail.com', 975, 'q'),
('admin', 'Administrator', 'Admin', 'admin', 'admin', 'admin@gmail.com', 0, 'admin'),
('librarian', 'Librarian', 'librarian', 'librarian', 'library', 'librarymsulnac.edu.ph', 2, 'msu'),
('staff', 'staff', 'staff ', 'staff', 'library staff', 'staff', 0, 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookId`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`M_Id`),
  ADD KEY `RollNo` (`RollNo`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `RollNo` (`RollNo`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renew`
--
ALTER TABLE `renew`
  ADD PRIMARY KEY (`RollNo`,`BookId`),
  ADD KEY `BookId` (`BookId`);

--
-- Indexes for table `return`
--
ALTER TABLE `return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl`
--
ALTER TABLE `tbl`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`RollNo`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `M_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `R_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `return`
--
ALTER TABLE `return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl`
--
ALTER TABLE `tbl`
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`);

--
-- Constraints for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD CONSTRAINT `recommendations_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`);

--
-- Constraints for table `renew`
--
ALTER TABLE `renew`
  ADD CONSTRAINT `renew_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`),
  ADD CONSTRAINT `renew_ibfk_2` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
