-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 08:58 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rupa`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contain` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `contain`, `status`) VALUES
(17, 'about', 'Training and development programs help employees learn and acquire new skills, as well as gain the professional knowledge required to progress their careers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminid` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminid`, `password`) VALUES
(1, 'admin', '12345'),
(2, 'rupa', '12345'),
(3, 'dipa', '123456'),
(4, 'raj', '8016'),
(5, 'rupa1', '1234'),
(6, 'rudra', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `img`, `status`) VALUES
(27, 'banner4.jpg', 1),
(29, 'banner6.jpg', 1),
(31, 'mern.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(600) NOT NULL,
  `phone1` varchar(56) NOT NULL,
  `phone2` varchar(56) NOT NULL,
  `emailid` varchar(56) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `title`, `address`, `phone1`, `phone2`, `emailid`, `status`) VALUES
(8, 'CONTACT', 'Durgapur,Bidhannagar', '8016510426', '8145984995', 'rupapal019@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(255) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `img`, `duration`, `fee`) VALUES
(14, 'JAVA', 'java.jpeg', '3MONTH', 4000),
(15, 'ASP.NET', 'asp.net.jpeg', '2MONTH', 3000),
(16, 'MERN', 'mern.jpeg', '10MONTH', 20000),
(21, 'java', 'php.jpeg', '8000', 5000),
(23, 'python', 'python.jpeg', '6MONTH', 7000),
(24, 'php', 'php.jpeg', '2MONTH', 3000),
(25, 'php', 'php.jpeg', '10MONTH', 6000),
(26, 'php with ds', 'asp.net.jpeg', '6MONTH', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `tfee` int(11) NOT NULL,
  `pfee` int(11) NOT NULL,
  `orddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myorder`
--

INSERT INTO `myorder` (`id`, `sid`, `cid`, `tfee`, `pfee`, `orddate`) VALUES
(8, '9', '15', 10000, 2000, '2023-07-14 05:57:24'),
(9, '10', '14', 8000, 3000, '2023-07-03 10:17:58'),
(10, '11', '15', 5000, 3000, '2023-07-03 10:18:33'),
(11, '12', '16', 12000, 6000, '2023-07-03 10:19:23'),
(12, '10', '26', 7000, 3000, '2023-07-14 05:57:37'),
(13, '19', '16', 23000, 10000, '2023-07-14 05:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `partpayment`
--

CREATE TABLE `partpayment` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partpayment`
--

INSERT INTO `partpayment` (`id`, `sid`, `oid`, `amount`, `created_at`) VALUES
(8, 0, 5, 2000, '2023-07-03 10:15:08'),
(9, 0, 6, -2000, '2023-07-03 10:15:16'),
(10, 9, 8, 5000, '2023-07-03 10:16:28'),
(11, 10, 9, 3000, '2023-07-03 10:17:58'),
(12, 11, 10, 3000, '2023-07-03 10:18:33'),
(13, 12, 11, 6000, '2023-07-03 10:19:23'),
(14, 9, 8, -3000, '2023-07-03 10:21:24'),
(15, 10, 12, 3000, '2023-07-03 10:25:50'),
(16, 9, 8, 2000, '2023-07-14 05:57:24'),
(17, 10, 12, 3000, '2023-07-14 05:57:37'),
(18, 19, 13, 10000, '2023-07-14 05:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `course` varchar(600) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `course`, `status`) VALUES
(15, 'service', 'php', 1),
(16, 'service', 'java', 1),
(17, 'service', 'python', 1),
(18, 'Service', 'C Language', 1),
(19, 'Service', 'mern', 1),
(20, 'Service', 'asp.net', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nationality` varchar(15) NOT NULL,
  `image` varchar(200) NOT NULL,
  `college` varchar(10) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `department` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `phone`, `password`, `gender`, `nationality`, `image`, `college`, `sem`, `department`, `date`) VALUES
(9, 'sumanta ', 'ss@gmail.com', '8016510426', '1234', 'M', 'india', 'python.jpeg', 'bcroy', '1st', 'cse', '2023-07-05 08:47:56'),
(10, 'trishna', 'tt@gmail.com', '7001921551', '7890', 'F', 'srilanka', 'machine.jpeg', 'setgoi', '2nd', 'me', '2023-07-05 08:48:42'),
(11, 'paban', 'pp@gmail.com', '8106510624', '4567', 'M', 'india', 'aict icon.png', 'nshm', '3rd', 'ece', '2023-07-05 08:51:17'),
(12, 'kinkar', 'kr@gmail.com', '6712345690', '12345', 'M', 'srilanka', 'youtube.png', 'dsms', '3rd', 'ce', '2023-07-14 05:50:57'),
(18, 'krishna', 'krishna@gmail.com', '8001200234', '1234', 'M', 'india', 'whatsapp icon.png', 'dsms', '3rd', 'civil', '2023-07-05 09:02:01'),
(19, 'rudra', 'rudra@gmail.com', '9851084545', '555555', 'M', 'india', 'IMG_20190126_153300.jpg', 'nshm', '3rd', 'cse', '2023-07-14 05:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link` varchar(500) NOT NULL,
  `vdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `cid`, `title`, `link`, `vdate`) VALUES
(5, 14, 'java 1st class', 'https://www.youtube.com/embed/LxszTckMsnQ', '2023-07-14 06:01:12'),
(6, 14, 'java 1st class', 'https://www.youtube.com/embed/LxszTckMsnQ', '2023-07-03 17:28:45'),
(7, 15, 'asp.net 1st class', 'https://www.youtube.com/embed/LxszTckMsnQ', '2023-07-03 17:28:56'),
(8, 16, 'mern 1st class', 'https://www.youtube.com/embed/LxszTckMsnQ', '2023-07-03 17:29:07'),
(9, 16, 'mern 2nd class', 'https://www.youtube.com/embed/LxszTckMsnQ', '2023-07-03 17:29:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myorder`
--
ALTER TABLE `myorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partpayment`
--
ALTER TABLE `partpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `partpayment`
--
ALTER TABLE `partpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
