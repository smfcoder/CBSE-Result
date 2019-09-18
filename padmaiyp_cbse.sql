-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2019 at 09:14 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `padmaiyp_cbse`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_name` text NOT NULL,
  `div_name` text NOT NULL,
  `class_div` text NOT NULL,
  `pt1_s` int(11) NOT NULL,
  `pt2_s` int(11) NOT NULL,
  `pt3_s` int(11) NOT NULL,
  `ft_s` int(11) NOT NULL,
  `dd` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `sid` text NOT NULL,
  `username` text NOT NULL,
  `class` text NOT NULL,
  `englishpt1` float NOT NULL,
  `hindipt1` float NOT NULL,
  `mathspt1` float NOT NULL,
  `sciencept1` float NOT NULL,
  `sstpt1` float NOT NULL,
  `itpt1` float NOT NULL,
  `tm_pt1` float NOT NULL,
  `per_pt1` float NOT NULL,
  `englishpt2` float NOT NULL,
  `hindipt2` float NOT NULL,
  `mathspt2` float NOT NULL,
  `sciencept2` float NOT NULL,
  `sstpt2` float NOT NULL,
  `itpt2` float NOT NULL,
  `tm_pt2` float NOT NULL,
  `per_pt2` float NOT NULL,
  `englishpt3` float NOT NULL,
  `hindipt3` float NOT NULL,
  `mathspt3` float NOT NULL,
  `sciencept3` float NOT NULL,
  `sstpt3` float NOT NULL,
  `itpt3` float NOT NULL,
  `tm_pt3` float NOT NULL,
  `per_pt3` float NOT NULL,
  `englishi` float NOT NULL,
  `hindii` float NOT NULL,
  `mathsi` float NOT NULL,
  `sciencei` float NOT NULL,
  `ssti` float NOT NULL,
  `iti` float NOT NULL,
  `englishft` float NOT NULL,
  `hindift` float NOT NULL,
  `mathsft` float NOT NULL,
  `scienceft` float NOT NULL,
  `sstft` float NOT NULL,
  `itft` float NOT NULL,
  `tm_ft` float NOT NULL,
  `per_ft` float NOT NULL,
  `englishf` float NOT NULL,
  `hindif` float NOT NULL,
  `mathsf` float NOT NULL,
  `sciencef` float NOT NULL,
  `sstf` float NOT NULL,
  `itf` float NOT NULL,
  `english_se` float NOT NULL,
  `hindi_se` float NOT NULL,
  `maths_se` float NOT NULL,
  `science_se` float NOT NULL,
  `sst_se` float NOT NULL,
  `it_se` float NOT NULL,
  `english_n` float NOT NULL,
  `hindi_n` float NOT NULL,
  `maths_n` float NOT NULL,
  `science_n` float NOT NULL,
  `sst_n` float NOT NULL,
  `it_n` float NOT NULL,
  `english_p` float NOT NULL,
  `hindi_p` float NOT NULL,
  `maths_p` float NOT NULL,
  `science_p` float NOT NULL,
  `sst_p` float NOT NULL,
  `it_p` float NOT NULL,
  `englishb` float NOT NULL,
  `hindib` float NOT NULL,
  `mathsb` float NOT NULL,
  `scienceb` float NOT NULL,
  `sstb` float NOT NULL,
  `itb` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `name_principal` text NOT NULL,
  `school_add` longtext NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `username` text NOT NULL,
  `pass` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `email`, `name_principal`, `school_add`, `contact_no`, `username`, `pass`, `status`) VALUES
(1, 'school', 'school@school.com', 'xyz', 'USA', '544', 'school', 'school123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `sid` text NOT NULL,
  `rollno` int(11) NOT NULL,
  `sfname` text NOT NULL,
  `smname` text NOT NULL,
  `slname` text NOT NULL,
  `class` text NOT NULL,
  `birthdate` text NOT NULL,
  `gender` text NOT NULL,
  `aadharno` text NOT NULL,
  `pmobno` text NOT NULL,
  `fathername` text NOT NULL,
  `mothername` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `token` text NOT NULL,
  `tokenexpire` text NOT NULL,
  `studentfullname` text NOT NULL,
  `pt1_s` int(11) NOT NULL,
  `pt2_s` int(11) NOT NULL,
  `pt3_s` int(11) NOT NULL,
  `ft_s` int(11) NOT NULL,
  `ses_s` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `tmname` text NOT NULL,
  `tlname` text NOT NULL,
  `class` text NOT NULL,
  `username` text NOT NULL,
  `pass` text NOT NULL,
  `emailid` text NOT NULL,
  `tfullname` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
