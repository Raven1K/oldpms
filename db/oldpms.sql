-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 09:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oldrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `brgy`
--

CREATE TABLE `brgy` (
  `brgy_id` int(11) NOT NULL,
  `brgy_name` varchar(50) NOT NULL,
  `mun_code` int(2) NOT NULL,
  `brgy_code` int(3) NOT NULL,
  `office_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `denr_users`
--

CREATE TABLE `denr_users` (
  `user_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `office_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fee_id` int(11) NOT NULL,
  `lumber_app_id` int(11) NOT NULL,
  `process_fee` float NOT NULL,
  `app_fee` float NOT NULL,
  `reg_fee` float NOT NULL,
  `oath_fee` float NOT NULL,
  `cash_bond` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lumber_application`
--

CREATE TABLE `lumber_application` (
  `lumber_app_id` int(11) NOT NULL,
  `application_type` varchar(20) NOT NULL,
  `perm_fname` varchar(50) NOT NULL,
  `perm_lname` varchar(50) NOT NULL,
  `bussiness_name` varchar(100) NOT NULL,
  `prov_code` int(2) NOT NULL,
  `muncity_code` int(2) NOT NULL,
  `brgy_code` int(2) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `perm_email` varchar(50) NOT NULL,
  `perm_contact` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lumber_app_doc`
--

CREATE TABLE `lumber_app_doc` (
  `upload_document_id` int(11) NOT NULL,
  `application_form` longblob NOT NULL,
  `lumber_supply_contract` longblob NOT NULL,
  `mayor_permit` longblob NOT NULL,
  `annual_bus_plan` longblob NOT NULL,
  `latest_income_tax` longblob NOT NULL,
  `proof_ownership` longblob NOT NULL,
  `inspection_val_id` int(11) NOT NULL,
  `validation_info_id` int(11) NOT NULL,
  `lumber_app_id` int(11) NOT NULL,
  `validator_id` int(11) NOT NULL,
  `val_remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lumber_dealer_val_info`
--

CREATE TABLE `lumber_dealer_val_info` (
  `val_app_id` int(11) NOT NULL,
  `lumber_app_id` int(11) NOT NULL,
  `gross_volume` float NOT NULL,
  `total_value` decimal(11,0) NOT NULL,
  `emp_male` int(11) NOT NULL,
  `emp_female` int(11) NOT NULL,
  `equip_used` varchar(50) NOT NULL,
  `equip_made` varchar(50) NOT NULL,
  `equip_condition` varchar(50) NOT NULL,
  `equip_size` varchar(50) NOT NULL,
  `equip_value` float NOT NULL,
  `prev_cert_num` varchar(50) NOT NULL,
  `years_operated` int(11) NOT NULL,
  `date_issued` date NOT NULL,
  `latitude` varchar(10) NOT NULL,
  `longitude` varchar(10) NOT NULL,
  `lumberyard_photo` longblob NOT NULL,
  `verification_report` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `muncity`
--

CREATE TABLE `muncity` (
  `muncity_id` int(11) NOT NULL,
  `muncity_name` varchar(50) NOT NULL,
  `prov_code` int(2) NOT NULL,
  `mun_code` int(2) NOT NULL,
  `zip_code` int(4) NOT NULL,
  `office_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `office_id` int(20) NOT NULL,
  `office_name` varchar(50) NOT NULL,
  `office_address` varchar(255) NOT NULL,
  `office_under` varchar(50) NOT NULL,
  `office_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `prov_id` int(11) NOT NULL,
  `prov_name` varchar(50) NOT NULL,
  `reg_code` int(2) NOT NULL,
  `prov_code` int(2) NOT NULL,
  `office_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `reg_id` int(11) NOT NULL,
  `reg_name` varchar(50) NOT NULL,
  `reg_code` int(2) NOT NULL,
  `office_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_client`
--

CREATE TABLE `user_client` (
  `client_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `mid_name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobilenum` int(11) NOT NULL,
  `comp_id_upload` longblob NOT NULL,
  `govt_id_upload` longblob NOT NULL,
  `auth_letter` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brgy`
--
ALTER TABLE `brgy`
  ADD PRIMARY KEY (`brgy_id`),
  ADD KEY `office` (`office_id`),
  ADD KEY `municipality` (`mun_code`),
  ADD KEY `brgy_code` (`brgy_code`);

--
-- Indexes for table `denr_users`
--
ALTER TABLE `denr_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `office` (`office_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD KEY `lumber dealer` (`lumber_app_id`);

--
-- Indexes for table `lumber_application`
--
ALTER TABLE `lumber_application`
  ADD PRIMARY KEY (`lumber_app_id`),
  ADD KEY `prov_code` (`prov_code`,`muncity_code`,`brgy_code`),
  ADD KEY `client` (`client_id`),
  ADD KEY `muncity_code` (`muncity_code`),
  ADD KEY `brgy_code` (`brgy_code`);

--
-- Indexes for table `lumber_app_doc`
--
ALTER TABLE `lumber_app_doc`
  ADD PRIMARY KEY (`upload_document_id`),
  ADD KEY `inspection_val_id` (`inspection_val_id`),
  ADD KEY `equipment_id` (`validation_info_id`),
  ADD KEY `validation_info_id` (`validation_info_id`),
  ADD KEY `lumber_app_id` (`lumber_app_id`),
  ADD KEY `validator` (`validator_id`);

--
-- Indexes for table `lumber_dealer_val_info`
--
ALTER TABLE `lumber_dealer_val_info`
  ADD PRIMARY KEY (`val_app_id`),
  ADD KEY `lumber dealer` (`lumber_app_id`);

--
-- Indexes for table `muncity`
--
ALTER TABLE `muncity`
  ADD PRIMARY KEY (`muncity_id`),
  ADD KEY `region` (`prov_code`),
  ADD KEY `office` (`office_id`),
  ADD KEY `municipality` (`mun_code`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`prov_id`),
  ADD KEY `province` (`reg_code`),
  ADD KEY `region` (`prov_code`),
  ADD KEY `office` (`office_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `province` (`reg_code`),
  ADD KEY `office` (`office_id`);

--
-- Indexes for table `user_client`
--
ALTER TABLE `user_client`
  ADD PRIMARY KEY (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brgy`
--
ALTER TABLE `brgy`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `denr_users`
--
ALTER TABLE `denr_users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lumber_application`
--
ALTER TABLE `lumber_application`
  MODIFY `lumber_app_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lumber_dealer_val_info`
--
ALTER TABLE `lumber_dealer_val_info`
  MODIFY `val_app_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `muncity`
--
ALTER TABLE `muncity`
  MODIFY `muncity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `prov_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_client`
--
ALTER TABLE `user_client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brgy`
--
ALTER TABLE `brgy`
  ADD CONSTRAINT `brgy_ibfk_1` FOREIGN KEY (`mun_code`) REFERENCES `muncity` (`mun_code`),
  ADD CONSTRAINT `brgy_ibfk_2` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`);

--
-- Constraints for table `denr_users`
--
ALTER TABLE `denr_users`
  ADD CONSTRAINT `denr_users_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`);

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`lumber_app_id`) REFERENCES `lumber_application` (`lumber_app_id`);

--
-- Constraints for table `lumber_application`
--
ALTER TABLE `lumber_application`
  ADD CONSTRAINT `lumber_application_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `user_client` (`client_id`),
  ADD CONSTRAINT `lumber_application_ibfk_2` FOREIGN KEY (`muncity_code`) REFERENCES `muncity` (`mun_code`),
  ADD CONSTRAINT `lumber_application_ibfk_3` FOREIGN KEY (`brgy_code`) REFERENCES `brgy` (`brgy_code`);

--
-- Constraints for table `lumber_app_doc`
--
ALTER TABLE `lumber_app_doc`
  ADD CONSTRAINT `lumber_app_doc_ibfk_1` FOREIGN KEY (`lumber_app_id`) REFERENCES `lumber_application` (`lumber_app_id`),
  ADD CONSTRAINT `lumber_app_doc_ibfk_2` FOREIGN KEY (`validator_id`) REFERENCES `denr_users` (`user_id`);

--
-- Constraints for table `lumber_dealer_val_info`
--
ALTER TABLE `lumber_dealer_val_info`
  ADD CONSTRAINT `lumber_dealer_val_info_ibfk_1` FOREIGN KEY (`lumber_app_id`) REFERENCES `lumber_application` (`lumber_app_id`);

--
-- Constraints for table `muncity`
--
ALTER TABLE `muncity`
  ADD CONSTRAINT `muncity_ibfk_1` FOREIGN KEY (`prov_code`) REFERENCES `province` (`prov_code`),
  ADD CONSTRAINT `muncity_ibfk_2` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`);

--
-- Constraints for table `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `province_ibfk_1` FOREIGN KEY (`reg_code`) REFERENCES `region` (`reg_code`),
  ADD CONSTRAINT `province_ibfk_2` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`),
  ADD CONSTRAINT `province_ibfk_3` FOREIGN KEY (`prov_code`) REFERENCES `lumber_application` (`prov_code`);

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
