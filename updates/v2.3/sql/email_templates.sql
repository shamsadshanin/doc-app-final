-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 03, 2025 at 06:03 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doxe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `subject` text,
  `body` text,
  `variables` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `user_id`, `title`, `slug`, `subject`, `body`, `variables`) VALUES
(1, 0, 'Verification', 'verification', 'Email verification', '<p>Hello {{user_name}},</p>\r\n\r\n<p>Your verification code is: {{verify_code}}</p>\r\n', '{{user_name}}, {{verify_code}}'),
(2, 0, 'Forgot Password', 'forgot-password', 'Recover password', '<p>Hello {{user_name}},</p>\r\n\r\n<p>We have reset your password, Please use this  {{recovery_password}}  code to login your account</p>\r\n', '{{user_name}}, {{recovery_password}}'),
(3, 0, 'Update Appointment Booking', 'update-appointment-booking', 'Modifed your consultation', '<p>Hello {{patient_name}},</p>\r\n\r\n<p>{{user_name}}<strong> </strong> modified your consultation date and time, New Appointment Details,  {{modified_date}} {{modified_time}}</p>\r\n', '{{patient_name}}, {{user_name}},{{modified_date}}, {{modified_time}}'),
(4, 0, 'Subscription Expire Reminder', 'subscription-expire-reminder', 'Subscription Expire reminder', '<p>Hello {{user_name}},</p>\r\n\r\n<p>Your {{site_name}} {{billing_type}}  subscription will expire in {{reminder_days}} days. Please check below link and login to your account to renew your plan.</p>\r\n\r\n<p>{{site_url}}</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n', '{{user_name}}, {{site_name}},{{billing_type}}, {{reminder_days}},{{site_url}}'),
(5, 0, 'New Patient Registration', 'new-patient-registration', 'Registration Confirmation', '<p>Hello {{patient_name}},</p>\r\n\r\n<p>Your account has been created successfully, now you can login to your account using below access,</p>\r\n\r\n<p><strong>Username </strong>:  {{patient_email}}</p>\r\n\r\n<p><strong>Password</strong>:  {{patient_password}}</p>\r\n\r\n<p> </p>\r\n', '{{patient_name}}, {{patient_email}},{{patient_password}}'),
(6, 0, 'Doctor Appointment Confirmation', 'doctor-appointment-confirmation', 'Appointment Confirmation', '<p>Hello {{user_name}},</p>\r\n\r\n<p> {{patient_name}}<strong> </strong> have booked an appointment at {{appointment_date}} {{appointment_time}} .</p>\r\n', '{{patient_name}}, {{user_name}},{{appointment_date}}, {{appointment_time}}'),
(7, 0, 'Patient Appointment Confirmation', 'patient-appointment-confirmation', 'Appointment Confirmation', '<p>Hello {{patient_name}},</p>\r\n\r\n<p>You have booked an appointment with {{user_name}}<strong> </strong>which will start at {{appointment_date}} {{appointment_time}} .</p>\r\n', '{{patient_name}}, {{user_name}},{{appointment_date}}, {{appointment_time}}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
