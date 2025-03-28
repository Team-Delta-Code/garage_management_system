-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2025 at 04:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garage_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) NOT NULL,
  `appointment_id` varchar(20) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `service_id` varchar(20) NOT NULL,
  `time_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_data`
--

CREATE TABLE `customer_data` (
  `id` bigint(20) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_data`
--

INSERT INTO `customer_data` (`id`, `customer_id`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'cust001', 'Alice Johnson', '555-0101', 'alice.j@email.com', '123 Oak Street, Springfield'),
(2, 'cust002', 'Bob Williams', '555-0102', 'bob.w@email.com', '456 Maple Avenue, Riverside'),
(3, 'cust003', 'Carol Brown', '555-0103', 'carol.b@email.com', '789 Pine Road, Lakeside'),
(4, 'cust004', 'Daniel Miller', '555-0104', 'daniel.m@email.com', '321 Cedar Lane, Mountain View'),
(5, 'cust005', 'Emma Davis', '555-0105', 'emma.d@email.com', '654 Birch Street, Hillside'),
(6, 'cust14654', 'Janith Lanarole', '0098234567', '', 'Kohuwala, Nugegoda'),
(7, 'cust83559', 'Madushanka', '071456789', 'madushanka@mail.com', 'Nugegoda');

-- --------------------------------------------------------

--
-- Table structure for table `customer_support`
--

CREATE TABLE `customer_support` (
  `id` bigint(20) NOT NULL,
  `support_id` varchar(20) NOT NULL,
  `support_email` varchar(255) NOT NULL,
  `support message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_support`
--

INSERT INTO `customer_support` (`id`, `support_id`, `support_email`, `support message`) VALUES
(1, 'sup001', 'alice.j@email.com', 'Question about oil change service'),
(2, 'sup002', 'bob.w@email.com', 'Inquiry about brake warranty'),
(3, 'sup003', 'carol.b@email.com', 'Feedback on tire service'),
(4, 'sup004', 'daniel.m@email.com', 'Question about service schedule'),
(5, 'sup005', 'emma.d@email.com', 'AC service follow-up');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `role_id` varchar(20) NOT NULL,
  `emp_first_name` varchar(50) NOT NULL,
  `emp_last_name` varchar(50) NOT NULL,
  `basic_salary` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `role_id`, `emp_first_name`, `emp_last_name`, `basic_salary`) VALUES
(9, 'emp_admin1', 'role_admin', 'System', 'Admin', 80000),
(10, 'emp_mgr1', 'role_mgr', 'Manager', 'Account', 60000),
(11, 'emp_recep1', 'role_recep', 'Receptionist ', 'Account', 30000),
(12, 'emp_mech1', 'role_mech', 'Mechanic', 'Account01', 40000),
(13, 'emp_mech2', 'role_mech', 'Mechanic', 'Account02', 30000),
(14, 'emp_mgr2', 'role_mgr', 'Samantha', 'Chandrapala', 65000),
(15, 'emp_mech3', 'role_mech', 'Thilak', 'Gunawardhana', 50000),
(16, 'emp_mech4', 'role_mech', 'Vikum', 'Sayura', 30000),
(17, 'emp_recep2', 'role_recep', 'Piyumi', 'Nimasha', 35000),
(18, 'emp_mech5', 'role_mech', 'Priyankara', 'Jayalath', 75000),
(19, 'emp_mech6', 'role_mech', 'Supun', 'Dilshan', 40000),
(20, 'emp_mech7', 'role_mech', 'Dharmapala', 'Dharmapala', 65000),
(21, 'emp_mech8', 'role_mech', 'Chandralal', 'Mahinda', 60000),
(22, 'emp_mech9', 'role_mech', 'Piyath', 'Samarakoon', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `id` bigint(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `role_id` varchar(20) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`id`, `emp_id`, `role_id`, `availability`, `time_stamp`) VALUES
(1, 'emp_admin', 'role_admin', 1, '2025-02-11 11:00:03'),
(2, 'emp_mech1', 'role_mech', 1, '2025-02-11 11:00:03'),
(3, 'emp_recep1', 'role_recep', 1, '2025-02-11 11:00:03'),
(4, 'emp_mgr1', 'role_mgr', 1, '2025-02-11 11:00:03'),
(5, 'emp_mech2', 'role_mech', 0, '2025-02-11 11:00:03'),
(6, 'emp_admin', 'role_admin', 1, '2025-02-12 11:00:03'),
(7, 'emp_mech1', 'role_mech', 1, '2025-02-12 11:00:03'),
(8, 'emp_recep1', 'role_recep', 1, '2025-02-12 11:00:03'),
(9, 'emp_mgr1', 'role_mgr', 1, '2025-02-12 11:00:03'),
(10, 'emp_mech2', 'role_mech', 1, '2025-02-12 11:00:03'),
(11, 'emp_admin', 'role_admin', 1, '2025-02-13 11:00:03'),
(12, 'emp_mech1', 'role_mech', 0, '2025-02-13 11:00:03'),
(13, 'emp_recep1', 'role_recep', 1, '2025-02-13 11:00:03'),
(14, 'emp_mgr1', 'role_mgr', 1, '2025-02-13 11:00:03'),
(15, 'emp_mech2', 'role_mech', 1, '2025-02-13 11:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `employee_roles`
--

CREATE TABLE `employee_roles` (
  `id` bigint(20) NOT NULL,
  `role_id` varchar(20) NOT NULL,
  `employee_role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_roles`
--

INSERT INTO `employee_roles` (`id`, `role_id`, `employee_role`) VALUES
(1, 'role_admin', 'System_Administrator'),
(3, 'role_mech', 'Mechanic'),
(4, 'role_recep', 'Receptionist'),
(5, 'role_mgr', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `garage_services`
--

CREATE TABLE `garage_services` (
  `id` bigint(20) NOT NULL,
  `service_id` varchar(20) NOT NULL,
  `service_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garage_services`
--

INSERT INTO `garage_services` (`id`, `service_id`, `service_name`) VALUES
(1, 'serv001', 'Vehicle Repair'),
(2, 'serv002', 'Full Service'),
(3, 'serv003', 'Body Wash'),
(4, 'serv004', 'Paint Services'),
(5, 'serv005', 'Tow Services');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` bigint(20) NOT NULL,
  `reminder_id` varchar(20) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `reminder_subject` varchar(200) NOT NULL,
  `reminder_msg` text NOT NULL,
  `reminder_date` date NOT NULL,
  `reminder_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_log`
--

CREATE TABLE `service_log` (
  `id` bigint(20) NOT NULL,
  `service_log_id` varchar(20) NOT NULL,
  `service_order_id` varchar(20) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `log_msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_log`
--

INSERT INTO `service_log` (`id`, `service_log_id`, `service_order_id`, `employee_id`, `date_created`, `log_msg`) VALUES
(1, 'log001', 'ord001', 'emp_mech1', '2025-01-25', 'Oil change completed'),
(2, 'log002', 'ord002', 'emp_mech1', '2025-01-26', 'Brake service performed'),
(3, 'log003', 'ord003', 'emp_tech1', '2025-01-27', 'Tire rotation in progress'),
(4, 'log004', 'ord004', 'emp_tech1', '2025-01-28', 'Engine tune-up scheduled'),
(5, 'log005', 'ord005', 'emp_mech1', '2025-01-29', 'AC service pending');

-- --------------------------------------------------------

--
-- Table structure for table `service_order`
--

CREATE TABLE `service_order` (
  `id` bigint(20) NOT NULL,
  `service_order_id` varchar(20) NOT NULL,
  `vehicle_id` varchar(20) NOT NULL,
  `service_id` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  `completed_date` date NOT NULL,
  `service_order_cost` decimal(10,0) NOT NULL,
  `service_order_status` tinyint(1) NOT NULL,
  `service_log_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_order`
--

INSERT INTO `service_order` (`id`, `service_order_id`, `vehicle_id`, `service_id`, `created_date`, `completed_date`, `service_order_cost`, `service_order_status`, `service_log_id`) VALUES
(1, 'ord001', 'veh001', '', '2025-01-25', '2025-01-25', 50, 1, 'log001'),
(2, 'ord002', 'veh002', '', '2025-01-26', '2025-01-26', 150, 1, 'log002'),
(3, 'ord003', 'veh003', '', '2025-01-27', '2025-01-27', 30, 0, 'log003'),
(4, 'ord004', 'veh004', '', '2025-01-28', '2025-01-28', 200, 0, 'log004'),
(5, 'ord005', 'veh005', '', '2025-01-29', '2025-01-29', 100, 0, 'log005'),
(6, 'ord10339', 'veh23513', 'serv001', '2025-01-23', '0000-00-00', 0, 0, ''),
(7, 'ord24194', 'veh49917', 'serv003', '2025-01-24', '0000-00-00', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `system_access_control`
--

CREATE TABLE `system_access_control` (
  `id` bigint(20) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `role_id` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_access_control`
--

INSERT INTO `system_access_control` (`id`, `employee_id`, `role_id`, `password`) VALUES
(11, 'emp_admin1', 'role_admin', '6b6e7773784a3b3c3d3e'),
(12, 'emp_mgr1', 'role_mgr', '796d7a6d73717e4c3d3e3f40'),
(13, 'emp_recep1', 'role_recep', '7c6f6d6f7a4a3b3c3d3e'),
(14, 'emp_mech1', 'role_mech', '766e6c71493a3b3c3d'),
(15, 'emp_mech2', 'role_mech', '766e6c71493a3b3c3d'),
(16, 'emp_mgr2', 'role_mgr', '806e7a6e7b81756e4d3e3f4041'),
(17, 'emp_mech3', 'role_mech', '7f7374776c764b3c3d3e3f'),
(18, 'emp_mech4', 'role_mech', '8073757f774a3b3c3d3e'),
(19, 'emp_recep2', 'role_recep', '7b74848078744b3c3d3e3f'),
(20, 'emp_mech5', 'role_mech', '7f817888707d7a7081704f40414243'),
(21, 'emp_mech6', 'role_mech', '7d7f7a7f784a3b3c3d3e'),
(22, 'emp_mech7', 'role_mech', '737770817c707f707b704f40414243'),
(23, 'emp_mech8', 'role_mech', '7277707d7381707b707b4f40414243'),
(24, 'emp_mech9', 'role_mech', '7b74846c7f734b3c3d3e3f');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `transaction_id` varchar(20) NOT NULL,
  `service_order_id` varchar(20) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `service_order_id`, `amount`, `time_stamp`) VALUES
(1, 'trans001', 'ord001', 50, '2025-01-25 04:30:00'),
(3, 'trans003', 'ord003', 30, '2025-01-27 08:30:00'),
(4, 'trans004', 'ord004', 200, '2025-01-28 10:00:00'),
(5, 'trans005', 'ord005', 100, '2025-01-29 11:30:00'),
(7, 'trans002', 'ord002', 150, '2025-01-23 08:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_data`
--

CREATE TABLE `vehicle_data` (
  `id` bigint(20) NOT NULL,
  `vehicle_id` varchar(20) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `license_plate_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_data`
--

INSERT INTO `vehicle_data` (`id`, `vehicle_id`, `customer_id`, `type`, `brand`, `model`, `license_plate_no`) VALUES
(1, 'veh001', 'cust001', '', 'Toyota', 'Camry', 'XYZ-123'),
(2, 'veh002', 'cust002', '', 'Honda', 'Civic', 'ABC-456'),
(3, 'veh003', 'cust003', '', 'Ford', 'Focus', 'DEF-789'),
(4, 'veh004', 'cust004', '', 'BMW', '3 Series', 'GHI-012'),
(5, 'veh005', 'cust005', '', 'Mercedes', 'C-Class', 'JKL-345'),
(6, 'veh23513', 'cust14654', 'car', 'BMW', 'M3', 'CDC-2345'),
(7, 'veh49917', 'cust83559', 'motorcycle', 'Discovery', '100', 'VT-7865');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_id` (`appointment_id`),
  ADD KEY `cust_name` (`cust_name`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `customer_data`
--
ALTER TABLE `customer_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `customer_name` (`customer_name`),
  ADD KEY `customer_contact` (`customer_contact`),
  ADD KEY `customer_email` (`customer_email`),
  ADD KEY `customer_address` (`customer_address`);

--
-- Indexes for table `customer_support`
--
ALTER TABLE `customer_support`
  ADD PRIMARY KEY (`id`),
  ADD KEY `support_id` (`support_id`),
  ADD KEY `support_email` (`support_email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `availability` (`availability`),
  ADD KEY `timestamp` (`time_stamp`);

--
-- Indexes for table `employee_roles`
--
ALTER TABLE `employee_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `employee_role` (`employee_role`);

--
-- Indexes for table `garage_services`
--
ALTER TABLE `garage_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `service_name` (`service_name`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reminder_id` (`reminder_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `reminder_subject` (`reminder_subject`),
  ADD KEY `reminder_date` (`reminder_date`),
  ADD KEY `reminder_time` (`reminder_time`);

--
-- Indexes for table `service_log`
--
ALTER TABLE `service_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_log_id` (`service_log_id`),
  ADD KEY `service_order_id` (`service_order_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `date_created` (`date_created`);

--
-- Indexes for table `service_order`
--
ALTER TABLE `service_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_order_id` (`service_order_id`),
  ADD KEY `vehicel_id` (`vehicle_id`),
  ADD KEY `created_date` (`created_date`),
  ADD KEY `completed_date` (`completed_date`),
  ADD KEY `service_order_cost` (`service_order_cost`),
  ADD KEY `service_order_status` (`service_order_status`),
  ADD KEY `service_log_id` (`service_log_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `system_access_control`
--
ALTER TABLE `system_access_control`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `service_order_id` (`service_order_id`),
  ADD KEY `amount` (`amount`),
  ADD KEY `time_stamp` (`time_stamp`);

--
-- Indexes for table `vehicle_data`
--
ALTER TABLE `vehicle_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `brand` (`brand`),
  ADD KEY `model` (`model`),
  ADD KEY `license_plate_no` (`license_plate_no`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_data`
--
ALTER TABLE `customer_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_support`
--
ALTER TABLE `customer_support`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee_roles`
--
ALTER TABLE `employee_roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `garage_services`
--
ALTER TABLE `garage_services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_log`
--
ALTER TABLE `service_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_order`
--
ALTER TABLE `service_order`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `system_access_control`
--
ALTER TABLE `system_access_control`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_data`
--
ALTER TABLE `vehicle_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
