-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2020 at 06:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admit`
--

CREATE TABLE `admit` (
  `admit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `bed_no` int(11) NOT NULL,
  `in_date` date NOT NULL,
  `out_date` date DEFAULT NULL,
  `out_status` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `appointment_time` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `staff_id` int(11) NOT NULL,
  `absent_year` int(11) NOT NULL,
  `absent_month` int(11) NOT NULL,
  `absent_day` int(11) NOT NULL,
  `absent_hour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`staff_id`, `absent_year`, `absent_month`, `absent_day`, `absent_hour`) VALUES
(3, 2020, 9, 11, 4),
(3, 2020, 9, 22, 2),
(4, 2020, 8, 20, 5),
(4, 2020, 9, 23, 3),
(7, 2020, 8, 25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_id` int(11) NOT NULL,
  `blood_group` varchar(8) NOT NULL,
  `exp_date` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blood_source`
--

CREATE TABLE `blood_source` (
  `source_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `quantity` int(11) NOT NULL,
  `blood_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`, `create_date`) VALUES
(1, 'Urtopedi', '0000-00-00'),
(3, 'fesutrophy', '2018-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diagnosis_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `sickness_type` varchar(32) NOT NULL,
  `diagnosis_date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `diagnosis_result` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipment_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `equipment_type` varchar(64) NOT NULL,
  `quantity` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `buy_date` date DEFAULT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` char(20) NOT NULL,
  `expense_type` varchar(64) NOT NULL,
  `expense_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `amount`, `currency`, `expense_type`, `expense_date`) VALUES
(2, 100, '1500', 'light', '2020-09-13'),
(3, 2000, '2000', 'operation table', '2020-09-16'),
(4, 10, '1000', 'bed', '2020-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `income_type` varchar(32) NOT NULL,
  `amount` int(11) NOT NULL,
  `income_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_date` date NOT NULL,
  `login_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`log_id`, `user_id`, `login_date`, `login_time`) VALUES
(7, 5, '1999-05-27', '11:18:43'),
(8, 5, '1999-05-27', '11:21:25'),
(9, 5, '1999-05-29', '07:17:21'),
(10, 5, '1999-05-29', '11:29:22'),
(11, 5, '1999-06-04', '08:34:35'),
(12, 5, '1999-06-04', '09:52:28'),
(13, 5, '1999-06-04', '09:59:19'),
(14, 5, '1999-06-10', '10:28:59'),
(15, 5, '1999-06-12', '11:43:56'),
(16, 5, '1999-06-12', '11:44:32'),
(17, 5, '1999-06-12', '02:22:40'),
(18, 5, '1999-06-20', '11:13:03'),
(19, 5, '1999-06-20', '03:16:59'),
(20, 5, '1999-06-23', '09:34:08'),
(21, 5, '1999-06-25', '08:47:01'),
(22, 5, '1999-06-26', '09:59:12'),
(23, 5, '1999-06-26', '11:13:55'),
(24, 5, '1999-07-01', '02:17:18'),
(25, 5, '1999-07-01', '02:46:25'),
(26, 5, '1999-07-01', '10:45:29'),
(27, 5, '1999-07-01', '10:50:44'),
(28, 5, '1999-07-02', '08:53:44'),
(29, 5, '1999-07-02', '09:02:08'),
(30, 5, '1999-07-02', '09:03:21'),
(31, 5, '1999-07-02', '09:31:29'),
(32, 5, '1999-07-02', '09:32:53'),
(33, 5, '1999-07-02', '10:07:04'),
(34, 5, '1999-07-02', '10:21:58'),
(35, 5, '1999-07-02', '10:30:59'),
(36, 5, '1999-07-02', '11:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `form` varchar(32) NOT NULL,
  `madein` varchar(32) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `exp_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `name`, `form`, `madein`, `quantity`, `unitprice`, `exp_date`) VALUES
(3, 'corte mexasul', 'tablet', 'france', 10000, 20, '2020-10-11'),
(4, 'toxin', 'tablet', 'china', 2100, 30, '2021-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `phone` char(10) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `birth_year` int(11) NOT NULL,
  `nic` varchar(32) DEFAULT NULL,
  `job` varchar(32) DEFAULT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `name`, `gender`, `phone`, `address`, `birth_year`, `nic`, `job`, `reg_date`) VALUES
(2, 'fawad', 0, '0788192933', 'ghazni', 1990, '9939933', 'guard', '2020-08-18'),
(4, 'mohammad', 0, 'sayed', 'jalalabad', 1972, '', 'Cashier', '1399-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `patient_medicine`
--

CREATE TABLE `patient_medicine` (
  `patient_medicine_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `medicine_usage` varchar(64) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `use_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `number_of_bed` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `staff_id` int(11) NOT NULL,
  `salary_year` int(11) NOT NULL,
  `salary_month` int(11) NOT NULL,
  `absent_amount` int(11) NOT NULL DEFAULT 0,
  `bonus` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `net_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`staff_id`, `salary_year`, `salary_month`, `absent_amount`, `bonus`, `tax`, `net_salary`) VALUES
(3, 2020, 9, 433, 0, 750, 13817),
(3, 2020, 10, 0, 1000, 750, 15250),
(4, 2020, 9, 288, 2000, 1000, 20712),
(7, 2020, 9, 0, 0, 1250, 23750),
(7, 2020, 12, 0, 0, 1250, 23750),
(8, 2020, 12, 0, 0, 1100, 20900);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `week_day` int(11) NOT NULL,
  `time_from` varchar(32) NOT NULL,
  `time_to` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `position` varchar(64) NOT NULL,
  `education` varchar(120) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `photo` varchar(120) NOT NULL,
  `phone` char(10) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `address` varchar(120) NOT NULL,
  `gross_salary` int(11) NOT NULL,
  `hire_date` date NOT NULL,
  `staff_type` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `firstname`, `lastname`, `birth_year`, `position`, `education`, `gender`, `photo`, `phone`, `email`, `address`, `gross_salary`, `hire_date`, `staff_type`, `department_id`) VALUES
