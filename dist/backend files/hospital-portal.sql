-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 05:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital-portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `doctorID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `licenseNumber` int(11) NOT NULL,
  `ptrNumber` int(11) NOT NULL,
  `Specialty` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apppointment`
--

CREATE TABLE `apppointment` (
  `appointmentID` int(10) NOT NULL,
  `userID` int(11) NOT NULL,
  `doctorID` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `financeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `agenda` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`financeID`, `userID`, `agenda`, `doctor`, `amount`, `date`, `status`) VALUES
(1, 3, 'Check up', 'Dr. Cha', 500, '2023-07-18', 'Paid'),
(3, 1, 'test', 'test', 1000, '2023-07-05', 'paid'),
(4, 1, 'Pills', 'Dr. Cha', 1000, '2023-07-06', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicineID` int(11) NOT NULL,
  `Illness` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `notes` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `dosage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicineID`, `Illness`, `date`, `notes`, `schedule`, `userID`, `dosage`) VALUES
(1, 'Diabetes', '2023-07-20', 'Prescribed by Dr. Cha', 'Everyday', 1, '50/500mg'),
(3, 'PCOS', '2023-07-15', 'Prescribed by Dr.Mat', 'Everyday', 1, '500mg');

-- --------------------------------------------------------

--
-- Table structure for table `patient details`
--

CREATE TABLE `patient details` (
  `patientID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `Blood` varchar(10) NOT NULL,
  `Height` int(11) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Temperature` int(11) NOT NULL,
  `Oxygen Level` int(11) NOT NULL,
  `Pulse Rate` int(11) NOT NULL,
  `Blood Pressure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `contact_number` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `family_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `first_name`, `last_name`, `email`, `gender`, `birth_date`, `contact_number`, `password`, `address`, `family`, `family_number`) VALUES
(1, 'Mathew James', 'Muyco', 'mjmuyco13@gmail.com', 'Male', '2023-07-11', 2147483647, 'finn', '', '', 0),
(3, 'Finn', 'Steiner', 'mathewjamespmuyco@iskolarngbayan.pup.edu.ph', 'Male', '2023-07-06', 11111, 'finn', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`doctorID`);

--
-- Indexes for table `apppointment`
--
ALTER TABLE `apppointment`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `doctorID` (`doctorID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`financeID`),
  ADD KEY `finance_ibfk_1` (`userID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicineID`),
  ADD KEY `medicine_ibfk_1` (`userID`);

--
-- Indexes for table `patient details`
--
ALTER TABLE `patient details`
  ADD PRIMARY KEY (`patientID`),
  ADD KEY `patient details_ibfk_1` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apppointment`
--
ALTER TABLE `apppointment`
  MODIFY `appointmentID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `financeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient details`
--
ALTER TABLE `patient details`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apppointment`
--
ALTER TABLE `apppointment`
  ADD CONSTRAINT `apppointment_ibfk_1` FOREIGN KEY (`doctorID`) REFERENCES `admin` (`doctorID`),
  ADD CONSTRAINT `apppointment_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `finance`
--
ALTER TABLE `finance`
  ADD CONSTRAINT `finance_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient details`
--
ALTER TABLE `patient details`
  ADD CONSTRAINT `patient details_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
