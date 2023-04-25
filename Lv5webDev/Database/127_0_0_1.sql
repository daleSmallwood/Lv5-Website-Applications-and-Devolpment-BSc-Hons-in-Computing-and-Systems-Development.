-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 06:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musflixdb`
--
CREATE DATABASE IF NOT EXISTS `musflixdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `musflixdb`;

-- --------------------------------------------------------

--
-- Table structure for table `userstbl`
--

CREATE TABLE `userstbl` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `privLV` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userstbl`
--

INSERT INTO `userstbl` (`userID`, `username`, `password`, `privLV`) VALUES
(1, 'Admin', 'Password123', 1),
(2, 'Bob', 'Test123', 0),
(3, 'Frank', 'Test123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videotbl`
--

CREATE TABLE `videotbl` (
  `videoID` int(11) NOT NULL,
  `vName` varchar(100) NOT NULL,
  `vDesc` varchar(1000) NOT NULL DEFAULT 'This video has no description.',
  `vPath` varchar(5000) NOT NULL,
  `vThumb` varchar(5000) NOT NULL DEFAULT '../Images/Placeholder.jpg',
  `userID` int(11) NOT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videotbl`
--

INSERT INTO `videotbl` (`videoID`, `vName`, `vDesc`, `vPath`, `vThumb`, `userID`, `uploadDate`, `Views`) VALUES
(8, 'Hamilton', 'sdff', '../videos/Hamilton.mp4', '../Images/Placeholder.jpg', 1, '2022-02-10 11:53:35', 0),
(9, 'Evil Dead', '', '../videos/Evil Dead.mp4', '../imagesEvil Dead.jpg', 1, '2022-02-10 15:03:55', 0),
(10, 'Six', 'The Six Wives Of Henry VIII Take To The Mic To Tell Their Tales In An Uplifting Musical. Divorced. Beheaded. Live.', '../videos/Six.mp4', '../imagesSix.jpg', 1, '2022-02-13 06:11:37', 0),
(11, '9 to 5', 'text', '../videos/9 to 5.mp4', '../images9 to 5.jpg', 1, '2022-02-13 13:12:45', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userstbl`
--
ALTER TABLE `userstbl`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `videotbl`
--
ALTER TABLE `videotbl`
  ADD PRIMARY KEY (`videoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userstbl`
--
ALTER TABLE `userstbl`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videotbl`
--
ALTER TABLE `videotbl`
  MODIFY `videoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