(3, 'hameed', 'nawab', 1980, 'guard', '12th pass', 0, 'images/staff/160014346715978144191579273335user-7.jpg', '0788323233', '', 'shahre naw', 15000, '2019-02-19', 3, 3),
(4, 'jamal', 'ahmadzai', 1990, 'nurse', 'bachelor', 0, 'images/staff/15978143201579270710user-3.jpg', '0789956433', 'jamal@gmail.com', 'kote sange', 20000, '2018-10-11', 2, 1),
(7, 'naweed', 'mohammadi', 1982, 'nurse', '12pass', 0, 'images/staff/15978144191579273335user-7.jpg', '078829192', 'saleem@gmail.com', 'kote sangi kabul', 25000, '2018-05-09', 2, 1),
(8, 'saleem', 'hashemi', 1961, 'reception', '12th pass', 0, 'images/staff/1600797317one.jpg', '0788281932', 'hashemi@gmail.com', 'kabul karte char', 22000, '2020-09-22', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff_experience`
--

CREATE TABLE `staff_experience` (
  `experience_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `organization` varchar(64) NOT NULL,
  `position` varchar(64) NOT NULL,
  `year_from` int(11) NOT NULL,
  `year_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `name`, `price`) VALUES
(1, 'curin', 2000),
(2, 'cancer', 1500),
(3, 'some problem', 1200),
(4, 'some problem', 1200),
(5, 'HIV', 2500),
(6, 'hiv', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE `test_result` (
  `result_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `test_date` date NOT NULL,
  `test_result` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`result_id`, `patient_id`, `test_id`, `test_date`, `test_result`) VALUES
(2, 4, 1, '2020-09-22', 'positive'),
(3, 2, 2, '2020-09-29', 'positive'),
(4, 2, 5, '2020-10-06', 'Negative'),
(5, 4, 6, '2020-09-23', 'positive');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `staff_id`, `username`, `password`) VALUES
(5, 4, 'admin', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `changes` int(11) NOT NULL,
  `pk_value` int(11) NOT NULL,
  `activity_date` date NOT NULL,
  `activity_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admit`
--
ALTER TABLE `admit`
  ADD PRIMARY KEY (`admit_id`),
  ADD KEY `patient_admit_fk` (`patient_id`),
  ADD KEY `room_admit_fk` (`room_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `patient_appointment_fk` (`patient_id`),
  ADD KEY `staff_appointment_fk` (`staff_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`staff_id`,`absent_year`,`absent_month`,`absent_day`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`),
  ADD UNIQUE KEY `blood_group` (`blood_group`);

--
-- Indexes for table `blood_source`
--
ALTER TABLE `blood_source`
  ADD PRIMARY KEY (`source_id`),
  ADD KEY `blood_blood_source_fk` (`blood_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosis_id`),
  ADD KEY `patient_diagnosis_fk` (`patient_id`),
  ADD KEY `department_diagnosis_fk` (`department_id`),
  ADD KEY `staff_diagnosis_fk` (`staff_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_id`),
  ADD KEY `department_equipment_fk` (`department_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`),
  ADD KEY `patient_income_fk` (`patient_id`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_login_log_fk` (`user_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_medicine`
--
ALTER TABLE `patient_medicine`
  ADD PRIMARY KEY (`patient_medicine_id`),
  ADD KEY `patient_medicine_fk` (`patient_id`),
  ADD KEY `medicine_patient_medicine_fk` (`medicine_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `department_room_fk` (`department_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`staff_id`,`salary_year`,`salary_month`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `staff_schedule_fk` (`staff_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `department_staff_fk` (`department_id`);

--
-- Indexes for table `staff_experience`
--
ALTER TABLE `staff_experience`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `staff_staff_experience_fk` (`staff_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `patient_result_fk` (`patient_id`),
  ADD KEY `test_test_result_fk` (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `staff_id` (`staff_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `user_user_activity_fk` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admit`
--
ALTER TABLE `admit`
  MODIFY `admit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_source`
--
ALTER TABLE `blood_source`
  MODIFY `source_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient_medicine`
--
ALTER TABLE `patient_medicine`
  MODIFY `patient_medicine_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff_experience`
--
ALTER TABLE `staff_experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test_result`
--
ALTER TABLE `test_result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admit`
--
ALTER TABLE `admit`
  ADD CONSTRAINT `patient_admit_fk` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `room_admit_fk` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `patient_appointment_fk` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_appointment_fk` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `staff_attendance_fk` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_source`
--
ALTER TABLE `blood_source`
  ADD CONSTRAINT `blood_blood_source_fk` FOREIGN KEY (`blood_id`) REFERENCES `blood` (`blood_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `department_diagnosis_fk` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_diagnosis_fk` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_diagnosis_fk` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `department_equipment_fk` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `patient_income_fk` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `login_log`
--
ALTER TABLE `login_log`
  ADD CONSTRAINT `user_login_log_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_medicine`
--
ALTER TABLE `patient_medicine`
  ADD CONSTRAINT `medicine_patient_medicine_fk` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_medicine_fk` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `department_room_fk` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `staff_salary_fk` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `staff_schedule_fk` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `department_staff_fk` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `staff_experience`
--
ALTER TABLE `staff_experience`
  ADD CONSTRAINT `staff_staff_experience_fk` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_result`
--
ALTER TABLE `test_result`
  ADD CONSTRAINT `patient_result_fk` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_test_result_fk` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `staff_users_fk` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD CONSTRAINT `user_user_activity_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
