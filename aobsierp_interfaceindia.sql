-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2019 at 09:54 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aobsierp_interfaceindia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `adm_id` int(11) NOT NULL,
  `category` text NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `version` text NOT NULL,
  `device_id` text NOT NULL,
  `device_type` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`adm_id`, `category`, `name`, `username`, `password`, `version`, `device_id`, `device_type`) VALUES
(1, 'Accounts,Sales,Marketing,Human Resource,Logistics,Office Administration,Finance ', 'Super Admin', 'msk@interfaceindia.in', 'msk123', '', '488892', ''),
(4, 'Accounts,Sales,Marketing,Human Resource', 'Vinit Patil', 'vinitp', 'vinitp', '', '654321', ''),
(5, 'Accounts', 'Priyanka A', 'pri', 'pri', '', '815699', ''),
(6, 'Sales', 'Pallavi D', 'pallavi', 'pallavi', '', '985176', ''),
(7, 'Sales,Marketing,Logistics,Office Administration', 'Prashanti Gaonkar', 'prashanti@interfaceindia.in', 'prashanti123', '', '', ''),
(8, 'Accounts,Human Resource,Logistics,Finance ', 'Prajakta Kulkarni', 'prajakta@interfaceindia.in', 'prajakta123', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `assign_team_member`
--

CREATE TABLE `assign_team_member` (
  `assign_id` int(11) NOT NULL,
  `reminder_id` int(11) NOT NULL,
  `team_member_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_team_member`
--

INSERT INTO `assign_team_member` (`assign_id`, `reminder_id`, `team_member_id`, `date_created`) VALUES
(5, 1, 2, '2019-05-14 07:21:01'),
(6, 2, 11, '2019-06-19 04:43:51'),
(7, 2, 3, '2019-06-19 04:43:51'),
(8, 3, 11, '2019-06-19 04:51:44'),
(9, 3, 3, '2019-06-19 04:51:44'),
(32, 17, 10, '2019-09-10 04:59:22'),
(30, 4, 3, '2019-09-10 04:16:13'),
(12, 5, 11, '2019-06-19 05:06:16'),
(13, 5, 3, '2019-06-19 05:06:16'),
(14, 8, 3, '2019-07-10 09:55:31'),
(15, 8, 12, '2019-07-10 09:55:31'),
(18, 9, 12, '2019-07-18 12:40:53'),
(23, 12, 3, '2019-08-09 06:17:55'),
(26, 13, 3, '2019-08-09 06:38:49'),
(27, 16, 3, '2019-09-10 04:09:39'),
(28, 15, 3, '2019-09-10 04:11:34'),
(29, 14, 3, '2019-09-10 04:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`id`, `category`, `date_created`) VALUES
(2, 'Accounts', '2019-05-14 07:04:56'),
(3, 'Sales', '2019-06-19 04:08:35'),
(4, 'Marketing', '2019-06-19 04:08:50'),
(5, 'Human Resource', '2019-06-19 04:09:04'),
(6, 'Logistics', '2019-06-19 04:10:14'),
(8, 'Office Administration', '2019-06-19 04:11:47'),
(9, 'Finance ', '2019-06-19 04:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `reminder_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `team_member_id` int(11) NOT NULL,
  `log_activity` text NOT NULL,
  `comments` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `reminder_id`, `category_id`, `team_member_id`, `log_activity`, `comments`, `date_created`) VALUES
(1, 1, 2, 2, 'Prajakta Kulkarni has marked \'GSTR1 Return Filing\' reminder as Resolved of Category Accounts at 06:33:27 AM', 'done ', '2019-05-20 01:03:27'),
(2, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 04:54:56 PM', 'resolved', '2019-07-18 11:24:56'),
(3, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 04:57:18 PM', 'resolved', '2019-07-18 11:27:18'),
(4, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 04:57:52 PM', 'resolved', '2019-07-18 11:27:52'),
(5, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:00:32 PM', 'resolved', '2019-07-18 11:30:32'),
(6, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:01:56 PM', 'resolved', '2019-07-18 11:31:56'),
(7, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:05:21 PM', 'resolved', '2019-07-18 11:35:21'),
(8, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:08:18 PM', 'resolved', '2019-07-18 11:38:18'),
(9, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:08:44 PM', 'resolved', '2019-07-18 11:38:44'),
(10, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:09:06 PM', 'resolved', '2019-07-18 11:39:06'),
(11, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:09:46 PM', 'resolved', '2019-07-18 11:39:46'),
(12, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:10:42 PM', 'resolved', '2019-07-18 11:40:42'),
(13, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:10:55 PM', 'resolved', '2019-07-18 11:40:55'),
(14, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:17:48 PM', 'resolved', '2019-07-18 11:47:48'),
(15, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:18:26 PM', 'resolved', '2019-07-18 11:48:26'),
(16, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:18:54 PM', 'resolved', '2019-07-18 11:48:54'),
(17, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:20:38 PM', 'resolved', '2019-07-18 11:50:38'),
(18, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:21:02 PM', 'resolved', '2019-07-18 11:51:02'),
(19, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:21:26 PM', 'resolved', '2019-07-18 11:51:26'),
(20, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:50:58 PM', 'resolved', '2019-07-18 12:20:58'),
(21, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:51:23 PM', 'resolved', '2019-07-18 12:21:23'),
(22, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:53:21 PM', 'resolved', '2019-07-18 12:23:21'),
(23, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:53:40 PM', 'resolved', '2019-07-18 12:23:40'),
(24, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:54:16 PM', 'resolved', '2019-07-18 12:24:16'),
(25, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:56:55 PM', 'resolved', '2019-07-18 12:26:55'),
(26, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:58:10 PM', 'resolved', '2019-07-18 12:28:10'),
(27, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 05:58:40 PM', 'resolved', '2019-07-18 12:28:40'),
(28, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 06:00:26 PM', 'resolved', '2019-07-18 12:30:26'),
(29, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 06:01:43 PM', 'resolved', '2019-07-18 12:31:43'),
(30, 9, 4, 12, 'Aniket has marked \'GST Return- GSTR3B\' reminder as Resolved of Category Accounts at 06:36:05 PM', 'resolved', '2019-07-18 13:06:05'),
(31, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 06:37:50 PM', 'resolved', '2019-07-18 13:07:50'),
(32, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 06:40:25 PM', 'resolved', '2019-07-18 13:10:25'),
(33, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 06:41:38 PM', 'resolved', '2019-07-18 13:11:38'),
(34, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 06:41:41 PM', 'resolved', '2019-07-18 13:11:41'),
(35, 9, 4, 12, 'Aniket has marked \'GST Return- GSTR3B\' reminder as Resolved of Category Accounts at 06:42:12 PM', 'resolved', '2019-07-18 13:12:12'),
(36, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 06:44:37 PM', 'resolved', '2019-07-18 13:14:37'),
(37, 9, 4, 12, 'Aniket has marked \'GST Return- GSTR3B\' reminder as Resolved of Category Accounts at 06:45:12 PM', 'resolved', '2019-07-18 13:15:12'),
(38, 9, 4, 12, 'Aniket has marked \'GST Return- GSTR3B\' reminder as Resolved of Category Accounts at 06:48:06 PM', 'resolved', '2019-07-18 13:18:06'),
(39, 9, 4, 12, 'Aniket has marked \'GST Return- GSTR3B\' reminder as Resolved of Category Accounts at 06:48:36 PM', 'resolved', '2019-07-18 13:18:36'),
(40, 9, 4, 12, 'Aniket has marked \'GST Return- GSTR3B\' reminder as Resolved of Category Accounts at 06:48:51 PM', 'resolved', '2019-07-18 13:18:51'),
(41, 9, 4, 12, 'Aniket has marked \'GST Return- GSTR3B\' reminder as Resolved of Category Accounts at 06:49:30 PM', 'resolved', '2019-07-18 13:19:30'),
(42, 9, 4, 12, 'Aniket has marked \'GST Return- GSTR3B\' reminder as Resolved of Category Accounts at 06:50:30 PM', 'resolved', '2019-07-18 13:20:30'),
(43, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 06:55:49 PM', 'resolved', '2019-07-18 13:25:49'),
(44, 9, 4, 12, 'Aniket has marked \'GST Return- GSTR3B\' reminder as Resolved of Category Accounts at 06:56:53 PM', 'resolved', '2019-07-18 13:26:53'),
(45, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 01:22:16 PM', 'Resolved', '2019-07-19 07:52:16'),
(46, 9, 4, 12, 'Aniket has marked \'GST Return- GSTR3B\' reminder as Resolved of Category Accounts at 01:26:49 PM', 'Resolved', '2019-07-19 07:56:49'),
(47, 8, 0, 3, 'Prajakta Kulkarni has marked \'Sale Main Out\' reminder as Resolved of Category Sales at 01:28:20 PM', 'Resolved', '2019-07-19 07:58:20'),
(48, 12, 2, 3, 'Prajakta Kulkarni has marked \'Test Reminder \' reminder as Resolved of Category Accounts at 12:02:40 PM', 'Its Done', '2019-08-09 06:32:40'),
(49, 16, 2, 3, 'Prajakta Kulkarni has marked \'GST Return- GSTR1\' reminder as Resolved of Category Accounts at 09:50:45 AM', 'yes...done successfully on 9th', '2019-09-10 04:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `team_member_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_created` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `team_member_id`, `message`, `date_created`) VALUES
(1, 3, 'tax', '2019-06-19 10:02:32'),
(2, 3, 'Test', '2019-08-09 11:13:19'),
(3, 3, 'Hey', '2019-08-09 11:29:41'),
(4, 3, 'Hey', '2019-08-09 11:31:23'),
(5, 3, 'Please check if the software is sending proper messages', '2019-09-10 10:35:20'),
(6, 8, 'Test Notification', '2019-09-10 10:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL,
  `category_id` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `task_date` varchar(30) NOT NULL,
  `task_time` varchar(30) NOT NULL,
  `team_member_id` varchar(30) NOT NULL,
  `repeat_reminder` varchar(30) NOT NULL,
  `reminder_start_date` varchar(30) NOT NULL,
  `reminder_start_time` varchar(30) NOT NULL,
  `repeat_reminder_every` varchar(30) NOT NULL,
  `priority` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `reminder_status` int(11) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `category_id`, `title`, `description`, `task_date`, `task_time`, `team_member_id`, `repeat_reminder`, `reminder_start_date`, `reminder_start_time`, `repeat_reminder_every`, `priority`, `status`, `reminder_status`, `date_created`) VALUES
(17, '8', 'Prepare Test Zig', 'Please prepare test zig for LG Electronics under guidance from Hemant Sir', '2019-09-30', 'All Day', '', '', '2019-09-10', '10:00 AM', '24', 'Medium Priority', 1, 0, '2019-09-10 04:58:33'),
(18, '2', 'GST Payment', 'Payment of  monthly GST liability through UCO Bank.', '2019-09-19', 'All Day', '', '', '2019-09-19', 'All Day', '24', 'High Priority', 1, 0, '2019-09-15 03:31:55'),
(4, '2', 'GST Payment', 'Payment of  monthly GST liability through UCO Bank.', '2019-09-19', 'All Day', '', '', '2019-09-16', '9:30 AM', '24', 'High Priority', 1, 0, '2019-09-10 04:16:13'),
(19, '2', 'GST Return- GSTR1', 'File monthly GSTR1 before 10th.', '2019-10-10', 'All Day', '', '', '2019-10-10', 'All Day', '24', 'High Priority', 1, 0, '2019-10-06 03:32:03'),
(20, '2', 'GST Payment', 'Payment of  monthly GST liability through UCO Bank.', '2019-10-18', 'All Day', '', '', '2019-10-18', 'All Day', '24', 'High Priority', 1, 0, '2019-10-13 03:32:22'),
(21, '2', 'GST Return- GSTR1', 'File monthly GSTR1 before 10th.', '2019-11-08', 'All Day', '', '', '2019-11-08', 'All Day', '24', 'High Priority', 1, 0, '2019-11-03 03:32:10'),
(14, '2', 'GST Return- GSTR3B', 'File GSTR3B before 20th of the month', '2019-09-20', 'All Day', '', '', '2019-09-15', '11:05 AM', '24', 'High Priority', 1, 0, '2019-09-10 04:13:23'),
(15, '2', 'GST Annual Return', 'File Annual GST Return before 31st October.', '2019-10-31', 'All Day', '', '', '2019-09-11', '10:30 AM', '24', 'High Priority', 1, 0, '2019-09-10 04:11:34'),
(16, '2', 'GST Return- GSTR1', 'File monthly GSTR1 before 10th.', '2019-09-10', 'All Day', '', '', '2019-09-05', '10:05 AM', '24', 'High Priority', 1, 1, '2019-09-10 04:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `repeat_reminder`
--

CREATE TABLE `repeat_reminder` (
  `request_id` int(11) NOT NULL,
  `reminder_id` int(11) NOT NULL,
  `frequency` varchar(20) NOT NULL,
  `day` varchar(10) NOT NULL,
  `repeat_date_start` varchar(30) NOT NULL,
  `repeat_date_end` varchar(30) NOT NULL,
  `repeat_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repeat_reminder`
--

INSERT INTO `repeat_reminder` (`request_id`, `reminder_id`, `frequency`, `day`, `repeat_date_start`, `repeat_date_end`, `repeat_status`) VALUES
(1, 2, 'Monthly', '', '2019-07-05', '2022-03-10', 1),
(2, 3, 'Monthly', '', '2019-07-16', '2022-03-20', 1),
(3, 4, 'Monthly', '', '2019-07-16', '2022-03-20', 1),
(4, 5, 'Yearly', '', '2019-05-01', '2022-06-30', 1),
(5, 16, 'Monthly', '', '2019-09-05', '2020-09-10', 1),
(6, 14, 'Monthly', '', '2019-09-15', '2020-09-20', 1),
(7, 4, 'Monthly', '', '2019-09-16', '2020-09-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `version` varchar(30) NOT NULL,
  `device_id` varchar(50) NOT NULL,
  `device_type` varchar(30) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`id`, `category_id`, `name`, `mobile`, `email`, `password`, `status`, `version`, `device_id`, `device_type`, `date_created`) VALUES
(11, 5, 'Richa Kulkarni', '8888887025', 'richakulkarni.99@gmail.com', 'richa123', 1, '', '', '', '2019-08-09 06:53:24'),
(3, 2, 'Prajakta Kulkarni', '9373040059', 'accounts@interfaceindia.in', 'password', 1, '1', '34f316ac-74df-4e73-b4eb-a99ff994b1e0', 'Android', '2019-08-09 05:43:06'),
(8, 3, 'Prashanti Gaonkar', '9373040051', 'prashanti@interfaceindia.in', 'prashanti123', 1, '', '', '', '2019-09-10 04:01:48'),
(6, 3, 'Shubham Kulkarni', '9373040056', 'shubham@interfaceindia.in', 'shubham123', 1, '', '', '', '2019-09-10 04:02:32'),
(9, 3, 'Hemant Daroli', '9373040053', 'hemant@interfaceindia.in', 'hemant123', 1, '', '', '', '2019-09-10 04:02:59'),
(10, 6, 'Arun Salunke', '9373040058', 'arun@interfaceinda.in', 'arun123', 1, '', '', '', '2019-09-10 04:03:11'),
(13, 8, 'Prashanti Gaonkar', '9373040051', 'prashanti@interfaceindia.in', 'prashanti123', 1, '', '', '', '2019-09-10 04:04:03'),
(14, 5, 'Prajakta Kulkarni', '9373040059', 'accounts@interfaceindia.in', 'prajakta123', 1, '', '', '', '2019-09-10 04:04:51'),
(15, 8, 'Arun Salunke', '9373040058', 'arun@interfaceinda.in', 'arun123', 1, '', '', '', '2019-09-10 04:55:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `assign_team_member`
--
ALTER TABLE `assign_team_member`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repeat_reminder`
--
ALTER TABLE `repeat_reminder`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assign_team_member`
--
ALTER TABLE `assign_team_member`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `repeat_reminder`
--
ALTER TABLE `repeat_reminder`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
