-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2023 at 01:06 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19525572_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fname` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `subj` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fname`, `email`, `subj`, `msg`) VALUES
('DARSHAN', 'agurudf@gmail.com', 'Hi', 'Nice work'),
('hugyu', 'pavanimahanthi0103@gmail.com', 'bhvg', 'h');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`phone`, `email`, `name`, `age`, `gender`, `password`, `type`) VALUES
('8789898786', 'vijaya@vij.in', 'Vijaya', '20', 'male', 'e7f5f578f6af7833c003ca39eb5c3d3d', 'lab'),
('9089907890', 'daesi@gmail.com', 'krishna', '19', 'male', 'c45dce02c956a81c05abc60a647f9bb9', 'user'),
('9121974558', 'prudhvimeka666@gmail.com', 'prudhvi', '20', 'male', '1f49ea40b689efd15ca2b751ea524286', ''),
('9154542979', 'agurudf@gmail.com', 'Darshan Aguru', '19', 'male', 'e020ebbfd52bdbf2fb6da26f119d385b', ''),
('9394244443', 'akashdvv6@gmail.com', 'AKKI', '20', 'male', '8bacb629ec14c894c233591ebdb005d8', ''),
('9881901973', 'khushi@gmail.com', 'khushi', '16', 'female', 'e020ebbfd52bdbf2fb6da26f119d385b', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `userid` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `files` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `recordtype` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `imgid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uid` varchar(13) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`userid`, `title`, `date`, `files`, `recordtype`, `imgid`, `uid`) VALUES
('8789898786', 'sugar test', '2023-01-01', 'bt.jpeg', 'lr', 'a72fd24c5f5de72b28f14fd6106137b4', '9154542979'),
('9121974558', 'medical report', '2022-12-07', 'download (1).jpeg', 'mr', '9633bdc271363bb6674c85b86214771a', '9121974558'),
('8789898786', 'sugar test', '2023-02-18', 'expo.png', 'lr', 'd8456ae93746999fa88f0b2d12b3219e', '9089907890'),
('9121974558', 'lab_report2', '2022-12-17', 'GNU_Health_lab_report_sample.png', 'lr', '44a0245c93dc3a2e76a1cb484a6b7a6d', '9121974558'),
('9121974558', 'lab_report1', '2022-12-23', 'lab_report-3.png', 'lr', '3a34efa9b83428ab42785f90cca665bf', '9121974558'),
('9089907890', 'blood test', '2023-02-17', 'qrcode.png', 'lr', 'b1aaa238a3bf9a19295face48bd5c607', '9089907890'),
('9154542979', 'blood test', '2023-01-02', 'Screenshot_20221230_115531.png', 'lr', 'b2c0f7a50d560565bcdc1ea0ebfacf96', '9154542979'),
('9394244443', 'casual checkup', '2022-06-11', 'WhatsApp Image 2023-01-03 at 20.45.27.jpg', 'mr', 'c6f162ed97384b3dc87a7ecf1675f4b9', '9394244443'),
('9394244443', 'leg injury', '2022-06-20', 'WhatsApp Image 2023-01-03 at 20.45.28.jpg', 'mr', 'd687d60f894423651e21812b2da58124', '9394244443'),
('9394244443', 'MRI BRAIN', '2020-05-12', 'WhatsApp Image 2023-01-03 at 20.53.52.jpg', 'lr', '35251cb3dc2b8b302b63747e3de91103', '9394244443'),
('9394244443', 'CT', '2020-05-30', 'WhatsApp Image 2023-01-03 at 20.53.53.jpg', 'lr', 'dda2c8bc24b77e1b6e247f2be795edc0', '9394244443');

-- --------------------------------------------------------

--
-- Table structure for table `usrotp`
--

CREATE TABLE `usrotp` (
  `userid` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `otp` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`phone`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`files`),
  ADD KEY `tk` (`userid`);

--
-- Indexes for table `usrotp`
--
ALTER TABLE `usrotp`
  ADD PRIMARY KEY (`userid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `tk` FOREIGN KEY (`userid`) REFERENCES `users` (`phone`) ON DELETE CASCADE;

--
-- Constraints for table `usrotp`
--
ALTER TABLE `usrotp`
  ADD CONSTRAINT `fk` FOREIGN KEY (`userid`) REFERENCES `users` (`phone`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
