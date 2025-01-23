-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 02:22 PM
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
  `customer_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `service_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `appointment_id`, `customer_id`, `date`, `time`, `service_id`) VALUES
(1, 'apt001', 'cust001', '2025-01-25', '09:00:00', 'serv001'),
(2, 'apt002', 'cust002', '2025-01-26', '10:30:00', 'serv002'),
(3, 'apt003', 'cust003', '2025-01-27', '13:00:00', 'serv003'),
(4, 'apt004', 'cust004', '2025-01-28', '14:30:00', 'serv004'),
(5, 'apt005', 'cust005', '2025-01-29', '16:00:00', 'serv005');

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
(6, 'cust14654', 'Janith Lanarole', '0098234567', '', 'Kohuwala, Nugegoda');

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
(1, 'emp_admin', 'role_admin', 'Madushanka', 'Premakumara', 10),
(2, 'emp_admin', 'role_admin', 'John', 'Smith', 75000),
(3, 'emp_mech1', 'role_mech', 'Mike', 'Johnson', 55000),
(4, 'emp_recep1', 'role_recep', 'Sarah', 'Davis', 45000),
(5, 'emp_mgr1', 'role_mgr', 'David', 'Wilson', 65000),
(6, 'emp_tech1', 'role_tech', 'James', 'Brown', 50000);

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
(2, 'role_admin', 'System_Administrator'),
(3, 'role_mech', 'Mechanic'),
(4, 'role_recep', 'Receptionist'),
(5, 'role_mgr', 'Manager'),
(6, 'role_tech', 'Technician');

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

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `reminder_id`, `employee_id`, `reminder_subject`, `reminder_msg`, `reminder_date`, `reminder_time`) VALUES
(1, 'rem001', 'emp_mech1', 'Follow-up Oil Change', 'Check with customer about oil change satisfaction', '2025-02-01', '09:00:00'),
(2, 'rem002', 'emp_tech1', 'Brake Inspection', 'Schedule follow-up brake inspection', '2025-02-02', '10:00:00'),
(3, 'rem003', 'emp_recep1', 'Customer Call', 'Call customer about upcoming service', '2025-02-03', '11:00:00'),
(4, 'rem004', 'emp_mgr1', 'Team Meeting', 'Monthly service team meeting', '2025-02-04', '14:00:00'),
(5, 'rem005', 'emp_admin', 'System Update', 'Schedule system maintenance', '2025-02-05', '15:00:00');

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
(6, 'ord10339', 'veh23513', 'serv001', '2025-01-23', '0000-00-00', 0, 0, '');

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
(2, 'emp_admin', 'role_admin', 'garageAdmin'),
(3, 'emp_admin1', 'role_admin', 'adminPass123'),
(4, 'emp_mech1', 'role_mech', 'mechPass123'),
(5, 'emp_recep1', 'role_recep', 'recepPass123'),
(6, 'emp_mgr1', 'role_mgr', 'mgrPass123'),
(7, 'emp_tech1', 'role_tech', 'techPass123');

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
(6, 'veh23513', 'cust14654', 'car', 'BMW', 'M3', 'CDC-2345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_id` (`appointment_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `date` (`date`),
  ADD KEY `time` (`time`),
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_data`
--
ALTER TABLE `customer_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_support`
--
ALTER TABLE `customer_support`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_log`
--
ALTER TABLE `service_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_order`
--
ALTER TABLE `service_order`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_access_control`
--
ALTER TABLE `system_access_control`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_data`
--
ALTER TABLE `vehicle_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
