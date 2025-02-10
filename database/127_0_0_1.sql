-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 03:11 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mipis_db`
--
CREATE DATABASE IF NOT EXISTS `mipis_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mipis_db`;

-- --------------------------------------------------------

--
-- Table structure for table `blood_pressure_taking`
--

CREATE TABLE `blood_pressure_taking` (
  `id` int(11) NOT NULL,
  `user_position` varchar(100) NOT NULL,
  `con_date` varchar(100) NOT NULL,
  `blood_pressure` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dental_health`
--

CREATE TABLE `dental_health` (
  `patient_id` int(11) NOT NULL,
  `department` varchar(225) NOT NULL,
  `user_position` varchar(225) NOT NULL,
  `vital_sign` varchar(225) NOT NULL,
  `diagnosis` varchar(225) NOT NULL,
  `treatment` varchar(225) NOT NULL,
  `medicine` varchar(225) NOT NULL,
  `con_date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `invt_type` varchar(225) NOT NULL,
  `expr` varchar(225) NOT NULL,
  `number_items` varchar(225) NOT NULL,
  `expr_date` varchar(225) NOT NULL,
  `date_invt` varchar(225) NOT NULL,
  `rep_num_item` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `medicine_name`, `status`, `invt_type`, `expr`, `number_items`, `expr_date`, `date_invt`, `rep_num_item`) VALUES
(1, 'Lagunde', 'Tablet', 'Medicine', '', '7', '2022/01/1', '2019/09/24', '0'),
(2, 'Blood Pressure Monitor', '', 'Equipment', '', '1', '2021/01/17', '2019/09/24', '0');

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `id` int(11) NOT NULL,
  `student_id` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `middle_name` varchar(225) NOT NULL,
  `course` varchar(225) NOT NULL,
  `department` varchar(225) NOT NULL,
  `b_day` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `user_position` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`id`, `student_id`, `last_name`, `first_name`, `middle_name`, `course`, `department`, `b_day`, `address`, `age`, `gender`, `user_position`) VALUES
(1, '2017-01', 'Paasa', 'Juan', '', 'BSIT', 'ATD', '08/31/1997', 'Burauen, Leyte', 18, 'Male', 'Student'),
(2, '2017-02', 'Berones', 'Joepet Andrew', 'Rivas', 'BSED', 'ED', '01/01/1996', 'Julita, Leyte', 19, 'Male', 'Student'),
(3, '2017-03', 'Berones', 'Mary Claire', 'Bitasolo', 'BSOA', 'BEMD', '12/25/1996', 'Julita, Leyte', 20, 'Female', 'Student'),
(4, '2017-04', 'Santos', 'Emmanuel', 'Barbosa', '', 'Faculty and Staff', '08/31/1997', 'Burauen, Leyte', 21, 'Male', 'faculty'),
(5, '2017-12', 'Santos', 'Fatima', 'Tutona', '', 'Faculty', '10/10/1997', 'Dagami, Leyte', 21, 'Female', 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_consultation`
--

CREATE TABLE `tbl_consultation` (
  `patient_id` int(10) NOT NULL,
  `department` varchar(225) NOT NULL,
  `user_position` varchar(225) NOT NULL,
  `con_date` varchar(225) NOT NULL,
  `chief_complain` varchar(225) NOT NULL,
  `nurse_diagnosis` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_consultation`
--

INSERT INTO `tbl_consultation` (`patient_id`, `department`, `user_position`, `con_date`, `chief_complain`, `nurse_diagnosis`) VALUES
(4, '', 'faculty', '2019/9/24', 'cough', 'Drink a lot of water');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treatment`
--

CREATE TABLE `tbl_treatment` (
  `patient_id` int(11) NOT NULL,
  `nursing_treatment` varchar(225) NOT NULL,
  `num_item` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `user_type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `user_name`, `password`, `name`, `user_type`) VALUES
(1, 'admin', 'YWRtaW4=', 'Juan', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_pressure_taking`
--
ALTER TABLE `blood_pressure_taking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_pressure_taking`
--
ALTER TABLE `blood_pressure_taking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
